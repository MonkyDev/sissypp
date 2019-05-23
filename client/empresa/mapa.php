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
	echo '<div style="position:absolute;margin-top:345px;margin-left:230px;font-size:22px;">
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
<div id="mapa" style="width:99.9%;height:595px;border:#0C0 2px solid;border-radius:10px;"></div>
    
    <script type="text/javascript">
		var map;
		var marker;
		
		function initmapa(){
			var mapOptions={
				
				center: new google.maps.LatLng(<?php echo $cx ?>, <?php echo $cy ?>),
				zoom:17,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
			
			var place = new google.maps.LatLng(<?php echo $cx ?>, <?php echo $cy ?>);
			marker = new google.maps.Marker({
				position: place,
				title:"Universidad Salazar",
				map: map,
			});
			google.maps.event.addListener(marker,"click",showInfo);
		}
	
		function showInfo(){
			map.setZoom(18);
			map.setCenter(marker.getPosition());
			var informacion= new google.maps.InfoWindow({
				content: "<?php echo utf8_decode($row['nombre'])?><br><?php echo utf8_decode($row['direccion'])?><br>Tuxtla Gutiérrez. Chiapas"
			});
			informacion.open(map,marker);
		}
	</script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDKHTwQR22-4dgFLozvI7LI5uPrrdJf4h8&callback=initmapa"></script>
