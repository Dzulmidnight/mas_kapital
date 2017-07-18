<?php 
include('conexion/conexion.php');


if(isset($_POST['enviar_denuncia']) && $_POST['enviar_denuncia'] == 1){
include('correo/mail.php');
include('administracion/mpdf/mpdf.php');

    $nombre_denunciante = $_POST['nombre_denunciante'];
    $estado_denunciante = $_POST['estado_denunciante'];
    $telefono_denunciante = $_POST['telefono_denunciante'];
    $nombre_denuncia = $_POST['nombre_denuncia'];
    $sucursal = $_POST['sucursal'];
    $otro_departamento = $_POST['otro_departamento'];
    $motivo = $_POST['motivo'];
    $descripcion = $_POST['descripcion'];
    $fecha = time();

    $ruta_pdf = 'administracion/reportes/denuncias/';
    $nombre_pdf = 'denuncia_'.time().'.pdf';
    $reporte = $ruta_pdf.$nombre_pdf;

    $query = "INSERT INTO frm_denuncia (nombre_denunciante, estado_denunciante, telefono_denunciante, nombre_denuncia, sucursal, otro_departamento, motivo, descripcion, fecha, archivo_denuncia) VALUES ('$nombre_denunciante', '$estado_denunciante', '$telefono_denunciante', '$nombre_denuncia', '$sucursal', '$otro_departamento', '$motivo', '$descripcion', '$fecha', '$reporte')";
    $insertar = $mysqli->query($query);

/********  SE ENVIA CORREO SOBRE REPORTE TRIMESTRAL  ************/
    $query = "SELECT NombreSucursal FROM sucursales WHERE idSucursales = $sucursal";
    $consultar = $mysqli->query($query);
    $detalle_sucursal = $consultar->fetch_assoc();

    $html = '

        <div class="col-xs-12">
            <table style="border: 1px solid #ddd;border-collapse: collapse;font-family: Tahoma, Geneva, sans-serif;font-size:12px;">
                <tbody>
                    <tr>
                        <td style="background-color:#3498db;color:#ecf0f1;" colspan="2"><b>Datos Denunciante:</b></td>
                    </tr>
                    <tr>
                        <td style="text-align:left" colspan="2">
                            <b>Nombre: </b>'.$nombre_denunciante.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left">
                            <b>Estado: </b>'.$estado_denunciante.'
                        </td>
                        <td style="text-align:left">
                            <b>Teléfono: </b>'.$telefono_denunciante.'
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="col-md-12">
            <table style="border: 1px solid #ddd;border-collapse: collapse;font-family: Tahoma, Geneva, sans-serif;font-size:12px;">
                <tr>
                    <td style="background-color:#3498db;color:#ecf0f1;" colspan="2"><b>Datos Denuncia:</b></td>
                </tr>
                <tr>
                    <td style="text-align:left" colspan="2">
                        <b>Nombre de la Denuncia: </b>'.$nombre_denuncia.'
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left">
                        <b>Sucursal: </b>'.$detalle_sucursal['NombreSucursal'].'
                    </td>
                    <td>
                        <b>Otro departarmento: </b>'.$otro_departamento.'
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left" colspan="2">
                        <b>Motivo: </b>'.$motivo.'
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left" colspan="2">
                        <b>Descripción: </b>'.$descripcion.'
                    </td>
                </tr>
            </table>
        </div>';



    $mpdf = new mPDF('c', 'Letter');
    ob_start();

    $mpdf->setAutoTopMargin = 'pad';
    $mpdf->keep_table_proportions = TRUE;
    $mpdf->SetHTMLHeader('
    <header class="clearfix">
      <div>
        <table style="padding:0px;margin-top:-20px;">
          <tr>
            <td style="text-align:left;margin-bottom:0px;font-size:12px;">
                  <div>
                    <img src="administracion/reportes/img/logo_mas_kapital.png" >
                  </div>
            </td>
            <td style="text-align:right;font-size:12px;">
                  <div>
                    <h2>
                        BUZÓN DE DENUNCIAS PLD
                    </h2>             
                  </div>
                  <div>'.date('d/m/Y', $fecha).'</div>
            </td>
          </tr>
        </table>
      </div>
    </header>
      ');
    $css = file_get_contents('administracion/reportes/css/style_reporte.css');  
    //$mpdf->AddPage('L'); //se cambia la orientacion de la pagina
    $mpdf->pagenumPrefix = 'Página / Page ';
    $mpdf->pagenumSuffix = ' - ';
    $mpdf->nbpgPrefix = ' de ';
    //$mpdf->nbpgSuffix = ' pages';
    $mpdf->SetFooter('{PAGENO}{nbpg}');
    $mpdf->writeHTML($css,1);

    ob_end_clean();

    $mpdf->writeHTML($html);
    //$pdf_listo = $mpdf->Output('reporte.pdf', 'I');
    
    /// CON LA LINEA DE ABAJO GENERAMOS EL PDF Y LO ENVIAMOS POR EMAIL, PERO NO LO GUARDAMOS
    //28_03_2017 $pdf_listo = $mpdf->Output('reporte_trimestral.pdf', 'S'); //reemplazamos la I por S(regresa el documento como string)
    /// CON LA LINEA DE ABAJO GENERAMOS EL PDF Y LO GUARDAMOS EN UNA CARPETA
    $mpdf->Output(''.$ruta_pdf.''.$nombre_pdf.'', 'F'); //reemplazamos la I por S(regresa el documento como string)

    //GENERAMOS EL MENSAJE DE CORREO PARA NOTIFICAR LA NUEVA DENUNCIA
    $asunto = 'MásKapital - Buzón de denuncias PLD';
    $mensaje_correo = '
        <html>
        <head>
            <meta charset="utf-8">
        </head>
        <body>
        
            <table style="font-family: Tahoma, Geneva, sans-serif; font-size:13px; color: #797979;border: 1px solid #ddd;text-align: left;border-collapse: collapse;width: 100%;" >
                <thead>
                    <tr>
                        <th style="padding: 15px;border: 1px solid #ddd" align="center">
                            <img class="img-responsive" src="http://iotechdata1.xyz/mas_kapital/img/logos/logo_mas_kapital.png" alt="logo">
                        </th>
                        <th style="padding: 15px;border: 1px solid #ddd" align="left">
                            <h3>Buzón de denuncias PLD</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center;padding:15px;background-color:#3498db;color:#ffffff;" colspan="2">DATOS DENUNCIANTE</td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Nombre:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$nombre_denunciante.'</b>
                        </td>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Estado:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$estado_denunciante.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Teléfono:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$telefono_denunciante.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:15px;background-color:#3498db;color:#ffffff;" colspan="2">DATOS DENUNCIA</td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Nombre:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$nombre_denuncia.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Sucursal:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$detalle_sucursal['NombreSucursal'].'</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Otro departamento
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$otro_departamento.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            Motivo
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$motivo.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:15px;border: 1px solid #ddd;background-color:#3498db;color:#ffffff;" colspan="2">DESCRIPCIÓN</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 15px;border: 1px solid #ddd">
                            <b>'.$descripcion.'</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html>
    ';


    $mail->AddAddress('soporteinforganic@gmail.com');

    $mail->Subject = utf8_decode($asunto);
    $mail->Body = utf8_decode($mensaje_correo);
    $mail->MsgHTML(utf8_decode($mensaje_correo));
    //$mail->AddAttachment($pdf_listo, 'reporte.pdf');

    //$mail->addStringAttachment($pdf_listo, 'reporte_trimestral.pdf'); // SE ENVIA LA CADENA DE TEXTO DEL PDF POR EMAIL
    $mail->AddAttachment($reporte);
    $mail->Send();
    $mail->ClearAddresses();
}
 ?>
<section id="footer_2">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <a href="https://www.gob.mx/cnbv" target="_new">
                    <img class="img-responsive" style="padding-top:1em;padding-bottom:1em" src="img/index/logos/logo_cnbv.jpg" alt="">
                </a>
                <a href="http://www.gob.mx/condusef" target="_new">
                    <img class="img-responsive" style="padding-top:1em;padding-bottom:1em" src="img/index/logos/logo_condusef.jpg" alt="">
                </a>
                <a href="http://www.buro.gob.mx" target="_new">
                    <img class="img-responsive" style="padding-top:1em;padding-bottom:1em" src="img/index/logos/logo_buro.jpg" alt="">
                </a>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="col-xs-12">
                    <h2 style="color: #FFFFFF"><b>CONTACTO</b></h2>    
                </div>
                <div class="col-xs-12">
                    <a class="link-hover" href="https://www.facebook.com/mas.kapital" target="_new"><img src="img/index/logos/facebook.jpg" alt=""> Más Kapital</a>
                </div>
                <div class="col-xs-12">
                    <h2 style="color: #FFFFFF"><b>KAPITEL 01 800 822 06 73</b></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-xs-12">
                    <h2 style="color:#ffffff"><b>NORMATIVIDAD</b></h2>
                    <p style="text-align: justify;">Cónoce nuestro aviso de privacidad, es tu derecho.</p>
                    <p ><a id="aviso-privacidad" href="" data-toggle="modal" data-target="#aviso"><b>AVISO DE PRIVACIDAD</b></a></p>
                    <p style="text-align: justify;">Denuncia cualquier irregularidad, tu reporte es completamente anónimo.</p>
                    <p ><a id="buzon-denuncias" href="" data-toggle="modal" data-target="#buzon"><b>BUZÓN DE DENUNCIAS PLD</b></a></p>
                </div>
            </div>                
        </div>
    </div>
</section>

<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" >
                <div class="copyright-text text-center">
                    <p>&copy; Derechos reservados Kapitalmujer S.A de C.V SOFOM ENR</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- MODAL BUZÓN DE DENUNCIAS PLD -->
<div class="modal fade" id="buzon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><b>BUZÓN DE DENUNCIAS PLD</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="col-xs-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="info" colspan="2"><b>Datos Denunciante:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="nombre_denunciante" placeholder="Nombre">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="estado_denunciante" id="">
                                                <option value="">Ubicación(Estado):</option>
                                                <?php 
                                                $query = "SELECT nombre FROM estados";
                                                $consultar = $mysqli->query($query);
                                                while($estado = $consultar->fetch_assoc()){
                                                    echo '<option value="'.utf8_encode($estado['nombre']).'">'.utf8_encode($estado['nombre']).'</option>';
                                                }
                                                 ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="telefono_denunciante" placeholder="Teléfono:">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="info" colspan="2"><b>Datos Denuncia:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="nombre_denuncia" placeholder="Nombre:">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="sucursal" id="">
                                                <option value="">Sucursal</option>
                                                <?php 
                                                $query = "SELECT idSucursales, NombreSucursal FROM sucursales";
                                                $consultar = $mysqli->query($query);
                                                while($sucursales = $consultar->fetch_assoc()){
                                                    echo '<option value="'.$sucursales['idSucursales'].'">'.$sucursales['NombreSucursal'].'</option>';
                                                }
                                                 ?>
                                            </select>
                                            
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="otro_departamento" placeholder="Otro departamento:">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="motivo" placeholder="Motivo:">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea class="form-control" rows="5" name="descripcion" placeholder="Descripción:"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-12">
                                <p>Debes seleccionar la casilla para poder enviar el correo</p>
                                <div class="g-recaptcha" data-sitekey="6LfhBiIUAAAAAFgntz5Hso60CCY6uRthO4C7Z0UV"></div>    
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="enviar_denuncia" value="1">Enviar Correo</button>
                </div>
            </div>            
        </form>
    </div>
</div>

<!-- MODAL AVISO DE PRIVACIDAD -->
<div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"><b>AVISO DE PRIVACIDAD PARA LA PROTECCIÓN DE DATOS PERSONALES</b></h4>
            </div>
            <div class="modal-body text-justify" style="padding-left:4em;padding-right:4em;">
                
                <p>
                    En cumplimiento a lo establecido por la Ley Federal de Protección de datos personales en Posesión de los Particulares LFPDPPP (“LEY”), KAPITALMUJER SOCIEDAD ANÓNIMA DE CAPITAL VARIABLE SOCIEDAD FINANCIERA DE OBJETO MÚLTIPLE ENTIDAD NO REGULADA, con domicilio ubicado en Heroica Escuela Naval Militar No. 316, colonia Reforma, Oaxaca de Juárez, Oaxaca, C.P. 68050, hace de su conocimiento que está comprometido con la protección de sus datos personales, al ser responsable de su uso, manejo y confidencialidad, por lo que en todo momento buscará que el tratamiento de sus datos sea legítimo, controlado e informado, a efecto de garantizar la privacidad de los mismos.
                </p>
                <h3>
                    <b>
                        Finalidad del tratamiento de sus datos.
                    </b>
                </h3>
                <p>
                    Los datos personales que proporcione usted como titular o su representante legal a KAPITALMUJER S.A. DE C.V. SOFOM ENR, tendrán el uso que en forma enunciativa pero no limitativa se describe a continuación:
                </p>
                <p>
                    Para identificar, ubicar, comunicar, contactar y/o enviar o suministrar información, necesaria para llevar a cabo la relación contractual de arrendamiento de un inmueble para uso comercial que tenemos con usted.
                </p>
                <p>
                    Entendiéndose por datos personales, aquellos que la Ley identifica como cualquier información concerniente a una persona física identificada o identificable.
                </p>
                <p>
                    Así mismo le informamos que para cumplir con las finalidades previstas en este aviso de privacidad, serán recabados y tratados datos personales sensibles, como aquéllos que refieren a:
                    <ul>
                        <li>Situación crediticia; y</li>
                        <li>Estado de salud presente o futuro</li>
                    </ul>
                </p>
                <p>
                    Por lo que nos comprometemos a que los mismos serán tratados bajo las más estrictas medidas de seguridad que garanticen su confidencialidad.
                </p>
                <h3>
                    <b>
                        Seguridad, Uso o Divulgación de datos personales 
                    </b>
                </h3>
                <p>
                    KAPITALMUJER S.A. DE C.V. SOFOM ENR implementará las medidas de seguridad, técnicas, administrativas y físicas, necesarias para proteger sus datos personales y evitar su daño, pérdida, alteración destrucción o el uso, acceso o tratamiento no autorizado.
                </p>
                <p>
                    Únicamente el personal autorizado, que ha cumplido y observado los correspondientes requisitos de confidencialidad, podrá participar en el tratamiento de sus datos personales. El personal autorizado tiene prohibido permitir el acceso de personas no autorizadas y utilizar sus datos personales para fines distintos a los establecidos por el presente Aviso de Publicidad. La obligación de confidencialidad de las personas que participan en el tratamiento e sus datos personales subsiste aún después de terminada la relación con KAPITALMUJER S.A. DE C.V. SOFOM ENR.
                </p>
                <h3>
                    <b>
                        Derechos que le corresponden
                    </b>
                </h3>
                <p>
                    Usted como titular de datos personales tiene derecho de acceder a sus datos personales que poseemos y a los detalles del tratamiento de los mismos, así como a rectificarlos en caso de ser inexactos o incompletos; cancelarlos cuando considere que no se requieren para alguna de las finalidades señalados en el presente aviso de privacidad, estén siendo utilizados para finalidades no consentidas o haya finalizado la relación contractual o de servicio, o bien, oponerse al tratamiento de los mismos para fines específicos.
                </p>
                <p>
                    En caso de que desee ejercer sus derechos de Acceso, Ratificación, Cancelación u Oposición, estos los podrán ejercer en todo momento utilizando los siguientes mecanismos:
                </p>
                <p>
                    <ul>
                        <li>
                            Vía correo electrónico a: notificaciones.maskapital@gmail.com
                        </li>
                        <li>
                            Carta enviada a Heroica Escuela Naval Militar No. 316, colonia Reforma, Oaxaca de Juárez, Oaxaca; Código Postal 68050, en atención a la C. Erendira Itandehui Vásquez Arrazola. 
                        </li>
                    </ul>
                </p>
                <p>
                    La recepción de solicitudes podrá realizarse de lunes a viernes de las 8:00 a las 17:00 horas, excepto días festivos. Por lo anterior, deberá hacernos saber de manera fehaciente y detallada los datos personales específicos a los que usted desea tener acceso o quiere sean rectificados, cancelados o revisados, así como cumplir con los requisitos que solicita la “Ley” en el art. 29 que son:
                </p>
                <p>
                    <ul>
                        <li>
                            Nombre del titular (dueño de los datos) y domicilio completo o cualquier otro medio para comunicarle la respuesta a su solicitud.
                        </li>
                        <li>
                            Documentos que acrediten la identidad del titular o en su caso, la representación legal de aquella persona que actúa a nombre del titular.
                        </li>
                        <li>
                            Descripción clara y precisa de los datos personales respecto de los que se busca ejercer alguno de los derechos antes mencionados (ARCO).
                        </li>
                        <li>
                            Cualquier otro elemento o documento que facilite la localización de los datos personales.
                        </li>
                    </ul>
                </p>
                <h3>
                    <b>
                        Comunicación  y Transferencia de los datos personales
                    </b>
                </h3>
                <p>
                    Sus datos personales pueden ser transferidos y tratados dentro y fuera del país, por personas distintas a esta empresa. En ese sentido, su información puede ser compartida con abogados y/o gestores por acto o resolución judicial o mandamiento de Ley, en el marco de un procedimiento judicial y/o por requerimiento de una autoridad gubernamental, tanto dentro como fuera de México. Así mismo podemos divulgar información si consideramos que dicha divulgación es necesaria o conveniente para cumplir las legislaciones vigentes o por cualquier otro motivo de orden público o privado en donde KAPITALMUJER S.A. DE C.V. SOFOM ENR tenga jurisdicción. 
                </p>
                <p>
                    En ese entendido nos comprometemos a no transferir su información personal a terceros sin su consentimiento, salvo las excepciones previstas en el artículo 37 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, así como a realizar esta transferencia en los términos que fija esa ley. 
                </p>
                <p>
                    Por lo que en el caso de que exista la necesidad de transferir sus datos personales, KAPITALMUJER S.A. DE C.V. SOFOM ENR debe tener su consentimiento previo. Si usted no manifiesta su oposición para que sus datos personales sean transferidos, se entenderá que ha otorgado su consentimiento para ello. 
                </p>
                <p>
                    Así mismo únicamente transferiremos sus datos personales sensibles, contando con su consentimiento expreso, lo anterior de conformidad con lo que establece el artículo 9 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares. 
                </p>
                <h3>
                    <b>
                        Cambios al aviso de Privacidad
                    </b>
                </h3>
                <p>
                    KAPITALMUJER S.A. DE C.V. SOFOM ENR se reserva el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad como estime conveniente, esto con el objeto de cumplir con los cambios en la legislación aplicable sobre protección de datos o cumplir con disposiciones internas de KAPITALMUJER S.A. DE C.V. SOFOM ENR, y en general en atención de las novedades legislativas, políticas internas o nuevos requerimientos para la prestación u ofrecimiento de nuestros servicios o productos.  
                </p>
                <p>
                    En tal caso, dichas modificaciones o actualizaciones estarán a su disposición a través de anuncios visibles en nuestras oficinas o sucursales de atención a clientes.
                </p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>