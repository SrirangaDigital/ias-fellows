<?php

class profile extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	// Short hand notation for view
	public function v($query = [], $id = '') {

		$data = $this->model->getDetailsById($id, COLLECTION);
	
		if(!$data) { $this->view('error/index'); return; }

		// Include fname, lname in the session variable only on first login
		if(($this->viewHelper->isLoggedIn()) && (!isset($_SESSION['fellow_lname']))){

			$_SESSION['fellow_fname'] = $data['profile']['name']['first'];
			$_SESSION['fellow_lname'] = $data['profile']['name']['last'];
			$_SESSION['fellow_dname'] = $this->viewHelper->printFellowName($data);
		}

		$this->view('profile/view', $data);
	}

	// Short hand notation for edit
	public function e($query = [], $id = '') {

		// Redirect to view if not logged in
		if(!$this->viewHelper->isLoggedIn()) $this->redirect('profile/v/' . $id);

		// Redirect to view if its is not their page
		$data['isAdmin'] = $this->viewHelper->isLoggedInAsAdmin();

		if(!(($data['isAdmin']) || ($_SESSION['auth_username'] == $id))) $this->redirect('profile/v/' . $id);

		$data['data'] = $this->model->getDetailsById($id, COLLECTION);

		if($data['data'])
			(preg_match('/^FL/', $id)) ? $this->view('profile/editFellow', $data) : $this->view('profile/editAssociate', $data);
		else
			$this->view('error/index');
	}

	public function update() {

		// Setting connection to DB
		$db = $this->model->db->useDB();
		$collection = $this->model->db->selectCollection($db, COLLECTION);

		// Getting and reforming POST Data
		$data = $this->model->getPostData();
		$reformedData = $this->model->reformData($data);

		$type = (preg_match('/^FL/', $reformedData['id'])) ? PHY_FELLOW_MD_URL : PHY_ASSOCIATE_MD_URL;
		$path = $type . $reformedData['id'] . ".json";

		// writing to json file
		if(!($this->model->writeJsonToPath($reformedData, $path))) {
			$this->view('error/prompt',["msg"=>"Problem in writing data to file"]); return;
		}

		// Replace data in database
		if(!($this->model->replaceJsonDataInDB($collection, $reformedData, 'id', $reformedData['id']))){
			$this->view('error/prompt',["msg"=>"Problem in writing data to database"]); return;
		}

		$this->redirect('gitcvs/updateRepo/' . $reformedData['id']);
		//$this->absoluteRedirect(BASE_URL . 'profile/v/' . $reformedData['id']);
	}

	public function login($query = []) {

		if($this->viewHelper->isLoggedIn()) {

			$redirectUrl = ($this->viewHelper->isLoggedInAsAdmin()) ? BASE_URL : BASE_URL . 'profile/v/' . $_SESSION['auth_username'];
			$this->absoluteRedirect($redirectUrl);
			return;
		}
				
		$this->view('profile/login');
	}

	public function logout($query = []) {

		$this->absoluteRedirect(AUTHENTICATION_URL . "user/logout?returnUrl=" . BASE_URL);
	}

	public function test($query = []) {

		var_dump($this->viewHelper->isLoggedInAsAdmin());
		var_dump($_SESSION);
	}

	public function addPicture($query = [], $id) {

		$tempFile = $_FILES['profilePicture']['tmp_name'];
		$fileName = PHY_AVATAR_URL . $id . '.jpg';
		move_uploaded_file($tempFile, $fileName);
		exec('convert ' . $fileName . ' -resize x200 ' . $fileName);
	}	

	public function changePassword($query = []) {

		if(!$this->viewHelper->isLoggedIn()) $this->redirect('');

		$this->view('profile/changePassword');
	}
}

?>
