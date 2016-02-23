<div align="center">
<?php
include "test.php";
echo "<h2> Тест: </h2>";
$q = mysql_query("SELECT* FROM english", $dbConnect);
print '<pre>';
while ($row = mysql_fetch_array($q, MYSQL_ASSOC)) {
		$a = array(
			  $row["ans1"], 
			  $row["ans2"], 
			  $row["ans3"], 
			  $row["ans4"]
			 );
    	PrintResultToPage($row["question"], $a, $row["type"], $row["question_id"]);
    }
print '</pre>';
?>
</div>