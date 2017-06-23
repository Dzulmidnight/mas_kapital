<?php 
    include('conexion/conexion.php');
    $idpagina = 3; //id de la pagina mas flexible
    //consultamos la pagina3 = masflexible
    $query = "SELECT * FROM pagina3 WHERE idpagina = $idpagina";
    $consultar = $mysqli->query($query);
    $detalle = $consultar->fetch_assoc();
 ?>
<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
ul {
    list-style-image: url('img/mas_flexible/circulo.png');

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
        <!--<div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>-->
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
                            <img src="<?php echo 'administracion/'.$detalle['sec1_img1']; ?>" alt="oportuno">
                        </div>
                        <h2 style="color:#29327e"><?php echo $detalle['sec1_titulo1']; ?></h2>
                        <p><?php echo $detalle['sec1_cont1']; ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="<?php echo 'administracion/'.$detalle['sec1_img2']; ?>" alt="accesible">
                        </div>
                        <h2 style="color:#35bddf"><?php echo $detalle['sec1_titulo2']; ?></h2>
                        <p><?php echo $detalle['sec1_cont2']; ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="img/index/rentable.png" alt="rentable">
                        </div>
                        <h2 style="color:#29327e"><?php echo $detalle['sec1_titulo3']; ?></h2>
                        <p><?php echo $detalle['sec1_cont3']; ?></p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="1200ms">
                            <img src="<?php echo 'administracion/'.$detalle['sec1_img4']; ?>" alt="seguro">
                        </div>
                        <h2 style="color:#35bddf"><?php echo $detalle['sec1_titulo4']; ?></h2>
                        <p><?php echo $detalle['sec1_cont4']; ?></p>
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
                    <h1 class="text-center" style="color: #2a3031;margin-bottom:1em;"><b><?php echo $detalle['sec2_titulo1']; ?></b></h1>
                    <p class="text-justify">
                        <?php echo $detalle['cont1']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
     <!--/#features-->
    <section id="beneficios_masflexible" style="margin-top:4em;">
        <div class="container">
            <div class="row hidden-sm hidden-xs">
                <div class="divs col-md-2">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont1']; ?>  
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont2']; ?>   
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont3']; ?>
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont4']; ?>
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont5']; ?>   
                    </p>
                </div>
                <div class="divs col-md-2" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont6']; ?>   
                    </p>
                </div>
            </div>

            <div class="row visible-sm visible-xs">
                <div class="divs-sm col-sm-4 col-xs-4">
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont1']; ?>  
                    </p>
                </div>
                <div class="divs-sm col-sm-4 col-xs-4" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont2']; ?>   
                    </p>
                </div>
                <div class="divs-sm col-sm-4 col-xs-4" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont3']; ?>
                    </p>
                </div>
                <div class="divs-sm col-sm-4 col-xs-4" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont4']; ?>
                    </p>
                </div>
                <div class="divs-sm col-sm-4 col-xs-4" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont5']; ?>   
                    </p>
                </div>
                <div class="divs-sm col-sm-4 col-xs-4" >
                    <img src="img/mas_flexible/icono_beneficios.png" alt="">
                    <p>
                        <?php echo $detalle['sec3_cont6']; ?>   
                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="caracteristicas" style="margin-top:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1 class="text-center" style="font-size:40px;color: #2a3031;margin-bottom:1em;"><b><?php echo $detalle['sec4_titulo1'], ?></b></h1>
                    <h2 class="text-center"><?php echo $detalle['sec4_sub1']; ?></h2>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center">
                        <?php $detalle['sec4_cont1']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms" >
                    <img class="img-responsive" src="<?php echo 'administracion/'.$detalle['sec4_img1']; ?>" alt="">    
                </div>              
            </div>
        </div>
     </section>
    <!--/#clients-->
    <section id="requisitos" style="margin-bottom:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding:0">
                    <img class="img-responsive" style="width:100%;"src="<?php echo 'administracion/'.$detalle['sec4_img2']; ?>" alt="">
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container" style="background-image: url('img/index/banner_azul.png');background-size:cover; padding-top:2em;border-top: 10px solid #fac099; border-bottom: 10px solid #fac099">
            <div class="col-md-12 text-center">
                <h1 style="color:#ffffff"><b><?php echo $detalle['sec4_titulo2']; ?></b></h1>
            </div>
            
            <!-- visible lg-md -->
            <div class="hidden-sm hidden-xs col-md-7">
                <img style="margin-top:6em;" src="img/mas_flexible/compromisos.png" alt="">
            </div>
            <div class="hidden-sm hidden-xs col-md-5" style="text-align:justify;color:#ffffff;">
                <ul>
                    <li><h3 style="font-size:30px;">Aceptar nuevas clientas.</h3></li>
                    <li><h3 style="font-size:30px;">Hacer apoyo mutuo cuando haga falta.</h3></li>
                    <li><h3 style="font-size:30px;">Devolver el apoyo mutuo en tiempo.</h3></li>
                    <li><h3 style="font-size:30px;">Aceptar las reglas del grupo.</h3></li>
                </ul>
            </div>

            <!-- visible sm y xs -->
            <div class="visible-sm visible-xs col-sm-12 col-xs-12" style="text-align:justify;color:#ffffff;">
                <ul>
                    <li><h3 style="font-size:30px;">Aceptar nuevas clientas.</h3></li>
                    <li><h3 style="font-size:30px;">Hacer apoyo mutuo cuando haga falta.</h3></li>
                    <li><h3 style="font-size:30px;">Devolver el apoyo mutuo en tiempo.</h3></li>
                    <li><h3 style="font-size:30px;">Aceptar las reglas del grupo.</h3></li>
                </ul>
            </div>
            <div class="visible-sm visible-xs col-sm-12 col-xs-12">
                <img src="img/mas_flexible/compromisos.png" alt="">
            </div>



        </div>
    </section>

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
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-responsive" src="img/mas_flexible/mas_regalos.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    
    <section id="donde-pagar" style="margin-top:5em;margin-bottom:6em;">
        <div class="container" style="border-bottom: 10px solid #263c89">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="font-size:40px;color:#2a3031"><b>¿DONDE PAGAR?</b></h1>
                </div>

                <!-- VISIBLE LG-MD -->
                <div class="hidden-sm hidden-xs col-md-3">
                    <img src="img/mas_flexible/donde_pagar.png" alt="">
                </div>

                <div class="hidden-sm hidden-xs col-md-9 text-center" style="margin-top:4em;">
                    <div class="col-sm-4">
                        <img class="img-responsive" src="img/mas_flexible/logo_banorte.jpg" alt="">
                    </div>
                    <div class="col-sm-4">
                        <img class="img-responsive" src="img/mas_flexible/logo_scotiabank.jpg" alt="">
                    </div>
                    <div class="col-sm-4">
                        <img class="img-responsive" src="img/mas_flexible/logo_telecomm.jpg" alt="">
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <h3 class="text-center"><b>Para cobrar su crédito o realizar sus pagos</b></h3>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h3 class="text-center">Para realizar únicamente pagos</h3>
                    </div>
                    <div class="col-sm-9 col-xs-12 col-sm-offset-3">
                        <h2 class="text-left" style="color:#f26e23;margin-bottom:1em;"><b>Además podrás realizar tus pagos y desembolsos en las sucursales que cuentan con caja.</b></h2>
                        <h4 class="text-left" style="color:#858789"><b>RECOMENDACIONES para poder realizar pagos de recuperación del crédito.</b></h4>
                        <p class="text-left" style="color:#858789">- Presentarse en Ventanilla a realizar el pago (Recuperación). De preferencia antes de las 3:30 pm.</p>
                        <p class="text-left" style="color:#858789">- Llevar consigo número de referencia, cuenta y monto a depositar.</p>
                        <p class="text-left" style="color:#858789">- Antes de salir del Banco, revisar la ficha de depósito que tenga los datos correctos como son: NOMBRE DE LA EMPRESA, NÚMERO DE REFERENCIA Y MONTO.</p>
                        <p class="text-left" style="color:#858789">- Verificar en el tiket de deposito que se haya registrado correctamente No. DE REFERENCIA Y MONTO.</p>
                    </div>
                </div>
                
                <!-- VISIBLE SM -->
                <div class="visible-sm col-sm-12 col-xs-12 text-center" style="margin-top:4em;">
                    <div class="col-xs-4">
                        <img class="img-responsive" src="img/mas_flexible/logo_banorte.jpg" alt="">
                    </div>
                    <div class="col-xs-4">
                        <img class="img-responsive" src="img/mas_flexible/logo_scotiabank.jpg" alt="">
                    </div>
                    <div class="col-xs-4">
                        <img class="img-responsive" src="img/mas_flexible/logo_telecomm.jpg" alt="">
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <h3 class="text-center"><b>Para cobrar su crédito o realizar sus pagos</b></h3>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h3 class="text-center">Para realizar únicamente pagos</h3>
                    </div>

                </div>
                <div class="visible-sm col-sm-3 col-xs-3">
                    <img style="height:300px;margin-top:8em;" src="img/mas_flexible/donde_pagar.png" alt="">
                </div>
                <div class="visible-sm col-sm-9 col-xs-9">

                    <div class="col-sm-9 col-xs-12 col-sm-offset-3">
                        <h2 class="text-left" style="color:#f26e23;margin-bottom:1em;"><b>Además podrás realizar tus pagos y desembolsos en las sucursales que cuentan con caja.</b></h2>
                        <h4 class="text-left" style="color:#858789"><b>RECOMENDACIONES para poder realizar pagos de recuperación del crédito.</b></h4>
                        <p class="text-left" style="color:#858789">- Presentarse en Ventanilla a realizar el pago (Recuperación). De preferencia antes de las 3:30 pm.</p>
                        <p class="text-left" style="color:#858789">- Llevar consigo número de referencia, cuenta y monto a depositar.</p>
                        <p class="text-left" style="color:#858789">- Antes de salir del Banco, revisar la ficha de depósito que tenga los datos correctos como son: NOMBRE DE LA EMPRESA, NÚMERO DE REFERENCIA Y MONTO.</p>
                        <p class="text-left" style="color:#858789">- Verificar en el tiket de deposito que se haya registrado correctamente No. DE REFERENCIA Y MONTO.</p>
                    </div>
                </div>

                <!-- VISIBLE XS -->
                <div class="visible-xs col-xs-12 col-xs-12 text-center" style="margin-top:4em;">
                    <div class="col-xs-6">
                        <img class="img-responsive" src="img/mas_flexible/logo_banorte.jpg" alt="">
                    </div>
                    <div class="col-xs-6">
                        <img class="img-responsive" src="img/mas_flexible/logo_scotiabank.jpg" alt="">
                    </div>
                    <div class="col-xs-12">
                        <h3 class="text-center"><b>Para cobrar su crédito o realizar sus pagos</b></h3>
                    </div>
                    <div class="col-xs-12">
                        <img class="" src="img/mas_flexible/logo_telecomm.jpg" alt="">
                    </div>
                    <div class="col-xs-12">
                        <h3 class="text-center">Para realizar únicamente pagos</h3>
                    </div>

                </div>
                <div class="visible-xs col-xs-12 text-justify">
                    <div class="col-xs-12">
                        <h2 class="text-left" style="color:#f26e23;margin-bottom:1em;"><b>Además podrás realizar tus pagos y desembolsos en las sucursales que cuentan con caja.</b></h2>
                        <h4 class="text-left" style="color:#858789"><b>RECOMENDACIONES para poder realizar pagos de recuperación del crédito.</b></h4>
                        <p class="text-left" style="color:#858789">- Presentarse en Ventanilla a realizar el pago (Recuperación). De preferencia antes de las 3:30 pm.</p>
                        <p class="text-left" style="color:#858789">- Llevar consigo número de referencia, cuenta y monto a depositar.</p>
                        <p class="text-left" style="color:#858789">- Antes de salir del Banco, revisar la ficha de depósito que tenga los datos correctos como son: NOMBRE DE LA EMPRESA, NÚMERO DE REFERENCIA Y MONTO.</p>
                        <p class="text-left" style="color:#858789">- Verificar en el tiket de deposito que se haya registrado correctamente No. DE REFERENCIA Y MONTO.</p>
                    </div>
                </div>


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
