<?php
require_once("../clases/conexion.php");
	$db=new conexion();
	$id=$_POST['mat'];
	
	$sql="SELECT * FROM alumnos WHERE matricula = '". $id ."' AND edo = 1";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>=1)
		echo "1";
	else
		echo "0";
?>