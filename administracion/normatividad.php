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
  $menu = 'normatividad';
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

  <body>

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
                            Sección: <span style="color:red">Normatividad</span>
                          </header>
                          <div class="panel-body">
<form action="" method="POST">
    <div id="" style="position:fixed;z-index: 1;">
      <div class="">
        <button class="btn btn-danger" type="submit" name="guardar_cambios" value="1"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> <b>Guardar Cambios</b></button> 
      </div>
    </div>


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
                                <img src="../img/normatividad/normatividad_1.jpg"  alt="imagen1">
                                  <input type="file">
                            </div>
                            <div class="item">
                                <img src="../img/normatividad/normatividad_2.jpg" alt="imagen2">
                            </div>
                            <div class="item">
                                <img src="../img/normatividad/normatividad_3.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="../img/normatividad/normatividad_4.jpg" alt="imagen3">
                            </div>
                            <div class="item">
                                <img src="../img/normatividad/normatividad_5.jpg" alt="imagen3">
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

    </section>


    <!--/#home-slider-->

    <section id="" style="margin-top:4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em; color: white;">
                <a href="#cnvb">
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:white">CNVB</h2>
                        </div>
                    </a>
                    <a href="#condusef">
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:white">CONDUSEF</h2>
                        </div>
                    </a>
                    <a href="#buro">
                        <div class="div-normatividad col-sm-12">
                            <h2 style="color:white">BURO DE ENTIDADES FINANCIERAS</h2>
                        </div>
                    </a>
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
