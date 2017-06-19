<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
</div>
<div class="modal-body">
    <div class="row" id="">
<form action="sqls.php" method="POST" id="form2">
<div class="col-xs-12"> 
                            <table class="table table-bordered">
                                <tr>
                                    <td class="info text-center" colspan="6">DATOS ECONÓMICOS</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        ¿TIENE USTED OTROS INGRESOS?
                                    </td>
                                    <td colspan="3">
                                        ¿SU CÓNYUGE TRABAJA?
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="Ingresos" id="Ingresos">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Importe" name="Importe" placeholder="IMPORTE MENSUAL">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Conyuge" id="Conyuge">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="IngresoConyuge" name="IngresoConyuge" placeholder="PERCEPCIÓN MENSUAL">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        ¿VIVE EN CASA PROPIA?
                                    </td>
                                    <td colspan="3">
                                        ¿PAGA RENTA?
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <select class="form-control" name="CasaPropia" id="CasaPropia">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="ValorCasa" id="ValorCasa" placeholder="VALOR APROXIMADO">
                                    </td>
                                    <td>
                                        <select class="form-control" name="PagaRenta" id="PagaRenta">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="ValorRenta" id="ValorRenta" placeholder="RENTA MENSUAL">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        ¿TIENE AUTOMOVIL PROPIO?
                                    </td>
                                    <td colspan="3">
                                        ¿TIENE DEUDAS?
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="AutoMovil" id="AutoMovil">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="MarcaAuto" id="MarcaAuto" placeholder="MARCA">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="ModeloAuto" id="ModeloAuto" placeholder="MODELO">
                                    </td>

                                    <td>
                                        <select class="form-control" name="Adeudo" id="Adeudo">
                                            <option value="">ELIJA</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="ImporteAdeudo" id="ImporteAdeudo" placeholder="IMPORTE DEL ADEUDO">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="AbonoAdeudo" id="AbonoAdeudo" placeholder="¿CUANTO ABONA MENSUALMENTE?">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="GastosMensuales" id="GastosMensuales" placeholder="¿A CUANTO ASCIENDEN SUS GASTOS MENSUALES?">
                                    </td>
                                </tr>


                            </table>
                            </div>
                        <div class="col-xs-12">
                            <input type="checkbox" id="Acepto" name="Acepto" required> HAGO CONSTAR QUE TODOS LOS DATOS ASENTADOS EN LA PRESENTE SOLICITUD SON CIERTOS Y AUTORIZO A KAPITALMUJER, SA DE CV SOFOM ENR A VERIFICARLOS.
                        </div>
                        <div class="col-xs-12">
                            <p style="color:red">Debes seleccionar la casilla para poder enviar el correo</p>
                        
                            <div class="g-recaptcha" data-sitekey="6LfhBiIUAAAAAFgntz5Hso60CCY6uRthO4C7Z0UV"></div>

                        <input type="hidden" id="parte" name="parte" value="10">
                        </div>
                    </form>
                        <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
                    </div>
    <div class="modal-footer">
        <button style="color:white;" type="button" class="btn btn-warning" onclick="btnAtras()" value="ATRAS"><i class="fa fa-caret-left fa-1x" aria-hidden="true"></i> &nbsp;&nbsp; ATRAS</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         <button type="submit" form="form2" id="btbSiguiente" name="btbSiguiente" class="btn btn-primary">Enviar Solicitud</button>
     </div>
