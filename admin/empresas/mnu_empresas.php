<section id="barratitulo">
    <div id="titulo">EMPRESAS</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(545,400); loadScreen('empresas/frm_nvaEmpresa.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_empresas.php");
    ?>
</section>
