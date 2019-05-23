<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Asuntos Estudiantiles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link type="image/x-ico" href="icon/EIAC-IESCH.ico" rel="icon">
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/tab_style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="alertify/themes/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="alertify/themes/alertify.default.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    
	<script src="js/jquery-2.2.1.js" type="text/javascript"></script>
    <script src="js/jquery.1.6.2.min.js" type="text/javascript"></script>
    <script src="alertify/lib/alertify.min.js"></script>
    <script src="js/generales.js" type="text/javascript"></script>
    <script src="js/acciones.js" type="text/javascript"></script>
    <!--<script src="js/OutsetSession.js" type="text/javascript"></script>-->
    
    <!-- jQuery lib from google server ===================== -->
    <script src="js/jquery-2.2.1.js"></script>
	<!--  javaScript -->
<script>  
 // building select nav for mobile width only -->
$(function(){
	// building select menu
	$('<select />').appendTo('nav');

	// building an option for select menu
	$('<option />', {
		'selected': 'selected',
		'value' : '',
		'text': 'Choise Page...'
	}).appendTo('nav select');

	$('nav ul li a').each(function(){
		var target = $(this);

		$('<option />', {
			'value' : target.attr('href'),
			'text': target.text()
		}).appendTo('nav select');

	});

	// on clicking on link
	$('nav select').on('change',function(){
		window.location = $(this).find('option:selected').val();
	});
});

// show and hide sub menu
$(function(){
	$('nav ul li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(150);
		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(150);			
		}
	);
});
//end

</script>

</head>
<body>
<div id="backScreen"> 	
        </div>
    	
        <div id="window">
        </div>

        <div id="winStyle">
        
        </div>
        
        <div id="winMap">
        </div>      
      <header><center>
      	<div id="wallpeaper"></div>
        <div class="nom"><img src="images/user.png" width="30"><?php echo $_SESSION['usuario']?></div>
        </center>
      </header>

<div class="container">
		<div id="fdw"><center>
					<nav class="toolbar">
						<ul>
							<li><a href>Inicio</a></li>
							<li onClick="ini(1);loadScreen('menu/mision.php','c_clik')"><a href="#">Misi&oacute;n</a></li>
                            <li onClick="ini(2);loadScreen('menu/vision.php','c_clik');"><a href="#">Visi&oacute;n</a></li>
                            <li onClick="ini(3);loadScreen('menu/instruc.php','c_clik');"><a href="#">Instrucciones</a></li>
							<li>
								<a href="#">Solicitudes<span class="arrow"></span></a>
								<ul style="display: none;" class="sub_menu">
									<li class="arrow_top"></li>
									<li onClick="accesMat('social','social/FoSeSo.php','servsocial');">
                                    	<a href="#">Servicio Social </a>
                                    </li>
									<li onClick="accesMat('practica','practica/FoPPro.php','praprofesional');">
                                   		<a href="#">Pr&aacute;cticas Profesionales </a>
                                    </li>
								</ul>
							</li>
                            <li>
								<a href="#">Reportes<span class="arrow"></span></a>
								<ul style="display: none;" class="sub_menu">
									<li class="arrow_top"></li>
									<li onClick="checkRpte('reprimero/ReUno.php','reports_sersocial');">
                                    	<a href="#">Primer Reporte </a>
                                    </li>
									<li onClick="checkRpt('reprivada/actPrivada.php','Privada');">
                                    	<a href="#">Empresa Privada </a>
                                    </li>
                                    <li onClick="checkRpt('regobierno/actGobierno.php','Gobierno');">
                                    	<a href="#">Empresa Gobierno </a>
                                    </li>
								</ul>
							</li>
                            <li id="salir" onClick="logOut();"><a href="#" style="color:#F00;">Salir</a></li>
						</ul>
                    </nav>
             </center>
		</div><!-- end fdw -->
</div>
<section id="centrar">
        <section id="main"> 
               <!-- <div id="accion">
                  <div id="imp" style="margin-left:50px;position:absolute;">INICIO</div>
                </div>-->
                <div id="c_noti"><div style="float:left; margin-top:7px; margin:5px;">Noticias</div></div>
                <section id="noti">
                <script>loadScreen('menu/marke.php','noti');</script>
                </section> 
                 <section>
                    <div id="clik">
                    	<div style="float:left; margin:5px; margin-top:7px; position:absolute">
                            <div id="accion">
                            	<div id="imagn"></div>
                                <div id="imp">INICIO</div>
                            </div>
                    	</div>
                    </div>
                    <div id="c_clik" align="justify">
                    	<font color="#666666"> 
                    	<br><div style="margin:5px; margin-top:100px;">
                        Bienvenido!! ahora ya podrás realizar las actividades correspondientes relacionadas
                        con tu servicio social, prácticas profesionales y reporte de actividades en l&iacute;nea,
                        buscando hacerte más práctico el uso de la página donde quiera que est&eacute;s sin necesidad
                        de estar en la universidad</div>
                    	</font>
                    </div>
                 </section>
                <section>
                    <div id="empre">
                    	<div style="float:left; margin:5px; margin-top:7px;">
                    	Empresas Privadas
                    	</div>
                    </div>
                    <div id="c_empre">
                    <script>loadScreen('empresa/tbl_mapEmpre.php','c_empre');</script>
                    </div>
     </section>
              
    </section>
    
    <section id="report">
    </section>
</section>
    
    <footer>
    <font face="Arial, Helvetica, sans-serif" size="+1">
    <marquee>Te damos la Bienvenida al nuevo sistema de asuntos estudiantiles esperamos ayudarte...
    <div style="float:right;position:absolute;">
    </div>
    </marquee>
    </font>
    </footer>
    <input id="cedula" value="<?php echo $_SESSION['cedula']; ?>" hidden/>
</body>
</html>