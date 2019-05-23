<?php
if (!isset($_SESSION)) session_start();
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		$grupo=$_POST['v_grupo'];
		$carrera=$_POST['v_carrera'];
		$ejecuto=1;
		
		if(!isset($_SESSION['alumgrupo']))
			echo "0|No se ha agregado ningún alumno al grupo";
		else
		{
			$db->startTransaction();
			foreach($_SESSION['alumgrupo'] as $k => $v)
			{
				$d=explode("|",$v);
				$pat=$d[0];
				$mat=$d[1];
				$nom=$d[2];
				$sql="INSERT INTO alumnos (matricula,nombre,paterno,materno,grupo,carrera) VALUES ('" . $k . "','" . $nom . "','" . $pat . "','" . $mat . "'," . $grupo . ",'" . $carrera . "')";
				//$sql=mysql_real_escape_string($sql);
				if(!$db->execQueryTrans($sql))$ejecuto=0;
			}
		}
		if($ejecuto)
		{
			$db->commitTransaction();
			unset($_SESSION['alumgrupo']);
			echo "1|Los alumnos se han asignado al grupo";
		}
		else
		{
			$db->breakTransaction();
			unset($_SESSION['alumgrupo']);
			echo "0|ERROR: No se pudieron registrar los alumnos";
		}
	break;
	case 2:
		
	break;
	case 3:
		$id=$_POST['v_id'];
		if(!isset($_SESSION['alumgrupo']))
			echo "0|ERROR: No se encontró la matrícula" . $id;
		else
		{
			unset($_SESSION['alumgrupo'][$id]);
			echo "1|Listo";
		}
	break;
	case 4://busca el grupo........
		$id=$_POST['v_id'];
		$sql="SELECT idgrupos,codigo,grado,grupo,turno,turnos.descripcion as dTurno, carr, carreras.nombre as carrera, pEscolar, planescolar.descripcion as planEscolar FROM grupos INNER JOIN turnos ON grupos.turno=turnos.idturnos INNER JOIN carreras ON grupos.carr=carreras.idcarreras INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar WHERE grupos.codigo='" . $id . "'";
		//$sql=mysql_real_escape_string($sql);
		$re=$db->executeQuery($sql);
		if($rows=$db->getNRows($re)>0)
		{
			$row=$db->getRows($re);
			$datos="1|" . $row['idgrupos'] . "|" . $row['grado'] . $row['grupo'] . "|" . $row['turno'] . "-" . $row['dTurno'] . "|" . $row['carr'] . "-" . $row['carrera'] . "|" . $row['pEscolar'] . "-" . $row['planEscolar'];
			echo $datos;
		}
		else
		{
			echo "0|No se encontró el grupo";
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
}
?>