<?php
 
// grab recaptcha library
require_once "recaptchalib.php";
 
?>
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
    <link rel="stylesheet" href="dist/themes/default/style.css" />
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
    <script language="javascript" src="js/jquery-1.3.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="dist/jstree.min.js"></script>

<!-- <script language="javascript">   -->
    <!-- function GuardarTrabajo(){ -->
        <!-- alert ('GuardarTrabajo'); -->
<!-- // var Compania = $('#Compania').val(); -->
<!-- // var FechaInicio = $('#FechaInicio').val();
// var FechaTermino = $('#FechaTermino').val();
// var Direccion = $('#Direccion').val();
// var Telefono = $('#Telefono').val();
// var Puesto = $('#Puesto').val();
// var Motivo = $('#Motivo').val();
// var Salario = $('#Salario').val();
// var NombreJefe = $('#NombreJefe').val();
// var PuestoJefe = $('#PuestoJefe').val();
// var Informacion = $('#Informacion').val();
// var Porque = $('#Porque').val();
// var Ax=1;

//         $.ajax({ 
//             type: 'POST', 
//             url: 'sqls.php',
//             data: {Compania:Compania,
//                     FechaInicio:FechaInicio,
//                     FechaTermino:FechaTermino,
//                     Direccion:Direccion,
//                     Telefono:Telefono,
//                     Puesto:Puesto,
//                     Motivo:Motivo,
//                     Salario:Salario,
//                     NombreJefe:NombreJefe,
//                     PuestoJefe:PuestoJefe,
//                     Informacion:Informacion,
//                     Porque:Porque,
//                     Ax:Ax}, 
//             success: function(data) { 
//             $('#TrabajoAnt').html(data); 
//             $('#result div').slideDown(1000); 
//             } 
//         });
    } 
</script> -->


<script>
    $(document).ready(function(e) {
    // Capturamos el evento submit del formulario
    $('#formTrabajo').on('submit', '#form, #fat, #form2', function() {
        $respuesta=false; // Suponemos por defecto que la validación será erronea
        // Realizamos llamada en AJAX
        $.ajax({
        url:"vrfcaptcha.php",  // script al que le enviamos los datos
        type:"POST",           // método de envío POST
        dataType:"json",       // la respuesta será en formato JSON
        data: $(this).serialize({ checkboxesAsBools: true }),
        async:false,     // Llamada síncrona para que el código no continúe hasta obtener la respuesta
        success:         // Si se ha podido realizar la comunicación
            function(msg){
               $respuesta=msg.success; // Obtenemos el valor de estado de la validación
               if($respuesta) {        // La validación ha sido correcta
                // Eliminamos del formulario el campo que contiene los parámetros de validación
                $("#g-recaptcha-response","#form2").remove();
               } else    {
                  alert('Porfavor Valide el reCATPCHA'); // Mostramos mensaje
               } 
        },
        error:  // En caso de error de comunicación mostraremos mensaje de aviso con el error
            function (xhr, ajaxOptions, thrownError){
                alert('Url: '+this.url+'\n\r’+’Error: '+thrownError);
            }  
        }); // Final de la llamada en AJAX
        // Si la respuesta es true continuará el evento submit, de lo contrario será cancelado
        return $respuesta;
        });
    });
  </script>  
<script type="text/javascript">
    $(document).ready(function(){
        <?
        if (isset($_GET['acc'])==1){ ?>
        $('#modalAlert').modal('toggle');
    <?}?>
    });
</script>
<script language="javascript">
    $(document).ready(function() { //Guarda y muestra la siguiente seccion del modal Solicitud trabajo
    $('#formTrabajo').on('submit', '#form, #fat, #form1', function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize({ checkboxesAsBools: true }),
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

<script language="javascript">
    function btnPostularse(idVacante) { 
        var idVacante=idVacante;
        var Ax='5';
        $.ajax({ 
            type: 'POST', 
            url: 'sqls.php',
            data: {idVacante:idVacante,Ax:Ax}, 
            success: function(data) { 
            $('#requisitos').html(data); 
            $('#requisitos div').slideDown(1000); 
            } 
        });
    }  
</script>
<script language="javascript">  
         function NuevoR(){
            var parte=0;
            $.ajax({ 
            type: 'POST', 
            url: 'sqls.php',
            data: {parte:parte}, 
            success: function(data) { 
            } 
        });
        }
</script>

<script language="javascript">  
    $(document).ready(function(){ //Elimina los registros de solicitudes de trabajo no terminadas (cuando cierra el modal)
$('#modal_frm_trabajo').on('hidden.bs.modal', function (e) {
<? include ('conexion.php');
            $sql="UPDATE SolicitudTrabajo SET Estatus='0' WHERE SolicitudTrabajo.Seccion<10";
            $mysqli->query($sql);

            $sqlD="DELETE FROM Solicitante WHERE EXISTS (SELECT 1 FROM SolicitudTrabajo WHERE Solicitante.idSolicitante = SolicitudTrabajo.idSolicitante AND SolicitudTrabajo.Seccion < 10 AND SolicitudTrabajo.Estatus=0)";
            $mysqli->query($sqlD);
?>
        });
    })
</script>

<script language="javascript">
    function btnAtras() { // Muestra la seccion anterior de la solicitud de trabajo ( boton atras)
        var parte2=1;
        var pagina1 = $('#parte').val();
        pagina = pagina1-2;
        $.ajax({ 
            type: 'POST', 
            url: 'sqls.php',
            data: {parte2:parte2,pagina:pagina}, 
            success: function(data) { 
            $('#result').html(data); 
            $('#result div').slideDown(1000); 
            } 
        });
    }  
</script>
<script language="javascript">
    function BorrarTrabajo() {
    var Trabajo = $('#TrabajoAnt').val();
    var Ax='2';
    alert ('Trabajo Eliminado');
        $.ajax({ 
            type: 'POST', 
            url: 'sqls.php',
            data: {Trabajo:Trabajo,Ax:Ax}, 
            success: function(data) { 
                $('#TrabajoAnt').html(data); 
            } 
        });
    }  
</script>
<script language="javascript">
    function GuardarTrabajo() {
var Compania = $('#Compania').val();
var FechaInicio = $('#FechaInicio').val();
var FechaTermino = $('#FechaTermino').val();
var Direccion = $('#Direccion').val();
var Telefono = $('#Telefono').val();
var Puesto = $('#Puesto').val();
var Motivo = $('#Motivo').val();
var Salario = $('#Salario').val();
var NombreJefe = $('#NombreJefe').val();
var PuestoJefe = $('#PuestoJefe').val();
var Informacion = $('#Informacion').val();
var Porque = $('#Porque').val();
var Ax='1';
        $.ajax({ 
            type: 'POST', 
            url: 'sqls.php',
            data: {Compania:Compania,
                    FechaInicio:FechaInicio,
                    FechaTermino:FechaTermino,
                    Direccion:Direccion,
                    Telefono:Telefono,
                    Puesto:Puesto,
                    Motivo:Motivo,
                    Salario:Salario,
                    NombreJefe:NombreJefe,
                    PuestoJefe:PuestoJefe,
                    Informacion:Informacion,
                    Porque:Porque,
                    Ax:Ax}, 
            success: function(data) { 
                $('#TrabajoAnt').html(data); 
                $("form#form1").find("input[type=text], select, textarea").val("");

            } 
        });
    }  
</script>
<script>
    function LimpiarCampos(){
        $("form#form1").find("input[type=text], select, textarea").val("");
    }
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
        
    </section>
    <?php 
    include('menu_lateral.php');
     ?>

<section>
    <div style="padding-top:1em;padding-bottom:1em; height:29em ">
        <div class="container">
            <div class="row" style="height: 100%">
                <div class="col-md-3" style=" background:#8787b7; padding: 0em; color:#ffffff; height: 29em">
                    <h2  style="color:#ffffff" class="text-center">FILTRAR</h2>
                    <div style="background-color: #263c89; padding:2em 0em 1em 2em; height: 100%; overflow-x: scroll;" class="acidjs-css3-treeview" id="cheksbx">

<ul style="font-size: 1.3em;">
<?php
include ('conexion.php');
$Aux=0;
//$sqlSuc="SELECT DISTINCT Estado FROM Sucursales";
$sqlSuc="SELECT Sucursales.Estado FROM vacantes INNER JOIN Sucursales ON vacantes.idSucursales = Sucursales.idSucursales GROUP BY Sucursales.Estado";

$sqlResE=$mysqli->query($sqlSuc);
while ($fila=$sqlResE->fetch_row()) 
{ 
  if ($Aux=0) {
?><li data-jstree='{ "opened" : true }' id="<?php echo $fila[0] ?>"> <?php echo $fila[0]?>
<? } else {
    ?> <li id="<?php echo $fila[0]?>"> <?php echo $fila[0]?>
    <?} ?>
        <ul>
        <?php  
        //$sqlMun="SELECT idSucursales,Municipio FROM Sucursales WHERE Estado='$fila[0]' ";
        $sqlMun="SELECT vacantes.idSucursales, Sucursales.Municipio FROM vacantes INNER JOIN Sucursales ON vacantes.idSucursales = Sucursales.idSucursales WHERE Estado = '$fila[0]' GROUP BY vacantes.idSucursales";
        $ResMun=$mysqli->query($sqlMun); 

        while ($Mun=$ResMun->fetch_row())
        { 
              if ($Aux=0) {?>
            <li data-jstree='{"selected" : false}' id="<?php echo $Mun[1]?>" value="<?php echo $Mun[1]; ?>" ><?php echo $Mun[1]; ?></li>
    <?}        else
                { 
                ?> <li id="<?php echo $Mun[1]?>" value="<?php echo $Mun[1]; ?>" ><?php echo $Mun[1]; ?> </li>
              <?  }


     } ?>
        </ul>
    </li>
<? $Aux++; } ?>
</ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div style="background-color: #8787b7">
                    <label class="h4" style="color:white">Resultados Obtenidos:</label></div>
                    <div class="container-fluid" style="padding-left: 0em ">
                        <div class="row">
                            <div class="col-md-7" style="height: 30em; overflow-x: scroll;">
                                <div id="divPuesto" name="divPuesto">

                                </div>
                                </div>
                            <div class="col-md-5" style="height: 30em; overflow-x: scroll;">
                                <div class="row">
                                    <label class="h4">Requisitos de la vacante</label>
                                    <div class="col-md-12" id="requisitos" name="requisitos">
                                    </div>
                                </div>
                            </div>                        

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="margin-top:10em;">
    <div class="container"> 
        <div class="row" id="talento">
            <div class="text-center col-md-12" style="margin-top:35%">
                <button onclick="NuevoR()" class="text-center" name="boton_trabajo" id="boton_trabajo" data-toggle="modal" data-target="#modal_frm_trabajo" style="width:300px;border:0px;">
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


    <?php 
    include('footer.php');
     ?>




<!-- MODAL FORMULARIO TRABAJO -->
<div class="modal fade" id="modal_frm_trabajo" name="modal_frm_trabajo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="formTrabajo" name="formTrabajo">
        <div class="modal-content" id="result" name="result">
        <?php include ('parte1.php');?>


        </div>
    </div>
</div>
<!-------------------------->

<!-- Modal -->
<div id="modalAlert" name="modalAlert" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body text-center">
        <h3>Gracias por querer formar parte de nosotros <br>¡SU SOLICITUD HA SIDO ENVIADA CON EXITO!</h3>      
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
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
 <script>
  $('#cheksbx')
  .bind("after_open.jstree", function (event, data) {
$(this).css("height","auto");
})
  .on("changed.jstree", function (e, data) {

            if(data.changed.selected.length) {
                var combo = data.changed.selected; 
                 var Ax='3';
                $.ajax({
                    type:'POST',
                    url:'sqls.php',
                    data:{Ax:Ax,combo:combo},
                    success:function(data){
                        $('#divPuesto').before(data); 
                    }
                });

            }else
            {
                var Ax='4';
                var combo = data.changed.deselected; 
                 $.ajax({
                    type:'POST',
                    url:'sqls.php',
                    data:{Ax:Ax,combo:combo},
                    success:function(data){

                        combo.forEach( function(valor, indice, array) {
                        var patron = " ",
                        nuevoValor    = "",
                        nuevaCadena = valor.replace(patron, nuevoValor);
                        nuevaCadena = nuevaCadena.replace(patron,nuevoValor);
                        nuevaCadena = nuevaCadena.replace(patron,nuevoValor);
                        nuevaCadena = nuevaCadena.replace(patron,nuevoValor);
                         $("div").remove("."+nuevaCadena); 
                        });
                    }
                 });
            }
    })
  .jstree({
    checkbox : {
        tie_selection : true
    },
    types : {
      default: {
        icon : false
      }
  },
    plugins : ['checkbox','types','wholerow','changed']

});
</script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
