<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
</div>
<div class="modal-body">
    <div class="row" id="">
    <form action="sqls.php" method="POST" id="form1">
<div class="col-xs-12">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td class="info text-center" colspan="5">REFERENCIAS FAMILIARES PERSONALES (Que no vivan en el mismo domicilio)</td>
                                </tr>
                               <tr>
                                   <td>NOMBRE</td>
                                   <td>DOMICILIO</td>
                                   <td>TELÉFONO</td>
                                   <td>OCUPACIÓN</td>
                                   <td>TIEMPO DE CONOCERLO</td>
                               </tr>
                               <tr>
                                    <td>
                                        <input type="text" class="form-control" id="Nombre1" name="Nombre1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Domicilio1" name="Domicilio1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Telefono1" name="Telefono1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Ocupacion1" name="Ocupacion1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Tiempo1" name="Tiempo1">
                                    </td>
                               </tr>
                               <tr>
                                    <td>
                                        <input type="text" class="form-control" id="Nombre2" name="Nombre2" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Domicilio2" name="Domicilio2">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Telefono2" name="Telefono2">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Ocupacion2" name="Ocupacion2">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Tiempo2" name="Tiempo2">
                                    </td>
                               </tr>
                            </table>
                              <input type="hidden" id="parte" name="parte" value="8">

                            </div></form>
                            </div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->
    <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>
</div>