<?php
	require_once "controllers/TestController.php";
	require_once "models/Test.php";
	require_once "views/TestView.php";

class SubjectController {

	private $dbController;

	function __construct($db = "NULL") {
		$this->dbController = $db;
	} 

	public function getAllSubjests($set) {
		$respond = $this->dbController->getAllSubjects($set);
		$array = $this->_getObjectsArray($respond);

		if (User::IsLogin()) {
			$respond = $this->dbController->getAllUserSubscripts(User::getId(), User::getToken());
			$this->_setSubjectsSubscription($array, $respond);
			$this->_setMaterialCoveredLevel($array);
		}
		return $array;
	}

	public function getCountOfSubjects() { 
		$respond = $this->dbController->countSubjects(User::getToken());
		if ($respond != null) {
			return $this->_getCount($respond);
		}
		return 0;
	}

	public function getCountOfMySubjects() {  
		$respond = $this->dbController->countMySubjects(User::getId(), User::getToken());
		if ($respond != null) {
			return $this->_getCount($respond);
		}
		return 0;
	}

	public function subscript($sid) {
		$this->dbController->subscriptToSubject($sid, User::getId(), User::getToken());
	}

	public function unSubscript($sid) { 
		$this->dbController->unSubscriptToSubject($sid, User::getId(), User::getToken()); 
	}


	// Перечитать!
	public function getMySubjects($set) {
		$respond = $this->dbController->getUsersSubjects($set, User::getId(), User::getToken());
		$array = $this->_getObjectsArray($respond);

		if (User::IsLogin()) {
			$respond = $this->dbController->getAllUserSubscripts(User::getId(), User::getToken());
			$this->_setSubjectsSubscription($array, $respond);
			$this->_setMaterialCoveredLevel($array);
		}
		return $array;
	}

	private function _setMaterialCoveredLevel($array) {
		foreach($array as $s) {
			if($s->isSubscriber()) {
				$tests_passed = 0;
				$test_controller = new TestController($this->dbController, $s->getId(), User::getId());
				$tests = $test_controller->getSubjectTests(User::getToken());
				foreach($tests as $t) {
					if ($t->getScore() >= 90) {
						$tests_passed++;
					}
				} 
				$s->setPassedTests($tests_passed);
			}
		}
	}

	private function _setSubjectsSubscription(&$subjects, $respond) {
		if ($respond != null) {
			while ($row = mysql_fetch_array($respond, MYSQL_ASSOC)) {
				foreach($subjects as $s) {
					if ($s->getId() == $row["subject_id"])
						$s->setSubscription();
				}
			}
		}
	}

	private function _getObjectsArray($respond) {
		$array = array();
		if($respond != null) {
			while ($row = mysql_fetch_array($respond, MYSQL_ASSOC)) {
				$o = new Subject();
				$o->setName($row["name"]);
				$o->setDescription($row["description"]);
				$o->setId($row["subject_id"]);
				$o->setImage($row["image"]); 
				$o->setLecturesNumber($this->_getCount($this->dbController->countSubjectLectures($row["subject_id"])));
				$o->setTestsNumber($this->_getCount($this->dbController->countSubjectTests($row["subject_id"])));

				array_push($array, $o);
			}
		}
		return $array;
	}

	private function _getCount($respond) {
		if ($respond == null) {
			return 0;
		}
		$data = mysql_fetch_assoc($respond);
		return intval($data["COUNT(*)"]);
	}
}
?>