<section id="barratitulo">
    <div id="titulo">Nvo. Turno</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accTurnos(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvoTurno">
	<table>
    	<tr>
        	<td><label>Descripción:</label></td>
            <td><input type="text" id="descripcion" name="descripcion" style="width:350px;" maxlength="105" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    </table>
    </form>
</section>