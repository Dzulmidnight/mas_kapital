<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Normatividad | Más kapital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">


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
                var contenido2 = $("#inicio-normatividad").offset();
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
    $menu = 'normatividad';
    include('header.php');
     ?>
    <div class="container" style="border-top: 10px solid #8787b7;border-bottom:10px solid #263c89;">
    </div>
    <!--/#header-->
    <section id="inicio-normatividad">
        <div class="container" style="background-color: #f0f0f6;margin-bottom:1em;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 style="color: #2a3031;font-size:50px;padding-top:1em;padding-bottom:1em;"><b>NORMATIVIDAD</b></h1>
                </div>
            </div>
        </div>
    </section>

    <section id="home-slider" >
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
                                <img src="img/normatividad/normatividad_1.jpg"  alt="imagen1">
                            </div>
                            <div class="item">
                                <img src="img/normatividad/normatividad_2.jpg" alt="imagen2">
                            </div>
                            <div class="item">
                                <img src="img/normatividad/normatividad_3.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="img/normatividad/normatividad_4.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="img/normatividad/normatividad_5.jpg" alt="imagen3">
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

    <section id="" style="margin-top:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em; color: white;">
                <a href="#cnvb">
                        <div class="div-normatividad col-sm-12">
                            <h2>CNVB</h2>
                        </div>
                    </a>
                    <a href="#condusef">
                        <div class="div-normatividad col-sm-12">
                            <h2>CONDUSEF</h2>
                        </div>
                    </a>
                    <a href="#buro">
                        <div class="div-normatividad col-sm-12">
                            <h2>BURO DE ENTIDADES FINANCIERAS</h2>
                        </div>
                    </a>
                    <a href="">
                        <div class="div-normatividad col-sm-12">
                            <h2>RENOVACIÓN DE REGISTRO</h2>
                        </div>
                    </a>
                    <a href="">
                        <div class="div-normatividad col-sm-12">
                            <h2>OBTENCIÓN DE DICTAMEN TÉCNICO</h2>
                        </div>
                    </a>
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