<?php
if (!isset($_SESSION)) session_start();
require_once("../clases/conexion.php");
$db=new conexion();
$acc=$_POST['v_acc'];
switch($acc)
{
	case 1:
		$de=$_POST['v_de'];
		$para=$_POST['v_para'];
		$sql="UPDATE alumnos SET grupo=" . $para . " WHERE grupo=" . $de;
		$re=$db->executeQuery($sql);
		echo "Los alumnos se han movido de grupo satisfactoriamente";
	break;
	case 2:
		
	break;
	case 3:
		
	break;
	case 4://busca el grupo........
		$id=$_POST['v_id'];
		$sql="SELECT idgrupos,codigo FROM grupos WHERE codigo='" . $id . "'";
		$re=$db->executeQuery($sql);
		if($rows=$db->getNRows($re)>0)
		{
			$row=$db->getRows($re);
			$datos="1|" . $row['idgrupos'];
			echo $datos;
		}
		else
		{
			echo "0|No se encontró el grupo";
		}
	break;
	case 5://agrega alumno a la session
		$id=$_POST['v_id'];
		$sql="SELECT * FROM alumnos WHERE grupo=" . $id;
		$re=$db->executeQuery($sql);
		$noRegs=$db->getNRows($re);
		echo $id . '-' . $noRegs . '|';
		echo '<div style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#999; text-align:center; width:100%;">-- '. $noRegs . ' Alumnos en el grupo --</div>';
		if($noRegs!=0)
		{
			echo '<table style=" width:100%; color:#666; font-size:12px; font-family:Arial, Helvetica, sans-serif; background-color:#FFF;">';
			echo '<tr style="background-color:#039; color:#fff; border:#E0E0E0 1px solid;">';
				echo '<td align="center">Matrícula</td>';
				echo '<td align="center">Nombre</td>';
			echo '</tr>';
			while($rows=$db->getRows($re))
			{
				echo '<tr style="border:#E0E0E0 1px solid;">';
					echo '<td>' . $rows['matricula'] . '</td>';
					echo '<td>' . $rows['paterno'] . ' ' . $rows['materno'] . ' ' . $rows['nombre'] . '</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
		else
			echo('<div style="text-align:center; width:100%; margin-top:50px; font-family:Arial, Helvetica, sans-serif;"><font color="#666666" size="+2">Grupo vacío</font></div>');
	break;

}
?>
