<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  
  $pagina = 4;
  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
    
    $sec1_titulo1 = $_POST['sec1_titulo1'];
    $sec1_cont1 = $_POST['sec1_cont1'];
    $sec2_titulo1 = $_POST['sec2_titulo1'];
    $sec2_cont1 = $_POST['sec2_cont1'];
    $sec3_cont1 = $_POST['sec3_cont1'];

    $query = "UPDATE pagina4 SET sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec3_cont1 = '$sec3_cont1' WHERE idpagina4 = '$pagina'";


    //$query = "UPDATE pagina1  SET sec1_img1 = '$sec1_img1', sec1_img2 = '$sec1_img2', sec1_img3 = '$sec1_img3', sec1_img4 = '$sec1_img4', sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec1_cont4 = '$sec1_cont4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3' WHERE idpagina1 = 1";

    //$query = "UPDATE pagina1 SET sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3', sec3_titulo1 = '$sec3_titulo1', sec3_cont1 = '$sec3_cont1', sec3_titulo2 = '$sec3_titulo2', sec3_cont2 = '$sec3_cont2', sec4_titulo1 = '$sec4_titulo1', sec4_sub1 = '$sec4_sub1', sec4_cont1 = '$sec4_cont1', sec4_img1 = '$sec4_img1' WHERE idpagina1 = 1 ";
    $actualizar = $mysqli->query($query);
  }

  $seccion = 'secciones';
  $menu = 'universidad';
  $sql = "SELECT * FROM pagina4 WHERE idpagina4 = $pagina";
  $ejecutar = $mysqli->query($sql);
  $contenido = $ejecutar->fetch_assoc();
 ?>

<!DOCTYPE html>
<html lang="esp">
  <head>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({ 
        selector:'.editorTextarea'
      });
    </script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
      <link href="../css/main.css" rel="stylesheet">
    <title>Sección: Universidad MK</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
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

  <body >

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
          <section class="">
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="">
                          <header class="panel-heading">
                            Sección: <span style="color:red">Universidad MK</span>
                          </header>
                          <div class="panel-body">
<form action="" method="POST">
    <div id="" style="position:fixed;z-index: 1;">
      <div class="">
        <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
      </div>
    </div>

    <section>
        <div class="container">
            <div class="row" id="descripcion_universidad" style="padding-bottom:2em;">
                <div class="col-md-12" style="left:25%">
                    <h1 style="font-size:40px;margin-bottom:1em;">
                      <input type="text" name="sec1_titulo1" value="<?php echo $contenido['sec1_titulo1']; ?>">
                    </h1>
                </div>
                <div class="col-md-8 text-justify" style="left:25%;font-size:18px;">
                    <textarea class="form-control" name="sec1_cont1" id="" cols="30" rows="10"><?php echo $contenido['sec1_cont1']; ?></textarea>
                </div>

            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="portal_mk">
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="padding-left:1em;padding-right:1em">
                    <div class="col-sm-12" style="background:#f26e23">
                        <h1 style="color:#ffffff;padding-left:1em;"><b>PORTAL</b></h1>
                    </div>
                    <div class="col-sm-12">
                        <h2>Universidad MásKapital</h2>
                    </div>
                    <div class="col-sm-12">
                        <h2>CONTACTO</h2>
                        <img style="width:100%" src="../img/universidad_mk/fb_universidad.png" alt="">
                    </div>
                    <div class="col-sm-12" style="font-size:16px;color: #858789">
                          <textarea class="form-control editorTextarea" name="sec3_cont1" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont1']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-8">
                    <!--<div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v4Z0qYXmtUw" frameborder="0" allowfullscreen></iframe>
                    </div>-->
                    <div class="col-md-10 text-justify">
                        <h1 style="color:#2a3031">
                          <input type="text" name="sec2_titulo1" value="<?php echo $contenido['sec2_titulo1']; ?>">
                        </h1>
                        <textarea class="form-control editorTextarea" name="sec2_cont1" id="" rows="20"><?php echo $contenido['sec2_cont1']; ?></textarea>
                    </div>
                    <div class="col-md-2">
                        <img class="img-responsive" src="../img/universidad_mk/logo_universidadmk.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


</form>
      
                          </div>
                      </section>
                      <!--Pulstate  end-->
                  </div>
              </div>
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->

      <!-- Right Slidebar end -->
      <!--footer start-->

      <!--footer end-->
  </section>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>
  
    <!--this page plugins-->

  <script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>




  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--this page  script only-->



  </body>
</html>
