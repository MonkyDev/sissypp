<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT grupos.idgrupos as ID, grupos.codigo as cod, grupos.grado, grupos.grupo, turnos.descripcion as turno, carreras.nombre as carrera, planescolar.descripcion as plan FROM grupos INNER JOIN carreras ON grupos.carr=carreras.idcarreras INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar INNER JOIN turnos ON grupos.turno=turnos.idturnos WHERE grupos.edo=1";
$result=$db->executeQuery($sql);
?>

<script>
	loadTable('tblgrupo');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="tblgrupo">
    <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Turno</th>
            <th>Carrera</th>
            <th>Plan Escolar</th>
            <!--<th>Antecesor</th>
            <th>Sucesor</th>-->
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
            	<td align="center"><?php echo $reg['ID']; ?></td>
                <td><?php echo $reg['cod']; ?></td>
                <td align="center"><?php echo $reg['grado'];?></td>
                <td align="center"><?php echo $reg['grupo'];?></td>
                <td align="center"><?php echo $reg['turno'];?></td>
                <td><?php echo $reg['carrera'];?></td>
                <td><?php echo $reg['plan'];?></td>
                 <td><div class="iconFlat" id="iconView" title="Ver estado de alumnos" onclick="loadWindow(1200,600); loadScreen('grupos/viewinfo.php?id=<?php echo $reg['ID']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconEditar" title="Editar" onclick="loadWindow(545,240); loadScreen('grupos/frm_updGrupo.php?id=<?php echo $reg['ID']; ?>','window');"></div></td>
                <td><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accGrupos(3,'<?php echo $reg['ID']; ?>')"></div></td>
                
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
