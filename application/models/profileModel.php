<?php

class profileModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function reformData($data){

		$reformedData['id'] = (isset($data['id'])) ? $data['id'] : '';
		$reformedData['profile']['name']['salutation'] = (isset($data['profile-name-salutation'])) ? $data['profile-name-salutation'] : '';
		$reformedData['profile']['name']['first'] = (isset($data['profile-name-first'])) ? $data['profile-name-first'] : '';
		$reformedData['profile']['name']['last'] = (isset($data['profile-name-last'])) ? $data['profile-name-last'] : '';
		$reformedData['profile']['name']['display'] = (isset($data['profile-name-last'])) ? $data['profile-name-last'] . ', ' : '';
		$reformedData['profile']['name']['display'] .= (isset($data['profile-name-salutation'])) ? $data['profile-name-salutation'] . ' ' : $reformedData['profile']['name']['display'];
		$reformedData['profile']['name']['display'] .= (isset($data['profile-name-first'])) ? $data['profile-name-first'] : $reformedData['profile']['name']['display'];
		$reformedData['profile']['name'] = array_filter($reformedData['profile']['name']);

		$reformedData['profile']['sex'] = (isset($data['profile-sex-male'])) ? 'M' : 'F';
		$reformedData['profile']['birthDate'] = (isset($data['profile-birthDate'])) ? $data['profile-birthDate'] : '';
		$reformedData['profile']['deathDate'] = (isset($data['profile-deathDate'])) ? $data['profile-deathDate'] : '';
		$reformedData['profile']['degree'] = (isset($data['profile-degree'])) ? $data['profile-degree'] : '';
		$reformedData['profile']['honours'] = (isset($data['profile-honours'])) ? $data['profile-honours'] : '';
		$reformedData['profile']['specialization'] = (isset($data['profile-specialization'])) ? $data['profile-specialization'] : '';
		$reformedData['profile'] = array_filter($reformedData['profile']);

		$reformedData['fellowship']['type'] = (isset($data['fellowship-type'])) ? $data['fellowship-type'] : '';
		$reformedData['fellowship']['section'] = (isset($data['fellowship-section'])) ? $data['fellowship-section'] : '';
		$reformedData['fellowship']['yearelected'] = (isset($data['fellowship-yearelected'])) ? $data['fellowship-yearelected'] : '';
		$reformedData['fellowship']['councilservice'] = (isset($data['fellowship-councilservice'])) ? $data['fellowship-councilservice'] : '';
		$reformedData['fellowship'] = array_filter($reformedData['fellowship']);

		$reformedData['contact']['address'] = (isset($data['contact-address'])) ? $data['contact-address'] : '';
		$reformedData['contact']['city'] = (isset($data['contact-city'])) ? $data['contact-city'] : '';
		$reformedData['contact']['state'] = (isset($data['contact-state'])) ? $data['contact-state'] : '';
		$reformedData['contact']['telephone']['office'] = (isset($data['contact-telephone-office'])) ? $data['contact-telephone-office'] : '';
		$reformedData['contact']['telephone']['residence'] = (isset($data['contact-telephone-residence'])) ? $data['contact-telephone-residence'] : '';
		$reformedData['contact']['telephone']['mobile'] = (isset($data['contact-telephone-mobile'])) ? $data['contact-telephone-mobile'] : '';
		$reformedData['contact']['telephone']['fax'] = (isset($data['contact-telephone-fax'])) ? $data['contact-telephone-fax'] : '';
		$reformedData['contact']['telephone'] = array_filter($reformedData['contact']['telephone']);

		$reformedData['contact']['email']['official'] = (isset($data['contact-email-official'])) ? $data['contact-email-official'] : '';
		$reformedData['contact']['email']['personal'] = (isset($data['contact-email-personal'])) ? $data['contact-email-personal'] : '';
		$reformedData['contact']['email'] = array_filter($reformedData['contact']['email']);
		$reformedData['contact'] = array_filter($reformedData['contact']);

		return array_filter($reformedData);
	}
}
?>
