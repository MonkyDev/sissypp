<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM Alumnos WHERE matricula='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);

$sqlca="SELECT DISTINCT grado,grupo,codigo,idgrupos,turnos.descripcion as turn, planescolar.descripcion as planes,grupos.carr as carrera FROM grupos INNER JOIN turnos ON grupos.turno=turnos.idturnos INNER JOIN planxcarr ON grupos.carr=planxcarr.carr INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar WHERE grupos.idgrupos='" . $row['grupo'] . "'";
$rgrupo=$db->executeQuery($sqlca);
$rowgrupo=$db->getRows($rgrupo);
?>
<section id="barratitulo">
    <div id="titulo">Edit. Alumno</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accAlumnos(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updAlumno">
	<table>
    	<tr>
        	<td><label>Matrícula:</label></td>
            <td><input type="text" id="matricula" name="matricula" style="width:150px;" maxlength="45" onblur="this.value = this.value.toUpperCase();this.value=trim(this.value,' ');" value="<?php echo $row['matricula'];?>" readonly="readonly"></td>
        </tr>
        <tr>
        	<td><label>A. Paterno:</label></td>
            <td><input type="text" id="paterno" name="paterno" style="width:250px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['paterno'];?>"></td>
        </tr>
        <tr>
        	<td><label>A. Materno:</label></td>
            <td><input type="text" id="materno" name="materno" style="width:250px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['materno'];?>"></td>
        </tr>
        <tr>
        	<td><label>Nombre(s):</label></td>
            <td><input type="text" id="nombre" name="nombre" style="width:250px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['nombre'];?>"></td>
        </tr>
        <tr>
        	<td><label>Domicilio:</label></td>
            <td><input type="text" id="domicilio" name="domicilio" style="width:470px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['domicilio'];?>"></td>
        </tr>
        <tr>
        	<td><label>Carrera:</label></td>
            <td>
        	<select id="carrera" name="carrera" style="width:476px;" onchange="cargaPlanes();">
            	<?php
				$sql="SELECT * FROM carreras WHERE edo=1 ORDER BY nombre";
				$resultc=$db->executeQuery($sql);
				while($rowc=$db->getRows($resultc))
				{
                ?>
                	<option value="<?php echo $rowc['idcarreras'];?>" <?php if($rowc['idcarreras']==$rowgrupo['carrera']) echo 'selected';?>><?php echo $rowc['nombre'];?></option>
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
            <?php
			$rgrupo=$db->executeQuery($sqlca);
			while($rowgrupo=$db->getRows($rgrupo))
			{
			echo '<option value="' . $rowgrupo['idgrupos'] . '">' . $rowgrupo['grado'] . $rowgrupo['grupo'] . ' - ' . $rowgrupo['planes'] . " - " . $rowgrupo['turn'] . ' [' . $rowgrupo['codigo'] . '] </option>';
			}
            ?>
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>Sexo:</label></td>
            <td>
            <select id="sexo" name="sexo" style="width:133px;">
            	<option value="M" <?php if($row['sexo']=='M') echo 'selected';?>>Masculino</option>
                <option value="F" <?php if($row['sexo']=='F') echo 'selected';?>>Femenino</option>
            </select>
            </td>
        </tr>
        <tr>
        	<td><label>F. Nacimiento:</label></td>
            <td>
            	<input type="date" id="fnacimiento" name="fnacimiento" style="width:125px;" onclick="calculaedad(document.getElementById('fnacimiento').value,'edad')" onchange="calculaedad(document.getElementById('fnacimiento').value,'edad')" value="<?php echo $row['fnacimiento'];?>"/>
            </td>
        </tr>
        <tr>
        	<td><label>Edad:</label></td>
            <td>
            	<input type="text" id="edad" name="edad" style="width:125px;" onfocus="calculaedad(document.getElementById('fnacimiento').value,'edad')" value="<?php echo $row['edad'];?>"/>
            </td>
        </tr>
        <tr>
        	<td><label>Teléfono:</label></td>
            <td>
            	<input type="text" id="telefono" name="telefono" style="width:125px;" value="<?php echo $row['telefono'];?>" />
            </td>
        </tr>
        <tr>
        	<td><label>E-mail:</label></td>
            <td>
            	<input type="text" id="email" name="email" style="width:300px;" onchange="this.value=trim(this.value,' ');" value="<?php echo $row['email'];?>" />
            </td>
        </tr>
    </table>
    </form>
</section>