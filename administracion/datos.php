<?php
require('../conexion/conexion.php');
/*$estado = $_POST['estado'];

$query = "SELECT * FROM Sucursales WHERE Estado = '$estado'";
$consultar = $mysqli->query($query);

echo "<select class='form-control' name='sucursal'>";
  while($sucursales = $consultar->fetch_assoc()){
    echo "<option value='".$sucursales['idSucursales']."'>".$sucursales['NombreSucursal']."</option>";
  }
echo "</select>";*/
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
                                      echo '<h4 class="panel-title">';
                                          echo '<a href="#'.$sub_accordion.'" data-parent="#'.$accordion.'" data-toggle="collapse" class="accordion-toggle">';
                                              echo $cont.'.- '.$preguntas['pregunta'];
                                          echo '</a>';
                                      echo '</h4>';
                                  echo '</div>';
                                  echo '<div class="panel-collapse collapse" id="'.$sub_accordion.'">';
                                      echo '<div class="panel-body">';
                                        echo $preguntas['respuesta'];
                                      echo '</div>';
                                  echo '</div>';
                              echo '</div>';
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