<div id="menu_oculto">
	<div id="div_lateral">
	    <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
	        <div class="barra_lateral_2" style="right:0px;display:none">
	            <a style="color:#ffffff;" href="index.php"><b>¿QUIÉNES SOMOS?</b></a>
	        </div>
	        <a href="index.php"><img src="img/logos/ico_maskapital.png" alt=""></a>
	    </div>
	    <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
	        <div class="barra_lateral_2" style="right:0px;display:none">
	            <a style="color:#ffffff;" href="universidad_mk.php"><b>UNIVERSIDAD MK</b></a>
	        </div>
	        <a href="universidad_mk.php"><img src="img/logos/ico_universidad.png" alt=""></a>
	    </div>
	    <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
	        <div class="barra_lateral_2" style="padding-left:49px;display:none">
	            <a style="color:#ffffff;" href="mas_flexible.php"><b>MÁSFLEXIBLE</b></a>
	        </div>
	        <a href="mas_flexible.php"><img src="img/logos/ico_masflexible.png" alt=""></a>
	    </div>
	    <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
	        <div class="barra_lateral_2" style="padding-left:53px;display:none">
	            <a href="mas_flexible.php#caracteristicas" style="color:#ffffff;"><b>MÁSPUNTOS</b></a>
	        </div>
	        <a href="mas_flexible.php#caracteristicas"><img src="img/logos/ico_maspuntos.png" alt=""></a>
	    </div>
	    <div class="barra_lateral_1" onmouseover="aparecer();" onmouseout="desaparecer()">
	        <div class="barra_lateral_2" style="padding-left:53px;display:none">
	            <a style="color:#ffffff;" href="sucursales.php"><b>SUCURSALES</b></a>
	        </div>
	        <a href="sucursales.php"><img src="img/logos/ico_localizacion.png" alt=""></a>
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
