<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM Alumnos WHERE matricula='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Marcar como</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
    </div>
</section>
<section>
	<div style="font-family:Arial, Helvetica, sans-serif; height:50px; line-height:50px;">Marcar al alumno <?php echo $row['paterno'] . ' ' . $row['materno'] . ' ' . $row['nombre']; ?> como:</div>
    <div class="botonflat" onclick="accAlumnos(3,'<?php echo $row['matricula']; ?>|2')">Egresado</div>
    <div class="botonflat" onclick="accAlumnos(3,'<?php echo $row['matricula']; ?>|3')">Baja Temporal</div>
    <div class="botonflat" onclick="accAlumnos(3,'<?php echo $row['matricula']; ?>|0')">Baja Definitiva</div>
</section>