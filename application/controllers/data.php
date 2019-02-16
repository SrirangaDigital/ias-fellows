<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function buildDBFromJson() {

		$db = $this->model->db->useDB();

		$fellowJsonFiles = $this->model->getFilesIteratively(PHY_FELLOW_MD_URL, $pattern = '/F[LH]\d{7}.json$/i');
		$associateJsonFiles = $this->model->getFilesIteratively(PHY_ASSOCIATE_MD_URL, $pattern = '/AS\d{7}.json$/i');
		$jsonFiles = array_merge($fellowJsonFiles, $associateJsonFiles);

		$collection = $this->model->db->createCollection($db, COLLECTION);
		
		foreach ($jsonFiles as $jsonFile) {

			$content = $this->model->getDetailsFromJsonPath($jsonFile);
			$result = $collection->insertOne($content);
		}
	}

	public function authAllFellows($query = []) {
	
		$sort = 'id';

		require_once 'application/models/listingModel.php';
		$this->listingModel = new listingModel();

		$artefacts = $this->listingModel->getDetails($query, $sort, COLLECTION);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, AUTHENTICATION_URL . "api/registerAll");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		foreach ($artefacts['data'] as $artefact) {

			$params['email'] = '';

			if(isset($artefact['contact']['email']['personal']))
				$params['email'] = $artefact['contact']['email']['personal'];
			elseif(isset($artefact['contact']['email']['official']))
				$params['email'] = $artefact['contact']['email']['official'];
			else
				$params['email'] = $artefact['id'] . '@ias.ac.in';

			if(preg_match('/,/', $params['email']))
				$params['email'] = explode(',', $params['email'])[0];

			$params['username'] = $artefact['id'];
			$params['password'] = strrev($params['username']);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			$server_output = curl_exec($ch);

			if($server_output)
				var_dump($params);
		}
		curl_close ($ch);
	}
}

?>
