<script>
	$(document).ready(function(){
		loadScreen('alumgrupo/drawLista.php','tabla_alumxgrupo');
   	});
</script>
<section id="barratitulo">
    <div id="titulo">Agregar alumnos a un grupo</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconGuardar" class="icon" title="Guardar" onclick="accAlumGrupos(1,'0');"></div>
    </div>
</section>
<section class="formulario" style="width:100%; height:100px;">
    <section id="aca">
	<table>
    	<tr>
        	<td align="right">Código de grupo</td>
            <td colspan="3"><input type="text" id="txt_codGrupo" title="Ingrese código y presione enter" style="width:100px;" onkeyup="if(validateTecla(event)=='enter')accAlumGrupos(6,document.getElementById('txt_codGrupo').value);
            if(validateTecla(event)=='F8') { loadWindow(1000,500); loadScreen('alumgrupo/frm_findGrupo.php','window');}"> <font color="#999999">F8 - Buscar</font></td>
        </tr>
        <tr>
        	<td align="right">Grado y Grupo</td>
            <td><input type="hidden" id="noGrupo" /><input type="hidden" id="idCarrera" /><input type="text" id="txt_gradogrupo" readonly="readonly"></td>
            <td align="right">Carrera</td>
            <td><input type="text" id="txt_carrera" readonly="readonly" style="width:400px;"></td>
        </tr>
        <tr>
        	<td align="right">Turno</td>
            <td><input type="text" id="txt_turno" readonly="readonly"></td>
            <td align="right">Plan escolar</td>
            <td><input type="text" id="txt_pescolar" readonly="readonly" style="width:400px;"></td>
        </tr>
    </table>
    </section>
</section>
<div style="width:100%; border:#CCC solid 1px; text-align:center; margin-top:10px; margin-bottom:10px; padding-bottom:5px; padding-top:5px; background-color:#E8E8E8; border-radius:10px 10px 0px 0px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
    	Lista de alumnos
</div>
    <section class="formulario" style=" width:100%; height:30px;">
        <div style="float:left;">
        	<table cellpadding="2">
            	<tr>
                	<td>Matrícula</td>
                    <td>A. Paterno</td>
                    <td>A. Materno</td>
                    <td>Nombre(s)</td>
                </tr>
                <tr>
                	<td><input type="text" id="matricula" name="matricula" style=" width:100px;" /></td>
                    <td><input type="text" id="apaterno" name="apaterno" style="width:270px;" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"  /></td>
                    <td><input type="text" id="amaterno" name="amaterno"  style="width:270px;" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" /></td>
                    <td><input type="text" id="nombre" name="nombre" style="width:270px;" onkeyup="this.value = this.value.toUpperCase();if(validateTecla(event)=='enter')accAlumGrupos(5,'0');" onblur="this.value=trim(this.value,' ');/></td>
                    <td><div class="icon_s" id="iconAddList" title="Agregar a la lista" onclick="accAlumGrupos(5,'0');" style="float:left;"></div></td>
                </tr>
            </table>
        </div>    
    </section>
    <div class="tblDesglose" id="tabla_alumxgrupo">
    </div>
