<?php
require_once("../clases/conexion.php");
	$db=new conexion();
	$id=$_POST['v_mat'];
	//$ta=$_POST['v_tabla']; // INNER JOIN= UNIR INTIMAMEMNTE
	$tp=$_POST['v_tipo'];
	
	$sql="SELECT * FROM alumnos INNER JOIN servsocial ON alumnos.matricula = servsocial.matricula 
	WHERE servsocial.tipoEmp = '" . $tp . "' AND alumnos.matricula = '" . $id . "' AND servsocial.edo != 0 ";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>=1){	
	 	$row=$db->getRows($result);
		$e=$row['tipoEmp']; 
		switch($e){
			case "Gobierno":
				echo "G";
			break;
			case "Privada":
				echo "P";		
			break;
			}
	}
	else{
		echo "0";
	}

?>