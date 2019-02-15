<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function buildDBFromJson() {

		$db = $this->model->db->useDB();

		$jsonFiles = $this->model->getFilesIteratively(PHY_FELLOW_MD_URL, $pattern = '/F[LH]\d{7}.json$/i');
		$collection = $this->model->db->createCollection($db, FELLOW_COLLECTION);

		$this->insertArtefacts($jsonFiles, $collection);

		$jsonFiles = $this->model->getFilesIteratively(PHY_ASSOCIATE_MD_URL, $pattern = '/AS\d{7}.json$/i');
		$collection = $this->model->db->createCollection($db, ASSOCIATE_COLLECTION);

		$this->insertArtefacts($jsonFiles, $collection);
	}

	public function insertArtefacts($jsonFiles, $dbCollection){

		foreach ($jsonFiles as $jsonFile) {

			$content = $this->model->getDetailsFromJsonPath($jsonFile);
			$result = $dbCollection->insertOne($content);
		}
	}

	public function authAllFellows($query = []) {
	
		$sort = 'id';

		require_once 'application/models/listingModel.php';
		$this->listingModel = new listingModel();

		$fellows = $this->listingModel->getFellows($query, $sort);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, AUTHENTICATION_URL . "api/registerAll");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		foreach ($fellows['data'] as $fellow) {
			
			$params['email'] = '';

			if(isset($fellow['contact']['email']['personal']))
				$params['email'] = $fellow['contact']['email']['personal'];
			elseif(isset($fellow['contact']['email']['official']))
				$params['email'] = $fellow['contact']['email']['official'];
			else
				$params['email'] = $fellow['id'] . '@ias.ac.in';

			if(preg_match('/,/', $params['email']))
				$params['email'] = explode(',', $params['email'])[0];

			$params['username'] = $fellow['id'];
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
