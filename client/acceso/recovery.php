<?php
	require_once("../clases/conexion.php");
	$db=new conexion();
	
	if($_POST){
		$sql="SELECT matricula,fnacimiento,pregunta,respuesta,edo,pswd FROM alumnos WHERE matricula='".$_POST['matricula']."' ";
		$result=$db->executeQuery($sql);
		$row=$db->getRows($result);
		if(empty($_POST['matricula']) or empty($_POST['respuesta'])){
			echo 0;
		}
		elseif ($row['matricula']==$_POST['matricula'] && $row['fnacimiento']==$_POST['fnacimiento'] && $row['pregunta']==$_POST['pregunta'] && $row['respuesta']==$_POST['respuesta'] && $row['edo']==1){

				echo "1|".$row['pswd'];
		}
		else{
			echo 0;
		}
	}
	else{
		echo 0;
	}
?>