<?php
	require_once("../clases/conexion.php");
	$db=new conexion();	
	$id=$_GET['id'];
	
	$sql1="SELECT * FROM configuraciones";
	$result1=$db->executeQuery($sql1);
	$row1=$db->getRows($result1);
	
	$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,servsocial.idservsocial,servsocial.no_cons,servsocial.anhio,servsocial.f_solicitud,servsocial.f_inicio,servsocial.f_fin,servsocial.horario,servsocial.programa,servsocial.nomEmp,servsocial.tipoEmp,servsocial.giroEmp,servsocial.dirEmp,servsocial.telEmp,servsocial.resEmp,servsocial.cargo,servsocial.edoEmp,servsocial.muniEmp,servsocial.matricula AS servMatri,servsocial.edo,programas.idprogramas,programas.descripcion AS prgDes,grupos.idgrupos,grupos.grado,grupos.grupo,grupos.turno,grupos.carr,turnos.idturnos,turnos.descripcion AS turnoDes,carreras.idcarreras,carreras.nombre AS carNombre FROM alumnos INNER JOIN servsocial ON servsocial.matricula=alumnos.matricula INNER JOIN programas ON programas.idprogramas=servsocial.programa INNER JOIN grupos ON grupos.idgrupos=alumnos.grupo INNER JOIN turnos ON turnos.idturnos=grupos.turno INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera WHERE servsocial.idservsocial = ".$id." AND servsocial.edo != 0";
	$result = $db->executeQuery($sql);
	$row = $db->getRows($result);

	$a=$row['alnNombre'];
	$b=$row['paterno'];
	$c=$row['materno'];
	$n_completo = $a. " ".$b. " ".$c;
	if($row['sexo']=='M')
		$sex='Masculino';
	else $sex='Femenino';
	
	$solicitud=$row['no_cons']. "/" . $row['anhio'];
	$nom_archivo=$row['no_cons'].$row['anhio']."-".$b." ".$c." ".$a.".pdf";
	
	$h=explode(" ",$row['horario']);
	
	$gd=$row['grado'];
	$gp=$row['grupo'];
	if($gd==1 || $gd==3)
		$nomen="er";
	else
		$nomen="o";
	
	$us_gdp = $gd.$nomen." Semestre". " Grupo " .$gp;

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
	
	//------------------------------------PDF-----------------------------------------------------------------
	require_once("../clases/fpdf/fpdf.php");
	$pdf=new FPDF();
	
	
	$pdf->AddPage();
	$pdf->SetMargins(1,1,1);
	$pdf->Image('../images/LOGO_IESCH_transparente.png',1,1,-510);
	
	$pdf->SetFont('Arial','IB','16');
	$pdf->Cell(0,.7,utf8_decode($row1['nomInstit']), 0, 1 , 'C');
	$pdf->Cell(0,.7,utf8_decode($row1['nomSecret']), 0, 1 , 'C');
	$pdf->Cell(0,.7,'SOLICITUD DE SERVICIO SOCIAL', 0, 0, 'C');
	
	/*-------------------PRIMER_CUADRO--------------------*/
	//Lineas en Vertical
	$pdf->Line(1, 4, 1, 9.3);
	$pdf->Line(20.6, 4, 20.6, 9.3);
	//Lineas en Horizontal
	$pdf->Line(1, 4, 20.6, 4);
	$pdf->Line(1, 9.3, 20.6, 9.3);
	/*-------------------SEGUNDO_CUADRO--------------------*/
	//Lineas en Vertical
	$pdf->Line(1.2, 4.2, 1.2, 9.1);
	$pdf->Line(20.4, 4.2, 20.4, 9.1);
	//Lineas en Horizontal
	$pdf->Line(1.2, 4.2, 20.4, 4.2);
	$pdf->Line(1.2, 9.1, 20.4, 9.1);
	/*-------------------------FIN--------------------------*/
	
	$pdf->SetFont('Arial','','12');
	
	$pdf->SetXY(1.3,4.5);
	$pdf->Cell(0,.5,'Solicitud:________________', 0, 0, 'J');
	$pdf->SetXY(3.2,4.5);
	$pdf->Cell(0,.5,$solicitud, 0, 0, 'J');
	
	$pdf->SetXY(13.4,4.5);
	$pdf->Cell(0,.5,'Fecha :______________________', 0, 0, 'J');
	$pdf->SetXY(14.9,4.5);
	$pdf->Cell(0,.5,$fecha[2]. " de " . $meses[$e-1] . " de " . $fecha[0], 0, 0, 'J');
	
	$pdf->SetXY(1.3,5.3);
	$pdf->Cell(0,.5,'Nombre :______________________________________________', 0, 0, 'J');
	$pdf->SetXY(3.2,5.3);
	$pdf->Cell(0,.5,utf8_decode($n_completo), 0, 0, 'J');
	
	$pdf->SetXY(14,5.3);
	$pdf->Cell(0,.5,'Tel :______________________', 0, 0, 'J');
	$pdf->SetXY(15,5.3);
	$pdf->Cell(0,.5,$row['telefono'], 0, 0, 'J');
	
	$pdf->SetXY(1.3,6.1);
	$pdf->Cell(0,.5,'Domicilio :_______________________________________________________________________', 0, 0, 'J');
	$pdf->SetXY(3.4,6.1);
	$pdf->Cell(0,.5,utf8_decode($row['domicilio']), 0, 0, 'J');
	
	$pdf->SetXY(1.3,6.9);
	$pdf->Cell(0,.5,'Sexo :___________', 0, 0, 'J');
	$pdf->SetXY(2.6,6.9);
	$pdf->Cell(0,.5,$sex, 0, 0, 'J');
	
	$pdf->SetXY(5.8,6.9);
	$pdf->Cell(0,.5,'No. de Control :________________', 0, 0, 'J');
	$pdf->SetXY(8.9,6.9);
	$pdf->Cell(0,.5,$row['alnMatricula'], 0, 0, 'J');
	
	$pdf->SetXY(13.7,6.9);
	$pdf->Cell(0,.5,'Creditos Aprobados :__________', 0, 0, 'J');
	
	$pdf->SetXY(1.3,7.7);
	$pdf->Cell(0,.5,'Semestre :___________________________', 0, 0, 'J');
	$pdf->SetXY(3.5,7.7);
	$pdf->Cell(0,.5,$us_gdp, 0, 0, 'J');
	
	$pdf->SetXY(11.1,7.7);
	$pdf->Cell(0,.5,'Turno :________________________________', 0, 0, 'J');
	$pdf->SetXY(12.6,7.7);
	$pdf->Cell(0,.5,utf8_decode($row['turnoDes']), 0, 0, 'J');
	
	$pdf->SetXY(1.3,8.5);
	$pdf->Cell(0,.5,'Especialidad :____________________________________________________________________', 0, 0, 'J');
	$pdf->SetXY(4.1,8.5);
	$pdf->Cell(0,.5,utf8_decode($row['carNombre']), 0, 0, 'J');
	
	$pdf->SetXY('',9.8);
	$pdf->SetFont('Arial','B','16');
	$pdf->Cell(0,.5,'DATOS DE LA DEPENDENCIA', 0, 0, 'C');
	
	
	/*-------------------PRIMER_CUADRO(2)--------------------*/
	//Lineas en Vertical
	$pdf->Line(1, 11, 1, 21);
	$pdf->Line(20.6, 11, 20.6, 21);
	//Lineas en Horizontal
	$pdf->Line(1, 11, 20.6, 11);
	$pdf->Line(1, 21, 20.6, 21);
	/*-------------------SEGUNDO_CUADRO(2)--------------------*/
	//Lineas en Vertical
	$pdf->Line(1.2, 11.2, 1.2, 20.8);
	$pdf->Line(20.4, 11.2, 20.4, 20.8);
	//Lineas en Horizontal
	$pdf->Line(1.2, 11.2, 20.4, 11.2);
	$pdf->Line(1.2, 20.8, 20.4, 20.8);
	/*-------------------------FIN(2)--------------------------*/
	
	$pdf->SetFont('Arial','','12');
	
	$pdf->SetXY(1.3,11.7);
	$pdf->Cell(0,.5,'Nombre :_________________________________________________', 0, 0, 'J');
	$pdf->SetXY(3.2,11.7);
	if(strlen($row['nomEmp'])>57)
		$pdf->SetFont('Arial','','7');
	else
		if(strlen($row['nomEmp'])>40)
			$pdf->SetFont('Arial','','9');	
	$pdf->Cell(0,.5,utf8_decode($row['nomEmp']), 0, 0, 'J');
	
	$pdf->SetFont('Arial','','12');
	
	$pdf->SetXY(14.8,11.7);
	$pdf->Cell(0,.5,'Empresa :______________', 0, 0, 'J');
	$pdf->SetXY(16.9,11.7);
	$pdf->Cell(0,.5,utf8_decode($row['tipoEmp']), 0, 0, 'J');

	$pdf->SetXY(1.3,12.7);
	$pdf->Cell(0,.5,'Giro de la Empresa :_____________________________________', 0, 0, 'J');
	$pdf->SetXY(5.3,12.7);
	$pdf->Cell(0,.5,utf8_decode($row['giroEmp']), 0, 0, 'J');
	
	$pdf->SetXY(14.4,12.7);
	$pdf->Cell(0,.5,'Telefono :________________', 0, 0, 'J');
	$pdf->SetXY(16.5,12.7);
	$pdf->Cell(0,.5,$row['telEmp'], 0, 0, 'J');
	
	$pdf->SetXY(1.3,13.7);
	$pdf->Cell(0,.5,'Direccion :_______________________________________________________________________', 0, 0, 'J');
	$pdf->SetXY(3.4,13.7);
	if(strlen($row['dirEmp'])>68)
		$pdf->SetFont('Arial','','7');
	else
		if(strlen($row['dirEmp'])>60)
			$pdf->SetFont('Arial','','9');	
	$pdf->Cell(0,.5,utf8_decode($row['dirEmp']), 0, 0, 'J');
	
	$pdf->SetFont('Arial','','12');
	
	$pdf->SetXY(1.3,14.7);
	$pdf->Cell(0,.5,'Persona a quien tiene que Dirigirse  :__________________________________________________', 0, 0, 'J');
	$pdf->SetXY(8.4,14.7);
	$pdf->Cell(0,.5,utf8_decode($row['resEmp']), 0, 0, 'J');
	
	$pdf->SetXY(1.3,15.7);
	$pdf->Cell(0,.5,'Puesto o Cargo :__________________________________________________________________', 0, 0, 'J');
	$pdf->SetXY(4.6,15.7);//64 car
	if(strlen($row['cargo'])>64)
		$pdf->SetFont('Arial','','11');	
	$pdf->Cell(0,.5,utf8_decode($row['cargo']), 0, 0, 'J');
	
	$pdf->SetFont('Arial','','12');
	
	$pdf->SetXY(1.3,16.7);
	$pdf->Cell(0,.5,'Programa asignado :_______________________________________________________________', 0, 0, 'J');
	$pdf->SetXY(5.4,16.7);
	$pdf->Cell(0,.5,utf8_decode($row['prgDes']), 0, 0, 'J');
	
	$pdf->SetXY(1.3,17.7);
	$pdf->Cell(0,.5,'Fechas de Inicio y Fin del Servicio Social :______________________________________________', 0, 0, 'J');
	$pdf->SetXY(9.3,17.7);
	$pdf->Cell(0,.5,$z, 0, 0, 'J');
	
	$pdf->SetXY(1.3,18.7);
	$pdf->Cell(0,.5,'Horario en que realizara el Servicio  :__________________________________________________', 0, 0, 'J');
	$pdf->SetXY(8.4,18.7);
	$pdf->Cell(0,.5,"De las ".$h[1]." hrs a las ".$h[3]." hrs", 0, 0, 'J');

	$pdf->SetXY(1.3,19.7);
	$pdf->Cell(0,.5,'Estado :_______________________________', 0, 0, 'J');
	$pdf->SetXY(3,19.7);
	$pdf->Cell(0,.5,utf8_decode($row['edoEmp']), 0, 0, 'J');

	$pdf->SetXY(10.7,19.7);
	$pdf->Cell(0,.5,'Municipio :_______________________________', 0, 0, 'J');
	$pdf->SetXY(12.9,19.7);
	$pdf->Cell(0,.5,utf8_decode($row['muniEmp']), 0, 0, 'J');
	
	$pdf->SetXY('',21.5);
	$pdf->SetFont('Arial','B','14');
	$pdf->Cell(0,.5,'DATOS QUE DEBERA ANEXAR A ESTA SOLICITUD', 0, 0, 'C');
	
	$pdf->SetFont('Arial','','12');
	$pdf->SetXY('',22.5);
	$pdf->Cell(0,.5,'*Acta de Nacimiento', 0, 0, 'C');
	$pdf->SetXY('',23);
	$pdf->Cell(0,.5,'*Boleta de Calificaciones que Acredite haber aprobado el 70% de Creditos Educativos', 0, 0, 'C');
	$pdf->SetXY('',23.6);
	$pdf->Cell(0,.5,'Vo.Bo-Firma', 0, 0, 'C');
	$pdf->SetXY('',25.4);
	$pdf->Cell(0,.5,'______________________________________________', 0, 0, 'C');
	
	$pdf->Output($nom_archivo,"I");
?>