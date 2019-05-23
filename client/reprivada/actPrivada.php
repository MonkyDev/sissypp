<?php
	session_start();
	require_once("../clases/conexion.php");
	$db=new conexion();	
	$user=$_GET['permiso'];
	
	$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,servsocial.idservsocial,servsocial.no_cons,servsocial.anhio,servsocial.f_solicitud,servsocial.f_inicio,servsocial.f_fin,servsocial.horario,servsocial.programa,servsocial.nomEmp,servsocial.tipoEmp,servsocial.giroEmp,servsocial.dirEmp,servsocial.telEmp,servsocial.resEmp,servsocial.cargo,servsocial.edoEmp,servsocial.muniEmp,servsocial.matricula AS servMatri,servsocial.edo,programas.idprogramas,programas.descripcion AS prgDes,grupos.idgrupos,grupos.grado,grupos.grupo,grupos.turno,grupos.carr,turnos.idturnos,turnos.descripcion AS turnoDes,carreras.idcarreras,carreras.nombre AS carNombre FROM alumnos INNER JOIN servsocial ON servsocial.matricula=alumnos.matricula INNER JOIN programas ON programas.idprogramas=servsocial.programa INNER JOIN grupos ON grupos.idgrupos=alumnos.grupo INNER JOIN turnos ON turnos.idturnos=grupos.turno INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera WHERE servsocial.matricula = '$user' AND servsocial.edo != 0 ";
	$result = $db->executeQuery($sql);
	$row = $db->getRows($result);

	$a=$row['alnNombre'];
	$b=$row['paterno'];
	$c=$row['materno'];
	$n_completo = $a. " ".$b. " ".$c;

	/*----------------FECHA EN ARRAY----------------------*/
	$meses = 
	array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
	$x=explode("-",$row['f_inicio']);
	$m=$x[1];
	$y=explode("-",$row['f_fin']);
	$me=$y[1];
	$z="Del ".$x[2]." de ".$meses[$m-1]." de ".$x[0]." al ".$y[2]." de ".$meses[$me-1]." de ".$y[0] ;
	//-------------------------------------------------------------------------------------------------------
	$fecha=explode("-",$row['f_solicitud']);
	if($fecha[1] && $x[1] && $y[1] <10){
		$e="''"+$fecha[1]; //LE QUITO EL CERO AL MES PARA PODER COMPARARLO CON EL ARRAY
		$m="''"+$x[1];
		$me="''"+$y[1];
	}
	else{
		 $e=$fecha[1];
		 $m=$x[1];
		 $me=$y[1];
	}
	/*-------------------FIN DE SOLUCION-----------------*/
	include("proceDate.php");
?>

<section>
<div class="responsive">
  <font face="Arial, Helvetica, sans-serif" size="+1">
  <br>
  <section id="one" style="margin-top:-20px;">
      <div id="OA" align="center">
          <p>
              <font size="+6">
                   <b>
                      I.E.S.CH.
                   </b>
              </font>
                      <p>INSTITUTO DE ESTUDIOS
                      <P>SUPERIORES DE CHIAPAS
      </div>
      <p><br/>
      
      <div id="OB">
        <center>
          <P>
            <font size="+2">
                SECRETARÍA DE EDUCACIÓN<p>
                SUBSECRETARÍA DE EDUCACIÓN ESTATAL<p>
                DIRECCIÓN DE EDUCACIÓN SUPERIOR<p>
                DEPARTAMENTO DE SERVICIOS ESCOLARES Y BECAS<p>
                <i style="float:right;"> E-SS-07</i>
          </font>
        </center>
     </div> 
    </section>
    
    <section id="two" style="margin-top:-80px;">
        <section id="boxO">
    	<table class="infbox">
        	<input id="mat" value="<?php echo $user; ?>" hidden />
        	<input type="text" id="folio_servico" value="<?php echo $row['idservsocial'];?>"  hidden/>
           	<input type="text" id="fecha_solicitud" value="<?php echo $row['f_solicitud'];?>"  hidden/>
            <input type="text" id="fecha_final" value="<?php echo $row['f_fin'];?>"  hidden/>  
            <input type="text" id="noReport" hidden/>          
            <input type="text" id="f_Uparcial" hidden/>
        	<div class="F" style="position:relative;">
    			EMPRESA-PRIVADA 
    		</div>
            <div class="OC" style="position:relative;">
			CARATULA DE PRESENTACIÓN-REPORTE DE ACTIVIDADES TIPO DE REPORTE: 
                <select class="bg" id="tipo_reporte"  onblur="noReport()" style="width:203px;">
                        <option value="1">Mensual</option>
                        <option value="3">Global</option>
                  </select>
            </div>      
        </table>	
    	</section>
    </section>
     <section id="tree" style="margin-top:-20px;">
     	 <section id="boxO">
         	<div style="margin-top:40px;"><b><font size="+2">1.-DATOS DEL PRESTADOR</font></b></div>
            <table class="form_Priv">
              <font face="Arial, Helvetica, sans-serif">
              <div class="TC" style="position:relative; margin-top:40px;">
              1.1.-No. DE CONTROL:  
              <input type="text" value="<?php echo $user; ?>" style="width:200px;" readonly/>
              </div>
              <div class="TC" style="position:relative;">
              1.2.-PERIODO DEL REPORTE PRESENTADO:  
              fecha inicio<input type="date" id="f_inicial" onblur="periodoP()" 
                value="<?php echo $ult_fec;?>" min="<?php echo $ult_fec;?>" max="<?php echo $ult_fec;?>" />
              
              fecha parcial<input type="date" id="f_parcial"/>
              </div>
              <div class="TC" style="position:relative;">
              1.3.-NOMBRE:  
              <input type="text" value="<?php echo $n_completo; ?>" style="width:955px;" readonly/>
              </div>
              <div class="TC" style="position:relative;">
              1.4.-CARRERA:  <input type="text" 
              value="<?php echo $row['carNombre']; ?>" style="width:946px;" readonly/>
              </div>
              <div class="TC" style="position:relative;">
              1.5.-EMPRESA ASIGNADA:  
              <input type="text" value="<?php echo $row['nomEmp']; ?>" style="width:848px;" readonly/>
              </div>
              <div class="TC" style="position:relative;">
              1.6.-DOMICILIO DE LA EMPRESA:  
              <input type="text" value="<?php echo $row['dirEmp']; ?>" style="width:789px;" readonly/>
              </div>
              </font>
              <p><br/><div id="boxO" style="border-top:5px double #000; margin:0px; margin-top:-20px;">
              <b><font size="+2">2.-DATOS DEL PROGRAMA</font></b>
              </div>
              
               <div class="TC" style="position:relative; margin-top:20px;">
              2.1.-NOMBRE:  
              <input type="text" value="<?php echo $row['prgDes']; ?>" id="nombre_progra" style="width:955px;" readonly/>
              </div>
              <div class="TC" style="position:relative;">
              2.2.-PERIODO DE PRESTACIÓN:  
              <input type="text" value="<?php echo $z; ?>" style="width:800px;" readonly/>
              </div>
              <div class="TC" style="position:relative;">
              2.3.-OBJETIVO:  
              <input type="text" id="objetivo_servico" class="di" maxlength="80" style="width:944px;"
              onkeyup="this.value=this.value.toUpperCase();"/>
              </div>
              
              <p><div id="boxO" style="border-top:5px double #000; margin:0px;">
              <b><font size="+2">3.-PARA AGREGAR EL REPORTE DE ACTIVIDADES <i>click aqu&iacute;</i></font></b>
              <img src="icon/edit-document.png" class="aco" width="25" 
              onclick="compruebaP();">
              </div>
              
              <p><div id="boxO" style="border-top:5px double #000; margin:0px;">
              <b><font size="+2">4.-FIRMAS DE VALIDACION EN CARATULA Y ANEXOS</font></b>
              </div>
         	</table>
         </section>
    </section>
    
     <section id="four" style="margin-top:520px; margin-left:20px;">
          <div style="text-align:center; position:absolute;">
          REPONSABLE DEL PROGRAMA<p>
          EN LA EMPRESA<br/><p>
          _______________________________________<p>
          NOMBRE Y FIRMA		        
          </div>
          <div style="text-align:center; position:absolute; margin-left:700px;">
          PRESTADOR DEL SERVICIO<p>
          SOCIAL<br/><p>
          _______________________________________<p>
          NOMBRE Y FIRMA		        
          </div>
     	</section>
    </section>
 	</font>  
<!--    
    <div style="margin:5px; float:left; margin-top:90px; margin-left:455px; padding:10px;">
    <input type="button" id="sent" value="Enviar"/>
    </div>
-->
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
input[type:date]{
	padding:7px;
}
.aco:hover{
	cursor:pointer;
}
.aco{
	margin-top:4px;
}
</style>