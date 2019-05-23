<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM alumnos INNER JOIN servsocial ON alumnos.matricula=servsocial.matricula WHERE servsocial.edo>1";
$result=$db->executeQuery($sql);
?>

<script>
	loadTable('desgSuscriptores');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="desgSuscriptores">
    <thead>
        <tr>
        	<th>Código</th>
            <th>Matrícula</th>
            <th>Nombre</th>
            <th>Solicitud</th>
            <th>Inicio</th>
            <th>Lugar donde realiza</th>
            <th>Estado</th>
            <th colspan="4">Acciones</th>
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
            	<td><?php echo $reg['no_cons'] ."/" . $reg['anhio'] ; ?></td>
            	<td><?php echo $reg['matricula']; ?></td>
                <td><?php echo $reg['paterno'] ." ".$reg['materno']." ".$reg['nombre']; ?></td>
                <td><?php echo $reg['f_solicitud']; ?></td>
                <td><?php echo $reg['f_inicio']; ?></td>
                <td><?php echo $reg['nomEmp']; ?></td>
                 <td align="center">
				 <?php
				 switch($reg['edo'])
					{
						case 0:
							echo '<font color="#FF0000">Baja Definitiva</font>';
						break;
						case 1:
							echo 'Activo';
						break;
						case 2:
							echo '<font color="#0000FF">En curso</font>';
						break;
						case 3:
							echo '<font color="#FF9900">En trámite</font>';
						break;
					}
				 ?>
                 </td>
                <td><div class="iconFlat" id="iconView" title="Ver reporte de solicitud" onclick="verReporte('reports/rpt_solSocial.php?id=<?php echo $reg['idservsocial'];?>')"></div>
                </td>
                <td>
                <div class="iconFlat" id="iconReport" title="Asignación / Liberación" onclick="loadWindow(500,200); loadScreen('genServSocial/frm_AsigLiber.php?id=<?php echo $reg['idservsocial']; ?>','window');"></div>
                </td>
                <td>
                <div class="iconFlat" id="iconEditar" title="Editar" onclick="loadScreen('genServSocial/frm_updGenServSocial.php?id=<?php echo $reg['idservsocial']; ?>','main');"></div>
                </td>
                <td>
                <div class="iconFlat" id="iconTrash" title="Eliminar" onclick="
                if(confirm('Desea cancelar la solicitud?'))
                {
                	loadWindow(545,250);
                    loadScreen('genServSocial/cancelaSolicitud.php?id=<?php echo $reg['idservsocial']."|".$reg['no_cons']."/".$reg['anhio'] ; ?>','window');
                }
                    "></div>
                </td>
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
