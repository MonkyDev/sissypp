<?php
if (!isset($_SESSION)) session_start();
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		if(!isset($_SESSION['planxcarr']))
			echo "0|No existen planes asociados a la carrera";
		else
		{
			$exito=1;
			$dat=$_POST['v_dat'];
			$dat=mysql_real_escape_string($dat);
			$sql=$db->getQueryInsertForm('carreras',$dat);
			//Iniciamos la transaccion para guardar la carrera con sus planes
			$db->startTransaction();
			if(!$db->execQueryTrans($sql)) $exito=0;
			foreach($_SESSION['planxcarr'] as $k => $v)
			{
				$plan=explode('-',$k);
				$dat=explode('|',$v);
				$carr=$dat[0];
				$rvoe=$dat[1];
				$vige=$dat[2];
				$sql="INSERT INTO planxcarr(carr,plan,rvoe,vigencia) VALUES('" . $carr . "'," . $plan[0] . ",'" . $rvoe . "','" . $vige . "')";
				if(!$db->execQueryTrans($sql)) $exito=0;
			}
			if($exito)
			{
				$db->commitTransaction();
				echo "1|Listo";
			}
			else
			{
				$db->breakTransaction();
				echo "0|ERROR: " . $db->_error;
			}
		}
	break;
	case 2:
		$dat=$_POST['v_dat'];
		$id=$_POST['v_id'];
		$exito=1;
		$dat=mysql_real_escape_string($dat);
		//Eliminamos los planes asociados a la carrera
		$sql="DELETE FROM planxcarr WHERE carr='" . $id . "'";
		$db->executeQuery($sql);
		$sql=$db->getQueryUpdateForm('carreras',$dat,'idcarreras',$id,'c');
		//Iniciamos la transaccion para actualizar la información de la carrera
		$db->startTransaction();
		if(!$db->execQueryTrans($sql)) $exito=0;
		foreach($_SESSION['planxcarr'] as $k => $v)
		{
			$plan=explode('-',$k);
			$dat=explode('|',$v);
			$carr=$dat[0];
			$rvoe=$dat[1];
			$vige=$dat[2];
			$sql="INSERT INTO planxcarr(carr,plan,rvoe,vigencia) VALUES('" . $carr . "'," . $plan[0] . ",'" . $rvoe . "','" . $vige . "')";
			if(!$db->execQueryTrans($sql)) $exito=0;
		}
		if($exito)
		{
			$db->commitTransaction();
			echo "1|Listo";
		}
		else
		{
			$db->breakTransaction();
			echo "0|ERROR: " . $db->_error;
		}
	break;
	case 3:
		$id=$_POST['v_id'];
		$sql=$db->getQueryBlock('carreras','idcarreras',$id,'c');
		$sql2=$db->getQueryBlock('planxcarr','carr',$id,'c');
		$exito=1;
		//Empezamos la transacción para bloquear carrera y planes ligados
		$db->startTransaction();
		if(!$db->execQueryTrans($sql)) $exito=0;
		if(!$db->execQueryTrans($sql2)) $exito=0;
		
		if($exito)
		{
			$db->commitTransaction();
			echo "1|Listo";
		}
		else
		{
			$db->breakTransaction();
			echo "0|ERROR: " . $db->_error;
		}
	break;
	case 4:
		$plan=$_POST['v_plan'];
		$carr=$_POST['v_carr'];
		$rvoe=$_POST['v_rvoe'];
		$vige=$_POST['v_vige'];
		if(!isset($_SESSION['planxcarr']))
			$_SESSION['planxcarr'][$plan]=$carr . "|" . $rvoe . "|" . $vige;
		else
		{
			$find=0;
			foreach($_SESSION['planxcarr'] as $k => $v)
			{
				if($plan==$k)
				{
					$_SESSION['planxcarr'][$k]=$carr . "|" . $rvoe . "|" . $vige;
					$find=1;
				}
			}
			if(!$find) $_SESSION['planxcarr'][$plan]=$carr . "|" . $rvoe . "|" . $vige;
		}
		echo "1";
	break;
	case 5:
		$id=$_POST['v_id'];
		if(!isset($_SESSION['planxcarr']))
			echo "0|ERROR: No se encontró el plan escolar" . $id;
		else
		{
			unset($_SESSION['planxcarr'][$id]);
			echo "1|Listo";
		}
	break;
}
?>