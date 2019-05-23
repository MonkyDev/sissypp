<section id="barratitulo">
    <div id="titulo">Nva. Empresa</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accEmpresas(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvaEmpresa">
	<table>
    	<tr>
        	<td><label>Nombre:</label></td>
            <td><input type="text" id="nombre" name="nombre" style="width:450px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    	<tr>
        	<td><label>Giro:</label></td>
            <td><input type="text" id="giro" name="giro" style="width:350px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Direcci&oacute;n:</label></td>
            <td><input type="text" id="direccion" name="direccion" style="width:450px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Tel&eacute;fono:</label></td>
            <td><input type="text" id="telefono" name="telefono" style="width:350px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>E-mail:</label></td>
            <td><input type="text" id="correo" name="correo" style="width:350px;" maxlength="85" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>P&aacute;g. web:</label></td>
            <td><input type="text" id="web" name="web" style="width:350px;" maxlength="95" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Latitud:</label></td>
            <td><input type="text" id="ubx" name="ubx" style="width:350px;" maxlength="45"></td>
        </tr>
        <tr>
        	<td><label>Longitud:</label></td>
            <td><input type="text" id="uby" name="uby" style="width:350px;" maxlength="45"></td>
        </tr>
        <tr>
        	<td><label>Tipo:</label></td>
            <td>
            	<select id="tipo" name="tipo">
                	<option value="GOBIERNO">Gobierno</option>
                    <option value="PRIVADO">Privado</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td><label>Fecha Aut.:</label></td>
            <td><input type="date" id="faut" name="faut" style="width:170px;" maxlength="45" placeholder="aaaa-mm-dd"></td>
        </tr>
        <tr>
        	<td><label>Vigencia:</label></td>
            <td><input type="text" id="vigencia" name="vigencia" style="width:170px;" maxlength="45" placeholder="dd/mm/aaaa ó INDEFINIDO"></td>
        </tr>
    </table>
    </form>
</section>