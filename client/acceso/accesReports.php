<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	$id=$_POST['v_mat'];
	$ta=$_POST['v_tabla']; // INNER JOIN= UNIR INTIMAMEMNTE
	
	$sql="SELECT * FROM ". $ta ." INNER JOIN servsocial ON ". $ta .".folioServicio = servsocial.idservsocial 
	WHERE servsocial.matricula = '". $id ."' AND servsocial.edo != 0 ";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>=1){
	 	echo "0";
	}
	else{
		echo "1";
	}
	
	//$sql="SELECT * FROM " . $ta . " WHERE matricula = ". $id ." ";
?>

