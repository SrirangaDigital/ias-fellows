<?php

class profile extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	// Short hand notation for view
	public function v($query = [], $id = '') {

		$fellow = $this->model->getDetailsById($id, FELLOW_COLLECTION);
		($fellow) ? $this->view('profile/view', $fellow) : $this->view('error/index');
	}

	// Short hand notation for edit
	public function edit($query = [], $id = '') {

		$fellow = $this->model->getDetailsById($id, FELLOW_COLLECTION);
		($fellow) ? $this->view('profile/edit', $fellow) : $this->view('error/index');
	}

	public function login($query = []) {

		if(isset($_SESSION['auth_logged_in']))
			if($_SESSION['auth_logged_in']) {

				$this->absoluteRedirect('http://localhost/ias-fellows/profile/v/' . $_SESSION['auth_username']);
				return;
			}
				
		$this->view('profile/login');
	}

	public function logout($query = []) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/auth/user/logout?returnUrl=" . BASE_URL);
		$server_output = curl_exec($ch);
		curl_close ($ch);
	}

	public function test($query = []) {

		var_dump($_SESSION);
	}
}

?>
