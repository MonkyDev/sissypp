<?php
require_once("../clases/conexion.php");
$db=new conexion();
$user_s=$_GET['permiso'];

$sql="SELECT alumnos.matricula, alumnos.nombre AS alnNombre, alumnos.paterno, alumnos.materno, alumnos.domicilio, alumnos.grupo, alumnos.sexo, alumnos.edad, alumnos.telefono, alumnos.carrera, carreras.idcarreras, carreras.nombre AS carNombre, grupos.idgrupos, grupos.grado, grupos.grupo, grupos.turno, grupos.pEscolar, turnos.idturnos, turnos.descripcion AS desTurno, planescolar.idplanescolar, planescolar.descripcion AS desPlan FROM alumnos INNER JOIN carreras ON alumnos.carrera=carreras.idcarreras INNER JOIN grupos ON alumnos.grupo=grupos.idgrupos INNER JOIN turnos ON grupos.turno=turnos.idturnos INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar WHERE alumnos.matricula = '".$user_s."'";
	$result=$db->executeQuery($sql);
	$row = $db->getRows($result);
	
$no_sol=$db->genIndex('servsocial',1);
$no_sol=$db->genIndexFecha('servsocial',1,date('Y'),'anhio');

$a=$row['alnNombre'];
$b=$row['paterno'];
$c=$row['materno'];
$user_social = $a. " ".$b. " ".$c;

$gd=$row['grado'];
$gp=$row['grupo'];
$us_gdp = $gd."&omicron;". " " .$gp;
	  
?>

<table id="form_alum"> 
<input type="hidden" id="age_aln" value="<?php echo $row['edad']; ?>" />
<input type="hidden" id="s_soc" value="<?php echo $no_sol; ?>" />

    <p>
    <div style="position:relative;">
        Solicitud:  
        <input type="text" value="<?php echo $no_sol."/".date('Y'); ?>" readonly/>
    </div>
    <div class="B" style="position:relative;">
        Fecha:  
        <input type="text" id="fec_soc" style="width:190px;" 
        value="<?php echo date("Y-m-d"); ?>" readonly/>
    </div>
    <div class="C" style="position:relative;">
        Nombre:  
        <input type="text" id="nom_soc"
        value="<?php echo $user_social; ?>" 
        style="width:600px;" readonly/>
    </div>
    <div class="D" style="position:relative;">
        Tel:  
        <input type="text" id="tel_aln"
        value="<?php echo $row['telefono']; ?>" 
        style="width:218px;" readonly/>
    </div>
    <div class="E" style="position:relative;">
        Domicilio:  
        <input type="text" id="dom_aln" 
        value="<?php echo $row['domicilio']; ?>"
        style="width:1018px;" readonly/>
    </div>
    <div class="F" style="position:relative;">
      Sexo: <input type="text" id="sexo" 
      value="<?php echo $row['sexo']; ?>" 
      style="width:30px;"readonly/>
    </div>
    <div class="G" style="position:relative;">
        No. de control:  
        <input type="text" 
        value="<?php echo $row['matricula']; ?>" 
        id="con_aln" readonly/>
    </div>
    <div class="H" style="position:relative;">
        Créditos aprobados:  
        <input type="text" style="width:40px;" readonly/>
    </div>
    <div class="I" style="position:relative;">
        Especialidad:  
        <input type="text" id="spc_aln" 
        value="<?php echo $row['carNombre']; ?>" 
      class="esp" style="width:780px;" readonly/>
    </div>
    <div class="J" style="position:relative;">
        Semestre:  
        <input type="text"
        value="<?php echo $us_gdp; ?>" 
        min="0" max="14" style="text-align:center;width:73px;"readonly/>
    </div>
   <div class="K" style="position:relative;">
          Turno: <input type="text" id="trn_aln"
          value="<?php echo $row['desTurno']; ?>" 
          style="width:224px;" readonly/>
    </div>
</table>