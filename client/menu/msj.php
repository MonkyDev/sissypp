<?php
	session_start();
	require_once("../clases/conexion.php");
	$db=new conexion();	
	$user=$_SESSION['cedula'];
	
	$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,servsocial.idservsocial,servsocial.no_cons,servsocial.anhio,servsocial.f_solicitud,servsocial.f_inicio,servsocial.f_fin,servsocial.horario,servsocial.programa,servsocial.nomEmp,servsocial.tipoEmp,servsocial.giroEmp,servsocial.dirEmp,servsocial.telEmp,servsocial.resEmp,servsocial.cargo,servsocial.edoEmp,servsocial.muniEmp,servsocial.matricula AS servMatri,programas.idprogramas,programas.descripcion AS prgDes,grupos.idgrupos,grupos.grado,grupos.grupo,grupos.turno,grupos.carr,turnos.idturnos,turnos.descripcion AS turnoDes,carreras.idcarreras,carreras.nombre AS carNombre FROM alumnos INNER JOIN servsocial ON servsocial.matricula=alumnos.matricula INNER JOIN programas ON programas.idprogramas=servsocial.programa INNER JOIN grupos ON grupos.idgrupos=alumnos.grupo INNER JOIN turnos ON turnos.idturnos=grupos.turno INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera WHERE servsocial.matricula = '$user'";
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
	$no=$row['idservsocial'];
	
$sql_r="SELECT * FROM reports_sersocial WHERE folioServicio = ".$no." ";
$result_r=$db->executeQuery($sql_r);
$reg_r=$db->getNRows($result_r);
//echo $reg_r = numero de filas existentes con el folio de servicio;
if($reg_r>=1)
?>

<table width="200" border="1">
<?php
while($row_r=$db->getRows($result_r))
	{
?>
<tr>
  	<td><?php echo $row_r['idreports_sersocial'];?></td>
	<td><?php echo $row_r['folioServicio'];?></td>
    <td><?php echo $row_r['fecha'];?></td>
    <td><?php echo $row_r['tipo'];?></td>
    <td><?php echo $row_r['actividades'];?></td>
</tr>
<?php }?>
</table>