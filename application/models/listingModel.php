<?php

class listingModel extends Model {


	public function __construct() {

		parent::__construct();
	}

	public function getDetails($filter, $sort = '', $type) {
			
		$db = $this->db->useDB();
		$collection = $this->db->selectCollection($db, $type);
		
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

	public function getDistinct($param){

		$db = $this->db->useDB();
		$collection = $this->db->selectCollection($db, COLLECTION);
		$data = [];

		$iterator = $collection->distinct($param);
		
		foreach ($iterator as $row) $data[] = $row;

		return $data;
	}

	public function reformFilter($filter) {
		
		$reformedFilter = [];
		foreach ($filter as $key => $value) {
			
			// Values beginning with @ are treated as regular expressions
			// Alternatively is regxAll id present in the filter, consider each term as regex, also case insensitive
			if((preg_match('/^@/', $value)) || (isset($filter['regexAll']))) {
				$value = ['$regex' => preg_replace('/^@/', '', $value), '$options' => 'i'];
			}
			// Here _ in key is replaced with dot. PHP had initially done this change
			$reformedFilter{str_replace('_', '.', $key)} = $value;
		}

		if(isset($reformedFilter['regexAll'])) unset($reformedFilter['regexAll']);

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

	public function getListTitle($filter, $type) {

		$filter = array_filter($filter);
		$title = [];
		foreach ($filter as $key => $value) {
			
			if(preg_match('/section/', $key)) array_push($title, 'Section: ' . $value);
			elseif(preg_match('/name/', $key)) array_push($title, 'Name contains: ' . $value);
			elseif(preg_match('/year/', $key)) array_push($title, 'Year Elected: ' . $value);
			elseif(preg_match('/type/', $key)) {
				
				if($value == 'current') array_push($title, 'Present ' . $type);
				elseif($value == 'deceased') array_push($title, 'Deceased ' . $type);
				elseif($value == 'honorary') array_push($title, 'Honorary ' . $type);
				elseif($value == 'deceased,honorary') array_push($title, 'Deceased Honorary ' . $type);
				elseif($value == 'former') array_push($title, 'Former ' . $type);
			}
			elseif(preg_match('/sex/', $key)) {
			
				if($value == 'F') array_push($title, 'Women');
			}
			else array_push($title, $key . ': ' . $value);
		}

		$title = implode(', ', $title);
		$title = str_replace('Fellows, Women', 'Women Fellows', $title);
		return $title;
	}
}

?>
