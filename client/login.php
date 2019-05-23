<script src="js/jquery-2.2.1.js" type="text/javascript"></script>
<script src="js/generales.js" type="text/javascript"></script>
<script src="js/acciones.js" type="text/javascript"></script>
<script src="alertify/lib/alertify.min.js" type="text/javascript"></script>

<link type="image/x-ico" href="icon/EIAC-IESCH.ico" rel="icon">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="alertify/themes/alertify.core.css"/>
<link rel="stylesheet" href="alertify/themes/alertify.default.css"/>
<?php 
	require_once('registro/aleator.php');
?>
<input type="hidden" value="<?php echo $cad; ?>" id="valor"/>
<section>
<div id="backScreen"> 	
	</div>
    
        <div id="window">
        </div>
<center>
<div style="width:700px;height:20%;text-align:justify;">
    <font size="+1" color="#666666"> 
    <br>
    Hola, para poder ingresar al sistema de servicios estudiantiles necesitas acceder con tu n&uacute;mero 
    de matr&iacute;cula en la casilla de "Usuario" y accede con tu contrase&ntilde;a, si ya estas 
    <b>Registrado</b>.
    </font>
</div>

<div id="v_login"> 
    <div style="width:100%px;height:50%;background-image:url(images/LOGO_IESCH_transparente.png); background-position:center; background-size:40%; background-repeat:no-repeat; margin-bottom:10px;">
    </div>
<div>
<input class="ipt" type="text" id="txt_usr" placeholder="M&aacute;tricula" onKeyUp="next('txt_pswd')" autofocus/><br/><br/>
<input class="ipt" type="password" id="txt_pswd" placeholder="Contrase&ntilde;a" 
onKeyUp="if(validateTecla(event)=='enter')checkUser();"/><br /><br />
<input class="ipt1" type="button" value="ACEPTAR" onClick="checkUser();" style="background-color:#CCC;" /><br/><br/><br/>
<ins class="rgt"><a href="#" onClick="displayWindow(600,575);loadScreen('registro/registration.php','window');">Registrarse</a></ins>

</div>
</center>
<br>
<label onClick="displayWindow(350,400);loadScreen('registro/recuperacion.php','window');" class="recu">¿Olvidaste la contraseña?</label>	
</section>

<script>
function ver(){
	var a = document.getElementById('valor').value;
	alertify.alert
	("Has generado una Contrase&ntilde;a aleatoria, por favor recuerdala ya que ser&aacute; tu acceso al sistema");
	document.getElementById('psw').value=a;	
}

function next(e){
	if(validateTecla(event)=='enter'){
		$('#'+e).focus();
	}
} 
</script>
