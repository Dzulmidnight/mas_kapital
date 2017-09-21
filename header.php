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

                <a class="navbar-brand" href="index.php" style="margin-top:10px;">
                	<img class="img-responsive" src="img/logos/logo_mas_kapital.png" alt="logo">
                </a>

            </div>
            <div class="collapse navbar-collapse" style="margin-top:10px;">
                <ul class="nav navbar-nav navbar-right">  
                    <li class="dropdown <?php if($menu == 'index'){echo 'active'; } ?>"><a href="index.php"><b>¿QUIÉNES SOMOS?</b> <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="index.php#mision-vision">MISIÓN Y VISIÓN</a></li>
                            <li><a href="normatividad.php">NORMATIVIDAD</a></li>
                            <li><a href="sucursales.php">SUCURSALES</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if($menu == 'flexible'){echo 'active'; } ?>"><a href="mas_flexible.php"><b>MÁS FLEXIBLE</b> <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="mas_flexible.php#caracteristicas">MÁSPUNTOS</a></li>
                            <li><a href="mas_flexible.php#caracteristicas">¿DÓNDE PAGAR?</a></li>
                        </ul>
                    </li>
                    <li <?php if($menu == 'universidad'){echo 'class="active"';} ?>><a href="universidad_mk.php"><b>UNIVERSIDAD MK</b></a></li>
                    <li <?php if($menu == 'bolsa'){echo 'class="active"';} ?>><a href="bolsa_trabajo.php"><b>BOLSA DE TRABAJO</b></a></li>
                    <li <?php if($menu == 'atencion'){echo 'class="active"';} ?>><a href="atencion_clientes.php"><b>ATENCIÓN A CLIENTES</b></a></li>
                    <li <?php if($menu == 'login'){echo 'class="active"';} ?>><a href="login.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a></li>             
                </ul>
            </div>

        </div>
    </div>
</header>