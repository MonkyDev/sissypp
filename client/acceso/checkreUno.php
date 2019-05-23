<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	$mat=$_POST['v_mat'];
	$sql="SELECT * FROM alumnos INNER JOIN servsocial ON alumnos.matricula=servsocial.matricula INNER JOIN reports_sersocial ON servsocial.idservsocial=reports_sersocial.folioServicio WHERE alumnos.matricula = '$mat' ";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>=1){
		$row=$db->getRows($result);
		$x=$row['noReport'];
			if($x==0)
				echo "1";
			else 
				echo "0";
	}
	else
		echo "0";
?>