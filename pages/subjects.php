
<?php
	require_once "controllers/SubjectController.php";
	require_once "models/Subject.php";
	require_once "views/SubjectsView.php";

    $subjects = new SubjectController($dbController);
    $s_view = new SubjectsView($subjects);
    $str = strrev($_SERVER['REQUEST_URI']);
    $set = substr($str, 0, strpos($str, "="));
    $s_view->showAllSubjects($set); 
	if(isset($_GET["subscript"])) {
	    if ($_GET["subscript"] == 1) {
			$subjects->subscript($_GET["subject_id"]);
		}
		if ($_GET["subscript"] == 0) {
			$subjects->unSubscript($_GET["subject_id"]);
		}
		header("Location: ". substr(substr(getPrevPage(), 0, strpos(getPrevPage(), "&")?strpos(getPrevPage(), "&"):strlen(getPrevPage())), 1, strlen(getPrevPage())));
	}
	saveCurrentPageAddress(); 
?>

<nav> 
  <ul class="pager">
  <?php 
  	$set = substr($str, 0, strpos($str, "="));
	$address = strrev(substr($str, strpos($str, "=")));
	$set = intval($set);
	$address_f = $address.($set+1);
	$address_b =  $address.($set-1);

	echo '<nav><ul class="pager">';
	if ($set > 1) 
			echo '<li class="previous"><a href="'.$address_b.'"><span aria-hidden="true">&larr;</span> Назад</a></li>';
	if ($set*10 < $subjects->getCountOfMySubjects())
			echo '<li class="next"><a href="'.$address_f.'">Вперед <span aria-hidden="true">&rarr;</span></a></li>'; 		    
	echo '</ul></nav>';
    ?>
  </ul>
</nav>

