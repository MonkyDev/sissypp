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
WHERE idservsocial=13";
$rfolio=$db->executeQuery($sql);
$rowfolio=$db->getRows($rfolio);
$ren=1;

$fpdf= new FPDF();
$fpdf->SetMargins(0,0,1);
$fpdf->SetFont('Arial','B',15);
$fpdf->AddPage();
/*encabezado*/
$fpdf->Image("../images/iesch.png",0,1,5,3);
$fpdf->Image("../images/degradadoazul.jpg",7.5,5,7,6);
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"GOBIERNO DEL ESTADO DE CHIAPAS",0,1,'C');$ren+=.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['nomSecret']),0,1,'C');$ren+=.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['subSecret']),0,1,'C');$ren+=.5;
$fpdf->SetFont('Arial','',10);
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['direcSecret']),0,1,'C');$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['deptoSecret']),0,1,'C');$ren+=.5;
$fpdf->SetXY(1,$ren);
$fpdf->SetFillColor(74,151,135);
$fpdf->Cell(0,.7,"ACA VA EL REVOE",0,1,'C',0);$ren+=.7;
$ren+=.7;
$fpdf->SetXY(1,$ren);
$fpdf->SetFont('Arial','B',40);
$fpdf->Cell(0,.7,"C  o  n  s  t  a  n  c  i  a",0,1,'C',0);$ren+=.7;
$ren+=.7;
$fpdf->SetFont('Arial','',11);
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"DE SERVICIO SOCIAL QUE SE LE OTORGA A:",0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"DE LA CARRERA",0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("EN LA INSTITUCIÓN EDUCATIVA"),0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"REGISTRO No.",0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("POR HABER PRESENTADO SU SERVICIO SOCIAL"),0,1,'C',0);$ren+=.4;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("EN EL PROGRAMA"),0,1,'C',0);$ren+=1.7;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"EN",0,1,'C',0);$ren+=.3;
$fpdf->SetXY(1,$ren);
$fpdf->SetFont('Arial','',9);
$fpdf->Cell(0,.7,utf8_decode("(DEPENDENCIA, INSTITUCIÓN U ORGANISMO)"),0,1,'C',0);$ren+=1.7;
$fpdf->SetXY(1,$ren);
$fpdf->SetFont('Arial','',11);
$fpdf->Cell(0,.7,utf8_decode("DURANTE EL PERIODO"),0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("CON DURACIÓN DE"),0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,"Y PARA LOS EFECTOS PROCEDENTES SE EXTIENDE",0,1,'C',0);$ren+=.4;
$fpdf->SetXY(0,$ren);
$fpdf->Cell(0,.7,"LA PRESENTE CONSTANCIA",0,1,'C',0);$ren+=.4;
$fpdf->SetXY(0,$ren);
$fpdf->Cell(0,.7,utf8_decode("EN LA CIUDAD DE"),0,1,'C',0);$ren+=.9;


$rLine=8.1;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=1.6;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=1.6;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=1.6;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=2;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=2;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=1.6;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=1.6;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=2.4;
$fpdf->Line(3,$rLine,19,$rLine);$rLine+=.6;
$fpdf->Line(3,$rLine,19,$rLine);

//$fpdf->SetFontSize(8);
$rLine=24.8;
$fpdf->Line(3,$rLine,10,$rLine);
$fpdf->Line(12,$rLine,19,$rLine);
$fpdf->SetFont('Arial','B',8);
$ren=24.9;
$fpdf->SetXY(3,$ren);
$fpdf->Cell(7,.3,utf8_decode($row['encaSecret']),0,1,'C');
$fpdf->SetXY(12,$ren);
$fpdf->Cell(7,.3,utf8_decode("ING. PEDRO DANIEL NANGUYASMU OROZCO"),0,1,'C');
$ren=25.3;
$fpdf->SetXY(3,$ren);
$fpdf->MultiCell(7,.3,"JEFE DEL " . $row['deptoSecret'] ,0,'C');
$fpdf->SetXY(12,$ren);
$fpdf->MultiCell(7,.3,utf8_decode("POR LA INSTITUCIÓN EDUCATIVA"),0,'C');

//datos del servicio
$fpdf->SetFont('Arial','B',12);
$ren=7.2;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['paterno'] . " " . $rowfolio['materno'] . " " . $rowfolio['nombre']),0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['carrera']),0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($row['nomInstit']),0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("No de registro"),0,1,'C',0);$ren+=2;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode($rowfolio['nomPrograma']),0,1,'C',0);$ren+=1.8;
$fpdf->SetXY(1,$ren);


$longitudTexto=strlen($rowfolio['nomEmp']);
if($longitudTexto>60)
	$fpdf->SetFont('Arial','B',10);

$fpdf->Cell(0,.7,utf8_decode($rowfolio['nomEmp']),0,1,'C',0);$ren+=.5;
$fpdf->SetXY(1,$ren);
$texto=$rowfolio['muniEmp'] . ", " . $rowfolio['edoEmp'];
$fpdf->Cell(0,.7,utf8_decode($texto),0,1,'C',0);$ren+=1.4;
$fpdf->SetXY(1,$ren);
$cadena="Del  " . utf8_decode($fecha->fecha_texto($rowfolio['f_inicio'])) . "  al  " . utf8_decode($fecha->fecha_texto($rowfolio['f_fin']));
$cadena=strtoupper($cadena);
$fpdf->Cell(0,.7,$cadena,0,1,'C',0);$ren+=1.6;
$fpdf->SetXY(1,$ren);
$fpdf->Cell(0,.7,utf8_decode("480 HORAS."),0,1,'C',0);$ren+=2.3;
$fpdf->SetXY(0,$ren);
$fpdf->Cell(0,.7,utf8_decode('TUXTLA GUTIÉRREZ, CHIAPAS'),0,1,'C',0);
$fpdf->Output();
?>