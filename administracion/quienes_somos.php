<?php 
  require('../conexion/conexion.php');
  $menu = 'quienes';

  $sql = "SELECT * FROM pagina1 WHERE idpagina1 = 1";
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
      <link href="../css/main.css" rel="stylesheet">
    <title>¿Quiénes Somos?</title>

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
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="panel">
                          <header class="panel-heading">
                            Sección: <span style="color:red">¿Quiénes Somos?</span>
                          </header>
                          <div class="panel-body">

    <div id="div_lateral_guardar">
      <div class="barra_lateral_1">
        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
        <a style="color:#ffffff;" href="index.php"><b>Guardar Cambios</b></a>          
      </div>
    </div>

    <section id="home-slider">
        <div class="container">
            <div class="row">
        
                <div style="padding:0px;">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active ">
                                <img src="../img/slider/principal/principal_1.jpg"  alt="imagen1">
                            </div>
                            <div class="item">
                                <img src="../img/slider/principal/principal_2.jpg" alt="imagen2">
                            </div>
                            <div class="item">
                                <img src="../img/slider/principal/principal_3.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="../img/slider/principal/principal_4.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="../img/slider/principal/principal_5.jpg" alt="imagen3">
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



    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="../img/index/oportuno.png" alt="oportuno">
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
                            <img src="../img/index/accesible.png" alt="accesible">
                        </div>
                        <h2 style="color:#35bddf"><input type="text" value="<?php echo $contenido['sec1_titulo2']; ?>"></h2>
                        <p>
                          <textarea name="sec1_cont2" id="sec1_cont2"><?php echo $contenido['sec1_cont2']; ?></textarea>
                        </p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="../img/index/rentable.png" alt="rentable">
                        </div>
                        <h2 style="color:#29327e"><input type="text" value="<?php echo $contenido['sec1_titulo3']; ?>"></h2>
                        <p><textarea name="sec1_cont3" id="sec1_cont3"><?php echo $contenido['sec1_cont3']; ?></textarea></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="1200ms">
                            <img src="../img/index/seguro.png" alt="seguro">
                        </div>
                        <h2 style="color:#35bddf"><input type="text" value="<?php echo $contenido['sec1_titulo4'] ?>"></h2>
                        <p><textarea name="sec1_cont4" id="sec1_cont4"><?php echo $contenido['sec1_cont4']; ?></textarea></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/#services-->

    <!--23_05_2017<section id="action" class="responsive">
        <div class="">
             <div class="container" style="background-color:#323534">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="hidden-sm hidden-xs" style="padding-left:2em;color:#ffffff;font-size:34px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></h1>
                        <h1 class="visible-xs visible-sm" style="padding-left:2em;color:#ffffff;font-size:26px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></h1>                        
                    </div>
                </div>
            </div>
        </div>
   </section>-->

   <section>
       <div class="container" style="background-color:#323534;padding-top:1em;padding-bottom:1em">
           <div class="row">
               <div class="col-md-12">
                   <h2 class="visible-lg" style="padding-left:2em;color:#ffffff;font-size:28px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></h2>
                   <p class="visible-md" style="padding-left:1em;color:#ffffff;font-size:24px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></p>
                   <p class="visible-sm visible-xs text-center" style="color:#ffffff;font-size:25px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></p>
               </div>
           </div>
       </div>
   </section>
    <!--/#action-->

    <!-- QUIENES SOMOS -->
    <section id="features">
        <div class="container">
            <div class="row">
                    <!-- 15_05_2017 <div class="col-sm-6 col-md-offset-1 fadeInLeft text-center" style="padding-left:20em;margin-top:3em;"> -->
                
                    <!--- SECCIÓN LG-MD -->
                    <div class="hidden-sm hidden-xs col-md-6 fadeInLeft text-center" style="margin-top:3em;">
                        <h1 style="color:#323534;font-size:4em;margin-bottom:1em;"><b><input name="sec2_titulo1" id="sec2_titulo1" type="text" value="<?php echo $contenido['sec2_titulo1']; ?>"></b></h1>
                        <p style="font-size:16px;text-align:justify;">
                          <textarea class="form-control" name="sec2_cont1" id="sec2_cont1" rows="5"><?php echo $contenido['sec2_cont1']; ?></textarea>
                        </p>
                        <p style="font-size:16px;text-align:justify;">
                          <textarea class="form-control" name="sec2_cont2" id="sec2_cont2" rows="5"><?php echo $contenido['sec2_cont2']; ?></textarea>
                        </p>
                        <p style="font-size:16px;text-align:justify;">
                          <textarea class="form-control" name="sec2_cont3" id="sec2_cont3" rows="5"><?php echo $contenido['sec2_cont3']; ?></textarea>
                        </p>
                    </div>
                    <div class="hidden-sm hidden-xs col-md-6">
                        <img class="img-responsive" src="../img/quienes_somos/quienes_somos.png" alt="" style="float:right;margin-top:-100px;">
                    </div>
                
                    <!-- SECCIÓN SM -->
                    <div class="visible-sm col-sm-6 fadeInLeft text-center" style="margin-top:3em;">
                        <h2 style="color:#323534;font-size:3em;margin-bottom:1em;"><b>QUIENES SOMOS</b></h2>
                        <p style="font-size:16px;text-align:justify;">
                            Como institución intentamos trascender a los servicios financieros tradicionales de crédito, nuestro enfoque esta en resolver las necesidades reales de mujeres emprendedoras. Creando un proceso de crédito fácil y accesible, cuyos montos y plazos se adecuan a las necesidades de cada particular, manteniendo la confiabilidad y beneficios de un grupo de financiamiento. 
                        </p>
                        <p style="font-size:16px;text-align:justify;">
                            Nuestra experiencia en el área de las microfinanzas nos ha posicionado como una empresa sólida, moderna, e innovadora, que en forma eficiente y funcional otorga servicios financieros para el sector de la población de bajos ingresos sin acceso a fuentes bancarias de financiamiento.
                        </p>
                        <p style="font-size:16px;text-align:justify;">
                            Nuestra función consiste básicamente en ser el vehículo que lleve hasta las comunidades los recursos económicos y herramientas para su gestión. Y encaminamos nuestros servicios financieros a potenciar y hacer más eficientes las actividades productivas que se desarrollan en sus comunidades.
                        </p>
                    </div>
                    <div class="visible-sm col-sm-6">
                        <img class="img-responsive" src="../img/quienes_somos/quienes_somos.png" alt="" style="float:right;">
                    </div>

                    <!-- SECCIÓN XS -->
                    <div class="visible-xs col-xs-12 fadeInLeft text-center" style="margin-top:3em;">
                        <h1 style="color:#323534;font-size:2.5em;margin-bottom:1em;"><b>QUIENES SOMOS</b></h1>
                        <p style="font-size:16px;text-align:justify;">
                            Como institución intentamos trascender a los servicios financieros tradicionales de crédito, nuestro enfoque esta en resolver las necesidades reales de mujeres emprendedoras. Creando un proceso de crédito fácil y accesible, cuyos montos y plazos se adecuan a las necesidades de cada particular, manteniendo la confiabilidad y beneficios de un grupo de financiamiento. 
                        </p>
                        <p style="font-size:16px;text-align:justify;">
                            Nuestra experiencia en el área de las microfinanzas nos ha posicionado como una empresa sólida, moderna, e innovadora, que en forma eficiente y funcional otorga servicios financieros para el sector de la población de bajos ingresos sin acceso a fuentes bancarias de financiamiento.
                        </p>
                        <p style="font-size:16px;text-align:justify;">
                            Nuestra función consiste básicamente en ser el vehículo que lleve hasta las comunidades los recursos económicos y herramientas para su gestión. Y encaminamos nuestros servicios financieros a potenciar y hacer más eficientes las actividades productivas que se desarrollan en sus comunidades.
                        </p>
                    </div>
                    <div class="visible-xs col-xs-12">
                        <img class="img-responsive" style="height:500px;float:right" src="../img/quienes_somos/quienes_somos.png" alt="" >
                    </div>
                
            </div>
        </div>
    </section>
     <!--/#features-->
    <section style="margin-top:10em;">
        <div class="container" style="height:500px;background-image: url('../img/nuestros_valores/nuestros_valores.jpg');background-size:cover;background-position:center;padding-top:5em;">
            <div class="row">

            </div>
        </div>
    </section>

    <section id="mision-vision">
        <div class="container" >
            <div class="row">
                    <div class="col-sm-12">
                        <h1 class="title text-center"><input name="sec3_titulo1" id="sec3_titulo1" type="text" value="<?php echo $contenido['sec3_titulo1']; ?>"></h1>
                        <p style="text-align:justify;font-size:16px;">
                          <textarea class="form-control" name="sec3_cont2" id="sec3_cont2" rows="5"><?php echo $contenido['sec3_cont1']; ?></textarea>
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

    <!--/#clients-->



    <section id="siguenos">
        <div class="container" style="background-image: url('../img/index/banner_azul.png');background-size:cover; padding-top:5em;border-top: 10px solid #263c89; border-bottom: 10px solid #263c89">
            <div class="row">
                <!-- visible en lg-md -->
                <div class="hidden-sm hidden-xs col-md-6">
                    <a href="https://www.facebook.com/mas.kapital"><img src="../img/index/tablet.png" alt=""></a>
                </div>
                <div class="hidden-sm hidden-xs col-md-6" style="text-align:justify;">
                    <a href="https://www.facebook.com/mas.kapital"><h1><b><input style="color:black" type="text" value="<?php echo $contenido['sec4_titulo1']; ?>"></b></h1></a>
                    <h2 style="font-size:30px;"><b><input type="text" value="<?php echo $contenido['sec4_sub1'] ?>"></b></h2>
                    <p style="font-size:20px;"><textarea class="form-control" name="sec4_cont1" id="sec4_cont1" rows="5"><?php echo $contenido['sec4_cont1']; ?></textarea></p>
                </div>
                
                <!-- visible en sm -->
                <div class="visible-sm visible-xs col-sm-12" style="text-align:justify;color:#ffffff">
                    <a href="https://www.facebook.com/mas.kapital"><h1 class="text-center" style="font-size:2.5em;"><b>SÍGUENOS EN FACEBOOK</b></h1></a>
                    <h2 class="text-center" style="color:#ffffff;font-size:30px;"><b>Más Kapital</b></h2>
                    <p style="font-size:20px;">Entérate de todo lo que acontece en nuestra familia MásKapital en nuestra página de Facebook, donde podrás conocer a todos los integrantes de esta gran familia, así como las últimas noticias y todo lo que sea importante para tu crédito.</p>
                </div>
                <div class="visible-sm visible-xs col-sm-12 text-center">
                    <a href="https://www.facebook.com/mas.kapital"><img src="../img/index/tablet.png" alt=""></a>
                </div>

                
            </div>
        </div>
    </section>

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

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
    <script src="js/respond.min.js" ></script>
    <script type="text/javascript" src="js/jquery.pulsate.min.js"></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/gritter.js" type="text/javascript"></script>
    <script src="js/pulstate.js" type="text/javascript"></script>


  </body>
</html>
