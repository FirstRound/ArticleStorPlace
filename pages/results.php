<?php

	require_once "controllers/QuestionController.php";
	require_once "models/Question.php";
	require_once "views/QuestionView.php"; 
	
	echo '<div>
			<nav>
			  <ul class="pager">
			    <li class="previous"><a href="index.php?page=tests&subject_id='.$_GET["subject_id"].'"><span aria-hidden="true">&larr;</span>Назад к тестам</a></li> 
			  </ul> 
			</nav>
		 </div>';  

	$questions = new QuestionController($dbController, $_GET["test_id"], User::getId());
    $q_view = new QuestionView($questions);
    echo '<div align="center">';
    // Возможность не показывать ответы сразу
    /*
    if (isset($_GET["show_correct"])) {
    	$q_view->showAnswers($_POST["options"]);
    }
    else {
    	$q_view->showResults($_POST["options"]);
    	echo '<a class="btn btn-primary" href="'.$_SERVER['REQUEST_URI'].'&show_correct=1">Показать правильные ответы</a>';
    }
    */

	$q_view->showAnswers($_POST["options"]);

    echo '</div';

?>