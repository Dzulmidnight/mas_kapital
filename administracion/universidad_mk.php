<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');
  
  if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
    /*$sec1_img1 = $_POST['sec1_img1'];
    $sec1_img2 = $_POST['sec1_img2'];
    $sec1_img3 = $_POST['sec1_img3'];
    $sec1_img4 = $_POST['sec1_img4'];*/

    $sec1_img1 = 1;
    $sec1_img2 = 2;
    $sec1_img3 = 3;
    $sec1_img4 = 4;


    $sec1_titulo1 = $_POST['sec1_titulo1'];
    $sec1_cont1 = $_POST['sec1_cont1'];
    $sec1_titulo2 = $_POST['sec1_titulo2'];
    $sec1_cont2 = $_POST['sec1_cont2'];
    $sec1_titulo3 = $_POST['sec1_titulo3'];
    $sec1_cont3 = $_POST['sec1_cont3'];
    $sec1_titulo4 = $_POST['sec1_titulo4'];
    $sec1_cont4 = $_POST['sec1_cont4'];

    $sec2_titulo1 = $_POST['sec2_titulo1'];
    $sec2_cont1 = $_POST['sec2_cont1'];
    $sec2_cont2 = $_POST['sec2_cont2'];
    $sec2_cont3 = $_POST['sec2_cont3'];

    $sec3_titulo1 = $_POST['sec3_titulo1'];
    $sec3_cont1 = $_POST['sec3_cont1'];
    $sec3_titulo2 = $_POST['sec3_titulo2'];
    $sec3_cont2 = $_POST['sec3_cont2'];

    $sec4_titulo1 = $_POST['sec4_titulo1'];
    $sec4_sub1 = $_POST['sec4_sub1'];
    $sec4_cont1 = $_POST['sec4_cont1'];
    /*$sec4_img1 = $_POST['sec4_img1'];*/

    $query = "UPDATE pagina1  SET sec1_img1 = '$sec1_img1', sec1_img2 = '$sec1_img2', sec1_img3 = '$sec1_img3', sec1_img4 = '$sec1_img4', sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec1_cont4 = '$sec1_cont4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3', sec3_titulo1 = '$sec3_titulo1', sec3_cont1 = '$sec3_cont1', sec3_titulo2 = '$sec3_titulo2', sec3_cont2 = '$sec3_cont2', sec4_titulo1 = '$sec4_titulo1', sec4_sub1 = '$sec4_sub1', sec4_cont1 = '$sec4_cont1' WHERE idpagina1 = 1";

    //$query = "UPDATE pagina1  SET sec1_img1 = '$sec1_img1', sec1_img2 = '$sec1_img2', sec1_img3 = '$sec1_img3', sec1_img4 = '$sec1_img4', sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec1_cont4 = '$sec1_cont4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3' WHERE idpagina1 = 1";

    //$query = "UPDATE pagina1 SET sec1_titulo1 = '$sec1_titulo1', sec1_cont1 = '$sec1_cont1', sec1_titulo2 = '$sec1_titulo2', sec1_cont2 = '$sec1_cont2', sec1_titulo3 = '$sec1_titulo3', sec1_cont3 = '$sec1_cont3', sec1_titulo4 = '$sec1_titulo4', sec2_titulo1 = '$sec2_titulo1', sec2_cont1 = '$sec2_cont1', sec2_cont2 = '$sec2_cont2', sec2_cont3 = '$sec2_cont3', sec3_titulo1 = '$sec3_titulo1', sec3_cont1 = '$sec3_cont1', sec3_titulo2 = '$sec3_titulo2', sec3_cont2 = '$sec3_cont2', sec4_titulo1 = '$sec4_titulo1', sec4_sub1 = '$sec4_sub1', sec4_cont1 = '$sec4_cont1', sec4_img1 = '$sec4_img1' WHERE idpagina1 = 1 ";
    $insertar = $mysqli->query($query);
  }

  $seccion = 'secciones';
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

  <body >

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
          <section class="">
              <div class="row">
                  <div class="col-lg-12">
                      <!--Pulstate start-->
                      <section class="">
                          <header class="panel-heading">
                            Sección: <span style="color:red">Universidad MK</span>
                          </header>
                          <div class="panel-body">
<form action="" method="POST">
    <div id="" style="position:fixed;z-index: 1;">
      <div class="">
        <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
      </div>
    </div>

    <section>
        <div class="container">
            <div class="row" id="descripcion_universidad" style="padding-bottom:2em;">
                <div class="col-md-12" style="left:25%">
                    <h1 style="color:#fff;font-size:40px;margin-bottom:1em;"><b>¿QUÉ ES LA U+?</b></h1>
                </div>
                <div class="hidden-xs col-md-8 text-justify" style="left:25%;color:#ffffff;font-size:18px;">
                    <p style="margin-bottom:1.5em;">
                        Universidad MásKapital es una plataforma formativa desarrollada por MásKapital para promover la formación de habilidades necesarias para ocupar los puestos que MásKapital oferta en sus diferentes sucursales en el centro y sur de México.
                    </p>
                    <p style="margin-bottom:1.5em;">
                        A través de la Universidad MásKapital, los colaboradores pueden mejorar sus habilidades en el puesto que desempeñan, así como ir formándose para ocupar diferentes puestos que sean de su interés. De esta manera MásKapital promueve el desarrollo de habilidades administrativas en sus colaboradores constantemente.
                    </p>
                    <p>
                        Sabemos que la teoría no lo es todo, es por eso que los programas de la Universidad MásKapital incluyen un entrenamiento en el puesto, a través del cual el colaborador es llevado de la mano para que los conocimientos teóricos que ha adquirido en la plataforma se transformen en una realidad que mejore su ejecución diaria. 
                    </p>
                </div>
                <div class="visible-xs col-xs-12 text-justify" style="color:#ffffff;font-size:18px;">
                    <p >
                        Universidad MásKapital es una plataforma formativa desarrollada por MásKapital para promover la formación de habilidades necesarias para ocupar los puestos que MásKapital oferta en sus diferentes sucursales en el centro y sur de México.
                    </p>
                    <p >
                        A través de la Universidad MásKapital, los colaboradores pueden mejorar sus habilidades en el puesto que desempeñan, así como ir formándose para ocupar diferentes puestos que sean de su interés. De esta manera MásKapital promueve el desarrollo de habilidades administrativas en sus colaboradores constantemente.
                    </p>
                    <p>
                        Sabemos que la teoría no lo es todo, es por eso que los programas de la Universidad MásKapital incluyen un entrenamiento en el puesto, a través del cual el colaborador es llevado de la mano para que los conocimientos teóricos que ha adquirido en la plataforma se transformen en una realidad que mejore su ejecución diaria. 
                    </p>
                </div>

            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="portal_mk">
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="padding-left:1em;padding-right:1em">
                    <div class="col-sm-12" style="background:#f26e23">
                        <h1 style="color:#ffffff;padding-left:1em;"><b>PORTAL</b></h1>
                    </div>
                    <div class="col-sm-12">
                        <h2>Universidad MásKapital</h2>
                    </div>
                    <div class="col-sm-12">
                        <h2>CONTACTO</h2>
                        <img style="width:100%" src="../img/universidad_mk/fb_universidad.png" alt="">
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
                        <img class="img-responsive" src="../img/universidad_mk/logo_universidadmk.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


</form>
      
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
