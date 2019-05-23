<?php
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		$dat=$_POST['v_dat'];
		$dat=mysql_real_escape_string($dat);
		$sql=$db->getQueryInsertForm('alumnos',$dat);
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
		$sql=$db->getQueryUpdateForm('alumnos',$dat,'matricula',$id,'t');
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
	case 3:
		$id=$_POST['v_id'];
		$edo=$_POST['v_edo'];
		$sql="UPDATE alumnos SET edo=" . $edo . " WHERE matricula='" . $id . "'";
		$db->executeQuery($sql);
		if($db->_error=='0')
			echo "1|Listo";
		else
			echo "0|ERROR: " . $db->_error;
	break;
	
	case 7://carga los grados y grupos con turno de acuerdo a la carrera y plan seleccionados
		$carr=$_POST['v_id'];
		
		$sql="SELECT DISTINCT grado,grupo,codigo,idgrupos,turnos.descripcion as turn, planescolar.descripcion as planes FROM grupos INNER JOIN turnos ON grupos.turno=turnos.idturnos INNER JOIN planxcarr ON grupos.carr=planxcarr.carr INNER JOIN planescolar ON grupos.pEscolar=planescolar.idplanescolar WHERE grupos.carr='" . $carr . "'";
		$r=$db->executeQuery($sql);
		while($row=$db->getRows($r))
		{
			echo '<option value="' . $row['idgrupos'] . '">' . $row['grado'] . $row['grupo'] . ' - ' . $row['planes'] . " - " . $row['turn'] . ' [' . $row['codigo'] . '] </option>';
		}
	break;
}
?>