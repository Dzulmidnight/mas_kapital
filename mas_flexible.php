<?php 
    include('conexion/conexion.php');
    $idpagina = 3; //id de la pagina mas flexible
    //consultamos la pagina3 = masflexible
    $query = "SELECT * FROM pagina3 WHERE idpagina3 = $idpagina";
    $consultar = $mysqli->query($query);
    $contenido = $consultar->fetch_assoc();
 ?>
<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $contenido['meta_description']; ?>">
    <meta name="author" content="MasKapital">
    <title>MásFlexible | Más kapital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="img/logos/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#menu_oculto').hide(0);
            $(window).scroll(function(){
                var windowHeight = $(window).scrollTop();
                var contenido2 = $("#services").offset();
                contenido2 = contenido2.top;
                if(windowHeight >= contenido2  ){
                    $('#menu_oculto').fadeIn(500);
                }else{
                    $('#menu_oculto').fadeOut(500);
                }
            });
        });
    </script>
    <style>
        #menu_oculto{
            z-index: 1;
            margin: 0 auto;
            top: 10px;
            position: fixed;
            width: 100%;
            padding: 30px 10px 30px 10px;
        }
    </style>

    <style>
    .carousel-indicators {

      position: absolute;
      bottom: 40%;
      z-index: 15;
      width: 30px;
      margin-left: 20px;
      list-style: none;
      text-align: center;
      right: 5%;
      left:95%
    }
    .carousel-indicators li{
      display: block;
      width: 20px;
      height: 20px;
      margin-bottom: 20px;
    }
    .carousel-indicators .active {
     width: 22px;
     height: 22px;
     margin-bottom: 20px;
     background-color: #fff;
    }      
        
    </style>
</head><!--/head-->

<body>
	<?php
    $menu = 'flexible';
    include('header.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style='border-top:10px solid #263c89;border-bottom: 10px solid #8787b7;'>
            </div>
        </div>
    </div>
    <!--/#header-->
    <!-- INICIA TITULO -->
    <section id="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="background-color: #f0f0f6;padding-top:3em;margin-bottom:1em;">
                    <h1 style="color: #2a3031;font-size:50px"><b>MÁSFLEXIBLE</b></h1>
                    <h2 style="font-size:30px"><i>Un crédito personalizado con el respaldo de un grupo.</i></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- TERMINA TITULO -->
    <!-- INICIA SLIDER -->
    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div style="padding:0px;">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <?php 
                        $query_slide = "SELECT * FROM slide WHERE pagina = 3";
                        $consultar = $mysqli->query($query_slide);
                        $query_slide2 = "SELECT * FROM slide WHERE pagina = 3 ORDER BY idslide DESC";
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
                                  <img class="img-responsive" src="<?php echo 'administracion/'.$img_slide['img']; ?>"  alt="imagen1">

                              </div>

                            <?php
                            $cont++;
                            }
                             ?>
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
        <!--<div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>-->
    </section>
    <!-- TERMINA SLIDER -->


    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?> 

    <!-- INICIA SECCIÓN 1 (sec1) -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="<?php echo 'administracion/'.$contenido['sec1_img1']; ?>" alt="<?php echo $contenido['sec1_titulo1']; ?>">
                        </div>
                        <h2 style="color:#29327e"><?php echo $contenido['sec1_titulo1']; ?></h2>
                        <p><?php echo $contenido['sec1_cont1']; ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="<?php echo 'administracion/'.$contenido['sec1_img2']; ?>" alt="<?php echo $contenido['sec1_titulo2']; ?>">
                        </div>
                        <h2 style="color:#35bddf"><?php echo $contenido['sec1_titulo2']; ?></h2>
                        <p><?php echo $contenido['sec1_cont2']; ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="img/index/rentable.png" alt="<?php echo $contenido['sec1_titulo3']; ?>">
                        </div>
                        <h2 style="color:#29327e"><?php echo $contenido['sec1_titulo3']; ?></h2>
                        <p><?php echo $contenido['sec1_cont3']; ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="1200ms">
                            <img src="<?php echo 'administracion/'.$contenido['sec1_img4']; ?>" alt="<?php echo $contenido['sec1_titulo4']; ?>">
                        </div>
                        <h2 style="color:#35bddf"><?php echo $contenido['sec1_titulo4']; ?></h2>
                        <p><?php echo $contenido['sec1_cont4']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="color: #2a3031;margin-bottom:1em;"><b><?php echo $contenido['sec1_titulo5']; ?></b></h1>
                    <p class="text-justify">
                        <?php echo $contenido['sec1_cont5']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- TERMINA SECCIÓN 1 (sec1) -->

    <!-- INICIA SECCIÓN 2 (sec2) -->
    <section id="beneficios_masflexible" style="margin-top:4em;">
        <div class="container">
            <div class="row hidden-sm hidden-xs">
                <div class="divs col-md-2">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont1']; ?>  
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont2']; ?>   
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont3']; ?>
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont4']; ?>
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont5']; ?>   
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont6']; ?>   
                    </p>
                </div>
            </div>
            <!-- VISIBLE EN SM -->
            <div class="row visible-sm">
                <div class="divs-sm col-sm-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont1']; ?>  
                    </p>
                </div>
                <div class="divs-sm col-sm-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont2']; ?>   
                    </p>
                </div>
                <div class="divs-sm col-sm-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont3']; ?>
                    </p>
                </div>
                <div class="divs-sm col-sm-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont4']; ?>
                    </p>
                </div>
                <div class="divs-sm col-sm-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont5']; ?>   
                    </p>
                </div>
                <div class="divs-sm col-sm-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont6']; ?>   
                    </p>
                </div>
            </div>
            <!-- VISIBLE EN XS -->
            <div class="row visible-xs">
                <div class="divs-xs col-xs-12">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont1']; ?>  
                    </p>
                </div>
                <div class="divs-xs col-xs-12" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont2']; ?>   
                    </p>
                </div>
                <div class="divs-xs col-xs-12" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont3']; ?>
                    </p>
                </div>
                <div class="divs-xs col-xs-12" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont4']; ?>
                    </p>
                </div>
                <div class="divs-xs col-xs-12" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont5']; ?>   
                    </p>
                </div>
                <div class="divs-xs col-xs-12" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $contenido['sec2_cont6']; ?>   
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
                <div class="col-md-12 ">
                    <h1 class="text-center" style="font-size:40px;color: #2a3031;margin-bottom:1em;"><b><?php echo $contenido['sec3_titulo1']; ?></b></h1>
                    <h2 class="text-center"><?php echo $contenido['sec3_sub1']; ?></h2>
                </div>
                <div class="col-md-12">
                    <p style="padding-left:6em;padding-right:6em;" class="text-center">
                        <?php echo $contenido['sec3_cont1']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- TERMINA SECCIÓN 3 (sec3) -->

    <!-- INICIA SECCIONES DINAMICAS -->
    <?php 
    $query = "SELECT * FROM seccion_dinamica WHERE idpagina = $idpagina";
    $consultar = $mysqli->query($query);
    $num_filas = $consultar->num_rows;

    if($num_filas>0){
      while($contenido_dinamico = $consultar->fetch_assoc()){
        if($contenido_dinamico['tipo_seccion'] == 1){
        ?>
          <section style="margin-top:10em;">
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
                      <img class="img-responsive" src="<?php echo 'administracion/'.$contenido_dinamico['img']; ?>" alt="">
                    </div>
                  </div>
              </div>
          </section>
        <?php
        }else if($contenido_dinamico['tipo_seccion'] == 2){
        ?>
          <section style="margin-top:10em;">
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
          <section style="margin-top:10em;">
              <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <img class="img-responsive" src="<?php echo 'administracion/'.$contenido_dinamico['img']; ?>" alt="">
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

    <section style="margin-top:5em;">
        <div class="container" style="padding-left:6em;padding-right:6em;">
            <div class="col-md-12">
                <h1>PREGUNTAS FRECUENTES</h1>
            </div>
            <div class="scroll col-md-12">
            <?php 
            $query = "SELECT * FROM faq";
            $consultar = $mysqli->query($query);

            while($preguntas = $consultar->fetch_assoc()){
                echo '<h3>'.$preguntas['pregunta'].'</h3>';
                echo '<p class="text-justify">'.$preguntas['respuesta'].'</p>';
            }
             ?>
            </div>
        </div>
    </section>



    <!-- INICIA FOOTER -->
    <?php 
    include('footer.php');
     ?>
    <!-- TERMINA FOOTER -->

    <script>
        function aparecer(){
            var elements = document.getElementsByClassName('barra_lateral_2');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.display = 'inline';
                elements[i].style.transitionDelay = "2s";
            }
        }
        function desaparecer(){
            var elements = document.getElementsByClassName('barra_lateral_2');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.display = 'none';
                elements[i].style.transitionDelay = "2s";
            }
        }
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
