<?php 
include('conexion/conexion.php');
$idpagina = 2; // 2 = NORMATIVIDAD
 ?>
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
                        <?php 
                        $query_slide = "SELECT * FROM slide WHERE pagina = $idpagina";
                        $consultar = $mysqli->query($query_slide);
                        $query_slide2 = "SELECT * FROM slide WHERE pagina = $idpagina ORDER BY idslide DESC";
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

    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?> 
    <!--/#home-slider-->

    <section id="" style="margin-top:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em; color: white;">
                    <?php 
                    $query = "SELECT * FROM contenido WHERE pagina = $idpagina";
                    $consultar = $mysqli->query($query);

                    while($contenido = $consultar->fetch_assoc()){
                    ?>
                    <a href="<?php echo '#'.$contenido['idcontenido']; ?>">
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:white"><?php echo $contenido['titulo']; ?></h2>
                        </div>
                    </a>
                    <?php
                    }
                     ?>
                    <a href="">
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:white;">RENOVACIÓN DE REGISTRO</h2>
                        </div>
                    </a>
                    <a href="">
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:white">OBTENCIÓN DE DICTAMEN TÉCNICO</h2>
                        </div>
                    </a>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="text-justify scroll col-md-12">
                        <?php 
                        $query_2 = "SELECT * FROM contenido WHERE pagina = $idpagina";
                        $consultar_2 = $mysqli->query($query_2);

                        while($detalle = $consultar_2->fetch_assoc()){
                        ?>
                            <div id="<?php echo $detalle['idcontenido']; ?>">
                                <h2 style="margin-top:3em;margin-bottom:2em;color:#2a3031;"><b><?php echo $detalle['titulo']; ?></b></h2>
                                <p style="font-size:18px;">
                                <?php echo $detalle['contenido']; ?>
                                </p>
                            </div>
                        <?php
                        }
                         ?>
                        

                    </div>
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