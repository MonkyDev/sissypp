<?php
require_once("../clases/conexion.php");
$db = new conexion();

$a=$_POST['v_acc'];

	switch($a)
	{
	case 1:
		/*invertir la fecha con una expresin regulaar*/
		$oldDate1=$_POST['v_fecha'];
		$newDate1=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate1);
		$oldDate2=$_POST['v_inici'];
		$newDate2=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate2);
		$oldDate3=$_POST['v_final'];
		$newDate3=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate3);
		/*---------------------------------fin------------------------------------*/
		$v1=$_POST['v_const'];
		$v3=$newDate1;
		$v4=$newDate2;
		$v5=$newDate3;
		$v6=$_POST['v_horar'];
		$v7=$_POST['v_tpEmp'];
		$v8=$_POST['v_nmEmp'];
		$v9=$_POST['v_giEmp'];
		$v10=$_POST['v_diEmp'];
		$v11=$_POST['v_tlEmp'];
		$v12=$_POST['v_psEmp'];
		$v13=$_POST['v_cgEmp'];
		$v14=$_POST['v_edEmp'];
		$v15=$_POST['v_muEmp'];
		$v16=$_POST['v_matAl'];
		$v17=$_POST['v_eddAl'];
		$v18=$_POST['v_semAl'];
		$v19=3;
		$v20=$_POST['v_pgAsg'];
		$sql="INSERT INTO servsocial (no_cons,anhio,f_solicitud,f_inicio,f_fin,horario,tipoEmp,nomEmp,giroEmp,dirEmp,telEmp,resEmp,cargo,edoEmp,muniEmp,matricula,edadIni,periodoIni,edo,programa) VALUES (" . $v1 . ", '" . date('Y') . "', '" . $v3 . "', '" . $v4 . "', '" . $v5 . "', '" . $v6 . "', '" . $v7 . "', '" . $v8 . "', '" . $v9 . "', '" . $v10 . "', '" . $v11 . "', '" . $v12 . "', '" . $v13 . "', '" . $v14 . "',  '" . $v15 . "', " . $v16 . ", " . $v17 . ", '" . $v18 . "', " . $v19 . ", " . $v20 . ")";
		$db->executeQuery($sql);
		$id=$db->id_ultimo();
		echo $id;
	break;	
	
	case 2:
		$rpt1=$_POST['v_rpt'];
		$rpt2=$_POST['v_fch'];
		$rpt3=$_POST['v_per'];
		$rpt4=$_POST['v_pir'];
		$rpt5=$_POST['v_obg'];
		$rpt6=$_POST['v_obe'];
		$rpt7=$_POST['v_tip'];
		$rpt8=$_POST['v_dpt'];
		$rpt9=$_POST['v_fol'];	
		$sql="INSERT INTO reports_sersocial 
		(actividades,fecha,periodo_i,periodo_f,objs_grales,objs_espe,tipo,departamento,folioServicio) VALUES 
		('" . $rpt1 . "', '" . $rpt2 . "', '" . $rpt3 . "', '" . $rpt4 . "', '" . $rpt5 . "', '" . $rpt6 . "', 
		'" . $rpt7 . "', '" . $rpt8 . "', " . $rpt9 . ")";
		$db->executeQuery($sql);
		echo $id=$db->id_ultimo();
	break;
	
	case 3:
		/*invertir la fecha con una expresin regulaar*/
		$oldDate1=$_POST['v_fecha'];
		$newDate1=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate1);
		$oldDate2=$_POST['v_inici'];
		$newDate2=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate2);
		$oldDate3=$_POST['v_final'];
		$newDate3=preg_replace('#^(\d{4})/(\d{2})/(\d{2})$#', '$3-$2-$1', $oldDate3);
		/*---------------------------------fin------------------------------------*/
		$v1=$_POST['v_const'];
		$v2=$_POST['v_anhio'];
		$v3=$newDate1;
		$v4=$newDate2;
		$v5=$newDate3;
		$v6=$_POST['v_horar'];
		$v7=$_POST['v_tpEmp'];
		$v8=$_POST['v_nmEmp'];
		$v9=$_POST['v_giEmp'];
		$v10=$_POST['v_diEmp'];
		$v11=$_POST['v_tlEmp'];
		$v12=$_POST['v_psEmp'];
		$v13=$_POST['v_cgEmp'];
		$v14=$_POST['v_edEmp'];
		$v15=$_POST['v_muEmp'];
		$v16=$_POST['v_matAl'];
		$v17=$_POST['v_eddAl'];
		$v18=$_POST['v_semAl'];
		$v19=3;
		$v20=$_POST['v_pgAsg'];
		$v21=$_POST['v_acPrt'];
		$sql="INSERT INTO praprofesional (no_cons,anhio,f_solicitud,f_inicio,f_fin,horario,tipoEmp,nomEmp,giroEmp,dirEmp,telEmp,resEmp,cargo,edoEmp,muniEmp,matricula,edadIni,periodoIni,edo,programa,actividades) VALUES ('" . $v1 . "', " . $v2 . ", '" . $v3 . "', '" . $v4 . "', '" . $v5 . "', '" . $v6 . "', '" . $v7 . "', '" . $v8 . "', '" . $v9 . "', '" . $v10 . "', " . $v11 . ", '" . $v12 . "', '" . $v13 . "', '" . $v14 . "',  '" . $v15 . "', " . $v16 . ", " . $v17 . ", '" . $v18 . "', " . $v19 . ", " . $v20 . ", '" . $v21 . "')";
		$db->executeQuery($sql);
		$id=$db->id_ultimo();
		echo $id;
	break;
	
	case 4:
		$rpP1=$_POST['v_foli'];
		$rpP2=$_POST['v_rept'];
		$rpP3=$_POST['v_fsol'];
		$rpP4=$_POST['v_fini'];
		$rpP6=$_POST['v_ffin'];
		$rpP7=$_POST['v_rprv'];
		$rpP8=$_POST['v_obsv'];
		$rpP9=$_POST['v_no'];
		$sql="INSERT INTO reports_sersocial 
		(folioServicio,actividades,fecha,periodo_i,periodo_f,objs_espe,tipo,noReport) VALUES 
		(" . $rpP1 . ", '" . $rpP7 . "', '" . $rpP3 . "', '" . $rpP4 . "', '" . $rpP6 . "', '" . $rpP8 . "', 
		'" . $rpP2 . "'," . $rpP9 . ")";
		$db->executeQuery($sql);
		$id=$db->id_ultimo();
		echo $id;
	break;
	
	case 5:
		$rpP1=$_POST['v_foli'];
		$rpP2=$_POST['v_rept'];
		$rpP3=$_POST['v_fsol'];
		$rpP4=$_POST['v_Pini'];
		$rpP6=$_POST['v_Pfin'];
		$rpP7=$_POST['v_rgob'];
		$rpP8=$_POST['v_obsv'];
		$rpP9=$_POST['v_no'];
		$sql="INSERT INTO reports_sersocial 
		(folioServicio,actividades,fecha,periodo_i,periodo_f,objs_espe,tipo,noReport) VALUES 
		(" . $rpP1 . ", '" . $rpP7 . "', '" . $rpP3 . "', '" . $rpP4 . "', '" . $rpP6 . "', '" . $rpP8 . "', 
		'" . $rpP2 . "'," . $rpP9 . ")";
		$db->executeQuery($sql);
		$id=$db->id_ultimo();
		echo $id;
	break;
	}
?>