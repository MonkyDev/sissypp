<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SISSYPP - Sistema Institucional de Servicio Social y Practicas profesionales IESCH</title>
    <link href="css/layout.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="css/dTable.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-2.2.2.js" language="javascript" type="text/javascript"></script>
    <!--Para los alerts-->
    <link href="js/moo/alertify.core.css" type="text/css" rel="stylesheet">
    <link href="js/moo/alertify.default.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="js/moo/alertify.min.js"></script>
    <!--Terminan los alert-->
    <script src="js/generales.js" language="javascript" type="text/javascript"></script>
    <script src="js/menu.js" language="javascript" type="text/javascript"></script>
    <script src="js/jquery.dataTables.js" language="javascript" type="text/javascript"></script>
    <script src="js/carreras.js" language="javascript" type="text/javascript"></script>
</head>

<body>
	<div id="fondo"></div>
    <div id="window">
    	
    </div>
	<header>
    	<div id="logo">
        	<label>IESCH</label><br>
            <label style="font-size:18px;">Sistema Institucional de Servicio Social y Prácticas Profesionales</label>
        </div>
        <div id="infoEmpresa">
        	<div id="dirEmpresa">
            	<br>Blvd. Paso Limón S/N, Col. Paso Limón
            </div>
            <div id="telEmpresa">
            	96141621 - Ext. 106
            </div>
            <div id="emailEmpresa">
            	estudiantiles@iesch.edu.mx
            </div>
        </div>
    </header>
    <section id="cuerpo">
    	<aside id="contMenu">
        	<div id='cssmenu'>
                <ul>
                   <li><a href='#'><span>Inicio</span></a></li>
                   <li class='has-sub'><a href='#'><span>Adminstraci&oacute;n</span></a>
                      <ul>
                         <li class='has-sub'><a href='#'><span>Cat&aacute;logos de sistema</span></a>
                            <ul>
                            	<li onClick="loadScreen('planescolar/mnu_planEscolar.php','main');"><a href='#'><span>Planes Escolares</span></a></li>
                               <li onClick="loadScreen('programas/mnu_programa.php','main');"><a href='#'><span>Programas</span></a></li>
                               <li onClick="loadScreen('empresas/mnu_empresas.php','main');"><a href='#'><span>Empresas o Dependencias</span></a></li>
                               <li onClick="loadScreen('turnos/mnu_Turnos.php','main');"><a href='#'><span>Turnos</span></a></li>
                            </ul>
                         </li>
                         <li class='has-sub'><a href='#'><span>Catálogos Operativos</span></a>
                            <ul>
                            	<li onClick="loadScreen('carreras/mnu_carreras.php','main');"><a href='#'><span>Carreras</span></a></li>
                               <li onClick="loadScreen('grupos/mnu_grupos.php','main');"><a href='#'><span>Grupos</span></a></li>
                                <li onClick="loadScreen('alumnos/mnu_Alumnos.php','main');"><a href='#'><span>Alumnos</span></a></li>
                                 <!--<li onClick="loadScreen('alumgrupo/mnu_alumGrupo.php','main');"><a href='#'><span>Agregar alumnos a grupo</span></a></li>
                                  <li onClick="loadScreen('moveAlumnos/mnu_moveAlumnos.php','main');"><a href='#'><span>Mover alumnos de grupo</span></a></li>-->
                               <!--<li class='last'><a href='#'><span>Sub Product</span></a></li>-->
                            </ul>
                         </li>
                      </ul>
                   </li>
                   
                   
                   
                   
                   <li class='has-sub'><a href='#'><span>Procedimientos</span></a>
                      <ul>
                         <li class='has-sub'><a href='#'><span>Con Alumnos</span></a>
                            <ul>
                                 <li onClick="loadScreen('alumgrupo/mnu_alumGrupo.php','main');"><a href='#'><span>Agregar alumnos a grupo</span></a></li>
                                  <li onClick="loadScreen('moveAlumnos/mnu_moveAlumnos.php','main');"><a href='#'><span>Mover alumnos de grupo</span></a></li>
                               <!--<li class='last'><a href='#'><span>Sub Product</span></a></li>-->
                            </ul>
                         </li>
                         
                         <li class='has-sub'><a href='#'><span>Servicio Social</span></a>
                            <ul>
                            	 <!--<li onClick="loadScreen('genServSocial/mnu_genServSocial.php','main');"><a href='#'><span>Generar solicitud</span></a></li>-->
                                 <li onClick="loadScreen('genServSocial/mnu_tblServicios.php','main');"><a href='#'><span>Solicitudes</span></a></li>
                                 <li onClick="loadScreen('alumgrupo/mnu_alumGrupo.php','main');"><a href='#'><span>Liberación sin registro</span></a></li>
                                  <li onClick="loadScreen('moveAlumnos/mnu_moveAlumnos.php','main');"><a href='#'><span></span></a></li>
                               <!--<li class='last'><a href='#'><span>Sub Product</span></a></li>-->
                            </ul>
                         </li>
                      </ul>
                   </li>
                   
                   
                   
                   
                   <li class='has-sub'><a href='#'><span>Reportes</span></a>
                      <ul>
                         <li class='has-sub'><a href='#'><span>Adminstrativos</span></a>
                            <ul>
                               <li><a href='#'><span>Sub Product</span></a></li>
                               <li class='last'><a href='#'><span>Sub Product</span></a></li>
                            </ul>
                         </li>
                         <li class='has-sub'><a href='#'><span>Financieros</span></a>
                            <ul>
                               <li><a href='#'><span>Sub Product</span></a></li>
                               <li class='last'><a href='#'><span>Sub Product</span></a></li>
                            </ul>
                         </li>
                         <li class='has-sub'><a href='#'><span>Operativos</span></a>
                            <ul>
                               <li><a href='#'><span>Producto más vendido</span></a></li>
                               <li class='last'><a href='#'><span>Sub Product</span></a></li>
                            </ul>
                         </li>
                      </ul>
                   </li>
                   
                   
                    <li class='has-sub'><a href='#'><span>Configuraciones</span></a>
                      <ul>
                         <li onClick="loadScreen('configuraciones/mnu_generales.php','main');"><a href='#'><span>Generales</span></a>
                            <!--<ul>
                               <li><a href='#'><span>Sub Product</span></a></li>
                               <li class='last'><a href='#'><span>Sub Product</span></a></li>
                            </ul>-->
                         </li>
                         <li class='has-sub'><a href='#'><span>Página web</span></a>
                            <ul>
                               <li><a href='#'><span>Noticias</span></a></li>
                               <li><a href='#'><span>Entérate</span></a></li>
                               <li><a href='#'><span>Mensaje a alumno</span></a></li>
                               <li class='last'><a href='#'><span>Aviso a alumno</span></a></li>
                            </ul>
                         </li>
                      </ul>
                   </li>
                   
                   
                   
                   <li onClick="loadWindow(550,300);loadScreen('acercade.php','window');"><a href='#'><span>Acerca de</span></a></li>
                </ul>
             </div>
        </aside>
        <aside id="main">
        </aside>
    </section>
    <footer>
    	<div id="fullscreen" title="Pantalla completa" onClick="launchFullScreen(document.documentElement);"></div>
        <div id="normalscreen" title="Pantalla normal" onClick="cancelFullscreen();"></div>
        <div  style="float:left; width:1247px;"><marquee id="avisos">Develop Software - Bienvenido Pedro Daniel Nanguyasmú</marquee></div>
    </footer>
</body>
</html>