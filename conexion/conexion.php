<?php 
	$mysqli = new mysqli('localhost','root','','maskapital');
	 mysqli_set_charset($mysqli,'utf8');  
	if($mysqli->connect_errno){
		echo "No se puede conectar";
		echo "Error:" .$mysqli->connect_errno()."\n";
		exit;
	}

?>