<?php
require_once('../clases/conexion.php');
$db= new conexion();
$sql_pg="SELECT * FROM programas WHERE edo != 0";
$result_pg=$db->executeQuery($sql_pg);
?>
<section>
<div class="responsive">
<font face="Arial, Helvetica, sans-serif" size="+1">
	<div>
    <font size="+2.5">
    <b>
    	<p/><center>INSTITUTO DE ESTUDIOS SUPERIORES DE CHIAPAS</center>
        <center>SECRETARÍA DE EDUCACIÓN</center>
        <center>SUBSECRETARÍA DE EDUCACIÓN ESTATAL</center>
        <center>SOLICITUD DE PRÁCTICAS PROFESIONALES</center>         
    </b>
    </font>
    </div>
    
    <div style="margin-top:25px;"><b><center><font size="+3">
        DATOS DEL SOLICITANTE
        </center></font></b>
        </div><!--accFormulario(3,0)-->
   
    <section id="box"> 
      <div class="full">
        <?php include('tbl_practi.php'); ?>
      </div>	  
    </section>
    
        <div style="margin-top:10px;">
        	<b>
        		<center>
        			<font size="+3">
        				DATOS DE LA DEPENDENCIA DONDE PRESTARA LAS PRÁCTICAS
                   	</font>
        		</center>
        	</b>
        </div>
     <input type="text" id="sem_aln" hidden/>   
    <section id="box1">
      <div class="full">
          <table class="form_empre">
          <div class="A" style="position:relative;">
              Empresa:  <select class="bg" id="tipo_emp" style="width:203px;">
              			<option value="Gobierno">Gobierno</option>
                        <option value="Privada">Privada</option>
                        </select>
            </div>
              <div class="C" style="position:relative;">
                NOMBRE DE LA DEPENDENCIA:  
                <input type="text" id="emp_prt" class="de" style="width:830px;" onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              <div class="C" style="position:relative;">
                GIRO DE LA EMPRESA:  
                <input type="text" id="gir_prt" class="gi" style="width:600px;" onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              <div class="D" style="position:relative;">
                TEL:  
                <input type="tel" id="tel_prt" style="width:219px;" maxlength="10" placeholder="lada+número"/>
              </div>
              <div class="E" style="position:relative; margin-top:3px;">
                DIRECCIÓN:  
                <input type="text" id="dir_prt" class="di" placeholder="Donde hace presencia" 
                style="width:1001px;" onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              <div class="C" style="position:relative;">
                PERSONA A QUIÉN TIENE QUE DIRIGIRSE:  
                <input type="text" id="psn_prt" class="je" style="width:736px;" onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              <div class="C" style="position:relative;">
                PUESTO O CARGO:  
                <input type="text" id="crg_prt" class="ca" style="width:939px;" onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              <div class="C" style="position:relative;">
                Programa Asignado:  <select class="bg" id="progr_asg" style="width:500px;">
						<?php
                        while($row_pg = $db->getRows($result_pg)){
                        ?>
              			<option 
                        value="<?php echo $row_pg['idprogramas'];?>"><?php echo $row_pg['descripcion'];?></option>
                        <?php }?>  
                        </select>
              </div>
              <div class="C" style="position:relative;">
                Actividades a realizar:  
                	<input type="text" id="act_prt" class="ac" style="width:931px;" maxlength="110"
                    onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              <div class="F" style="position:relative;">
                Fechas de las Prácticas:  
                      Inicio<input type="date" id="feIni_prt" min="<?php echo date('Y-m-d')?>" onchange="cal_fechMax();"
                      onblur="generaPeriodo(document.getElementById('feIni_prt').value,'<?php echo $row['desPlan']?>')" onkeyup="detecta1()"/>
                      Término<input type="date" id="feFin_prt" min="<?php echo date('Y-m-d')?>"/>
              </div>
              <div class="F" style="position:relative;">
                Horario de las Prácticas:  
                        Entrada<input type="time" id="horEn"/>
                        Salida<input type="time" id="horSa"/>
              </div>
              <div class="C" style="position:relative;">
            	Estado: 
                <select id="edo_prt" style="width:330px;" onfocus="carga1()"><option>Selecciona tu estado</option></select>
            </div>
            <div class="D1" style="position:relative;">
            	Municipio:  
                <select id="mun_prt" style="width:330px;"><option>Selecciona tu municipio</option></select>
            </div>
          </table>	
      </div>
    </section>
    <p>
    <section>
    
    	<div><center><b>DATOS QUE DEBERA ANEXAR A ESTA SOLICITUD</b></center></div>
        
        <div>
        	<ul>
            	<li>Acta de Nacimiento</li>
                <li>Los Datos No deberán Abreviarse</li>
                <li>Boleta de Calificaciones del semestre anterior cursado</li>
                <li>Los Documentos se deberán presentar en copia fotostática</li>
            </ul>
        </div>
        
        <div>
          <center>
            <b>
              *TODOS LOS DATOS PROPORCIONADOS ESTAN PROTEGIDOS POR EL AVISO DE PRIVACIDAD*
            </b>
          </center>
        </div
        ><p>
        
        <div><center><b>Vo.Bo-Firma</b></center></div>
           <div style="padding:10px;">
    <input type="button" id="sent" onclick="blockButton('sent');accFormulario(3,0);" value="Enviar"/>
    </div>

        <div><center><b>_____________________</b></center></div>
    </section>
  </font>
</div>
</section>
<style>
select{
	padding:2px;
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
</style>

<!--
https://www.w3.org/TR/html-markup/input.datetime-local.html (para activar el input datetime-local en ON)
http://www.mclibre.org/consultar/htmlcss/css/css_color.html (colores xidos claros para css fondos)
-->