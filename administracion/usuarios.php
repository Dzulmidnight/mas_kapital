<?php
    require('../conexion/conexion.php');
    require('../conexion/sesion.php');
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['tipo'] != 'administrador'){
            header('Location: conexion/salir.php');
        }
    }

  if(isset($_POST['guardar_usuario']) && $_POST['guardar_usuario'] == 1){
    $nombre = $_POST['nombre1'];
    $user = $_POST['user1'];
    $tipo = $_POST['tipo1'];
    $password = $_POST['password1'];

    $sql = "INSERT INTO usuarios (nombre, user, password, tipo) VALUES ('$nombre', '$user', '$password', '$tipo')";
    $mysqli->query($sql);

    $idusuarios = $mysqli->insert_id;
    ///creamos los registros de los permisos
    $sql = "INSERT INTO permisos_formularios (idusuarios) VALUES ($idusuarios)";
    $mysqli->query($sql);
    $sql = "INSERT INTO permisos_informacion (idusuarios) VALUES ($idusuarios)";
    $mysqli->query($sql);
    $sql = "INSERT INTO permisos_secciones (idusuarios) VALUES ($idusuarios)";
    $mysqli->query($sql);

  }
  if(isset($_POST['eliminar_usuario'])){
    $idusuario = $_POST['eliminar_usuario'];
    $sql = "DELETE FROM usuarios WHERE idusuario = $idusuario";
    $mysqli->query($sql);
  }
  if(isset($_POST['guardar_cambios'])){
    $idusuario = $_POST['guardar_cambios'];
    $nombre = $_POST['nombre'.$idusuario];
    $user = $_POST['user'.$idusuario];
    $tipo = $_POST['tipo'.$idusuario];
    $password = $_POST['password'.$idusuario];
    $sql = "UPDATE usuarios SET nombre = '$nombre', user = '$user', tipo = '$tipo', password = '$password' WHERE idusuario = $idusuario";
    $mysqli->query($sql);
  }

 
    $sql_usuarios = "SELECT * FROM usuarios";
    $ejecutar = $mysqli->query($sql_usuarios);
    while($detalle_usuarios = $ejecutar->fetch_assoc()){
      $idusuario2 = $detalle_usuarios['idusuario'];
      if(isset($_POST['modificar_permisos'.$idusuario2]) && $_POST['modificar_permisos'.$idusuario2] == $idusuario2){

        if(isset($_POST['denuncias'.$idusuario2])){
          $denuncias = $_POST['denuncias'.$idusuario2];
        }else{
          $denuncias = 0;
        }
        if(isset($_POST['solicitudes'.$idusuario2])){
          $solicitudes = $_POST['solicitudes'.$idusuario2];
        }else{
          $solicitudes = 0;
        }
        if(isset($_POST['atencion_clientes'.$idusuario2])){
          $atencion_clientes = $_POST['atencion_clientes'.$idusuario2];
        }else{
          $atencion_clientes = 0;
        }
        if(isset($_POST['usuarios'.$idusuario2])){
          $usuarios2 = $_POST['usuarios'.$idusuario2];
        }else{
          $usuarios2 = 0;
        }
        if(isset($_POST['sucursales'.$idusuario2])){
          $sucursales = $_POST['sucursales'.$idusuario2];
        }else{
          $sucursales = 0;
        }
        if(isset($_POST['vacantes'.$idusuario2])){
          $vacantes = $_POST['vacantes'.$idusuario2];
        }else{
          $vacantes = 0;
        }
        if(isset($_POST['faq'.$idusuario2])){
          $faq = $_POST['faq'.$idusuario2];
        }else{
          $faq = 0;
        }
        /*if(isset($_POST['crear'.$idusuario2])){
          $crear = $_POST['crear'.$idusuario2];
        }else{
          $crear = 0;
        }
        if(isset($_POST['editar'.$idusuario2])){
          $editar = $_POST['editar'.$idusuario2];
        }else{
          $editar = 0;
        }
        if(isset($_POST['eliminar'.$idusuario2])){
          $eliminar = $_POST['eliminar'.$idusuario2];
        }else{
          $eliminar = 0;
        }*/
        if(isset($_POST['quienes_somos'.$idusuario2])){
          $quienes_somos = $_POST['quienes_somos'.$idusuario2];
        }else{
          $quienes_somos = 0;
        }
        if(isset($_POST['normatividad'.$idusuario2])){
          $normatividad = $_POST['normatividad'.$idusuario2];
        }else{
          $normatividad = 0;
        }
        if(isset($_POST['mas_flexible'.$idusuario2])){
          $mas_flexible = $_POST['mas_flexible'.$idusuario2];
        }else{
          $mas_flexible = 0;
        }
        if(isset($_POST['universidad_mk'.$idusuario2])){
          $universidad_mk = $_POST['universidad_mk'.$idusuario2];
        }else{
          $universidad_mk = 0;
        }
        if(isset($_POST['atencion_clientes1'.$idusuario2])){
          $atencion_clientes1 = $_POST['atencion_clientes1'.$idusuario2];
        }else{
          $atencion_clientes1 = 0;
        }
        if(isset($_POST['meta_description'.$idusuario2])){
          $meta_description = $_POST['meta_description'.$idusuario2];
        }else{
          $meta_description = 0;
        }
        //actualizamos los PERMISOS_FORMULARIOS
        $updateSQL = "UPDATE permisos_formularios SET denuncias = '$denuncias', solicitudes = '$solicitudes', atencion_clientes = '$atencion_clientes' WHERE idusuarios = $idusuario2";
        $mysqli->query($updateSQL);
        //actualizamos los PERMISOS_INFORMACIÓN
        $updateSQL = "UPDATE permisos_informacion SET usuarios = '$usuarios2', sucursales = '$sucursales', vacantes = '$vacantes', faq = '$faq' WHERE idusuarios = $idusuario2";
        $mysqli->query($updateSQL);
        //actualizamos los PERMISOS_SECCIONES
        $updateSQL = "UPDATE permisos_secciones SET quienes_somos = '$quienes_somos', normatividad = '$normatividad', mas_flexible = '$mas_flexible', universidad_mk = '$universidad_mk', atencion_clientes = '$atencion_clientes1', meta_description = '$meta_description'  WHERE idusuarios = $idusuario2";
        $mysqli->query($updateSQL);
      }
      
    }


  $seccion = 'informacion';
  $menu = 'usuarios';
 ?>
<!DOCTYPE html>
<html lang="esp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Administración - Usuarios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php 
      include('header.php');
       ?>
      <!--header end-->
      <!--sidebar start-->
      <?php 
      include('aside.php'); 
      ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper site-min-height">
          <!-- page start-->
          <section class="panel">
            <header class="panel-heading">
              Usuarios Registrados
            </header>
            <div class="panel-body">
              <div class="adv-table editable-table">
                <div class="clearfix">
                  <div class="btn-group">
                    <button id="" class="btn green" onclick="nuevo_registro()">
                      Nuevo Registro <i class="fa fa-plus"></i>
                    </button>
                  </div>
                </div>

                <div class="space15"></div>

                <div class="table-responsive">
                  <form action="" method="POST">
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                          <tr>
                              <th>Permisos</th>
                              <th>Nombre completo</th>
                              <th>Tipo</th>
                              <th>Usuario</th>
                              <th>Contraseña</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $query = "SELECT usuarios.*, permisos_formularios.*, permisos_informacion.*, permisos_secciones.* FROM usuarios LEFT JOIN permisos_formularios ON usuarios.idusuario = permisos_formularios.idusuarios LEFT JOIN permisos_informacion ON usuarios.idusuario = permisos_informacion.idusuarios LEFT JOIN permisos_secciones ON usuarios.idusuario = permisos_secciones.idusuarios";
                          $ejecutar = $mysqli->query($query);
                          
                          while($registros = $ejecutar->fetch_assoc()){
                          ?>
                            <tr id="<?php echo 'row_info'.$registros['idusuario']; ?>" class="">
                                <td>

                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo '#permisos'.$registros['idusuario']; ?>">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Configurar
                                  </button>
                                </td>
                                <td>
                                  <input type="text" class="<?php echo 'frm-usuario'.$registros['idusuario']; ?> form-control" name="<?php echo 'nombre'.$registros['idusuario']; ?>" value="<?php echo $registros['nombre']; ?>" readonly>
                                  
                                </td>
                                <td>
                                  <input type="hidden" name="idusuario" value="<?php echo $registros['idusuario']; ?>">
                                  <select class="<?php echo 'frm-usuario'.$registros['idusuario']; ?> form-control" name="<?php echo 'tipo'.$registros['idusuario']; ?>" id="" readonly>
                                    <option value="<?php echo $registros['tipo']; ?>">Administrador</option>
                                  </select>
                                </td>
                                <td>
                                  <input type="text" class="<?php echo 'frm-usuario'.$registros['idusuario']; ?> form-control" name="<?php echo 'user'.$registros['idusuario']; ?>" value="<?php echo $registros['user']; ?>" readonly>
                                </td>
                                <td class="center">
                                  <input type="text" class="<?php echo 'frm-usuario'.$registros['idusuario']; ?> form-control" name="<?php echo 'password'.$registros['idusuario']; ?>" value="<?php echo $registros['password']; ?>" readonly>
                                </td>
                                <td id="<?php echo 'td-editar'.$registros['idusuario']; ?>">
                                  <!--<button type="submit" class="" name="editar_usuario" value="<?php echo $registros['idusuario']; ?>" onclick="editar('<?php echo $registros['idusuario']; ?>')">Editar</button>-->
                                  <a id="btn-editar" class="" href="#" onclick="editar('<?php echo $registros['idusuario']; ?>')">Editar</a>
                                </td>
                                <td id="<?php echo 'td-eliminar'.$registros['idusuario']; ?>">
                                  <button class="btn btn-danger btn-xs" type="submit" class="" name="eliminar_usuario" value="<?php echo $registros['idusuario'] ?>" onclick="return confirm('¿Desea eliminar el usuario?');">Eliminar</button>
                                  <!--<a id="btn-eliminar" class="delete" href="">Eliminar</a>-->
                                </td>
                            </tr>
                              <!-- Modal -->
                              <div class="modal fade" id="<?php echo 'permisos'.$registros['idusuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Modificar Permisos de Usuario</h4>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <!-- PERMISOS DE LA SECCIÓN SECCIONES -->
                                        <div class="col-md-4 well">
                                          <ul>
                                            <li>
                                              <p class="alert alert-info">SECCIONES</p>
                                            </li>
                                            <li>
                                              <ol>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'quienes_somos'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['quienes_somos'])){ echo 'checked'; } ?> value="1"> ¿Quienes Somos?
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'normatividad'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['normatividad'])){ echo 'checked'; } ?> value="1"> Normatividad
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'mas_flexible'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['mas_flexible'])){ echo 'checked'; } ?> value="1"> Más Flexible
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'universidad_mk'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['universidad_mk'])){ echo 'checked'; } ?> value="1"> Universidad MK
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'atencion_clientes1'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['atencion_clientes'])){ echo 'checked'; } ?> value="1"> Atención Clientes
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'meta_description'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['meta_description'])){ echo 'checked'; } ?> value="1"> Meta Description
                                                    </label>
                                                  </div>
                                                </li>

                                                <!--<li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'crear'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['crear'])){ echo 'checked'; } ?> value="1"> Crear
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'editar'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['editar'])){ echo 'checked'; } ?> value="1"> Editar
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'eliminar'.$registros['idusuario']; ?>" type="checkbox" class="folios" <?php if(!empty($registros['eliminar'])){ echo 'checked'; } ?> value="1"> Eliminar
                                                    </label>
                                                  </div>
                                                </li>-->
                                              </ol>
                                            </li>
                                          </ul>
                                        </div>

                                        <!-- PERMISOS DE LA SECCIÓN INFORMACIÓN -->
                                        <div class="col-md-4 well">
                                          <ul>
                                            <li>
                                              <p class="alert alert-info">INFORMACIÓN</p>
                                            </li>
                                            <li>
                                              <ol>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'usuarios'.$registros['idusuario']; ?>" class="checkbox2" type="checkbox" <?php if(!empty($registros['usuarios'])){echo 'checked'; } ?> value="1"> Usuarios
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'sucursales'.$registros['idusuario']; ?>" class="checkbox2" type="checkbox" <?php if(!empty($registros['sucursales'])){echo 'checked'; } ?> value="1"> Sucursales
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'vacantes'.$registros['idusuario']; ?>" class="checkbox2" type="checkbox" <?php if(!empty($registros['vacantes'])){echo 'checked'; } ?> value="1"> Vacantes
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'faq'.$registros['idusuario']; ?>" class="checkbox2" type="checkbox" <?php if(!empty($registros['faq'])){echo 'checked'; } ?> value="1"> Preguntas Frecuentes
                                                    </label>
                                                  </div>
                                                </li>
                                              </ol>
                                            </li>
                                          </ul>
                                        </div>

                                        <!-- PERMISOS DE LA SECCIÓN FORMULARIOS -->
                                        <div class="col-md-4 well">
                                          <ul>
                                            <li>
                                              <p class="alert alert-info">FORMULARIOS</p>
                                            </li>
                                            <li>
                                              <ol>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'denuncias'.$registros['idusuario']; ?>" class="checkbox3" type="checkbox" <?php if(!empty($registros['denuncias'])){echo 'checked';} ?> value="1"> Denuncias
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'solicitudes'.$registros['idusuario']; ?>" class="checkbox3" type="checkbox" <?php if(!empty($registros['solicitudes'])){echo 'checked';} ?> value="1"> Solicitudes
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="<?php echo 'atencion_clientes'.$registros['idusuario']; ?>" class="checkbox3" type="checkbox" <?php if(!empty($registros['atencion_clientes'])){echo 'checked';} ?> value="1"> Atención a clientes
                                                    </label>
                                                  </div>
                                                </li>
                                              </ol>
                                            </li>
                                          </ul>
                                        </div>    
                                      </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" name="<?php echo 'modificar_permisos'.$registros['idusuario']; ?>" value="<?php echo $registros['idusuario']; ?>" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          <?php  
                          }
                        ?>
                        </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </section>
          <!-- page end-->
        </section>
      </section>

      <?php include('footer.php'); ?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

      <!--script for this page only-->
      <script src="js/editable-table.js"></script>

      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });


          function nuevo_registro(){
            var table = document.getElementById("editable-sample");
            {
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                cell1.innerHTML = '';
                cell2.innerHTML = '<input type="text" class="form-control" name="nombre1" id="" placeholder="">';
                cell3.innerHTML = '<select class="form-control" name="tipo1"><option value="administrador">Administrador</option></select>';
                cell4.innerHTML = '<input type="text" class="form-control" name="user1" id="" placeholder="">';
                cell5.innerHTML = '<input type="text" class="form-control" name="password1" id="" placeholder="">';
                cell6.innerHTML = '<button class="btn btn-success btn-xs" type="submit" id="btn-editar" name="guardar_usuario" class="" value="1">Guardar</button>';
                //cell5.innerHTML = '<button type="submit" class="" value="1" >Guardar</button><a id="btn-editar" class="" href="#" onclick="editar()">Guardar</a>';
                cell7.innerHTML = '<a id="btn-eliminar" class="delete" href="#" onclick="quitar_registro()">Cancelar</a>';
            }
          }
          function quitar_registro(){
            var table = document.getElementById("editable-sample");
            {
                var row = table.deleteRow(1);
            }
          }

          function editar(id){
            var x = 'frm-usuario'+id;
            var td_editar = 'td-editar'+id;
            var td_eliminar = 'td-eliminar'+id;
            /*var elements = document.querySelectorAll(x, '.frm-usuario');

            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].readOnly = false;
            }*/

            var elements = document.getElementsByClassName(''+x+'');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].readOnly = false;

            }
            //Se guardan los cambios realizados al editar el usuario
            document.getElementById(""+td_editar+"").innerHTML = "<button class='btn btn-success btn-xs' type='submit' id='btn-editar' name='guardar_cambios' class='' value='"+id+"'>Guardar</button>";
            //Se bloquean los campos del formulario
            document.getElementById(""+td_eliminar+"").innerHTML = "<a id='btn-eliminar' class='' href='#' onclick='cancelar("+id+")'>Cancelar</a>";
            /*document.getElementById("''").innerHTML = "<a id='btn-eliminar' class='' href='#' onclick='guardar()'>Guardar</a>";

            document.getElementById("td-eliminar").innerHTML = "<a id='btn-eliminar' class='' href='#' onclick='cancelar()'>Cancelar</a>";*/
          }
          function cancelar(id){
            /*var x = id;
            var td_editar = 'td-editar'+id;
            var elements = document.getElementsByClassName(''+x+'');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].readOnly = true;
            }
            document.getElementById("td-editar").innerHTML = "<a id='btn-editar' class=' href='#' onclick='editar()'>Editar</a>";*/
            var x = 'frm-usuario'+id;
            var td_editar = 'td-editar'+id;
            var td_eliminar = 'td-eliminar'+id;

            var elements = document.getElementsByClassName(''+x+'');
              for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].readOnly = true;
            }

            document.getElementById(""+td_editar+"").innerHTML = "<a id='btn-editar"+id+"' class='' href='#' onclick='editar("+id+")'>Editar</a>";
            document.getElementById(""+td_eliminar+"").innerHTML = "<button class='btn btn-danger btn-xs' type='submit' class=' name='eliminar_usuario' value='"+id+"'>Eliminar</button>";

            
          }
          function guardar(){
            alert('Se han guardado los datos');
          }
      </script>


  </body>
</html>
