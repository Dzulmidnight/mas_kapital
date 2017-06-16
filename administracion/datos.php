<?php
require('../conexion/conexion.php');
$estado = $_POST['estado'];

$query = "SELECT * FROM Sucursales WHERE Estado = '$estado'";
$consultar = $mysqli->query($query);

echo "<select class='form-control' name='sucursal'>";
  while($sucursales = $consultar->fetch_assoc()){
    echo "<option value='".$sucursales['idSucursales']."'>".$sucursales['NombreSucursal']."</option>";
  }
echo "</select>";

?>
