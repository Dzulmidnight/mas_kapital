<?php 
// grab recaptcha library
require_once "recaptchalib.php";

if(isset($_POST['enviar_denuncia']) && $_POST['enviar_denuncia'] == 1){

	foreach ($_POST as $key => $value) {
		echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
	}


	// your secret key
	$secret = "6LfhBiIUAAAAAJeO68eUgS78W6hSo2OnMn2W9Dlt";
	 
	// empty response
	$response = null;
	 
	// check secret key
	$reCaptcha = new ReCaptcha($secret);
	// if submitted check response
	if ($_POST["g-recaptcha-response"]) {
	    $response = $reCaptcha->verifyResponse(
	        $_SERVER["REMOTE_ADDR"],
	        $_POST["g-recaptcha-response"]
	    );
	}
	if ($response != null && $response->success) {
    	echo "Hi " . $_POST["nombre"] . " (" . $_POST["motivo"] . "), thanks for submitting the form!";
  	} else {
  		echo '<script>alert("Debes de marcar el cuadro de captcha")</script>';
  	}

}
 ?>
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





</head><!--/head-->

<body>
	<header id="header" style="border-bottom:10px solid #263c89;">      
        <!--<div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>-->
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html" style="margin-top:10px;">
                    	<h1><img src="img/logos/logo_mas_kapital.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse" style="margin-top:10px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.html"><b>¿QUIÉNES SOMOS?</b></a></li>
                        <li><a href="mas_flexible.html"><b>MÁS FLEXIBLE</b></a></li>
                        <li><a href="universidad_mk.html"><b>UNIVERSIDAD MK</b></a></li>
                        <li><a href="bolsa_trabajo.html"><b>BOLSA DE TRABAJO</b></a></li>
                        <li><a href="atencion_clientes.html"><b>ATENCIÓN A CLIENTES</b></a></li>
                        <li><a href="normatividad.html"><b>NORMATIVIDAD</b></a></li>
                        <!--<li class="dropdown"><a href="#">MÁS FLEXIBLES <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="aboutus.html">About</a></li>
                                <li><a href="aboutus2.html">About 2</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                                <li><a href="contact2.html">Contact us 2</a></li>
                                <li><a href="404.html">404 error</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>-->                   
                        <!--15_05_2017 <li class="dropdown"><a href="blog.html">UNIVERSIDAD MK <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog Default</a></li>
                                <li><a href="blogtwo.html">Timeline Blog</a></li>
                                <li><a href="blogone.html">2 Columns + Right Sidebar</a></li>
                                <li><a href="blogthree.html">1 Column + Left Sidebar</a></li>
                                <li><a href="blogfour.html">Blog Masonary</a></li>
                                <li><a href="blogdetails.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">BOLSA DE TRABAJO <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Portfolio Default</a></li>
                                <li><a href="portfoliofour.html">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="portfolioone.html">3 Columns + Right Sidebar</a></li>
                                <li><a href="portfoliotwo.html">3 Columns + Left Sidebar</a></li>
                                <li><a href="portfoliothree.html">2 Columns</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>                         
                        <li><a href="shortcodes.html ">ATENCIÓN A CLIENTES</a></li> 15_05_2017 -->               
                    </ul>
                </div>
                <!--<div class="search" style="margin-top:10px;">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>-->
            </div>
        </div>
    </header>

    <!--/#header-->

    <section id="home-slider" style="border-top: 10px solid #8787b7;">


        <div class="container-fluid">
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

                <!--<div class="main-slider">
                    <div class="slide-text">
                        <h1>We Are Creative Nerds</h1>
                        <p>Boudin doner frankfurter pig. Cow shank bresaola pork loin tri-tip tongue venison pork belly meatloaf short loin landjaeger biltong beef ribs shankle chicken andouille.</p>
                        <a href="#" class="btn btn-common">SIGN UP</a>
                    </div>
                    <img src="images/home/slider/hill.png" class="slider-hill" alt="slider image">
                    <img src="images/home/slider/house.png" class="slider-house" alt="slider image">
                    <img src="images/home/slider/sun.png" class="slider-sun" alt="slider image">
                    <img src="images/home/slider/birds1.png" class="slider-birds1" alt="slider image">
                    <img src="images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
                </div>-->
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <div id="div_lateral">
        <div class="barra_lateral">
            <a href="index.html"><img src="img/logos/ico_maskapital.png" alt=""></a>
        </div>
        <div class="barra_lateral">
            <a href="universidad_mk.html"><img src="img/logos/ico_universidad.png" alt=""></a>
        </div>
        <div class="barra_lateral">
            <a href="mas_flexible.html"><img src="img/logos/ico_masflexible.png" alt=""></a>
        </div>
        <div class="barra_lateral">
            <a href=""><img src="img/logos/ico_maspuntos.png" alt=""></a>
        </div>
        <div class="barra_lateral">
            <a href="sucursales.html"><img src="img/logos/ico_localizacion.png" alt=""></a>
        </div>
    </div>

    <!--/#home-slider-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="img/index/oportuno.png" alt="oportuno">
                        </div>
                        <h2 style="color:#29327e">OPORTUNO</h2>
                        <p>Te otorgamos el crédito cuando lo necesitas.</p>
                    </div>
                </div>
                <div class="col-sm-3 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="img/index/accesible.png" alt="accesible">
                        </div>
                        <h2 style="color:#35bddf">ACCESIBLE</h2>
                        <p>Nuestros requisitos son sencillos de obtener</p>
                    </div>
                </div>
                <div class="col-sm-3 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="img/index/rentable.png" alt="rentable">
                        </div>
                        <h2 style="color:#29327e">RENTABLE</h2>
                        <p>Nuestro crédito te apoya para hacer crecer tu negocio</p>
                    </div>
                </div>
                <div class="col-sm-3 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1200ms">
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

    <section id="action" class="responsive" style="background-color:#323534">
        <div class="vertical-center">
             <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="hidden-sm hidden-xs" style="padding-left:2em;color:#ffffff;font-size:34px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></h1>
                        <h1 class="visible-xs visible-sm" style="padding-left:2em;color:red;font-size:24px;"><i><b>Innovando las microfinanzas para tu desarrollo</b></i></h1>                        
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <!-- QUIENES SOMOS -->
    <section id="features">
        <div >
            <div class="row">
                <!--<div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="images/home/image1.png" class="img-responsive" alt="">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>Experienced and Enthusiastic</h2>
                        <P>Pork belly leberkas cow short ribs capicola pork loin. Doner fatback frankfurter jerky meatball pastrami bacon tail sausage. Turkey fatback ball tip, tri-tip tenderloin drumstick salami strip steak.</P>
                    </div>
                </div>-->
                <div class="">
                    <!-- 15_05_2017 <div class="col-sm-6 col-md-offset-1 fadeInLeft text-center" style="padding-left:20em;margin-top:3em;"> -->
                    <div class="col-sm-6 col-md-offset-1 fadeInLeft text-center" style="padding-left:20em;margin-top:3em;">
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
                    <div class="col-sm-5">
                        <img class="img-responsive" src="img/quienes_somos/quienes_somos.png" alt="" style="float:right;margin-top:-150px;">
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!--/#features-->
    <section style="margin-top:4em;">
        <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
            <p><img src="img/nuestros_valores/nuestros_valores.jpg" class="img-responsive" alt=""></p>
        </div>
    </section>
    <section id="clients">
        <div class="container">
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
                    <!--<div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="images/home/client1.png" class="img-responsive" alt=""></a>
                        </div>
                        <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="images/home/client2.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="images/home/client3.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="images/home/client4.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="images/home/client5.png" class="img-responsive" alt=""></a>
                        </div>
                         <div class="col-xs-3 col-sm-2">
                            <a href="#"><img src="images/home/client6.png" class="img-responsive" alt=""></a>
                        </div>
                    </div>-->
              
            </div>
        </div>
     </section>

    <!--/#clients-->



    <section style="background-image: url('img/index/banner_azul.png');background-size:cover; padding-top:5em;border-top: 10px solid #263c89; border-bottom: 10px solid #263c89">
        <div class="container">
            <div class="col-md-6">
                <img src="img/index/tablet.png" alt="">
            </div>
            <div class="col-md-6" style="text-align:justify;color:#ffffff">
                <h1 style="color:#ffffff"><b>SÍGUENOS EN FACEBOOK</b></h1>
                <h2 style="color:#ffffff;font-size:30px;"><b>Más Kapital</b></h2>
                <p style="font-size:20px;">Entérate de todo lo que acontece en nuestra familia MásKapital en nuestra página de Facebook, donde podrás conocer a todos los integrantes de esta gran familia, así como las últimas noticias y todo lo que sea importante para tu crédito.</p>
            </div>
        </div>
    </section>

    <section id="footer_2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-responsive" style="padding-top:1em;padding-bottom:1em" src="img/index/logos/logo_cnbv.jpg" alt="">
                    <img class="img-responsive" style="padding-top:1em;padding-bottom:1em" src="img/index/logos/logo_condusef.jpg" alt="">
                    <img class="img-responsive" style="padding-top:1em;padding-bottom:1em" src="img/index/logos/logo_buro.jpg" alt="">
                </div>
                <div class="col-md-4">
                    <div class="col-xs-12">
                        <h2 style="color: #FFFFFF"><b>CONTACTO</b></h2>    
                    </div>
                    <div class="col-xs-12">
                        <a href="https://www.facebook.com/mas.kapital" target="_new"><img src="img/index/logos/facebook.jpg" alt=""> Más Kapital</a>
                    </div>
                    <div class="col-xs-12">
                        <h2 style="color: #FFFFFF"><b>KAPITEL 01 800 822 06 73</b></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-xs-12">
                        <h2 style="color:#ffffff"><b>NORMATIVIDAD</b></h2>
                        <p style="text-align: justify;">Cónoce nuestro aviso de privacidad, es tu derecho.</p>
                        <p ><a id="aviso-privacidad" href="" data-toggle="modal" data-target="#aviso"><b>AVISO DE PRIVACIDAD</b></a></p>
                        <p style="text-align: justify;">Denuncia cualquier irregularidad, tu reporte es completamente anónimo.</p>
                        <p ><a id="buzon-denuncias" href="" data-toggle="modal" data-target="#buzon"><b>BUZÓN DE DENUNCIAS PLD</b></a></p>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    
    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" >
                    <div class="copyright-text text-center">
                        <p>&copy; Derechos reservados Kapitalmujer S.A de C.V SOFOM ENR</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODAL BUZÓN DE DENUNCIAS PLD -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><b>BUZÓN DE DENUNCIAS PLD</b></h4>
                </div>
                <form action="" method="POST">
	                <div class="modal-body">
	                    <div class="col-xs-12">
	                        <h3><b>Datos Denunciante:</b></h3>
	                        <div class="form-group">
	                            <label for="nombre">Nombre</label>
	                            <input type="text" name="nombre" class="form-control" placeholder="">
	                        </div>                            
	                    </div>
	                    <div class="col-xs-6">
	                        <div class="form-group">
	                            <label for="estado">Ubicación (Estado):</label>
	                            <input type="text" name="estado" class="form-control" placeholder="">
	                        </div>                            
	                    </div>
	                    <div class="col-xs-6">
	                        <div class="form-group">
	                            <label for="telefono">Telefono:</label>
	                            <input type="text" name="telefono" class="form-control" placeholder="">
	                        </div>
	                    </div>

	                    <div class="col-xs-12">
	                        <h3><b>Datos Denuncia:</b></h3>
	                        <div class="form-group">
	                            <label for="denuncia_nombre">Nombre:</label>
	                            <input type="text" name="denuncia_nombre" class="form-control" placeholder="">
	                        </div>                            
	                    </div>
	                    <div class="col-xs-6">
	                        <div class="form-group">
	                            <label for="sucursal">Sucursal:</label>
	                            <input type="text" name="sucursal" class="form-control" placeholder="">
	                        </div>                            
	                    </div>
	                    <div class="col-xs-6">
	                        <div class="form-group">
	                            <label for="otro_departamento">Otro Departamento:</label>
	                            <input type="text" name="otro_departamento" class="form-control" placeholder="">
	                        </div>                            
	                    </div>
	                    <div class="col-xs-12">
	                        <div class="form-group">
	                            <label for="motivo">Motivo:</label>
	                            <input type="text" name="motivo" class="form-control" placeholder="">
	                        </div>                            
	                    </div>
	                    <div class="col-xs-12">
	                        <div class="form-group">
	                            <label for="descripcion">Descripción:</label>
	                            <textarea class="form-control" name="despcripcion" id="" rows="3"></textarea>
	                        </div>
	                    </div>
	                    <div class="col-xs-12">
	                        <div class="g-recaptcha" data-sitekey="6LfhBiIUAAAAAFgntz5Hso60CCY6uRthO4C7Z0UV"></div>    
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <button type="submit" name="enviar_denuncia" value="1" class="btn btn-primary">Enviar Correo</button>
	                </div>
            	</form>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
