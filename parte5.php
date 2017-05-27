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
                                    <td class="info" colspan="6">
                                        <b>ESCOLARIDAD (Solamente último nivel académico)</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        DATOS DE LA ESCUELA
                                    </td>
                                    <td>
                                        DIRECCIÓN
                                    </td>
                                    <td colspan="3">
                                        FECHAS
                                    </td>
                                    <td>
                                        DOCUMENTO RECIBIDO
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="Nivel1" name="Nivel1" placeholder="NIVEL/NOMBRE">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Direccion" name="Direccion">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="FechaI" name="FechaI" placeholder="DE">
                                    </td>
                                    <td>A</td>
                                    <td>
                                        <input type="text" class="form-control" id="FechaF" name="FechaF" placeholder="AÑOS">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Documento" name="Documento">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">EN CASO DE ESTUDIOS PROFESIONALES:</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="Carrera" name="Carrera" placeholder="NOMBRE DE LA CARRERA">
                                    </td>
                                    <td colspan="3">
                                        <select class="form-control" name="Nivel2" id="Nivel2">
                                            <option value="">NIVEL ALCANZADO (SOLO PARA ESTUDIOS PROFESIONALES)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        EN CASO DE ESTAR ESTUDIANDO ACTUALMENTE
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="EscuelaActual" name="EscuelaActual" placeholder="NOMBRE DE LA ESCUELA">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="CarreraActual" name="CarreraActual" placeholder="CURSO O CARRERA">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="DiasAsiste" name="DiasAsiste" placeholder="DIAS EN LOS QUE ASISTE">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Horario" name="Horario" placeholder="HORARIO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="GradoActual" name="GradoActual" placeholder="NIVEL/GRADO ACTUAL">
                                    </td>
                                </tr>
                            </table>
                                <input type="hidden" id="parte" name="parte" value="6">
                            </div>
                            </form>
                            </div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->
    <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>
</div>