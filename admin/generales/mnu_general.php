<section id="barratitulo">
    <div id="titulo">Pantalla general</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(500,300); loadScreen('generales/frm_nvoGeneral.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("listarPaises.php");
    ?>
</section>
