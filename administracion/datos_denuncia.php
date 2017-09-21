<?php
require('../conexion/conexion.php');

$idfrm_denuncia = $_POST['idfrm_denuncia'];

$query = "SELECT frm_denuncia.*, sucursales.NombreSucursal FROM frm_denuncia LEFT JOIN sucursales ON frm_denuncia.sucursal = sucursales.idSucursales WHERE idfrm_denuncia = $idfrm_denuncia";
$consultar = $mysqli->query($query);
$datos = $consultar->fetch_assoc();
?>

<h5 class="bold">Descripción de la Denuncia</h5>
<p><i class="fa fa-calendar"></i> Fecha: <?php echo date('d/m/Y', $datos['fecha']); ?></p>
<p class="well">
    <?php echo $datos['descripcion']; ?>
</p>
<br/>
<h5 class="bold">Motivo de la Denuncida</h5>
<ul class="nav nav-pills nav-stacked labels-info ">
    <li><i class=" fa fa-circle text-danger"></i> <?php echo $datos['motivo']; ?></p></li>
</ul>

<br/>
<h5 class="bold">Datos Denunciante</h5>
<ul class="list-unstyled p-files">
    <li><a href=""><i class="fa fa-file-text"></i> <?php echo $datos['nombre_denunciante']; ?></a></li>
    <li><a href=""><i class="fa fa-globe"></i> <?php echo $datos['estado_denunciante']; ?></a></li>
    <li><a href=""><i class="fa fa-phone"></i> <?php echo $datos['telefono_denunciante']; ?></a></li>
</ul>
<br/>

<h5 class="bold">Datos Denuncia</h5>
<ul class="list-unstyled p-files">
    <li><a href=""><i class="fa fa-file-text"></i> <?php echo $datos['nombre_denuncia']; ?></a></li>
    <li><a href=""><i class="fa fa-home"></i> <?php echo '<b>Sucursal:</b> '.$datos['NombreSucursal']; ?></a></li>
    <li><a href=""><i class="fa fa-home"></i> <?php echo '<b>Departemento:</b> '.$datos['otro_departamento']; ?></a></li>
</ul>