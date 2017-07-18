<?php

	$mysqli = new mysqli('10.100.162.223','root','hdmi#2018','maskapital');

	if($mysqli->connect_errno){
		echo "No se puede conectar";
		echo "Error:" .$mysqli->connect_errno()."\n";
		exit;
	}


?>



