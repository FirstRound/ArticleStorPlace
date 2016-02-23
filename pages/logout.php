<?php

	function Logout() {
		return User::Logout(); 
	}

	if(Logout()) 
		header("Location: index.php");
?>
