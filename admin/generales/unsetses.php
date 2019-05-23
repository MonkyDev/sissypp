<?php
if(!isset($_SESSION)) session_start();
$sesion=$_POST['v_ses'];
if($_SESSION[$sesion]) unset($_SESSION[$sesion]);
?>