<?php

class LecturesView { 

	private $array;
	private $lecture_controller;

	function __construct($cont){
		$this->lecture_controller = $cont;
	}

	public function showAllLectures() {
		$this->array = $this->lecture_controller->getAllLectures();
		foreach($this->array as $lecture) {
			$this->_showAllLectures($lecture);
		}
	}

	public function showLecture() { 
		$o = $this->lecture_controller->getLectureByID();
		$this->_showLecture($o);
	}

	private function _cropStr($str, $size){ 
  		return mb_substr($str,0,mb_strrpos(mb_substr($str,0,$size,'utf-8'),' ',utf-8),'utf-8');
	}

	private function _showAllLectures($l) {
		echo '<div class="well row">
		<div class = "col-md-4">
		<iframe width="300" height="200" src="'.$l->getVideo().'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class = "col-md-8 ">
		<h3 class="text-info">Лекция '.$l->getNumber().': '.$l->getName().' 
		<br><small>'.$this->_cropStr($l->getDescription(), 600).'...'.'</small></h3>
		'; 
		if (User::IsLogin())
			$address = 'lecture&lecture_id='.$l->getId();
		else {
			$address="login"; 
		}
		echo '<br /><p vertical-align="bottom"><a href="index.php?page='.$address.'" class="btn btn-primary">Подробнее</a></p>'; 


		echo '</div>
		</div>';
	}

	private function _showLecture($l) { 
		echo '<div class="well row">';
		echo '<div align="center"><h4 class="text-info">Лекция '.$l->getNumber().': '.$l->getName().'<h4>
			<div class="bs-example" data-example-id="responsive-embed-16by9-iframe-youtube">
		    <div class="embed-responsive embed-responsive-16by9">
		      <iframe class="embed-responsive-item" src="'.$l->getVideo().'" allowfullscreen></iframe>
		    </div>
  </div>
			</div>';
		echo '<br />';
		echo '<div class="panel panel-info">
				  <div class="panel-heading" align = "center">
				  	<h4>Описание</h4>
				  </div>
				  <div style="margin:10px 10px 10px 10px; ">
					  <p>'.$l->getDescription().'
					  </p>
				  </div>
			  </div>';

		echo '</div>';
	}

}
?>