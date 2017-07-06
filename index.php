<?php 
    include('conexion/conexion.php');
    $menu = 'index';
    $idpagina = 1; // 1 = quienes somos

    /// CONSULTAMOS LA INFORMACIÓN DE LA PAGINA 1
    $query_pagina = "SELECT * FROM pagina1 WHERE idpagina1 = $idpagina";
    $consultar = $mysqli->query($query_pagina);
    $contenido = $consultar->fetch_assoc();

 ?>
<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $contenido['meta_description']; ?>">
    <meta name="author" content="MásKapital">
    <title>Inicio | Más kapital</title>
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

    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script>
        $(document).ready(function() {
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

    
</head><!--/head-->
<body>
    <?php
    include('header.php');
     ?>

    <!--/#header-->

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
                                  <img class="img-responsive" src="<?php echo 'administracion/'.$img_slide['img']; ?>"  alt="imagen1">
                              </div>

                            <?php
                            $contador++;
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
    </section>

    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?>	
    <!--/#home-slider-->
    
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
                            <img src="<?php echo 'administracion/'.$contenido['sec1_img3']; ?>" alt="<?php echo $contenido['sec1_titulo3']; ?>">
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
    <!--/#services-->

    <section>
       <div class="container" style="background-color:#323534;padding-top:1em;padding-bottom:1em">
           <div class="row">
               <div class="col-md-12">
                   <h2 class="visible-lg" style="padding-left:2em;color:#ffffff;font-size:28px;"><i><b><?php echo $contenido['sec2_titulo1']; ?></b></i></h2>
                   <p class="visible-md" style="padding-left:1em;color:#ffffff;font-size:24px;"><i><b><?php echo $contenido['sec2_titulo1']; ?></b></i></p>
                   <p class="visible-sm visible-xs text-center" style="color:#ffffff;font-size:25px;"><i><b><?php echo $contenido['sec2_titulo1']; ?></b></i></p>
               </div>
           </div>
       </div>
    </section>
    <!--/#action-->

    <!-- QUIENES SOMOS -->
    <section id="features">
        <div class="container">
            <div class="row">
            
                <!--- SECCIÓN LG-MD -->
                <div class="hidden-sm hidden-xs col-md-6 fadeInLeft text-center" style="margin-top:3em;">
                    <h1 style="color:#323534;font-size:4em;margin-bottom:1em;"><b><?php echo $contenido['sec2_sub1']; ?></b></h1>
                    <p style="font-size:16px;text-align:justify;">
                        <?php echo nl2br($contenido['sec2_cont1']); ?>
                    </p>
                </div>
                <div class="hidden-sm hidden-xs col-md-6">
                    <img class="img-responsive" src="<?php echo 'administracion/'.$contenido['sec2_img1']; ?>" alt="" style="float:right;margin-top:-100px;">
                </div>
            
                <!-- SECCIÓN SM -->
                <div class="visible-sm col-sm-6 fadeInLeft text-center" style="margin-top:3em;">
                    <h2 style="color:#323534;font-size:3em;margin-bottom:1em;"><b><?php echo $contenido['sec2_sub1']; ?></b></h2>
                    <p style="font-size:16px;text-align:justify;">
                        <?php echo nl2br($contenido['sec2_cont1']); ?> 
                    </p>
                </div>
                <div class="visible-sm col-sm-6">
                    <img class="img-responsive" src="<?php echo 'administracion/'.$contenido['sec2_img1']; ?>" alt="" style="float:right;">
                </div>

                <!-- SECCIÓN XS -->
                <div class="visible-xs col-xs-12 fadeInLeft text-center" style="margin-top:3em;">
                    <h1 style="color:#323534;font-size:2.5em;margin-bottom:1em;"><b><?php echo $contenido['sec2_sub1']; ?></b></h1>
                    <p style="font-size:16px;text-align:justify;">
                        <?php echo nl2br($contenido['sec2_cont1']); ?>
                    </p>
                </div>
                <div class="visible-xs col-xs-12">
                    <img class="img-responsive" style="height:500px;float:right" src="<?php echo 'administracion/'.$contenido['sec2_img1']; ?>" alt="" >
                </div>
                
            </div>
        </div>
    </section>
    
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

    <section id="mision-vision">
        <div class="container" >
            <div class="row">
                    <div class="col-sm-12">
                        <h1 class="title text-center"><?php echo $contenido['sec3_titulo1']; ?></h1>
                        <p style="text-align:justify;font-size:16px;">
                            <?php echo $contenido['sec3_cont1']; ?>
                        </p>
                    </div>
                    <div class="col-sm-12">
                        <h1 class="title text-center"><?php echo $contenido['sec3_titulo2']; ?></h1>
                        <p style="text-align:justify;font-size:16px;">
                            <?php echo $contenido['sec3_cont2']; ?>
                        </p> 
                    </div>
            </div>
        </div>
     </section>

    <!--/#clients-->



    <section id="siguenos">
        <div class="container" style="background-image: url('img/index/banner_azul.png');background-size:cover; padding-top:5em;border-top: 10px solid #263c89; border-bottom: 10px solid #263c89">
            <div class="row">
                <!-- visible en lg-md -->
                <div class="hidden-sm hidden-xs col-md-6">
                    <a href="https://www.facebook.com/mas.kapital"><img src="<?php echo 'administracion/'.$contenido['sec4_img1']; ?>" alt=""></a>
                </div>
                <div class="hidden-sm hidden-xs col-md-6" style="text-align:justify;color:#ffffff">
                    <a href="https://www.facebook.com/mas.kapital"><h1><b><?php echo $contenido['sec4_titulo1']; ?></b></h1></a>
                    <h2 style="color:#ffffff;font-size:30px;"><b><?php echo $contenido['sec4_sub1']; ?></b></h2>
                    <p style="font-size:20px;"><?php echo $contenido['sec4_cont1']; ?></p>
                </div>
                
                <!-- visible en sm -->
                <div class="visible-sm visible-xs col-sm-12" style="text-align:justify;color:#ffffff">
                    <a href="https://www.facebook.com/mas.kapital"><h1 class="text-center" style="font-size:2.5em;"><b><?php echo $contenido['sec4_titulo1']; ?></b></h1></a>
                    <h2 class="text-center" style="color:#ffffff;font-size:30px;"><b><?php echo $contenido['sec4_sub1']; ?></b></h2>
                    <p style="font-size:20px;"><?php echo $contenido['sec4_cont1']; ?></p>
                </div>
                <div class="visible-sm visible-xs col-sm-12 text-center">
                    <a href="https://www.facebook.com/mas.kapital"><img src="<?php echo 'administracion/'.$contenido['sec4_img1']; ?>" alt=""></a>
                </div>

                
            </div>
        </div>
    </section>

    <!-- INICIA FOOTER -->
    <?php include('footer.php'); ?>
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
