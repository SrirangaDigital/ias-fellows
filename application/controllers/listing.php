<?php

class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	// default listing home page
	public function flat($query = []) {

		$this->view('listing/home');
	}

	public function associateDirectory($query = []) {

		$data['year'] = $this->model->getDistinct('associate.yearelected');
		$this->view('listing/associateDirectory', $data);
	}

	public function a($query = []) {
	
		if (!isset($query['sort'])) $query['sort'] = DEFAULT_SORT;
		$sort = $query['sort'];	unset($query['sort']);
		$data = $this->model->getDetails($query, $sort, COLLECTION);
		$type = 'Fellows';
		
		if(preg_match('/^associate/i', implode(' ', array_keys($query)))) $type = 'Associates';

		$data['listTitle'] = $this->model->getListTitle($query, $type);

		($data['data']) ? $this->view('listing/artefacts', $data) : $this->view('error/index');
	}
}
?>
