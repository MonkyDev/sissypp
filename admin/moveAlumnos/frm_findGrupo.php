<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT grupos.idgrupos as ID, grupos.codigo as cod, grupos.grado, grupos.grupo, turnos.descripcion as turno, carreras.nombre as carrera, planescolar.descripcion as plan FROM grupos INNER JOIN carreras ON grupos.carr=carreras.idcarreras INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar INNER JOIN turnos ON grupos.turno=turnos.idturnos WHERE grupos.edo=1";
$result=$db->executeQuery($sql);
?>

<section id="barratitulo">
    <div id="titulo">Seleccionar grupo</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <!--<div id="iconGuardar" class="icon" onClick="accCarreras(1,0);" title="Guardar"></div>-->
    </div>
</section>
<section>
<script>
	loadTable('findgrupo');
</script>

<table cellpadding="0" cellspacing="0" border="0" class="display" id="findgrupo">
    <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Turno</th>
            <th>Carrera</th>
            <th>Plan Escolar</th>
            <th>Sel</th>
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
       while($reg=$db->getRows($result))
       {
	?>
    		<tr>
            	<td align="center"><?php echo $reg['ID']; ?></td>
                <td><?php echo $reg['cod']; ?></td>
                <td align="center"><?php echo $reg['grado'];?></td>
                <td align="center"><?php echo $reg['grupo'];?></td>
                <td align="center"><?php echo $reg['turno'];?></td>
                <td><?php echo $reg['carrera'];?></td>
                <td><?php echo $reg['plan'];?></td>
                <td align="center"><div class="iconFlat" id="iconSelect" title="Seleccionar" onclick="accMoveAlumnos(6,'<?php echo $reg['cod']; ?>|<?php echo $_GET['c']?>|<?php echo $_GET['i']?>|<?php echo $_GET['j']?>');closeWindow();"></div></td>
                
            </tr>
        <?php
         }
        ?>
    <tbody>
</table>
</section>