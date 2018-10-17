<?php

class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	// default listing home page
	public function flat($query = []) {

		$this->view('listing/home');
	}

	public function f($query = []) {
	
		if (!isset($query['sort'])) $query['sort'] = FELLOW_DEFAULT_SORT;
		$sort = $query['sort'];	unset($query['sort']);
		$fellows = $this->model->getFellows($query, $sort);

		$fellows['listTitle'] = $this->model->getListTitle($query);

		($fellows['data']) ? $this->view('listing/fellows', $fellows) : $this->view('error/index');
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
