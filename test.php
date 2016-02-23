<?php
function PrintResultToPage($question, $var, $type, $id) {
echo "<div align=\"center\">";
	echo "<h2 id = \"question\">" . $question . "</h2>";
	if ($type == 1) {
		for ($i = 0; $i < 4; $i++) {
			echo "<input type=\"radio\" name=\"ans".$id."\" value=\"a".(i+1)."\">" . $var[$i];
		}
	}
	else {
		echo "<input name=\"ans\">";
	}

echo "</div>";
}
/*
	Связь с базой, доставать вопросы по темам
*/

?>