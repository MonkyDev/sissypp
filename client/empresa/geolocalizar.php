<?php
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['v'];
$sql="SELECT * FROM empresas WHERE idempresas='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
$cx=$row['ubx'];
$cy=$row['uby'];
if($cx==NULL && $cy==NULL){
	echo '<div style="position:absolute;margin-top:345px;margin-left:12%;font-size:22px;">
	No Se Encontro Ninguna Coordenada
	</div>';	
}
?>
<div id="contMap"
      <div class="winHead">
        <div id="winHeadTitle" style="font-size:18px;">
        UBICACI&Oacute;N DE LA EMPRESA
        </div>
          <div id="winHeadIconBox">
            <div class="icon" id="cerrar" title="Cerrar" onClick="closeWindow();"></div>
          </div>
       </div>
      <div id="headMap" style="width::100%;height:35px;border-radius:10px;border:green 1px solid;text-align:center;padding:5px;">
      <div style="font-size:18px;"><?php echo utf8_decode($row['nombre']);?></div>
      <div style="float:left;margin-left:20px;font-size:16px;"><?php echo 'Teléfono: '.$row['telefono'];?></div>
      <div style="float:right;margin-right:20px;font-size:16px;">
	  <?php echo 'E-mail: ';if($row['correo']==NULL) echo 'Correo no Registrado'; else echo $row['correo'];?></div>
      </div>
		
</div>
<div style="width:100%;height:100%;">
<div id="mapa" style="width:60%;height:85%;border:#0C0 2px solid;border-radius:10px; float:left;"></div>
<div style="width:37.5%;height:82%;border-radius:10px;float:right;padding:1%;font-family:Arial, Helvetica, sans-serif; font-size:14px;background-color:#FFC;">
        	<p><br />
            Si quieres una referencia de la localizaci&oacute;n de nuestras oficinas, perm&iacute;tenos mostrarte tu localizaci&oacute;n apr&oacute;ximada y las rutas para llegar.<br><br>
            </p>
        	Generar ruta... &nbsp;
            <img src="icon/person-walking.png"  onclick="ruta(1);" width="25" title="Pie"/>&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="icon/front-car.png" onclick="ruta(2);" width="25" title="Carro"/>
            <br><br>
            <table>
            	<tr>
            		<td align="right">Latitud:</td>
                    <td><input type="text" id="cox" class="ipt" readonly></td>
            	</tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
            		<td align="right">Longitud:</td>
                    <td><input type="text" id="coy" class="ipt" readonly></td>
            	</tr>
            </table>
            <br />
            <center><b><label>>>>>>>>Rutas<<<<<<<</label></b></center>
            <div id="panel" style="width:100%; height:55%; border:1px #666666 solid; overflow-y:scroll; float:left;"></div>
        </div>   
</div>

<script type="text/javascript">
	var lat;
	var lon;
	var directionsDisplay;
	var map;
function initMap(){
	navigator.geolocation.getCurrentPosition(showPosition);
			function showPosition(position)
  			{
  				lat=position.coords.latitude;
  				lon=position.coords.longitude;
				
				$('#cox').val(lat);
				$('#coy').val(lon);
				
				var mapOptions = {
		      		zoom: 14,
	          		center: new google.maps.LatLng(lat,lon) ,
	         	};
         map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
      		}

}
function cargarRuta(origen,destino){
	var request = {
		origin:origen,
		destination:destino,
		travelMode: google.maps.TravelMode.DRIVING,
		provideRouteAlternatives: true,
	};
	
	var directionsService = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer();
	// Indicamos dónde esta el mapa para renderizarnos
	directionsDisplay.setMap(map);
	// Indicamos dónde esta el panel para mostrar el texto
	var panel = document.getElementById("panel");
	panel.innerHTML = ""; // Vacío el panel, por si buscamos varias veces
	directionsDisplay.setPanel(panel);
	
	directionsService.route(request, function(result, status) {
	    if (status == google.maps.DirectionsStatus.OK) {
	      directionsDisplay.setDirections(result);
	    }
	  });
}
function cargarRutapie(origen,destino){
	var request = {
		origin:origen,
		destination:destino,
		travelMode: google.maps.TravelMode.WALKING,
		provideRouteAlternatives: true,

	};
	var directionsService = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer();
	// Indicamos dónde esta el mapa para renderizarnos
	directionsDisplay.setMap(map);
	// Indicamos dónde esta el panel para mostrar el texto
	var panel = document.getElementById("panel");
	panel.innerHTML = ""; // Vacío el panel, por si buscamos varias veces
	directionsDisplay.setPanel(panel);
	directionsService.route(request, function(result, status) {
	    if (status == google.maps.DirectionsStatus.OK) {
	      directionsDisplay.setDirections(result);
	    }
	  });
}
	function  ruta(val){
	var origen = new google.maps.LatLng(lat,lon);
	var destino = new google.maps.LatLng(<?php echo $cx ?>, <?php echo $cy ?>);
	
		switch(val){
			case 1:
				cargarRutapie(origen,destino);
			break;
			case 2:
				cargarRuta(origen,destino);
			break;
			
		}
	}	
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJAMEeH1F33VnN64pr3EXHWyK8_ZtBces&callback=initMap"></script>

<style>
img:hover{
	cursor:pointer;
	-webkit-transform: scale(1.3);
	-ms-transform: scale(1.3);
	transform: scale(1.3);
}

</style>