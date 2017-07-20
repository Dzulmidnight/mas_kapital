<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        if($_SESSION['usuario']['tipo'] == 'administrador'){
            header("Location: administracion/index.php");
        }
    }
 ?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inicio | Más kapital</title>
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
                var contenido2 = $("#services").offset();
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
        .errodr{
            background-color: #E74F4F;
            position: absolute;
            top: 0;
            padding: 10px 0;
            border-radius: 0 0 5px 5px;
            color: #fff;
            width: 100%;
            text-align: center;
            display: none;
        }
    </style>

    
</head><!--/head-->
<body>
    <?php
    $menu = 'login';
    include('header.php');
     ?>



    <section id="services" style="margin-top:10em;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 well">
                    <div class="error alert alert-danger alert-dismissible" style="display:none" role="alert">
                        <strong>Datos incorrectos, inténtalo de nuevo por favor.
                    </div>
                    
                    <form id="form-login" action="" method="POST">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="usuario" name="usuario"  required placeholder="Usuario">
                        </div>
                        <div class="col-sm-12" style="margin-top:1em;">
                            <input type="password" class="form-control" id="password" name="password"  required placeholder="Contraseña">
                        </div>
                        <div class="col-md-12 text-left" style="margin-top:2em;">
                            <!--<button type="submit" class="btn btn-success botonlg" style="width:30%;" onclick="validar()"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Iniciar Sesión</button>-->
                            <input type="submit" style="width:30%;" class="btn btn-success botonlg" onclick="validar()" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

    <!--/#clients-->

    <script>
        function validar(){
            usuario = document.getElementById("usuario").value;
            if ( usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
            // Si no se cumple la condicion...
                alert('DEBES INGRESAR TU CORREO ELECTRÓNICO');
                document.getElementById("usuario").focus();
                return false;

            }
            password = document.getElementById("password").value;
            if ( password == null || password.length == 0 || /^\s+$/.test(password)) {
            // Si no se cumple la condicion...
                alert('DEBES DE INGRESAR TU CONTRASEÑA');
                document.getElementById("password").focus();
                return false;
            }
            return true;


        }
    </script>
    <script type="text/javascript" src="js/validacion.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
