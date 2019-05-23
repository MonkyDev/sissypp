<?php
session_start();
require_once("clases/conexion.php");
$db=new conexion();
if($_POST['usr']=="" && $_POST['psw']==""){
	echo 0;
}
else{
	$sql="SELECT matricula,nombre,pswd,edo FROM alumnos WHERE matricula='".$_POST['usr']."' ";
	$result=$db->executeQuery($sql);
	$row=$db->getRows($result);
		if($row['matricula']==$_POST['usr'] && $row['pswd']==$_POST['psw'] && $row['edo']==1){ 
			$_SESSION['usuario']=$row['nombre'];
			$_SESSION['cedula']=$row['matricula'];
			echo 1;
		} 
}

?>