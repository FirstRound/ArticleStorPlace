<?php
class LectureController {
	private $dbController;
	private $user;
	private $sid;
	private $lid;

	function __construct($db = "NULL", $sid="NULL", $lid="NULL", $user = "NULL") {
		$this->dbController = $db;
		$this->user = $user;
		$this->sid = $sid;
		$this->lid = $lid;
	}

	public function getAllLectures() {
		$respond = $this->dbController->getSubjectLectures($this->sid, User::getToken());
		$array = $this->_getObjectsArray($respond);
		return $array;
	}

	public function getLectureByID() {
		$respond = $this->dbController->getLecture($this->lid, User::getToken());
		$obj = $this->_getObject($respond);
		return $obj;
	}

	public function countSubjectLectures() { 
		$respond = $this->dbController->countLecturesByLectureId($this->lid, User::getToken());
		return $this->_getCount($respond);
	}

	private static function _comparator($a, $b) {
		if ($a->getNumber() == $b->getNumber()) {
        	return 0;
    	}
    	return ($a->getNumber() < $b->getNumber()) ? -1 : 1;
	}


	private function _getObjectsArray($respond) {
		$array = array();
		while ($row = mysql_fetch_array($respond, MYSQL_ASSOC)) {
			$o = new Lecture();
			$o->setName($row["name"]);
			$o->setDescription($row["description"]);
			$o->setSubjectId($row["subject_id"]);
			$o->setId($row["lecture_id"]);
			$o->setVideo($row["video"]);
			$o->setNumber($row["number"]);
			array_push($array, $o);
		}
		usort($array, 'self::_comparator'); 
		return $array;
	}

	private function _getObject($respond) {
		$row = mysql_fetch_assoc($respond);
		$o = new Lecture();
		$o->setName($row["name"]);
		$o->setDescription($row["description"]);
		$o->setSubjectId($row["subject_id"]);
		$o->setId($row["lecture_id"]);
		$o->setVideo($row["video"]);
		$o->setNumber($row["number"]);
		return $o;
	}

	private function _getCount($respond) {
		$data = mysql_fetch_assoc($respond);
		return intval($data["COUNT(*)"]);
	}

}
?>