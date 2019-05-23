<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM planescolar WHERE edo=1";
$result=$db->executeQuery($sql);
?>

<script>
	loadTable('desgSuscriptores');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="desgSuscriptores">
    <thead>
        <tr>
            <th>ID</th><!--Estado-->
            <th>Descripción</th>
            <th>Duración</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
    <tbody>
    <?php
       while($reg=$db->getRows($result))
       {
	?>
    		<tr>
            	<td><?php echo $reg['idplanescolar']; ?></td>
                <td><?php echo $reg['descripcion']; ?></td>
                <td><?php echo $reg['danhios'] . " años " . $reg['dmeses'] . " meses"; ?></td>
                <td><div class="iconFlat" id="iconEditar" title="Editar" onclick="loadWindow(445,150); loadScreen('planescolar/frm_updPlanEscolar.php?id=<?php echo $reg['idplanescolar']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accPlanEscolar(3,'<?php echo $reg['idplanescolar']; ?>')"></div></td>
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
