<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM carreras WHERE edo=1";
$result=$db->executeQuery($sql);
?>

<script>
	loadTable('desgSuscriptores');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="desgSuscriptores">
    <thead>
        <tr>
            <th>ID</th><!--Estado-->
            <th>Nombre</th>
            <th>Director</th>
            <th>Coordinador</th>
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
            	<td><?php echo $reg['idcarreras']; ?></td>
                <td><?php echo $reg['nombre']; ?></td>
                <td><?php echo $reg['director'];?></td>
                <td><?php echo $reg['coordinador'];?></td>
                <td><div class="iconFlat" id="iconEditar" title="Editar" onclick="loadWindow(585,435); loadScreen('carreras/frm_updCarrera.php?id=<?php echo $reg['idcarreras']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accCarreras(3,'<?php echo $reg['idcarreras']; ?>')"></div></td>
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
