<?php
 // grab recaptcha library
//require_once "recaptchalib.php";
require('conexion/conexion.php'); 
/*if(isset($_POST['enviar_denuncia']) && $_POST['enviar_denuncia'] == 1){
    $nombre_denunciante = $_POST['nombre_denunciante'];
    $estado_denunciante = $_POST['estado_denunciante'];
    $telefono_denunciante = $_POST['telefono_denunciante'];
    $nombre_denuncia = $_POST['nombre_denuncia'];
    $sucursal = $_POST['sucursal'];
    $otro_departamento = $_POST['otro_departamento'];
    $motivo = $_POST['motivo'];
    $descripcion = $_POST['descripcion'];
    $fecha = time();

    $query = "INSERT INTO frm_denuncia (nombre_denunciante, estado_denunciante, telefono_denunciante, nombre_denuncia, sucursal, otro_departamento, motivo, descripcion, fecha) VALUES ('$nombre_denunciante', '$estado_denunciante', '$telefono_denunciante', '$nombre_denuncia', '$sucursal', '$otro_departamento', '$motivo', '$descripcion', '$fecha')";
    $insertar = $mysqli->query($query);
}
*/

echo "hello w";
