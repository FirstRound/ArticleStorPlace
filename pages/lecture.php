<?php

	require_once "models/Lecture.php";
	require_once "controllers/LectureController.php";
	require_once "views/LecturesView.php";

saveCurrentPageAddress();
    $lecture = new LectureController($dbController, NULL, $_GET["lecture_id"]);
    if ($lecture->countSubjectLectures() != $_GET["lecture_id"]) {
    	$forward_active = '';
    	$forward_address = substr($_SESSION["current_page"], 0, -1).(intval(substr($_SESSION["current_page"], -1, 1))+1);
    }
    else {
    	$forward_active = 'disabled';
    }
    if ($_GET["lecture_id"] != 1) {
    	$backward_active = '';
    	$forward_address = substr($_SESSION["current_page"], 0, -1).(intval(substr($_SESSION["current_page"], -1, 1))-1);
    } 
    else {
    	$backward_active = 'disabled';
    } 
   	echo '
   	<div>
		<nav>
		  <ul class="pager">
		    <li class="previous '.$backward_active.'"><a href="'.$forward_address.'"><span aria-hidden="true">&larr;</span> Предыдущая</a></li>
		    <li class="next '.$forward_active.'"><a href="'.$forward_address.'">Следующая<span aria-hidden="true">&rarr;</span></a></li> 
		  </ul>
		</nav>
	</div>'; 
	$l_view = new LecturesView($lecture); 
    $l_view->showLecture();
?>