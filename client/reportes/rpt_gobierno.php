<?php
	require_once("../clases/conexion.php");
	$db=new conexion();	
	$id=$_GET['id'];
	$mat=$_GET['mat'];
	
	$sql1="SELECT * FROM configuraciones";
	$result1=$db->executeQuery($sql1);
	$row1=$db->getRows($result1);
	
	$sql2="SELECT * FROM reports_sersocial WHERE idreports_sersocial = $id ";
	$result2=$db->executeQuery($sql2);
	$row2=$db->getRows($result2);
	
	$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,servsocial.idservsocial,servsocial.no_cons,servsocial.anhio,servsocial.f_solicitud,servsocial.f_inicio,servsocial.f_fin,servsocial.horario,servsocial.programa,servsocial.nomEmp,servsocial.tipoEmp,servsocial.giroEmp,servsocial.dirEmp,servsocial.telEmp,servsocial.resEmp,servsocial.cargo,servsocial.edoEmp,servsocial.muniEmp,servsocial.matricula AS servMatri,servsocial.edo,servsocial.periodoIni,programas.idprogramas,programas.descripcion AS prgDes,grupos.idgrupos,grupos.grado,grupos.grupo,grupos.turno,grupos.carr,turnos.idturnos,turnos.descripcion AS turnoDes,carreras.idcarreras,carreras.nombre AS carNombre, reports_sersocial.idreports_sersocial, reports_sersocial.folioServicio, reports_sersocial.actividades, reports_sersocial.objs_grales, reports_sersocial.objs_espe, reports_sersocial.departamento FROM alumnos INNER JOIN servsocial ON servsocial.matricula=alumnos.matricula INNER JOIN programas ON programas.idprogramas=servsocial.programa INNER JOIN grupos ON grupos.idgrupos=alumnos.grupo INNER JOIN turnos ON turnos.idturnos=grupos.turno INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera INNER JOIN reports_sersocial  WHERE servsocial.matricula  = '".$mat."' AND servsocial.edo != 0";
	$result=$db->executeQuery($sql);
	$row=$db->getRows($result);
	
	$a=$row['alnNombre'];
	$b=$row['paterno'];
	$c=$row['materno'];
	$n_completo = $a. " ".$b. " ".$c;
	
	$nom_archivo=$row['no_cons'].$row['anhio']."-".$b." ".$c." ".$a.".pdf";
	/*----------------FECHA EN ARRAY----------------------*/
	$meses = 
	array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	
	$x=explode("-",$row2['periodo_i']);
	$m=$x[1];
	$y=explode("-",$row2['periodo_f']);
	$me=$y[1];
	$z="Del ".$x[2]." de ".$meses[$m-1]." de ".$x[0]." al ".$y[2]." de ".$meses[$me-1]." de ".$y[0] ;
	
	$a=explode("-",$row['f_inicio']);
	$n=$a[1];
	$b=explode("-",$row['f_fin']);
	$ne=$b[1];
	$c="Del ".$a[2]." de ".$meses[$n-1]." de ".$a[0]." al ".$b[2]." de ".$meses[$ne-1]." de ".$b[0] ;
	
	//-------------------------------------------------------------------------------------------------------
	//--------------------------------FIN CONEXIONS-----------------------------------------------
	
	require_once("../clases/fpdf/fpdf.php");
	$pdf=new FPDF();
	
	$pdf->AddPage();
	$pdf->SetMargins(1,1,1);
	$pdf->Image('../images/ieschEdit.png',.9,1.1,-95);
	
	$pdf->SetFont('Arial','','14');
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode($row1['nomSecret']), 0, 1 , 'C');
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode($row1['subSecret']), 0, 1 , 'C');
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode($row1['direcSecret'])." E", 0, 1 , 'C');
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode('INVESTIGACIÓN CIENTIFICA'), 0, 1 , 'C');
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode($row1['deptoSecret']), 0, 1 , 'C');
	$pdf->Ln(.2);
	$pdf->Cell(0,1,'CARATULA DE PRESENTACION - REPORTE DE ACTIVIDADES', 0, 0, 'C');
	
	$pdf->SetXY(1,1);
	$pdf->Cell(6,.2,'', 0, 1 , '',1);
	$pdf->SetXY(1,4.5);
	$pdf->Cell(6,.2,'', 0, 1 , '',1);
	
	$pdf->SetFont('Arial','IB','40');
	$pdf->SetXY(1,1.8);
	$pdf->Cell(0,1,'I.E.S.CH.', 0, 1, 'J');
	$pdf->SetFont('Arial','','13');
	$pdf->SetXY(1.1,2.8);
	$pdf->Cell(0,1,'INSTITUTO DE ESTUDIOS', 0, 1, 'J');
	$pdf->SetXY(1,3.4);
	$pdf->Cell(0,1,'SUPERIORES DE CHIAPAS', 0, 1, 'J');
	$pdf->Ln(2);
	
	$pdf->Line(1,6.1,20.6,6.1);
	$pdf->Line(1,6.2,20.6,6.2);
	
	$pdf->Cell(0,1,'1.-DATOS DEL PRESTADOR', 0, 1, 'J');
	
	$pdf->Line(1,7.2,20.6,7.2);
	$pdf->Line(1,7.3,20.6,7.3);
	
	$pdf->SetFont('Arial','','12');
	$pdf->SetXY(1.5,7.3);
	$pdf->Cell(0,1,'1.1- No. Control: ________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.8,7.3);
	$pdf->Cell(0,1,$row['alnMatricula'], 0, 1, 'J');
	
	$pdf->SetXY(1.5,8.3);
	$pdf->Cell(0,1,'1.2- Periodo : __________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.2,8.3);
	$pdf->Cell(0,1,$z, 0, 1, 'J');
	
	$pdf->SetXY(1.5,9.3);
	$pdf->Cell(0,1,'1.3- Nombre:  __________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.3,9.3);
	$pdf->Cell(0,1,utf8_decode($n_completo), 0, 1, 'J');
	
	$pdf->SetXY(1.5,10.3);
	$pdf->Cell(0,1,'1.4- Carrera: ___________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.1,10.3);
	$pdf->Cell(0,1,utf8_decode($row['carNombre']), 0, 1, 'J');
	
	$pdf->SetXY(1.5,11.3);
	$pdf->Cell(0,1,'1.5- Dependencia Asignada: ______________________________________________________', 0, 1, 'J');
	$pdf->SetXY(7.1,11.3);
	$pdf->Cell(0,1,utf8_decode($row['nomEmp']), 0, 1, 'J');
	
	$pdf->SetXY(1.5,12.3);
	$pdf->Cell(0,1,'1.6- Domicilio de la Dependencia: __________________________________________________', 0, 1, 'J');
	$pdf->SetXY(8,12.3);
	$pdf->Cell(0,1,utf8_decode($row['dirEmp']), 0, 1, 'J');
	
	$pdf->Line(1,13.5,20.6,13.5);
	$pdf->Line(1,13.6,20.6,13.6);
	$pdf->Ln(.5);
	
	$pdf->SetFont('Arial','','14');
	$pdf->Cell(0,1,'2.-DATOS DEL PROGRAMA', 0, 1, 'J');
	
	$pdf->Line(1,14.6,20.6,14.6);
	$pdf->Line(1,14.7,20.6,14.7);
	
	$pdf->SetFont('Arial','','12');
	$pdf->SetXY(1.5,14.7);
	$pdf->Cell(0,1,'2.1- Nombre:  __________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.3,14.7);
	$pdf->Cell(0,1,$row['prgDes'], 0, 1, 'J');
	
	$pdf->SetXY(1.5,15.7);
	$pdf->Cell(0,1,'2.2- Periodo de prestacion:  _______________________________________________________', 0, 1, 'J');
	$pdf->SetXY(6.9,15.7);
	$pdf->Cell(0,1,$c, 0, 1, 'J');
	
	$pdf->SetXY(1.5,16.7);
	$pdf->Cell(0,1,'2.3- Objetivo:  __________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.3,16.7);
	$pdf->Cell(0,1,utf8_decode($row2['objs_espe']), 0, 1, 'J');
	
	$pdf->Line(1,17.8,20.6,17.8);
	$pdf->Line(1,17.9,20.6,17.9);
	
	$pdf->Ln(.4);
	$pdf->SetFont('Arial','','14');
	$pdf->Cell(0,1,'3.-DETALLE MINUCIOSO DE LAS ACTIVIDADES REALIZADAS EN EL PERIODO', 0, 1, 'J');
	$pdf->Cell(0,.7,'(ANEXAR A ESTA CARATULA LAS 3 CUARTILLAS DE ABAJO SELLADAS)', 0, 1, 'C');
	
	$pdf->Line(1,19.9,20.6,19.9);
	$pdf->Line(1,20,20.6,20);
	
	$pdf->Ln(.4);
	$pdf->Cell(0,1,'4.-FIRMAS DE VALIDACION EN CARATULA Y ANEXOS CON SELLO', 0, 1, 'J');
	
	$pdf->Line(1,21,20.6,21);
	$pdf->Line(1,21.1,20.6,21.1);
	
	$pdf->Ln(.7);
	$pdf->SetFont('Arial','','12');
	$pdf->Cell(.55);$pdf->Cell(0,.7,'RESPONSABLE DEL PROGRAMA EN', 0, 1, 'J');
	$pdf->Cell(2.5);$pdf->Cell(0,.3,'LA DEPENDENCIA', 0, 1, 'J');
	
	$pdf->SetXY(1.5,21.9);
	$pdf->Cell(11.6);$pdf->Cell(0,.7,'PRESTADOR DEL SERVICIO', 0, 1, 'J');
	$pdf->Cell(14.25);$pdf->Cell(0,.3,'SOCIAL', 0, 1, 'J');
	
	$pdf->Ln(1.8);
	$pdf->Cell(0,.7,'____________________________________', 0, 1, 'J');
	
	$pdf->SetY(24.7);
	$pdf->Cell(11);$pdf->Cell(0,.7,'____________________________________', 0, 1, 'J');
	
	$pdf->SetY(25.2);
	$pdf->Cell(2.35);$pdf->Cell(0,.7,'NOMBRE Y FIRMA', 0, 1, 'J');
	$pdf->SetY(25.2);
	$pdf->Cell(13.35);$pdf->Cell(0,.7,'NOMBRE Y FIRMA', 0, 1, 'J');
	
	
	$pdf->AddPage();
	$pdf->SetMargins(1,1,1);
	
	$pdf->SetFont('Arial','','14');
	$pdf->Cell(0,0,'3.1-DETALLE MINUCIOSO DE LAS ACTIVIDADES REALIZADAS EN EL PERIODO', 0, 1, 'J');
	
	$pdf->Line(1, 1.4, 20.6, 1.4);
	$pdf->Line(1, 1.6, 20.6, 1.6);
	$pdf->SetY(1.8);
	$pdf->SetFont('Arial','','12');
	$pdf->MultiCell(19.6,.7,utf8_decode($row2['actividades']),'J');	
	
	$pdf->Output($nom_archivo,'I');
	
?>