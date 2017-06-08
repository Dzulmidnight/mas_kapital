<?php 
	require('../conexion/sesion.php');

	if(isset($_SESSION['usuario'])){
		if($_SESSION['usuario']['tipo'] != 'administrador'){
		    header('Location: conexion/salir.php');
		}
	}
 ?>
INICIO DE SESIÓN DE ADMINSITRADOR

<a href="../conexion/salir.php">Cerrar Sesión</a>