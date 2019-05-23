<section id="barratitulo">
    <div id="titulo">Nvo. Programa</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accProgramas(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvoPrograma">
	<table>
    	<tr>
        	<td><label>Descripción:</label></td>
            <td><input type="text" id="descripcion" name="descripcion" style="width:350px;" maxlength="105" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Tipo:</label></td>
            <td>
            	<select id="tipo" name="tipo" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="GOBIERNO" selected="selected">Gobierno</option>
                    <option value="PRIVADO">Privado</option>
                </select>
            </td>
        </tr>
    </table>
    </form>
</section>