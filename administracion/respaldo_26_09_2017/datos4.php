<?php
require('../conexion/conexion.php');
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$pagina = 2; // 2 = pagina de normatividad

$query = "INSERT INTO contenido (titulo, contenido, pagina) VALUES ('$titulo', '$contenido', '$pagina')";
$insertar = $mysqli->query($query);


$query_titulo = "SELECT idcontenido, titulo FROM contenido WHERE pagina = $pagina";
$consultar_titulo = $mysqli->query($query_titulo);

$query_contenido = "SELECT * FROM contenido WHERE pagina = $pagina";
$consultar_contenido = $mysqli->query($query_contenido);

?>

<div class="row">
    <div class="col-md-4 col-xs-12 sub_menu" style="padding:1em;">
        <?php 
        while($titulo = $consultar_titulo->fetch_assoc()){
        ?>
                      <form action="" method="POST">
                          <div class="div-normatividad col-sm-12">
                              <h2 style="color:black"><input type="text" class="form-control" name="" value="<?php echo $titulo['titulo']; ?>"></h2>
                              <a href="<?php echo '#'.$titulo['idcontenido']; ?>"><span class="label label-primary">Consultar</span></a>
<button class="btn btn-danger btn-xs" type="submit" class="" name="eliminar_contenido" value="<?php echo $titulo['idcontenido']; ?>" onclick="return confirm('¿Desea eliminar el contenido?');">Eliminar</button>

                          </div>                        
                      </form>
        <?php
        }
         ?>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="text-justify scroll col-md-12">
            <?php 
            while($contenido = $consultar_contenido->fetch_assoc()){
            ?>
                <div id="<?php echo $contenido['idcontenido']; ?>">
                    <h2 style="margin-top:3em;margin-bottom:2em;color:#2a3031;"><b><?php echo $contenido['titulo']; ?></b></h2>
                    <p style="font-size:18px;">
                        <?php echo nl2br($contenido['contenido']); ?>
                    </p>
                </div>
            <?php
            }
             ?>
        </div>
    </div>
</div>