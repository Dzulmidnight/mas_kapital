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
                    <td colspan="6" class="info text-center">DOCUMENTACIÓN</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="text" class="form-control" id="Curp" name="Curp" placeholder="CLAVE ÚNICA DE REGISTRO DE POBLACIÓN (CURP)">
                    </td>
                    <td colspan="3">
                        <input type="text" class="form-control" id="Rfc" name="Rfc" placeholder="REGISTRO FEDERAL DE CONTRIBUYENTES (RFC)">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" class="form-control" id="Imss" name="Imss" placeholder="NÚMERO DE SEGURO SOCIAL (IMSS)">
                    </td>
                    <td colspan="2">
                        <select class="form-control" name="Licencia" id="Licencia">
                            <option value="LICENCIA DE CONDUCIR">LICENCIA DE CONDUCIR</option>
                        </select>
                    </td>
                    <td colspan="2">
                        <input type="text" class="form-control" id="NumLicencia" name="NumLicencia" placeholder="CLASE Y NO. DE LICENCIA">
                    </td>
                </tr>
            <input type="hidden" id="parte" name="parte" value="3">
            </table>
        </div>
    </form> 
</div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->

<button id="btnAtras" style="color:orange;" type="button" class="btn btn-link btn-lg" onclick="btnAtras()" value="ATRAS"><i class="fa fa-caret-left fa-2x" aria-hidden="true"></i> &nbsp;&nbsp; ATRAS</button>
    <button style="color:orange" type="submit" form="form1"  id="" name="" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>
</div>
