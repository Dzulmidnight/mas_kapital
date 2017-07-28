<?php
	//$mysqli = new mysqli('10.100.162.223','root','hdmi#2018','maskapital');
	$mysqli = new mysqli('174.136.25.252','maskapit_user','WITK;3I2*d97','maskapit_bd');
	if($mysqli->connect_errno){
		echo "No se puede conectar";
		echo "Error:" .$mysqli->connect_errno()."\n";
		exit;
	}
?>