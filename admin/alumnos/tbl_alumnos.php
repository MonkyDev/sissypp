<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT matricula,paterno,materno,alumnos.nombre,grado,grupos.grupo,carreras.nombre as carrera,alumnos.edo as ed FROM alumnos INNER JOIN grupos ON alumnos.grupo=grupos.idgrupos INNER JOIN turnos ON grupos.turno=turnos.idturnos INNER JOIN carreras ON grupos.carr=carreras.idcarreras INNER JOIN planescolar 	on grupos.pEscolar=planescolar.idplanescolar WHERE alumnos.edo=1";
$result=$db->executeQuery($sql);
?>

<script>
	loadTable('desgSuscriptores');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="desgSuscriptores">
    <thead>
        <tr>
            <th>Matrícula</th><!--Estado-->
            <th>Paterno</th>
            <th>Materno</th>
            <th>Nombre</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Carrera</th>
            <th>Estado</th>
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
            	<td><?php echo $reg['matricula']; ?></td>
                <td><?php echo $reg['paterno']; ?></td>
                <td><?php echo $reg['materno']; ?></td>
                <td><?php echo $reg['nombre']; ?></td>
                <td align="center"><?php echo $reg['grado']; ?></td>
                <td align="center"><?php echo $reg['grupo']; ?></td>
                <td><?php echo $reg['carrera']; ?></td>
                 <td align="center">
				 <?php
				 switch($reg['ed'])
					{
						case 0:
							echo '<font color="#FF0000">Baja Definitiva</font>';
						break;
						case 1:
							echo 'Activo';
						break;
						case 2:
							echo '<font color="#0000FF">Egresado</font>';
						break;
						case 3:
							echo '<font color="#FF9900">Baja Temporal</font>';
						break;
					}
				 ?>
                 </td>
               <!-- <td><div class="iconFlat" id="iconView" title="Ver Información completa" onclick="loadWindow(545,300); loadScreen('alumnos/viewinfo.php?id=<?php //echo $reg['matricula']; ?>','window');"></div></td>-->
                <td>
                <div class="iconFlat" id="iconEditar" title="Editar" onclick="loadWindow(600,450); loadScreen('alumnos/frm_updAlumno.php?id=<?php echo $reg['matricula']; ?>','window');"></div>
                </td>
                <td>
                <!--<div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accAlumnos(3,'<?php //echo $reg['idprogramas']; ?>')"></div>-->
                <div class="iconFlat" id="iconTrash" title="Eliminar" onclick="loadWindow(545,150); loadScreen('alumnos/marcarAlumno.php?id=<?php echo $reg['matricula']; ?>','window');"></div>
                </td>
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
