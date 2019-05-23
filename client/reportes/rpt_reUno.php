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

	
	$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,servsocial.idservsocial,servsocial.no_cons,servsocial.anhio,servsocial.f_solicitud,servsocial.f_inicio,servsocial.f_fin,servsocial.horario,servsocial.programa,servsocial.nomEmp,servsocial.tipoEmp,servsocial.giroEmp,servsocial.dirEmp,servsocial.telEmp,servsocial.resEmp,servsocial.cargo,servsocial.edoEmp,servsocial.muniEmp,servsocial.matricula AS servMatri,servsocial.edo,servsocial.periodoIni,programas.idprogramas,programas.descripcion AS prgDes,grupos.idgrupos,grupos.grado,grupos.grupo,grupos.turno,grupos.carr,turnos.idturnos,turnos.descripcion AS turnoDes,carreras.idcarreras,carreras.nombre AS carNombre, reports_sersocial.idreports_sersocial, reports_sersocial.folioServicio, reports_sersocial.actividades, reports_sersocial.objs_grales, reports_sersocial.objs_espe, reports_sersocial.departamento FROM alumnos INNER JOIN servsocial ON servsocial.matricula=alumnos.matricula INNER JOIN programas ON programas.idprogramas=servsocial.programa INNER JOIN grupos ON grupos.idgrupos=alumnos.grupo INNER JOIN turnos ON turnos.idturnos=grupos.turno INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera INNER JOIN reports_sersocial  WHERE servsocial.matricula  = '$mat' AND servsocial.edo != 0";
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
	
	$x=explode("-",$row['f_inicio']);
	$m=$x[1];
	$y=explode("-",$row['f_fin']);
	$me=$y[1];
	$z="Del ".$x[2]." de ".$meses[$m-1]." de ".$x[0]." al ".$y[2]." de ".$meses[$me-1]." de ".$y[0] ;
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
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode($row1['direcSecret']), 0, 1 , 'C');
	$pdf->Cell(6.5);$pdf->Cell(0,.8,utf8_decode($row1['deptoSecret']), 0, 1 , 'C');
	$pdf->Ln(1);
	$pdf->Cell(0,1,'CARATULA DEL PROGRAMA INICIAL DE ACTIVIDADES', 0, 0, 'C');
	
	$pdf->SetXY(1,1);
	$pdf->Cell(6,.2,'', 0, 1 , '',1);
	$pdf->SetXY(1,4.5);
	$pdf->Cell(6,.2,'', 0, 1 , '',1);
	echo $f[0];
	$pdf->SetFont('Arial','IB','40');
	$pdf->SetXY(1,1.8);
	$pdf->Cell(0,1,'I.E.S.CH.', 0, 1, 'J');
	$pdf->SetFont('Arial','','13');
	$pdf->SetXY(1.1,2.8);
	$pdf->Cell(0,1,'INSTITUTO DE ESTUDIOS', 0, 1, 'J');
	$pdf->SetXY(1,3.4);
	$pdf->Cell(0,1,'SUPERIORES DE CHIAPAS', 0, 1, 'J');
	$pdf->Ln(2.6);
	
	$pdf->SetFont('Arial','','12');
	$pdf->Cell(1,.7,'Dependencia :      ___________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.5,7);
	$pdf->Cell(1,.7,utf8_decode($row['nomEmp']), 0, 1, 'J');
	
	$pdf->SetXY(1,8.2);
	$pdf->Cell(1,.7,'Direccion :            ___________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.5,8.2);
	$pdf->Cell(1,.7,utf8_decode($row['dirEmp']), 0, 1, 'J');
	
	$pdf->SetXY(1,9.2);
	$pdf->Cell(1,.7,'Departamento :    ___________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.5,9.2);
	$pdf->Cell(1,.7,utf8_decode($row2['departamento']), 0, 1, 'J');
	
	$pdf->SetXY(1,10.2);
	$pdf->Cell(1,.7,'Nombre del prestador :    _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5.9,10.2);
	$pdf->Cell(1,.7,utf8_decode($n_completo), 0, 1, 'J');
	
	$pdf->SetXY(1,11.2);
	$pdf->Cell(1,.7,'Licenciatura :        ___________________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(4.5,11.2);
	$pdf->Cell(1,.7,utf8_decode($row['carNombre']), 0, 1, 'J');
	
	$pdf->SetXY(1,12.2);
	$pdf->Cell(1,.7,'Periodo del servicio :        _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(6,12.2);
	$pdf->Cell(1,.7,$z, 0, 1, 'J');
	
	$pdf->SetXY(1,13.2);
	$pdf->Cell(1,.7,'Nombre del Programa :    _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(6,13.2);
	$pdf->Cell(1,.7,utf8_decode($row['prgDes']), 0, 1, 'J');
	
	$pdf->SetXY(1,15.2);
	$pdf->Cell(1,.7,'Objetivos Generales :       _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5,16.2);
	$pdf->Cell(1,.7,'        _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5,17.2);
	$pdf->Cell(1,.7,'        _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5.9,15);
	$pdf->MultiCell(14.7,1,utf8_decode($row2['objs_grales']),'J');
	
	$pdf->SetXY(1,19.2);
	$pdf->Cell(1,.7,'Objetivos Especiicos :      _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5,20.2);
	$pdf->Cell(1,.7,'       _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5,21.2);
	$pdf->Cell(1,.7,'       _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5,22.2);
	$pdf->Cell(1,.7,'       _____________________________________________________________', 0, 1, 'J');
	$pdf->SetXY(5.8,19);
	$pdf->MultiCell(14.7,1,utf8_decode($row2['objs_espe']),'J');
	
	$pdf->SetFont('Arial','B','15');
	$pdf->SetXY(9,23);
	$pdf->Cell(1,.7,'ATENTAMENTE:', 0, 1, 'J');
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(1,25);
	$pdf->Cell(1,.7,'NOMBRE Y FIRMA DEL FUNCIONARIO RECEPTOR(SELLO)', 0, 1, 'J');
	$pdf->SetXY(1,24.6);
	$pdf->Cell(1,.7,'__________________________________________________', 0, 1, 'J');
	$pdf->SetXY(13.7,25);
	$pdf->Cell(1,.7,'FIRMA DEL PRESTADOR DEL SERVICIO SOCIAL', 0, 1, 'J');
	$pdf->SetXY(13.7,24.6);
	$pdf->Cell(1,.7,'_________________________________________', 0, 1, 'J');
	
	
	$pdf->AddPage();
	$pdf->SetMargins(1,1,1);
	$pdf->SetFont('Arial','','12');
	
	$pdf->Cell(0,.7,'Actividades a Desarrollar:', 0, 1, 'C');
	$pdf->SetY(1.3);
	$pdf->Line(1,1.7,20.6,1.7);
	$pdf->Line(1,1.8,20.6,1.8);
	$pdf->SetY(1.8);
	$pdf->MultiCell(19.6,.7,utf8_decode($row2['actividades']),'J');

	$pdf->Output($nom_archivo,'I');
?>