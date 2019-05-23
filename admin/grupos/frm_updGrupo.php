<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM grupos WHERE idgrupos='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>

<script>
	$(document).ready(function(){ 
		 var idcarr=document.getElementById('carr').value;
		 var plan=document.getElementById('plan').value;
		$.ajax({
			url:'grupos/accGrupos.php',
			type:'POST',
			data:'v_acc=5&v_id=' + idcarr + "&v_plan=" + plan,
			success: function(e){
				document.getElementById('pEscolar').innerHTML=e;
			}
   		});
	})
</script>


<section id="barratitulo">
    <div id="titulo">Edit. Empresa</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accGrupos(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updGrupo">
	<table>
    	<tr>
        	<td><label>Código:</label></td>
            <td><input type="text" id="codigo" name="codigo" style="width:100px;" maxlength="15" value="<?php echo $row['codigo'];?>"></td>
        </tr>
    	<tr>
        	<td><label>Grado:</label></td>
            <td>
            <select id="grado" name="grado" style="width:50px;">
            <?php
			for($x=1;$x<=9;$x++)
			{
            ?>
            	<option value="<?php echo $x;?>" <?php if($row['grado']==$x) echo 'selected' ?>><?php echo $x; ?></option>
            <?php
			}
            ?>
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>Grupo:</label></td>
            <td>
            <select id="grupo" name="grupo" style="width:50px;">
            
            	<option value="A" <?php if($row['grupo']=='A') echo 'selected' ?>>A</option>
                <option value="B" <?php if($row['grupo']=='B') echo 'selected' ?>>B</option>
                <option value="C" <?php if($row['grupo']=='C') echo 'selected' ?>>C</option>
                <option value="D" <?php if($row['grupo']=='D') echo 'selected' ?>>D</option>
                <option value="E" <?php if($row['grupo']=='E') echo 'selected' ?>>E</option>
                <option value="F" <?php if($row['grupo']=='F') echo 'selected' ?>>F</option>
                <option value="G" <?php if($row['grupo']=='G') echo 'selected' ?>>G</option>
                <option value="H" <?php if($row['grupo']=='H') echo 'selected' ?>>H</option>
            
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>Turno:</label></td>
            <td>
            	<select id="turno" name="turno" style="width:200px;">
            	<?php
				$sql="SELECT * FROM turnos WHERE edo=1";
				$result2=$db->executeQuery($sql);
				while($row2=$db->getRows($result2))
				{
                ?>
                	<option value="<?php echo $row2['idturnos'];?>" <?php if($row['turno']==$row['idturnos']) echo 'selected'; ?>><?php echo $row2['descripcion'];?></option>
                <?php
				}
                ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td><label>Carrera:</label></td>
            <td>
            	<select id="carr" name="carr" style="width:450px;" onchange="loadPlanes();">
            	<?php
				$sql="SELECT * FROM carreras WHERE edo=1 ORDER BY nombre";
				$result2=$db->executeQuery($sql);
				while($row2=$db->getRows($result2))
				{
                ?>
                	<option value="<?php echo $row2['idcarreras']?>" <?php if($row['carr']==$row2['idcarreras']) echo 'selected' ?>><?php echo $row2['nombre']?></option>
                <?php
				}
                ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td><label>Plan Escolar:</label></td>
            <td>
            	<select id="pEscolar" name="pEscolar" style="width:450px;">
                </select>
            </td>
        </tr>
    </table>
    </form>
    <input type="hidden" id="plan" value="<?php echo $row['pEscolar'];?>" />
</section>