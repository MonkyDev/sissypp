<section id="barratitulo">
    <div id="titulo">Planes escolares</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(445,150); loadScreen('planescolar/frm_nvoPlanEscolar.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_planEscolar.php");
    ?>
</section>
