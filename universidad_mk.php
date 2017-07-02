<?php 
    include('conexion/conexion.php');
    $idpagina = 4; //id de la pagina mas flexible
    //consultamos la pagina4 = masflexible
    $query = "SELECT * FROM pagina4 WHERE idpagina4 = $idpagina";
    $consultar = $mysqli->query($query);
    $contenido = $consultar->fetch_assoc();
 ?>
<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Universidad | Más kapital</title>
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
                var contenido2 = $("#descripcion_universidad").offset();
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<?php
    $menu = 'universidad';
    include('header.php');
     ?>

    <!--/#header-->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style='border-top:10px solid #263c89;border-bottom: 10px solid #8787b7;'>
            </div>
        </div>
    </div>
    

    <section id="">
        <div class="container">
            <div class="row" style="background-color: #f0f0f6;padding-top:3em;margin-bottom:1em;">
                <div class="col-md-12 text-center">
                    <img src="img/universidad_mk/logo_universidadmk.png" alt="">
                </div>
                <div class="col-md-12 text-center">
                    <h1 style="color: #2a3031;font-size:50px"><b>UNIVERSIDAD MÁSKAPITAL</b></h1>
                </div>
            </div>
        </div>
    </section>

    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?> 
    <!--/#home-slider-->
    <!-- INICIA TITULO -->
    <section>
        <div class="container">
            <div class="row" id="descripcion_universidad" style="padding-bottom:2em;">
                <div class="col-md-12" style="left:25%">
                    <h1 style="color:#fff;font-size:40px;margin-bottom:1em;"><b><?php echo $contenido['titulo1']; ?></b></h1>
                </div>
                <div class="hidden-xs col-md-8 text-justify" style="left:25%;color:#ffffff;font-size:18px;">
                    <p style="margin-bottom:1.5em;">
                        <?php echo nl2br($contenido['contenido1']); ?>
                    </p>
                </div>
                <div class="visible-xs col-xs-12 text-justify" style="color:#ffffff;font-size:18px;">
                    <p >
                        <?php echo nl2br($contenido['contenido1']); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- TERMINA TITULO -->
    <!--/#services-->

    <!-- INICIA SECCION 2 (sec2) -->
    <section id="portal_mk">
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="padding-left:1em;padding-right:1em">
                    <div class="col-sm-12" style="background:#f26e23">
                        <h1 style="color:#ffffff;padding-left:1em;"><b>PORTAL</b></h1>
                    </div>
                    <div class="col-sm-12">
                        <h2><a href="https://www.facebook.com/mas.kapital?hc_ref=NEWSFEED">Universidad MásKapital</a></h2>
                    </div>
                    <div class="col-sm-12">
                        <h2>CONTACTO</h2>
                        <div class="fb-page" data-href="https://www.facebook.com/Universidad-M&#xe1;skapital-148934088773593/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Universidad-M&#xe1;skapital-148934088773593/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Universidad-M&#xe1;skapital-148934088773593/">Universidad Máskapital</a></blockquote></div>

                        <!--<img style="width:100%" src="img/universidad_mk/fb_universidad.png" alt="">-->
                    </div>
                    <div class="col-sm-12" style="font-size:16px;color: #858789">
                        <p>
                            Tel: (01 951)50 2 25 00 ext 3005
                            <br>
                            capacitacion@maskapital.com.mx
                            <br>
                            Facebook: <a href="https://www.facebook.com/Universidad-M%C3%A1skapital-148934088773593/" target="_new">Universidad Máskapital</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <!--<div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v4Z0qYXmtUw" frameborder="0" allowfullscreen></iframe>
                    </div>-->
                    <div class="col-md-12">
                        <img style="width:100%" src="img/universidad_mk/video_universidad.png" alt="">
                    </div>  
                    <div class="col-md-10 text-justify">
                        <h1 style="color:#2a3031"><b>LOGOTIPO U+</b></h1>
                        <p style="color:#858789;font-size:16px;">
                            La U en U+ obviamente es por el carácter Universitario que planteamos. Lejos de buscar impresionar o adjudicarnos un título en apariencia importante.
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            La U simboliza la búsqueda de lo Universal. Un proyecto en donde quepan todos los que de una u otra manera construimos día a día a MásKapital. 
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            Un proyecto que permita aprender de nosotros mismos. Unidos desarrollamos y mejoramos continuamente nuestros métodos y formas. 
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            El + en U+  reconoce la inconfundible filosofía de MásKapital. La incansable búsqueda del punto de toque. 
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            El + en U+ evidencia nuestro origen como parte de MásKapital. Asimismo ensalta la intención de irradiar positivamente con nuestras acciones, a todos los colaboradores de MásKapital. Sabemos que hay errores, la misma cultura de MásKapital reconoce la existencia de la incertidumbre en todos los procesos, sin embargo, pensar y actuar en positivo también implica reconocer los errores como primer paso para la mejora.
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            La posición del + como un superíndice de la U simboliza el empuje que cualquier nuevo conocimiento tiene en aquella persona que se atreve a adquirirlo. Esto le llamamos potenciar el talento. Para potenciar el talento es obligado entender las capacidades de cada uno. No por indicación de otros sino por iniciativa propia. 
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            El superíndice refleja que nuestros esfuerzos buscan fomentar el espíritu investigador, el autoaprendizaje en cada uno como medio para la mejora individual que detona el enriquecimiento colectivo.
                        </p>
                        <p style="color:#858789;font-size:16px;">
                            Estamos convencidos que todos tienen todo el conocimiento que requieren en sus actividades diarias, incluso de las tareas que nunca han ejecutado, solo hace falta ponerles las condiciones adecuadas para que cada colaborador redescubra lo que ya sabe. Para que detonen exponencialmente su talento. Esas condiciones son las que U+ persigue y promueve en el actuar diario.
                        </p>
                        <p style="color:#858789;font-size:16px;margin-top:2em;">
                            Bienvenidos a la Universidad MásKapital.
                        </p>
                    </div>
                    <div class="col-md-2">
                        <img class="img-responsive" src="img/universidad_mk/logo_universidadmk.png" alt="">
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