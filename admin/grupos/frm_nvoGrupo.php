<?php
require_once("../clases/conexion.php");
$db=new conexion();
?>
<script>
	$(document).ready(function(){ 
		 var idcarr=document.getElementById('carr').value;
		$.ajax({
			url:'grupos/accGrupos.php',
			type:'POST',
			data:'v_acc=4&v_id=' + idcarr,
			success: function(e){
				document.getElementById('pEscolar').innerHTML=e;
			}
   		});
	})
</script>
<section id="barratitulo">
    <div id="titulo">Nvo. Grupo</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accGrupos(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvoGrupo">
	<table>
    	<tr>
        	<td><label>Código:</label></td>
            <td><input type="text" id="codigo" name="codigo" style="width:100px;" maxlength="15"></td>
        </tr>
    	<tr>
        	<td><label>Grado:</label></td>
            <td>
            <select id="grado" name="grado" style="width:50px;">
            <?php
			for($x=1;$x<=9;$x++)
			{
            ?>
            	<option value="<?php echo $x;?>"><?php echo $x; ?></option>
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
            
            	<option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
            
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>Turno:</label></td>
            <td>
            	<select id="turno" name="turno" style="width:200px;">
            	<?php
				$sql="SELECT * FROM turnos WHERE edo=1";
				$result=$db->executeQuery($sql);
				while($row=$db->getRows($result))
				{
                ?>
                	<option value="<?php echo $row['idturnos']?>"><?php echo $row['descripcion']?></option>
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
				$result=$db->executeQuery($sql);
				while($row=$db->getRows($result))
				{
                ?>
                	<option value="<?php echo $row['idcarreras']?>"><?php echo $row['nombre']?></option>
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
        <!--<tr>
        	<td><label>Gpo. Antecesor:</label></td>
            <td><input type="text" id="web" name="web" style="width:100px;" maxlength="15" value="No"></td>
        </tr>
        <tr>
        	<td><label>Gpo. Sucesor:</label></td>
            <td><input type="text" id="ubx" name="ubx" style="width:100px;" maxlength="15" value="No"></td>
        </tr>-->
    </table>
    </form>
</section>