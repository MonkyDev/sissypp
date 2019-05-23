<section id="barratitulo">
    <div id="titulo">Alumnos</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(600,450); loadScreen('alumnos/frm_nvoAlumno.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_alumnos.php");
    ?>
</section>
