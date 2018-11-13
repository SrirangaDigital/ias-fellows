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

		$this->view('profile/login');
	}
}

?>
