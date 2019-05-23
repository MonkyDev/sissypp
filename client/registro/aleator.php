<?php
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@&#";
$cad = "";
for($i=0;$i<10;$i++)
	$cad .= substr($str,rand(0,64),1);
?>
