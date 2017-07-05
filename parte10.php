<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
</div>
<div class="modal-body">
    <div class="row" id="">
    <form action="sqls.php" method="POST" id="form1">
        <div class="col-xs-12">
            <h3>Gracias por querer formar parte de nosotros <br>¡SU SOLICITUD AH SIDO ENVIADA CON EXITO!</h3> <?php 
  foreach ($_POST as $key => $value) {
    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
  }
?>   
        </div>
    </form> 
</div>
<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>