<section id="barratitulo">
    <div id="titulo">GRUPOS</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconNuevo" class="icon" title="Nuevo" onclick="loadWindow(545,240); loadScreen('grupos/frm_nvoGrupo.php','window');"></div>
    </div>
</section>
<section class="desgloseTabla">
	<?php
		include("tbl_grupos.php");
    ?>
</section>
