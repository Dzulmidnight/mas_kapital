            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="">
                    <form action="sqls.php" method="POST" id="form1">
                        <div class="col-xs-12">
                            <h3><b>INGRESA TU SOLICITUD</b></h3>
                        </div>
                        <div class="col-xs-4">
                            <p style="background:#3498db;color:#ecf0f1">Fecha: <?php echo date('d/m/Y', time()) ?></p>
                        </div>
                        <div class="col-xs-4">
                                <select class="form-control" name="Puesto" id="Puesto">
                                <?php include 'conexion.php';
                                $sql ="SELECT DISTINCT Puesto FROM Vacantes";
                                $res=$mysqli->query($sql);
                                while ($fila=$res->fetch_assoc()) {
                                    ?><option> <? echo utf8_encode($fila['Puesto']); ?></option>
                                <? } ?>
                                </select>
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="sueldoM" id="sueldoM" placeholder="SUELDO MENSUAL DESEADO">
                        </div>
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="info text-center" colspan="8">DATOS PERSONALES</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="ApPaterno" name="ApPaterno" placeholder="APELLIDO PATERNO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="ApMaterno" name="ApMaterno" placeholder="APELLIDO MATERNO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="NOMBRE(S)">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Edad" name="Edad" placeholder="EDAD (AÑOS)">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="Calle" name="Calle" placeholder="DOMICILIO (TIPO VIALIDAD Y NOMBRE)">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="Numero" name="Numero" placeholder="NO. EXT.">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="NumInt" name="NumInt" placeholder="NO. INT.">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="Colonia" name="Colonia" placeholder="COLONIA">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="Municipio" name="Municipio" placeholder="DELEGACIÓN O MUNICIPIO">
                                    </td>
                                    <td colspan="3">
                                        <select class="form-control" name="Estado" id="Estado">
                                            <option value="0">ESTADO</option>
                                            <?php 
                                            $query = "SELECT * FROM estados";
                                            $ejecutar = $mysqli->query($query);
                                            while($estados = $ejecutar->fetch_assoc()){
                                                echo '<option value="'.utf8_encode($estados['nombre']).'">'.utf8_encode($estados['nombre']).'</option>';
                                            }
                                             ?>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Cp" name="Cp" placeholder="CODIGO POSTAL">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="TELÉFONO CASA">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="Celular" name="Celular" placeholder="TELÉFONO CELULAR">
                                    </td>
                                    <td colspan="4">
                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="CORREO ELECTRONICO">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="TiempoR" name="TiempoR" placeholder="TIEMPO DE RESIDIR EN EL DOMICILIO ACTUAL">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="ViveCon" name="ViveCon" placeholder="VIVE CON:">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" id="EspVive" name="EspVive" placeholder="ESPECIFICA">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p>PERSONAS QUE DEPENDEN DE USTED</p>
                                        <input type="checkbox" id="Dependientes" name="Dependientes" value="Hijos"> HIJOS
                                        <input type="checkbox" id="Dependientes" name="Dependientes" value="Conyuge"> CÓNYUGE
                                        <input type="checkbox" id="Dependientes" name="Dependientes" value="Padres"> PADRES
                                        <input type="checkbox" id="Dependientes" name="Dependientes" value="Otros"> OTROS
                                    </td>
                                    <td colspan="2">
                                        <select class="form-control" name="EdoCivil" id="EdoCivil">
                                            <option value="">ESTADO CIVIL:</option>
                                            <option value="SOLTERO/A">SOLTERO/A</option>
                                            <option value="CASADO/A">CASADO/A</option>
                                            <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" id="EspEC" name="EspEC" placeholder="ESPECIFICA">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" id="parte" name="parte" value="2">
                        </div>
                    </form>
                </div>
            </div>
                        <div class="modal-footer">
<!--                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
 -->               <!--  <button type="button" class="btn btn-primary">Enviar Solicitud</button> -->
                <button style="color:orange" type="submit" form="form1" id="btbSiguiente" name="btbSiguiente" class="btn btn-link btn-lg">SIGUIENTE &nbsp; &nbsp;<i class="fa fa-caret-right fa-2x" aria-hidden="true"></i></button>

            </div>