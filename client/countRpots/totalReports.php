<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	$id=$_GET['v_mat'];
	$sql="SELECT * FROM reports_sersocial INNER JOIN servsocial ON reports_sersocial.folioServicio=servsocial.idservsocial 
	WHERE servsocial.matricula = ".$id;
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>1){
		$row=$db->getRows($result);
		$x=$row['folioServicio'];
		$sql1="SELECT MAX(noReport) AS num FROM reports_sersocial WHERE folioServicio = ".$x;
		$result1=$db->executeQuery($sql1);
		$row1=$db->getRows($result1);
		$max=$row1['num'];
		if($max==99)
			echo "1";
		else 
			echo "0";
	}
	else 
		"NULL"
?>