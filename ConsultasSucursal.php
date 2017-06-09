<?php
include ('conexion.php');
if (isset($_POST['accion'])) {
	if ($_POST['accion']==1) {
		# code...
		# code...
		$Estado = $_POST['Estado'];
		$sql ="SELECT * FROM Sucursales WHERE Estado ='$Estado'";
		$result=$mysqli->query($sql);
		while ($fila=$result->fetch_assoc()){?>
			<div class="col-sm-3 align-self-stretch" name="Infos" id="Infos">
		        <button class="btn btn-link"  value="<?php echo $fila['Municipio']; ?>"  name="btn_Suc" id="btn_Suc">
					<b><?php echo $fila['NombreSucursal']; ?></b>
				</button>
				<p><?php echo "Calle: ".$fila['Calle']." No. ".$fila['Numero']." Col. ".$fila['Colonia']. ", ".$fila['Municipio'].", ".$fila['Estado'].",  C.P. ".$fila['CP'] ; ?><br>
					Tel: <?php echo  $fila['Telefono']; ?><br>
					<?php echo $fila['Email']; ?>
			</p>
			</div>
<?php 	} // END while
	}//If accion==1
		if ($_POST['accion']==2) {
		$Mun = $_POST['Mun'];
		$sql2 ="SELECT * FROM Sucursales WHERE Municipio ='$Mun'";
		$result2=$mysqli->query($sql2);
		$Num = $result2->num_rows;
		while ($fila=$result2->fetch_assoc()){?>
			<div class="col-sm-12">
				<img class="img-responsive" 
				src="img/sucursales/img_sucursal/<?php echo $fila['UrlFoto']?>.jpg" alt="">
			    <img class="img-responsive" src="img/sucursales/img_sucursal/<?php echo $fila['UrlFoto']?>.jpg" alt="<?php echo "img/sucursales/img_sucursal/".$fila['UrlFoto'].".jpg"?>"/>
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
?>