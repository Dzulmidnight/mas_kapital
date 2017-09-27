<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  require('funciones.php');

  $idpagina = 2; //NUMERO DE LA PAGINA DE NORMATIVIDAD
  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
    //CONSULTAMOS EL NUMERO DE IMAGENES DENTRO DEL SLIDE PARA PODER REEMPLAZAR O MANTENER CAMBIOS
    $ruta_slide = '../img//normatividad/';
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
      $insertSQL = "INSERT INTO seccion_dinamica (idpagina, titulo, contenido, img, tipo_seccion) VALUES ('$idpagina', '$titulo_dinamico', '$contenido_dinamico', '$img_dinamica', '$tipo_seccion')";

      /*$insertSQL = sprintf("INSERT INTO seccion_dinamica (idpagina, titulo, contenido, img, tipo_seccion, orden) VALUES (%s, %s, %s, %s, %s, %s)",
        GetSQLValueString($idpagina, "int"),
        GetSQLValueString($titulo_dinamico, "text"),
        GetSQLValueString($contenido_dinamico, "text"),
        GetSQLValueString($img_dinamica, "text"),
        GetSQLValueString($tipo_seccion, "int"),
        GetSQLValueString($orden, "int"));*/
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
  if(isset($_POST['eliminar_contenido'])){
    $idcontenido = $_POST['eliminar_contenido'];
    $query = "DELETE FROM contenido WHERE idcontenido = $idcontenido";
    $eliminar = $mysqli->query($query);
  }
  // MODIFICAMOS EL CONTENIDO DE LAS SECCIONES DINAMICAS
  if(isset($_POST['modificar_seccion']) && $_POST['modificar_seccion'] != 0){
    $idseccion_dinamica = $_POST['modificar_seccion'];
    $ruta_img = '../img/seccion_dinamica/';
    $titulo = '';
    $contenido = '';
    $img = '';
    if(!empty($_POST['img_existente'.$idseccion_dinamica])){
      $img_existente = $_POST['img_existente'.$idseccion_dinamica];
    }else{
      $img_existente = '';
    }

    if(isset($_POST['titulo_edit'.$idseccion_dinamica])){
      $titulo = $_POST['titulo_edit'.$idseccion_dinamica];
    }else{
      $titulo = '';
    }
    if(isset($_POST['contenido_edit'.$idseccion_dinamica])){
      $contenido = $_POST['contenido_edit'.$idseccion_dinamica];
    }else{
      $contenido = '';
    }
    if(!empty($_FILES['img_edit'.$idseccion_dinamica]['name'])){
        if(file_exists($img_existente)){
          unlink($img_existente);
        }
        $_FILES["img_edit".$idseccion_dinamica]["name"];
          move_uploaded_file($_FILES["img_edit".$idseccion_dinamica]["tmp_name"], $ruta_img.$_FILES["img_edit".$idseccion_dinamica]["name"]);
          $img = $ruta_img.basename($_FILES["img_edit".$idseccion_dinamica]["name"]);
          //$archivo = $rutaArchivo.basename($fecha."_".$_FILES["nueva_cotizacion"]["name"]);
    }else{
      $img = $img_existente;
    }

    //echo "<script>alert('$titulo');</script>";
    $updateSQL = "UPDATE seccion_dinamica SET titulo = '$titulo', contenido = '$contenido', img = '$img' WHERE idseccion_dinamica = '$idseccion_dinamica'";
    $actualizar = $mysqli->query($updateSQL);
  }

  ///ELIMINAMOS LAS SECCIONES DINAMICAS
  if(isset($_POST['eliminar_seccion'])){
    $idseccion_dinamica = $_POST['eliminar_seccion'];
    $delteSQL = "DELETE FROM seccion_dinamica WHERE idseccion_dinamica = $idseccion_dinamica";
    $eliminar = $mysqli->query($delteSQL);
    //echo '<script>alert("SE HA ELIMINADO LA SECCIÓN")</script>';
  }

  $seccion = 'secciones';
  $menu = 'normatividad';
  $sql = "SELECT * FROM pagina2 WHERE idpagina2 = $idpagina";
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

    <title>Sección: Normatividad</title>
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
          <section class="">
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="">
                          <header class="panel-heading">
                            Sección: <span style="color:red">Normatividad</span>
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
                                                    $query_slide = "SELECT * FROM slide WHERE pagina = $idpagina";
                                                    $consultar = $mysqli->query($query_slide);
                                                    $query_slide2 = "SELECT * FROM slide WHERE pagina = $idpagina ORDER BY idslide DESC";
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
                                                              </div>
                                                          </div>
                                                        </div>

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
                            $query = "SELECT * FROM seccion_dinamica WHERE idpagina = $idpagina ORDER BY idseccion_dinamica DESC";
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

                                      <button class='btn btn-warning' type='submit' name='eliminar_seccion' value='<?php echo $contenido_dinamico['idseccion_dinamica'] ?>' onclick="return confirm('¿Desea eliminar la Sección dinámica?');"><span class='glyphicon glyphicon-trash glyphicon' aria-hidden='true'></span> Eliminar Sección</button>

                                      <button type="button" id="" class="btn btn-info" data-toggle="modal" href="<?php echo '#modalSeccion'.$contenido_dinamico['idseccion_dinamica']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar sección</button>

                                      <!-- Modal Modificar sección dinámica -->
                                      <div class="modal fade" id="<?php echo 'modalSeccion'.$contenido_dinamico['idseccion_dinamica']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><b>Modificar Sección dinámica</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <!-- page start-->
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <div class="form-group">
                                                              <label for="titulo_edit"><b>Titulo</b></label>
                                                              <input type="text" class="form-control" name="<?php echo 'titulo_edit'.$contenido_dinamico['idseccion_dinamica']; ?>"  value="<?php echo $contenido_dinamico['titulo']; ?>" placeholder="Titulo">
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="contenido_edit"><b>Contenido</b></label>
                                                              <textarea name="<?php echo 'contenido_edit'.$contenido_dinamico['idseccion_dinamica']; ?>"  class="form-control" rows="10"><?php echo nl2br($contenido_dinamico['contenido']); ?></textarea>
                                                            </div>  
                                                          </div>
                                                          <div class="col-md-6">
                                                            <img class="img-responsive" src="<?php echo $contenido_dinamico['img']; ?>" alt="">
                                                            <div class="form-group">
                                                                <div class="controls col-md-12">
                                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                      <span class="btn btn-white btn-file">
                                                                      <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                                      <input type="file" name="<?php echo 'img_edit'.$contenido_dinamico['idseccion_dinamica']; ?>" class="default" />
                                                                      </span>
                                                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="<?php echo 'img_existente'.$contenido_dinamico['idseccion_dinamica']; ?>" value="<?php echo $contenido_dinamico['img']; ?>">
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <!-- page end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                                                        <button class="btn btn-success" type="submit" name="modificar_seccion" value="<?php echo $contenido_dinamico['idseccion_dinamica']; ?>"> Guarda Cambios</button>
                                                    </div>              
                                            
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->

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


                                      <button class='btn btn-warning' type='submit' name='eliminar_seccion' value='<?php echo $contenido_dinamico['idseccion_dinamica'] ?>' onclick="return confirm('¿Desea eliminar la Sección dinámica?');"><span class='glyphicon glyphicon-trash glyphicon' aria-hidden='true'></span> Eliminar Sección</button>

                                      <button type="button" id="" class="btn btn-info" data-toggle="modal" href="<?php echo '#modalSeccion'.$contenido_dinamico['idseccion_dinamica']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar sección</button>

                                      <!-- Modal Modificar sección dinámica -->
                                      <div class="modal fade" id="<?php echo 'modalSeccion'.$contenido_dinamico['idseccion_dinamica']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><b>Modificar Sección dinámica</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <!-- page start-->
                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                              <label for="titulo_edit"><b>Titulo</b></label>
                                                              <input type="text" class="form-control" name="<?php echo 'titulo_edit'.$contenido_dinamico['idseccion_dinamica']; ?>" id="" value="<?php echo $contenido_dinamico['titulo']; ?>" placeholder="Titulo">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="contenido_edit"><b>Contenido</b></label>
                                                              <textarea name="<?php echo 'contenido_edit'.$contenido_dinamico['idseccion_dinamica']; ?>" id="" class="form-control" rows="10"><?php echo nl2br($contenido_dinamico['contenido']); ?></textarea>
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <!-- page end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                                                        <button class="btn btn-success" type="submit" name="modificar_seccion" value="<?php echo $contenido_dinamico['idseccion_dinamica']; ?>"> Guarda Cambios</button>
                                                    </div>              
                                            
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
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

                                      <button class='btn btn-warning' type='submit' name='eliminar_seccion' value='<?php echo $contenido_dinamico['idseccion_dinamica'] ?>' onclick="return confirm('¿Desea eliminar la Sección dinámica?');"><span class='glyphicon glyphicon-trash glyphicon' aria-hidden='true'></span> Eliminar Sección</button>

                                      <button type="button" id="" class="btn btn-info" data-toggle="modal" href="<?php echo '#modalSeccion'.$contenido_dinamico['idseccion_dinamica']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar sección</button>

                                      <!-- Modal Modificar sección dinámica -->
                                      <!-- Modal Modificar sección dinámica -->
                                      <div class="modal fade" id="<?php echo 'modalSeccion'.$contenido_dinamico['idseccion_dinamica']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><b>Modificar Sección dinámica</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                      <!-- page start-->
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                            <img class="img-responsive" src="<?php echo $contenido_dinamico['img']; ?>" alt="">
                                                          </div>
                                                          <div class="form-group">
                                                              <div class="controls col-md-12">
                                                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <span class="btn btn-white btn-file">
                                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Cambiar imagen</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Cambiar</span>
                                                                    <input type="file" name="<?php echo 'img_edit'.$contenido_dinamico['idseccion_dinamica'] ?>" class="default" />
                                                                    </span>
                                                                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                                      <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                                                  </div>
                                                              </div>
                                                              <input type="hidden" name="<?php echo 'img_existente'.$contenido_dinamico['idseccion_dinamica']; ?>" value="<?php echo $contenido_dinamico['img']; ?>">
                                                          </div>
                                                      </div>
                                                      <!-- page end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                                                        <button class="btn btn-success" type="submit" name="modificar_seccion" value="<?php echo $contenido_dinamico['idseccion_dinamica']; ?>"> Guarda Cambios</button>
                                                    </div>              
                                            
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      <!-- modal -->
                                    <?php
                                    }
                                  }
                                }
                                ?>
                                <!-- TERMINAN LAS SECCIONES DINAMICAS -->


                                <section id="" style="margin-top:4em;">
                                    <div class="container">
                                        <h3 class="alert alert-info text-center">CONTENIDO ACTUAL</h3>
                                        <?php
                                        $query_titulo = "SELECT idcontenido, titulo FROM contenido WHERE pagina = $idpagina";
                                        $consultar_titulo = $mysqli->query($query_titulo);

                                        $query_contenido = "SELECT * FROM contenido WHERE pagina = $idpagina";
                                        $consultar_contenido = $mysqli->query($query_contenido);
                                        ?>
                                        <div id="idcontenido" class="row">
                                            <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em;">
                                                <?php 
                                                while($titulo = $consultar_titulo->fetch_assoc()){
                                                ?>
                                                  <form action="" method="POST">
                                                      <div class="div-normatividad col-sm-12">
                                                          <h2 style="color:black"><input type="text" class="form-control" name="" value="<?php echo $titulo['titulo']; ?>"></h2>
                                                          <a href="<?php echo '#'.$titulo['idcontenido']; ?>"><span class="label label-primary">Consultar</span></a>

                                                          <button class="btn btn-danger btn-xs" type="submit" class="" name="eliminar_contenido" value="<?php echo $titulo['idcontenido']; ?>" onclick="return confirm('¿Desea eliminar el contenido?');">Eliminar</button>
                                                      </div>                        
                                                  </form>
                                                <?php
                                                }
                                                 ?>
                                            </div>
                                            <div class="col-md-8 col-xs-12">
                                                <div class="text-justify scroll col-md-12">
                                                    <?php 
                                                    while($contenido = $consultar_contenido->fetch_assoc()){
                                                    ?>
                                                        <div id="<?php echo $contenido['idcontenido']; ?>">
                                                            <h2 style="margin-top:3em;margin-bottom:2em;color:#2a3031;"><b><?php echo $contenido['titulo']; ?></b></h2>
                                                            <p style="font-size:18px;">
                                                                <?php echo nl2br($contenido['contenido']); ?>
                                                            </p>
                                                        </div>
                                                    <?php
                                                    }
                                                     ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </form>
                            <?php 
                            if(!empty($permisos['crear'])){
                            ?>
                              <form id="frm-nuevo-contenido" action="" method="POST">
                                  <section id="" style="margin-top:4em;">
                                      <div class="container">
                                          <h3 class="alert alert-success text-center">
                                            <button type="button" id="btn-nuevo-contenido" class="btn btn-info"><i class="fa fa-plus-circle"></i> AGREGAR NUEVO CONTENIDO</button>
                                          </h3>
                                          <div class="row">
                                              <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em;">                
                                                  <div class="div-normatividad col-sm-12">
                                                    <span class="label label-primary">Titulo</span>
                                                    <h2 style="color:black"><input type="text" class="form-control" name="titulo" value="" onBlur="ponerMayusculas(this)" required></h2>
                                                  </div>
                                              </div>
                                              <div class="col-md-8 col-xs-12">
                                                  <div class="text-justify col-md-12">
                                                      <div id="cnvb">
                                                          <h2><b>Contenido</b></h2>

                                                          <div class="row">
                                                              <div class="col-md-12">
                                                                  <section class="panel">
                                                                      <div class="panel-body">
                                                                        <div class="form-group">
                                                                          <div class="col-md-12">
                                                                            <p style="font-size:18px;">
                                                                              <textarea class="wysihtml5 form-control" name="contenido" rows="10"></textarea>
                                                                            </p>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                  </section>
                                                              </div>
                                                          </div>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </section>
                              </form>
                            <?php
                            }
                             ?>
                          </div>
                      </section>
                      <!--Pulstate  end-->
                  </div>
              </div>
          </section>
      </section>

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

      function ponerMayusculas(nombre) 
      { 
          nombre.value=nombre.value.toUpperCase(); 
      } 

      /////// INICIA AGREGAR CONTENIDO //////
      $(document).on('ready',function(){

        $('#btn-nuevo-contenido').click(function(){
          var url = 'datos4.php';                                   

          $.ajax({                        
             type: 'POST',                 
             url: url,                    
             data: $('#frm-nuevo-contenido').serialize(),
             success: function(data)           
             {
               $('#idcontenido').html(data);          
             }
           });
        });
      });
      /////// TERMINA AGREGAR CONTENIDO //////


      jQuery(document).ready(function(){

          $('.summernote').summernote({
              height: 200,                 // set editor height

              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor

              focus: false                 // set focus to editable area after initializing summernote
          });
      });

  </script>


  </body>
</html>
