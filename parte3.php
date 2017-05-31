<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
</div>
<div class="modal-body">
    <div class="row" id="">
<form action="sqls.php" method="POST" id="form1">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <tr>
                <td colspan="3" class="info text-center">ESTADO DE SALUD Y HÁBITOS PERSONALES</td>
            </tr>
            <tr>
                <td>
                    <select class="form-control" name="Estado" id="Estado">
                        <option value="">SU ESTADO DE SALUD:</option>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="Padece" id="Padece">
                        <option value="">¿PADECE DE ALGUNA ENFERMEDAD?</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" id="Enfermedad" name="Enfermedad" placeholder="ESPECIFIQUE ENFERMEDAD">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="text" class="form-control" id="Meta" name="Meta" placeholder="¿CUAL ES SU META EN LA VIDA?">
                </td>
            </tr>
        </table>
                <input type="hidden" id="parte" name="parte" value="4">
    </div>
</form>
</div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->
<button style="color:orange;" type="button" class="btn btn-link btn-lg" onclick="btnAtras()" value="ATRAS"><i class="fa fa-caret-left fa-2x" aria-hidden="true"></i> &nbsp;&nbsp; ATRAS</button>
    <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>

</div>