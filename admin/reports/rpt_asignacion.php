<?php
require_once("../clases/fpdf/fpdf.php");
require_once("../clases/conexion.php");
require_once("../clases/fechas.php");

$fecha=new Fechas();
$db=new conexion();
$sql="SELECT * FROM configuraciones";
$r=$db->executeQuery($sql);
$row=$db->getRows($r);
$id=explode('|',$_GET['v_id']);
$sql="SELECT servsocial.*,alumnos.matricula,alumnos.nombre,alumnos.paterno,alumnos.materno,carreras.nombre as carrera,planescolar.descripcion as plan, programas.descripcion as nomPrograma
FROM servsocial INNER JOIN alumnos ON servsocial.matricula=alumnos.matricula
INNER JOIN grupos ON alumnos.grupo=grupos.idgrupos
INNER JOIN carreras ON grupos.carr=carreras.idcarreras
INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar
INNER JOIN programas ON programas.idprogramas=servsocial.programa
WHERE idservsocial=" . $id[0];
$rfolio=$db->executeQuery($sql);
$rowfolio=$db->getRows($rfolio);
$ren=1;

$fpdf= new FPDF();
$fpdf->SetMargins(0,0,1);
$fpdf->SetFont('Arial','B',14);
$fpdf->AddPage();
/*encabezado*/
$fpdf->Image("../images/iesch.png",0,1,5,3);
$fpdf->SetXY(3,$ren);
$fpdf->Cell(0,.7,$row['nomSecret'],0,1,'C');$ren+=.7;
$fpdf->SetXY(3,$ren);
$fpdf->Cell(0,.7,$row['subSecret'],0,1,'C');$ren+=.7;
$fpdf->SetXY(3,$ren);
$fpdf->Cell(0,.7,$row['direcSecret'],0,1,'C');$ren+=.7;
$fpdf->SetXY(3,$ren);
$fpdf->Cell(0,.7,$row['deptoSecret'],0,1,'C');$ren+=.7;
$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->SetFillColor(74,151,135);
$fpdf->Cell(0,.7,"O F I C I O   D E    A S I G N A C I O N   D E   S E R V I C I O   S O C I A L",1,1,'C',0);$ren+=.7;
$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->SetFont('Arial','B',12);
$fpdf->Cell(0,.7,"No. " . $rowfolio['no_cons'] . " / " . $rowfolio['anhio'],0,1,'R',0);$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"FECHA. " . date('d/m/Y'),0,1,'R',0);$ren+=.7;
$ren+=.7;
$fpdf->SetFont('Arial','',11);
$fpdf->SetXY(1,$ren);
$fpdf->Line(1,8,10,8);
$fpdf->Line(1,8.7,10,8.7);
$fpdf->Cell(0,.7,"  1.- DATOS DEL PRESTADOR",0,1,'L',0);$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  1.1.- No. de Control Escolar: ",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  1.2.- Nombre: ",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  1.3.- Carrera: ",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  1.4.- Institución Educativa: "),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  1.5.- Clave: ",0,1,'L',0);
$fpdf->SetXY(10,$ren);
$fpdf->Cell(0,.7,"Plan: ",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  1.6.- Dirección de la institución educativa: "),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  1.7.- Localidad:"),0,1,'L',0);
$fpdf->SetXY(8.5,$ren);
$fpdf->Cell(0,.7,"  Municipio:",0,1,'L',0);
$fpdf->SetXY(15,$ren);
$fpdf->Cell(0,.7,"  Entidad:",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  1.8.- Porcentaje de créditos cubiertos a la fecha: "),0,1,'L',0);$ren+=.9;
$fpdf->Line(1,13.1,10,13.1);
$fpdf->Line(1,13.8,10,13.8);
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  2.- DATOS DEL PROGRAMA",0,1,'L',0);$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  2.1.- Nombre: ",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  2.2.- Periodo de prestación: "),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  2.3.- Horario de prestación de servicio: "),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  2.4.- Horas de duración del programa: "),0,1,'L',0);$ren+=.9;
$fpdf->Line(1,16.2,13,16.2);
$fpdf->Line(1,16.9,13,16.9);
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  3.- DATOS DE LA DEPENDENCIA, ENTIDAD U ORGANISMO",0,1,'L',0);$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"  3.1.- Funcionario responsable y cargo: ",0,1,'L',0);$ren+=.5;$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  3.2.- Organismo o dependencia: "),0,1,'L',0);$ren+=.5;$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("  3.3.- Municipio: "),0,1,'L',0);
$fpdf->SetXY(12,$ren);
$fpdf->Cell(0,.7,utf8_decode("Entidad: "),0,1,'L',0);$ren+=2;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("Atentamente"),0,1,'C',0);$ren+=2.1;

$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['direcDepto']),0,1,'C',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['nomDepto']),0,1,'C',0);$ren+=1;
$fpdf->Line(6,23,16,23);
$fpdf->SetFont('Arial','B',9);
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("C.c.p.- INTERESADO"),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("C.c.p.- EXPEDIENTE"),0,1,'L',0);$ren+=.3;


//datos del servicio
$fpdf->SetFont('Arial','B',11);
$ren=8.7;
$fpdf->SetXY(6.5,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['matricula']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(4,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['paterno'] . " " . $rowfolio['materno'] . " " . $rowfolio['nombre']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(4,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['carrera']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(6.2,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['nomInstit']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(4,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['claveInstit']),0,1,'L',0);
$fpdf->SetXY(11,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['plan']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(9.2,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['dirInstit']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(4,$ren);
$fpdf->Cell(0,.7,"TUXTLA GUTIERREZ",0,1,'L',0);
$fpdf->SetXY(10.6,$ren);
$fpdf->Cell(0,.7,"TUXTLA GUTIERREZ",0,1,'L',0);
$fpdf->SetXY(16.8,$ren);
$fpdf->Cell(0,.7,"CHIAPAS",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(10.5,$ren);
$fpdf->Cell(0,.7,utf8_decode("70%"),0,1,'L',0);$ren+=.9;
$ren+=.7;
$fpdf->SetXY(4,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['nomPrograma']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(6.3,$ren);
$cadena="Del  " . utf8_decode($fecha->fecha_texto($rowfolio['f_inicio'])) . "  al  " . utf8_decode($fecha->fecha_texto($rowfolio['f_fin']));
$cadena=strtoupper($cadena);
$fpdf->Cell(0,.7,$cadena,0,1,'L',0);$ren+=.5;
$fpdf->SetXY(8.1,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['horario']) . "  HORAS.",0,1,'L',0);$ren+=.5;
$fpdf->SetXY(8.1,$ren);
$fpdf->Cell(0,.7,utf8_decode("480 HORAS."),0,1,'L',0);$ren+=.9;
$fpdf->Line(1,16.2,13,16.2);
$fpdf->Line(1,16.9,13,16.9);
$fpdf->SetXY(1,$ren);
$ren+=.7;
$ren+=.5;
$fpdf->SetXY(2.1,$ren);
$longitudTexto=strlen($rowfolio['resEmp'])+strlen($rowfolio['cargo']);
if($longitudTexto>73)
	$fpdf->SetFont('Arial','B',10);
else
	$fpdf->SetFont('Arial','B',11);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['resEmp']) . ", " . utf8_decode($rowfolio['cargo']),0,1,'L',0);$ren+=.5;$ren+=.5;
$fpdf->SetXY(2.1,$ren);
if(strlen($rowfolio['nomEmp'])>73)
	$fpdf->SetFont('Arial','B',10);
else
	$fpdf->SetFont('Arial','B',11);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['nomEmp']),0,1,'L',0);$ren+=.5;
$fpdf->SetXY(4.3,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['muniEmp']),0,1,'L',0);
$fpdf->SetXY(13.7,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['edoEmp']),0,1,'L',0);$ren+=2;


$fpdf->Output();
?>