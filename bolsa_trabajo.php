<!DOCTYPE html>
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

    <script language="javascript" src="js/jquery-1.3.min.js"></script>

<script language="javascript">
    $(document).ready(function() {

    $('#formTrabajo').on('submit', '#form, #fat, #form1', function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize({ checkboxesAsBools: true }),
              //data: $(this).serialize(),
              success: function(data) {
                $('#result').fadeIn(500);
                  $('#result').html(data);
                  $("form#fo3").find("input[type=text], select").val("");
              }
          })
          
          return false;
      }); 
    })  
</script>

<script type="text/javascript">
$(document).ready(function() {

$('.error').hide();

    $("#boton_trabajo").click(function() {

               
          var borrar=1;
      
                $.ajax({
                     url:"sqls.php",  
                     method:"POST",
                    data:{borrar:borrar},
                        success: function() { 
            }
        });
        return false;
    });
});


</script>

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
	<header id="header">      
        <div class="navbar navbar-inverse" role="banner" style="margin-bottom:-20px;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html" style="margin-top:10px;">
                    	<h1><img src="img/logos/logo_mas_kapital.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse" style="margin-top:10px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">
                            <b>¿QUIÉNES SOMOS? <i class="fa fa-angle-down"></i></b></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="index.html#mision-vision">MISIÓN Y VISIÓN</a></li>
                                <li><a href="normatividad.html">NORMATIVIDAD</a></li>
                                <li><a href="sucursales.html">SUCURSALES</a></li>
                            </ul>
                        </li>
                        <li><a href="mas_flexible.html">
                            <b>MÁS FLEXIBLE <i class="fa fa-angle-down"></i></b></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="mas_flexible.html#caracteristicas">MÁSPUNTOS</a></li>
                                <li><a href="mas_flexible.html#donde-pagar">¿DÓNDE PAGAR?</a></li>
                            </ul>
                        </li>
                        <li><a href="universidad_mk.html"><b>UNIVERSIDAD MK</b></a></li>
                        <li class="active"><a href="bolsa_trabajo.html"><b>BOLSA DE TRABAJO</b></a></li>
                        <li><a href="atencion_clientes.html"><b>ATENCIÓN A CLIENTES</b></a></li>             
                    </ul>
                </div>
            </div>
        </div>
    </header>

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
                    <button class="text-center" name="boton_trabajo" id="boton_trabajo" data-toggle="modal" data-target="#modal_frm_trabajo" style="width:300px;border:0px;">
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
                                <h3><b>Datos Denunciante:</b></h3>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>                            
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ubicación (Estado):</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>                            
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <h3><b>Datos Denuncia:</b></h3>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre:</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>                            
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sucursal:</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>                            
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Otro Departamento:</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>                            
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Motivo:</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>                            
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripción:</label>
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
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



<!-- MODAL FORMULARIO TRABAJO -->
<div class="modal fade" id="modal_frm_trabajo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="formTrabajo" name="formTrabajo">
        <div class="modal-content" id="result" name="result">
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
                            08/12/2016
                        </div>
                        <div class="col-xs-4">
                            ASESOR DE CRÉDITO(de acuerdo a la opción seleccionada)
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
                                            <option value="1">Oaxaca</option>
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
