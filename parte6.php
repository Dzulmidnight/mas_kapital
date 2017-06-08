<?php                         
include ('conexion.php');
$sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
$idsol=$mysqli->query($sql2);
$resultado=$idsol->fetch_assoc(); 
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
</div>
<div class="modal-body">
    <div class="row" id="">
    <form action="sqls.php" method="POST" id="form1" name="form1">
        <div class="col-xs-12">
            <table class="table table-bordered">
                                <tr>
                                    <td class="info" colspan="6">CONOCIMIENTOS GENERALES</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="Funciones" name="Funciones" placeholder="FUNCIONES DE OFICINA QUE DOMINA">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="Software" name="Software" placeholder="PROGRAMAS DE CÓMPUTO (SOFTWARE) QUE DOMINA">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info text-center" colspan="6">EMPLEO ACTUAL Y ANTERIORES</td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        En esta sección se pueden agregar empleos anteriores para que podamos tener una referencia laboral previa.
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Compania" name="Compania" placeholder="NOMBRE DE LA COMPAÑIA">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="INICIO(MM/YY)">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="FechaTermino" name="FechaTermino" placeholder="TERMINO(MM/YY)">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="DIRECCIÓN">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="TELÉFONO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Puesto" name="Puesto" placeholder="PUESTO DESEMPEÑADO">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="Motivo" name="Motivo" placeholder="MOTIVO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Salario" name="Salario" placeholder="ÚLTIMO SALARIO(MENSUAL)">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="NombreJefe" name="NombreJefe" placeholder="NOMBRE DE SU JEFE">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="PuestoJefe" name="PuestoJefe" placeholder="PUESTO DE SU JEFE">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">¿PODEMOS SOLICITAR INFORMACIÓN DE USTED?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="Informacion" id="Informacion">
                                            <option value="Si"></option>
                                            <option value="No"></option>
                                        </select>
                                    </td>
                                    <td colspan="5">
                                        <input type="text" class="form-control" name="Porque" id="Porque" placeholder="¿PORQUE?">
                                    </td>
                                </tr>
                            </table>
                                <input type="hidden" id="parte" name="parte" value="7">
                        </div>

                      <div class="col-xs-6 text-right">
                            Lista de Trabajos Anteriores
                        </div>
                        <div class="col-xs-6">
                            <select class="form-control" name="TrabajoAnt" id="TrabajoAnt"> 
                            <?php 
                            include ('conexion.php');
            $sql2="SELECT idSolicitante FROM Solicitante ORDER BY idSolicitante DESC LIMIT 1";
            $idsol=$mysqli->query($sql2);
            $resultado=$idsol->fetch_assoc();
                    $sqlEmp = "SELECT idEmpleos,Compania,Puesto FROM Empleos WHERE idSolicitante=$resultado[idSolicitante]";
                    $result=$mysqli->query($sqlEmp);
                    ?> <option value="0">Empleos Anteriores:</option> <?php
                    while ($fila=$result->fetch_row()) {?>
                    <option value=" <?php echo $fila[0]; ?>"> <?php echo "$fila[1] - $fila[2]";?></option><?php } ?>

                            </select>
                        </div>
                        <div class="col-xs-4 text-center">
                            <button onclick="GuardarTrabajo()" type="button" class="btn btn-primary" id="GuardarT" name="GuardarT">Guardar Trabajo</button>
                        </div>
                        <div class="col-xs-4 text-center">
                            <button onclick="BorrarTrabajo()" type="button" class="btn btn-primary" id="BorrarT" name="BorrarT">Eliminar Trabajo</button>
                        </div>
                        <div class="col-xs-4 text-center">
                            <button onclick="LimpiarCampos();" class="btn btn-primary" type="button">Limpiar Campos</button>
                        </div> 
                        </form>
                        </div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->

   <button style="color:orange;" type="button" class="btn btn-link btn-lg" onclick="btnAtras()" value="ATRAS" ><i class="fa fa-caret-left fa-2x" aria-hidden="true"></i> &nbsp;&nbsp; ATRAS</button>
    <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>

</div>