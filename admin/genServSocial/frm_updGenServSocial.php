<?php
require_once("../clases/conexion.php");
require_once("../clases/fechas.php");
$db=new conexion();
$fech=new Fechas();
//$noServ=$db->genIndexFecha('servsocial',1,date('Y'),'anhio');
$sqlProg="SELECT * FROM programas WHERE edo=1";
$resProg=$db->executeQuery($sqlProg);
$idServicio=$_GET['id'];

$sqlServicio="SELECT servsocial.*,alumnos.matricula,alumnos.nombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.sexo,alumnos.fnacimiento,
alumnos.edad,alumnos.telefono,grupos.grado,grupos.grupo,grupos.turno,carreras.nombre as nomCarrera,carreras.director, carreras.coordinador, planescolar.descripcion as nomPlan,turnos.descripcion as nomTurno FROM alumnos INNER JOIN servsocial ON  alumnos.matricula=servsocial.matricula INNER JOIN grupos ON alumnos.grupo=grupos.idgrupos INNER JOIN carreras ON grupos.carr=carreras.idcarreras INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar INNER JOIN turnos ON grupos.turno=turnos.idturnos WHERE idservsocial=".$idServicio;

$rsServicio=$db->executeQuery($sqlServicio);
$rwServicio=$db->getRows($rsServicio);

$hri=substr($rwServicio['horario'],4,5);
$hrf=substr($rwServicio['horario'],13,5);
?>
<script>
	function madeHr(){
	document.getElementById('horario').value="De: " + document.getElementById('hr_de').value + " A: " + document.getElementById('hr_a').value;
	}
</script>
<section id="barratitulo">
    <div id="titulo">Generar Solicitud de Serv. Social</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconGuardar" class="icon" title="Actualizar" onclick="document.getElementById('periodoIni').value=generaPeriodo(document.getElementById('f_inicio').value,document.getElementById('txt_plan').value);madeHr(); accGenServicio(2,<?php echo $idServicio; ?>);"></div>
    </div>
</section>
<section id="aca" style="background-color:#FFF; width:100%; height:480px; overflow-y:scroll;">
<section class="formulario">
<form id="frm_genSolicitud">
	<div style="width:100%; height:35px; line-height:30px;">
        <div style="float:left;">
        	<font size="+1">
            	No. Solicitud: <?php echo $rwServicio['no_cons'] . " / " . $rwServicio['anhio']?>
                <input type="hidden" id="no_cons" name="no_cons" value="<?php echo $rwServicio['no_cons'];?>" />
                <input type="hidden" id="anhio" name="anhio" value="<?php echo $rwServicio['anhio'];?>" />
         	</font>
        </div>
        <div style="float:right;">
        	<font size="+1">
        		Fecha:  <?php echo $fech->fecha_texto($rwServicio['f_solicitud']);?>
                <input type="hidden" id="f_solicitud" name="f_solicitud" value="<?php echo $rwServicio['f_solicitud'];?>" />
            </font>
        </div>
    </div>
    <div style="width:250px; height:25px; line-height:25px; background-color:#666; color:#FFF; padding-left:10px;"><font size="+1">Datos del Alumno...</font></div>
    <div style="width:1020px;; height:160px; border-radius:0px 8px 8px 8px; border:#666 2px solid; padding:10px;">
    
        <div style="width:100%; text-align:left;">
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Matrícula: </div>
                <div style="float:left;"><input type="text" id="matricula" name="matricula" value="<?php echo $rwServicio['matricula'];?>" 
                onkeyup="if(validateTecla(event)=='enter')accGenServicio(6,this.value);
            if(validateTecla(event)=='F8') { loadWindow(1000,500); loadScreen('alumgrupo/frm_findGrupo.php','window');}"
                 /><font color="#999999">F8 - Buscar</font></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Nombre: </div>
                <div style="float:left;"><input type="text" id="txt_nombre" style="width:660px;" readonly="readonly" value="<?php echo $rwServicio['nombre']." ".$rwServicio['paterno']." ".$rwServicio['materno'] ;?>"/></div>
                <div style="width:80px; height:32px; text-align:right; float:left;">Teléfono: </div>
                <input type="text" id="txt_telefono" style="width:180px;" readonly="readonly" value="<?php echo $rwServicio['telefono'] ;?>"/>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Domicilio: </div>
                <div style="float:left;"><input type="text" id="txt_domicilio" style="width:930px;" readonly="readonly" value="<?php echo $rwServicio['domicilio']?>" /></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Sexo: </div>
                <div style="float:left;"><input type="text" id="txt_sexo" style="width:50px; text-align:center;" readonly="readonly" value="<?php echo $rwServicio['sexo'];?>" /></div>
                <div style="width:120px; height:32px; text-align:right; float:left;">Creditos aprobados: </div>
                <div style="float:left;"><input type="text" id="txt_creditos" style="width:50px;" value="<?php echo $rwServicio['creditos'];?>" /></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Especialidad: </div>
                <div style="float:left;"><input type="text" id="txt_especialidad" style="width:660px;" readonly="readonly" value="<?php echo $rwServicio['nomCarrera'];?>" /></div>
                <div style="width:80px; height:32px; text-align:right; float:left;">Semestre: </div>
                <div style="float:left;"><input type="text" id="txt_semestre" style="width:20px; text-align:center;" readonly="readonly" value="<?php echo $rwServicio['grado']?>"/></div>
                <div style="width:50px; height:32px; text-align:right; float:left;">Turno: </div>
                <div style="float:left;"><input type="text" id="txt_turno" style="width:100px; text-align:center;" readonly="readonly" value="<?php echo $rwServicio['nomTurno'];?>" /></div>
            </div>
        </div>
    
    </div>
    <br />
    <div style="width:250px; height:25px; line-height:25px; background-color:#666; color:#FFF; padding-left:10px;"><font size="+1">Datos de la Dependencia...</font></div>
    <div style="width:1020px;; height:290px; border-radius:0px 8px 8px 8px; border:#666 2px solid; padding:10px;">
    
        <div style="width:100%; text-align:left;">
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Nombre: </div>
                <div style="float:left;"><input type="text" style=" width:660px;" id="nomEmp" name="nomEmp" value="<?php echo $rwServicio['nomEmp'];?>" /></div>
                <div style="width:80px; height:32px; text-align:right; float:left;">Tipo: </div>
                <div style="float:left;">
                <select style="width:100px;" id="tipoEmp" name="tipoEmp">
                	<option value="Gobierno" <?php if($rwServicio['tipoEmp']=='Gobierno') echo 'selected' ?>>Gobierno</option>
                    <option value="Privada" <?php if($rwServicio['tipoEmp']=='Privada') echo 'selected'?>>Privada</option>
                </select>
                </div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Giro: </div>
                <div style="float:left;"><input type="text" id="giroEmp" name="giroEmp" style="width:660px;" value="<?php echo $rwServicio['giroEmp']?>"/></div>
                <div style="width:80px; height:32px; text-align:right; float:left;">Teléfono: </div>
                <input type="text" id="telEmp" name="telEmp" style="width:180px;" value="<?php echo $rwServicio['telEmp'];?>"/>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Dirección: </div>
                <div style="float:left;"><input type="text" id="dirEmp" name="dirEmp" style="width:930px;" value="<?php echo $rwServicio['dirEmp'];?>"/></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:80px; height:32px; text-align:right; float:left;">Estado: </div>
                <div style="float:left;"><input type="text" id="edoEmp" name="edoEmp" style="width:230px;" value="<?php echo $rwServicio['edoEmp'];?>"/></div>
                <div style="width:80px; height:32px; text-align:right; float:left;">Municipio: </div>
                <div style="float:left;"><input type="text" id="muniEmp" name="muniEmp" style="width:230px;" value="<?php echo $rwServicio['muniEmp'];?>"/></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:200px; height:32px; text-align:right; float:left;">Persona a la que tiene que dirigirse: </div>
                <div style="float:left;"><input type="text" id="resEmp" name="resEmp" style="width:810px;" value="<?php echo $rwServicio['resEmp'];?>"/></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:90px; height:32px; text-align:right; float:left;">Puesto o cargo: </div>
                <div style="float:left;"><input type="text" id="cargo" name="cargo" style="width:920px;" value="<?php echo $rwServicio['cargo'];?>"/></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:90px; height:32px; text-align:right; float:left;">Programa: </div>
                <div style="float:left;">
                	<select style="width:600px;" id="programa" name="programa">
                    	<?php
						while($rowProg=$db->getRows($resProg))
						{
                        ?>
                        <option value="<?php echo $rowProg['idprogramas']; ?>" <?php if($rowProg['idprogramas']==$rwServicio['programa']) echo 'selected';?>> <?php echo $rowProg['descripcion']; ?></option>
                        <?php
						}
                        ?>
                    </select>
                </div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:90px; height:32px; text-align:right; float:left;">Fecha de inicio: </div>
                <div style="float:left;"><input type="date" id="f_inicio" name="f_inicio" style="width:220px;" value="<?php echo $rwServicio['f_inicio'];?>"/></div>
                <div style="width:90px; height:32px; text-align:right; float:left;">Fecha de fin: </div>
                <div style="float:left;"><input type="date" id="f_fin" name="f_fin" style="width:220px;" value="<?php echo $rwServicio['f_fin'];?>"/></div>
            </div>
            <div style="width:100%; height:32px; line-height:32px;">
                <div style="width:90px; height:32px; text-align:right; float:left;">Horario de: </div>
                <div style="float:left;"><input type="time" id="hr_de" style="width:220px;" onchange="madeHr();" value="<?php echo $hri;?>" /></div>
                <div style="width:90px; height:32px; text-align:right; float:left;">a: </div>
                <div style="float:left;"><input type="time" id="hr_a" style="width:220px;" onchange="madeHr();" value="<?php echo $hrf;?>" /></div>
                <input type="hidden" id="horario" name="horario"  />
            </div>
        </div>
    <input type="hidden" id="txt_plan" value="<?php echo $rwServicio['nomPlan'];?>">
    <input type="hidden" id="periodoIni" name="periodoIni" value="<?php echo $rwServicio['periodoIni'];?>" />
    <input type="hidden" id="edadIni" name="edadIni" value="<?php echo $rwServicio['edadIni'];?>">
    </div>
</form>
</section>
</section>