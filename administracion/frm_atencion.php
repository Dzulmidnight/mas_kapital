<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');

  if(isset($_POST['guardar_sucursal']) && $_POST['guardar_sucursal'] == 1){
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $referencia = $_POST['referencia'];
    $cp = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $img = '';

    $rutaImg = "../img/sucursales/img_sucursal/";

    if(!empty($_FILES['img_sucursal']['name'])){
        $_FILES["img_sucursal"]["name"];
          move_uploaded_file($_FILES["img_sucursal"]["tmp_name"], $rutaImg.$_FILES["img_sucursal"]["name"]);
          $img_sucursal = basename($_FILES["img_sucursal"]["name"]);
    }else{
      $img_sucursal = NULL;
    }

    $sql = "INSERT INTO sucursales (NombreSucursal, Estado, Municipio, Calle, Numero, Referencia, CP, Colonia, Telefono, Email, X, Y, UrlFoto) VALUES ('$nombre', '$estado', '$municipio', '$calle', '$numero', '$referencia', '$cp', '$colonia', '$telefono', '$email', '$x', '$y', '$img_sucursal')";
    $mysqli->query($sql);

  }

  if(isset($_POST['actualizar_sucursal']) && $_POST['actualizar_sucursal'] == 1){
    $idsucursal = $_POST['idsucursal'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $referencia = $_POST['referencia'];
    $cp = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $img = '';

    $rutaImg = "../img/sucursales/img_sucursal/";
    $imagen = "../img/sucursales/img_sucursal/".$_POST['img_actual'];
    if(!empty($_FILES['img_sucursal']['name'])){
        if(file_exists($imagen)){
          unlink($imagen);
        }
        $_FILES["img_sucursal"]["name"];
          move_uploaded_file($_FILES["img_sucursal"]["tmp_name"], $rutaImg.$_FILES["img_sucursal"]["name"]);
          $img_sucursal = basename($_FILES["img_sucursal"]["name"]);
    }else{
      $img_sucursal = $_POST['img_actual'];
    }

    $sql = "UPDATE sucursales SET NombreSucursal = '$nombre', Estado = '$estado', Municipio = '$municipio', Calle = '$calle', Numero = '$numero', Referencia = '$referencia', CP = '$cp', Colonia = '$colonia', Telefono = '$telefono', Email = '$email', X = '$x', Y = '$y', UrlFoto = '$img_sucursal' WHERE idSucursales = '$idsucursal'";

    $mysqli->query($sql);
  }

  if(isset($_POST['eliminar_solicitud'])){
    $idfrm_atencion = $_POST['idfrm_atencion'];

    $sql = "DELETE FROM frm_atencion WHERE idfrm_atencion = $idfrm_atencion";
    $mysqli->query($sql);

  }
  $seccion = 'formularios';
  $menu = 'atencion';
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

    <title>Atención a Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php include('header.php'); ?>
      <!--header end-->
      <!--sidebar start-->
      <?php include('aside.php'); ?>
      <!--sidebar end-->
      <!--main content start-->

      <section id="main-content">
        <section class="wrapper site-min-height">
            <section class="panel">
                <header class="panel-heading">
                    Buzón
                </header>
                  <div class="row">
                    <!-- inicia tabla de solicitud -->
                    <div class="col-md-12">
                      <section class="panel">
                        <div class="panel-body">
                            <div class="adv-table">
                              <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                  <tr>
                                      <th>Fecha</th>
                                      <th>Tema o Motivo</th>
                                      <th>Sucursal</th>
                                      <th>Nombre</th>
                                      <th class="hidden-phone">Estado</th>
                                      <th class="hidden-phone">Teléfono</th>
                                      <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $query = "SELECT frm_atencion.*, sucursales.NombreSucursal FROM frm_atencion LEFT JOIN sucursales ON frm_atencion.sucursal = sucursales.idSucursales";
                                  $consultar = $mysqli->query($query);

                                  while($buzon = $consultar->fetch_assoc()){
                                    if(!empty($buzon['fecha'])){
                                      $fecha = date('d/m/Y', $buzon['fecha']);
                                    }
                                    $nombre = $buzon['nombre'].' '.$buzon['ap_paterno'].' '.$buzon['ap_materno'];
                                    //inicia if
                                    if(!empty($fecha)){
                                    ?>
                                      <tr id="" class="gradeX">
                                        <td><?php echo $fecha; ?></td>
                                        <td><?php echo $buzon['tema_motivo']; ?></td>
                                        <td><?php echo $buzon['NombreSucursal']; ?></td>
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo $buzon['estado']; ?></td>
                                        <td><?php echo $buzon['telefono']; ?></td>
                                        
                                        <td>
                                          <form id="" action="" method="POST">
                                            <input type="hidden" name="idfrm_atencion" value="<?php echo $buzon['idfrm_atencion'] ?>">
                                            <a class="btn btn-xs btn-info" href="detalle_buzon.php?solicitud=<?php echo $buzon['idfrm_atencion']; ?>"><i class="fa fa-file-text"></i> Consultar</a>

                                            <button type="submit" name="eliminar_solicitud" class="btn btn-danger btn-xs" value="<?php echo $solicitud['idSolicitudTrabajo']; ?>" onclick="return confirm('¿Desea eliminar el mensaje ?');"><i class="fa fa-trash-o "></i></button>
                                          </form>
                                          
                                        </td>
                                      </tr>
                                    <?php
                                    }
                                    //termina if
                                  

                                  }
                                   ?>
                                </tbody>
                              </table>
                            </div>                 
                        </div>
               
                      </section>
                    </div>
                    <!-- termina tabla de solicitud -->
                    <!--<div class="col-md-4">
                        <section class="panel">
                            <header class="panel-heading">
                                Datos de la Denuncia
                            </header>

                            <div id="datos_denuncia" class="panel-body">
                              <h4>No se encontraron registros</h4>
                            </div>

                        </section>
                    </div>-->

                  </div>

            </section>          
        </section>

      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->
      <!-- Right Slidebar end -->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
  </section>

    <!-- Modal Agregar Sucursal -->

    <!-- modal -->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

  </body>
</html>
