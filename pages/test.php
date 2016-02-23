
<?php
	require_once "controllers/QuestionController.php";
	require_once "models/Question.php";
	require_once "views/QuestionView.php";
	
	echo '<div>
			<nav>
			  <ul class="pager">
			    <li class="previous"><a href="'.getPrevPage().'"><span aria-hidden="true">&larr;</span> К тестам</a></li> 
			  </ul>
			</nav>
		 </div>';
	$questions = new QuestionController($dbController, $_GET["test_id"], User::getId());
    $q_view = new QuestionView($questions);
    echo '<div align="center">';
    $q_view->showQuestions($_GET["test_id"]);
    echo '</div';
?>