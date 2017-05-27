 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
</div>
<div class="modal-body">
    <div class="row" id="">
<form action="sqls.php" method="POST" id="form1">
 <div class"col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="4" class="info text-center">DATOS FAMILIARES</td>
                                </tr>
                                <tr>
                                    <td>
                                        NOMBRE
                                    </td>
                                    <td>
                                        VIVE/FINADO
                                    </td>
                                    <td>
                                        DOMICILIO
                                    </td>
                                    <td>
                                        OCUPACIÓN
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="NomP" id="NomP" placeholder="PADRE">
                                    </td>
                                    <td>
                                        <select class="form-control" name="ViveP" id="ViveP">
                                            <option>Vivo</option>
                                            <option>Muerto</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="DomP" id="DomP" placeholder="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="OcupP" id="OcupP" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="NomM" id="NomM" placeholder="MADRE">
                                    </td>
                                    <td>
                                        <select class="form-control" id="ViveM" name="ViveM">
                                            <option>Vivo</option>
                                            <option>Muerto</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="DomM" id="DomM"  placeholder="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="OcupM" id="OcupM"  placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="NomE" id="NomE" placeholder="ESPOSA(O)">
                                    </td>
                                    <td>
                                        <select class="form-control" id="ViveE" name="ViveE">
                                            <option>Vivo</option>
                                            <option>Muerto</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="DomE" id="DomE" placeholder="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="OcupE" id="OcupE" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <input type="text" class="form-control" name="Hijos" id="Hijos" placeholder="NOMBRES Y EDADES DE LOS HIJOS">
                                    </td>
                                </tr>
                            </table>
                                            <input type="hidden" id="parte" name="parte" value="5">
                        </div>     
                        </form>
                        </div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->
    <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>
</div>