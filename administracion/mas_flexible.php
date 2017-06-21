<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  $pagina = 3;
  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
    /*$sec1_img1 = "../img/index/".$_POST['sec1_img1'];
    $sec1_img2 = "../img/index/".$_POST['sec1_img2'];
    $sec1_img3 = "../img/index/".$_POST['sec1_img3'];
    $sec1_img4 = "../img/index/".$_POST['sec1_img4'];*/

    //CONSULTAMOS EL NUMERO DE IMAGENES DENTRO DEL SLIDE PARA PODER REEMPLAZAR O MANTENER CAMBIOS
    $ruta_slide = '../img/slider/mas_flexible/';
    $query = "SELECT * FROM slide WHERE pagina = $pagina";
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

      $query = "INSERT INTO slide (pagina, img) VALUES ('$pagina', '$img_slide')";
      $insertar = $mysqli->query($query);

    }

    $ruta_img = '../img/mas_flexible/';
    $ruta_norma = 'img/mas_flexible/';
    $img1_actual = $_POST['img1_actual'];
    $img2_actual = $_POST['img2_actual'];
    $img3_actual = $_POST['img3_actual'];
    $img4_actual = $_POST['img4_actual'];

    if(!empty($_FILES['sec1_img1']['name'])){
        unlink($img1_actual);
        $_FILES["sec1_img1"]["name"];
          move_uploaded_file($_FILES["sec1_img1"]["tmp_name"], $ruta_img.$_FILES["sec1_img1"]["name"]);
          $sec1_img1 = $ruta_img.basename($_FILES["sec1_img1"]["name"]);
          //$archivo = $rutaArchivo.basename($fecha."_".$_FILES["nueva_cotizacion"]["name"]);
    }else{
      $sec1_img1 = $img1_actual;
    }
    if(!empty($_FILES['sec1_img2']['name'])){
      unlink($img2_actual);
        $_FILES["sec1_img2"]["name"];
          move_uploaded_file($_FILES["sec1_img2"]["tmp_name"], $ruta_img.$_FILES["sec1_img2"]["name"]);
          $sec1_img2 = $ruta_img.basename($_FILES["sec1_img2"]["name"]);
    }else{
      $sec1_img2 = $img2_actual;
    }
    if(!empty($_FILES['sec1_img3']['name'])){
      unlink($img3_actual);
        $_FILES["sec1_img3"]["name"];
          move_uploaded_file($_FILES["sec1_img3"]["tmp_name"], $ruta_img.$_FILES["sec1_img3"]["name"]);
          $sec1_img3 = $ruta_img.basename($_FILES["sec1_img3"]["name"]);
    }else{
      $sec1_img3 = $img3_actual;
    }
    if(!empty($_FILES['sec1_img4']['name'])){
      unlink($img4_actual);
        $_FILES["sec1_img4"]["name"];
          move_uploaded_file($_FILES["sec1_img4"]["tmp_name"], $ruta_img.$_FILES["sec1_img4"]["name"]);
          $sec1_img4 = $ruta_img.basename($_FILES["sec1_img4"]["name"]);
    }else{
      $sec1_img4 = $img4_actual;
    }



    /*$sec1_img1 = 1;
    $sec1_img2 = 2;
    $sec1_img3 = 3;
    $sec1_img4 = 4;
*/

    $sec1_titulo1 = $_POST['sec1_titulo1'];
    $sec1_cont1 = $_POST['sec1_cont1'];
    $sec1_titulo2 = $_POST['sec1_titulo2'];
    $sec1_cont2 = $_POST['sec1_cont2'];
    $sec1_titulo3 = $_POST['sec1_titulo3'];
    $sec1_cont3 = $_POST['sec1_cont3'];
    $sec1_titulo4 = $_POST['sec1_titulo4'];
    $sec1_cont4 = $_POST['sec1_cont4'];

    $sec2_titulo1 = $_POST['sec2_titulo1'];
    $sec2_cont1 = $_POST['sec2_cont1'];

    $sec3_cont1 = $_POST['sec3_cont1'];
    $sec3_cont2 = $_POST['sec3_cont2'];
    $sec3_cont3 = $_POST['sec3_cont3'];
    $sec3_cont4 = $_POST['sec3_cont4'];
    $sec3_cont5 = $_POST['sec3_cont5'];
    $sec3_cont6 = $_POST['sec3_cont6'];

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


    $sec4_img2_actual = $_POST['sec4_img2_actual'];
    if(!empty($_FILES['sec4_img2']['name'])){
      unlink($sec4_img2_actual);
        $_FILES["sec4_img2"]["name"];
          move_uploaded_file($_FILES["sec4_img2"]["tmp_name"], $ruta_img.$_FILES["sec4_img2"]["name"]);
          $sec4_img2 = $ruta_img.basename($_FILES["sec4_img2"]["name"]);
    }else{
      $sec4_img2 = $sec4_img2_actual;
    }


    $sec4_titulo2 = $_POST['sec4_titulo2'];
    $sec4_sub2 = $_POST['sec4_sub2'];
    $sec4_sub3 = $_POST['sec4_sub3'];
    $sec4_sub4 = $_POST['sec4_sub4'];
    $sec4_sub5 = $_POST['sec4_sub5'];

    $sec4_img3_actual = $_POST['sec4_img3_actual'];
    if(!empty($_FILES['sec4_img3']['name'])){
      unlink($sec4_img3_actual);
        $_FILES["sec4_img3"]["name"];
          move_uploaded_file($_FILES["sec4_img3"]["tmp_name"], $ruta_img.$_FILES["sec4_img3"]["name"]);
          $sec4_img3 = $ruta_img.basename($_FILES["sec4_img3"]["name"]);
    }else{
      $sec4_img3 = $sec4_img3_actual;
    }


    $sec5_titulo1 = $_POST['sec5_titulo1'];

    $sec5_img1_actual = $_POST['sec5_img1_actual'];
    if(!empty($_FILES['sec5_img1']['name'])){
      unlink($sec5_img1_actual);
        $_FILES["sec5_img1"]["name"];
          move_uploaded_file($_FILES["sec5_img1"]["tmp_name"], $ruta_img.$_FILES["sec5_img1"]["name"]);
          $sec5_img1 = $ruta_img.basename($_FILES["sec5_img1"]["name"]);
    }else{
      $sec5_img1 = $sec5_img1_actual;
    }

    $sec5_img2_actual = $_POST['sec5_img2_actual'];
    if(!empty($_FILES['sec5_img2']['name'])){
      unlink($sec5_img2_actual);
        $_FILES["sec5_img2"]["name"];
          move_uploaded_file($_FILES["sec5_img2"]["tmp_name"], $ruta_img.$_FILES["sec5_img2"]["name"]);
          $sec5_img2 = $ruta_img.basename($_FILES["sec5_img2"]["name"]);
    }else{
      $sec5_img2 = $sec5_img2_actual;
    }

    $sec5_img3_actual = $_POST['sec5_img3_actual'];
    if(!empty($_FILES['sec5_img3']['name'])){
      unlink($sec5_img3_actual);
        $_FILES["sec5_img3"]["name"];
          move_uploaded_file($_FILES["sec5_img3"]["tmp_name"], $ruta_img.$_FILES["sec5_img3"]["name"]);
          $sec5_img3 = $ruta_img.basename($_FILES["sec5_img3"]["name"]);
    }else{
      $sec5_img3 = $sec5_img3_actual;
    }

    $sec5_sub1 = $_POST['sec5_sub1'];
    $sec5_sub2 = $_POST['sec5_sub2'];
    $sec5_cont1 = $_POST['sec5_cont1'];
    $sec5_titulo2 = $_POST['sec5_titulo2'];
    $sec5_cont2 = $_POST['sec5_cont2'];

    /*$sec4_img1 = $_POST['sec4_img1'];*/
    $query = "UPDATE pagina3 SET sec1_img1 = '$sec1_img1',sec1_titulo1 = '$sec1_titulo1',sec1_cont1 = '$sec1_cont1',sec1_img2 = '$sec1_img2',sec1_titulo2 = '$sec1_titulo2',sec1_cont2 = '$sec1_cont2',sec1_img3 = '$sec1_img3',sec1_titulo3 = '$sec1_titulo3',sec1_cont3 = '$sec1_cont3',sec1_img4 = '$sec1_img4',sec1_titulo4 = '$sec1_titulo4',sec1_cont4 = '$sec1_cont4',sec2_titulo1 = '$sec2_titulo1',sec2_cont1 = '$sec2_cont1',sec3_cont1 = '$sec3_cont1',sec3_cont2 = '$sec3_cont2',sec3_cont3 = '$sec3_cont3',sec3_cont4 = '$sec3_cont4',sec3_cont5 = '$sec3_cont5',sec3_cont6 = '$sec3_cont6',sec4_titulo1 = '$sec4_titulo1',sec4_sub1 = '$sec4_sub1',sec4_cont1 = '$sec4_cont1',sec4_img1 = '$sec4_img1',sec4_img2 = '$sec4_img2',sec4_titulo2 = '$sec4_titulo2',sec4_sub2 = '$sec4_sub2',sec4_sub3 = '$sec4_sub3',sec4_sub4 = '$sec4_sub4',sec4_sub5 = '$sec4_sub5',sec4_img3 = '$sec4_img3',sec5_titulo1 = '$sec5_titulo1',sec5_img1 = '$sec5_img1',sec5_img2 = '$sec5_img2',sec5_img3 = '$sec5_img3',sec5_sub1 = '$sec5_sub1',sec5_sub2 = '$sec5_sub2',sec5_cont1 = '$sec5_cont1',sec5_titulo2 = '$sec5_titulo2',sec5_cont2 = '$sec5_cont2' WHERE idpagina3 = $pagina";

    //$query = "UPDATE pagina5  SET sec1_img1 = '$sec1_img1', sec1_img2 = '$sec1_img2', sec1_img3 = '$sec1_img3', sec1_img4 = '$sec1_img4', sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec1_cont4 = '$sec1_cont4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3', sec3_titulo1 = '$sec3_titulo1', sec3_cont1 = '$sec3_cont1', sec3_titulo2 = '$sec3_titulo2', sec3_cont2 = '$sec3_cont2', sec4_titulo1 = '$sec4_titulo1', sec4_sub1 = '$sec4_sub1', sec4_cont1 = '$sec4_cont1' WHERE idpagina5 = $pagina";

    //$query = "UPDATE pagina5  SET sec1_img1 = '$sec1_img1', sec1_img2 = '$sec1_img2', sec1_img3 = '$sec1_img3', sec1_img4 = '$sec1_img4', sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec1_cont4 = '$sec1_cont4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3' WHERE idpagina5 = 1";

    //$query = "UPDATE pagina5 SET sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3', sec3_titulo1 = '$sec3_titulo1', sec3_cont1 = '$sec3_cont1', sec3_titulo2 = '$sec3_titulo2', sec3_cont2 = '$sec3_cont2', sec4_titulo1 = '$sec4_titulo1', sec4_sub1 = '$sec4_sub1', sec4_cont1 = '$sec4_cont1', sec4_img1 = '$sec4_img1' WHERE idpagina5 = 1 ";
    $insertar = $mysqli->query($query);
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
  $sql = "SELECT * FROM pagina3 WHERE idpagina3 = $pagina";
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
                            Sección: <span style="color:red">¿Quiénes Somos?</span>
                          </header>
                          <div class="panel-body">
<form action="" method="POST" enctype="multipart/form-data">
    <div id="" style="position:fixed;z-index: 1;">
      <div class="">
        <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
      </div>
    </div>

    <section id="home-slider" >
        <div class="container">
            <div class="row">
                <div style="padding:0px;">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <?php 
                        $query_slide = "SELECT * FROM slide WHERE pagina = $pagina";
                        $consultar = $mysqli->query($query_slide);
                        $query_slide2 = "SELECT * FROM slide WHERE pagina = $pagina ORDER BY idslide DESC";
                        $consultar2 = $mysqli->query($query_slide2);
                        $rows_slide = $consultar2->num_rows;
                         ?>
                        <ol class="carousel-indicators">
                        <?php
                          $cont = 0;
                          while($slide = $consultar->fetch_assoc()){
                            echo '<li data-target="#carousel-example-generic" data-slide-to="'.$cont.'" class=""></li>';
                            $cont++;
                          }
                         ?>
                            <!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>-->
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            $cont = 0;
                            while($img_slide = $consultar2->fetch_assoc()){
                            ?>
                              <div class="item <?php if($cont == 0){echo 'active'; } ?>">
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
                                                <!--<span class="label label-danger">NOTE!</span>
                                               <span>
                                               Attached image thumbnail is
                                               supported in Latest Firefox, Chrome, Opera,
                                               Safari and Internet Explorer 10 only
                                               </span>-->
                                            </div>
                                            <div class="col-md-3" style='margin-top:2em;'>
                                              <button class="btn btn-danger" type="submit" class="" name="eliminar_slide" value="<?php echo $img_slide['idslide'] ?>" onclick="return confirm('¿Desea eliminar la imagen?');"><i class="fa fa-trash-o"></i> Eliminar Imagen</button>
                                              
                                            </div>

                                        </div>
                              </div>

                            <?php
                            $cont++;
                            }
                             ?>
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
                                                <!--<span class="label label-danger">NOTE!</span>
                                               <span>
                                               Attached image thumbnail is
                                               supported in Latest Firefox, Chrome, Opera,
                                               Safari and Internet Explorer 10 only
                                               </span>-->
                                            </div>


                                        </div>
                            </div>
                            <!--<div class="item">
                                <img class="img-responsive" src="../img/slider/principal/principal_2.jpg" alt="imagen2">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="../img/slider/principal/principal_3.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="../img/slider/principal/principal_4.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="../img/slider/principal/principal_5.jpg" alt="imagen3">
                            </div>-->
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>                  
                </div>
            </div>
        </div>

    </section>
    <!--/#home-slider-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="<?php echo $contenido['sec1_img1']; ?>" alt="oportuno">
                            <input type="hidden" name="img1_actual" value="<?php echo $contenido['sec1_img1']; ?>">
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
                            <img src="<?php echo $contenido['sec1_img2']; ?>" alt="accesible">
                            <input type="hidden" name="img2_actual" value="<?php echo $contenido['sec1_img2']; ?>">
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
                            <img src="<?php echo $contenido['sec1_img3']; ?>" alt="rentable">
                            <input type="hidden" name="img3_actual" value="<?php echo $contenido['sec1_img3']; ?>">
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
                            <img src="<?php echo $contenido['sec1_img4']; ?>" alt="seguro">
                            <input type="hidden" name="img4_actual" value="<?php echo $contenido['sec1_img4']; ?>">
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

    <!-- QUIENES SOMOS -->
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="color: #2a3031;margin-bottom:1em;"><input type="text" name="sec2_titulo1" value="<?php echo $contenido['sec2_titulo1']; ?>"></h1>
                    <textarea class="wysihtml5 form-control" name="sec2_cont1" rows="10"><?php echo $contenido['sec2_cont1']; ?></textarea>

                </div>
            </div>
        </div>
    </section>
     <!--/#features-->
    <section id="beneficios_masflexible" style="margin-top:4em;">
        <div class="container">
            <div class="row">
                <div class="divs col-md-2">
                    <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                      <textarea class="form-control" name="sec3_cont1" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont1']; ?></textarea>  
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                      <textarea class="form-control" name="sec3_cont2" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont2']; ?></textarea>  
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                      <textarea class="form-control" name="sec3_cont3" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont3']; ?></textarea>   
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                      <textarea class="form-control" name="sec3_cont4" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont4'] ?></textarea>
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                      <textarea class="form-control" name="sec3_cont5" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont5']; ?></textarea>   
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="../img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                      <textarea class="form-control" name="sec3_cont6" id="" cols="30" rows="10"><?php echo $contenido['sec3_cont6']; ?></textarea>    
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="caracteristicas" style="margin-top:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1 class="text-center" style="font-size:40px;color: #2a3031;margin-bottom:1em;"><input type="text" name="sec4_titulo1" value="<?php echo $contenido['sec4_titulo1']; ?>"></h1>
                    <h2 class="text-center"><input type="text" name="sec4_sub1" value="<?php echo $contenido['sec4_sub1']; ?>"></h2>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center">
                        <textarea class="form-control" name="sec4_cont1" id="" cols="30" rows="10"><?php echo $contenido['sec4_cont1']; ?></textarea>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms" >
                    <img class="img-responsive" src="<?php echo $contenido['sec4_img1']; ?>" alt="">

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
                                                     <input type="file" name="sec4_img1" class="default" />
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
                                            <input type="hidden" name="sec4_img1_actual" value="<?php echo $contenido['sec4_img1']; ?>">


                                        </div>

                </div>              
            </div>
        </div>
     </section>
    <!--/#clients-->
    <section id="requisitos" style="margin-bottom:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding:0">
                    <img class="img-responsive" style="width:100%;"src="<?php echo $contenido['sec4_img2'] ?>" alt="">
                                        <div class="form-group last" >
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
                                                     <input type="file" name="sec4_img2" class="default" />
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
                                            <input type="hidden" name="sec4_img2_actual" value="<?php echo $contenido['sec4_img2']; ?>">


                                        </div>

                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container" style="background-image: url('../img/index/banner_azul.png');background-size:cover; padding-top:2em;border-top: 10px solid #fac099; border-bottom: 10px solid #fac099">
            <div class="col-md-12 text-center">
                <h1 style=""><input type="text" name="sec4_titulo2" value="<?php echo $contenido['sec4_titulo2']; ?>"></h1>
            </div>
            
            <!-- visible lg-md -->
            <div class="col-md-7">
                <img style="margin-top:6em;" src="../img/mas_flexible/compromisos.png" alt="">
            </div>
            <div class="col-md-5" style="text-align:justify;">
                <ul>
                    <li><h3 style="font-size:30px;"><input type="text" name="sec4_sub2" value="<?php echo $contenido['sec4_sub2']; ?>"></h3></li>
                    <li><h3 style="font-size:30px;"><input type="text" name="sec4_sub3" value="<?php echo $contenido['sec4_sub3']; ?>"></h3></li>
                    <li><h3 style="font-size:30px;"><input type="text" name="sec4_sub4" value="<?php echo $contenido['sec4_sub4']; ?>"></h3></li>
                    <li><h3 style="font-size:30px;"><input type="text" name="sec4_sub5" value="<?php echo $contenido['sec4_sub5']; ?>"></h3></li>
                </ul>
            </div>


        </div>
    </section>


    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-responsive" src="<?php echo $contenido['sec4_img3'];  ?>" alt="">
                                        <div class="form-group last" >
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
                                                     <input type="file" name="sec4_img3" class="default" />
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
                                            <input type="hidden" name="sec4_img3_actual" value="<?php echo $contenido['sec4_img3']; ?>">


                                        </div>

                </div>
            </div>
        </div>
    </section>
    
    <section id="donde-pagar" style="margin-top:5em;margin-bottom:6em;">
        <div class="container" style="border-bottom: 10px solid #263c89">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="font-size:40px;color:#2a3031"><input type="text" name="sec5_titulo1" value="<?php echo $contenido['sec4_titulo2']; ?>"></h1>
                </div>

                <!-- VISIBLE LG-MD -->
                <div class="col-md-3">
                    <img src="../img/mas_flexible/donde_pagar.png" alt="">

                </div>

                <div class="col-md-9 text-center" style="margin-top:4em;">
                    <div class="col-sm-4">
                        <img class="img-responsive" src="<?php echo $contenido['sec5_img1']; ?>" alt="">
                            <div class="controls col-md-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <span class="btn btn-white btn-file">
                                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                  <input type="file" name="sec5_img1" class="default" />
                                  </span>
                                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                </div>
                            </div>
                            <input type="hidden" name="sec5_img1_actual" value="<?php echo $contenido['sec5_img1']; ?>">
                    </div>
                    <div class="col-sm-4">
                        <img class="img-responsive" src="<?php echo $contenido['sec5_img2']; ?>" alt="">
                            <div class="controls col-md-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <span class="btn btn-white btn-file">
                                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                  <input type="file" name="sec5_img2" class="default" />
                                  </span>
                                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                </div>
                            </div>
                            <input type="hidden" name="sec5_img2_actual" value="<?php echo $contenido['sec5_img2']; ?>">
                    </div>
                    <div class="col-sm-4">
                        <img class="img-responsive" src="<?php echo $contenido['sec5_img3']; ?>" alt="">
                            <div class="controls col-md-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <span class="btn btn-white btn-file">
                                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                  <input type="file" name="sec5_img3" class="default" />
                                  </span>
                                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                </div>
                            </div>
                            <input type="hidden" name="sec5_img3_actual" value="<?php echo $contenido['sec5_img3']; ?>">
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <h3 class="text-center"><input type="text" name="sec5_sub1" value="<?php echo $contenido['sec5_sub1']; ?>"></h3>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h3 class="text-center"><input type="text" name="sec5_sub2" value="<?php echo $contenido['sec5_sub2']; ?>"></h3>
                    </div>
                    <div class="col-sm-9 col-xs-12 col-sm-offset-3">
                        <h2 class="text-left" style="color:#f26e23;margin-bottom:1em;">
                          <textarea class="form-control" name="sec5_cont1" id="" rows="3"><?php echo $contenido['sec5_cont1']; ?></textarea>
                        </h2>
                        <h4 class="text-left" style="color:#858789"><input class="form-control" type="text" name="sec5_titulo2" value="<?php echo $contenido['sec5_titulo2']; ?>"></h4>
                        <textarea class="form-control" name="sec5_cont2" id="" rows="3"><?php echo $contenido['sec5_cont2']; ?></textarea>
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
