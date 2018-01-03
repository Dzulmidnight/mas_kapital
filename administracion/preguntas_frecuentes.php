<?php 
    require('../conexion/conexion.php');
    require('../conexion/sesion.php');
  //  require_once('funciones.php');

    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['tipo'] != 'administrador'){
            header('Location: conexion/salir.php');
        }
    }
    if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
      $idfaq = $_POST['idfaq'];
      $pregunta = $_POST['pregunta'];
      $respuesta = $_POST['respuesta'];

      $updateSQL = "UPDATE faq SET pregunta = '$pregunta', respuesta = '$respuesta' WHERE idfaq = $idfaq";
      $actualizar = $mysqli->query($updateSQL);
    }
    if(isset($_POST['eliminar_pregunta'])){
      $idpregunta = $_POST['eliminar_pregunta'];
      $query = "DELETE FROM faq WHERE idfaq = $idpregunta";
      $eliminar = $mysqli->query($query);

      //echo '<script>alert("Se ha eliminado la pregunta.");</script>';
    }
  $seccion = 'informacion';
  $menu = 'faq';

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

    <title>FAQ</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
      <?php include('header.php'); ?>      <!--header end-->
      <!--sidebar start-->
      <?php include('aside.php'); ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row" id="id_preguntas">
                <div class="col-md-9">
                  <div class="tab-content">
                    <?php 
                    $query = "SELECT * FROM secciones_faq";
                    $ejecutar1 = $mysqli->query($query);
                    $num_registro = $ejecutar1->num_rows;

                    if($num_registro != 0){
                      while($secciones = $ejecutar1->fetch_assoc()){
                        $tab = 'tab_'.$secciones['id_seccion'];
                        $accordion = 'accordion'.$secciones['id_seccion'];

                        echo '<div class="tab-pane active" id="tab_'.$secciones['id_seccion'].'">';
                          echo '<div class="panel-group" id="'.$accordion.'">';
                            //echo $tab;
                            //echo '<br>'.$accordion;
                            $sql = "SELECT * FROM faq WHERE seccion = '$secciones[id_seccion]'";
                            //echo '<br>'.$sql;
                            $ejecutar2 = $mysqli->query($sql);
                            $cont = 1;
                            while($preguntas = $ejecutar2->fetch_assoc()){

                              $sub_accordion = 'accordion'.$secciones['id_seccion'].'_'.$preguntas['idfaq'];
                              
                                echo '<div class="panel panel-success">';
                                    echo '<div class="panel-heading">';
                                        echo '<form action="" method="POST">';
                                          echo '<h4 class="panel-title">';
                                          ?>

                                    <button type="submit" name="eliminar_pregunta" class="btn btn-danger btn-xs" value="<?php echo $preguntas['idfaq']; ?>" onclick="return confirm('¿Desea eliminar la pregunta ?');"><i class="fa fa-trash-o "></i></button>

                                    <button type="button" name="editar_pregunta" class="btn btn-info btn-xs" data-toggle="modal" href="<?php echo '#modalEditar'.$preguntas['idfaq']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                  
                                          <?php
                                              echo '<a href="#'.$sub_accordion.'" data-parent="#'.$accordion.'" data-toggle="collapse" class="accordion-toggle">';
                                                  echo $cont.'.- '.$preguntas['pregunta'];
                                              echo '</a>';
                                          echo '</h4>';
                                        echo '</form>';
                                    echo '</div>';
                                    echo '<div class="panel-collapse collapse" id="'.$sub_accordion.'">';
                                        echo '<div class="panel-body">';
                                          echo $preguntas['respuesta'];
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                              ?>
                              <!-- Modal Editar pregunta -->
                              <div class="modal fade" id="<?php echo 'modalEditar'.$preguntas['idfaq']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <form action="" id="editar_pregunta" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><b>Editar Pregunta</b></h4>
                                            </div>
                                            <div class="modal-body">
                                              <!-- page start-->
                                              <div class="row">
                                                <input type="hidden" name="idfaq" value="<?php echo $preguntas['idfaq']; ?>">
                                                <input type="hidden" class="form-control" name="pregunta" value="<?php echo $preguntas['pregunta']; ?>">
                                                <br>
                                                <textarea class="form-control" name="respuesta" id="" rows="5" ><?php echo $preguntas['respuesta']; ?></textarea>
                                              </div>
                                              <!-- page end-->
                                            </div>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                                                <button class="btn btn-success" type="submit" id="" name="guardar_cambios" value="1"> Guardar Cambios</button>
                                            </div>              
                                        </form>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <?php
                            
                              $cont++;
                            }

                          echo '</div>';
                        echo '</div>';
                      }
                    }else{
                      echo '
                      <div class="panel panel-danger">
                          <div class="panel-heading">
                              <h4 class="panel-title text-center">
                                  No se encontraron registros.
                              </h4>
                          </div>
                      </div>
                      ';  
                    }


                     ?>

                  </div>
                </div>
                <div class="col-md-3">
                    <ul class="vertical-menu">
                        <?php 
                        $query = "SELECT * FROM secciones_faq";
                        $ejecutar3 = $mysqli->query($query);
                        $num_reg = $ejecutar3->num_rows;

                        if($num_reg != 0){
                          while($secciones = $ejecutar3->fetch_assoc()){
                            $tab = 'tab_'.$secciones['id_seccion'];
                          ?>
                            <li>
                                <a href="<?php echo '#tab_'.$secciones['id_seccion']; ?>" data-toggle="tab">
                                    <i class="fa fa-bullhorn"></i>
                                    <?php echo $secciones['nombre']; ?>
                                </a>
                            </li>
                          <?php
                          }
                        }
                         ?>
                        <li>
                          <a data-toggle="modal" href="#modalPreguntas"><i class="fa fa-plus"></i> Agregar Pregunta</a>
                        </li>
                    </ul>
                </div>

              </div>
              <!-- page end-->
          </section>
      </section>

    <!-- Modal Agregar pregunta -->
    <div class="modal fade" id="modalPreguntas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form action="" id="frm-preguntas" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><b>Formulario Preguntas</b></h4>
                  </div>
                  <div class="modal-body">
                    <!-- page start-->
                    <div class="row">
                      <div id="resp_id">
                      </div>
                      <div class="col-lg-12">
                        <table class="table table-bordered">
                          <tr>
                            <td>Sección Existente</td>
                            <td>
                              <select class="form-control" name="seccion_actual" id="select_seccion" required>
                                <?php 
                                $query = "SELECT * FROM secciones_faq";
                                $ejecutar4 = $mysqli->query($query);
                                while($secciones = $ejecutar4->fetch_assoc()){
                                  echo '<option value="'.$secciones['id_seccion'].'">'.$secciones['nombre'].'</option>';
                                }
                                ?>
                              </select>           
                            </td>
                            <td>
                              <button type="button" id="btn-seccion" class="btn btn-info">Agregar sección</button>
                            </td>
                            <td>
                              <input type="text" class="form-control" name="nueva_seccion" id="" placeholder="Nueva Sección" onblur="ponerMayusculas(this)">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <h5><b>Pregunta</b></h5>
                              <input type="text" class="form-control" name="pregunta" placeholder="Pregunta" required>
                            </td>
                            <td colspan="2">
                              <h5><b>Respuesta</b></h5>
                              <textarea class="form-control" name="respuesta" id="" rows="3" placeholder="Respuesta" required></textarea>
                            </td>
                          </tr>
                        </table>
                      </div>

                    </div>
                    <!-- page end-->
                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                      <button class="btn btn-success" type="button" id="btn-pregunta" name="guardar_pregunta" value=""> Guardar Pregunta</button>
                  </div>              
              </form>
            </div>
        </div>
    </div>
    <!-- modal -->

      <!--main content end-->
      <!-- Right Slidebar start -->

      <!-- Right Slidebar end -->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  <script>
      function ponerMayusculas(nombre) 
      { 
          nombre.value=nombre.value.toUpperCase(); 
      } 

    //var x = '#btn-editar'+n;
    $(document).on('ready',function(){

      $('#btn-pregunta').click(function(){
        var url = 'datos.php';                                   

        $.ajax({                        
           type: 'POST',                 
           url: url,                    
           data: $('#frm-preguntas').serialize(),
           success: function(data)           
           {
             $('#id_preguntas').html(data);          
           }
         });
      });
    });

    $(document).on('ready',function(){

      $('#btn-seccion').click(function(){
        var url = 'datos2.php';                                   

        $.ajax({                        
           type: 'POST',                 
           url: url,                    
           data: $('#frm-preguntas').serialize(),
           success: function(data)           
           {
             $('#select_seccion').html(data);          
           }
         });
      });
    });
    $(document).ready(function() {
      $("#btn-pregunta").click(function() {
        $('#modalPreguntas').modal('hide');
      });
    });


  </script>

  </body>
</html>
