<?php 
  require('../conexion/conexion.php');
  require('../conexion/sesion.php');

  if(isset($_POST['guarda_vacante']) && $_POST['guarda_vacante'] == 1){
    $puesto = $_POST['puesto'];
    $idsucursal = $_POST['sucursal'];
    $salario = $_POST['salario'];
    $jornada = $_POST['jornada'];
    $contrato = $_POST['contrato'];
    $estatus = 1; // se activa la vacante
    $num_vacantes = $_POST['num_vacantes'];
    $requisitos = $_POST['requisitos'];
    $ofrecemos = $_POST['ofrecemos'];

    $query = "INSERT INTO vacantes (Puesto, idSucursales, Salario, Jornada, Contrato, num_vacantes, estatus) VALUES ('$puesto', '$idsucursal', '$salario', '$jornada', '$contrato', '$num_vacantes', '$estatus')";

    $mysqli->query($query);
    $idvacante = $mysqli->insert_id;

    $query = "INSERT INTO requisitos (idVacantes, Requisito, Ofrecemos) VALUES ($idvacante, '$requisitos', '$ofrecemos')";
    $mysqli->query($query);

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

  if(isset($_POST['eliminar_vacante'])){
    $idvacante = $_POST['eliminar_vacante'];
    //eliminamos primero los requisitos
  
    //eliminamos la vacante
    $sql = "DELETE FROM vacantes WHERE idVacantes = '$idvacante'";
    $mysqli->query($sql);
    echo "<script>alert('Vacante eliminada');</script>";
  }

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

    <title>Información Vacantes</title>

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


          <section class="wrapper">

              <div class="row">
                <div class="col-sm-12">
                  <section class="panel">
                    <header class="panel-heading">
                        Vacantes Registradas
                         <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>

                         </span>
                    </header>
                    <div class="panel-body">
                      <div class="clearfix">
                        <div class="btn-group">
                          <button id="" class="btn btn-default" data-toggle="modal" href="#modalSucursal">
                            Nuevo Registro <i class="fa fa-plus"></i>
                          </button>
                          <!--<a class="btn btn-warning" data-toggle="modal" href="#modalSucursal">
                            Large
                          </a>-->
                        </div>
                      </div>
                      <div id="mensaje" class="col-lg-12">
                      
                      </div>
                      <div class="adv-table">
                        
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                          <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Sucursal</th>
                                <th>Puesto</th>
                                <th>Num. Vacantes</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $query = "SELECT vacantes.*, Sucursales.Estado, Sucursales.NombreSucursal, requisitos.* FROM vacantes INNER JOIN Sucursales ON vacantes.idSucursales = Sucursales.idSucursales INNER JOIN requisitos ON vacantes.idVacantes = requisitos.idVacantes";
                            $consultar = $mysqli->query($query);

                            while($vacantes = $consultar->fetch_assoc()){
                            ?>
                              <tr class="gradeX">
                                <td><?php echo $vacantes['Estado']; ?></td>
                                <td><?php echo $vacantes['NombreSucursal']; ?></td>
                                <td><?php echo $vacantes['Puesto']; ?></td>
                                <td><?php echo $vacantes['num_vacantes']; ?></td>
                                <td><?php echo $vacantes['estatus']; ?></td>
                                
                                <td>
                                  <form id="frm_acciones" action="" method="POST">
                                    <button id="" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="<?php echo '#modalEditarVacante'.$vacantes['idVacantes']; ?>"><i class="fa fa-pencil"></i></button>
                                    <button type="submit" id="btn-eliminar" name="eliminar_vacante" class="btn btn-danger btn-xs" value="<?php echo $vacantes['idVacantes']; ?>" ><i class="fa fa-trash-o "></i></button>
                                  </form>
                                  
                                </td>
                              </tr>
                                <!-- Modal Editar Sucursal -->
                                <div class="modal fade" id="<?php echo 'modalEditarVacante'.$vacantes['idVacantes']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                          <form action="" method="POST" enctype="multipart/form-data">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title"><b>Editar Vacante: <span style="color:#2c3e50"><?php echo $vacantes['Puesto']; ?></span></b></h4>
                                              </div>
                                              <div class="modal-body">
                                                <!-- page start-->
                                                <div class="row">
                                                  <aside class="profile-info col-lg-12">
                                                      <section class="panel">
                                                          <div class="panel-body bio-graph-info">
                                                              <form class="form-horizontal" role="form">
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Estado</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="nombre" value="<?php echo $vacantes['Estado']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Nombre Sucursal</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="estado" value="<?php echo $vacantes['NombreSucursal']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Puesto</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="municipio" value="<?php echo $vacantes['Puesto']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Contrato</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="colonia" value="<?php echo $vacantes['Contrato']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Salario</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="cp" value="<?php echo $vacantes['Salario']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Jornada</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="calle" value="<?php echo $vacantes['Jornada']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Requisitos</label>
                                                                        <div class="col-lg-6">
                                                                            <textarea name="referencia" class="form-control" rows="2"><?php echo $vacantes['Requisito']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Ofrecemos</label>
                                                                        <div class="col-lg-6">
                                                                            <textarea name="referencia" class="form-control" rows="2"><?php echo $vacantes['Ofrecemos']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-lg-6 control-label">Número de Vacantes</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="text" class="form-control" name="calle" value="<?php echo $vacantes['num_vacantes']; ?>" placeholder=" ">
                                                                        </div>
                                                                    </div>
                                                              </form>
                                                          </div>
                                                      </section>
                                                  </aside>
                                                </div>
                                                <!-- page end-->
                                              </div>
                                              <div class="modal-footer">
                                                <input type="hidden" name="idsucursal" value="<?php echo $registros['idSucursales']; ?>">
                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                                                  <button class="btn btn-success" type="submit" name="actualizar_sucursal" value="1"> Actualizar Información</button>
                                              </div>              
                                          </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Termina Modal Editar -->

                            <?php
                            }
                             ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
              <!-- page end-->
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
    <div class="modal fade" id="modalSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form action="" id="frm-vacantes" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><b>Formulario Vacantes </b></h4>
                  </div>
                  <div class="modal-body">
                    <!-- page start-->
                    <div class="row">

                        <aside class="profile-info col-lg-12">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                  <table class="table table-bordered table-striped">
                                    <tr class="text-center">
                                      <td>Estado</td>
                                      <td>Nombre Sucursal</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <?php 
                                        $query = "SELECT Estado FROM Sucursales GROUP BY Estado";
                                        $consultar = $mysqli->query($query);
                                        ?>
                                          <select class="form-control" name="estado" id="sucursal_estado" required>
                                            <option value="">Selecciona un Estado</option>
                                            <?php 
                                            while($estados = $consultar->fetch_assoc()){
                                              echo "<option values='".$estados['Estado']."'>".$estados['Estado']."</option>";
                                            }
                                            ?>
                                          </select>
                                      </td>
                                      <td id="respuesta">
                                      </td>
                                    </tr>

                                    <tr class="text-center">
                                      <td>Puesto</td>
                                      <td>Contrato</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <input type="text" class="form-control" name="puesto" placeholder="Puesto" onBlur="ponerMayusculas(this)" required>
                                      </td>
                                      <td>
                                        <input type="text" class="form-control" name="contrato" placeholder="Contrato">
                                      </td>
                                    </tr>
                                    <tr class="text-center">
                                      <td>Salario</td>
                                      <td>Jornada</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <input type="text" class="form-control" name="salario" placeholder="Salario">
                                      </td>
                                      <td>
                                        <input type="text" class="form-control" name="jornada" placeholder="Jornada">
                                      </td>
                                    </tr>

                                    <tr class="text-center">
                                      <td>Requisitos</td>
                                      <td>Ofrecemos</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <textarea name="requisitos" id="" class="form-control" rows="2"></textarea>
                                      </td>
                                      <td>
                                        <textarea name="ofrecemos" id="" class="form-control" rows="2"></textarea>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="modal-header"><h5>Número de Vacantes</h5></td>
                                      <td><input type="number" class="form-control" name="num_vacantes" value="1" placeholder="Ej: 5"></td>
                                    </tr>

                                  </table>
                                </div>
                            </section>
                        </aside>
                    </div>
                    <!-- page end-->
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                      <button class="btn btn-success" type="submit" name="guarda_vacante" value="1"> Guardar Sucursal</button>
                  </div>              
              </form>
            </div>
        </div>
    </div>
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
      function ponerMayusculas(nombre) 
      { 
          nombre.value=nombre.value.toUpperCase(); 
      } 
      //var x = '#btn-editar'+n;
      $(document).on('ready',function(){

        $('#sucursal_estado').change(function(){
          var url = 'datos.php';                                   

          $.ajax({                        
             type: 'POST',                 
             url: url,                    
             data: $('#frm-vacantes').serialize(),
             success: function(data)           
             {
               $('#respuesta').html(data);          
             }
           });
        });
      });




    </script>
  

  </body>
</html>
