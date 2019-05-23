<section id="barratitulo">
    <div id="titulo">Solicitudes de servicio social</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconActualizar" class="icon" title="Actualizar estado" onClick=""></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadScreen('genServSocial/mnu_genServSocial.php','main');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_servicios.php");
    ?>
</section>
