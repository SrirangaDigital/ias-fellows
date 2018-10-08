<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function buildDBFromJson() {

		$jsonFiles = $this->model->getFilesIteratively(PHY_FELLOW_MD_URL, $pattern = '/F[LH]\d{7}.json$/i');
		
		$db = $this->model->db->useDB();
		$collection = $this->model->db->createCollection($db, FELLOW_COLLECTION);

		foreach ($jsonFiles as $jsonFile) {

			$content = $this->model->getDetailsFromJsonPath($jsonFile);
			$result = $collection->insertOne($content);
		}
	}
}

?>
