<?php
require_once("../clases/conexion.php");
$db = new conexion();

$a=$_POST['v_acc'];

	switch($a)
	{
	case 1:
		$mat=$_POST['v_mat'];
		$nom=$_POST['v_nom'];
		$Apa=$_POST['v_Apa'];
		$Ama=$_POST['v_Ama'];
		$nkt=$_POST['v_nkt'];
		$psw=$_POST['v_psw'];
		$car=$_POST['v_car'];
		$sql="INSERT INTO uregister (matricula,nombre,Apaterno,Amaterno,nick,password,carrera) VALUES 
		('" . $mat . "', '" . $nom . "','" . $Apa . "','" . $Ama . "', " . $nkt . ", '" . $psw . "','" . $car . "')";
		$db->executeQuery($sql);
	break;	
	
	case 2:
		/*invertir la fecha con una expresin regulaar*/
		$oldDate=$_POST['v_nac'];
		$newDate=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate);
		/*---------------------------------fin------------------------------------*/
		$dom=$_POST['v_dom'];
		$sex=$_POST['v_sex'];
		$nac=$newDate;
		$edd=$_POST['v_edd'];
		$tel=$_POST['v_tel'];
		$cor=$_POST['v_cor'];
		$psw=$_POST['v_psw'];
		$id=$_POST['v_id'];
		$sql="UPDATE alumnos SET domicilio='" . $dom . "', sexo='" . $sex . "', 
		fnacimiento='" . $nac . "', edad=" . $edd . ", telefono='" . $tel . "', email='" . $cor . "', pswd='" . $psw . "', pregunta=".$_POST['pre'].", respuesta='".$_POST['res']."' WHERE matricula = '" . $id . "'"; 
		$db->executeQuery($sql);
	break;
	
	case 3:
		$id=$_POST['v_id'];
		$sql="DELETE FROM servicios WHERE matricula=" . $id;
		$db->executeQuery($sql);				
	break;
	
	}
?>