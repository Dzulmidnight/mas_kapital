<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bolsa de Trabajo | Más kapital</title>
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
                var contenido2 = $("#bolsa-trabajo").offset();
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

    <style>
.carousel-indicators {

  position: absolute;
  bottom: 40%;
  z-index: 15;
  width: 30px;
  margin-left: 20px;
  list-style: none;
  text-align: center;
  right: 5%;
  left:95%
}
.carousel-indicators li{
  display: block;
  width: 20px;
  height: 20px;
  margin-bottom: 20px;
}
.carousel-indicators .active {
 width: 22px;
 height: 22px;
 margin-bottom: 20px;
 background-color: #fff;
}
ul {
    list-style-image: url('img/mas_flexible/circulo.png');
    margin: 4em;
}       
        
    </style>
</head><!--/head-->

<body>
	<?php
    $menu = 'bolsa';
    include('header.php');
     ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style='border-top:10px solid #263c89;border-bottom: 10px solid #8787b7;'>
            </div>
        </div>
    </div>
    <!--/#header-->

    <section id="bolsa-trabajo">
        <div class="container" style="background-color: #f0f0f6;padding-bottom:2em;">
            <div class="row">
                <div class="col-md-12 text-center" style="padding-top:2em;padding-bottom:2em;">
                    <h1 style="color: #2a3031;font-size:50px"><b>BOLSA DE TRABAJO</b></h1>
                    <h2 style="font-size:30px;color:#58585a"><i>Ninguno es tan bueno como todos juntos.</i></h2>
                </div>

            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>

     <div id="menu_oculto">
        <div id="div_lateral">
            <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
                <div class="barra_lateral_2" style="right:0px;display:none">
                    <a style="color:#ffffff;" href="index.html"><b>¿QUIÉNES SOMOS?</b></a>
                </div>
                <a href="index.html"><img src="img/logos/ico_maskapital.png" alt=""></a>
            </div>
            <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
                <div class="barra_lateral_2" style="right:0px;display:none">
                    <a style="color:#ffffff;" href="index.html"><b>UNIVERSIDAD MK</b></a>
                </div>
                <a href="universidad_mk.html"><img src="img/logos/ico_universidad.png" alt=""></a>
            </div>
            <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
                <div class="barra_lateral_2" style="padding-left:49px;display:none">
                    <a style="color:#ffffff;" href="index.html"><b>MÁSFLEXIBLE</b></a>
                </div>
                <a href="mas_flexible.html"><img src="img/logos/ico_masflexible.png" alt=""></a>
            </div>
            <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
                <div class="barra_lateral_2" style="padding-left:53px;display:none">
                    <a style="color:#ffffff;" href="index.html"><b>MÁSPUNTOS</b></a>
                </div>
                <a href=""><img src="img/logos/ico_maspuntos.png" alt=""></a>
            </div>
            <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
                <div class="barra_lateral_2" style="padding-left:53px;display:none">
                    <a style="color:#ffffff;" href="index.html"><b>SUCURSALES</b></a>
                </div>
                <a href="sucursales.html"><img src="img/logos/ico_localizacion.png" alt=""></a>
            </div>
        </div>
    </div>

    <!--/#home-slider-->
    <section>
        <div class="container" style="padding-top:10em;padding-bottom:10em;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>SECCIÓN DINAMICA</h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row" id="talento">
                <div class="text-center col-md-12" style="margin-top:35%">
                    <button class="text-center" id="boton_trabajo" data-toggle="modal" data-target="#modal_frm_trabajo" style="width:300px;border:0px;">
                        <h3 style="margin-top:1em;margin-bottom:1em;"><b>ENVÍANOS TUS DATOS</b></h3 style="color:#fff">
                    </button>
                </div>
                <div class="col-md-12" style="margin-top:5%;border-top: 3px solid #fff; border-bottom: 3px solid #fff;width:70%;left:15%">
                    <h1 class="text-center" style="color:#fff;font-size:50px;">Tu talento es bienvenido</h1>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->


    <!-- INICIA FOOTER -->
    <?php 
    include('footer.php');
     ?>
    <!-- TERMINA FOOTER -->



<!-- MODAL FORMULARIO TRABAJO -->
<div class="modal fade" id="modal_frm_trabajo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Formulario Vacantes</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="" method="POST">
                        <div class="col-xs-12">
                            <h3><b>INGRESA TU SOLICITUD</b></h3>
                        </div>
                        <div class="col-xs-4">
                            08/12/2016
                        </div>
                        <div class="col-xs-4">
                            ASESOR DE CRÉDITO(de acuerdo a la opción seleccionada)
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="" placeholder="SUELDO MENSUAL DESEADO">
                        </div>
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="info text-center" colspan="8">DATOS PERSONALES</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="APELLIDO PATERNO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="APELLIDO MATERNO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="NOMBRE(S)">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="EDAD (AÑOS)">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="DOMICILIO (TIPO VIALIDAD Y NOMBRE)">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="NO. EXT.">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="NO. INT.">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="COLONIA">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="DELEGACIÓN O MUNICIPIO">
                                    </td>
                                    <td colspan="3">
                                        <select class="form-control" name="" id="">
                                            <option value="">ESTADO</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="CODIGO POSTAL">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="TELÉFONO CASA">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="TELÉFONO CELULAR">
                                    </td>
                                    <td colspan="4">
                                        <input type="email" class="form-control" name="" placeholder="CORREO ELECTRONICO">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="TIEMPO DE RESIDIR EN EL DOMICILIO ACTUAL">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="VIVE CON:">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="ESPECIFICA">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p>PERSONAS QUE DEPENDEN DE USTED</p>
                                        <input type="checkbox"> HIJOS
                                        <input type="checkbox"> CÓNYUGE
                                        <input type="checkbox"> PADRES
                                        <input type="checkbox"> OTROS
                                    </td>
                                    <td colspan="2">
                                        <select class="form-control" name="" id="">
                                            <option value="">ESTADO CIVIL:</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="ESPECIFICA">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="6" class="info text-center">DOCUMENTACIÓN</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="CLAVE ÚNICA DE REGISTRO DE POBLACIÓN (CURP)">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="REGISTRO FEDERAL DE CONTRIBUYENTES (RFC)">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="NÚMERO DE SEGURO SOCIAL (IMSS)">
                                    </td>
                                    <td colspan="2">
                                        <select class="form-control" name="" id="">
                                            <option value="">LICENCIA DE CONDUCIR</option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="CLASE Y NO. DE LICENCIA">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3" class="info text-center">ESTADO DE SALUD Y HÁBITOS PERSONALES</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="">SU ESTADO DE SALUD:</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="">¿PADECE DE ALGUNA ENFERMEDAD?</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="ESPECIFIQUE ENFERMEDAD">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="¿CUAL ES SU META EN LA VIDA?">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- inicia datos familiares -->

                        <div class"col-xs-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="4" class="info text-center">DATOS FAMILIARES</td>
                                </tr>
                                <tr>
                                    <td>
                                        NOMBRE
                                    </td>
                                    <td>
                                        VIVE/FINADO
                                    </td>
                                    <td>
                                        DOMICILIO
                                    </td>
                                    <td>
                                        OCUPACIÓN
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="PADRE">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="MADRE">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="ESPOSA(O)">
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <input type="text" class="form-control" name="" placeholder="NOMBRES Y EDADES DE LOS HIJOS">
                                    </td>
                                </tr>
                            </table>
                        </div>    

                        
                        <!-- termina datos familiares -->
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
                                        <input type="text" class="form-control" name="" placeholder="NIVEL/NOMBRE">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="DE">
                                    </td>
                                    <td>A</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="AÑOS">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">EN CASO DE ESTUDIOS PROFESIONALES:</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="NOMBRE DE LA CARRERA">
                                    </td>
                                    <td colspan="3">
                                        <select class="form-control" name="" id="">
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
                                        <input type="text" class="form-control" name="" placeholder="NOMBRE DE LA ESCUELA">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="CURSO O CARRERA">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="DIAS EN LOS QUE ASISTE">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="HORARIO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="NIVEL/GRADO ACTUAL">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info" colspan="6">CONOCIMIENTOS GENERALES</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="FUNCIONES DE OFICINA QUE DOMINA">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="PROGRAMAS DE CÓMPUTO (SOFTWARE) QUE DOMINA">
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
                                        <input type="text" class="form-control" name="" placeholder="NOMBRE DE LA COMPAÑIA">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="INICIO(MM/YY)">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="TERMINO(MM/YY)">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="DIRECCIÓN">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="TELÉFONO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="PUESTO DESEMPEÑADO">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="MOTIVO">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="ÚLTIMO SALARIO(MENSUAL)">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="NOMBRE DE SU JEFE">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="PUESTO DE SU JEFE">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">¿PODEMOS SOLICITAR INFORMACIÓN DE USTED?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="5">
                                        <input type="text" class="form-control" name="" placeholder="¿PORQUE?">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xs-6 text-right">
                            Lista de Trabajos Anteriores
                        </div>
                        <div class="col-xs-6">
                            <select class="form-control" name="" id="">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center">
                            <button class="btn btn-primary">Guardar Trabajo</button>
                        </div>
                        <div class="col-xs-4 text-center">
                            <button class="btn btn-primary">Eliminar Trabajo</button>
                        </div>
                        <div class="col-xs-4 text-center">
                            <button class="btn btn-primary">Limpiar Campos</button>
                        </div>

                        <!--<div class="col-xs-12">
                            <h3 class="alert alert-info"><b>ESCOLARIDAD (Solamente último nivel académico)</b></h3>
                        </div>
                        <div class="col-xs-2">
                            DATOS DE LA ESCUELA
                            <input type="text" class="form-control" name="" placeholder="NIVEL/NOMBRE">
                        </div>
                        <div class="col-xs-2">
                            DIRECCIÓN
                            <input type="text" class="form-control" name="" placeholder="">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" class="form-control" name="" placeholder="DE">
                        </div>
                        <div class="col-xs-1">
                           A
                        </div>
                        <div class="col-xs-2">
                            
                            <input type="text" class="form-control" name="" placeholder="AÑOS">
                        </div>
                        <div class="col-xs-3">
                            DOCUMENTO RECIBIDO
                            <input type="text" class="form-control" name="" placeholder="">
                        </div>-->
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
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                               </tr>
                               <tr>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>
                               </tr>
                            </table>
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
                                        <input type="text" class="form-control" name="" placeholder="">
                                   </td>
                                   <td>
                                       <select class="form-control" name="" id="">
                                           <option value=""></option>
                                       </select>
                                   </td>
                                   <td colspan="3">
                                       <input type="text" class="form-control" name="" placeholder="¿QUIEN ES SU PARIENTE?">
                                   </td>
                                </tr>
                                <tr>
                                   <td colspan="3">¿PUEDE VIAJAR?</td>
                                   <td colspan="3">¿ESTA DISPUESTO A CAMBIAR SU LUGAR DE RESIDENCIA?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="EXPLIQUE">
                                    </td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="EXPLIQUE">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">FECHA EN LA QUE PODRIA PRESENTARSE A TRABAJAR</td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="">
                                    </td>
                                </tr>
                            </table>
                            
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
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="IMPORTE MENSUAL">
                                    </td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="PERCEPCIÓN MENSUAL">
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
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="VALOR APROXIMADO">
                                    </td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="RENTA MENSUAL">
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
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="MARCA">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="" placeholder="MODELO">
                                    </td>

                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" class="form-control" name="" placeholder="IMPORTE DEL ADEUDO">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="¿CUANTO ABONA MENSUALMENTE?">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" class="form-control" name="" placeholder="¿A CUANTO ASCIENDEN SUS GASTOS MENSUALES?">
                                    </td>
                                </tr>


                            </table>
                        </div>
                        <div class="col-xs-12">
                            <input type="checkbox"> HAGO CONSTAR QUE TODOS LOS DATOS ASENTADOS EN LA PRESENTE SOLICITUD SON CIERTOS Y AUTORIZO A KAPITALMUJER, SA DE CV SOFOM ENR A VERIFICARLOS.
                        </div>
                        <div class="col-xs-12">
                            <p style="color:red">Debes seleccionar la casilla para poder enviar el correo</p>
                            <div class="g-recaptcha" data-sitekey="6LfhBiIUAAAAAFgntz5Hso60CCY6uRthO4C7Z0UV"></div>    
                        </div>


                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Enviar Solicitud</button>
            </div>
        </div>
    </div>
</div>
<!-------------------------->
    <script>
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
    </script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
