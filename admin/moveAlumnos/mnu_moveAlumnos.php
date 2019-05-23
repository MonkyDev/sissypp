<section id="barratitulo">
    <div id="titulo">Mover alumnos de grupo</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconRightArrow" class="icon" title="Mover a grupo" onclick="accMoveAlumnos(1,0)"></div>
        <div id="iconPaperAirplane" class="icon" title="Mover a egresados" onclick="if(confirm('Desea mover a los alumnos')) loadScreen('moveAlumnos/mnu_moveAlumnos.php','window');"></div>
    </div>
</section>
<section>
	<section style="width:533px; height:473px; background-color:#E0E0E0; float:left; margin-right:10px; border:#666 1px solid;">
    	<section class="formulario" style="width:501px; height:34px; border:#999 1px solid; margin:10px; background-color:#FFF;">
        	<table>
            	<tr>
                    <td>Del grupo:</td>
                    <td>
                    <input type="text" id="txtCodFrom" style="width:330px;" placeholder="Código del grupo + enter" onkeyup="if(validateTecla(event)=='enter')accMoveAlumnos(6,this.value+'|lst_from|txtCodFrom|infoDe');           if(validateTecla(event)=='F8') { loadWindow(1000,500);loadScreen('moveAlumnos/frm_findGrupo.php?c=lst_from&i=txtCodFrom&j=infoDe','window');}"/>
                    <input type="hidden" id="infoDe" /> <font color="#CCCCCC">F8 - Buscar</font>
            		</td>
                </tr>
            </table>
        </section>
        <section id="lst_from" style="width:511px; height:394px; border:#999 1px solid; margin:10px; background-color:#FFF;">
        	<center><font color="#CCCCCC">Lista de alumnos</font></center>
        </section>
    </section>


    <section style="width:533px; height:473px; background-color:#E0E0E0; float:left; border:#666 1px solid;">
    	<section class="formulario" style="width:501px; height:34px; border:#999 1px solid; margin:10px; background-color:#FFF;">
        	<table>
            	<tr>
                    <td>Al grupo:</td>
                    <td><input type="text" id="txtCodTo" style="width:330px;" placeholder="Código del grupo + enter" onkeyup="if(validateTecla(event)=='enter')accMoveAlumnos(6,this.value+'|lst_to|txtCodTo|infoPara');
            if(validateTecla(event)=='F8') { loadWindow(1000,500); loadScreen('moveAlumnos/frm_findGrupo.php?c=lst_to&i=txtCodTo&j=infoPara','window');}"/> <input type="hidden" id="infoPara" /> <font color="#CCCCCC">F8 - Buscar</font></td>
                </tr>
            </table>
        </section>
        <section id="lst_to" style="width:511px; height:394px; border:#999 1px solid; margin:10px; background-color:#FFF;">
        	<center><font color="#CCCCCC">Lista de alumnos</font></center>
        </section>
    </section>
</section>
