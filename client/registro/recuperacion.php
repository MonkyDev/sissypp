<section style="width:99%; height:99%;" id="recovery">
<div id="winHeadIconBox">
          <div class="icon" id="cerrar" title="Cerrar" onclick="closeWindow();"></div>
          <!--<div class="icon" id="guardar" title="Guardar" onclick="accProductos(1,0);"></div>-->
</div>
<div style="margin-top:15px;">
<form id="form_reco">
	<table cellpadding="2" height="350" width="150" align="center" style="font-family:'Bree Serif', serif; font-size:16px;">
    	<tr>
            <td></td>   
            <td></td>   
        </tr>
    	<tr>
        	<td colspan="2" style="background-color:#87CEEB;border-radius:5px;">
            	<center>Recupera tu contrase&ntilde;a, llena lo siguiente...</center>
            </td>
            <td></td>
        </tr>
    	<tr>
        	<td>Mátricula</td>
            <td><input name="matricula" id="mat" style="width:250px;" type="text"></td>
        </tr>
        <tr>
        	<td>Cumpleaños</td>
            <td><input name="fnacimiento" style="width:250px;" type="date"></td>
        </tr>
        <tr>
        	<td>Pregunta</td>
            <td>
                <select name="pregunta" style="width:250px;">
                    <option value="0">Elige la misma pregunta de recuperacioón</option>
                    <option value="1">¿Cu&aacute;l era tu apodo de ni&ntilde;o?</option>
                    <option value="2">¿Cu&aacute;l es el nombre de tu mascota?</option>
                    <option value="3">¿C&oacute;mo se llama tu mejor amigo?</option>
                    <option value="4">¿Cu&aacute;l es tu canci&oacute;n favorita?</option>
                    <option value="5">¿Comida favorita que no compartes?</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td>Respuesta</td>
            <td><input id="res" name="respuesta" style="width:250px;" type="text" 
            onkeyup="if(validateTecla(event)=='enter'){getDataForm('form_reco');}" ></td>
        </tr>
        <tr >
        	<td colspan="2" align="center">
            	<input type="button" value="   Aceptar   "  class="ok" onclick="getDataForm('form_reco');" />
            </td>
            <td></td>
        </tr>
    </table>
</div>
</section>
<style>
input{
	padding:5px;
}
select{
	padding:5px;
	font-size:17px;
	padding-left:5px;
	border:1px solid #ccc;
	border-radius:4px;
	font-size:1em;
	outline:none;
	transition: all 0.15s ease-in-out;
}
select:focus {
	box-shadow: 0 0 5px rgba(255,0,0,1);
	border:1px solid rgba(255,0,0,0.8);
}
.ok:hover{
	cursor:pointer;	
}
</style>
<script>
    $('#mat').focus();
</script>