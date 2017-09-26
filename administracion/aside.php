<?php 
    $idusuario = $_SESSION['usuario']['idusuario'];
    $sql = "SELECT usuarios.idusuario, permisos_formularios.*, permisos_informacion.*, permisos_secciones.* FROM usuarios LEFT JOIN permisos_formularios ON usuarios.idusuario = permisos_formularios.idusuarios LEFT JOIN permisos_informacion ON usuarios.idusuario = permisos_informacion.idusuarios LEFT JOIN permisos_secciones ON usuarios.idusuario = permisos_secciones.idusuarios WHERE usuarios.idusuario = $idusuario";
    $ejecutar = $mysqli->query($sql);
    
    $permisos = $ejecutar->fetch_assoc();
 ?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a <?php if(isset($menu) && $menu == 'inicio'){echo 'class="active"';} ?>href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a <?php if(isset($seccion) && $seccion == 'secciones'){echo 'class="active"'; } ?> href="javascript:;" >
                    <i class="fa fa-laptop"></i>
                    <span>Secciones</span>
                </a>
                <ul class="sub">
                    <li <?php if(isset($menu) && $menu == 'quienes'){echo 'class="active"'; } ?>><a href="quienes_somos.php">¿Quiénes Somos?</a></li>
                    <li <?php if(isset($menu) && $menu == 'normatividad'){echo 'class="active"'; } ?>><a href="normatividad.php">Normatividad</a></li>

                    <li <?php if(isset($menu) && $menu == 'flexible'){echo 'class="active"'; } ?>><a href="mas_flexible.php">Más Flexible</a></li>
                    <li <?php if(isset($menu) && $menu == 'universidad'){echo 'class="active"'; } ?>><a href="universidad_mk.php">Universidad Mk</a></li>
                    <li <?php if(isset($menu) && $menu == 'atencion'){echo 'class="active"'; } ?>><a href="atencion_clientes.php">Atención a Clientes</a></li>
                    <li <?php if(isset($menu) && $menu == 'meta'){echo 'class="active"'; } ?>><a href="meta_description.php">Meta description</a></li>

                </ul>
            </li>

            <?php 
            if(isset($permisos['idpermisos_informacion'])){
            ?>
                <li class="sub-menu">
                    <a <?php if(isset($seccion) && $seccion == 'informacion'){echo 'class="active"'; } ?> href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>Información</span>
                    </a>
                    <ul class="sub">
                        <li <?php if(isset($menu) && $menu == 'usuarios'){echo 'class="active"'; } ?>><a  href="usuarios.php">Usuarios</a></li>
                        <li <?php if(isset($menu) && $menu == 'sucursales_add'){echo 'class="active"'; } ?>><a  href="sucursales_add.php">Sucursales</a></li>
                        <li <?php if(isset($menu) && $menu == 'vacantes'){echo 'class="active"'; } ?>><a  href="vacantes.php">Vacantes</a></li>
                        <li <?php if(isset($menu) && $menu == 'faq'){echo 'class="active"'; } ?>><a  href="preguntas_frecuentes.php">Preguntas Frecuentes</a></li>
                    </ul>
                </li>
            <?php
            }
            if(isset($permisos['idpermisos_formularios'])){
            ?>
                <li class="sub-menu">
                    <a <?php if(isset($seccion) && $seccion == 'formularios'){echo 'class="active"'; } ?> href="javascript:;" >
                        <i class="fa fa-files-o"></i>
                        <span>Formularios</span>
                    </a>
                    <ul class="sub">
                        <li <?php if(isset($menu) && $menu == 'denuncias'){echo 'class="active"'; } ?>><a  href="denuncias.php">Denuncias</a></li>
                        <li <?php if(isset($menu) && $menu == 'solicitudes'){echo 'class="active"'; } ?>><a  href="solicitudes.php">Solicitudes</a></li>
                        <li <?php if(isset($menu) && $menu == 'atencion'){echo 'class="active"'; } ?>><a  href="frm_atencion.php">Atención a Clientes</a></li>
                    </ul>
                </li>
            <?php
            }
             ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>