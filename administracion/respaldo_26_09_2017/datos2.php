<?php
require('../conexion/conexion.php');
/*$estado = $_POST['estado'];

$query = "SELECT * FROM Sucursales WHERE Estado = '$estado'";
$consultar = $mysqli->query($query);

echo "<select class='form-control' name='sucursal'>";
  while($sucursales = $consultar->fetch_assoc()){
    echo "<option value='".$sucursales['idSucursales']."'>".$sucursales['NombreSucursal']."</option>";
  }
echo "</select>";*/
$nueva_seccion = $_POST['nueva_seccion'];

$query = "INSERT INTO secciones_faq (nombre) VALUES ('$nueva_seccion')";
$insertar = $mysqli->query($query);

$query = "SELECT * FROM secciones_faq";
$consultar = $mysqli->query($query);
while($secciones = $consultar->fetch_assoc()){
  echo '<option value="'.$secciones['id_seccion'].'">'.$secciones['nombre'].'</option>';
}

?>

