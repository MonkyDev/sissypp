<?php
require_once("../clases/conexion.php");
$db=new conexion();
	$sql="SELECT * FROM empresas";
	$result=$db->executeQuery($sql);
?>
<table class="zebra" style="text-align:justify;font-size:16px;">
	<thead>
    	<tr>
            <td align="center">Id</td>
            <td>Nombre</td>
            <td>Direcci&oacute;n</td>
            <td>Mapa</td>
        </tr>
	</thead>
	<tbody>
	  <?php
          while($row = $db->getRows($result))
          {
      ?>
        <tr>
          <td align="center"><?php echo $row['idempresas']; ?></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['direccion']; ?></td> 
          <td class="ic_eye" 
          onClick="loadMap(<?php echo $row['idempresas'];?>);"></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
</table>