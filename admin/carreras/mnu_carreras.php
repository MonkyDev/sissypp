<section id="barratitulo">
    <div id="titulo">CARRERAS</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(585,435); loadScreen('carreras/frm_nvaCarrera.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_carreras.php");
    ?>
</section>
