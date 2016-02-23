
<?php

	require_once "controllers/SubjectController.php";
	require_once "models/Subject.php";
	require_once "views/SubjectsView.php";

saveCurrentPageAddress();
    $subjects = new SubjectController($dbController);
    $s_view = new SubjectsView($subjects);
    $str = strrev($_SERVER['REQUEST_URI']);
    $set = substr($str, 0, strpos($str, "="));

    $s_view->showMySubjects($set);

    $set = substr($str, 0, strpos($str, "="));
	$address = strrev(substr($str, strpos($str, "=")));
	$set = intval($set);
	$address_f = $address.($set+1);
	$address_b =  $address.($set-1);

	if ($subjects->getCountOfMySubjects() > 0) {  
		echo '<nav><ul class="pager">'; 
		if ($set > 1)
	  		echo '<li class="previous"><a href="'.$address_b.'"><span aria-hidden="true">&larr;</span> Назад</a></li>';
	  	if ($set*10 < $subjects->getCountOfMySubjects())
	  		echo '<li class="next"><a href="'.$address_f.'">Вперед <span aria-hidden="true">&rarr;</span></a></li>'; 		    
		echo '</ul></nav>';
	}
	else {
		echo '<h2 align="center" class="text-info">Вы не подписаны ни на один предмет</h2>';
	}
?>