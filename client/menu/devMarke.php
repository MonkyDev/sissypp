<?php
$b=$_GET['v_b'];
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM noticias WHERE idnoticias=".$b;
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<div id="formWindow">
	<div class="winHead">
        <div id="winHeadTitle" style="font-size:18px;">
        <u><b>ver m&aacute;s</u>...</b>
        </div>
          <div id="winHeadIconBox">
            <div class="icon" id="cerrar" title="Cerrar" onClick="closeWindow();"></div>
          </div>
          <div id="contain">
          	<div id="img"><img src="<?php echo $row['imgnoti']?>" width="328"  height="300"/></div>
          	<div id="tex"><?php echo $row['desnoti'];?></div>
          </div>
       </div>
</sdiv>
<style>
#contain{
	margin-top:26px;
	width:690px;
	height:300px;
	padding:10px;
}
#img{
	margin-top:50px;
	float:right;
	width:330px;
	height:300px;
	margin-right:10px;
}
#tex{
	font-size:20px;
	text-align:justify;
	margin-top:50px;
	position:absolute;
	float:left;
	width:330px;
	height:300px;
}
</style>