<?php
class TestController {
	private $subject_id;
	private $dbController;

	function __construct($db = "NULL", $sid = "NULL") {
		$this->dbController = $db;
		$this->subject_id = $sid;
	}

	public function getSubjectTests() {
		if($this->_isSubscriber()) {
			$respond = $this->dbController->getAllTestsFormSubject($this->subject_id, User::getToken());
			$array = $this->_getObjectsArray($respond);
			$scores = $this->dbController->getTestsScores(User::getId(), User::getToken());
			$this->_setScores($scores, $array);
			return $array;
		}
		else{
			return "Вы не подписаны на этот курс";
		}
	}
 
	//Если есть права на редактирование:
	private function _isAdmin(){
		return true;
	}
	//Если есть права на чтение:
	public function _isSubscriber(){
		return true;
	}

	private static function _comparator($a, $b) {
		if ($a->getNumber() == $b->getNumber()) {
        	return 0;
    	}
    	return ($a->getNumber() < $b->getNumber()) ? -1 : 1;
	}

	private function _getObjectsArray($respond) {
		$array = array();
		if ($respond != null) {
			while ($row = mysql_fetch_array($respond, MYSQL_ASSOC)) {
				$o = new Test();
				$o->setId($row["test_id"]);
				$o->setNumber($row["test_number"]);
				$o->setName($row["name"]);
				$o->setDescription($row["description"]);
				array_push($array, $o);
			} 
			usort($array, 'self::_comparator');
		}
		return $array;
	} 

	private function _setScores($scores, &$array) {
		while ($row = mysql_fetch_array($scores, MYSQL_ASSOC)) {
			foreach($array as $obj) {
				if($obj->getId() == $row["test_id"]) {
					if ($obj->getScore() < $row["score"]) {
						$obj->setScore($row["score"]);
					}
					$obj->incrementTryes();
				}
			}
		}
	}

}
?>