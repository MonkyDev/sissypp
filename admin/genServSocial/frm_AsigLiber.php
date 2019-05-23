<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM servsocial INNER JOIN alumnos ON servsocial.matricula=alumnos.matricula WHERE idservsocial=". $id;
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Oficio Asignación / Liberación</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
    </div>
</section>
<section>
	<div style="font-family:Arial, Helvetica, sans-serif; height:50px; padding:10px; float:left;">Generar oficio para la solicitud <?php echo $row['no_cons'] . "/" . $row['anhio'];?> de: <?php echo $row['paterno'] . " " . $row['materno'] . " " . $row['nombre'];?></div>
    <div class="botonflat" onclick="accGenServicio(4,'<?php echo $id ?>|2')">Asignación</div>
    <div class="botonflat" onclick="accGenServicio(4,'<?php echo $id ?>|1')">Liberación</div>    
</section>