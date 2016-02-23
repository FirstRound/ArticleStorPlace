<?php
class QuestionController {
	public $dbController; 
	public $test_id;

	function __construct($db = null, $tid = null) {
		$this->dbController = $db;
		$this->test_id = $tid;
	}

	public function getTestQuestions() {
		$array = array();
		if ($this->_isSubscriber()){
			$respond = $this->dbController->getTestQuestions($this->test_id, User::getToken());
			$array = $this->_getObjectsArray($respond);
		}
		return $array; 
	}

	public function sendResults($score) {
		$this->dbController->sendTestResults(User::getId(), $this->test_id, $score, User::getToken());
	}

	//Если есть права на чтение:
	public function _isSubscriber(){
		return true;  
	}


	private function _getObjectsArray($respond) {
		$array = array();
		if ($respond != null) {
			while ($row = mysql_fetch_array($respond, MYSQL_ASSOC)) {
				$o = new Question();
				$o->setQuestion($row["question"]);
				$ans = array($row["ans1"], $row["ans2"], $row["ans3"], $row["ans4"]);
				$o->setAnswers($ans); 
				$o->setCorrect($row["correct"]);
				$o->setId($row["question_id"]);
				array_push($array, $o);
			}
		}
		return $array;
	}
}
?>