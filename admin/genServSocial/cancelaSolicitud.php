<?php
$id=$_GET['id'];
$d=explode('|',$id);
$id=$d[0];
?>

<script>
$(document).ready(function(e) {
	document.getElementById('motivo').value="";
	document.getElementById('motivo').focus();
});
</script>

<section id="barratitulo">
    <div id="titulo">Cancelación del folio: <?php echo $d[1];?></div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
    </div>
</section>
<div style="width:545px; height:250px;">
	<div style=" font-family:Arial, Helvetica, sans-serif; color:#333;">Ingrese el motivo de cancelación:</div>
    <form id="frmCancelaServicio">
		<textarea style="width:538px; height:130px; resize:none;" id="motivo" name="motivo" onBlur="this.value=trim(this.value,' ');">
    	</textarea>
        <input type="hidden" id="idServicio" name="idServicio" value="<?php echo $d[0]; ?>">
        <input type="hidden" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
    </form>
    <div class="botonflat" style="float:right;" onClick="accGenServicio(3,<?php echo $d[0]; ?>);">Cancelar</div>
</div>
