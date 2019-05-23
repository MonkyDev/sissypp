<?php
if(!isset($_SESSION)) session_start();
?>
<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
	<thead>
    	<tr>
        	<td align="center">Matrícula</td>
            <td align="center">Apellido Paterno</td>
            <td align="center">Apellido Materno</td>
            <td align="center">Nombre(s)</td>
            <td align="center">Elim</td>
        </tr>
    </thead>
    <tbody>
    	<?php
		if(isset($_SESSION['alumgrupo']))
		{
			foreach($_SESSION['alumgrupo'] as $k => $v)
			{
				$datos=explode('|',$v);
			?>
				<tr>
					<td><?php echo $k; ?></td>
					<td><?php echo $datos[0]; ?></td>
					<td><?php echo $datos[1]; ?></td>
					<td><?php echo $datos[2]; ?></td>
					<td align="center"><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accAlumGrupos(4,'<?php echo $k;?>');"></div></td>
				</tr>
			<?php
			}
		}
		else
		{
			echo "<tr>";
			echo '<td colspan="5" align="center">No existen alumnos en el grupo</td>';
			echo "</tr>";
		}
        ?>
	</tbody>
</table>
