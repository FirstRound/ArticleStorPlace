<?php
class DataBaseController {
	private $database;
	private $connection;

	function __construct($db){
		$this->database = $db;
	}

	function __destruct() {
       $this->Disconnect();
    }

	public function Connect() {
		$this->connection = mysql_connect($this->database->getHost(), $this->database->getUser(), $this->database->getPassword());
		if ($this->connection != null) {
			mysql_select_db($this->database->getName(), $this->connection);
		}
		else {
			throw new Exception('Не удалось подключиться к базе.');
		}
	}

	public function Disconnect() {
		mysql_close($this->connection);
	}

	//Получить данные
	//BEGIN

	// Лимитировать выдачу
	public function getAllSubjects($set) {
		$request = 'SELECT * FROM subjects LIMIT '.((intval($set)-1)*10).', '.((intval($set)*10)-1);
		$respond = $this->sendRequest($request);
		return $respond;
	}

	public function countSubjects($token) {
		if ($this->isAuthorize($token)) { 
			$request = 'SELECT COUNT(*) FROM subjects';
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function countMySubjects($user_id, $token) {
		if ($this->isAuthorize($token)) { 
			$request = 'SELECT COUNT(*) FROM subjects, subscription WHERE subjects.subject_id = subscription.subject_id AND subscription.user_id ='.$user_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function countLecturesByLectureId($lecture_id, $token) {  
		if ($this->isAuthorize($token)) { 
			$request = 'SELECT COUNT(*) FROM lecture WHERE lecture.subject_id = (SELECT subject_id FROM lecture WHERE lecture_id='.$lecture_id.')';
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function countSubjectLectures($subject_id) { 
		$request = 'SELECT COUNT(*) FROM lecture WHERE lecture.subject_id ='.$subject_id;
		$respond = $this->sendRequest($request);
		return $respond;
	}

	public function countSubjectTests($subject_id) { 
		$request = 'SELECT COUNT(*) FROM tests WHERE tests.subject_id ='.$subject_id;
		$respond = $this->sendRequest($request);
		return $respond;
	}

	// Лимитировать выдачу 
	public function getUsersSubjects($set, $user_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'SELECT * FROM subjects, subscription WHERE subjects.subject_id = subscription.subject_id AND subscription.user_id ='.$user_id.' LIMIT '.((intval($set)-1)*10).', '.((intval($set)*10)-1);
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function sendTestResults($user_id, $test_id, $score, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'INSERT INTO results (user_id, test_id, score) VALUES ('.$user_id.', '.$test_id.', '.$score.')';
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function subscriptToSubject($subject_id, $user_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'INSERT INTO subscription (subject_id, user_id) VALUES ('.$subject_id.', '.$user_id.')';
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function unSubscriptToSubject($subject_id, $user_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'DELETE FROM subscription WHERE subject_id='.$subject_id.' and user_id='.$user_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function getAllUserSubscripts($user_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'SELECT subject_id FROM subscription WHERE user_id='.$user_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function isUserSubscript($subject_id, $user_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'SELECT subscription_id FROM subscription WHERE subject_id='.$subject_id.' and user_id='.$user_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	//Выбирать только тесты этого пользователя
	public function getAllTestsFormSubject($subject, $token) {
		if ($this->isAuthorize($token)) {
			$request = "SELECT * FROM tests WHERE subject_id=".$subject;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function getTestsScores($user_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = "SELECT * FROM results where user_id=".$user_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function getTestFromSubject($subject, $test_num) {

	}

	public function getSubjectLectures($subject_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'SELECT * FROM lecture WHERE subject_id = '.$subject_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}

	public function getLecture($lecture_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'SELECT * FROM lecture WHERE lecture_id = '.$lecture_id;
			$respond = $this->sendRequest($request);
		}
		return $respond; 
	}

	public function validateUser($name, $password) { 
		$request = 'SELECT name, password, user_id FROM users where name="'.$name.'" and password="'.$password.'"';
		$respond = $this->sendRequest($request);
		return $respond; 
	}

	public function registrateUser($name, $password) {
		$request = 'SELECT user_id FROM users where name="'.$name.'"';
		$respond = $this->sendRequest($request);
		if ($respond != null) {
			$request = 'INSERT INTO users (name, password) VALUES ("'.$name.'", "'.$password.'")';
			$respond = $this->sendRequest($request);
			var_dump($respond);
		}
		return $respond;
	}

	public function updateUsersToken($user_id, $token) {
		$request = "UPDATE users SET token='".$token."' WHERE user_id='".$user_id."'";
		$respond = $this->sendRequest($request);
		return $respond; 
	}

	public function getTestQuestions($test_id, $token) {
		if ($this->isAuthorize($token)) {
			$request = 'SELECT * FROM question WHERE test_id='.$test_id;
			$respond = $this->sendRequest($request);
		}
		return $respond;
	}
	//END


	//Добавить данные в базу
	//BEGIN
	public function addSubject($new_subject) {

	}

	public function addTestToSubject($subject, $test) {

	}

	public function addQuestionToTest($question) {
		
	}

	public function addUser($user) {

	}
	//END


	//Удалить данные из базы
	//BEGIN
	public function deleteSubject($new_subject) {

	}

	public function deleteTestToSubject($subject, $test) {

	}

	public function deleteQuestionToTest($question) {
		
	}

	public function deleteUser($user) {

	}
	//END

	//Связь с базой
	private function sendRequest($request){
		$respond = mysql_query($request, $this->connection);
		if ($respond != null) {
			return $respond;
		}
		else{
			return null;
		}
	}

	private function isAuthorize($token) {
		$request = 'SELECT user_id FROM users WHERE token="'.$token.'"';
		$data = mysql_fetch_assoc($this->sendRequest($request));
		if ($data != null) {
			return true;
		}
		return false;
	}



}
?>