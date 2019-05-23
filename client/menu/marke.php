<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM noticias";
$result=$db->executeQuery($sql);
?>
<section>      
<marquee loop="infinete" behavior="alternate" direction="up" height="690px" width="358px" scrollamount="2" scrolldelay="50" onMouseOver="this.stop()" onMouseOut="this.start()" contenteditable="false" style="position:inherit;"> 

<table width="355">
<?php while($row=$db->getRows($result)){?>
  <tr>
    <td width="167" style="font-size:15px; " height="135">
		<?php if(strlen($row['desnoti'])>100)
			$i=NULL;
			if($i==NULL){
				$i=0;
			}
			$array=$row['desnoti'];
			for($i=0; $i<=100; $i++){
				echo $array[$i];
			}
			echo ' ...';
		?>
        <input id="abc" type="button" value="ver mas" onclick="cargainfor(<?php echo $row['idnoticias'];?>);"/>
    </td>
    <td width="172" style="position:absolute;" height="135">
    	<img src="<?php echo $row['imgnoti']?>" width="150"  height="130"/>
    </td>
  </tr>
<?php } ?>
</table>
</marquee>
</section>

<style>
#abc:hover{
	cursor:pointer;
}
</style>