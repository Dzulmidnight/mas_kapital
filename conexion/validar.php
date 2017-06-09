t<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
  require('conexion.php');
  sleep(1);
  session_start();
  $_SESSION['autentificado'] = false;
  $mysqli->set_charset('utf8');

  $usuario = $mysqli->real_escape_string($_POST['usuario']);
  $password = $mysqli->real_escape_string($_POST['password']);

  if($nueva_consulta = $mysqli->prepare("SELECT * FROM usuarios WHERE user = ?")){
    $nueva_consulta->bind_param('s', $usuario);
    $nueva_consulta->execute();
    $resultado = $nueva_consulta->get_result();

    if($resultado->num_rows == 1){
      $datos = $resultado->fetch_assoc();
      if(strcmp($datos['password'],$password) == 0){
        $_SESSION['usuario'] = $datos;
        $_SESSION['autentificado'] = true;
        echo json_encode(array('error' => false, 'tipo' => $datos['tipo']));
      }else{
        echo json_encode(array('error' => true));
      }
    }else{
      echo json_encode(array('error' => true));
    }

    $nueva_consulta->close();
  }
}


$mysqli->close();
/*

if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
  {
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }

    $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;    
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}

if(isset($_POST['ingresar']) && $_POST['ingresar'] == 1){
  // LOGIN ADMINISTRADOR

  $loginUsername = $_POST['usuario'];
  $password = $_POST['password'];
 

  $MM_redirectLoginSuccess = "../sucursales.php";
  $MM_redirectLoginFailed = "../login.php?error=si";
  $MM_redirecttoReferrer = false;

  $loginUsername = $_POST['usuario'];
  $password = $_POST['password'];


  $LoginRS__query=sprintf("SELECT * FROM usuarios WHERE user=%s",
  GetSQLValueString($loginUsername, "text"), 
  GetSQLValueString($password, "text")); 

  $LoginRS = $mysqli->query($LoginRS__query);
  $loginFoundUser = $LoginRS->num_rows;


  if ($loginFoundUser) {

    $loginStrGroup = $LoginRS->fetch_assoc();

  if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    
    if(strcmp($loginStrGroup['password'], $password) == 0){ // validamos que la contraseña sea igual
      echo json_encode(array('error' => false, 'tipo' => $loginStrGroup['tipo']));
      session_start();

      $_SESSION['usuario'] = $loginStrGroup
      $_SESSION["idusuario"] = $loginStrGroup['idusuario'];
      $_SESSION["nombre"] = $loginStrGroup['nombre'];
      $_SESSION['user'] = $loginUsername;     
      $_SESSION["autentificado"] = true;
      $_SESSION["tipo"] = $loginStrGroup['tipo'];
      //$_SESSION["email"] = $loginStrGroup['email'];

      if (isset($_SESSION['PrevUrl']) && false) {
        $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];  
      }
      header("Location: " . $MM_redirectLoginSuccess );
    }else{
      echo json_encode(array('error' => true));
      $_SESSION["autentificado"] = false;
      header("Location: ". $MM_redirectLoginFailed );
    }
  }
  else {
    echo json_encode(array('error' => true));
    $_SESSION["autentificado"] = false;
    header("Location: ". $MM_redirectLoginFailed );
  }
  $mysqli->close();
}
*/?>