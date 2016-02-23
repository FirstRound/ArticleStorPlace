		<ul class="nav nav-pills nav-justified">
		  <li role="presentation"><a href="/index.php?page=subject&subject_id=<?echo $_GET["subject_id"]?>">Лекции</a></li>
		  <li role="presentation" class="active"><a href="#">Тесты</a></li>
		</ul>

<?php
	require_once "controllers/TestController.php";
	require_once "models/Test.php";
	require_once "views/TestView.php";
	
saveCurrentPageAddress();
	$tests = new TestController($dbController, $_GET["subject_id"], User::getId());
    $t_view = new TestView($tests);
    $t_view->showAllTests();
?>