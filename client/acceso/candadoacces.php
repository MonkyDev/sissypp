<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	
	$sql="SELECT * FROM alumnos WHERE matricula = '".$_POST['v_mat']."' AND edo !=0 ";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);

	if($reg>=1){
	 	$row=$db->getRows($result);
		$e=$row['carrera']; //si tienen que hacer "practica" se da el valor por que todos hacen social
		switch($e){
			case "ARQ":
				echo "practica";
			break;
			
			case "ECOM":
				echo "social";		
			break;
			
			case "ICIV":
				echo "social";
			break;
			
			case "ISC":
				echo "social";
			break;
			case "IZA":
				echo "social";
			break;
			
			case "LAE":
				echo "social";
			break;
			
			case "LAET":
				echo "practica";
			break;
			
			case "LCP":
				echo "social";
			break;
			
			case "LDER":
				echo "social";
			break;
			
			case "LDIG":
				echo "social";
			break;
			
			case "LEFD":
				echo "social";
			break;
			
			case "LEM":
				echo "social";
			break;
			
			case "LENF":
				echo "social";
			break;
			
			case "LIA":
				echo "social";
			break;
			
			case "MED":
				echo "practica";
			break;
			
			case "TELE":
				echo "practica";
			break;
			
			
			default:
				echo "NO SE ENCONTRO";
			}
	}
	else{
		echo "0";
	}
?>