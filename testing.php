<?php
include "test.php";
include "db/connection.php";
function GetTestingInfo($subjectName) {
	//название теста, его номер. По нажатию кнопки - выход на сдачу этого теста
	//по всем tests из базы посмотреть результат и печатать баллы.
	echo "<div align=\"center\">";
	echo "<h2> Ваши тесты: </h2>";
	$q = mysql_query("select results.score, tests.name, tests.test_id from results, tests", $_SESSION["connect"]);
	if ($q == null)
		return;
	while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
		echo "<h2>".$row["name"]." - ".$row["score"]."</h2>";
		if ((int)$row["score"] <= 70) {
			echo "<a href=\"index.php?tests=\"".$row["subject"]."&".$row["test_id"].">Пересдать</a>";
		}
	}
}
	// Создать таблицы для предметов и доп.таблицы #предмет_test, где хранить тесты этого предмета
function StartTest($testName, $testNumber) {
	echo "<div align=\"center\">";
	echo "<h2> Тест: </h2>";
	$q = mysql_query("SELECT* FROM ".$testName." WHERE test_id=".$testNumber, $_SESSION["connect"]);
	if ($q == null)
		return;

	while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
		$a = array(
			  $row["ans1"], 
			  $row["ans2"], 
			  $row["ans3"], 
			  $row["ans4"]
			 );
		PrintResultToPage($row["question"], $a, $row["type"], $row["question_id"]);
	}
	echo "</div>";
}
?>