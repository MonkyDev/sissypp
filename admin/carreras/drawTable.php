<?php
if(!isset($_SESSION)) session_start();
?>

<table>
	<thead>
    	<tr>
        	<td align="center">No</td>
            <td align="center">Plan</td>
            <td align="center">RVOE</td>
            <td align="center">Vigencia</td>
            <td align="center">Elim</td>
        </tr>
    </thead>
    <tbody>
    	<?php
		foreach($_SESSION['planxcarr'] as $k => $v)
		{
			$plan=explode('-',$k);
			$rvoe=explode('|',$v);
		?>
			<tr>
            	<td><?php echo $plan[0]; ?></td>
                <td><?php echo $plan[1]; ?></td>
                <td><?php echo $rvoe[1]; ?></td>
                <td><?php echo $rvoe[2]; ?></td>
                <td align="center"><div class="iconFlat" id="iconTrash" title="Eliminar" onclick="accCarreras(4,'<?php echo $k;?>');"></div></td>
            </tr>
        <?php
		}
        ?>
	</tbody>
</table>