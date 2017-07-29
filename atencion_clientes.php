<?php
require_once('conexion/conexion.php');
require_once('correo/mail.php');
require_once('funciones/funciones.php');
require_once('administracion/mpdf/mpdf.php');

if(isset($_POST['correo_ayuda']) && $_POST['correo_ayuda'] == 1){
    $tema_motivo = $_POST['tema_motivo'];
    $sucursal = $_POST['sucursal'];
    $grupo = $_POST['grupo'];
    $ap_materno = $_POST['ap_materno'];
    $ap_paterno = $_POST['ap_paterno'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $fecha = time();

    ///inician variables del PDF
    $ruta_pdf = 'administracion/reportes/atencion_clientes/';
    $nombre_pdf = 'atencion_clientes_'.time().'.pdf';
    $reporte = $ruta_pdf.$nombre_pdf;
    /// fin

    //Insertamos la informacion del formulario en BD
    $insertSQL = "INSERT INTO frm_atencion(tema_motivo, sucursal, grupo, nombre, ap_paterno, ap_materno, direccion, municipio, estado, correo, telefono, descripcion, fecha, archivo_atencion) VALUES ('$tema_motivo', '$sucursal', '$grupo', '$nombre', '$ap_paterno', '$ap_materno', '$direccion', '$municipio', '$estado', '$correo', '$telefono', '$descripcion', '$fecha', '$reporte')";
    $mysqli->query($insertSQL);



    $query = "SELECT NombreSucursal, Estado FROM sucursales WHERE idSucursales = $sucursal";
    $ejecutar = $mysqli->query($query);
    $detalle = $ejecutar->fetch_assoc();


    /// SE GENERA EL ARCHIVO PDF Y SE GUARDA EN EL SERVIDOR
    $html = '

        <div class="col-xs-12">
            <table style="border: 1px solid #ddd;border-collapse: collapse;font-family: Tahoma, Geneva, sans-serif;font-size:12px;">
                    <tr>
                        <td style="text-align:center;padding:15px;background-color:#3498db;color:#ffffff;" colspan="2">DATOS DE IDENTIFICACIÓN</td>
                    </tr>
                    <tr>
                        <td style="text-align:left;border: 1px solid #ddd">
                            <b>SUCURSAL:</b>
                        </td>
                        <td style="text-align:left;border: 1px solid #ddd">
                            '.$detalle['NombreSucursal'].', '.$detalle['Estado'].'
                        </td>
                    <tr>
                        <td style="text-align:left;border: 1px solid #ddd">
                            <b>GRUPO:</b>
                        </td>
                        <td style="text-align:left;border: 1px solid #ddd">
                            '.$grupo.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;border: 1px solid #ddd">
                            <b>NOMBRE:</b>
                        </td>
                        <td style="text-align:left;border: 1px solid #ddd">
                            '.$nombre.' '.$ap_paterno.' '.$ap_materno.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;border: 1px solid #ddd">
                            <b>DIRECCIÓN:</b>
                        </td>
                        <td style="text-align:left;border: 1px solid #ddd">
                            '.$estado.', '.$municipio.', '.$direccion.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;border: 1px solid #ddd">
                            <b>CORREO ELECTRÓNICO:</b>
                        </td>
                        <td style="text-align:left;border: 1px solid #ddd">
                            '.$correo.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;border: 1px solid #ddd">
                            <b>NÚMERO TELEFÓNICO</b>
                        </td>
                        <td style="text-align:left;border: 1px solid #ddd">
                            '.$telefono.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:15px;border: 1px solid #ddd;background-color:#3498db;color:#ffffff;" colspan="2">DESCRIPCIÓN</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:left;border: 1px solid #ddd">
                            '.$descripcion.'
                        </td>
                    </tr>
            </table>
        </div>';


    $mpdf = new mPDF('c', 'Letter'); // seleccionamos el tamaño de la hoja
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
                        ATENCIÓN A CLIENTES
                    </h2>             
                  </div>
                  <div>
                    <h3>TEMA O MOTIVO: <span style="color:red">'.$tema_motivo.'</span></h3>
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

    /// FIN


    /// SE GENERA EL CORREO
    $asunto = 'Atención a Clientes | '.$tema_motivo.'';

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
                            <img class="img-responsive" src="http://mas_kapital.mx/img/logos/logo_mas_kapital.png" alt="logo">
                        </th>
                        <th style="padding: 15px;border: 1px solid #ddd" align="left">
                            <h3>TEMA O MOTIVO: <span style="color:red">'.$tema_motivo.'</span></h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center;padding:15px;background-color:#3498db;color:#ffffff;" colspan="2">DATOS DE IDENTIFICACIÓN</td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            SUCURSAL:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            '.$detalle['NombreSucursal'].', '.$detalle['Estado'].'
                        </td>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            GRUPO:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            '.$grupo.'
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            NOMBRE:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            '.$nombre.' '.$ap_paterno.' '.$ap_materno.'
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            DIRECCIÓN:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            '.$estado.', '.$municipio.', '.$direccion.'
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            CORREO ELECTRÓNICO:
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            '.$correo.'
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            NÚMERO TELEFÓNICO
                        </td>
                        <td style="padding: 15px;border: 1px solid #ddd">
                            '.$telefono.'
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;padding:15px;border: 1px solid #ddd;background-color:#3498db;color:#ffffff;" colspan="2">DESCRIPCIÓN</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 15px;border: 1px solid #ddd">
                            '.$descripcion.'
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

    echo "<script>alert('SE HA ENVIADO LA NOTIFICACIÓN');</script>";
}

    $idpagina = 5; //id de la pagina mas flexible
    //consultamos la pagina5 = masflexible
    $query = "SELECT * FROM pagina5 WHERE idpagina5 = $idpagina";
    $consultar = $mysqli->query($query);
    $contenido = $consultar->fetch_assoc();
 ?>

<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $contenido['meta_description']; ?>">
    <meta name="author" content="MasKapital">
    <title>Atención a clientes | Más kapital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="img/logos/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#menu_oculto').hide(0);
            $(window).scroll(function(){
                var windowHeight = $(window).scrollTop();
                var contenido2 = $("#atencion-clientes").offset();
                contenido2 = contenido2.top;
                if(windowHeight >= contenido2  ){
                    $('#menu_oculto').fadeIn(500);
                }else{
                    $('#menu_oculto').fadeOut(500);
                }
            });
        });
    </script>
    <style>
        #menu_oculto{
            z-index: 1;
            margin: 0 auto;
            top: 10px;
            position: fixed;
            width: 100%;
            padding: 30px 10px 30px 10px;
        }
    </style>


</head><!--/head-->

<body>
	<?php
    $menu = 'atencion';
    include('header.php');
     ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style='border-top:10px solid #263c89;border-bottom: 10px solid #8787b7;'>
            </div>
        </div>
    </div>
    <!--/#header-->

    <section id="atencion-clientes">
        <div class="container" style="background-color: #f0f0f6;padding-top:3em;margin-bottom:1em;">
            <div class="row" >
                <div class="col-md-12 text-center">
                    <h1 style="color: #2a3031;font-size:50px;padding-bottom:1em;"><b>ATENCIÓN A CLIENTES</b></h1>
                </div>
            </div>
        </div>
        
    </section>

    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?> 


    <section id="">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 text-center" style="background-color: #f58947;border:10px solid #ffffff;">
                    
                    <div class="text-center col-xs-12">
                        <h1 class="text-center" style="color:#ffffff;padding-top:1em;"><b><?php echo $contenido['sec2_cont1']; ?></b></h1>
                    </div>
                    <div class="col-xs-12">
                        <div class="text-center" style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color: #ffffff;"><b><?php echo $contenido['sec2_cont2']; ?></b></h2>
                    </div>
                    <div class="col-xs-12">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color:#ffffff;margin:1em;"><?php echo $contenido['sec2_cont3']; ?></h2>
                    </div>
                    <div class="col-xs-12" style="padding-bottom:2em;">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <p style="color:#ffffff;margin-top:1em;"><?php echo $contenido['sec2_cont4']; ?></p>
                    </div>  
                </div>
                <div id="ayuda" class="col-md-8 col-xs-12 text-justify">
                    <div class="col-sm-8">
                        <h2><b><?php echo $contenido['sec1_titulo1']; ?></b></h2>
                        <p>
                            <?php echo $contenido['sec1_cont1']; ?>
                        </p>          
                    </div>
                    <div class="hidden-xs col-sm-4">
                        <img src="<?php echo 'administracion/'.$contenido['img']; ?>" alt="">
                    </div>
                    <div class="visible-xs col-xs-12">
                        <img style="height:200px;" src="<?php echo 'administracion/'.$contenido['img']; ?>" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 text-center" style="background-color: #4f5898;border:10px solid #ffffff;">

                    <div class="text-center col-xs-12">
                        <h2 class="text-center" style="color:#ffffff;padding-top:1em;margin-bottom:0px;"><b>Conoce el</b></h2>
                    </div>
                    <div class="col-xs-12">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color: #ffffff;margin:0px;"><b>Aviso de</b></h2>
                    </div>
                    <div class="col-xs-12">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color:#ffffff;margin:0px;">Privacidad</h2>
                    </div>
                    <div class="col-xs-12" style="padding-bottom:2em;">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color:#ffffff;margin:0px;">es tu derecho</h2>
                    </div>
                    <div class="col-xs-12">
                        <a class="btn btn-default" href="<?php echo 'administracion/'.$contenido['archivo']; ?>" target="_new" style="width:200px;margin-bottom:3em;">
                            <img src="img/atencion_clientes/btn.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 text-center">
                    <form id="formulario_ayuda" action="" method="POST">
                        <div class="col-sm-12" style="margin-bottom:1em;">
                            <select class="form-control" id="tema_motivo" name="tema_motivo" required>
                                <option value="">* TEMA O MOTIVO</option>
                                <option value="SOLICITA INFORMACIÓN">SOLICITA INFORMACIÓN</option>
                                <option value="ACLARACIONES DE CRÉDITO">ACLARACIONES DE CRÉDITO</option>
                                <option value="QUEJAS Y SUGERENCIAS">QUEJAS Y SUGERENCIAS</option>
                                <option value="INFORMACIÓN LEGAL">INFORMACIÓN LEGAL</option>
                                <option value="PROVEEDORES">PROVEEDORES</option>
                                <option value="DENUNCIAS">DENUNCIAS</option>
                                <option value="OTROS">-- OTROS --</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <p style="background-color: #d2ecfb;padding:10px;"><b>DATOS DE IDENTIFICACIÓN</b></p>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" id="sucursal" name="sucursal" required>
                                <option value="">SUCURSAL QUE LE ATIENDE</option>
                                <?php 
                                $query = "SELECT * FROM sucursales";
                                $consultar = $mysqli->query($query);
                                while($sucursales = $consultar->fetch_assoc()){
                                    echo '<option value="'.$sucursales['idSucursales'].'">'.$sucursales['NombreSucursal'].'</option>';
                                }
                                 ?>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="grupo" name="grupo" value="" placeholder="GRUPO AL QUE PERTENECE" onBlur="ponerMayusculas(this)">
                        </div>
                        
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="" placeholder="APELLIDO PATERNO" onBlur="ponerMayusculas(this)">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="" placeholder="APELLIDO MATERNO" onBlur="ponerMayusculas(this)">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="* NOMBRE(S)" onBlur="ponerMayusculas(this)" required>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="" placeholder="DIRECCIÓN" onBlur="ponerMayusculas(this)" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="municipio" name="municipio" value="" placeholder="MUNICIPIO" onBlur="ponerMayusculas(this)" required>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control" id="estado" name="estado">
                                <option value="">ESTADO</option>
                                <?php 
                                $query = "SELECT * FROM estados";
                                $consultar = $mysqli->query($query);
                                while($estado = $consultar->fetch_assoc()){
                                    echo '<option value="'.utf8_encode($estado['nombre']).'">'.utf8_encode($estado['nombre']).'</option>';
                                }
                                 ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="CORREO ELECTRÓNICO" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="NÚMERO TELEFÓNICO CON LADA">
                        </div>
                        <div class="col-sm-12">
                            <p style="background-color: #d2ecfb;padding:10px;margin-top:10px;"><b>DESCRIPCIÓN</b></p>
                        </div>      
                        <div class="col-sm-12">
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="10" placeholder="Para un atención más ágil, describa a detalle y si los tuviera puntualizando datos exactos." onBlur="ponerMayusculas(this)" required></textarea>
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" name="correo_ayuda" value="1">
                            <input type="submit" class="form-control btn btn-primary" value="ENVIAR" onclick="return validar()">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <?php include('footer.php'); ?>

    <script>
        function validar() {

            tema = document.getElementById("tema_motivo").selectedIndex;
            if( tema == null || tema == 0 ) {
                alert('DEBES SELECCIONAR UN TEMA O MOTIVO');
                document.getElementById("tema_motivo").focus();
                return false;
            }
            sucursal = document.getElementById("sucursal").selectedIndex;
            if( sucursal == null || sucursal == 0 ) {
                alert('DEBES SELECCIONAR UNA SUCURSAL');
                document.getElementById("sucursal").focus();
                return false;
            }

            nombre = document.getElementById("nombre").value;
            if ( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
            // Si no se cumple la condicion...
                alert('DEBES DE INGRESAR TU NOMBRE');
                document.getElementById("nombre").focus();
                return false;

            }

            direccion = document.getElementById("direccion").value;
            if ( direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)) {
            // Si no se cumple la condicion...
                alert('DEBES DE INGRESAR TU DIRECCIÓN');
                document.getElementById("direccion").focus();
                return false;
            }

            municipio = document.getElementById("municipio").value;
            if ( municipio == null || municipio.length == 0 || /^\s+$/.test(municipio)) {
            // Si no se cumple la condicion...
                alert('DEBES DE INGRESAR TU MUNICIPIO');
                document.getElementById("municipio").focus();
                return false;
            }

            estado = document.getElementById("estado").selectedIndex;
            if( estado == null || estado == 0 ) {
                alert('DEBES SELECCIONAR TU ESTADO');
                document.getElementById("estado").focus();
                return false;
            }

            correo = document.getElementById("correo").value;
            if ( correo == null || correo.length == 0 || /^\s+$/.test(correo)) {
            // Si no se cumple la condicion...
                alert('DEBES DE INGRESAR UN CORREO ELECTRÓNICO DE CONTACTO');
                document.getElementById("correo").focus();
                return false;
            }

            descripcion = document.getElementById("descripcion").value;
            if ( descripcion == null || descripcion.length == 0 || /^\s+$/.test(descripcion)) {
            // Si no se cumple la condicion...
                alert('DEBES DE INGRESAR UNA DESCRIPCIÓN');
                document.getElementById("descripcion").focus();
                return false;
            }
           
            return true;
        }


        function aparecer(){
            var elements = document.getElementsByClassName('barra_lateral_2');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.display = 'inline';
                elements[i].style.transitionDelay = "2s";
            }
        }
        function desaparecer(){
            var elements = document.getElementsByClassName('barra_lateral_2');
            for(var i = 0, length = elements.length; i < length; i++) {
                elements[i].style.display = 'none';
                elements[i].style.transitionDelay = "2s";
            }
        }
        function ponerMayusculas(nombre) 
        { 
            nombre.value=nombre.value.toUpperCase(); 
        } 

    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>