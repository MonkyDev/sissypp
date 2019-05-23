<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	$id=$_POST['v_mat'];
	
	$sql="SELECT * FROM servsocial WHERE matricula = '".$id."' AND edo != 0 ";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>=1){
		echo "1";
	}
	else{
		echo "0";
	}
?>