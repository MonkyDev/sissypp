<?php
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		$dat=$_POST['v_dat'];
		$dat=mysql_real_escape_string($dat);
		$sql=$db->getQueryInsertForm('grupos',$dat);
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
		$sql=$db->getQueryUpdateForm('grupos',$dat,'idgrupos',$id,'n');
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
	case 3:
		$id=$_POST['v_id'];
		$sql=$db->getQueryBlock('grupos','idgrupos',$id,'n');
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
	case 4:
		$id=$_POST['v_id'];
		$sql="SELECT * FROM planxcarr INNER JOIN planescolar ON planxcarr.plan=planescolar.idplanescolar WHERE carr='" . $id . "'";
		$r=$db->executeQuery($sql);
		while($row=$db->getRows($r))
			echo '<option value="' . $row['plan'] . '">' . $row['descripcion'] . '</option>';
	break;
	case 5:
		$id=$_POST['v_id'];
		$plan=$_POST['v_plan'];
		$sql="SELECT * FROM planxcarr INNER JOIN planescolar ON planxcarr.plan=planescolar.idplanescolar WHERE carr='" . $id . "'";
		$r=$db->executeQuery($sql);
		while($row=$db->getRows($r))
		{
			if($row['plan']==$plan)
				echo '<option value="' . $row['plan'] . '" selected >' . $row['descripcion'] . '</option>';
			else
				echo '<option value="' . $row['plan'] . '">' . $row['descripcion'] . '</option>';
		}
	break;
}
?>