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
                                   <td class="info text-center" colspan="6">
                                       DATOS GENERALES
                                   </td>
                                </tr>
                                <tr>
                                   <td colspan="3">
                                       ¿COMO SUPO DE ESTE EMPLEO?
                                   </td>
                                   <td colspan="3">
                                       ¿TIENE PARIENTES EN ESTA EMPRESA?
                                   </td>
                                </tr>
                                <tr>
                                   <td colspan="3">
                                        <input type="text" class="form-control" id="ComoSupo" name="ComoSupo" placeholder="">
                                   </td>
                                   <td>     

                                       <select class="form-control" name="" id="">
                                          <option value="">ELIJA</option>
                                           <option value="SI">SI</option>
                                           <option value="NO">NO</option>
                                       </select>
                                   </td>
                                   <td colspan="3">
                                       <input type="text" class="form-control" id="Pariente" name="Pariente" placeholder="¿QUIEN ES SU PARIENTE?">
                                   </td>
                                </tr>
                                <tr>
                                   <td colspan="3">¿PUEDE VIAJAR?</td>
                                   <td colspan="3">¿ESTA DISPUESTO A CAMBIAR SU LUGAR DE RESIDENCIA?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="Viajar" id="Viajar">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="ExpViajar" id="ExpViajar" placeholder="EXPLIQUE">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Residencia" id="Residencia">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="ExpResidencia" name="ExpResidencia" placeholder="EXPLIQUE">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">FECHA EN LA QUE PODRIA PRESENTARSE A TRABAJAR</td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="FechaTrabajar" name="FechaTrabajar" placeholder="">
                                    </td>
                                </tr>
                            </table>
                                <input type="hidden" id="parte" name="parte" value="9">

                            </div></form>
                            </div>
<div class="modal-footer">
<!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
<!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->
    <button style="color:orange;" type="button" class="btn btn-link btn-lg" onclick="btnAtras()" value="ATRAS" ><i class="fa fa-caret-left fa-2x" aria-hidden="true"></i> &nbsp;&nbsp; ATRAS</button>
    <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>

</div>