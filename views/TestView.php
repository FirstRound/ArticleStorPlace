<?php
class TestView {
	private $array;
	private $test_controller;

	function __construct($cont){
		$this->test_controller = $cont;
	}

	public function showAllTests() {
		$this->_setSubjectArray($this->test_controller->getSubjectTests());
		foreach($this->array as $test) {
			$this->_showAllTests($test);
		}
	}
   
	private function _setSubjectArray($array) {
		$this->array = $array;
	}

	private function _showAllTests($t) {
		echo '<div class="well row">';
		echo '<div class = "test-block">';
		echo '<blockquote>';

		echo '<h3 class="text-info">Тест '.$t->getNumber().': '.$t->getName();
		echo '<br><small>';
		echo $t->getDescription();
		echo '</small></h3>';

		echo '<h4>Результат: '.$t->getScore().'</h4>';

		echo '<h5>Попыток: '.$t->getTryes().'</h5>';

		if ($t->getScore() == 0) {
			$name = "Сдать тест";
			$btn_class = "btn btn-default";
		}
		else if ($t->getScore() < 50) {
			$name = "Сдать тест";
			$btn_class = "btn btn-danger";
		}
		else if ($t->getScore() < 70) {
			$name = "Пересдать тест";
			$btn_class = "btn btn-warning";
		}
		else if ($t->getScore() < 90) {
			$name = "Пересдать тест";
			$btn_class = "btn btn-info"; 
		}
		else if ($t->getScore() >= 90) {
			$name = "Тест сдан";
			$btn_class = "btn btn-success disabled";
		}
		echo '<a href="index.php?page=test&subject_id='.$_GET["subject_id"].'&test_id='.$t->getId().'" role="button" class="'.$btn_class.'">'.$name.'</a>'; 

		echo '<br>';
		echo '</blockquote>';
		echo '</div>';
		echo '</div>';
	}
}
?>