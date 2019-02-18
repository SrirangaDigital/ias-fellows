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
		
		if(preg_match('/^associate/i', implode(' ', array_keys($query)))) $type = 'Associate';

		$data['listTitle'] = $this->model->getListTitle($query, $type);

		($data['data']) ? $this->view('listing/fellows', $data) : $this->view('error/index');
	}

	// public function f($query = [], $type = DEFAULT_TYPE) {

	// 	$query = $this->model->preProcessURLQuery($query);

	// 	$query['page'] = (isset($query['page'])) ? $query['page'] : "1"; $page = $query['page']; unset($query['page']);
	// 	$sortKeys = $this->model->getPrecastKey($type, 'sortKey');

	// 	$artefacts = $this->model->getArtefacts($type, $sortKeys, $page, $query);

	// 	if($page == '1')
	// 	else
	// 		echo json_encode($artefacts);
	// }
}

?>
