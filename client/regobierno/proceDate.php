<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
		
	$x=$row['idservsocial'];
	$sql2="SELECT MAX(noReport) AS num FROM reports_sersocial WHERE folioServicio = ".$x; 
	$result2=$db->executeQuery($sql2);
	$row2=$db->getRows($result2);
	
	$y=$row2['num'];
	$sql1="SELECT * FROM reports_sersocial WHERE folioServicio = '$x' AND noReport = ".$y;
	$result1=$db->executeQuery($sql1);
	$row1=$db->getRows($result1);
	$ult_fec=$row1['periodo_f'];
?>