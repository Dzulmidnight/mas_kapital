<?php 
    require('../conexion/conexion.php');
    require('../conexion/sesion.php');

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['tipo'] != 'administrador'){
            header('Location: conexion/salir.php');
        }
    }
/*$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
            $idsol=$mysqli->query($sql2);
            $resultado=$idsol->fetch_assoc();
*/
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

  if(isset($_POST['modificar_permisos']) && $_POST['modificar_permisos'] == 1){

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
                          $query = "SELECT * FROM usuarios";
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
                                      
                                        <!-- PERMISOS DE LA SECCIÓN SECCIONES -->
                                        <div class="col-md-4">
                                          <ul>
                                            <li>
                                              <div class="checkbox">
                                                <label>
                                                  <input id="secciones" name="secciones" type="checkbox" onclick="marcar_desmarcar1();"> SECCIONES
                                                </label>
                                              </div>
                                            </li>
                                            <li>
                                              <ol>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="crear" type="checkbox" onclick="desmarcar1();" class="folios"> Crear
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="editar" type="checkbox" onclick="desmarcar1();" class="folios"> Editar
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="eliminar" type="checkbox" onclick="desmarcar1();" class="folios"> Eliminar
                                                    </label>
                                                  </div>
                                                </li>
                                              </ol>
                                            </li>
                                          </ul>
                                        </div>

                                        <!-- PERMISOS DE LA SECCIÓN INFORMACIÓN -->
                                        <div class="col-md-4">
                                          <ul>
                                            <li>
                                              <div class="checkbox">
                                                <label>
                                                  <input id="informacion" name="informacion" type="checkbox" onclick="marcar_desmarcar2();"> INFORMACIÓN
                                                </label>
                                              </div>
                                            </li>
                                            <li>
                                              <ol>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="usuarios" class="checkbox2" onclick="desmarcar2();" type="checkbox"> Usuarios
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="sucursales" class="checkbox2" onclick="desmarcar2();" type="checkbox"> Sucursales
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="vacantes" class="checkbox2" onclick="desmarcar2();" type="checkbox"> Vacantes
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="faq" class="checkbox2" onclick="desmarcar2();" type="checkbox"> Preguntas Frecuentes
                                                    </label>
                                                  </div>
                                                </li>
                                              </ol>
                                            </li>
                                          </ul>
                                        </div>

                                        <!-- PERMISOS DE LA SECCIÓN FORMULARIOS -->
                                        <div class="col-md-4">
                                          <ul>
                                            <li>
                                              <div class="checkbox">
                                                <label>
                                                  <input id="formularios" name="formularios" type="checkbox" onclick="marcar_desmarcar3();"> FORMULARIOS
                                                </label>
                                              </div>
                                            </li>
                                            <li>
                                              <ol>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="denuncias" class="checkbox3" onclick="desmarcar3();" type="checkbox"> Denuncias
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="solicitudes" class="checkbox3" onclick="desmarcar3();" type="checkbox"> Solicitudes
                                                    </label>
                                                  </div>
                                                </li>
                                                <li>
                                                  <div class="checkbox">
                                                    <label>
                                                      <input name="atencion_clientes" class="checkbox3" onclick="desmarcar3();" type="checkbox"> Atención a clientes
                                                    </label>
                                                  </div>
                                                </li>
                                              </ol>
                                            </li>
                                          </ul>
                                        </div>
                                      
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" name="modificar_permisos" value="1" class="btn btn-primary">Guardar Cambios</button>
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


      <!--main content end-->
      <!-- Right Slidebar start -->
  
      <!-- Right Slidebar end -->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
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

          function marcar_desmarcar1(){
              var secciones = document.getElementById('secciones');
              var cb = document.getElementsByClassName('folios');
              //var cb = document.getElementsByClassName('folios');
              var total = cb.length;

              for(i=0; i<cb.length; i++){
                if(secciones.checked == true){
                  cb[i].checked = true;
                }else{
                  cb[i].checked = false;
                }
              }           
          }
          function marcar_desmarcar2(){
              var informacion = document.getElementById('informacion');
              var cb = document.getElementsByClassName('checkbox2');
              //var cb = document.getElementsByClassName('folios');
              var total = cb.length;

              for(i=0; i<cb.length; i++){
                if(informacion.checked == true){
                  cb[i].checked = true;
                }else{
                  cb[i].checked = false;
                }
              }           
          }
          function marcar_desmarcar3(){
              var formularios = document.getElementById('formularios');
              var cb = document.getElementsByClassName('checkbox3');
              //var cb = document.getElementsByClassName('folios');
              var total = cb.length;

              for(i=0; i<cb.length; i++){
                if(formularios.checked == true){
                  cb[i].checked = true;
                }else{
                  cb[i].checked = false;
                }
              }           
          }

          function desmarcar1(){
              var opcion = document.getElementById('secciones');
              opcion.checked = false;           
          }
          function desmarcar2(){
              var opcion = document.getElementById('informacion');
              opcion.checked = false;           
          }
          function desmarcar3(){
              var opcion = document.getElementById('formularios');
              opcion.checked = false;           
          }




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
