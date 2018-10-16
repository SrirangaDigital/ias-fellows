<?php

class listingModel extends Model {


	public function __construct() {

		parent::__construct();
	}

	public function getFellows($filter, $sort = '') {
			
		$db = $this->db->useDB();
		$collection = $this->db->selectCollection($db, FELLOW_COLLECTION);
		
		$filter = $this->reformFilter($filter);

		$projection = [ 'projection' => ['_id' => 0] ];
		if($sort) $projection['sort'] = $this->reformSort($sort);
		$iterator = $collection->find($filter, $projection);
	
		$data = [];
		foreach ($iterator as $row) {
			
			$data[] = $row;
		}
		
		$data = ['data' => $data, 'filter' => $filter, 'sort' => $sort];
		// return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
		return $data;
	}

	public function reformFilter($filter) {
	
		$reformedFilter = [];
		foreach ($filter as $key => $value) {
			
			// Values beginning with @ are treated as regular expressions
			if(preg_match('/^@/', $value)) {
				$value = ['$regex' => preg_replace('/^@/', '', $value)];
			}
			// Here _ in key is replaced with dot. PHP had initially done this change
			$reformedFilter{str_replace('_', '.', $key)} = $value;
		}
		return $reformedFilter;
	}

	public function reformSort($sort) {
		
		$values = explode(',', $sort);
		$reformedSort = [];
		foreach ($values as $value) {
			$key = preg_replace('/^\!/', '', $value);
			$value = (preg_match('/^\!/', $value)) ? -1 : 1;
			$reformedSort[$key] = $value;
		}
		return $reformedSort;
	}

	public function getListTitle($filter) {

		$title = [];
		foreach ($filter as $key => $value) {
			
			if(preg_match('/section/', $key)) array_push($title, 'Section: ' . $value);
			elseif(preg_match('/year/', $key)) array_push($title, 'Year Elected: ' . $value);
			elseif(preg_match('/type/', $key)) array_push($title, 'Fellowship type: ' . $value);
			else array_push($title, $key . ': ' . $value);
		}

		return implode(', ', $title);
	}
}

?>
