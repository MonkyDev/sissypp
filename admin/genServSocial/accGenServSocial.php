<?php
if (!isset($_SESSION)) session_start();
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		$data=$_POST['v_data'];
		$sql=$db->getQueryInsertForm('servsocial',$data);
		$db->executeQuery($sql);
		if($db->_error=='0')
		{
			$idSol=$db->id_ultimo();
			echo("1|Solicitud Generada, ¿Desea imprimir el reporte?|" . $idSol);
		}
		else
			echo("0|Error: " . $db->_error);
	break;
	case 2:
		$data=$_POST['v_data'];
		$id=$_POST['v_id'];
		$sql=$db->getQueryUpdateForm('servsocial',$data,'idservsocial',$id,'n');
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo("1|Solicitud Generada, ¿Desea imprimir el reporte?|" . $id);
		else
			echo("0|Error: " . $db->_error);
	break;
	case 3://Cancela una solicitud
		$data=$_POST['v_data'];
		$id=$_POST['v_id'];
		$sqli=$db->getQueryInsertForm('cancelaservicio',$data);
		$sqlu="UPDATE servsocial SET edo=0 WHERE idservsocial=" . $id;
		$ejecuto=1;
		$db->startTransaction();
		if(!$db->execQueryTrans($sqli))
		{
			$msg=$db->_error;
			$ejecuto=0;
		}
		if(!$db->execQueryTrans($sqlu))
		{
			$msg=$msg . " || " . $db->_error;
			$ejecuto=0;
		}
		if($ejecuto)
		{
			echo "1|La solicitud se ha cancelado";
			$db->commitTransaction();
		}
		else
		{
			echo "0|ERROR: " .$msg;
			$db->breakTransaction();
		}
	break;
	case 4://busca el alumno........
		$id=$_POST['v_id'];
		
		$sql="SELECT alumnos.*,grupos.grado,grupos.grupo, planescolar.descripcion as plan,carreras.nombre as carre,turnos.idturnos, turnos.descripcion as turn  FROM alumnos INNER JOIN grupos ON alumnos.grupo=grupos.idgrupos INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar INNER JOIN carreras ON alumnos.carrera=carreras.idcarreras INNER JOIN turnos ON grupos.turno=turnos.idturnos WHERE alumnos.matricula='" . $id . "'";
		$re=$db->executeQuery($sql);
		if($rows=$db->getNRows($re)>0)
		{
			$row=$db->getRows($re);
			$datos="1|" . $row['matricula'] . "|" . $row['paterno'] . " " . $row['materno'] . " " . $row['nombre'] . "|" . $row['domicilio'] . "|" . $row['telefono'] . "|" . $row['sexo'] . "|" . $row['plan'] . "|" . $row['carre'] . "|" . $row['idturnos'] . "|" . $row['turn'] . "|" . $row['grado'] . "|" . $row['fnacimiento'];
			echo $datos;
		}
		else
		{
			echo "0|No se encontró al alumno";
		}
	break;
	case 5://agrega alumno a la session
		$id=$_POST['v_id'];
		$datos=$_POST['v_datos'];
		if(!isset($_SESSION['alumgrupo']))
			$_SESSION['alumgrupo'][$id]=$datos;
		else
		{
			$find=0;
			foreach($_SESSION['alumgrupo'] as $k => $v)
			{
				if($plan==$k)
				{
					$_SESSION['alumgrupo'][$k]=$datos;
					$find=1;
				}
			}
			if(!$find) $_SESSION['alumgrupo'][$id]=$datos;
		}
		echo "1";
	break;
	case 6:
		$id=$_POST['v_id'];
		$d=explode('|',$id);
		$sql="UPDATE servsocial SET edo=" . $d[1] ." WHERE idservsocial=" . $d[0];
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1";
		else
			echo "0";
	break;
}
?>