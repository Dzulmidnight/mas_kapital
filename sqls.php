<?php
include ('conexion.php');

if(isset($_POST['Ax'])){

	if($_POST['Ax']==1){
			$Compania =$_POST['Compania'];
			$FechaInicio =$_POST['FechaInicio'];
			$FechaTermino =$_POST['FechaTermino'];
			$Direccion =$_POST['Direccion'];
			$Telefono =$_POST['Telefono'];
			$Puesto =$_POST['Puesto'];
			$Motivo =$_POST['Motivo'];
			$Salario =$_POST['Salario'];
			$NombreJefe =$_POST['NombreJefe'];
			$PuestoJefe =$_POST['PuestoJefe'];
			$Informacion =$_POST['Informacion'];
			$Porque =$_POST['Porque'];
			$Ax =$_POST['Ax'];

            $sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
            $idsol=$mysqli->query($sql2);
            $resultado=$idsol->fetch_assoc();

			$sql ="INSERT INTO Empleos (idSolicitante,Compania,FechaInicio,FechaTermino,Direccion,Telefono,Puesto,Motivo,Salario,NombreJefe,PuestoJefe,Informacion,Porque) VALUES('$resultado[idSolicitante]','$Compania','$FechaInicio','$FechaTermino','$Direccion','$Telefono','$Puesto','$Motivo','$Salario','$NombreJefe','$PuestoJefe','$Informacion','$Porque')";
			$mysqli->query($sql);

			$sqlEmp = "SELECT idEmpleos,Compania,Puesto FROM Empleos WHERE idSolicitante=$resultado[idSolicitante]";

			$result=$mysqli->query($sqlEmp);
			?> <option value="0">Empleos Anteriores:</option> <?php

			while ($fila=$result->fetch_row()) {
			?>
                 <option value=" <?php echo $fila[0]; ?>"> <?php echo "$fila[1] - $fila[2]";?></option>
            <?php }
}
if($_POST['Ax']==2){ //Eliminar Trabajo
	$Trabajo= $_POST['Trabajo'];

	$sql = "DELETE FROM Empleos WHERE idEmpleos='$Trabajo'";
	$mysqli->query($sql);

            $sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
            $idsol=$mysqli->query($sql2);
            $resultado=$idsol->fetch_assoc();
            
			$sqlEmp = "SELECT idEmpleos,Compania,Puesto FROM Empleos WHERE idSolicitante=$resultado[idSolicitante]";

			$result=$mysqli->query($sqlEmp);
			?> <option value="0">Empleos Anteriores:</option> <?php

			while ($fila=$result->fetch_row()) {
			?>
                 <option value=" <?php echo $fila[0]; ?>"> <?php echo "$fila[1] - $fila[2]";?></option>
            <?php }

}

	if($_POST['Ax']==3){ 
		$emp = $_POST['combo'];
		$sql="SELECT * FROM Sucursales WHERE Estado='$emp[0]' OR Municipio='$emp[0]'";
		$result=$mysqli->query($sql);

		while ($fila=$result->fetch_row()){

			$sql2="SELECT * FROM Vacantes WHERE idSucursales='$fila[0]'";
			$result2=$mysqli->query($sql2); 
			while ($fila2=$result2->fetch_row()){
				?>
			<? 
			$sql3="UPDATE Vacantes SET Activo='1' WHERE idVacantes=$fila2[0]";
			$mysqli->query($sql3);
			 $espacio = " ";
				$clase1 = str_replace($espacio, "",$emp[0]);
				$clase2 = str_replace($espacio,"",$fila[3]);
			?>
			<div class="col-md-12 <?echo $clase2 ; ?>" style="border: 0.2em solid #8787b7; margin-top: 1em"
			<div class="row">
			<div class="col-md-12"><label style="color:green"><? echo $fila2[1];//Puesto ?></label></div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
						<div class="col-md-12"><label><? echo $fila[1];//Nombre de Sucursal  ?></label></div>

						<div class="col-md-6"><p style="margin: 0px">Salario: <? echo $fila2[3] ; ?></p></div>
						<div class="col-md-6"><p style="margin: 0px">Jornada: <? echo $fila2[4] ; ?></p></div>
						</div>
					</div>
					<div class="col-md-4">
					<button onclick="btnPostularse(<? echo $fila2[0];?>)" style="background-color:#8787b7" class="btn btn-primary btn-block">Postularse</button>
					</div>
					<div class="col-md-12"><p style="margin: 0px">Tipo de Contrato:<? echo $fila2[5] ; ?></p></div>

				</div>
			</div>
			</div>
			</div>	
		<?php
		} //WHILE
	}//While

	}//AX=3
	if($_POST['Ax']==4) { //Marcar Vacante como inactiva
		$emp = $_POST['combo'];
		foreach ($emp as $valor){
		$sql="SELECT * FROM Sucursales WHERE Estado='$valor' OR Municipio='$valor'";
		$result=$mysqli->query($sql);
		while ($fila=$result->fetch_row()){

			$sql2="SELECT * FROM Vacantes WHERE idSucursales='$fila[0]'";
			$result2=$mysqli->query($sql2); 
			while ($fila2=$result2->fetch_row()){
				?>
			<? 
				// if ($fila2[6]==1) {
				// $sql3="UPDATE Vacantes SET Activo='0' WHERE idVacantes=$fila2[0]";
				// $mysqli->query($sql3);
				// }
			}
		}
	}
	}//Ax==4
	if ($_POST['Ax']==5) {
		$idVacante=$_POST['idVacante'];

		$sql2="SELECT * FROM Vacantes WHERE idVacantes=$idVacante";
		$res2=$mysqli->query($sql2);
		$fila2=$res2->fetch_assoc();
		?>
        <div class="col-md-12" style="background-color: green; color: white ">
		<label class="h4"><? echo $fila2['Puesto'] ?></label>
		</div>
		<div class="col-md-12">
			<p style="margin: 0em">Requisitos</p>
		<?php
		$sql="SELECT Requisito FROM Requisitos WHERE idVacantes=$idVacante";
		$res=$mysqli->query($sql);
		 while ($fila=$res->fetch_assoc()) {?>
			<p style="margin: 0em">-<?	echo $fila['Requisito'];?></p><?
			}
		?><p style="margin: 1em 0em 0em">Ofrecemos</p> <?php
		$sql3="SELECT Ofrecemos FROM Requisitos WHERE idVacantes=$idVacante";
		$res3=$mysqli->query($sql3);
		 while ($fila3=$res3->fetch_assoc()) {
		 	if ($fila3['Ofrecemos']!="") {
		 		# code...
		 	
		 	?>

		 <p style="margin: 0em">-<?	echo $fila3['Ofrecemos'];?></p><?
			}} ?>
		</div>
		<?
	}
}

if(isset($_POST['parte']))
	{
		if ($_POST['parte']==0) {
			
            $sql="INSERT INTO Solicitante(Nombre) VALUES ('NuevoR')";
            $mysqli->query($sql);

            $sql2="SELECT idSolicitante FROM Solicitante WHERE Nombre='NuevoR' ORDER BY idSolicitante DESC LIMIT 1";
            $idsol=$mysqli->query($sql2);
            $resultado=$idsol->fetch_assoc();

            $sql="INSERT INTO SolicitudTrabajo(idSolicitante,Puesto,SueldoDeseado,Seccion,Estatus) VALUES('$resultado[idSolicitante]','NP','0','0','1')";        
            $mysqli->query($sql);

            $sql ="INSERT INTO Conocimientos(idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO DatosEconomicos (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO DatosGenerales (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO Documentacion (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO EdoSalud (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO Escolaridad (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO Esposa (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO Madre (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO PadreSol (idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
			$sql ="INSERT INTO RefFamiliar (idSolicitante,NumF) VALUES('$resultado[idSolicitante]','1')";
			$mysqli->query($sql);
			$sql ="INSERT INTO RefFamiliar (idSolicitante,NumF) VALUES('$resultado[idSolicitante]','2')";
			$mysqli->query($sql);
			$sql="INSERT INTO DomSolicitante(idSolicitante) VALUES('$resultado[idSolicitante]')";
			$mysqli->query($sql);
		}





		if ($_POST['parte']==2) {

			$Sueldo = $_POST['sueldoM'];
			$ApPaterno = $_POST['ApPaterno'];
			$ApMaterno = $_POST['ApMaterno'];
			$Nombre = $_POST['Nombre'];
			$Edad = $_POST['Edad'];
			$TelCasa = $_POST['Telefono'];
			$TelCelular = $_POST['Celular'];
			$Correo = $_POST['Email'];
			$TiempoRes = $_POST['TiempoR'];
			$ViveCon = $_POST['ViveCon'];
			$EspViveCon = $_POST['EspVive'];
			$Dependientes = $_POST['Dependientes'];
			$EdoCivil = $_POST['EdoCivil'];
			$EspEdoCivil = $_POST['EspEC'];

			$Estatus = 1;
			$Puesto = $_POST['Puesto'];


			$Calle = $_POST['Calle'];
			$NumExt = $_POST['Numero'];
			$NumInt = $_POST['NumInt'];
			$Colonia = $_POST['Colonia'];
			$Municipio = $_POST['Municipio'];
			$Estado = $_POST['Estado'];
			$CP = $_POST['Cp'];


			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();


			$sql="UPDATE Solicitante SET ApMaterno='$ApMaterno', ApPaterno='$ApPaterno', Nombre='$Nombre', Edad='$Edad', TelCasa='$TelCasa', TelCelular='$TelCelular', Correo='$Correo', TiempoRes='$TiempoRes', ViveCon='$ViveCon', EspViveCon='$EspViveCon', Dependientes='$Dependientes', EdoCivil='$EdoCivil', EspEdoCivil='$EspEdoCivil' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			$sql="UPDATE SolicitudTrabajo SET Puesto='$Puesto', SueldoDeseado='$Sueldo', Seccion='$_POST[parte]', Estatus='$Estatus' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);


			$sql ="UPDATE DomSolicitante SET Calle='$Calle', NumExt='$NumExt', NumInt='$NumInt', Colonia='$Colonia', Municipio='$Municipio', Estado='$Estado', CP='$CP' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			?>
			<script type="text/javascript">
			$(document).ready(function() {
			$('#result').load('parte2.php');
			 });
			</script>
			<?php
		}

		if ($_POST['parte']==3) {
			$Curp = $_POST['Curp'];
			$Rfc = $_POST['Rfc'];
			$Imss = $_POST['Imss'];
			$Licencia = $_POST['Licencia'];
			$NumLicencia = $_POST['NumLicencia'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();

			// $sql = "INSERT INTO Documentacion(idSolicitante,Curp,Rfc,Imms,Licencia,NumLicencia) 
					// VALUES ('$resultado[idSolicitante]','$Curp','$Rfc','$Imss','$Licencia','$NumLicencia')";

			$sql="UPDATE Documentacion SET Curp='$Curp', Rfc='$Rfc', Imms='$Imss', Licencia='$Licencia', NumLicencia='$NumLicencia' WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sql);

			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte3.php');
			 });			
			</script><?php
		}

		 if ($_POST['parte']==4) {
			$Estado = $_POST['Estado'];
			$Padece = $_POST['Padece'];
			$Enfermedad = $_POST['Enfermedad'];
			$Meta = $_POST['Meta'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			
			$sql="UPDATE EdoSalud SET Estado='$Estado', Padece='$Padece', Enfermedad='$Enfermedad', Meta='$Meta' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);			

			?><script type="text/javascript">
				
			$(document).ready(function() {
			$('#result').load('parte4.php');
			 });			
			</script><?php		
		}
		 if ($_POST['parte']==5) {

			$NomP = $_POST['NomP'];
			$ViveP = $_POST['ViveP'];
			$DomP = $_POST['DomP'];
			$OcupP = $_POST['OcupP'];

			$NomM = $_POST['NomM'];
			$ViveM = $_POST['ViveM'];
			$DomM = $_POST['DomM'];
			$OcupM = $_POST['OcupM'];

			$NomE = $_POST['NomE'];
			$ViveE = $_POST['ViveE'];
			$DomE = $_POST['DomE'];
			$OcupE = $_POST['OcupE'];

			$Hijos  = $_POST['Hijos'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

			$sql="UPDATE PadreSol SET Nombre='$NomP', Vive='$ViveP', Domicilio='$DomP', Ocupacion='$OcupP', Hijos='$Hijos' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			$sql="UPDATE Madre SET Nombre='$NomM', Vive='$ViveM', Domicilio='$DomM', Ocupacion='$OcupM' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			$sql="UPDATE Esposa SET Nombre='$NomE', Vive='$ViveE', Domicilio='$DomE', Ocupacion='$OcupE' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			?><script type="text/javascript">
			$(document).ready(function() {
			$('#result').load('parte5.php');
			 });			
			</script><?php		
		}


		 if ($_POST['parte']==6) {

			$Nivel1 = $_POST['Nivel1'];
			$Direccion = $_POST['Direccion'];
			$FechaI = $_POST['FechaI'];
			$FechaF = $_POST['FechaF'];
			$Documento = $_POST['Documento'];
			$Carrera = $_POST['Carrera'];
			$Nivel2 = $_POST['Nivel2'];
			$EscuelaActual = $_POST['EscuelaActual'];
			$CarreraActual = $_POST['CarreraActual'];
			$DiasAsiste = $_POST['DiasAsiste'];
			$Horario = $_POST['Horario'];
			$GradoActual = $_POST['GradoActual'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

$sql="UPDATE Escolaridad SET Escuela='$Nivel1', Direccion='$Direccion', FechaI='$FechaI', FechaF='$FechaF', Documento='$Documento', Carrera='$Carrera', Nivel='$Nivel2', EscuelaAct='$EscuelaActual', Curso='$CarreraActual', Dias='$DiasAsiste', Horario='$Horario', NivelAct='$GradoActual' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte6.php');
			 });			
			</script><?php		
		}	


	 if ($_POST['parte']==7) {

			$Funciones = $_POST['Funciones'];
			$Software = $_POST['Software'];
			$Compania = $_POST['Compania'];
			$FechaInicio = $_POST['FechaInicio'];
			$FechaTermino = $_POST['FechaTermino'];
			$Direccion = $_POST['Direccion'];
			$Telefono = $_POST['Telefono'];
			$Puesto = $_POST['Puesto'];
			$Motivo = $_POST['Motivo'];
			$Salario = $_POST['Salario'];
			$NombreJefe = $_POST['NombreJefe'];
			$PuestoJefe = $_POST['PuestoJefe'];
			$Informacion = $_POST['Informacion'];
			$Porque = $_POST['Porque'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			
			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

			$sql ="UPDATE Conocimientos SET Funciones='$Funciones', Software='$Software' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			// $sql="UPDATE Empleos SET Compania='$Compania', FechaInicio='$FechaInicio',
			// 		 FechaTermino='$FechaTermino', Direccion='$Direccion', Telefono='$Telefono', Puesto='$Puesto', Motivo='$Motivo', Salario='$Salario', NombreJefe='$NombreJefe', PuestoJefe='$PuestoJefe', Informacion='$Informacion', Porque='$Porque' WHERE idSolicitante=$resultado[idSolicitante]";
			// $mysqli->query($sql);
			
			?><script type="text/javascript">
			$(document).ready(function() {
			$('#result').load('parte7.php');
			 });			
			</script><?php		
		}


	 if ($_POST['parte']==8) {

			$Nombre1 = $_POST['Nombre1'];
			$Domicilio1 = $_POST['Domicilio1'];
			$Telefono1 = $_POST['Telefono1'];
			$Ocupacion1 = $_POST['Ocupacion1'];
			$Tiempo1 = $_POST['Tiempo1'];

			$Nombre2 = $_POST['Nombre2'];
			$Domicilio2 = $_POST['Domicilio2'];
			$Telefono2 = $_POST['Telefono2'];
			$Ocupacion2 = $_POST['Ocupacion2'];
			$Tiempo2 = $_POST['Tiempo2'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);


			$sql="UPDATE RefFamiliar SET Nombre='$Nombre1', Domicilio='$Domicilio1', Telefono='$Telefono1', Ocupacion='$Ocupacion1', Tiempo='$Tiempo1' WHERE idSolicitante=$resultado[idSolicitante] AND NumF=1";
			$mysqli->query($sql);

			$sql="UPDATE RefFamiliar SET Nombre='$Nombre2', Domicilio='$Domicilio2', Telefono='$Telefono2', Ocupacion='$Ocupacion2', Tiempo='$Tiempo2' WHERE idSolicitante=$resultado[idSolicitante] AND NumF=2";
			$mysqli->query($sql);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte8.php');
			 });			
			</script><?php		
		}

	 if ($_POST['parte']==9) {
			$ComoSupo = $_POST['ComoSupo'];
			$Pariente = $_POST['Pariente'];
			$Viajar = $_POST['Viajar'];
			$ExpViajar = $_POST['ExpViajar'];
			$Residencia = $_POST['Residencia'];
			$ExpResidencia = $_POST['ExpResidencia'];
			$FechaTrabajar = $_POST['FechaTrabajar'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

			$sql ="UPDATE DatosGenerales SET ComoSupo='$ComoSupo', Pariente='$Pariente', Viajar='$Viajar', ExpViajar='$ExpViajar', Residencia='$Residencia', ExpResidencia='$ExpResidencia', FechaTrabajar='$FechaTrabajar' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte9.php');
			 });			
			</script><?php		
		}

		if ($_POST['parte']==10) {


			$Ingresos = $_POST['Ingresos'];
			$Importe = $_POST['Importe'];
			$Conyuge = $_POST['Conyuge'];
			$IngresoConyuge = $_POST['IngresoConyuge'];
			$CasaPropia = $_POST['CasaPropia'];
			$ValorCasa = $_POST['ValorCasa'];
			$PagaRenta = $_POST['PagaRenta'];
			$ValorRenta = $_POST['ValorRenta'];
			$AutoMovil = $_POST['AutoMovil'];
			$MarcaAuto = $_POST['MarcaAuto'];
			$ModeloAuto = $_POST['ModeloAuto'];
			$Adeudo = $_POST['Adeudo'];
			$ImporteAdeudo = $_POST['ImporteAdeudo'];
			$AbonoAdeudo = $_POST['AbonoAdeudo'];
			$GastosMensuales = $_POST['GastosMensuales'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();

			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte], Estatus='0' WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);


			$sql="UPDATE DatosEconomicos SET Ingresos='$Ingresos', Importe='$Importe', Conyuge='$Conyuge', IngresoConyuge='$IngresoConyuge', CasaPropia='$CasaPropia', ValorCasa='$ValorCasa', PagaRenta='$PagaRenta', ValorRenta='$ValorRenta', AutoMovil='$AutoMovil', MarcaAuto='$MarcaAuto', ModeloAuto='$ModeloAuto', Adeudo='$Adeudo', ImporteAdeudo='$ImporteAdeudo', AbonoAdeudo='$AbonoAdeudo', GastosMensuales='$GastosMensuales' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			header('Location: bolsa_trabajo.php?acc=1');
			?>
			<script type="text/javascript">	
			</script>
			<?php

	}
}
if (isset($_POST['parte2'])==1) {
	$Npagina = $_POST['pagina'];

			?><script type="text/javascript">
			$(document).ready(function() {
			var pagina = "parte"+<? echo $Npagina?>+".php";
			$('#result').load(pagina);
			 });			
			</script><?php
}	
?>
