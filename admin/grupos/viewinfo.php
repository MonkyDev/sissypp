<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT matricula,paterno,materno,alumnos.nombre,grado,grupos.grupo,carreras.nombre as carrera, codigo, turnos.descripcion as turn, planescolar.descripcion as plan, domicilio, telefono,email, alumnos.edo FROM alumnos INNER JOIN grupos ON alumnos.grupo=grupos.idgrupos INNER JOIN turnos ON grupos.turno=turnos.idturnos INNER JOIN carreras ON grupos.carr=carreras.idcarreras INNER JOIN planescolar 	on grupos.pEscolar=planescolar.idplanescolar WHERE alumnos.edo=1 AND alumnos.grupo=". $id;


$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Alumnos en el grupo</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
    </div>
</section>
<section style="width:100%; height:90px; margin-bottom:10px; font-family:Arial, Helvetica, sans-serif; font-size:16px; background-color:#F0F0F0 ;">
	<table cellpadding="3">
    	<tr>
        	<td align="right">Código:</td>
            <td><u><?php echo $row['codigo'];?></u></td>
        </tr>
        <tr>
        	<td align="right">Grado y grupo:</td>
            <td><u><?php echo $row['grado'] . $row['grupo'];?></u></td>
            <td width="60"></td>
            <td align="right">Carrera:</td>
            <td><u><?php echo $row['carrera'];?></u></td>
        </tr>
        <tr>
        	<td align="right">Turno:</td>
            <td><u><?php echo $row['turn'];?></u></td>
            <td width="60"></td>
            <td align="right">Plan escolar:</td>
            <td><u><?php echo $row['plan']?></u></td>
        </tr>
    </table>
</section>

<script>
	loadTable('alumnos');
</script>
<section style="width:100%; height:450px; overflow-y:scroll;">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="alumnos">
    <thead>
        <tr>
            <th>Matrícula</th><!--Estado-->
            <th>Paterno</th>
            <th>Materno</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
            <th>Status</th>
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
		$result=$db->executeQuery($sql);
       while($reg=$db->getRows($result))
       {
	?>
    		<tr>
            	<td><?php echo $reg['matricula']; ?></td>
                <td><?php echo $reg['paterno']; ?></td>
                <td><?php echo $reg['materno']; ?></td>
                <td><?php echo $reg['nombre']; ?></td>
                <td><?php echo $reg['domicilio']; ?></td>
                <td><?php echo $reg['telefono']; ?></td>
                <td><?php echo $reg['email']; ?></td>
                <td align="center"><?php 
					switch($reg['edo'])
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
            </tr>
        <?php
         }
        ?>
    </tbody>
</table>
</section>