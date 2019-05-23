<section id="barratitulo">
    <div id="titulo">Programas</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(445,130); loadScreen('programas/frm_nvoPrograma.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_programas.php");
    ?>
</section>
