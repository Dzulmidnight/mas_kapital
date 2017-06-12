<?php
include ('conexion.php');
if (isset($_POST['accion'])) {
	if ($_POST['accion']==1) {
		# code...
		$Estado = $_POST['Estado'];
		

		$sqlM = "UPDATE sucursales SET MapaActivo= 0 WHERE MapaActivo = 1";
		$mysqli->query($sqlM);

		$sqlM = "UPDATE sucursales SET MapaActivo= 1 WHERE Estado ='$Estado'";
		$mysqli->query($sqlM);


		$sql ="SELECT * FROM Sucursales WHERE Estado ='$Estado'";

		$result=$mysqli->query($sql);
		?><div class="col-md-12 h2"><?php echo $Estado ?></div><?php
		while ($fila=$result->fetch_assoc()){?>
			<div class="col-sm-3 text-justify" name="Infos" id="Infos" style="height: 10em">
		        <button class="btn btn-link"  value="<?php echo $fila['Municipio']; ?>"  name="btn_Suc" id="btn_Suc">
					<b><?php echo $fila['NombreSucursal']; ?></b>
				</button>
				<p><?php echo "Calle: ".$fila['Calle']." No. ".$fila['Numero']." Col. ".$fila['Colonia']. ", ".$fila['Municipio'].", ".$fila['Estado'].",  C.P. ".$fila['CP'] ; ?><br>
					Tel: <?php echo  $fila['Telefono']; ?><br>
					<?php echo $fila['Email']; ?>
			</p>
			</div>
<?php 	}// END while ?>

<?php
	}//If accion==1

	if ($_POST['accion']==2) {
		$Mun = $_POST['Mun'];
		$sql2 ="SELECT * FROM Sucursales WHERE Municipio ='$Mun'";
		$result2=$mysqli->query($sql2);
		$Num = $result2->num_rows;
		while ($fila=$result2->fetch_assoc()){?>
			<div class="col-sm-12 ">
			    <img class="img-responsive" src="img/sucursales/img_sucursal/<?php echo $fila['UrlFoto']?>.jpg" alt="<?php echo "".$fila['UrlFoto'].".jpg"?>"/>
		        <p>
					<b><?php echo $fila['NombreSucursal']; ?></b>
				</p>
				<p><?php echo "Calle: ".$fila['Calle']." No. ".$fila['Numero']." Col. ".$fila['Colonia']. ", " .$fila['Municipio']. ", " .$fila['Estado']. ",  C.P. ".$fila['CP'] ; ?><br>
					Tel: <?php echo  $fila['Telefono']; ?><br>
					<?php echo $fila['Email']; ?>
			</p>
			</div>
<?php 	} // END while
	}//If accion==2
}

