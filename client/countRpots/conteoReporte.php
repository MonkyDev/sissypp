<?php 
	require_once("../clases/conexion.php");
	$db=new conexion();
	$id=$_POST['v_folio'];
	$x=$_POST['v_tip'];
	
	$sql="SELECT * FROM reports_sersocial WHERE folioServicio = ". $id ."";
	$result=$db->executeQuery($sql);
	$reg=$db->getNRows($result);
	if($reg>0){
		if($x<3){
			$sql1="SELECT MAX(noReport) AS num FROM reports_sersocial WHERE folioServicio = ". $id ;
			$result1=$db->executeQuery($sql1);
			$row1=$db->getRows($result1);
			$n_num=$row1['num']+1;
			echo $n_num;
		}
		else {
			echo $n_num=99;
		}
	}
	else {
		echo $n_num=0;	
		}
	/*if($reg>=1){
		$row=$db->getRows($result);
		$n=$row['noReport'];
		$tp=$row['tipo'];
		switch($x){
			case 1:
				if($tp==$x)
				echo $n=$n+1;
				else echo 0;
			break;
			
			case 2:
				if($n==0)
				echo $n=1;
				else echo ++$n;
			break;
			
			case 3:
				echo 99;
			break;
		}
	}
	else{
		echo "Null";
	}*/
?>	