<?php
class Subject {
	private $name;          // название предмета.
	private $description;   // описание.
	private $tests_array;   // массив тестов.
	private $id;
	private $image;
	private $lectures_number;
	private $tests_number;
	private $passed_tests;
	private $is_subscriber;

	function __construct($n = "NULL", $desc = "NULL", $tests = "NULL") {
		$this->name = $n;
		$this->description = $desc;
		$this->tests_array = $tests;
	}

	// Геттеры и сеттеры свойств
	//BEGIN
	public function getName() {
		return $this->name;
	}
	public function setName($name_text) {
		$this->name = $name_text;
	}

	public function getTestsArray() {
		return $this->tests_array;
	}
	public function setTestsArray($tests) {
		$this->tests_array = $tests;
	}

	public function getDescription() {
		return $this->description;
	}
	public function setDescription($descr) {
		$this->description = $descr;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($i){
		$this->id = $i;
	}

	public function getImage() {
		return $this->image;
	}
	public function setImage($img) {
		$this->image = $img;
	}

	public function getLecturesNumber() {
		return $this->lectures_number;
	}
	public function setLecturesNumber($num) {
		$this->lectures_number = $num;
	}

	public function getTestsNumber() {
		return $this->tests_number;
	}
	public function setTestsNumber($num) {
		$this->tests_number = $num;
	}

	public function isSubscriber() {
		return $this->is_subscriber;
	}
	public function setSubscription() {
		$this->is_subscriber = true;
	}

	public function getMaterialCoveredLevel() {
		if ($this->tests_number == 0)
			return 0;
		else
			return ($this->passed_tests/$this->tests_number)*100;
	}
	public function setPassedTests($passed) {
		$this->passed_tests = $passed;
	}
	//END




}
?>