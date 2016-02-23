
	<ul class="nav nav-pills nav-justified">
	  <li role="presentation" class="active"><a href="#">Лекции</a></li>
	  <li role="presentation"><a href="/index.php?page=tests&subject_id=<?echo $_GET["subject_id"]?>">Тесты</a></li>
	</ul> 

	<?php
	
		require_once "models/Lecture.php";
		require_once "controllers/LectureController.php";
		require_once "views/LecturesView.php";

	    $lectures = new LectureController($dbController, $_GET["subject_id"]);
	    $l_view = new LecturesView($lectures);
	    $l_view->showAllLectures(); 
		saveCurrentPageAddress();
	?>
