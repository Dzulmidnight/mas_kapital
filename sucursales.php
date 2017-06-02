<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sucursales | Más kapital</title>
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
                var contenido2 = $("#sucursales").offset();
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
    $menu = 'sucursales';
    include('header.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style='border-top:10px solid #263c89;border-bottom: 10px solid #8787b7;'>
            </div>
        </div>
    </div>
    
    <!--/#header-->
    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?> 


    <section id="sucursales" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" style="background-color: #f0f0f6;padding-top:3em;margin-bottom:1em;">
                    <h1 style="color: #2a3031;font-size:50px;padding-bottom:1em;"><b>SUCURSALES</b></h1>
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>



    <!--/#home-slider-->
    <!--<section id="atencion" style="background-image: url('img/atencion_clientes/banner_atencion.png');background-repeat:no-repeat; padding-top:5em;">-->
    <section>
        <div class="container">
            <div class="row">
                <form action="" method="POST">
                    <div class="col-md-12">
                        <select class="form-control"  name="nombre_sucursal" id="">
                            <option value="">¿Sábes el nombre de tu sucursal?</option>
                        </select>
                    </div>
                    <div class="col-md-9" style="font-size:16px;">
                        <h2>Selecciona el Estado</h2>
                        <div class="row">
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Oaxaca</button>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Morelos</button>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Edo. de México</button>
                            </div>    
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Tlaxcala</button>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Cd. de México</button>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Puebla</button>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Guerrero</button>
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <button class="btn-sucursal">Veracruz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3 style="margin-top:3.1em;color: #263c89;"><a class="vinculo" href=""><img src="img/sucursales/logo_facebook.png" alt=""></a> <b>Más Kapital</b></h3>
                        <h3 style="color: #263c89;"><b>KAPITEL 01 800 822 06 73</b></h3>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section style="margin-top:2em">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <img style="width:100%" src="img/sucursales/mapa.png" alt="">
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2><b>Información</b></h2>
                        </div>
                        <div class="col-sm-12">
                            <img class="img-responsive" src="img/sucursales/img_sucursal/atlixco.jpg" alt="">
                            <p><b>Atlixco</b></p>
                            <p>
                                Calle 10 Oriente No. 26, int 105.<br>
                                Col. Centro, Atlixco, Puebla.</br>
                                C.P. 74200</br>
                                Tel: (01 244) 446 58 35<br>
                                GERSUC035@maskapital.com.mx
                            </p>
                        </div>                    
                    </div>
                </div>
                <div class="col-md-12 text-justify" style="margin-top:3em;color:#858789;">
                    <div class="row">
                        <div class="col-sm-3">
                            <p>
                                <b>Atlixco</b>
                            </p>
                            <p>
    Calle 10 Oriente No. 26, int.105, Col. Centro, Atlixco, Puebla, C.P. 74200. <br>
    Tel: (01 244) 446 58 35<br>
    GERSUC031@maskapital.com.mx
                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <b>Tepeaca</b>
                            </p>
                            <p>
    Maximino Ávila Camacho No. 504, Barrio el Santuario, Tepeaca, Puebla. C.P. 75200<br>
    Tel: (01 223) 275 34 41<br>
    GERSUC007@maskapital.com.mx
                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <b>Tecamachalco</b>
                            </p>
                            <p>
    Calle 3 Sur No. 503, local 8, Tecamachalco, Puebla, C.P. 75487.<br>
    Tel: (01 249) 422 65 34 <br>
    GERSUC006@maskapital.com.mx

                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <b>San Martín Texmelucan</b>
                            </p>
                            <p>
    Lic. Bernardo P. Angulo No. 608, Int. 10 y 11, Col. Centro, San Martín Texmelucan, Puebla, C.P. 74000.<br>
    Tel: (01 248) 484 65 03<br>
    GERSUC027@maskapital.com.mx
                            </p>
                        </div>

                        <div class="col-sm-3">
                            <p>
                                <b>Puebla</b>
                            </p>
                            <p>
    Circuito Interior Juan Pablo II No. 508, local A, Col. Residencial Boulevares Puebla, Puebla, C.P. 72440.<br>
    Tel: (01 222) 211 01 03<br>
    GERSUC011@maskapital.com.mx
                            </p>
                        </div>

                        <div class="col-sm-3">
                            <p>
                                <b>Teziutlán</b>
                            </p>
                            <p>
    Cuauhtémoc No. 1001, locales 1 y 2, Col. Centro, Teziutlán, Puebla, C.P. 73800<br>
    Tel: (01 231) 313 58 70<br>
    GERSUC021@maskapital.com.mx
                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <b>Tehuacán</b>
                            </p>
                            <p>
    Independencia Poniente No. 214, local A, Col. Zaragoza, Tehuacán, Puebla, C.P. 75770.<br>
    Tel: (01 238) 382 68 68<br>
    GERSUC004@maskapital.com.mx
                            </p>
                        </div>
                        <div class="col-sm-3">
                            <p>
                                <b>Zacapoaxtla</b>
                            </p>
                            <p>
    Alonso Luque No. 2, Int. 5  y 6, Col. Centro, Zacapoaxtla, Puebla, C.P. 73680.<br>
    Tel: (01 233) 314 31 20<br>
    GERSUC042@maskapital.com.mx
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
