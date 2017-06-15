<?php
require('../conexion/conexion.php');
$idsucursal = $_POST['idsucursal'];

$query = "SELECT * FROM Sucursales WHERE idSucursales = $idsucursal";
$ejecutar = $mysqli->query($query);
$detalle = $ejecutar->fetch_assoc();

?>
                    <div class="row">
                        <!--<aside class="profile-nav col-lg-3">
                            <section class="panel">
                                <div class="user-heading round">
                                    <a href="#">
                                        <img src="img/profile-avatar.jpg" alt="">
                                    </a>
                                    <h1>Jonathan Smith</h1>
                                    <p>jsmith@flatlab.com</p>
                                </div>

                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="profile.html"> <i class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                                    <li  class="active"><a href="profile-edit.html"> <i class="fa fa-edit"></i> Edit profile</a></li>
                                </ul>

                            </section>
                        </aside>-->
                        <aside class="profile-info col-lg-12">
                            <section class="panel">
                                <div class="panel-body bio-graph-info">
                                  <table class="table table-bordered">
                                    <tr>
                                      <td>Nombre Sucursal</td>
                                      <td colspan="3">
                                        <input type="text" class="form-control" name="nombre" id="f-name" value="<?php echo $detalle['NombreSucursal']; ?>" placeholder="Nombre de la Sucursal">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Estado</td>
                                      <td colspan="3">
                                        <?php 
                                        $query = "SELECT nombre FROM estados";
                                        $consultar = $mysqli->query($query);
                                        ?>
                                          <select class="form-control" name="estado" id="">
                                            <option value="">Selecciona un Estado</option>
                                            <?php 
                                            while($estados = $consultar->fetch_assoc()){
                                            	if($estados['nombre'] == $detalle['Estado']){
                                            		echo "<option values='".$estados['nombre']."' selected>".$estados['nombre']."</option>";
                                            	}else{
                                            		echo "<option values='".$estados['nombre']."'>".$estados['nombre']."</option>";
                                            	}
                                            }
                                            ?>
                                          </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Municipio</td>
                                      <td colspan="3">
                                        <input type="text" class="form-control" name="municipio" id="" value="<?php echo $detalle['Municipio']; ?>" placeholder="Municipio">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Colonia</td>
                                      <td>
                                        <input type="text" class="form-control" name="colonia" value="<?php echo $detalle['Colonia']; ?>" placeholder="Colonia">
                                      </td>
                                      <td>C.P.</td>
                                      <td>
                                        <input type="text" class="form-control" name="cp" value="<?php echo $detalle['CP']; ?>" placeholder="C.P.">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Calle</td>
                                      <td>
                                        <input type="text" class="form-control" name="calle" id="" value="<?php echo $detalle['Calle']; ?>" placeholder="Calle">
                                      </td>
                                      <td>Num. Ext.</td>
                                      <td>
                                        <input type="text" class="form-control" name="numero" id="" value="<?php echo $detalle['Numero']; ?>" placeholder="Num. #">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Referencias</td>
                                      <td colspan="3">
                                        <textarea class="form-control" name="referencia" id="" rows="2" placeholder="Ej: Planta Interior, Local #"><?php echo $detalle['Referencia']; ?></textarea>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Teléfono</td>
                                      <td>
                                        <input type="text" class="form-control" name="telefono" id="" value="<?php echo $detalle['Telefono']; ?>" placeholder="Teléfono">
                                      </td>
                                      <td>Email</td>
                                      <td>
                                        <input type="text" class="form-control" name="email" id="" value="<?php echo $detalle['Email']; ?>" placeholder="Email">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="info text-center" colspan="4"><b>Coordenadas Aproximadas de la Sucursal</b></td>
                                    </tr>
                                    <tr>
                                      <td>Coordenada X</td>
                                      <td>
                                        <input type="text" class="form-control" name="x" id="" value="<?php echo $detalle['X']; ?>" placeholder="Ej: 16.831622">
                                      </td>
                                      <td>Coordenada Y</td>
                                      <td>
                                        <input type="text" class="form-control" name="y" id="" value="<?php echo $detalle['Y']; ?>" placeholder="Ej: -96.782573">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Imagen Sucursal</td>
                                      <td colspan="3">
                                        <input type="text" class="form-control" name="img_sucursal" id="" value="<?php echo $detalle['UrlFoto']; ?>">
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                            </section>
                            <!--<section>
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> Sets New Password & Avatar</div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Current Password</label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="c-pwd" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">New Password</label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="n-pwd" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Re-type New Password</label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="rt-pwd" placeholder=" ">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Change Avatar</label>
                                                <div class="col-lg-6">
                                                    <input type="file" class="file-pos" id="exampleInputFile">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-info">Save</button>
                                                    <button type="button" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>-->
                        </aside>
                    </div>