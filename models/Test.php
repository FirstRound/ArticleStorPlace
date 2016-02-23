<?php
class Test {
	private $name;          // название предмета.
	private $description;   // описание.
	private $question_array;// массив тестов.
	private $score;        // результат
	private $test_number;   // номер теста по порядку
	private $id;
	private $tryes;         //попыток сдать тест

	function __construct($n = "NULL", $desc = "NULL", $quest = "NULL", $res = "NULL", $num = "NULL") { 
		$this->name = $n;
		$this->description = $desc;
		$this->question_array = $quest;
		$this->result = $res;
		$this->test_number = $num;
		$this->tryes = 0;
		$this->score = 0;
	}

	// Геттеры и сеттеры свойств
	//BEGIN
	public function getName() {
		return $this->name;
	}
	public function setName($name_text) {
		$this->name = $name_text;
	}

	public function getQuestionArray() {
		return $this->tests_array;
	}
	public function setQuestionArray($quest) {
		$this->question_array = $quest;
	}

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($descr) {
		$this->description = $descr;
	}

	public function getScore() {
		return $this->score;
	}
	public function setScore($s) {
		$this->score = $s;
	}

	public function getNumber() {
		return $this->test_number;
	}
	public function setNumber($num) {
		$this->test_number = $num;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($i){
		$this->id = $i;
	}

	public function getTryes() {
		return $this->tryes;
	}
	public function incrementTryes(){
		$this->tryes++;
	}
	//END




}
?>