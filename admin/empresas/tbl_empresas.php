<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM empresas WHERE edo=1";
$result=$db->executeQuery($sql);
?>

<script>
	loadTable('desgSuscriptores');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="desgSuscriptores">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Giro</th>
            <th>Dirección</th>
            <th>Teléfono</th>
           <!-- <th>e-mail</th>
            <th>Pág. web</th>
            <th>Coord. X</th>
            <th>Coord. Y</th>-->
            <th>Tipo</th>
           <!-- <th>Autorización</th>
            <th>Vigencia</th>-->
            <th colspan="3">Acciones</th>
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
            	<td><?php echo $reg['idempresas']; ?></td>
                <td><?php echo $reg['nombre']; ?></td>
                <td><?php echo $reg['giro'];?></td>
                <td><?php echo $reg['direccion'];?></td>
                <td><?php echo $reg['telefono'];?></td>
                <td><?php echo $reg['tipo'];?></td>
                 <td><div class="iconFlat" id="iconView" title="Ver Información" onclick="loadWindow(545,300); loadScreen('empresas/viewinfo.php?id=<?php echo $reg['idempresas']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconEditar" title="Editar" onclick="loadWindow(545,400); loadScreen('empresas/frm_updEmpresa.php?id=<?php echo $reg['idempresas']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accEmpresas(3,'<?php echo $reg['idempresas']; ?>')"></div></td>
                
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
