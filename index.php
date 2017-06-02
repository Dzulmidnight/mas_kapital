<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
    $menu = 'index';
    include('header.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style='border-top:10px solid #263c89;border-bottom: 10px solid #8787b7;'>
            </div>
        </div>
    </div>
    <!--/#header-->

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
                                <img src="img/slider/principal/principal_1.jpg"  alt="imagen1">
                            </div>
                            <div class="item">
                                <img src="img/slider/principal/principal_2.jpg" alt="imagen2">
                            </div>
                            <div class="item">
                                <img src="img/slider/principal/principal_3.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="img/slider/principal/principal_4.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="img/slider/principal/principal_5.jpg" alt="imagen3">
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
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
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
                            <img src="img/index/oportuno.png" alt="oportuno">
                        </div>
                        <h2 style="color:#29327e">OPORTUNO</h2>
                        <p>Te otorgamos el crédito cuando lo necesitas.</p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="img/index/accesible.png" alt="accesible">
                        </div>
                        <h2 style="color:#35bddf">ACCESIBLE</h2>
                        <p>Nuestros requisitos son sencillos de obtener</p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="img/index/rentable.png" alt="rentable">
                        </div>
                        <h2 style="color:#29327e">RENTABLE</h2>
                        <p>Nuestro crédito te apoya para hacer crecer tu negocio</p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="1200ms">
                            <img src="img/index/seguro.png" alt="seguro">
                        </div>
                        <h2 style="color:#35bddf">SEGURO</h2>
                        <p>Con nosotros tu dinero no está en riesgo</p>
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
                        <h1 style="color:#323534;font-size:4em;margin-bottom:1em;"><b>QUIENES SOMOS</b></h1>
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
                    <div class="hidden-sm hidden-xs col-md-6">
                        <img class="img-responsive" src="img/quienes_somos/quienes_somos.png" alt="" style="float:right;margin-top:-100px;">
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
                        <img class="img-responsive" src="img/quienes_somos/quienes_somos.png" alt="" style="float:right;">
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
                        <img class="img-responsive" style="height:500px;float:right" src="img/quienes_somos/quienes_somos.png" alt="" >
                    </div>
                
            </div>
        </div>
    </section>
     <!--/#features-->
    <section style="margin-top:10em;">
        <div class="container" style="height:500px;background-image: url('img/nuestros_valores/nuestros_valores.jpg');background-size:cover;background-position:center;padding-top:5em;">
            <div class="row">

            </div>
        </div>
    </section>

    <section id="mision-vision">
        <div class="container" >
            <div class="row">
                    <div class="col-sm-12">
                        <h1 class="title text-center">NUESTRA MISIÓN</h1>
                        <p style="text-align:justify;font-size:16px;">
                            Somos una entidad financiera sostenible, que genera oportunidades de desarrollo para nuestros colaboradores, las familias de los microempresarios y accionistas, actuando con honestidad, transparencia y socialmente responsables.
                        </p>
                    </div>
                    <div class="col-sm-12">
                        <h1 class="title text-center">NUESTRA VISIÓN</h1>
                        <p style="text-align:justify;font-size:16px;">
                            Ser un verdadero agente de cambio que contribuya a mejorar las condiciones de vida de nuestros clientes.
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
                    <a href="https://www.facebook.com/mas.kapital"><img src="img/index/tablet.png" alt=""></a>
                </div>
                <div class="hidden-sm hidden-xs col-md-6" style="text-align:justify;color:#ffffff">
                    <a href="https://www.facebook.com/mas.kapital"><h1><b>SÍGUENOS EN FACEBOOK</b></h1></a>
                    <h2 style="color:#ffffff;font-size:30px;"><b>Más Kapital</b></h2>
                    <p style="font-size:20px;">Entérate de todo lo que acontece en nuestra familia MásKapital en nuestra página de Facebook, donde podrás conocer a todos los integrantes de esta gran familia, así como las últimas noticias y todo lo que sea importante para tu crédito.</p>
                </div>
                
                <!-- visible en sm -->
                <div class="visible-sm visible-xs col-sm-12" style="text-align:justify;color:#ffffff">
                    <a href="https://www.facebook.com/mas.kapital"><h1 class="text-center" style="font-size:2.5em;"><b>SÍGUENOS EN FACEBOOK</b></h1></a>
                    <h2 class="text-center" style="color:#ffffff;font-size:30px;"><b>Más Kapital</b></h2>
                    <p style="font-size:20px;">Entérate de todo lo que acontece en nuestra familia MásKapital en nuestra página de Facebook, donde podrás conocer a todos los integrantes de esta gran familia, así como las últimas noticias y todo lo que sea importante para tu crédito.</p>
                </div>
                <div class="visible-sm visible-xs col-sm-12 text-center">
                    <a href="https://www.facebook.com/mas.kapital"><img src="img/index/tablet.png" alt=""></a>
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
            //document.getElementsByClassName('barra_lateral_2').style.display = 'inline';
            /*var x = document.getElementsByClassName("barra_lateral_2");
            x[0].style.display = "inline";
            */
            var elements = document.getElementsByClassName('barra_lateral_2');

            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.display = 'inline';
                elements[i].style.transitionDelay = "2s";
            }

      
        }
        function desaparecer(){
            //document.getElementsByClassName('barra_lateral_2').style.display = 'none';
            /*var x = document.getElementsByClassName("barra_lateral_2");
            x[0].style.display = "inline";
            */
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
