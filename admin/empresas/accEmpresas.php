<?php
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		$dat=$_POST['v_dat'];
		$dat=mysql_real_escape_string($dat);
		$sql=$db->getQueryInsertForm('empresas',$dat);
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
	case 2:
		$dat=$_POST['v_dat'];
		$id=$_POST['v_id'];
		$dat=mysql_real_escape_string($dat);
		$sql=$db->getQueryUpdateForm('empresas',$dat,'idempresas',$id,'n');
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
	case 3:
		$id=$_POST['v_id'];
		$sql=$db->getQueryBlock('empresas','idempresas',$id,'n');
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
}
?>