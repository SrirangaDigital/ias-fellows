<?php

class profile extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	// Short hand notation for view
	public function v($query = [], $id = '') {


		$fellow = $this->model->getDetailsById($id, FELLOW_COLLECTION);

		($fellow) ? $this->view('profile/view', $fellow) : $this->view('error/index');

		// if($artefact['details']) {
		
		// 	$artefact['images'] = $this->model->getArtefactImages($id);
		// 	$artefact['neighbours'] = $this->model->getNeighbourhood($artefact['details'], $query);
		// 	$artefact['filter'] = $this->model->filterArrayToString($query);
		// 	$artefact = $this->model->includeExternalResources($artefact);

		// 	$artefact['details'] = $this->model->unsetControlParams($artefact['details']);
		// }

	}
}

?>
