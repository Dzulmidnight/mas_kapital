<?php
require('../conexion/conexion.php');
require_once('funciones.php');

if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['tipo'] != 'administrador'){
        header('Location: conexion/salir.php');
    }
}
if(isset($_POST['guardar_cambios']) && $_POST['guardar_cambios'] == 1){
  $idfaq = $_POST['idfaq'];
  $pregunta = $_POST['pregunta'];
  $respuesta = $_POST['respuesta'];

  $updateSQL = sprintf("UPDATE faq SET pregunta = %s, respuesta = %s WHERE idfaq = %s",
    GetSQLValueString($pregunta, "text"),
    GetSQLValueString($respuesta, "text"),
    GetSQLValueString($idfaq, "int"));
  $actualizar = $mysqli->query($updateSQL);
}
if(isset($_POST['eliminar_pregunta'])){
  $idpregunta = $_POST['eliminar_pregunta'];
  $query = "DELETE FROM faq WHERE idfaq = $idpregunta";
  $eliminar = $mysqli->query($query);

  //echo '<script>alert("Se ha eliminado la pregunta.");</script>';
}
    
$seccion = $_POST['seccion_actual'];
$pregunta = $_POST['pregunta'];
$respuesta = $_POST['respuesta'];
$idseccion = '';



$query = "INSERT INTO faq (pregunta, respuesta, seccion) VALUES ('$pregunta', '$respuesta', '$seccion')";
$insertar = $mysqli->query($query);

?>

<!--<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Se ha agregado una nueva pregunta.</strong>
</div>-->
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
                                                <input type="text" name="idfaq" value="<?php echo $preguntas['idfaq']; ?>">
                                                <input type="text" class="form-control" name="pregunta" value="<?php echo $preguntas['pregunta']; ?>">
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