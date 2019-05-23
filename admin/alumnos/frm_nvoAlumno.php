
<?php
require_once("../clases/conexion.php");
$db=new conexion();
?>
<script>
	$(document).ready(function(){ 
		cargaPlanes();
	})
</script>

<section id="barratitulo">
    <div id="titulo">Nvo. Alumno</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accAlumnos(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvoAlumno">
	<table>
    	<tr>
        	<td><label>Matrícula:</label></td>
            <td><input type="text" id="matricula" name="matricula" style="width:150px;" maxlength="45" onblur="this.value = this.value.toUpperCase();this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>A. Paterno:</label></td>
            <td><input type="text" id="paterno" name="paterno" style="width:250px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>A. Materno:</label></td>
            <td><input type="text" id="materno" name="materno" style="width:250px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Nombre(s):</label></td>
            <td><input type="text" id="nombre" name="nombre" style="width:250px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Domicilio:</label></td>
            <td><input type="text" id="domicilio" name="domicilio" style="width:470px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Carrera:</label></td>
            <td>
        	<select id="carrera" name="carrera" style="width:476px;" onchange="cargaPlanes();">
            	<?php
				$sql="SELECT * FROM carreras WHERE edo=1 ORDER BY nombre";
				$result=$db->executeQuery($sql);
				while($row=$db->getRows($result))
				{
                ?>
                	<option value="<?php echo $row['idcarreras'];?>"><?php echo $row['nombre'];?></option>
                <?php
				}
                ?>
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>Grado y grupo:</label></td>
            <td>
            <select id="grupo" name="grupo" style="width:476px;">
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>Sexo:</label></td>
            <td>
            <select id="sexo" name="sexo" style="width:133px;">
            	<option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>F. Nacimiento:</label></td>
            <td>
            	<input type="date" max="<?php echo date('Y-m-d');?>" id="fnacimiento" name="fnacimiento" style="width:125px;" onclick="calculaedad(document.getElementById('fnacimiento').value,'edad')" onchange="calculaedad(document.getElementById('fnacimiento').value,'edad')" />
            </td>
        </tr>
        <tr>
        	<td><label>Edad:</label></td>
            <td>
            	<input type="text" id="edad" name="edad" style="width:125px;" onfocus="calculaedad(document.getElementById('fnacimiento').value,'edad')"/>
            </td>
        </tr>
        <tr>
        	<td><label>Teléfono:</label></td>
            <td>
            	<input type="text" id="telefono" name="telefono" style="width:125px;" />
            </td>
        </tr>
        <tr>
        	<td><label>E-mail:</label></td>
            <td>
            	<input type="text" id="email" name="email" style="width:300px;" onchange="this.value=trim(this.value,' ');" />
            </td>
        </tr>
    </table>
    
    </form>
</section>