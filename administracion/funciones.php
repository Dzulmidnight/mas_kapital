<?php 
$idusuario = $_SESSION['usuario']['idusuario'];
  $sql = "SELECT usuarios.idusuario, permisos_formularios.*, permisos_informacion.*, permisos_secciones.* FROM usuarios LEFT JOIN permisos_formularios ON usuarios.idusuario = permisos_formularios.idusuarios LEFT JOIN permisos_informacion ON usuarios.idusuario = permisos_informacion.idusuarios LEFT JOIN permisos_secciones ON usuarios.idusuario = permisos_secciones.idusuarios WHERE usuarios.idusuario = $idusuario";
  $ejecutar = $mysqli->query($sql);
    
$permisos = $ejecutar->fetch_assoc();
?>