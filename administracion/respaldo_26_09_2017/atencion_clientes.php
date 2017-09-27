<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  
  $pagina = 5;
  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
    
    $sec1_titulo1 = $_POST['sec1_titulo1'];
    $sec1_cont1 = $_POST['sec1_cont1'];
    $sec2_cont1 = $_POST['sec2_cont1'];
    $sec2_cont2 = $_POST['sec2_cont2'];
    $sec2_cont3 = $_POST['sec2_cont3'];
    $sec2_cont4 = $_POST['sec2_cont4'];

    $ruta_archivo = '../documentos/';
    $ruta_img = '../img/atencion_clientes/';

    $img_actual = $_POST['img_actual'];
    $archivo_actual = $_POST['archivo_actual'];

    if(!empty($_FILES['nuevo_archivo']['name'])){
        unlink($archivo_actual);
        $_FILES["nuevo_archivo"]["name"];
          move_uploaded_file($_FILES["nuevo_archivo"]["tmp_name"], $ruta_archivo.$_FILES["nuevo_archivo"]["name"]);
          $archivo = $ruta_archivo.basename($_FILES["nuevo_archivo"]["name"]);
          //$archivo = $rutaArchivo.basename($fecha."_".$_FILES["nueva_cotizacion"]["name"]);
    }else{
      $archivo = $archivo_actual;
    }

    if(!empty($_FILES['img']['name'])){
        unlink($img_actual);
        $_FILES["img"]["name"];
          move_uploaded_file($_FILES["img"]["tmp_name"], $ruta_img.$_FILES["img"]["name"]);
          $img = $ruta_img.basename($_FILES["img"]["name"]);
          //$archivo = $rutaArchivo.basename($fecha."_".$_FILES["nueva_cotizacion"]["name"]);
    }else{
      $img = $img_actual;
    }


    $query = "UPDATE pagina5 SET sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3', sec2_cont4 = '$sec2_cont4', archivo = '$archivo', img = '$img' WHERE idpagina5 = $pagina";

    $actualizar = $mysqli->query($query);
  }

  $seccion = 'secciones';
  $menu = 'atencion';
  $sql = "SELECT * FROM pagina5 WHERE idpagina5 = $pagina";
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

    <title>Sección: Atención a Clientes</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-multi-select/css/multi-select.css" />

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--  summernote -->
    <link href="assets/summernote/dist/summernote.css" rel="stylesheet">

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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div id="" style="position:fixed;z-index: 1;">
                                  <div class="">
                                    <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
                                  </div>
                                </div>

                                <section id="">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 text-center" style="background-color: #f58947;border:10px solid #ffffff;">
                                                
                                                <div class="text-center col-xs-12">
                                                    <h1 class="text-center" style="padding-top:1em;">
                                                      <input type="text" style="width:300px;" name="sec2_cont1" value="<?php echo $contenido['sec2_cont1']; ?>">
                                                    </h1>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="text-center" style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                                                    <h2>
                                                      <input type="text" style="width:300px;" name="sec2_cont2" value="<?php echo $contenido['sec2_cont2']; ?>">
                                                    </h2>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                                                    <h2 style="">
                                                      <input type="text" style="width:300px;" name="sec2_cont3" value="<?php echo $contenido['sec2_cont3']; ?>">
                                                    </h2>
                                                </div>
                                                <div class="col-xs-12" style="padding-bottom:2em;">
                                                    <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                                                    <p style="margin-top:1em;">
                                                      <input type="text" style="width:300px;" name="sec2_cont4" value="<?php echo $contenido['sec2_cont4']; ?>">
                                                    </p>
                                                </div>  
                                            </div>
                                            <div id="ayuda" class="col-md-8 col-xs-12 text-justify">
                                                <div class="col-sm-8">
                                                    <h2>
                                                      <input type="text" name="sec1_titulo1" value="<?php echo $contenido['sec1_titulo1']; ?>">
                                                    </h2>
                                                    <textarea class="form-control editorTextarea" name="sec1_cont1" id="" rows="10"><?php echo $contenido['sec1_cont1']; ?></textarea>          
                                                </div>
                                                <div class="col-sm-4">
                                                    <img src="<?php echo $contenido['img']; ?>" alt="">
                                                    <input type="hidden" name="img_actual" value="<?php echo $contenido['img']; ?>">
                                                    <div class="form-group">
                                                        <div class="controls col-md-12">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                              <span class="btn btn-white btn-file">
                                                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                              <input type="file" name="img" class="default" />
                                                              </span>
                                                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12 text-center" style="background-color: #4f5898;border:10px solid #ffffff;">

                                                <div class="text-center col-xs-12">
                                                    <h2 class="text-center" style="color:#ffffff;padding-top:1em;margin-bottom:0px;"><b>Conoce el</b></h2>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                                                    <h2 style="color: #ffffff;margin:0px;"><b>Aviso de</b></h2>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                                                    <h2 style="color:#ffffff;margin:0px;">Privacidad</h2>
                                                </div>
                                                <div class="col-xs-12" style="padding-bottom:2em;">
                                                    <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                                                    <h2 style="color:#ffffff;margin:0px;">es tu derecho</h2>
                                                </div>
                                                <div class="col-xs-12">
                                                    <a class="btn btn-default" href="<?php echo $contenido['archivo']; ?>" target="_new" style="width:200px;margin-bottom:3em;">
                                                        <img src="../img/atencion_clientes/btn.png">
                                                    </a>
                                                        <input type="hidden" name="archivo_actual" value="<?php echo $contenido['archivo']; ?>">
                                                        <div class="controls col-md-12">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                              <span class="btn btn-white btn-file">
                                                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Reemplazar Aviso</span>
                                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                              <input type="file" name="nuevo_archivo" class="default" />
                                                              </span>
                                                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                            </div>
                                                        </div>

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
