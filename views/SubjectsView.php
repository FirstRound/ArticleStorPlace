<?php
class SubjectsView {   
	private $array;
	private $subject_controller;

	function __construct($cont){
		$this->subject_controller = $cont;
	}

	public function showAllSubjects($set) {
		$this->array = $this->subject_controller->getAllSubjests($set);
		foreach($this->array as $subject) {
			$this->_showSubject($subject);
		}
	}


	public function showMySubjects($set) {
		$this->array = $this->subject_controller->getMySubjects($set);
		foreach($this->array as $subject) {
			$this->_showSubject($subject);
		}
	}

	private function _showSubject($s) {   

		echo '<div class="well row">
		<div class = "col-md-4">
		<img width="300" height="200" class="img-rounded" src="'.$s->getImage().'" alt="">
		</div>

		<div class = "col-md-8">
		<h2 class="text-info">'.$s->getName().'
		<br><small>'.$s->getDescription().'</small></h2>
		<h4>Лекций: '.$s->getLecturesNumber().'</h4>
		<h4>Тестов: '.$s->getTestsNumber().'</h4>
		';
		echo '<br />'; 
		$subscript = 'Записаться на курс';
		$btn_style = 'btn-success';
			if ($s->isSubscriber()) {
				$subscript = 'Отписаться от курса';
			 	$subscript_addr = 'subjects&subject_id='.$s->getId().'&subscript=0';
			 	$btn_style = "btn-warning";
			 	$float = 'style="float:right"';
				echo '<div class="progress"> 
						  <div class="progress-bar" role="progressbar" aria-valuenow="'.$s->getMaterialCoveredLevel().'" aria-valuemin="0" aria-valuemax="100" style="width: '.$s->getMaterialCoveredLevel().'%">
						    <span class="sr-only"></span>'.$s->getMaterialCoveredLevel().'% 
						  </div>
					  </div>';  
			 	echo '<vertical-align="bottom"><a href="index.php?page=subject&subject_id='.$s->getId().'" class="btn btn-primary">Войти</a> ';
			}
			else {
				if (User::IsLogin())
					$subscript_addr = 'subjects&subject_id='.$s->getId().'&subscript=1';
				else {
					$subscript_addr = 'login';
					$btn_style = "btn-success";
				}
			}



		echo '<vertical-align="bottom"><a '.$float.'  href="index.php?page='.$subscript_addr.'" class="btn '.$btn_style.'">'.$subscript.'</a>';
		echo '</div>';
		echo '</div>';
	}
}
?>