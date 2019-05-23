<section id="barratitulo">
    <div id="titulo">Nvo. Plan escolar</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accPlanEscolar(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvoPlanEscolar">
	<table>
    	<tr>
        	<td><label>Descripción:</label></td>
            <td><input type="text" id="descripcion" name="descripcion" style="width:350px;" maxlength="105" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Años:</label></td>
            <td>
            	<select id="danhios" name="danhios" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="1" selected="selected">1 año</option>
                    <option value="2">2 años</option>
                    <option value="3">3 años</option>
                    <option value="4">4 años</option>
                    <option value="5">5 años</option>
                    <option value="6">6 años</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td><label>Meses:</label></td>
            <td>
            	<select id="dmeses" name="dmeses" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="0" selected="selected">0 mes</option>
                    <option value="1">1 mes</option>
                    <option value="2">2 meses</option>
                    <option value="3">3 meses</option>
                    <option value="4">4 meses</option>
                    <option value="5">5 meses</option>
                    <option value="6">6 meses</option>
                    <option value="7">7 meses</option>
                    <option value="8">8 meses</option>
                    <option value="9">9 meses</option>
                    <option value="10">10 meses</option>
                    <option value="11">11 meses</option>
                </select>
            </td>
        </tr>
    </table>
    </form>
</section>