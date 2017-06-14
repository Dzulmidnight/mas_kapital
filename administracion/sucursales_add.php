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
    $img = 'IMAGEN';

    $sql = "INSERT INTO sucursales (NombreSucursal, Estado, Municipio, Calle, Numero, Referencia, CP, Colonia, Telefono, Email, X, Y, UrlFoto) VALUES ('$nombre', '$estado', '$municipio', '$calle', '$numero', '$referencia', '$cp', '$colonia', '$telefono', '$email', '$x', '$y', '$img')";
    $mysqli->query($sql);

    echo "<script>alert('SE AGREGO LA SUCURSAL');</script>";
  }

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
                            <a href="javascript:;" class="fa fa-times"></a>
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
                                    <img class="img-responsive" src="../img/sucursales/img_sucursal/<?php echo $registros['UrlFoto']; ?>.jpg" alt="" width="40px;">
                                  <?php
                                  }else{
                                  ?>
                                     <img class="img-responsive" src="../img/sucursales/sucursal.png" alt="" width="40px;">
                                  <?php
                                  }
                                  ?>
                                </td>
                                
                                <td>
                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                              </tr>
                            <?php
                            }
                             ?>
                          </tbody>
                          <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th class="hidden-phone">Engine version</th>
                                <th class="hidden-phone">CSS grade</th>
                                <th></th>
                            </tr>
                          </tfoot>
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

    <!-- Modal -->
    <div class="modal fade" id="modalSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><b>Formulario Sucursal</b></h4>
                  </div>
                  <div class="modal-body">
                    <!-- page start-->
                    <div class="row">
                        <!--<aside class="profile-nav col-lg-3">
                            <section class="panel">
                                <div class="user-heading round">
                                    <a href="#">
                                        <img src="img/profile-avatar.jpg" alt="">
                                    </a>
                                    <h1>Jonathan Smith</h1>
                                    <p>jsmith@flatlab.com</p>
                                </div>

                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                                    <li  class="active"><a href="profile-edit.html"> <i class="fa fa-edit"></i> Edit profile</a></li>
                                </ul>

                            </section>
                        </aside>-->
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
                                        <input type="file" class="form-control" name="" id="" placeholder="">
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                            </section>
                            <!--<section>
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> Sets New Password & Avatar</div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Current Password</label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="c-pwd" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">New Password</label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="n-pwd" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Re-type New Password</label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="rt-pwd" placeholder=" ">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Change Avatar</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="file-pos" id="exampleInputFile">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-info">Save</button>
                                                    <button type="button" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>-->
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
    <script src="js/jquery.js"></script>
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
