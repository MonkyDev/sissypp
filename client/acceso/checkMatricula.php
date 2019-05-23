<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	
	$sql="SELECT * FROM servsocial WHERE matricula = '".$_POST['v_mat']."' AND edo = 3";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);

	if($reg>=1){
	 	$row=$db->getRows($result);
		echo "0";
	}
	else{
		echo "1";
	}
?>