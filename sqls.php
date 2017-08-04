<?php
include ('conexion/conexion.php');
require_once('correo/mail.php');
require_once('funciones/funciones.php');
require_once('administracion/mpdf/mpdf.php');

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
		$sql="SELECT * FROM sucursales WHERE Estado='$emp[0]' OR Municipio='$emp[0]'";
		$result=$mysqli->query($sql);

		while ($fila=$result->fetch_row()){

			$sql2="SELECT * FROM vacantes WHERE idSucursales='$fila[0]'";
			$result2=$mysqli->query($sql2); 
			while ($fila2=$result2->fetch_row()){
				?>
			<? 
			$sql3="UPDATE vacantes SET Activo='1' WHERE idVacantes=$fila2[0]";
			$mysqli->query($sql3);
			 $espacio = " ";
				$clase1 = str_replace($espacio, "",$emp[0]);
				$clase2 = str_replace($espacio,"",$fila[3]);
			?>
			<div class="col-md-12 <?echo $clase2 ; ?>" style="border: 0.2em solid #8787b7; margin-top: 1em"
			<div class="row">
			<div class="col-md-12"><label style="color:green"><? echo utf8_encode($fila2[1]);//Puesto ?></label></div>
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
		$sql="SELECT * FROM sucursales WHERE Estado='$valor' OR Municipio='$valor'";
		$result=$mysqli->query($sql);
		while ($fila=$result->fetch_row()){

			$sql2="SELECT * FROM vacantes WHERE idSucursales='$fila[0]'";
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

		$sql2="SELECT * FROM vacantes WHERE idVacantes=$idVacante";
		$res2=$mysqli->query($sql2);
		$fila2=$res2->fetch_assoc();
		?>
        <div class="col-md-12" style="background-color: green; color: white ">
		<label class="h4"><? echo utf8_encode($fila2['Puesto']);?></label>
		</div>
		<div class="col-md-12">
			<p style="margin: 0em">Requisitos</p>
		<?php
		$sql="SELECT Requisito FROM requisitos WHERE idVacantes=$idVacante";
		$res=$mysqli->query($sql);
		 while ($fila=$res->fetch_assoc()) {?>
			<p style="margin: 0em">-<?	echo utf8_encode($fila['Requisito']);?></p><?
			}
		?><p style="margin: 1em 0em 0em">Ofrecemos</p> <?php
		$sql3="SELECT Ofrecemos FROM requisitos WHERE idVacantes=$idVacante";
		$res3=$mysqli->query($sql3);
		 while ($fila3=$res3->fetch_assoc()) {
		 	if ($fila3['Ofrecemos']!="") {
		 		# code...
		 	
		 	?>

		 <p style="margin: 0em">-<?	echo utf8_encode($fila3['Ofrecemos']);?></p><?
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
			$fecha_solicitud = time();


			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();


			$sql="UPDATE Solicitante SET ApMaterno='$ApMaterno', ApPaterno='$ApPaterno', Nombre='$Nombre', Edad='$Edad', TelCasa='$TelCasa', TelCelular='$TelCelular', Correo='$Correo', TiempoRes='$TiempoRes', ViveCon='$ViveCon', EspViveCon='$EspViveCon', Dependientes='$Dependientes', EdoCivil='$EdoCivil', EspEdoCivil='$EspEdoCivil' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);

			$sql="UPDATE SolicitudTrabajo SET Puesto='$Puesto', SueldoDeseado='$Sueldo', Seccion='$_POST[parte]', Estatus='$Estatus', fecha_solicitud = '$fecha_solicitud' WHERE idSolicitante=$resultado[idSolicitante]";
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
			$NombrePariente = $_POST['NombrePariente'];
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

			$sql ="UPDATE DatosGenerales SET ComoSupo='$ComoSupo', Pariente='$Pariente', NombrePariente = '$NombrePariente', Viajar='$Viajar', ExpViajar='$ExpViajar', Residencia='$Residencia', ExpResidencia='$ExpResidencia', FechaTrabajar='$FechaTrabajar' WHERE idSolicitante=$resultado[idSolicitante]";
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


    ///inician variables del PDF
	$fecha = time();
    $ruta_pdf = 'administracion/reportes/solicitudes/';
    $nombre_pdf = 'solicitud_trabajo'.$fecha.'.pdf';
    $reporte = $ruta_pdf.$nombre_pdf;
    /// fin

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();

			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte], Estatus='0', archivo_solicitud = '$reporte' WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);


			$sql="UPDATE DatosEconomicos SET Ingresos='$Ingresos', Importe='$Importe', Conyuge='$Conyuge', IngresoConyuge='$IngresoConyuge', CasaPropia='$CasaPropia', ValorCasa='$ValorCasa', PagaRenta='$PagaRenta', ValorRenta='$ValorRenta', AutoMovil='$AutoMovil', MarcaAuto='$MarcaAuto', ModeloAuto='$ModeloAuto', Adeudo='$Adeudo', ImporteAdeudo='$ImporteAdeudo', AbonoAdeudo='$AbonoAdeudo', GastosMensuales='$GastosMensuales' WHERE idSolicitante=$resultado[idSolicitante]";
			$mysqli->query($sql);






			  $query_solicitud = "SELECT SolicitudTrabajo.*, Solicitante.*, DomSolicitante.*, EdoSalud.Estado AS 'Estado_salud', EdoSalud.Padece, EdoSalud.Enfermedad, EdoSalud.Meta, Documentacion.*, Madre.Nombre AS 'Nombre_madre', Madre.Vive AS 'Vive_madre', Madre.Domicilio AS 'Domicilio_madre', Madre.Ocupacion AS 'Ocupacion_madre', PadreSol.Nombre AS 'Nombre_padre', PadreSol.Vive AS 'Vive_padre', PadreSol.Domicilio AS 'Domicilio_padre', PadreSol.Ocupacion AS 'Ocupacion_padre', Esposa.Nombre AS 'Nombre_esp', Esposa.Vive AS 'Vive_esp', Esposa.Domicilio AS 'Domicilio_esp', Esposa.Ocupacion AS 'Ocupacion_esp', Escolaridad.*, Conocimientos.*, DatosEconomicos.*, DatosGenerales.* FROM SolicitudTrabajo INNER JOIN Solicitante ON SolicitudTrabajo.idSolicitante = Solicitante.idSolicitante LEFT JOIN DomSolicitante ON SolicitudTrabajo.idSolicitante = DomSolicitante.idSolicitante LEFT JOIN EdoSalud ON SolicitudTrabajo.idSolicitante = EdoSalud.idSolicitante LEFT JOIN Documentacion ON SolicitudTrabajo.idSolicitante = Documentacion.idSolicitante LEFT JOIN Escolaridad ON SolicitudTrabajo.idSolicitante = Escolaridad.idSolicitante LEFT JOIN Conocimientos ON SolicitudTrabajo.idSolicitante = Conocimientos.idSolicitante LEFT JOIN Madre ON SolicitudTrabajo.idSolicitante = Madre.idSolicitante LEFT JOIN PadreSol ON SolicitudTrabajo.idSolicitante = PadreSol.idSolicitante LEFT JOIN Esposa ON SolicitudTrabajo.idSolicitante = Esposa.idSolicitante LEFT JOIN DatosEconomicos ON SolicitudTrabajo.idSolicitante = DatosEconomicos.idSolicitante LEFT JOIN DatosGenerales ON SolicitudTrabajo.idSolicitante = DatosGenerales.idSolicitante WHERE SolicitudTrabajo.idSolicitante = $resultado[idSolicitante]";
			  $consultar = $mysqli->query($query_solicitud);

			  $detalle_solicitud = $consultar->fetch_assoc();

			    /// SE GENERA EL ARCHIVO PDF Y SE GUARDA EN EL SERVIDOR ////////////
			    $html = '

					<div>
			                            <table class="table table-hover p-table">
			                              <thead>
			                                <tr>
			                                  <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="4">DATOS PERSONALES</th>
			                                </tr>
			                              </thead>
			                              <tbody>
			                                <tr>
			                                  <td>
			                                    <p>Apellido Paterno</p>
			                                    <p class="bold">'.$detalle_solicitud['ApPaterno'].'</p>
			                                  </td>
			                                  <td>
			                                    <p>Apellido Materno</p>
			                                    <p class="bold">'.$detalle_solicitud['ApMaterno'].'</p>
			                                    
			                                    
			                                  </td>
			                                  <td>
			                                    <p>Nombre(s)</p>
			                                    <p class="bold">'.$detalle_solicitud['Nombre'].'</p>
			                                    
			                                    
			                                  </td>
			                                  <td>
			                                    <p>Edad</p>
			                                    <p class="bold">'.$detalle_solicitud['Edad'].'</p>
			                                    
			                                  </td>
			                                </tr>
			                                <tr>
			                                  <td>
			                                    <p>Domicilio (Tipo Vialidad y Nombre)</p>
			                                    <p class="bold">'.$detalle_solicitud['Calle'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>No. Ext</p>
			                                    <p class="bold">'.$detalle_solicitud['NumExt'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>No. Int.</p>
			                                    <p class="bold">'.$detalle_solicitud['NumInt'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>Colonia</p>
			                                    <p class="bold">'.$detalle_solicitud['Colonia'].'</p>
			                                    
			                                  </td>
			                                </tr>
			                                <tr>
			                                  <td colspan="2">
			                                    <p>Delegación o Municipio</p>
			                                    <p class="bold">'.$detalle_solicitud['Municipio'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>Estado</p>
			                                    <p class="bold">'.$detalle_solicitud['Estado'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>Código Postal</p>
			                                    <p class="bold">'.$detalle_solicitud['CP'].'</p>
			                                    
			                                  </td>
			                                </tr>
			                                <tr>
			                                  <td>
			                                    <p>Teléfono Casa</p>
			                                    <p class="bold">'.$detalle_solicitud['TelCasa'].'</p>
			                                  </td>
			                                  <td>
			                                    <p>Teléfono Celuar</p>
			                                    <p class="bold">'.$detalle_solicitud['TelCelular'].'</p>
			                                    
			                                  </td>
			                                  <td colspan="2">
			                                    <p>Correo Electronico</p>
			                                    <p class="bold">'.$detalle_solicitud['Correo'].'</p>
			                                    
			                                  </td>
			                                </tr>
			                                <tr>
			                                  <td>
			                                    <p>TIEMPO DE RESIDIR EN DOMICILIO ACTUAL</p>
			                                    <p class="bold">'.$detalle_solicitud['TiempoRes'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>VIVE CON</p>
			                                    <p class="bold">'.$detalle_solicitud['ViveCon'].'</p>
			                                    
			                                  </td>
			                                  <td colspan="2">
			                                    <p>ESPECIFICA</p>
			                                    <p class="bold">'.$detalle_solicitud['EspViveCon'].'</p>
			                                    
			                                  </td>
			                                </tr>
			                                <tr>
			                                  <td>
			                                    <p>PERSONAS QUE DEPENDEN DE USTED</p>
			                                    <p class="bold">'.$detalle_solicitud['Dependientes'].'</p>
			                                    
			                                  </td>
			                                  <td>
			                                    <p>ESTADO CIVIL:</p>
			                                    <p class="bold">'.$detalle_solicitud['EdoCivil'].'</p>
			                                    
			                                  </td>
			                                  <td colspan="2">
			                                    <p>ESPECIFICA</p>
			                                    <p class="bold">'.$detalle_solicitud['EspEdoCivil'].'</p>
			                                    
			                                  </td>
			                                </tr>
			                              </tbody>
			                          </table>
			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="5">DOCUMENTACIÓN</th>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>CURP</p>
			                                </td>
			                                <td>
			                                  <p>RFC</p>
			                                </td>
			                                <td>
			                                  <p>NÚMERO DE SEGURO SOCIAL</p>
			                                </td>
			                                <td>
			                                  <p>LICENCIA DE CONDUCIR</p>
			                                </td>
			                                <td>
			                                  <p>CLASE Y Nº. LICENCIA</p>
			                                </td>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Curp'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Rfc'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Imms'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Licencia'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['NumLicencia'].'</p>
			                                </td>
			                              </tr>
			                            </tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="4">ESTADO DE SALUD Y HÁBITOS PERSONALES</th>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>SU ESTADO DE SALUD:</p> 
			                                </td>
			                                <td>
			                                  <p>¿PADECE ALGUNA ENFERMEDAD?</p> 
			                                </td>
			                                <td>
			                                  <p>ESPECIFIQUE ENFERMEDAD</p> 
			                                </td>
			                                <td>
			                                  <p>¿CUAL ES SU META EN LA VIDA?</p> 
			                                </td>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Estado_salud'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Padece'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Enfermedad'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Meta'].'</p>
			                                </td>
			                              </tr>
			                            </tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="4">DATOS FAMILIARES</th>
			                              </tr>
			                              <tr>
			                                <th>NOMBRE</th>
			                                <th>VIVE/FINADO</th>
			                                <th>DOMICILIO</th>
			                                <th>OCUPACIÓN</th>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p>PADRE</p>
			                                  <p class="bold">'.$detalle_solicitud['Nombre_padre'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Vive_padre'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Domicilio_padre'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Ocupacion_padre'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>MADRE</p>
			                                  <p class="bold">'.$detalle_solicitud['Nombre_madre'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Vive_madre'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Domicilio_madre'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Ocupacion_madre'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>ESPOSA(O)</p>
			                                  <p class="bold">'.$detalle_solicitud['Nombre_esp'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Vive_esp'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Domicilio_esp'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Ocupacion_esp'].'</p>
			                                </td>
			                              </tr>
			                            </tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="5">ESCOLARIDAD (Solamente último nivel académico)</th>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p>NOMBRE DE LA ESCUELA</p>
			                                </td>
			                                <td colspan="2">
			                                  <p>DIRECCIÓN</p>
			                                </td>
			                                <td>
			                                  <p>FECHAS</p>
			                                </td>
			                                <td>
			                                  <p>DOCUMENTO RECIBIDO</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Escuela'].'</p>
			                                </td>
			                                <td colspan="2">
			                                  <p class="bold">'.$detalle_solicitud['Direccion'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['FechaI'].' A '.$detalle_solicitud['FechaF'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Documento'].'</p>
			                                </td>
			                              </tr>

			                              <tr>
			                                <td class="warning" colspan="5">EN CASO DE ESTUDIO PROFESIONALES</td>
			                              </tr>
			                              <tr>
			                                <td colspan="3">
			                                  <p>NOMBRE DE LA CARRERA</p>
			                                </td>
			                                <td colspan="2">
			                                  <p>NIVEL ALCANZADO (SOLO PARA ESTUDIOS PROFESIONALES)</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td colspan="3">
			                                  <p class="bold">'.$detalle_solicitud['Carrera'].'</p>
			                                </td>
			                                <td colspan="2">
			                                  <p class="bold">'.$detalle_solicitud['Nivel'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td class="warning" colspan="5">EN CASO DE ESTAR ESTUDIANDO ACTUALMENTE</td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>NOMBRE DE LA ESCUELA</p>
			                                </td>
			                                <td>
			                                  <p>CURSO O CARRERA</p>
			                                </td>
			                                <td>
			                                  <p>DIAS EN LOS QUE ASISTE</p>
			                                </td>
			                                <td>
			                                  <p>HORARIO</p>
			                                </td>
			                                <td>
			                                  <p>NIVEL/GRADO ACTUAL</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['EscuelaAct'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Curso'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Dias'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Horario'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['NivelAct'].'</p>
			                                </td>
			                              </tr>
			                            </tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="4">CONOCIMIENTOS GENERALES</th>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p>FUNCIONES DE OFICINA QUE DOMINA</p>
			                                </td>
			                                <td>
			                                  <p>PROGRAMAS DE CÓMPUTO (SOFTWARE) QUE DOMINA</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <p class="bold">'.$detalle_solicitud['Funciones'].'</p>
			                              </tr>
			                              <tr>
			                                <p class="bold">'.$detalle_solicitud['Software'].'</p>
			                              </tr>
			                            </tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="12">EMPLEO ACTUA Y ANTERIORES</th>
			                              </tr>
			                              <tr>
			                                <th>COMPAÑIA</th>
			                                <th>DIRECCIÓN</th>
			                                <th>TELÉFONO</th>
			                                <th>PUESTO DESEMPEÑADO</th>
			                                <th>INICIO</th>
			                                <th>TÉRMINO</th>
			                                <th>MOTIVO</th>
			                                <th>SALARIO</th>
			                                <th>JEFE</th>
			                                <th>PUESTO DE SU JEFE</th>
			                                <th colspan="2">¿SOLICITAR INFORMACIÓN?</th>
			                              </tr>
			                            </thead>
			                            <tbody>';
			                              
			                              $query_empleo = "SELECT * FROM Empleos WHERE idSolicitante = '$detalle_solicitud[idSolicitante]'";
			                              $consultar = $mysqli->query($query_empleo);
			                              while($empleos = $consultar->fetch_assoc()){
			                                $html .= '<tr>
			                                  <td>'.$empleos['Compania'].'</td>
			                                  <td>'.$empleos['Direccion'].'</td>
			                                  <td>'.$empleos['Telefono'].'</td>
			                                  <td>'.$empleos['Puesto'].'</td>
			                                  <td>'.$empleos['FechaInicio'].'</td>
			                                  <td>'.$empleos['FechaTermino'].'</td>
			                                  <td>'.$empleos['Motivo'].'</td>
			                                  <td>'.$empleos['Salario'].'</td>
			                                  <td>'.$empleos['NombreJefe'].'</td>
			                                  <td>'.$empleos['PuestoJefe'].'</td>
			                                  <td>'.$empleos['Informacion'].'</td>
			                                  <td>'.$empleos['Porque'].'</td>
			                                </tr>';
			                              }

			                            $html .= '</tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="5">REFERENCIAS FAMILIARES O PERSONALES (Que no vivan en el mismo domicilio)</th>
			                              </tr>
			                              <tr>
			                                <th>NOMBRE</th>
			                                <th>DOMICILIO</th>
			                                <th>TELÉFONO</th>
			                                <th>OCUPACIÓN</th>
			                                <th>TIEMPO DE CONOCERLO</th>
			                              </tr>
			                            </thead>
			                            <tbody>';

			                              $query_referencias = "SELECT * FROM RefFamiliar WHERE idSolicitante = '$detalle_solicitud[idSolicitante]'";
			                              $consultar = $mysqli->query($query_referencias);
			                              while($referencias = $consultar->fetch_assoc()){

			                                $html .= '<tr>
			                                  <td>'.$referencias['Nombre'].'</td>
			                                  <td>'.$referencias['Domicilio'].'</td>
			                                  <td>'.$referencias['Telefono'].'</td>
			                                  <td>'.$referencias['Ocupacion'].'</td>
			                                  <td>'.$referencias['Tiempo'].'</td>
			                                </tr>';

			                              }

			                            $html .= '</tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="4">DATOS GENERALES</th>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p>¿COMO SUPO DE ESTE EMPLEO?</p>
			                                  <p class="bold">'.$detalle_solicitud['ComoSupo'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p>¿TIENE PARIENTES EN ESTA EMPRESA?</p>
			                                  <p class="bold">'.$detalle_solicitud['Pariente'].'</p>
			                                  
			                                </td>
			                                <td colspan="2">
			                                  <p>¿QUIEN ES SU PARIENTE?</p>
			                                  <p class="bold">'.$detalle_solicitud['NombrePariente'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>¿PUEDE VIAJAR?</p>
			                                  <p class="bold">'.$detalle_solicitud['Viajar'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p>EXPLIQUE</p>
			                                  <p class="bold">'.$detalle_solicitud['ExpViajar'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p>¿ESTA DISPUESTO A CAMBIAR SU LUGAR DE RESIDENCIA?</p>
			                                  <p class="bold">'.$detalle_solicitud['Residencia'].'</p>
			                                  
			                                </td>
			                                <td>
			                                  <p>EXPLIQUE</p>
			                                  <p class="bold">'.$detalle_solicitud['ExpResidencia'].'</p>
			                                  
			                                </td>
			                              </tr>
			                              <tr>
			                                <td colspan="4">
			                                  <p>FECHA EN LA QUE PODRIA PRESENTARSE A TRABAJAR</p>
			                                  <p class="bold">'.$detalle_solicitud['FechaTrabajar'].'</p>
			                                  
			                                </td>
			                              </tr>
			                            </tbody>
			                          </table>

			                          <table class="table table-hover p-table">
			                            <thead>
			                              <tr>
			                                <th style="text-align:center;background-color:#2980b9;color:#ecf0f1" colspan="4">DATOS ECONÓMICOS</th>
			                              </tr>
			                            </thead>
			                            <tbody>
			                              <tr>
			                                <td>
			                                  <p>¿TIENE USTED OTROS INGRESOS?</p>
			                                </td>
			                                <td>
			                                  <p>IMPORTE MENSUAL</p>
			                                </td>
			                                <td>
			                                  <p>¿SU CÓNYUGE TRABAJA?</p>
			                                </td>
			                                <td>
			                                  <p>PERCEPCIÓN MENSUAL</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Ingresos'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Importe'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Conyuge'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['IngresoConyuge'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>¿VIVE EN CASA PROPIA?</p>
			                                </td>
			                                <td>
			                                  <p>VALOR APROXIMADO</p>
			                                </td>
			                                <td>
			                                  <p>¿PAGA RENTA?</p>
			                                </td>
			                                <td>
			                                  <p>RENTA MENSUAL</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['CasaPropia'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['ValorCasa'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['PagaRenta'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['ValorRenta'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>¿TIENE AUTOMOVIL PROPIO?</p>
			                                </td>
			                                <td>
			                                  <p>MARCA, MODELO</p>
			                                </td>
			                                <td>
			                                  <p>¿TIENE DEUDAS?</p>
			                                </td>
			                                <td>
			                                  <p>IMPORTE DEL ADEUDO</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['AutoMovil'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['MarcaAuto'].' '.$detalle_solicitud['ModeloAuto'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['Adeudo'].'</p>
			                                </td>
			                                <td>
			                                  <p class="bold">'.$detalle_solicitud['ImporteAdeudo'].'</p>
			                                </td>
			                              </tr>
			                              <tr>
			                                <td>
			                                  <p>¿CUANTO ABONA MENSUALMENTE?</p>
			                                  <p class="bold">'.$detalle_solicitud['AbonoAdeudo'].'</p>
			                                </td>
			                                <td>
			                                  <p>¿A CUANTO ASCIENDEN SUS GASTOS MENSUALES?</p>
			                                  <p class="bold">'.$detalle_solicitud['GastosMensuales'].'</p>
			                                </td>
			                              </tr>
			                            </tbody>
			                          </table>
					</div>';




			    $mpdf = new mPDF('c', 'Letter'); // seleccionamos el tamaño de la hoja
			    ob_start();

			    $mpdf->setAutoTopMargin = 'pad';
			    $mpdf->keep_table_proportions = TRUE;
			    $mpdf->SetHTMLHeader('
			    <header class="clearfix">
			      <div>
			        <table style="padding:0px;margin-top:-20px;">
			          <tr>
			            <td style="text-align:left;margin-bottom:0px;font-size:12px;">
			                  <div>
			                    <img src="administracion/reportes/img/logo_mas_kapital.png" >
			                  </div>
			            </td>
			            <td style="text-align:right;font-size:12px;">
			                  <div>
			                    <h2>
			                        SOLICITUD DE TRABAJO
			                    </h2>             
			                  </div>

			                  <div>'.date('d/m/Y', $fecha).'</div>
			            </td>
			          </tr>
			        </table>
			      </div>
			    </header>
			      ');
			    $css = file_get_contents('administracion/reportes/css/style_reporte.css');  
			    //$mpdf->AddPage('L'); //se cambia la orientacion de la pagina
			    $mpdf->pagenumPrefix = 'Página ';
			    $mpdf->pagenumSuffix = ' - ';
			    $mpdf->nbpgPrefix = ' de ';
			    //$mpdf->nbpgSuffix = ' pages';
			    $mpdf->SetFooter('{PAGENO}{nbpg}');
			    $mpdf->writeHTML($css,1);

			    ob_end_clean();

			    $mpdf->writeHTML($html);
			    //$pdf_listo = $mpdf->Output('reporte.pdf', 'I');
			    
			    /// CON LA LINEA DE ABAJO GENERAMOS EL PDF Y LO ENVIAMOS POR EMAIL, PERO NO LO GUARDAMOS
			    //28_03_2017 $pdf_listo = $mpdf->Output('reporte_trimestral.pdf', 'S'); //reemplazamos la I por S(regresa el documento como string)
			    /// CON LA LINEA DE ABAJO GENERAMOS EL PDF Y LO GUARDAMOS EN UNA CARPETA
			    $mpdf->Output(''.$ruta_pdf.''.$nombre_pdf.'', 'F'); //reemplazamos la I por S(regresa el documento como string)

			    /// FIN


			    /// SE GENERA EL CORREO
			    $asunto = 'Solicitud Trabajo';

			    $mensaje_correo = '
			        <html>
			        <head>
			            <meta charset="utf-8">
			        </head>
			        <body>

			            <table style="font-family: Tahoma, Geneva, sans-serif; font-size:13px; color: #797979;border: 1px solid #ddd;text-align: left;border-collapse: collapse;width: 100%;" >
			                <thead>
			                    <tr>
			                        <th style="padding: 15px;border: 1px solid #ddd" align="center">
			                            <img class="img-responsive" src="http://iotechdata1.xyz/mas_kapital/img/logos/logo_mas_kapital.png" alt="logo">
			                        </th>
			                        <th style="padding: 15px;border: 1px solid #ddd" align="left">

			                    </tr>
			                </thead>
			                <tbody>
			                    <tr>
			                        <td style="text-align:center;padding:15px;background-color:#3498db;color:#ffffff;" colspan="2">DATOS DE IDENTIFICACIÓN</td>
			                    </tr>

			                </tbody>
			            </table>
			        </body>
			        </html>
			    ';

			    $mail->AddAddress('soporteinforganic@gmail.com');

			    $mail->Subject = utf8_decode($asunto);
			    $mail->Body = utf8_decode($mensaje_correo);
			    $mail->MsgHTML(utf8_decode($mensaje_correo));
			    //$mail->AddAttachment($pdf_listo, 'reporte.pdf');

			    //$mail->addStringAttachment($pdf_listo, 'reporte_trimestral.pdf'); // SE ENVIA LA CADENA DE TEXTO DEL PDF POR EMAIL
			    $mail->AddAttachment($reporte);
			    $mail->Send();
			    $mail->ClearAddresses();



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
