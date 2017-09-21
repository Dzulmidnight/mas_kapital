<div id="map" name="map" style="height: 400px">
</div>

<script>
function initMap(){
<?php 
    include('conexion/conexion.php');
    $sql = "SELECT * FROM sucursales WHERE MapaActivo = 1 ORDER BY idSucursales";
    $result = $mysqli->query($sql);
    $aux = 1;
    while($fila=$result->fetch_assoc()){
?>
      var myLatlng<?php echo $aux; ?> = new google.maps.LatLng(<?php echo $fila['X']; ?>,<?php echo $fila['Y']; ?>);
      <?php 
      $aux++; 
    }
?>

var mapOptions = {
  zoom: 6,
  center: myLatlng1
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);


<?php 
    include('conexion/conexion.php');
    $sql="SELECT * FROM sucursales WHERE MapaActivo=1 ORDER BY idSucursales DESC";
    $result=$mysqli->query($sql);
    $aux=1;
    while ($fila=$result->fetch_assoc()){
      ?>
      var marker<?php echo $aux; ?> = new google.maps.Marker({
        position: myLatlng<?php echo $aux; ?>,
        title:"<?php echo $fila['NombreSucursal']; ?>!"
        });

        marker<?php echo $aux; ?>.setMap(map);
      <?php
      $aux++;  
    }
?>
}
</script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABeKyIubatLSwh8zRTwaT7agLxPOH0Rdc&callback=initMap">
</script>