<?php
include ('conexion.php');
if(isset($_POST['parte']))
	{
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

			$Calle = $_POST['Calle'];
			$NumExt = $_POST['Numero'];
			$NumInt = $_POST['NumInt'];
			$Colonia = $_POST['Colonia'];
			$Municipio = $_POST['Municipio'];
			$Estado = $_POST['Estado'];
			$CP = $_POST['Cp'];
			$sql="INSERT INTO Solicitante(ApMaterno,ApPaterno,Nombre,Edad,TelCasa,TelCelular,Correo,TiempoRes,ViveCon,EspViveCon,Dependientes,EdoCivil,EspEdoCivil) VALUES ('$ApMaterno','$ApPaterno','$Nombre','$Edad','$TelCasa','$TelCelular','$Correo','$TiempoRes','$ViveCon','$EspViveCon','$Dependientes','$EdoCivil','$EspEdoCivil')";
			$mysqli->query($sql);

			// echo $sql;

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();

			$sql1="INSERT INTO SolicitudTrabajo(idSolicitante,Seccion) VALUES('$resultado[idSolicitante]','$_POST[parte]')";
			$mysqli->query($sql1);


			$sql3="INSERT INTO DomSolicitante(idSolicitante,Calle,NumExt,NumInt,Colonia,Municipio,Estado,CP) VALUES('$resultado[idSolicitante]','$Calle','$NumExt','$NumInt','$Colonia','$Municipio','$Estado','$CP')";
			$mysqli->query($sql3);

			?>
			<script type="text/javascript">
			$(document).ready(function() {
			$('#result').load('parte2.php');
			 });
			</script>
			<?php
		}

		else if ($_POST['parte']==3) {
			$Curp = $_POST['Curp'];
			$Rfc = $_POST['Rfc'];
			$Imss = $_POST['Imss'];
			$Licencia = $_POST['Licencia'];
			$NumLicencia = $_POST['NumLicencia'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();

			$sql = "INSERT INTO Documentacion(idSolicitante,Curp,Rfc,Imms,Licencia,NumLicencia) 
					VALUES ('$resultado[idSolicitante]','$Curp','$Rfc','$Imss','$Licencia','$NumLicencia')";
			$mysqli->query($sql);

			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte3.php');
			 });			
			</script><?php
		}

		else if ($_POST['parte']==4) {
			$Estado = $_POST['Estado'];
			$Padece = $_POST['Padece'];
			$Enfermedad = $_POST['Enfermedad'];
			$Meta = $_POST['Meta'];

			$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
			$idsol=$mysqli->query($sql2);
			$resultado=$idsol->fetch_assoc();
			
			$sql="INSERT INTO EdoSalud(idSolicitante,Estado,Padece,Enfermedad,Meta) 
				  VALUES('$resultado[idSolicitante]','$Estado','$Padece','$Enfermedad','$Meta')";
			$mysqli->query($sql);

			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);			

			?><script type="text/javascript">
				
			$(document).ready(function() {
			$('#result').load('parte4.php');
			 });			
			</script><?php		
		}
		else if ($_POST['parte']==5) {

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

			$sql = "INSERT INTO PadreSol(idSolicitante,Nombre,Vive,Domicilio,Ocupacion,Hijos) VALUES('$resultado[idSolicitante]','$NomP','$ViveP','$DomP','$OcupP','$Hijos')";
			$mysqli->query($sql);

			$sql1 ="INSERT INTO Madre(idSolicitante,Nombre,Vive,Domicilio,Ocupacion) VALUES ('$resultado[idSolicitante]','$NomM','$ViveM','$DomM','$OcupM')";
			$mysqli->query($sql1);

			$sql3 = "INSERT INTO Esposa(idSolicitante,Nombre,Vive,Domicilio,Ocupacion) VALUES ('$resultado[idSolicitante]','$NomE','$ViveE','$DomE','$OcupE')";
			$mysqli->query($sql3);



			?><script type="text/javascript">
			$(document).ready(function() {
			$('#result').load('parte5.php');
			 });			
			</script><?php		
		}


		else if ($_POST['parte']==6) {

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
			$sql = "INSERT INTO Escolaridad (idSolicitante,Escuela,Direccion,FechaI,FechaF,Documento,Carrera,Nivel,EscuelaAct,Curso,Dias,Horario,NivelAct) VALUES('$resultado[idSolicitante]','$Nivel1','$Direccion','$FechaI','$FechaF','$Documento','$Carrera','$Nivel2','$EscuelaActual','$CarreraActual','$DiasAsiste','$Horario','$GradoActual')";
			$mysqli->query($sql);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte6.php');
			 });			
			</script><?php		
		}	


		else if ($_POST['parte']==7) {

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

			$sql1 ="INSERT INTO Conocimientos (idSolicitante,Funciones,Software) VALUES('$resultado[idSolicitante]','$Funciones','$Software')";
			$mysqli->query($sql1);

			$sql =" INSERT INTO Empleos(idSolicitante,Compania,FechaInicio,FechaTermino,Direccion,Telefono,Puesto,Motivo,Salario,NombreJefe,PuestoJefe,Informacion,Porque) VALUES('$resultado[idSolicitante]','$Compania','$FechaInicio','$FechaTermino','$Direccion','$Telefono','$Puesto','$Motivo','$Salario','$NombreJefe','$PuestoJefe','$Informacion','$Porque')";
			$mysqli->query($sql);
			
			?><script type="text/javascript">
			$(document).ready(function() {
			$('#result').load('parte7.php');
			 });			
			</script><?php		
		}


		else if ($_POST['parte']==8) {

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

			$sql = "INSERT INTO RefFamiliar(idSolicitante,Nombre,Domicilio,Telefono,Ocupacion,Tiempo) 
					VALUES ('$resultado[idSolicitante]','$Nombre1','$Domicilio1','$Telefono1','$Ocupacion1','$Tiempo1')";
			$mysqli->query($sql);

			$sql1 = "INSERT INTO RefFamiliar(idSolicitante,Nombre,Domicilio,Telefono,Ocupacion,Tiempo) 
					VALUES ('$resultado[idSolicitante]','$Nombre2','$Domicilio2','$Telefono2','$Ocupacion2','$Tiempo2')";
			$mysqli->query($sql1);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte8.php');
			 });			
			</script><?php		
		}

		else if ($_POST['parte']==9) {
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

			$sql = "INSERT INTO DatosGenerales (idSolicitante,ComoSupo,Pariente,Viajar,ExpViajar,Residencia,ExpResidencia,FechaTrabajar)
				VALUES ('$resultado[idSolicitante]','$ComoSupo','$Pariente','$Viajar','$ExpViajar','$Residencia','$ExpResidencia','$FechaTrabajar')";
			$mysqli->query($sql);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte9.php');
			 });			
			</script><?php		
		}

		else if ($_POST['parte']==10) {

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
			$sqlupdate = "UPDATE SolicitudTrabajo SET Seccion = $_POST[parte] WHERE idSolicitante = $resultado[idSolicitante]";
			$mysqli->query($sqlupdate);

			$sql = "INSERT INTO DatosEconomicos(idSolicitante,Ingresos,Importe,Conyuge,IngresoConyuge,CasaPropia,ValorCasa,PagaRenta,ValorRenta,AutoMovil,MarcaAuto,ModeloAuto,Adeudo,ImporteAdeudo,AbonoAdeudo,GastosMensuales)VALUES ('$resultado[idSolicitante]','$Ingresos','$Importe','$Conyuge','$IngresoConyuge','$CasaPropia','$ValorCasa','$PagaRenta','$ValorRenta','$AutoMovil','$MarcaAuto','$ModeloAuto','$Adeudo','$ImporteAdeudo','$AbonoAdeudo','$GastosMensuales')";
			$mysqli->query($sql);

			?><script type="text/javascript">				
			$(document).ready(function() {
			$('#result').load('parte10.php');
			 });			
			</script><?php

	}
}
else if ($_POST['parte2']==1) {
	$Npagina = $_POST['pagina'];

			?><script type="text/javascript">
			$(document).ready(function() {
			var pagina = "parte"+<? echo $Npagina?>+".php";
			$('#result').load(pagina);
			 });			
			</script><?php
}


// else if ($_POST['borrar']==1) {
// 			 $sql="DELETE FROM Solicitante FROM Solicitante S INNER JOIN SolicitudTrabajo ST ON S.idSolicitante= ST.idSolicitante AND ST.Seccion<10";
// 			 $mysqli->query($sql);
// }	
		?>
 ?>
