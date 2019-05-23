<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM turnos WHERE edo=1";
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
            	<td><?php echo $reg['idturnos']; ?></td>
                <td><?php echo $reg['descripcion']; ?></td>
                <td><div class="iconFlat" id="iconEditar" title="Editar" onclick="loadWindow(445,100); loadScreen('turnos/frm_updTurno.php?id=<?php echo $reg['idturnos']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accTurnos(3,'<?php echo $reg['idturnos']; ?>')"></div></td>
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
