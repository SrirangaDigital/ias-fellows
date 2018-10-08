<?php

class data extends Controller {

	public $fellowId;
	public $year = '';

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->insertPhotoDetails();
	}

	public function writeJson(){

		$dbh = $this->model->db->connect(DB_NAME);
		$sth = $dbh->prepare('SELECT * FROM ' . FELLOW_TABLE . ' ORDER BY yearelected, type, lname, fname');
		
		$sth->execute();
		
		while($result = $sth->fetch(PDO::FETCH_ASSOC)) {

			$data = [];

			$data["id"] = $this->getId($result);

			$data["profile"]["name"]["salutation"] = $result['sal'];
			$data["profile"]["name"]["first"] = $result['fname'];
			$data["profile"]["name"]["last"] = $result['lname'];
			$data["profile"]["name"]["display"] = $result['name'];

			$data["profile"]["name"] = array_filter($data["profile"]["name"]);

			$data["profile"]["sex"] = $result['sex'];
			$data["profile"]["birthDate"] = ($result['birth'] == '0000-00-00') ? '' : $result['birth'];
			$data["profile"]["deathDate"] = ($result['death'] == '0000-00-00') ? '' : $result['death'];
			$data["profile"]["degree"] = $result['degree'];
			$data["profile"]["honours"] = $result['honours'];
			$data["profile"]["specialization"] = $result['specialization'];

			$data["profile"] = array_filter($data["profile"]);

			$data["fellowship"]["type"] = ($result['type']) ? $result['type'] : 'current';
			$data["fellowship"]["section"] = $result['section'];
			$data["fellowship"]["yearelected"] = $result['yearelected'];
			$data["fellowship"]["councilservice"] = $result['councilservice'];

			$data["fellowship"] = array_filter($data["fellowship"]);

			$data["contact"]["address"] = $result['address'];
			$data["contact"]["city"] = $result['city'];
			$data["contact"]["state"] = $result['state'];
			$data["contact"]["country"] = $result['country'];
			$data["contact"]["telephone"]["office"] = $result['telephone_office'];
			$data["contact"]["telephone"]["residence"] = $result['telephone_residence'];
			$data["contact"]["telephone"]["mobile"] = $result['telephone_mobile'];
			$data["contact"]["telephone"]["fax"] = $result['fax'];
			
			$data["contact"]["telephone"] = array_filter($data["contact"]["telephone"]);

			$data["contact"]["email"] = $this->getEmailDetails($result['email']);
			// $data["contact"]["email"] = $result['email'];
			$data["contact"]["url"] = $result['url'];

			$data["contact"] = array_filter($data["contact"]);

			$data = array_filter($data);

			$fileName = PHY_FELLOW_MD_URL . $data['id'] . '.json';
			file_put_contents($fileName, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		}
		$dbh = null;
	}

	public function getId($data){

		$id = 'F';
		$id .= (preg_match('/honorary/', $data['type'])) ? 'H' : 'L';

		if($data['yearelected'] != $this->year) {

			$this->fellowId = 1;
			$this->year = $data['yearelected'];
		}

		$id .= $data['yearelected'];
		$id .= sprintf("%03d", $this->fellowId++);

		return $id;
	}

	public function getEmailDetails($emails){

		$emails = trim($emails);
		$emails = str_replace(' ', '', $emails);
		$emails = explode(',', $emails);

		$data['official'] = [];
		$data['personal'] = [];
		
		foreach ($emails as $email) {
			
			if(preg_match('/gmail|yahoo|hotmail|ymail|rediff|vsnl|aol|icloud|outlook|comcast/i', $email)) {
				
				array_push($data['personal'], $email);
			}
			else{
				
				array_push($data['official'], $email);
			}
		}

		$data['official'] = implode(',', $data['official']);
		$data['personal'] = implode(',', $data['personal']);

		return array_filter($data);
	}

	public function insertDetails(){

		$this->model->db->createDB(DB_NAME, DB_SCHEMA);
		$dbh = $this->model->db->connect(DB_NAME);

		$this->model->db->dropTable(METADATA_TABLE_L1, $dbh);
		$this->model->db->createTable(METADATA_TABLE_L1, $dbh, METADATA_TABLE_L1_SCHEMA);

		$this->model->db->dropTable(METADATA_TABLE_L2, $dbh);
		$this->model->db->createTable(METADATA_TABLE_L2, $dbh, METADATA_TABLE_L2_SCHEMA);

		$this->model->db->createTable(METADATA_TABLE_L3, $dbh, METADATA_TABLE_L3_SCHEMA);
		$this->model->db->createTable(METADATA_TABLE_L4, $dbh, METADATA_TABLE_L4_SCHEMA);
		
		//List albums
		$albums = $this->model->listFiles(PHY_PHOTO_URL, 'json');
		if($albums) {

			$this->model->insertAlbums($albums, $dbh);

			foreach ($albums as $album) {
			
				// List photos
				$photos = $this->model->listFiles(str_replace('.json', '/', $album), 'json');
			
				if($photos) {

					$this->model->insertPhotos($photos, $dbh);
				}
				else{

					echo 'Album ' . $album . ' does not have any photos' . "\n";
				}
			}
		}
		else{

			echo 'No albums to insert';
		}

		$dbh = null;
	}
}

?>
