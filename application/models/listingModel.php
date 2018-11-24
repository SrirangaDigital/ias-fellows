<?php

class listingModel extends Model {


	public function __construct() {

		parent::__construct();
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
			elseif(preg_match('/type/', $key)) {
				
				if($value == 'current') array_push($title, 'Present Fellows');
				elseif($value == 'deceased') array_push($title, 'Deceased Fellows');
				elseif($value == 'honorary') array_push($title, 'Honorary Fellows');
				elseif($value == 'deceased,honorary') array_push($title, 'Deceased Honorary Fellows');
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
