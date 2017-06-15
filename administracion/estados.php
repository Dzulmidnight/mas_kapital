<?php
require('../conexion/conexion.php');


$query = "SELECT * FROM estados";
$ejecutar = $mysqli->query($query);

?>
<select class="form-control" name="estado" id="">
<?php 
while($detalle = $ejecutar->fetch_assoc();){
echo "<option values='".$detalle['nombre']."'>".$detalle['nombre']."</option>";
}
 ?>	
</select>

