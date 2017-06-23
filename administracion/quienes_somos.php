<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  include('funciones.php');

if (!isset($_SESSION)) {
  session_start();
  
  $redireccion = "../index.php?ADM";

  if(!$_SESSION["autentificado"]){
    header("Location:".$redireccion);
  }
}


  /******* VARIABLES GENERALES *******/
  $idpagina = 1; // 1 = quienes somos
  /******* VARIABLES GENERALES *******/

  

  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){


    //CONSULTAMOS EL NUMERO DE IMAGENES DENTRO DEL SLIDE PARA PODER REEMPLAZAR O MANTENER CAMBIOS
    $ruta_slide = '../img/slider/principal/';

    $query = "SELECT * FROM slide WHERE pagina = $idpagina";
    $consultar_slide = $mysqli->query($query);

    while($slide = $consultar_slide->fetch_assoc()){
      $slide_actual = $_POST['img_slide_actual'.$slide['idslide']];

      if(!empty($_FILES['img_slide'.$slide['idslide']]['name'])){
          unlink($slide_actual);

          $_FILES['img_slide'.$slide['idslide']]['name'];
          move_uploaded_file($_FILES['img_slide'.$slide['idslide']]['tmp_name'], $ruta_slide.$_FILES['img_slide'.$slide['idslide']]['name']);
          $img_slide = $ruta_slide.basename($_FILES['img_slide'.$slide['idslide']]['name']);
            //$archivo = $rutaArchivo.basename($fecha."_".$_FILES["nueva_cotizacion"]["name"]);
      
            $query = "UPDATE slide SET img = '$img_slide' WHERE idslide = '$slide[idslide]'";
            $actualizar = $mysqli->query($query);
      }  

    }

    if(!empty($_FILES['nuevo_slide']['name'])){
      $_FILES['nuevo_slide']['name'];
      move_uploaded_file($_FILES['nuevo_slide']['tmp_name'], $ruta_slide.$_FILES['nuevo_slide']['name']);
      $img_slide = $ruta_slide.basename($_FILES['nuevo_slide']['name']);

      $query = "INSERT INTO slide (pagina, img) VALUES ('1', '$img_slide')";
      $insertar = $mysqli->query($query);

    }

    $ruta_img = '../img/index/';
    $ruta_norma = 'img/index/'
    ;
    $sec1_img1_actual = $_POST['sec1_img1_actual'];
    $sec1_img2_actual = $_POST['sec1_img2_actual'];
    $sec1_img3_actual = $_POST['sec1_img3_actual'];
    $sec1_img4_actual = $_POST['sec1_img4_actual'];

    if(!empty($_FILES['sec1_img1']['name'])){
        unlink($sec1_img1_actual);
        $_FILES["sec1_img1"]["name"];
          move_uploaded_file($_FILES["sec1_img1"]["tmp_name"], $ruta_img.$_FILES["sec1_img1"]["name"]);
          $sec1_img1 = $ruta_img.basename($_FILES["sec1_img1"]["name"]);
          //$archivo = $rutaArchivo.basename($fecha."_".$_FILES["nueva_cotizacion"]["name"]);
    }else{
      $sec1_img1 = $sec1_img1_actual;
    }
    if(!empty($_FILES['sec1_img2']['name'])){
      unlink($sec1_img2_actual);
        $_FILES["sec1_img2"]["name"];
          move_uploaded_file($_FILES["sec1_img2"]["tmp_name"], $ruta_img.$_FILES["sec1_img2"]["name"]);
          $sec1_img2 = $ruta_img.basename($_FILES["sec1_img2"]["name"]);
    }else{
      $sec1_img2 = $sec1_img2_actual;
    }
    if(!empty($_FILES['sec1_img3']['name'])){
      unlink($sec1_img3_actual);
        $_FILES["sec1_img3"]["name"];
          move_uploaded_file($_FILES["sec1_img3"]["tmp_name"], $ruta_img.$_FILES["sec1_img3"]["name"]);
          $sec1_img3 = $ruta_img.basename($_FILES["sec1_img3"]["name"]);
    }else{
      $sec1_img3 = $sec1_img3_actual;
    }
    if(!empty($_FILES['sec1_img4']['name'])){
      unlink($sec1_img4_actual);
        $_FILES["sec1_img4"]["name"];
          move_uploaded_file($_FILES["sec1_img4"]["tmp_name"], $ruta_img.$_FILES["sec1_img4"]["name"]);
          $sec1_img4 = $ruta_img.basename($_FILES["sec1_img4"]["name"]);
    }else{
      $sec1_img4 = $sec1_img4_actual;
    }


    // SECCIÓN 1
    $sec1_titulo1 = $_POST['sec1_titulo1'];
    $sec1_cont1 = $_POST['sec1_cont1'];
    $sec1_titulo2 = $_POST['sec1_titulo2'];
    $sec1_cont2 = $_POST['sec1_cont2'];
    $sec1_titulo3 = $_POST['sec1_titulo3'];
    $sec1_cont3 = $_POST['sec1_cont3'];
    $sec1_titulo4 = $_POST['sec1_titulo4'];
    $sec1_cont4 = $_POST['sec1_cont4'];

    // SECCIÓN 2
    $sec2_titulo1 = $_POST['sec2_titulo1'];
    $sec2_sub1 = $_POST['sec2_sub1'];
    $sec2_cont1 = $_POST['sec2_cont1'];

    $sec2_img1_actual = $_POST['sec2_img1_actual'];

    if(!empty($_FILES['sec2_img1']['name'])){
      unlink($sec2_img1_actual);
        $_FILES["sec2_img1"]["name"];
          move_uploaded_file($_FILES["sec2_img1"]["tmp_name"], $ruta_img.$_FILES["sec2_img1"]["name"]);
          $sec2_img1 = $ruta_img.basename($_FILES["sec2_img1"]["name"]);
    }else{
      $sec2_img1 = $sec2_img1_actual;
    }

    // SECCIÓN 3
    $sec3_titulo1 = $_POST['sec3_titulo1'];
    $sec3_cont1 = $_POST['sec3_cont1'];
    $sec3_titulo2 = $_POST['sec3_titulo2'];
    $sec3_cont2 = $_POST['sec3_cont2'];

    // SECCIÓN 4
    $sec4_link1 = '';
    $sec4_titulo1 = $_POST['sec4_titulo1'];
    $sec4_sub1 = $_POST['sec4_sub1'];
    $sec4_cont1 = $_POST['sec4_cont1'];

    $sec4_img1_actual = $_POST['sec4_img1_actual'];

    if(!empty($_FILES['sec4_img1']['name'])){
      unlink($sec4_img1_actual);
        $_FILES["sec4_img1"]["name"];
          move_uploaded_file($_FILES["sec4_img1"]["tmp_name"], $ruta_img.$_FILES["sec4_img1"]["name"]);
          $sec4_img1 = $ruta_img.basename($_FILES["sec4_img1"]["name"]);
    }else{
      $sec4_img1 = $sec4_img1_actual;
    }

    $updateSQL = sprintf("UPDATE pagina1 SET sec1_img1 = %s, sec1_titulo1 = %s, sec1_cont1 = %s, sec1_img2 = %s, sec1_titulo2 = %s, sec1_cont2 = %s, sec1_img3 = %s, sec1_titulo3 = %s, sec1_cont3 = %s, sec1_img4 = %s, sec1_titulo4 = %s, sec1_cont4 = %s, sec2_titulo1 = %s, sec2_sub1 = %s, sec2_cont1 = %s, sec2_img1 = %s, sec3_titulo1 = %s, sec3_cont1 = %s, sec3_titulo2 = %s, sec3_cont2 = %s, sec4_img1 = %s, sec4_link1 = %s, sec4_titulo1 = %s, sec4_sub1 = %s, sec4_cont1 = %s WHERE idpagina1 = %s",
      GetSQLValueString($sec1_img1, "text"),
      GetSQLValueString($sec1_titulo1, "text"),
      GetSQLValueString($sec1_cont1, "text"),
      GetSQLValueString($sec1_img2, "text"),
      GetSQLValueString($sec1_titulo2, "text"),
      GetSQLValueString($sec1_cont2, "text"),
      GetSQLValueString($sec1_img3, "text"),
      GetSQLValueString($sec1_titulo3, "text"),
      GetSQLValueString($sec1_cont3, "text"),
      GetSQLValueString($sec1_img4, "text"),
      GetSQLValueString($sec1_titulo4, "text"),
      GetSQLValueString($sec1_cont4, "text"),
      GetSQLValueString($sec2_titulo1, "text"),
      GetSQLValueString($sec2_sub1, "text"),
      GetSQLValueString($sec2_cont1, "text"),
      GetSQLValueString($sec2_img1, "text"),
      GetSQLValueString($sec3_titulo1, "text"),
      GetSQLValueString($sec3_cont1, "text"),
      GetSQLValueString($sec3_titulo2, "text"),
      GetSQLValueString($sec3_cont2, "text"),
      GetSQLValueString($sec4_img1, "text"),
      GetSQLValueString($sec4_link1, "text"),
      GetSQLValueString($sec4_titulo1, "text"),
      GetSQLValueString($sec4_sub1, "text"),
      GetSQLValueString($sec4_cont1, "text"),
      GetSQLValueString($idpagina, "int"));

    $actualizar = $mysqli->query($updateSQL);

  }

  if(isset($_POST['eliminar_slide'])){
    $idslide = $_POST['eliminar_slide'];
    $img_slide = $_POST['img_slide_actual'.$idslide.''];
    unlink($img_slide);

    $query = "DELETE FROM slide WHERE idslide = $idslide";
    $eliminar = $mysqli->query($query);
  }

  $seccion = 'secciones';
  $menu = 'quienes';
  $sql = "SELECT * FROM pagina1 WHERE idpagina1 = $idpagina";
  $ejecutar = $mysqli->query($sql);
  $contenido = $ejecutar->fetch_assoc();
 ?>

<html lang="esp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sección: ¿Quienes Somos?</title>
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
          <section>
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="">
                          <header class="panel-heading">
                            Sección: <span style="color:red">¿Quiénes Somos?</span>
                          </header>
                          <div class="panel-body">

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div id="" style="position:fixed;z-index: 1;">
                                  <div class="">
                                    <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
                                  </div>
                                </div>
                                <!-- INICIA SECCIÓN SLIDER -->
                                <section id="home-slider">
                                    <div class="container">
                                        <div class="row">
                                    
                                            <div style="padding:0px;">
                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                    <!-- Indicators -->
                                                    <?php 
                                                    $query_slide = "SELECT * FROM slide WHERE pagina = $idpagina";
                                                    $consultar = $mysqli->query($query_slide);
                                                    $query_slide2 = "SELECT * FROM slide WHERE pagina = $idpagina ORDER BY idslide DESC";
                                                    $consultar2 = $mysqli->query($query_slide2);
                                                     ?>
                                                    <ol class="carousel-indicators">
                                                    <?php
                                                      $contador = 0;
                                                      while($slide = $consultar->fetch_assoc()){
                                                        echo '<li data-target="#carousel-example-generic" data-slide-to="'.$contador.'" class=""></li>';
                                                        $contador++;
                                                      }
                                                     ?>
                                                    </ol>

                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">
                                                        <?php
                                                        $contador = 0;
                                                        while($img_slide = $consultar2->fetch_assoc()){
                                                        ?>
                                                          <div class="item <?php if($contador == 0){echo 'active'; } ?>">
                                                            <img class="img-responsive" src="<?php echo $img_slide['img']; ?>"  alt="imagen1">
                                                            <div class="form-group last">
                                                              <div class="col-md-3">
                                                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                      <div class="fileupload-new thumbnail" style="width: 200px; height: 90px;">
                                                                          <img src="http://via.placeholder.com/1800x700" alt="" />
                                                                      </div>
                                                                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                      <div>
                                                                        <span class="btn btn-white btn-file">
                                                                          <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Reemplazar</span>
                                                                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                                          <input type="file" name="<?php echo 'img_slide'.$img_slide['idslide']; ?>" class="default" />
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                                  <input type="hidden" name="<?php echo 'img_slide_actual'.$img_slide['idslide']; ?>" value="<?php echo $img_slide['img']; ?>">
                                                                  <span class="label label-danger">NOTA</span>
                                                                  <span>
                                                                    La imagen debe tener un ancho y alto recomendado de 1800px X 700px
                                                                  </span>
                                                              </div>
                                                              <div class="col-md-3" style='margin-top:2em;'>
                                                                <button class="btn btn-danger" type="submit" class="" name="eliminar_slide" value="<?php echo $img_slide['idslide'] ?>" onclick="return confirm('¿Desea eliminar la imagen?');"><i class="fa fa-trash-o"></i> Eliminar Imagen</button>      
                                                              </div>
                                                            </div>
                                                          </div>
                                                        <?php
                                                        $contador++;
                                                        }
                                                         ?>
                                                        <div class="item">
                                                          <div class="form-group last" style="margin:10em;">
                                                              <div class="col-md-12 text-center">
                                                                  <h3 class="alert alert-info">Agregar nueva imagen</h3>
                                                                  <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-bottom:10em;">
                                                                      <div class="fileupload-new thumbnail" style="width: 500px; height: 240px;">
                                                                          <img src="http://via.placeholder.com/1800x700" alt="" />
                                                                      </div>
                                                                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 240px; line-height: 20px;"></div>
                                                                      <div>
                                                                        <span class="btn btn-white btn-file">
                                                                          <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Añadir</span>
                                                                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                                          <input type="file" name="nuevo_slide" class="default" />
                                                                        </span>
                                                                      </div>
                                                                  </div>
                                                                  <span class="label label-danger">NOTA</span>
                                                                  <span>
                                                                    La imagen debe tener un ancho y alto recomendado de 1800px X 700px
                                                                  </span>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>

                                                    <!-- Controls -->
                                                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                        <span class="sr-only">Anterior</span>
                                                    </a>
                                                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                        <span class="sr-only">Siguiente</span>
                                                    </a>
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                    
                                </section>
                                <!-- TERMINA SECCIÓN SLIDER -->
                                
                                <!-- INICIA SECCIÓN 1 (sec1)-->
                                <section id="services">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                                                <div class="single-service">
                                                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                                        <img src="<?php echo $contenido['sec1_img1']; ?>" alt="<?php echo $contenido['sec1_titulo1']; ?>">
                                                        <input type="hidden" name="sec1_img1_actual" value="<?php echo $contenido['sec1_img1']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls col-md-12">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                              <span class="btn btn-white btn-file">
                                                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                              <input type="file" name="sec1_img1" class="default" />
                                                              </span>
                                                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h2 style="color:#29327e"><input type="text" id="sec1_titulo1" name="sec1_titulo1" value="<?php echo $contenido['sec1_titulo1']; ?>"></h2>
                                                    <p>
                                                      <textarea name="sec1_cont1" id="sec1_cont1"><?php echo $contenido['sec1_cont1']; ?></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                                                <div class="single-service">
                                                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                                                        <img src="<?php echo $contenido['sec1_img2']; ?>" alt="<?php echo $contenido['sec1_titulo2']; ?>">
                                                        <input type="hidden" name="sec1_img2_actual" value="<?php echo $contenido['sec1_img2']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls col-md-12">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                              <span class="btn btn-white btn-file">
                                                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                              <input type="file" name="sec1_img2" class="default" />
                                                              </span>
                                                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h2 style="color:#35bddf"><input type="text" name="sec1_titulo2" value="<?php echo $contenido['sec1_titulo2']; ?>"></h2>
                                                    <p>
                                                      <textarea name="sec1_cont2" id="sec1_cont2"><?php echo $contenido['sec1_cont2']; ?></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                                                <div class="single-service">
                                                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                                                        <img src="<?php echo $contenido['sec1_img3']; ?>" alt="<?php echo $contenido['sec1_titulo3']; ?>">
                                                        <input type="hidden" name="sec1_img3_actual" value="<?php echo $contenido['sec1_img3']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls col-md-12">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                              <span class="btn btn-white btn-file">
                                                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                              <input type="file" name="sec1_img3" class="default" />
                                                              </span>
                                                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h2 style="color:#29327e"><input type="text" name="sec1_titulo3" value="<?php echo $contenido['sec1_titulo3']; ?>"></h2>
                                                    <p><textarea name="sec1_cont3" id="sec1_cont3"><?php echo $contenido['sec1_cont3']; ?></textarea></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms">
                                                <div class="single-service">
                                                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="1200ms">
                                                        <img src="<?php echo $contenido['sec1_img4']; ?>" alt="<?php echo $contenido['sec1_titulo4']; ?>">
                                                        <input type="hidden" name="sec1_img4_actual" value="<?php echo $contenido['sec1_img4']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls col-md-12">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                              <span class="btn btn-white btn-file">
                                                              <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                              <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                              <input type="file" name="sec1_img4" class="default" />
                                                              </span>
                                                                <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h2 style="color:#35bddf"><input type="text" name="sec1_titulo4" value="<?php echo $contenido['sec1_titulo4'] ?>"></h2>
                                                    <p><textarea name="sec1_cont4" id="sec1_cont4"><?php echo $contenido['sec1_cont4']; ?></textarea></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                                <!-- TERMINA SECCIÓN 1 (sec1)-->
                                
                                <!-- INICIA SECCIÓN 2 (sec2) -->
                                <section id="features">
                                   <div class="container" style="background-color:#323534;padding-top:1em;padding-bottom:1em">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <p class="" style="padding-left:1em;font-size:24px;"><i><b><input style="width:100%" type="text" name="sec2_titulo1" value="<?php echo $contenido['sec2_titulo1']; ?>"></b></i></p>

                                           </div>
                                       </div>
                                   </div>

                                    <div class="container">
                                        <div class="row">
                                          <div class="col-md-6 fadeInLeft text-center" style="margin-top:3em;">
                                              <h1 style="color:#323534;font-size:4em;margin-bottom:1em;"><b><input name="sec2_sub1" id="sec2_sub1" type="text" value="<?php echo $contenido['sec2_sub1']; ?>"></b></h1>
                                              <p style="font-size:16px;text-align:justify;">
                                                <textarea class="form-control" name="sec2_cont1" id="sec2_cont1" rows="20"><?php echo $contenido['sec2_cont1']; ?></textarea>
                                              </p>
                                          </div>
                                          <div class="col-md-6">
                                              <img class="img-responsive" src="<?php echo $contenido['sec2_img1']; ?>" alt="" style="float:right;margin-top:-100px;">
                                              <input type="hidden" name="sec2_img1_actual" value="<?php echo $contenido['sec2_img1']; ?>">
                                              <div class="form-group">
                                                  <div class="controls col-md-12">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                      <span class="btn btn-white btn-file">
                                                      <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                      <input type="file" name="sec2_img1" class="default" />
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
                                <!-- TERMINA SECCIÓN 2 (sec2) -->
                                
                                <!-- INICIA SECCIONES DINAMICAS -->
                                <!-- TERMINAN LAS SECCIONES DINAMICAS -->

                                <section style="margin-top:10em;">
                                    <div class="container" style="height:500px;background-image: url('../img/nuestros_valores/nuestros_valores.jpg');background-size:cover;background-position:center;padding-top:5em;">
                                        <div class="row">
                                        </div>
                                    </div>
                                      <div class="form-group last" style="">
                                          <div class="col-md-12 text-center">
                                              
                                              <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-bottom:10em;">
                                                  <div class="fileupload-new thumbnail" style="width: 500px; height: 240px;">
                                                      <img src="http://via.placeholder.com/1800x700" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 240px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Reemplazar</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                   <input type="file" name="" class="default" />
                                                   </span>
                                                  </div>
                                              </div>
                                              <!--<span class="label label-danger">NOTE!</span>
                                             <span>
                                             Attached image thumbnail is
                                             supported in Latest Firefox, Chrome, Opera,
                                             Safari and Internet Explorer 10 only
                                             </span>-->
                                          </div>
                                      </div>
                                </section>


                                <!-- INICIA SECCIÓN 3 (sec3) -->
                                <section id="mision-vision">
                                    <div class="container" >
                                        <div class="row">
                                          <div class="col-sm-12">
                                              <h1 class="title text-center"><input name="sec3_titulo1" id="sec3_titulo1" type="text" value="<?php echo $contenido['sec3_titulo1']; ?>"></h1>
                                              <p style="text-align:justify;font-size:16px;">
                                                <textarea class="form-control" name="sec3_cont1" id="sec3_cont1" rows="5"><?php echo $contenido['sec3_cont1']; ?></textarea>
                                              </p>
                                          </div>
                                          <div class="col-sm-12">
                                              <h1 class="title text-center"><input name="sec3_titulo2" id="sec3_titulo2" type="text" value="<?php echo $contenido['sec3_titulo2'] ?>"></h1>
                                              <p style="text-align:justify;font-size:16px;">
                                                <textarea class="form-control" name="sec3_cont2" id="sec3_cont2" rows="5"><?php echo $contenido['sec3_cont2']; ?></textarea>
                                              </p> 
                                          </div>
                                        </div>
                                    </div>
                                 </section>
                                <!-- TERMINA SECCIÓN 3 (sec3) -->

                                <!-- INICIA SECCIÓN 4 (sec4) -->
                                <section id="siguenos">
                                    <div class="container" style="background-image: url('../img/index/banner_azul.png');background-size:cover; padding-top:5em;border-top: 10px solid #263c89; border-bottom: 10px solid #263c89">
                                        <div class="row">
                                            <!-- visible en lg-md -->
                                            <div class="col-md-6">
                                                  <div class="form-group">
                                                      <div class="controls col-md-12">
                                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                            <input type="file" name="sec4_img1" class="default" />
                                                            </span>
                                                              <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                              <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                          </div>
                                                      </div>
                                                  </div>

                                                <a href="https://www.facebook.com/mas.kapital"><img src="<?php echo $contenido['sec4_img1']; ?>" alt=""></a>
                                                <input type="hidden" name="sec4_img1_actual" value="<?php echo $contenido['sec4_img1']; ?>">
                                            </div>
                                            <div class="col-md-6" style="text-align:justify;">
                                                <h1><b><input style="color:black" type="text" name="sec4_titulo1" value="<?php echo $contenido['sec4_titulo1']; ?>"></b></h1>
                                                <!--<a href="https://www.facebook.com/mas.kapital"><h1><b></b></h1></a>-->
                                                <h2 style="font-size:30px;"><b><input type="text" name="sec4_sub1" value="<?php echo $contenido['sec4_sub1'] ?>"></b></h2>
                                                <p style="font-size:20px;"><textarea class="form-control" name="sec4_cont1" id="sec4_cont1" rows="5"><?php echo $contenido['sec4_cont1']; ?></textarea></p>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </section>
                                <!-- TERMINA SECCIÓN 4 (sec4) -->

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
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>


  <!--summernote-->
  <script src="assets/summernote/dist/summernote.min.js"></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <!--this page  script only-->
    <script src="js/advanced-form-components.js"></script>

  <script>

      jQuery(document).ready(function(){

          $('.summernote').summernote({
              height: 200,                 // set editor height

              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor

              focus: true                 // set focus to editable area after initializing summernote
          });
      });

  </script>

  </body>
</html>
