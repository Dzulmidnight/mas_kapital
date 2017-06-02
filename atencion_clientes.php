        </divr>
<?php
require_once('conexion/conexion.php');
require_once('correo/mail.php');
require_once('funciones/funciones.php');

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

    //Insertamos la informacion del formulario en BD
    $insertSQL = sprintf("INSERT INTO frm_atencion(tema_motivo, sucursal, grupo, nombre, ap_paterno, ap_materno, direccion, municipio, estado, correo, telefono, descripcion, fecha) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
        GetSQLValueString($tema_motivo, "text"),
        GetSQLValueString($sucursal, "int"),
        GetSQLValueString($grupo, "text"),
        GetSQLValueString($nombre, "text"),
        GetSQLValueString($ap_paterno, "text"),
        GetSQLValueString($ap_materno, "text"),
        GetSQLValueString($direccion, "text"),
        GetSQLValueString($municipio, "text"),
        GetSQLValueString($estado, "int"),
        GetSQLValueString($correo, "text"),
        GetSQLValueString($telefono, "text"),
        GetSQLValueString($descripcion, "text"),
        GetSQLValueString($fecha, "int"));
    $mysqli->query($insertSQL);





    $asunto = 'Atención a Clientes | '.$tema_motivo.'';

    $cuerpo_mensaje = '
        <html>
        <head>
            <meta charset="utf-8">
        </head>
        <body>

            <table style="font-family: Tahoma, Geneva, sans-serif; font-size:13px; color: #797979;border: 1px solid #ddd;text-align: left;border-collapse: collapse;width: 100%;" >
                <thead>
                    <tr>
                        <th style="padding: 15px;border: 1px solid #ddd" align="center">
                            LOGO MÁSKAPITAL
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
                            '.$sucursal.'
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
    if(isset($correos_oc['email1'])){
        $token = strtok($correos_oc['email1'], "\/\,\;");
        while ($token !== false)
        {
            $mail->AddCC($token);
            $token = strtok('\/\,\;');
        }
    }
    if(isset($correos_oc['email2'])){
        $token = strtok($correos_oc['email2'], "\/\,\;");
        while ($token !== false)
        {
            $mail->AddCC($token);
            $token = strtok('\/\,\;');
        }
    }

    $mail->Subject = utf8_decode($asunto);
    $mail->Body = utf8_decode($cuerpo_mensaje);
    $mail->MsgHTML(utf8_decode($cuerpo_mensaje));
    $mail->Send();
    $mail->ClearAddresses();
    $mail->ClearAttachments();

    echo "<script>alert('SE HA ENVIADO LA NOTIFICACIÓN');</script>";
}
 ?>

<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

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
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>

    <?php
    //SE INCLUYE EL MENÚ LATERAL
    include('menu_lateral.php');
     ?> 

    <!--/#home-slider-->
    <!--<section id="atencion" style="background-image: url('img/atencion_clientes/banner_atencion.png');background-repeat:no-repeat; padding-top:5em;">-->
    <section id="">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 text-center" style="background-color: #f58947;border:10px solid #ffffff;">
                    
                    <div class="text-center col-xs-12">
                        <h1 class="text-center" style="color:#ffffff;padding-top:1em;"><b>UNE</b></h1>
                    </div>
                    <div class="col-xs-12">
                        <div class="text-center" style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color: #ffffff;"><b>Unidad Especializada de Atención a Clientes</b></h2>
                    </div>
                    <div class="col-xs-12">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <h2 style="color:#ffffff;margin:1em;">Denuncia</h2>
                    </div>
                    <div class="col-xs-12" style="padding-bottom:2em;">
                        <div style="border-top:3px solid #ffffff;width:200px;margin: 0 auto;"></div>
                        <p style="color:#ffffff;margin-top:1em;">UNE_ACLARACIONESMK@maskapital.com.mx</p>
                    </div>  
                </div>
                <div id="ayuda" class="col-md-8 col-xs-12 text-justify">
                    <div class="col-sm-8">
                        <h2><b>ESTAMOS PARA AYUDARLE</b></h2>
                        <p>
                            Para brindarle un contacto directo y seguro con su financiera MásKapital, permitiéndole a clientes y externos aclarar dudas, quejas y sugerencias, ponemos a su disposición un buzón, el cual llegará al departamento correspondiente, iniciando en el momento en que envía su información un proceso de revisión y seguimiento, que asegura una respuesta oportuna y confiable.
                        </p>
                        <p>
                            Rellene el siguiente formulario para poder ayudarle.
                        </p>           
                    </div>
                    <div class="hidden-xs col-sm-4">
                        <img src="img/atencion_clientes/img_atencion.png" alt="">
                    </div>
                    <div class="visible-xs col-xs-12">
                        <img style="height:200px;" src="img/atencion_clientes/img_atencion.png" alt="">
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
                        <a class="btn btn-default" href="documentos/AVISO DE PRIVACIDAD KAPITALMUJER.docx" target="_new" style="width:200px;margin-bottom:3em;">
                            <img src="img/atencion_clientes/btn.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 text-center">
                    <form id="formulario_ayuda" action="" method="POST">
                        <div class="col-sm-12" style="margin-bottom:1em;">
                            <select class="form-control" id="tema_motivo" name="tema_motivo" required>
                                <option value="">* TEMA O MOTIVO</option>
                                <option value="1">SOLICITA INFORMACIÓN</option>
                                <option value="2">ACLARACIONES DE CRÉDITO</option>
                                <option value="3">QUEJAS Y SUGERENCIAS</option>
                                <option value="4">INFORMACIÓN LEGAL</option>
                                <option value="5">PROVEEDORES</option>
                                <option value="6">DENUNCIAS</option>
                                <option value="7">-- OTROS --</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <p style="background-color: #d2ecfb;padding:10px;"><b>DATOS DE IDENTIFICACIÓN</b></p>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" id="sucursal" name="sucursal" required>
                                <option value="">SUCURSAL QUE LE ATIENDE</option>
                                <option value="1">OAXACA</option>
                                <option value="2">PUEBLA</option>
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
                                <option value="1">OAXACA</option>
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

    <section id="footer_2" style="margin-top:5em;">
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
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"><b>BUZÓN DE DENUNCIAS PLD</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="">
                            <div class="col-xs-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="info" colspan="2"><b>Datos Denunciante:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="" placeholder="Nombre">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder="Ubicación(Estado):">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder="Teléfono:">
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
                                            <input type="text" class="form-control" name="" placeholder="Nombre:">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder="Sucursal:">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder="Otro departamento:">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="" placeholder="Motivo:">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <textarea class="form-control" rows="5" name="" placeholder="Descripción:"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xs-12">
                                <p>Debes seleccionar la casilla para poder enviar el correo</p>
                                <div class="g-recaptcha" data-sitekey="6LfhBiIUAAAAAFgntz5Hso60CCY6uRthO4C7Z0UV"></div>    
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Enviar Correo</button>
                </div>
            </div>
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