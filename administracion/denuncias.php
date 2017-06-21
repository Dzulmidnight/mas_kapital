<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');

  if(isset($_POST['guardar_sucursal']) && $_POST['guardar_sucursal'] == 1){
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $referencia = $_POST['referencia'];
    $cp = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $img = '';

    $rutaImg = "../img/sucursales/img_sucursal/";

    if(!empty($_FILES['img_sucursal']['name'])){
        $_FILES["img_sucursal"]["name"];
          move_uploaded_file($_FILES["img_sucursal"]["tmp_name"], $rutaImg.$_FILES["img_sucursal"]["name"]);
          $img_sucursal = basename($_FILES["img_sucursal"]["name"]);
    }else{
      $img_sucursal = NULL;
    }

    $sql = "INSERT INTO sucursales (NombreSucursal, Estado, Municipio, Calle, Numero, Referencia, CP, Colonia, Telefono, Email, X, Y, UrlFoto) VALUES ('$nombre', '$estado', '$municipio', '$calle', '$numero', '$referencia', '$cp', '$colonia', '$telefono', '$email', '$x', '$y', '$img_sucursal')";
    $mysqli->query($sql);

  }

  if(isset($_POST['actualizar_sucursal']) && $_POST['actualizar_sucursal'] == 1){
    $idsucursal = $_POST['idsucursal'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $referencia = $_POST['referencia'];
    $cp = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $img = '';

    $rutaImg = "../img/sucursales/img_sucursal/";
    $imagen = "../img/sucursales/img_sucursal/".$_POST['img_actual'];
    if(!empty($_FILES['img_sucursal']['name'])){
        if(file_exists($imagen)){
          unlink($imagen);
        }
        $_FILES["img_sucursal"]["name"];
          move_uploaded_file($_FILES["img_sucursal"]["tmp_name"], $rutaImg.$_FILES["img_sucursal"]["name"]);
          $img_sucursal = basename($_FILES["img_sucursal"]["name"]);
    }else{
      $img_sucursal = $_POST['img_actual'];
    }

    $sql = "UPDATE sucursales SET NombreSucursal = '$nombre', Estado = '$estado', Municipio = '$municipio', Calle = '$calle', Numero = '$numero', Referencia = '$referencia', CP = '$cp', Colonia = '$colonia', Telefono = '$telefono', Email = '$email', X = '$x', Y = '$y', UrlFoto = '$img_sucursal' WHERE idSucursales = '$idsucursal'";

    $mysqli->query($sql);
  }

  if(isset($_POST['eliminar_denuncia'])){
    $idfrm_denuncia = $_POST['eliminar_denuncia'];
    $sql = "DELETE FROM frm_denuncia WHERE idfrm_denuncia = '$idfrm_denuncia'";
    $mysqli->query($sql);
    echo "<script>alert('Se ha eliminado la denuncia');</script>";
  }

  $seccion = 'formularios';
  $menu = 'denuncias';


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

    <title>Denuncias</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php include('header.php'); ?>
      <!--header end-->
      <!--sidebar start-->
      <?php include('aside.php'); ?>
      <!--sidebar end-->
      <!--main content start-->

      <section id="main-content">
        <section class="wrapper site-min-height">
            <section class="panel">
                <header class="panel-heading">
                    Denuncias Registradas
                </header>
                  <div class="row">
                    <!-- inicia tabla de denuncias -->
                    <div class="col-md-8">
                      <section class="panel">
                        <div class="panel-body">
                            <div class="adv-table">
                              <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                  <tr>
                                      <th>Fecha</th>
                                      <th>Nombre</th>
                                      <th class="hidden-phone">Estado</th>
                                      <th class="hidden-phone">Teléfono</th>
                                      <th class="hidden-phone">Sucursal</th>
                                      <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $query = "SELECT frm_denuncia.*, sucursales.NombreSucursal FROM frm_denuncia LEFT JOIN sucursales ON frm_denuncia.sucursal = sucursales.idSucursales";
                                  $consultar = $mysqli->query($query);

                                  while($denuncias = $consultar->fetch_assoc()){
                                    $fecha = date('d/m/Y', $denuncias['fecha']);
                                    $idfila = 'fila'.$denuncias['idfrm_denuncia'];
                                  ?>
                                    <tr id="<?php echo $idfila; ?>" class="gradeX">
                                      <td><?php echo $fecha; ?></td>
                                      <td><?php echo $denuncias['nombre_denunciante']; ?></td>
                                      <td><?php echo $denuncias['estado_denunciante']; ?></td>
                                      <td><?php echo $denuncias['telefono_denunciante']; ?></td>
                                      <td><?php echo $denuncias['NombreSucursal']; ?></td>

                                      
                                      <td>
                                        <form id="<?php echo 'frm_denuncia'.$denuncias['idfrm_denuncia'] ?>" action="" method="POST">
                                          <input type="hidden" name="idfrm_denuncia" value="<?php echo $denuncias['idfrm_denuncia'] ?>">
                                          <!--<button id="<?php echo 'btn-consultar_denuncia'.$denuncias['idfrm_denuncia']; ?>" type="button" class="btn btn-info btn-xs" onclick="document.getElementById('<?php echo $idfila; ?>').className = 'success'" data-toggle="tooltip" title="Más información"><i class="fa fa-eye"></i></button>-->
                                          <button id="<?php echo 'btn-consultar_denuncia'.$denuncias['idfrm_denuncia']; ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" title="Más información"><i class="fa fa-eye"></i></button>

                                          <button type="submit" name="eliminar_denuncia" class="btn btn-danger btn-xs" value="<?php echo $denuncias['idfrm_denuncia']; ?>" onclick="return confirm('¿Desea eliminar la denuncia ?');"><i class="fa fa-trash-o "></i></button>
                                        </form>
                                        
                                      </td>
                                    </tr>
                                      <!-- Modal Editar Sucursal -->
                                      <!-- Termina Modal Editar -->

                                  <?php
                                      echo "<script>";
                                        //var x = '#btn-editar'+n;
                                        echo "$(document).on('ready',function(){";

                                          echo "$('#btn-consultar_denuncia".$denuncias['idfrm_denuncia']."').click(function(){";
                                            echo "var url = 'datos_denuncia.php';";                                   

                                            echo "$.ajax({";                        
                                               echo "type: 'POST',";                 
                                               echo "url: url,";                    
                                               echo "data: $('#frm_denuncia".$denuncias['idfrm_denuncia']."').serialize(),";
                                               echo "success: function(data)";           
                                               echo "{";
                                                 echo "$('#datos_denuncia').html(data);";          
                                               echo "}";
                                             echo "});";
                                          echo "});";
                                        echo "});";
                                      echo "</script>";

                                  }
                                   ?>
                                </tbody>
                              </table>
                            </div>                 
                        </div>
               
                      </section>
                    </div>
                    <!-- termina tabla de denuncias -->
                    <div class="col-md-4">
                        <section class="panel">
                            <header class="panel-heading">
                                Datos de la Denuncia
                            </header>

                            <div id="datos_denuncia" class="panel-body">
                              <h4>No se encontraron registros</h4>
                            </div>

                        </section>
                    </div>

                  </div>

            </section>          
        </section>

      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      <!-- Right Slidebar end -->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
  </section>

    <!-- Modal Agregar Sucursal -->
    <div class="modal fade" id="modalSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><b>Formulario Sucursal </b></h4>
                  </div>
                  <div class="modal-body">
                    <!-- page start-->
                    <div class="row">

                        <aside class="profile-info col-lg-12">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                  <table class="table table-bordered">
                                    <tr>
                                      <td>Nombre Sucursal</td>
                                      <td colspan="3">
                                        <input type="text" class="form-control" name="nombre" id="f-name" placeholder="Nombre de la Sucursal">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Estado</td>
                                      <td colspan="3">
                                        <?php 
                                        $query = "SELECT nombre FROM estados";
                                        $consultar = $mysqli->query($query);
                                        ?>
                                          <select class="form-control" name="estado" id="">
                                            <option value="">Selecciona un Estado</option>
                                            <?php 
                                            while($estados = $consultar->fetch_assoc()){
                                              echo "<option values='".$estados['nombre']."'>".$estados['nombre']."</option>";
                                            }
                                            ?>
                                          </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Municipio</td>
                                      <td colspan="3">
                                        <input type="text" class="form-control" name="municipio" id="" placeholder="Municipio">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Colonia</td>
                                      <td>
                                        <input type="text" class="form-control" name="colonia" placeholder="Colonia">
                                      </td>
                                      <td>C.P.</td>
                                      <td>
                                        <input type="text" class="form-control" name="cp" placeholder="C.P.">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Calle</td>
                                      <td>
                                        <input type="text" class="form-control" name="calle" id="" placeholder="Calle">
                                      </td>
                                      <td>Num. Ext.</td>
                                      <td>
                                        <input type="text" class="form-control" name="numero" id="" placeholder="Num. #">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Referencias</td>
                                      <td colspan="3">
                                        <textarea class="form-control" name="referencia" id="" rows="2" placeholder="Ej: Planta Interior, Local #"></textarea>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Teléfono</td>
                                      <td>
                                        <input type="text" class="form-control" name="telefono" id="" placeholder="Teléfono">
                                      </td>
                                      <td>Email</td>
                                      <td>
                                        <input type="text" class="form-control" name="email" id="" placeholder="Email">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="info text-center" colspan="4"><b>Coordenadas Aproximadas de la Sucursal</b></td>
                                    </tr>
                                    <tr>
                                      <td>Coordenada X</td>
                                      <td>
                                        <input type="text" class="form-control" name="x" id="" placeholder="Ej: 16.831622">
                                      </td>
                                      <td>Coordenada Y</td>
                                      <td>
                                        <input type="text" class="form-control" name="y" id="" placeholder="Ej: -96.782573">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Imagen Sucursal</td>
                                      <td colspan="3">
                                        <input type="file" class="form-control" name="img_sucursal" id="">
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                            </section>
                        </aside>
                    </div>
                    <!-- page end-->
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                      <button class="btn btn-success" type="submit" name="guardar_sucursal" value="1"> Guardar Sucursal</button>
                  </div>              
              </form>
            </div>
        </div>
    </div>
    <!-- modal -->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

  </body>
</html>
