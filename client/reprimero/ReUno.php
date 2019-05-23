<?php
session_start();
require_once("../clases/conexion.php");
$db=new conexion();
$user_r=$_GET['permiso'];

$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,servsocial.idservsocial,servsocial.no_cons,servsocial.anhio,servsocial.f_solicitud,servsocial.f_inicio,servsocial.f_fin,servsocial.horario,servsocial.programa,servsocial.nomEmp,servsocial.tipoEmp,servsocial.giroEmp,servsocial.dirEmp,servsocial.telEmp,servsocial.resEmp,servsocial.cargo,servsocial.edoEmp,servsocial.muniEmp,servsocial.matricula AS servMatri,servsocial.edo,programas.idprogramas,programas.descripcion AS prgDes,grupos.idgrupos,grupos.grado,grupos.grupo,grupos.turno,grupos.carr,turnos.idturnos,turnos.descripcion AS turnoDes,carreras.idcarreras,carreras.nombre AS carNombre FROM alumnos INNER JOIN servsocial ON servsocial.matricula=alumnos.matricula INNER JOIN programas ON programas.idprogramas=servsocial.programa INNER JOIN grupos ON grupos.idgrupos=alumnos.grupo INNER JOIN turnos ON turnos.idturnos=grupos.turno INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera WHERE servsocial.matricula = '$user_r' AND servsocial.edo != 0";
	$result = $db->executeQuery($sql);
	$row = $db->getRows($result);
	
$a=$row['alnNombre'];
$b=$row['paterno'];
$c=$row['materno'];
$user = $a. " ".$b. " ".$c;	
	
$periodo = $row['f_inicio']." al ".$row['f_fin'];		
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
    
    <section id="two" style="margin-top:-100px;">
        <section id="boxO" style="margin-left:0px;">
    	<table class="infbox">
            <div style="margin-left:340px; position:relative;">
			CARATULA DEL PROGRAMA INICIAL DE ACTIVIDADES<div>      
        </table>	
    	</section>
    </section>
  
     <section id="tree" style="margin-top:-20px;">
            <table class="form_Priv">
              <font face="Arial, Helvetica, sans-serif">
              <input id="mat" value="<?php echo $row['alnMatricula']; ?>" hidden />
              <input id="fch" value="<?php echo date('Y-m-d'); ?>" hidden/>
              <input id="per" value="<?php echo $row['f_inicio']; ?>" hidden/>
              <input id="pir" value="<?php echo $row['f_inicio']; ?>" hidden/>
              <input id="fol" value="<?php echo $row['idservsocial']; ?>" hidden/>
              <div class="TC" style="position:relative; margin-top:40px;">
              TIPO DE REPORTE:
              </div> 
              <select class="bg" id="tip" style="width:203px;">
              			<option value="0">Inicial</option>
                        </select>
              <div class="TC" style="position:relative;">
              DEPENDENCIA:
              </div> 
              <input type="text" class="bg" style="width:1100px;" 
              value="<?php echo $row['nomEmp'];?>" readonly/>
               <div class="TC" style="position:relative;">
              DIRECCIÓN:
              </div>  
              <input type="text" class="bg" style="width:1100px;" 
              value="<?php echo $row['dirEmp'];?>" readonly/>
               <div class="TC" style="position:relative;">
              DEPARTAMENTO:
              </div>  
              <input type="text" class="bg" id="dpt" style="width:1100px;" 
              placeholder="Ll&eacute;nalo si te asignaron a un departamento" onkeyup="this.value=this.value.toUpperCase();"/>
               <div class="TC" style="position:relative;">
              NOMBRE DEL PRESTADOR:
              </div> 
              <input type="text" class="bg" style="width:1100px;" 
              value="<?php echo $user;?>" readonly/>
               <div class="TC" style="position:relative;">
              LICENCIATURA:
              </div>  
              <input type="text" class="bg" style="width:1100px;" 
              value="<?php echo $row['carNombre']; ?>" readonly/>
               <div class="TC" style="position:relative;">
              PERIODO DEL SERVICIO: 
              </div> 
              <input type="text" class="bg" style="width:1100px;"
              value="<?php echo $periodo; ?>" readonly/>
               <div class="TC" style="position:relative;">
              NOMBRE DEL PROGRAMA: 
              </div> 
              <input type="text" class="bg" style="width:1100px;"
              value="<?php echo $row['prgDes']; ?>" readonly/>
              <div class="TC" style="position:relative;">
              OBJETIVOS GENERALES:
              </div>  
              <textarea class="bg" id="obg" style="width:1100px; font-size:17px;" rows="3" 
              placeholder="De la empresa o departamento en el que te asignaron" maxlength="170" 
              onkeyup="this.value=this.value.toUpperCase();"></textarea>
              <div class="TC" style="position:relative;">
              OBJETIVOS ESPECÍFICOS:
              </div>  
              <textarea class="bg" id="obe" style="width:1100px; font-size:17px;" rows="3" 
              placeholder="Especifique que es lo que pretendes aprender" maxlength="210"
              onkeyup="this.value=this.value.toUpperCase();"></textarea>
              
              <p><div id="boxO" style="border-top:5px double #000; margin:0px;">
              <b><font size="+2">PARA AGREGAR EL REPORTE DE ACTIVIDADES <i>click aqu&iacute;</i></font></b>
              <img src="icon/edit-document.png" class="aco" width="25" 
              onclick="comprueba();">
              </div>
         	</table>
         </section>
    </section>
    
     <section id="four" style="margin-top:20px; margin-left:390px;">
          <div style="text-align:center; position:absolute;">
          A T T E N T A M E N T E<br>
         
          _______________________________________________<p>
          NOMBRE Y FIRMA DEL FUNCIONARIO RECEPTOR (SELLO)		        
          </div>
     	</section>
    </section>
 	</font>  
</div>
</section>
<style>
select{
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
.aco:hover{
	cursor:pointer;
}
.aco{
	margin-top:4px;
}
</style>
