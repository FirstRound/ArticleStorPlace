<?php
class QuestionView { 

	private $array;
	private $question_controller;
	private $score;

	function __construct($cont){
		$this->question_controller = $cont;
	}

	public function showQuestions($test_id) {
		$this->array = $this->question_controller->getTestQuestions(); 
		$this->_defineForm($test_id);
		$i = 0;
		foreach($this->array as $question) {
			$this->_showQuestion($question, $i++);
		}
		$this->_showSubmitButton();
		$this->_closeForm();

	} 

	public function showAnswers($array) { 
		$this->array = $this->question_controller->getTestQuestions();
		$correct = 0;
		foreach($this->array as $question) {
			$this->_showAnswer($question, $array[$question->getId()]);  
			if ($array[$question->getId()] == $question->getCorrect()) {
				$correct++; 
			}
		}
		if ($correct > 0)
			$score = ($correct*100)/count($array);
		else 
		$score = 0; 
		$this->_showResults($score); 
		$this->question_controller->sendResults($score);
	}

	public function showResults($array) {
		$this->array = $this->question_controller->getTestQuestions();
		foreach($this->array as $question) { 
			if ($array[$question->getId()] == $question->getCorrect()) {
				$correct++; 
			}
		}
		if ($correct > 0)
			$score = ($correct*100)/count($array);
		else 
		$score = 0; 
		$this->_showResults($score);
	}

	private function _showResults($score) {
		echo '<div> <h2>Ваш результат: '.$score.' баллов</h2> </div>';
		if ($score < 90) {
			echo '<br /><a class="btn btn-primary" href="index.php?page=test&test_id='.$_GET["test_id"].'">Пересдать</a>'; 
		}
	}

	private function _defineForm($test_id) {
		echo '<form method="post" action = "index.php?page=results&subject_id='.$_GET["subject_id"].'&test_id='.$test_id.'">';
	}

	private function _closeForm() {
		echo '</form>'; 
	}

	private function _showSubmitButton() {
		echo '<br />';
		echo '<button type = "submit" class = "btn btn-success">Проверить</button>';
	}

	private function _showQuestion($q, $i) {
		echo '<div class = "well">';
		$ans = $q->getAnswers();
		echo '<h3>'.$q->getQuestion().'</h3>';
		echo '<br />';
		echo '<div class="btn-group-vertical" data-toggle="buttons">
				  <label class="btn btn-primary">
				    <input type="radio" name="options['.$q->getId().']" id="'.$i.'" autocomplete="off" value="0"> '.$ans[0].'
				  </label>
				  <label class="btn btn-primary">
				    <input type="radio" name="options['.$q->getId().']" id="'.$i.'" autocomplete="off" value="1"> '.$ans[1].'
				  </label>
				  <label class="btn btn-primary">
				    <input type="radio" name="options['.$q->getId().']" id="'.$i.'" autocomplete="off" value="2"> '.$ans[2].'
				  </label>
				  <label class="btn btn-primary">
				  <input type="radio" name="options['.$q->getId().']" id="'.$i.'" autocomplete="off" value="3"> '.$ans[3].'
				  </label>
			  </div>';
		echo '</div>';
	} 

	public function _showAnswer($q, $answer) {    
		$i = 0;   
		echo '<div class = "well">'; 
		$ans = $q->getAnswers();
		if ($answer == $q->getCorrect()) {
			$question_color = 'style="color: #228B22"';
			$style = 'btn-success';
		}
		else {
			$question_color = 'style="color: #e83547"';
			$style = 'btn-danger';
		}
		echo '<h3 '.$question_color.'>'.$q->getQuestion().'</h3>'; 
		echo '<br />';
		echo '<div class="btn-group-vertical" data-toggle="buttons">
				  <label class="btn '.$style.'" disabled>
				    <input type="radio" autocomplete="off" value="0"> '.$ans[0].'
				  </label>
				  ';
				  $i++;
				  echo '<label class="btn '.$style.'" disabled>
				    <input type="radio" autocomplete="off" value="1"> '.$ans[1].'
				  </label>
				  ';
				  $i++;
				  echo '<label class="btn '.$style.'" disabled>
				    <input type="radio" autocomplete="off" value="2"> '.$ans[2].'
				  </label>';
				  $i++;
				  echo '<label class="btn '.$style.'"  disabled>
				  <input type="radio" autocomplete="off" value="3"  disabled> '.$ans[3].'
				  </label>
			  </div>';
		echo '</div>';

	}

	public function _showAnswerDetail($q, $answer) {   
		$i = 0;   
		echo '<div class = "well">'; 
		$ans = $q->getAnswers();
		if ($answer == $q->getCorrect()) {
			$question_color = 'style="color: #228B22"';
		}
		else {
			$question_color = 'style="color: #e83547"';
			$w = 'e83547';
		}
		echo '<h3 '.$question_color.'>'.$q->getQuestion().'</h3>'; 
		echo '<br />';
		echo '<div class="btn-group-vertical" data-toggle="buttons">
				  <label class="btn '.$this->_radioAnswerStyle($q, $i, $answer).'" disabled>
				    <input type="radio" autocomplete="off" value="0"> '.$ans[0].'
				  </label>
				  ';
				  $i++;
				  echo '<label class="btn '.$this->_radioAnswerStyle($q, $i, $answer).'" disabled>
				    <input type="radio" autocomplete="off" value="1"> '.$ans[1].'
				  </label>
				  ';
				  $i++;
				  echo '<label class="btn '.$this->_radioAnswerStyle($q, $i, $answer).'" disabled>
				    <input type="radio" autocomplete="off" value="2"> '.$ans[2].'
				  </label>';
				  $i++;
				  echo '<label class="btn '.$this->_radioAnswerStyle($q, $i, $answer).'"  disabled>
				  <input type="radio" autocomplete="off" value="3"  disabled> '.$ans[3].'
				  </label>
			  </div>';
		echo '</div>';

	}

	private function _radioAnswerStyle($q, $i, $answer){
		if ($q->getCorrect() == $i) {
			return "btn-success";
		}
		else if (($answer == $i) and ($answer != $q->getCorrect())) {
			return "btn-danger";
		}
		return "btn-primary";
	}


}
?>