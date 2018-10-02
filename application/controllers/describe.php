<?php

class describe extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->photo();
	}

	public function profile($id) {

		$data = $this->model->getProfileDetails($id);
		($data) ? $this->view('describe/profile', $data) : $this->view('error/index');
	}

}

?>