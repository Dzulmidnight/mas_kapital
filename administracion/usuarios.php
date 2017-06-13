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
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                              <div class="btn-group">
                                  <button id="editable-sample_new" class="btn green">
                                      Nuevo Registro <i class="fa fa-plus"></i>
                                  </button>
                              </div>
                              <!--10_06_2017<div class="btn-group pull-right">
                                  <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                  </button>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="#">Print</a></li>
                                      <li><a href="#">Save as PDF</a></li>
                                      <li><a href="#">Export to Excel</a></li>
                                  </ul>
                              </div>10_06_2017-->
                          </div>
                          <div class="space15"></div>

                          <div class="table-responsive">

                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                                <tr>
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
                                  <tr class="">
                                      <td><?php echo $registros['nombre']; ?></td>
                                      <td><?php echo $registros['tipo']; ?></td>
                                      <td><?php echo $registros['user']; ?></td>
                                      <td class="center"><?php echo $registros['password']; ?></td>
                                      <td><a class="edit" href="javascript:;">Editar</a></td>
                                      <td><a class="delete" href="javascript:;">Eliminar</a></td>
                                  </tr>
                                <?php  
                                }

                              ?>
                                <tr class="">
                                    <td>Dulal</td>
                                    <td>Jonathan Smith</td>
                                    <td>434</td>
                                    <td class="center">new user</td>
                                    <td><a class="edit" href="javascript:;">Editar</a></td>
                                    <td><a class="delete" href="javascript:;">Eliminar</a></td>
                                </tr>
                              </tbody>
                          </table>

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
      </script>


  </body>
</html>
