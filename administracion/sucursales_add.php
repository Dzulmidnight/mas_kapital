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

  if(isset($_POST['eliminar_sucursal'])){
    $idsucursal = $_POST['eliminar_sucursal'];
    $sql = "DELETE FROM sucursales WHERE idSucursales = '$idsucursal'";
    $mysqli->query($sql);
    echo "<script>alert('Se ha eliminado la sucursal');</script>";
  }
  $seccion = 'informacion';
  $menu = 'sucursales_add';

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

    <title>Información Sucursales</title>

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


          <section class="wrapper">

              <div class="row">
                <div class="col-sm-12">
                  <section class="panel">
                    <header class="panel-heading">
                        Sucursales Registradas
                         <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>

                         </span>
                    </header>
                    <div class="panel-body">
                      <div class="clearfix">
                        <div class="btn-group">
                          <button id="" class="btn btn-default" data-toggle="modal" href="#modalSucursal">
                            Nuevo Registro <i class="fa fa-plus"></i>
                          </button>
                          <!--<a class="btn btn-warning" data-toggle="modal" href="#modalSucursal">
                            Large
                          </a>-->
                        </div>
                      </div>

                      <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                          <thead>
                            <tr>
                                <th>Sucursal</th>
                                <th>Estado</th>
                                <th class="hidden-phone">Municipio</th>
                                <th class="hidden-phone">Email</th>
                                <th class="hidden-phone">Img</th>
                                <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $query = "SELECT * FROM Sucursales";
                            $consultar = $mysqli->query($query);

                            while($registros = $consultar->fetch_assoc()){
                            ?>
                              <tr class="gradeX">
                                <td><?php echo $registros['NombreSucursal']; ?></td>
                                <td><?php echo $registros['Estado']; ?></td>
                                <td><?php echo $registros['Municipio']; ?></td>
                                <td><?php echo $registros['Email']; ?></td>
                                <td>
                                  <?php 
                                  if(!empty($registros['UrlFoto'])){
                                  ?>
                                    <img class="img-responsive" src="../img/sucursales/img_sucursal/<?php echo $registros['UrlFoto']; ?>" alt="" width="40px;">
                                  <?php
                                  }else{
                                  ?>
                                     <img class="img-responsive" src="../img/sucursales/sucursal.png" alt="" width="40px;">
                                  <?php
                                  }
                                  ?>
                                </td>
                                
                                <td>
                                  <form action="" method="POST">
                                    <button id="" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="<?php echo '#modalEditarSucursal'.$registros['idSucursales']; ?>"><i class="fa fa-pencil"></i></button>
                                    <button type="submit" name="eliminar_sucursal" class="btn btn-danger btn-xs" value="<?php echo $registros['idSucursales']; ?>" onclick="return confirm('¿Desea eliminar la sucursal ?');"><i class="fa fa-trash-o "></i></button>
                                  </form>
                                  
                                </td>
                              </tr>
                                <!-- Modal Editar Sucursal -->
                                <div class="modal fade" id="<?php echo 'modalEditarSucursal'.$registros['idSucursales']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                          <form action="" method="POST" enctype="multipart/form-data">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title"><b>Editar Sucursal: <span style="color:#2c3e50"><?php echo $registros['NombreSucursal']; ?></span></b></h4>
                                              </div>
                                              <div class="modal-body">
                                                <!-- page start-->
                                                <div class="row">
                                                    <aside class="profile-nav col-lg-3">
                                                        <section class="panel">
                                                            <div >
                                                                <a href="#">
                                                                    <img class="img-responsive img-thumbnail" widht="45px;" src="../img/sucursales/img_sucursal/<?php echo $registros['UrlFoto']; ?>" alt="">
                                                                </a>
                                                                <!--<h1>Jonathan Smith</h1>
                                                                <p>jsmith@flatlab.com</p>-->
                                                            </div>

                                                            <div class="form-group">
                                                              <label  class="col-lg-12 control-label"><b>Reemplazar Imagen</b></label>
                                                              <div class="col-lg-12">
                                                                  <input type="hidden" name="img_actual" value="<?php echo $registros['UrlFoto']; ?>">
                                                                  <input type="file" class="" name="img_sucursal" value="">
                                                              </div>
                                                            </div>
                                                            <div class="form-group">
                                                              <label  class="col-lg-12 control-label"><b>Coordena X</b></label>
                                                              <div class="col-lg-12">
                                                                  <input type="text" class="form-control" name="x" value="<?php echo $registros['X'] ?>" placeholder="16.831622">
                                                              </div>
                                                            </div>
                                                            <div class="form-group">
                                                              <label  class="col-lg-12 control-label"><b>Coordenada Y</b></label>
                                                              <div class="col-lg-12">
                                                                  <input type="text" class="form-control" name="y" value="<?php echo $registros['Y'] ?>" placeholder="-96.782573">
                                                              </div>
                                                            </div>



                                                        </section>
                                                    </aside>
                                                    <aside class="profile-info col-lg-9">
                                                        <section class="panel">
                                                            <div class="panel-body bio-graph-info">
                                                                <h1> Información de la Sucursal</h1>
                                                                <form class="form-horizontal" role="form">

                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Nombre Sucursal</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="nombre" value="<?php echo $registros['NombreSucursal']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Estado</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="estado" value="<?php echo $registros['Estado']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Municipio</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="municipio" value="<?php echo $registros['Municipio']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Colonia</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="colonia" value="<?php echo $registros['Colonia']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">C.P.</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="cp" value="<?php echo $registros['CP']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Calle</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="calle" value="<?php echo $registros['Calle']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Num. Ext.</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="numero" value="<?php echo $registros['Numero']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Referencias</label>
                                                                        <div class="col-lg-6">
                                                                            <textarea name="referencia" class="form-control" rows="2"><?php echo $registros['Referencia']; ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Teléfono</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="telefono" value="<?php echo $registros['Telefono']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Email</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="email" value="<?php echo $registros['Email']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </section>
                                                    </aside>
                                                </div>
                                                <!-- page end-->
                                              </div>
                                              <div class="modal-footer">
                                                <input type="hidden" name="idsucursal" value="<?php echo $registros['idSucursales']; ?>">
                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                                                  <button class="btn btn-success" type="submit" name="actualizar_sucursal" value="1"> Actualizar Información</button>
                                              </div>              
                                          </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Termina Modal Editar -->

                            <?php
                            }
                             ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
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



  </body>
</html>
