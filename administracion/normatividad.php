<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  $pagina = 2; //NUMERO DE LA PAGINA DE NORMATIVIDAD
  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
    //CONSULTAMOS EL NUMERO DE IMAGENES DENTRO DEL SLIDE PARA PODER REEMPLAZAR O MANTENER CAMBIOS
    $ruta_slide = '../img//normatividad/';
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


    /*$sec1_img1 = 1;
    $sec1_img2 = 2;
    $sec1_img3 = 3;
    $sec1_img4 = 4;
*/

  }


  if(isset($_POST['eliminar_slide'])){
    $idslide = $_POST['eliminar_slide'];
    $img_slide = $_POST['img_slide_actual'.$idslide.''];
    unlink($img_slide);

    $query = "DELETE FROM slide WHERE idslide = $idslide";
    $eliminar = $mysqli->query($query);
  }

  $seccion = 'secciones';
  $menu = 'normatividad';
  $sql = "SELECT * FROM pagina2 WHERE idpagina2 = $pagina";
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

    <section id="" style="margin-top:4em;">
        <div class="container">
            <h3 class="alert alert-info text-center">CONTENIDO ACTUAL</h3>

            <?php
            $query_titulo = "SELECT idcontenido, titulo FROM contenido WHERE pagina = $pagina";
            $consultar_titulo = $mysqli->query($query_titulo);

            $query_contenido = "SELECT * FROM contenido WHERE pagina = $pagina";
            $consultar_contenido = $mysqli->query($query_contenido);

            ?>

            <div class="row">
                <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em;">
                    <?php 
                    while($titulo = $consultar_titulo->fetch_assoc()){
                    ?>
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:black"><input type="text" class="form-control" name="" value="<?php echo $titulo['titulo']; ?>"></h2>
                            <a href="<?php echo '#'.$titulo['idcontenido']; ?>"><span class="label label-primary">Consultar</span></a>
                        </div>
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

            <!--20_06_2017 <div id="idcontenido" class="row">
                <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em;">                
                    <div class="div-normatividad col-sm-12">
                        <h2 style="color:black"><input type="text" class="form-control" name="" value="CNVB"></h2>
                        <a href="#cnvb"><span class="label label-primary">Consultar</span></a>
                    </div>

                    <div class="div-normatividad col-sm-12">
                        <h2 style="color:black"><input type="text" class="form-control" name="" value="CONDUSEF"></h2>
                        <a href="#condusef"><span class="label label-primary">Consultar</span></a>
                    </div>

                    <div class="div-normatividad col-sm-12">
                        <h2 style="color:black"><input type="text" class="form-control" name="" value="BURO DE ENTIDADES FINANCIERAS"></h2>
                        <a href="#buro"><span class="label label-primary">Consultar</span></a>
                    </div>

                    <div class="div-normatividad col-sm-12">
                        <h2 style="color:black"><input type="text" class="form-control" name="" value="RENOVACIÓN DEL REGISTRO"></h2>
                        <a href="#cnvb"><span class="label label-primary">Consultar</span></a>
                    </div>

                    <div class="div-normatividad col-sm-12">
                        <h2 style="color:black"><input type="text" class="form-control" name="" value="OBTENCIÓN DEL DICTAMEN TÉCNICO"></h2>
                        <a href="#cnvb"><span class="label label-primary">Consultar</span></a>
                    </div>


                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="text-justify scroll col-md-12">
                        <div id="cnvb">
                            <h2 style="margin-top:3em;margin-bottom:2em;color:#2a3031;"><b>CNVB</b></h2>
                            <p style="font-size:18px;">
                                La Comisión Nacional Bancaria y de Valores (CNBV), es un órgano desconcentrado de la Secretaría de Hacienda y Crédito Público (SHCP), con facultades en materia de autorización, regulación, supervisión y sanción sobre los diversos <a href="http://www.gob.mx/cnbv/acciones-y-programas/sectores-supervisados?idiom=es" target="_new">sectores</a> y <a href="http://www.gob.mx/cnbv/acciones-y-programas/padron-de-entidades-supervisadas-y-autorizadas-para-captar?idiom=es" target="_new">entidades</a> que integran el Sistema Financiero Mexicano, así como sobre aquellas personas físicas y morales que realicen actividades previstas en las leyes relativas al sistema financiero. La Comisión se rige por <a href="http://www.cnbv.gob.mx/Normatividad/Ley%20de%20la%20Comisión%20Nacional%20Bancaria%20y%20de%20Valores.pdf" target="_new">la Ley de la CNBV</a>.
                            </p>
                        </div>
                        <div id="condusef">
                            <h2 style="margin-top:3em;margin-bottom:2em;color:#2a3031;"><b>CONDUSEF</b></h2>
                            <p style="font-size:18px;">
                                Es una institución pública especializada en materia financiera, encargada de promover y difundir la educación y la transparencia financiera para que los usuarios tomen decisiones informadas sobre los beneficios, costos y riesgos de los productos y servicios ofertados en el sistema financiero mexicano; así como proteger sus intereses mediante la supervisión y regulación a las instituciones financieras y proporcionarles servicios que los asesoren y apoyen en la defensa de sus derechos.
                            </p>
                            <p style="font-size:18px;">
                                Contacto:
                                <br>
                                Insurgentes Sur 762, Colonia del Valle, Ciudad de México. C.P. 03100
                                <br>
                                Página de Internet: www.condusef.gob.mx 
                            </p>
                            <p style="font-size:18px;">
                                Teléfono: (55) 5340 0999 y (01 800) 999 8080
                                <br>
                                Correo electrónico: 
                                <br>
                                asesoria@condusef.gob.mx
                                <br>
                                <img src="img/normatividad/logo_condusef.png" alt="">
                            </p>
                        </div> 
                        <div id="buro">
                            <h2 style="margin-top:3em;margin-bottom:2em;color:#2a3031;"><b>BURO DE ENTIDADES FINANCIERAS</b></h2>
                            <p style="font-size:18px">
                                Es una herramienta de consulta y difusión con la que podrás conocer los productos que ofrecen las entidades financieras, sus comisiones y tasas, las reclamaciones de los usuarios, las prácticas no sanas en que incurren, las sanciones administrativas que les han impuesto, las cláusulas abusivas de sus contratos y otra información que resulte relevante para informarte sobre su desempeño. 
                            </p>
                            <p style="font-size:18px">
                                Con el Buró de Entidades Financieras, se logrará saber quién es quién en bancos, seguros, sociedades financieras de objeto múltiple, cajas de ahorro, afores, entre otras entidades.
                            </p>
                            <p style="font-size:18px">
                                Con ello, podrás comparar y evaluar a las entidades financieras, sus productos y servicios y tendrás mayores elementos para elegir lo que más te convenga. 
                            </p>
                            <p style="font-size:18px">
                                Esta información te será útil para elegir un producto financiero y también para conocer y usar mejor los que ya tienes.
                            </p>
                            <p style="font-size:18px">
                                Este Buró de Entidades Financieras, es una herramienta que puede contribuir al crecimiento económico del país, al promover la competencia entre las instituciones financieras; que impulsará la transparencia al revelar información a los usuarios sobre el desempeño de éstas y los productos que ofrecen y que va a facilitar un manejo responsable de los productos y servicios financieros al conocer a detalle sus características. 
                            </p>
                            <p style="font-size:18px">
                                Lo anterior, podrá derivar en un mayor bienestar social, porque al conjuntar en un solo espacio tan diversa información del sistema financiero, el usuario tendrá más elementos para optimizar su presupuesto, para mejorar sus finanzas personales, para utilizar correctamente los créditos que fortalecerán su economía y obtener los seguros que la protejan, entre otros aspectos. 
                            </p>
                        </div>

                    </div>
                </div>
            </div>20_06_2017-->
        </div>
    </section>

</form>

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
                                            <form action="#" class="form-horizontal tasi-form">
                                                <div class="form-group">
                                                        <div class="col-md-12">
                                                          <p style="font-size:18px;">
                                                            <textarea class="wysihtml5 form-control" name="contenido" rows="10"></textarea>
                                                          </p>
                                                            
                                                        </div>
                                                    </div>
                                            </form>
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
