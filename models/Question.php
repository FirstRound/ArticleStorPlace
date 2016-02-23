<?php
class Question {
	private $question_text; // текст вопроса.
	private $answers_array; // массив ответов.
	private $correct_answer;//номер правильного ответа
	private $id;

	function __construct($quest = "NULL", $ans = "NULL", $correct = "NULL"){
		$this->question_text = $quest;
		$this->answers_array = $ans;
		$this->correct_answer = $correct;
	}

	// Геттеры и сеттеры свойств
	//BEGIN
	public function getQuestion() {
		return $this->question_text;
	}
	public function setQuestion($text) {
		$this->question_text = $text;
	}

	public function getAnswers() {
		return $this->answers_array;
	}
	public function setAnswers($ans) {
		$this->answers_array = $ans;
	}

	public function getCorrect() {
		return $this->correct_answer;
	}
	public function setCorrect($correct) {
		$this->correct_answer = $correct;
	}

	public function getId(){
		return $this->id;
	} 
	public function setId($i){
		$this->id = $i;
	}
	//END




}
?>