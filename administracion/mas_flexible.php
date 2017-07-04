<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  include('funciones.php');

  $idpagina = 3; // 3 = MásFlexible

  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){


    //CONSULTAMOS EL NUMERO DE IMAGENES DENTRO DEL SLIDE PARA PODER REEMPLAZAR O MANTENER CAMBIOS
    $ruta_slide = '../img/slider/mas_flexible/';
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

      $query = "INSERT INTO slide (pagina, img) VALUES ('$idpagina', '$img_slide')";
      $insertar = $mysqli->query($query);

    }

    // SECCIÓN 1
    $ruta_img = '../img/mas_flexible/';
    $ruta_norma = 'img/mas_flexible/';
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

    $sec1_titulo1 = $_POST['sec1_titulo1'];
    $sec1_cont1 = $_POST['sec1_cont1'];
    $sec1_titulo2 = $_POST['sec1_titulo2'];
    $sec1_cont2 = $_POST['sec1_cont2'];
    $sec1_titulo3 = $_POST['sec1_titulo3'];
    $sec1_cont3 = $_POST['sec1_cont3'];
    $sec1_titulo4 = $_POST['sec1_titulo4'];
    $sec1_cont4 = $_POST['sec1_cont4'];
    $sec1_titulo5 = $_POST['sec1_titulo5'];
    $sec1_cont5 = $_POST['sec1_cont5'];

    // SECCIÓN 2
    $sec2_cont1 = $_POST['sec2_cont1'];
    $sec2_cont2 = $_POST['sec2_cont2'];
    $sec2_cont3 = $_POST['sec2_cont3'];
    $sec2_cont4 = $_POST['sec2_cont4'];
    $sec2_cont5 = $_POST['sec2_cont5'];
    $sec2_cont6 = $_POST['sec2_cont6'];

    // SECCIÓN 3
    $sec3_titulo1 = $_POST['sec3_titulo1'];
    $sec3_sub1 = $_POST['sec3_sub1'];
    $sec3_cont1 = $_POST['sec3_cont1'];

    
    $updateSQL = sprintf("UPDATE pagina3 SET sec1_img1 = %s, sec1_titulo1 = %s, sec1_cont1 = %s, sec1_img2 = %s, sec1_titulo2 = %s, sec1_cont2 = %s, sec1_img3 = %s, sec1_titulo3 = %s, sec1_cont3 = %s, sec1_img4 = %s, sec1_titulo4 = %s, sec1_cont4 = %s, sec1_titulo5 = %s, sec1_cont5 = %s, sec2_cont1 = %s, sec2_cont2 = %s, sec2_cont3 = %s, sec2_cont4 = %s, sec2_cont5 = %s, sec2_cont6 = %s, sec3_titulo1 = %s, sec3_sub1 = %s, sec3_cont1 = %s WHERE idpagina3 = %s",
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
      GetSQLValueString($sec1_titulo5, "text"),
      GetSQLValueString($sec1_cont5, "text"),
      GetSQLValueString($sec2_cont1, "text"),
      GetSQLValueString($sec2_cont2, "text"),
      GetSQLValueString($sec2_cont3, "text"),
      GetSQLValueString($sec2_cont4, "text"),
      GetSQLValueString($sec2_cont5, "text"),
      GetSQLValueString($sec2_cont6, "text"),
      GetSQLValueString($sec3_titulo1, "text"),
      GetSQLValueString($sec3_sub1, "text"),
      GetSQLValueString($sec3_cont1, "text"),
      GetSQLValueString($idpagina, "int"));

    $actualizar = $mysqli->query($updateSQL);

    $insertar = $mysqli->query($query);

    /// EN CASO DE QUE SE AGREGUE UNA SECCIÓN DINAMICA
    $tipo_seccion = $_POST['tipo_seccion'];
    $ruta_img = '../img/seccion_dinamica/';

    if(!empty($tipo_seccion)){
      $titulo_dinamico = '';
      $contenido_dinamico = '';
      $img_dinamica = '';
      $orden = '';

      if($tipo_seccion == 1){
        $titulo_dinamico = $_POST['titulo_dinamico1'];
        $contenido_dinamico = $_POST['contenido_dinamico1'];
        if(!empty($_FILES['img_dinamica1']['name'])){
              $_FILES["img_dinamica1"]["name"];
              move_uploaded_file($_FILES["img_dinamica1"]["tmp_name"], $ruta_img.$_FILES["img_dinamica1"]["name"]);
              $img_dinamica = $ruta_img.basename($_FILES["img_dinamica1"]["name"]);
        }
      }else if($tipo_seccion == 2){
        $titulo_dinamico = $_POST['titulo_dinamico2'];
        $contenido_dinamico = $_POST['contenido_dinamico2'];
      }else if($tipo_seccion == 3){
        if(!empty($_FILES['img_dinamica3']['name'])){
              $_FILES["img_dinamica3"]["name"];
              move_uploaded_file($_FILES["img_dinamica3"]["tmp_name"], $ruta_img.$_FILES["img_dinamica3"]["name"]);
              $img_dinamica = $ruta_img.basename($_FILES["img_dinamica3"]["name"]);
        }
      }

      $insertSQL = sprintf("INSERT INTO seccion_dinamica (idpagina, titulo, contenido, img, tipo_seccion, orden) VALUES (%s, %s, %s, %s, %s, %s)",
        GetSQLValueString($idpagina, "int"),
        GetSQLValueString($titulo_dinamico, "text"),
        GetSQLValueString($contenido_dinamico, "text"),
        GetSQLValueString($img_dinamica, "text"),
        GetSQLValueString($tipo_seccion, "int"),
        GetSQLValueString($orden, "int"));
      $insertar = $mysqli->query($insertSQL);
    }

  }

  if(isset($_POST['eliminar_slide'])){
    $idslide = $_POST['eliminar_slide'];
    $img_slide = $_POST['img_slide_actual'.$idslide.''];
    unlink($img_slide);

    $query = "DELETE FROM slide WHERE idslide = $idslide";
    $eliminar = $mysqli->query($query);
  }

  $seccion = 'secciones';
  $menu = 'flexible';
  $sql = "SELECT * FROM pagina3 WHERE idpagina3 = $idpagina";
  $ejecutar = $mysqli->query($sql);
  $contenido = $ejecutar->fetch_assoc();
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

    <title>Sección: MasFlexible</title>
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
                            Sección: <span style="color:red">MásFlexible</span>
                          </header>
                          <div class="panel-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div id="" style="position:fixed;z-index: 1;">
                                  <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
                                </div>
                                <!-- INICIA TITULO PRINCIPAL -->
                                <!--<section>
                                  <div class="col-md-12 text-center" style="background-color: #f0f0f6;padding-top:3em;margin-bottom:1em;">
                                      <h1 style="color: #2a3031;font-size:50px"><b>MÁSFLEXIBLE</b></h1>
                                      <h2 style="font-size:30px;"><i><input type="text" name="subtitulo" value="<?php echo $contenido['subtitulo']; ?>"></i></h2>
                                  </div>
                                </section>-->
                                <!-- TERMINA TITULO PRINCIPAL -->
                                
                                <!-- INICIA SECCIÓN SLIDER -->
                                <section id="">
                                  <div class="container">
                                      <div class="row">
                                          <div style="">
                                              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                  <!-- Indicators -->
                                                  <?php 
                                                  $query_slide = "SELECT * FROM slide WHERE pagina = $idpagina";
                                                  $consultar = $mysqli->query($query_slide);
                                                  $query_slide2 = "SELECT * FROM slide WHERE pagina = $idpagina ORDER BY idslide DESC";
                                                  $consultar2 = $mysqli->query($query_slide2);
                                                  $rows_slide = $consultar2->num_rows;
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
                                                          <!-- inicia moficar imagen -->
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
                                                          <!-- termina modificar imagen -->
                                                        </div>
                                                      <?php
                                                      $contador++;
                                                      }
                                                       ?>
                                                      <!-- inicia agregar nueva imagen -->
                                                      <div class="item <?php if($rows_slide == 0){echo 'active'; } ?>">
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
                                                      <!-- termina agregar nueva imagen -->
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

                                <!-- INICIA SECCIÓN 1 (sec1) -->
                                <section id="services">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
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
                                <!--/#services-->

                                <section id="features">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="text-center" style="color: #2a3031;margin-bottom:1em;"><input type="text" name="sec1_titulo5" value="<?php echo $contenido['sec1_titulo5']; ?>"></h1>
                                                <textarea class="wysihtml5 form-control" name="sec1_cont5" rows="10"><?php echo $contenido['sec1_cont5']; ?></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- TERMINA SECCIÓN 1 (sec1) -->

                                <!-- INCIA SECCIÓN 2 (sec2) -->
                                <section id="beneficios_masflexible" style="margin-top:4em;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="divs col-md-2">
                                                <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                                                <p>
                                                  <textarea class="form-control" name="sec2_cont1" id="" cols="30" rows="10"><?php echo $contenido['sec2_cont1']; ?></textarea>  
                                                </p>
                                            </div>
                                            <div class="divs col-md-2" >
                                                <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                                                <p>
                                                  <textarea class="form-control" name="sec2_cont2" id="" cols="30" rows="10"><?php echo $contenido['sec2_cont2']; ?></textarea>  
                                                </p>
                                            </div>
                                            <div class="divs col-md-2" >
                                                <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                                                <p>
                                                  <textarea class="form-control" name="sec2_cont3" id="" cols="30" rows="10"><?php echo $contenido['sec2_cont3']; ?></textarea>   
                                                </p>
                                            </div>
                                            <div class="divs col-md-2" >
                                                <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                                                <p>
                                                  <textarea class="form-control" name="sec2_cont4" id="" cols="30" rows="10"><?php echo $contenido['sec2_cont4'] ?></textarea>
                                                </p>
                                            </div>
                                            <div class="divs col-md-2" >
                                                <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                                                <p>
                                                  <textarea class="form-control" name="sec2_cont5" id="" cols="30" rows="10"><?php echo $contenido['sec2_cont5']; ?></textarea>   
                                                </p>
                                            </div>
                                            <div class="divs col-md-2" >
                                                <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                                                <p>
                                                  <textarea class="form-control" name="sec2_cont6" id="" cols="30" rows="10"><?php echo $contenido['sec2_cont6']; ?></textarea>    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- TERMINA SECCIÓN 2 (sec2) -->

                                <!-- INICIA SECCIÓN 3 (sec3) -->
                                <section id="caracteristicas" style="margin-top:4em;">
                                    <div class="container">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <h1 class="text-center" style="font-size:40px;color: #2a3031;margin-bottom:1em;"><input type="text" name="sec3_titulo1" value="<?php echo $contenido['sec3_titulo1']; ?>"></h1>
                                            <h2 class="text-center"><input type="text" name="sec3_sub1" value="<?php echo $contenido['sec3_sub1']; ?>"></h2>
                                          </div>
                                          <div class="col-md-8 col-md-offset-2">
                                            <p class="text-center">
                                                <textarea class="form-control" name="sec3_cont1" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont1']; ?></textarea>
                                            </p>
                                          </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- TERMINA SECCIÓN 3 (sec3) -->


                                <!-- INICIA SECCIONES DINAMICAS -->
                                <section>
                                  <h3 style="background: #e74c3c;color:#ecf0f1;">Sección Dinamica</h3>
                                  <select class="form-control" name="tipo_seccion" id="tipo_seccion" onchange="seccion()">
                                    <option value="">Selecciona un tipo de sección</option>
                                    <option value="1">Tipo 1</option>
                                    <option value="2">Tipo 2</option>
                                    <option value="3">Tipo 3</option>
                                  </select>

                                  <div id="tipo_1" class="col-md-12 well" style="display: none">
                                    <div class="row">
                                      <h4>Tipo 1</h4>
                                      <div class="form-group">
                                        <div class="col-md-12">
                                          <label for="exampleInputEmail1">Titulo</label>
                                          <input type="text" class="form-control" name="titulo_dinamico1" id="titulo_dinamico1" placeholder="Titulo">
                                        </div>
                                        <div class="col-md-6">
                                          <label for="exampleInputEmail1">Contenido</label>
                                          <textarea class="form-control" name="contenido_dinamico1" id="contenido_dinamico1" rows="6" placeholder="Contenido"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="exampleInputEmail1">Imagen</label>
                                          <input type="file" class="form-control" name="img_dinamica1" id="img_dinamica1" placeholder="Email">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="tipo_2" class="col-md-12 well" style="display: none">
                                    <div class="row">
                                      <h4>Tipo 2</h4>
                                      <div class="form-group">
                                        <div class="col-md-12">
                                          <label for="exampleInputEmail1">Titulo</label>
                                          <input type="text" class="form-control" name="titulo_dinamico2" id="titulo_dinamico2" placeholder="Titulo">
                                        </div>
                                        <div class="col-md-12">
                                          <label for="exampleInputEmail1">Contenido</label>
                                          <textarea class="form-control" name="contenido_dinamico2" id="contenido_dinamico2" rows="6" placeholder="Contenido"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="tipo_3" class="col-md-12 well" style="display: none">
                                    <div class="row">
                                      <h4>Tipo 3</h4>
                                        <div class="col-md-12 text-center">
                                            
                                            <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-bottom:10em;">
                                                <div class="fileupload-new thumbnail" style="width: 500px; height: 240px;">
                                                    <img src="http://via.placeholder.com/1800x700" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 240px; line-height: 20px;"></div>
                                                <div>
                                                  <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Añadir</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                    <input type="file" name="img_dinamica3" class="default" />
                                                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </section>

                                <?php 
                                $query = "SELECT * FROM seccion_dinamica WHERE idpagina = $idpagina";
                                $consultar = $mysqli->query($query);
                                $num_filas = $consultar->num_rows;

                                if($num_filas>0){
                                  while($contenido_dinamico = $consultar->fetch_assoc()){
                                    if($contenido_dinamico['tipo_seccion'] == 1){
                                    ?>
                                      <section class="well" style="margin-top:10em;">
                                          <div class="container">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h1 class="title text-center"><?php echo $contenido_dinamico['titulo']; ?></h1>
                                                </div>
                                                <div class="col-md-6">
                                                  <p style="text-align:justify;font-size:16px;">
                                                    <?php echo nl2br($contenido_dinamico['contenido']); ?>  
                                                  </p>
                                                </div>
                                                <div class="col-md-6">
                                                  <img class="img-responsive" src="<?php echo $contenido_dinamico['img']; ?>" alt="">
                                                </div>
                                              </div>
                                          </div>
                                      </section>
                                    <?php
                                    }else if($contenido_dinamico['tipo_seccion'] == 2){
                                    ?>
                                      <section class="well" style="margin-top:10em;">
                                          <div class="container">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <h1 class="title text-center"><?php echo $contenido_dinamico['titulo']; ?></h1>
                                                </div>
                                                <div class="col-md-12">
                                                  <p style="text-align:justify;font-size:16px;">
                                                    <?php echo nl2br($contenido_dinamico['contenido']); ?>  
                                                  </p>
                                                </div>
                                              </div>
                                          </div>
                                      </section>
                                    <?php
                                    }else if($contenido_dinamico['tipo_seccion'] == 3){
                                    ?>
                                      <section class="well" style="margin-top:10em;">
                                          <div class="container">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <img class="img-responsive" src="<?php echo $contenido_dinamico['img']; ?>" alt="">
                                                </div>
                                              </div>
                                          </div>
                                      </section>
                                    <?php
                                    }
                                  }
                                }
                                ?>
                                <!-- TERMINAN LAS SECCIONES DINAMICAS -->
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
    function seccion(){
      tipo = document.getElementById("tipo_seccion").value;
      if(tipo == 1){
        document.getElementById("tipo_1").style.display = "block";
        document.getElementById("tipo_2").style.display = "none";
        document.getElementById("tipo_3").style.display = "none";
      }else if(tipo == 2){
        document.getElementById("tipo_1").style.display = "none";
        document.getElementById("tipo_2").style.display = "block";
        document.getElementById("tipo_3").style.display = "none";
      }else if(tipo == 3){
        document.getElementById("tipo_1").style.display =  "none";
        document.getElementById("tipo_2").style.display = "none";
        document.getElementById("tipo_3").style.display = "block";
      }
      
    }
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
