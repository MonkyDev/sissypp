<section id="barratitulo">
    <div id="titulo">TURNOS</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(445,100); loadScreen('turnos/frm_nvoTurno.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_turnos.php");
    ?>
</section>
