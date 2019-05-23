<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
if(!isset($_SESSION)) session_start();
require_once("../clases/conexion.php");
$db=new conexion();
$dbp=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM carreras WHERE idcarreras='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);

$sqlp="SELECT * FROM planxcarr INNER JOIN planescolar ON planxcarr.plan=planescolar.idplanescolar WHERE carr='" . $id . "'";
$resultp=$dbp->executeQuery($sqlp);
$carr=$id;
while($rowp=$dbp->getRows($resultp))
{
	$plan=$rowp['plan']. "-" . $rowp['descripcion'];	
	$rvoe=$rowp['rvoe'];
	$vige=$rowp['vigencia'];
	$_SESSION['planxcarr'][$plan]=$carr . "|" . $rvoe . "|" . $vige;
}
$sqlp="SELECT * FROM planescolar WHERE edo=1";
$resultp=$dbp->executeQuery($sqlp);


?>
<section id="barratitulo">
    <div id="titulo">Edit. Carrera</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();closeVarSes('planxcarr');" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accCarreras(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updCarrera">
	<table>
    	<tr>
        	<td><label>CLAVE:</label></td>
            <td><input type="text" id="idcarreras" name="idcarreras" style="width:100px;" maxlength="4" value="<?php echo $row['idcarreras'];?>" readonly></td>
        </tr>
    	<tr>
        	<td><label>Nombre:</label></td>
            <td><input type="text" id="nombre" name="nombre" style="width:450px;" maxlength="105" value="<?php echo $row['nombre'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Director:</label></td>
            <td><input type="text" id="director" name="director" style="width:350px;" maxlength="85" value="<?php echo $row['director'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Coordinador:</label></td>
            <td><input type="text" id="coordinador" name="coordinador" style="width:350px;" maxlength="85" value="<?php echo $row['coordinador'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    </table>
    </form>
    
    
    
    
    <div style="width:100%; border:#CCC solid 1px; text-align:center; margin-top:10px; margin-bottom:10px; padding-bottom:5px; padding-top:5px; background-color:#E8E8E8; border-radius:10px 10px 0px 0px;">
    	Planes de la carrerra
    </div>
    <section style=" width:100%; height:30px;">
	<div style="float:left;">
                <select id="txt_plan" style="width:240px; height:28px;">
                <?php
                while($rowp=$db->getRows($resultp))
                {
                ?>
                <option value="<?php echo $rowp['idplanescolar'] . '-' . $rowp['descripcion']; ?>"><?php echo $rowp['idplanescolar'] . '-' . $rowp['descripcion']; ?></option>
                <?php
                }
                ?>
                </select>
    </div>
    <div style="float:left;">
    <input type="text" id="rvoe" name="rvoe" placeholder="RVOE" style="width:95px; margin-left:3px;" />
    <input type="text" id="vigencia" name="vigencia" placeholder="Vigencia" style="width:185px; margin-left:3px;" />
    </div>
    <div class="icon_s" id="iconAddList" title="Agregar a la lista" onclick="addToSenPlan();" style="float:left;"></div>
    </section>
    
    
    <div class="tblDesglose" id="tabla_planxcarr">

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
		if(isset($_SESSION['planxcarr']))
		{
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
		}
		else
		{
			echo "<tr>";
			echo '<td colspan="4" align="center">No existen planes relacionados a la carrera</td>';
			echo "</tr>";
		}
        ?>
	</tbody>
</table>

    
</div>
    
    
    
    
</section>
