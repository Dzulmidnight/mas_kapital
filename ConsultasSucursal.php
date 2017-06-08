<?php
include ('conexion.php');
$Estado = $_POST['Estado'];
$sql ="SELECT * FROM Sucursales WHERE Estado ='$Estado'";
$result=$mysqli->query($sql);
while ($fila=$result->fetch_assoc()){?>

	<div class="col-sm-3 align-self-stretch">
        <p>
			<b><?php echo $fila['NombreSucursal']; ?></b>
		</p>
		<p><?php echo "Calle: ".$fila['Calle']." No.".$fila['Numero']." Col. ".$fila['Colonia'].", ".$fila['Municipio'].", ".$fila['Estado']."C.P. ".$fila['CP'] ; ?><br>
			Tel: <?php echo  $fila['Telefono']; ?><br>
			<?php echo $fila['Email']; ?>
		</p>
		</div>
<?php }

?>