<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  include('funciones.php');

  $seccion = 'secciones';
  $menu = 'meta';

  /// INSERTAMOS LA INFORMACIÓN DEL META-DESCRIPTION DE CADA PÁGINA
  if(isset($_POST['meta_index']) && $_POST['meta_index'] == 1){
    $idpagina = 1;
    $updateSQL = "UPDATE pagina1 SET meta_description = '$_POST[descripcion]' WHERE idpagina1 = $idpagina";
    $actualizar = $mysqli->query($updateSQL);

  }else if(isset($_POST['meta_normatividad']) && $_POST['meta_normatividad'] == 2){
    $idpagina = 2;
    $query = "SELECT * FROM pagina2";
    $consultar = $mysqli->query($query);
    $total = $consultar->num_rows;
    if($total == 0){

      $insertSQL = "INSERT INTO pagina2(idpagina2, meta_description) VALUES (idpagina2, '$_POST[descripcion]')";
      $insertar = $mysqli->query($insertSQL);
    }else{
      $updateSQL = "UPDATE pagina2 SET meta_description = '$_POST[descripcion]' WHERE idpagina2 = $idpagina";
      $actualizar = $mysqli->query($updateSQL);
    }
  }else if(isset($_POST['meta_masflexible']) && $_POST['meta_masflexible'] == 3){
    $idpagina = 3;

    $updateSQL = "UPDATE pagina3 SET meta_description = '$_POST[descripcion]' WHERE idpagina3 = $idpagina";
    $actualizar = $mysqli->query($updateSQL);
  }else if(isset($_POST['meta_universidad']) && $_POST['meta_universidad'] == 4){
    $idpagina = 4;

    $updateSQL = "UPDATE pagina4 SET meta_description = '$_POST[descripcion]' WHERE idpagina4 = $idpagina";
    $actualizar = $mysqli->query($updateSQL);
  }else if(isset($_POST['meta_atencion']) && $_POST['meta_atencion'] == 5){
    $idpagina = 5;

    $updateSQL = "UPDATE pagina5 SET meta_description = '$_POST[descripcion]' WHERE idpagina5 = $idpagina";
    $actualizar = $mysqli->query($updateSQL);
  }
  /// FIN


 ?>
<html lang="esp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Meta description</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

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
          <section class="wrapper site-min-height">

            <form action="" method="POST">
              <?php 
              $query = "SELECT meta_description FROM pagina1";
              $consultar = $mysqli->query($query);
              $detalle = $consultar->fetch_assoc();
               ?>
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">META DESCRIPTION - ¿QUIENES SOMOS?</h3>
                </div>
                <div class="panel-body">
                  <textarea class="form-control" name="descripcion" id="" rows="10" placeholder="Ingresa las palabras clave o descripción sobre la página deseada"><?php echo $detalle['meta_description']; ?></textarea>
                  <button class="btn btn-info" type="submit" name="meta_index" value="1" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                </div>
              </div>  
            </form>

            <form action="" method="POST">
              <?php 
              $query = "SELECT meta_description FROM pagina2";
              $consultar = $mysqli->query($query);
              $detalle = $consultar->fetch_assoc();
               ?>

              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title">META DESCRIPTION - NORMATIVIDAD</h3>
                </div>
                <div class="panel-body">
                  <textarea class="form-control" name="descripcion" id="" rows="10" placeholder="Ingresa las palabras clave o descripción sobre la página deseada"><?php echo $detalle['meta_description']; ?></textarea>
                  <button class="btn btn-info" type="submit" name="meta_normatividad" value="2" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                </div>
              </div>  
            </form>

            <form action="" method="POST">
              <?php 
              $query = "SELECT meta_description FROM pagina3";
              $consultar = $mysqli->query($query);
              $detalle = $consultar->fetch_assoc();
               ?>

              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">META DESCRIPTION - MÁSFLEXIBLE</h3>
                </div>
                <div class="panel-body">
                  <textarea class="form-control" name="descripcion" id="" rows="10" placeholder="Ingresa las palabras clave o descripción sobre la página deseada"><?php echo $detalle['meta_description']; ?></textarea>
                  <button class="btn btn-info" type="submit" name="meta_masflexible" value="3" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                </div>
              </div>  
            </form>

            <form action="" method="POST">
              <?php 
              $query = "SELECT meta_description FROM pagina4";
              $consultar = $mysqli->query($query);
              $detalle = $consultar->fetch_assoc();
               ?>

              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title">META DESCRIPTION - UNIVERSIDAD MK</h3>
                </div>
                <div class="panel-body">
                  <textarea class="form-control" name="descripcion" id="" rows="10" placeholder="Ingresa las palabras clave o descripción sobre la página deseada"><?php echo $detalle['meta_description']; ?></textarea>
                  <button class="btn btn-info" type="submit" name="meta_universidad" value="4" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                </div>
              </div>  
            </form>

            <form action="" method="POST">
              <?php 
              $query = "SELECT meta_description FROM pagina5";
              $consultar = $mysqli->query($query);
              $detalle = $consultar->fetch_assoc();
               ?>

              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">META DESCRIPTION - ATENCIÓN CLIENTES</h3>
                </div>
                <div class="panel-body">
                  <textarea class="form-control" name="descripcion" id="" rows="10" placeholder="Ingresa las palabras clave o descripción sobre la página deseada"><?php echo $detalle['meta_description']; ?></textarea>
                  <button class="btn btn-info" type="submit" name="meta_atencion" value="5" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                </div>
              </div>  
            </form>

          </section>
      </section>
      <!--main content end-->

 

      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/slidebars.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>



  </body>
</html>
