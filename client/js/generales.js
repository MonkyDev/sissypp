//-----------------------------TEST NAVEGADOR----------------------------
var nav = navigator.userAgent.toLowerCase();
	if(nav.indexOf("chrome") != -1)
		nav=true;
	else
		confirm("Se necesita que tu navegador sea Google Chrome por los requerimientos del Web Site",function(e){
			if(e){
				window.open('http://www.google.com','','width=600,height=400,left=50,top=50,toolbar=yes');
				}
});
function loadScreen(file,content){
	  $.ajax
	  ({
		  url:file,
		  success:function(msj)
		  {
			  //document.getElementById('main').innerHTML=msj;
			  $('#'+ content).html(msj); /*es propio de javaScript*/
			  //;// sirve con jquery
		  }
	  });
}
//-----------------------------MAPA EN UNA VENTANA----------------------------
function displayWinMap(w,h){
	$('html, body').animate({scrollTop:160}, 'slow');
	var x=w/2;
	var y=h/2;
	$('#backScreen,#winMap').fadeIn(1000);
	document.getElementById('backScreen').style.display="block";
	document.getElementById('winMap').style.width=w+"px";
	document.getElementById('winMap').style.height=h+"px";
	document.getElementById('winMap').style.marginTop="-"+y+"px";
	document.getElementById('winMap').style.marginLeft="-"+x+"px";	
}
function loadMap(v){
	$.ajax({
		url:'empresa/mapa.php?v='+v,
		success: function(e){
			displayWinMap(950,600);
			$("#winMap").html(e);
		}
	});
}
//---------funcion para usar dos archivos con decisiones en un click--------	
function start(op)
	{
	  $('html, body').animate({scrollTop:0}, 'slow');	
	  displayWindow(500,217);
	  if(op==1)
	  	loadScreen('menu/window.php','window');
	  if(op==2)
	  	loadScreen('menu/window1.php','window');
	}

//--------------------------------FIN---------------------------------------	
function closeScreen(){
	document.getElementById('main').innerHTML="";
}

function displayWindow(w,h){
	$('html, body').animate({scrollTop:0}, 'slow');
	var x=w/2;
	var y=h/2;
	$('#backScreen,#window').fadeIn(1000);
	document.getElementById('backScreen').style.display="block";
	document.getElementById('window').style.display="block";
	document.getElementById('window').style.width=w+"px";
	document.getElementById('window').style.height=h+"px";
	document.getElementById('window').style.marginTop="-"+y+"px";
	document.getElementById('window').style.marginLeft="-"+x+"px";	
}

function closeWindow(){
	$('#backScreen,#window,#winMap').fadeOut(1000);		
}

//function viewReport(rpt) USANDO UNA NUEVA VENTANA
//{
//	window.open(rpt,"Nuevo Reporte","width=400,height=400,scrollbars=yes");	
//}

function viewReport(dato){ //CARGANDO DENTRO DE UN FRAME
		$("#main").html('<iframe id="fpdf"></iframe>')
		document.getElementById('fpdf').setAttribute("src",dato);
}

function checkUser(){
	var usr=document.getElementById('txt_usr').value;
	var psw=document.getElementById('txt_pswd').value;
	$.ajax({
		url:'checkUser.php',
		type:'POST',
		data:'usr='+usr+'&psw='+psw,
		success: function(e){
			if(e==1)
				window.location="index.php";
			else
				alertify.alert("Click en registrarse para activar tu contrase&ntilde;a y acceder");	
		} 
	});
}

$(document).ready(function() {
    $("#salir").click(function(){
		alertify.confirm("DESEA CERRAR SESION",function(e){
			if(e)
				$(document).ready(function logOut(){
				window.location="logOut.php";});
			else
				alertify.alert("GENIAL");
		});
	});
});


function ini(acc){
	if(acc==1)
	document.getElementById('imp').innerHTML='MISION';
	if(acc==2)
	document.getElementById('imp').innerHTML='VISION';
	if(acc==3)
	document.getElementById('imp').innerHTML='PASOS A SEGUIR SEG&Uacute;N TU CASO';
	if(acc==4)
	document.getElementById('imp').innerHTML='MENSAJES';
	if(acc==5)
	document.getElementById('imp').innerHTML='AVISOS';
}			

function validateTecla(e){
	var key=e.keyCode || e.which;
	switch(key)
	{
		case 13:
			return('enter');
		case 114:
			return('F2');
		case 114:
			return('F3');
		case 115:
			return('F4');
		case 116:
			return('F5');
		case 117:
			return('F6');
		case 118:
			return('F7');
		case 119:
			return('F8');
		case 120:
			return('F9');
		case 121:
			return('F10');
		case 122:
			return('F11');
		case 123:
			return('F12');
	}
}

function calcula_edad(c){
	var fecha = document.getElementById('nac').value;
	var f=fecha.split('-');
	var fa=new Date();
	var edad=fa.getFullYear()-f[0];
	if(f[1]>fa.getMonth()+1)
		edad--;
	if(fa.getMonth()+1==f[1])
		if(f[2]>fa.getDate())
			edad--;
	document.getElementById(c).value=edad;
}

function cal_fechaMax(){
	var fech = document.getElementById('feIni_soc').value;
	var f=fech.split('-');
	var fc = parseInt(f[1]) + 6;
	var feF=parseInt(f[0]);
	if(fc>12)
	{
		fc = fc-12;
		var	feF=feF+1;
	}
	if(fc<10) 
		fc='0'+fc;	
	var fecFin = feF +'-'+ fc +'-'+ f[2];
	document.getElementById('feFin_soc').setAttribute("min",fecFin);
	document.getElementById('feFin_soc').value=fecFin;

	var fmx=parseInt(f[0])+2;
	var fMax= fmx +'-'+	f[1] +'-'+ f[2];
	document.getElementById('feFin_soc').setAttribute("max",fMax);
}

function cal_fechMax(){
	var fech = document.getElementById('feIni_prt').value;
	var f=fech.split('-');
	var fc = parseInt(f[1]) + 6;
	var feF=parseInt(f[0]);
	if(fc>12)
	{
		fc = fc-12;
		var	feF=feF+1;
	}
	if(fc<10) 
		fc='0'+fc;	
	var fecFin = feF +'-'+ fc +'-'+ f[2];
	document.getElementById('feFin_prt').setAttribute("min",fecFin);
	document.getElementById('feFin_prt').value=fecFin;

	var fmx=parseInt(f[0])+2;
	var fMax= fmx +'-'+	f[1] +'-'+ f[2];
	document.getElementById('feFin_prt').setAttribute("max",fMax);
}
function periodoP(){
	var p_f= document.getElementById('f_inicial').value;
	var no=  document.getElementById('noReport').value;
	if(no!=99){
			var   x= p_f.split("-"); 
			var fm= parseInt(x[1])+1;
			var fa=parseInt(x[0]);
				if(fm>12){
					fm=fm-12;
					var fa=fa+1;
				}
				if(fm<10)
					fm='0'+fm;
					var p_mes = fa+'-'+fm+'-'+x[2];
			document.getElementById('f_parcial').setAttribute("max",p_mes);
			document.getElementById('f_parcial').setAttribute("min",p_mes);
			document.getElementById('f_Uparcial').value=p_mes;
			document.getElementById('f_parcial').value=p_mes;
	}
	else{
		document.getElementById('f_parcial').setAttribute("max",p_f);
		document.getElementById('f_parcial').setAttribute("min",p_f);
		document.getElementById('f_Uparcial').value=p_f;
		document.getElementById('f_parcial').value=p_f;
	}
}
function periodoG(){
	var p_f= document.getElementById('f_inicial').value;
	var no=  document.getElementById('noReport').value;
	if(no!=99){
		var   x= p_f.split("-"); 
		var fm= parseInt(x[1])+3;
		var fa=parseInt(x[0]);
			if(fm>12){
				fm=fm-12;
				var fa=fa+1;
			}
			if(fm<10)
				fm='0'+fm;
				var p_mes = fa+'-'+fm+'-'+x[2];
		document.getElementById('f_parcial').setAttribute("max",p_mes);
		document.getElementById('f_parcial').setAttribute("min",p_mes);
		document.getElementById('f_Uparcial').value=p_mes;
		document.getElementById('f_parcial').value=p_mes;	
	}
	else{
		document.getElementById('f_parcial').setAttribute("max",p_f);
		document.getElementById('f_parcial').setAttribute("min",p_f);
		document.getElementById('f_Uparcial').value=p_f;
		document.getElementById('f_parcial').value=p_f;
	}
	
}

function loadScreenUpd(file,cont,id)
{
	$.ajax({
		type:"POST",
		url:file,
		data:"&v_mt="+id,
		success: function(msj){
		  document.getElementById(cont).innerHTML= msj;
		}
	})
}

//limitar los caracteres en un textarea papus :v
$(document).ready(function(){
     // Función a lanzar cada vez que se presiona una tecla en un textarea
     // en el que se encuentra el atributo maxlength
     $("textarea[maxlength]").keyup(function() {
         var limit   = $(this).attr("maxlength"); // Límite del textarea
         var value   = $(this).val();             // Valor actual del textarea
         var current = value.length;              // Número de caracteres actual
         if (limit < current) {                   // Más del límite de caracteres?
             // Establece el valor del textarea al límite
             $(this).val(value.substring(0, limit));
         }
	});
});


function checkRpt(file,tpo) {
		var mat = document.getElementById('cedula').value;
		$.ajax({
			url:'acceso/checkreUno.php',
			type:'POST',
			data:'v_mat='+mat,
			success: function(e){
				if(e==1){
				  $.ajax({
				  url:'acceso/tipoReports.php',
				  type:'POST',
				  data:'v_mat='+mat+'&v_tipo='+tpo,
				  success: function(e){
					  switch(e){
						  case "P":
						  		$.ajax({
									url:'countRpots/totalReports.php?v_mat='+mat,
									type:'GET',
									success: function(e){
										if(e==1){
											$('html, body').animate({scrollTop:300}, 'slow');
					  						$("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>YA HAS GENERADO EL ULTIMO REPORTE MUCHAS FELICIDADES TERMINASTE TU SERVICIO ACUDE CON ASUNTOS ESTUDIANTILES</div>');
										}
										else{
											start(2);
								  			loadScreen(file+'?permiso='+mat,'main');
										}
									}
								});
						  break;
						  
						  case "G":
								  $.ajax({
									url:'countRpots/totalReports.php?v_mat='+mat,
									type:'GET',
									success: function(e){
										if(e==1){
											$('html, body').animate({scrollTop:300}, 'slow');
					  						$("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>YA HAS GENERADO EL ULTIMO REPORTE MUCHAS FELICIDADES TERMINASTE TU SERVICIO ACUDE CON ASUNTOS ESTUDIANTILES</div>');
										}
										else{
											start(2);
								  			loadScreen(file+'?permiso='+mat,'main');
										}
									}
								});							
						  break;
						  
						  default:
						  $('html, body').animate({scrollTop:300}, 'slow');
					  $("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>EL REPORTE QUE DESEAS GENERAR NO ES POSIBLE YA QUE NO ES EL TIPO DE DEPENDENCIA DESCRITA EN TU SOLICITUD</div>');					
					  }
				  }
			  })
			}
			else{
				$('html, body').animate({scrollTop:300}, 'slow');
				$("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>GENERA TU PRIMER REPORTE GRACIAS</div>');
			} 
		}
	});
	
}
	

function checkRpte(file,table) {
		var mat = document.getElementById('cedula').value;
		$.ajax({
			url:'acceso/firtsReport.php',
			type:'POST',
			data:'v_mat='+mat,
			success: function(e){
				if(e==1){
					$.ajax({
							url:'acceso/accesReports.php',
							type:'POST',
							data:'v_mat='+mat+'&v_tabla='+table,
							success: function(e){
												if(e==1){
												loadScreen(file+'?permiso='+mat,'main')
												}
												else {
													$('html, body').animate({scrollTop:300}, 'slow');
													$("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>EXISTE UN FOLIO CON ESTA MATRICULA SI DESEAS CANCELAR EL REPORTE ACUDE A ASUNTOS ESTUDIANTILES</div>');
												}
							}
						});
					}
				else {
				$('html, body').animate({scrollTop:300}, 'slow');
				$("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>PRIMERO LLENA TU SOLICITUD DE SERVICIO SOCIAL PARA PODER HACER TU PRIMER REPORTE</div>');
				}
			}
		})
	}
	

function accesMat(tipo,file,table){
	var mat = document.getElementById('cedula').value;
	$.ajax({
			url:'acceso/candadoacces.php',
			type:'POST',
			data:'v_mat='+mat,
			success: function(r){
				
				switch(tipo){
					case "social":
							$.ajax({
								  url:'acceso/checkMatricula.php',
								  type:'POST',
								  data:'v_mat='+mat+'&v_tabla='+table,
								  success: function(e){
									  if(e==1){
										  start(1);
										  loadScreen(file+'?permiso='+mat,'main');
									  }
									  else {
									  $('html, body').animate({scrollTop:300}, 'slow');
									  $("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>EXISTE UN FOLIO CON ESTA MATRICULA SI DESEAS CANCELAR LA SOLICITUD ACUDE A ASUNTOS ESTUDIANTILES</div>');
									  }
								  }
							  });				
					break;
					
					case "practica":
							if(r=='practica'){
								$.ajax({
								  url:'acceso/checkPracticas.php',
								  type:'POST',
								  data:'v_mat='+mat+'&v_tabla='+table,
								  success: function(e){
									  if(e==1){
										  start(1);
										  loadScreen(file+'?permiso='+mat,'main');
										  }
									  else {
									  $('html, body').animate({scrollTop:300}, 'slow');
									  $("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>EXISTE UN FOLIO CON ESTA MATRICULA SI DESEAS CANCELAR LA SOLICITUD ACUDE A ASUNTOS ESTUDIANTILES</div>');
									  }
								  }
							  });
							}
							else {
								$('html, body').animate({scrollTop:300}, 'slow');
								$("#main").html('<div class="error"><img src="images/AnimatedStop.gif"/>ACCESO DENEGADO</div>');
							}
					break;
					}
			}
		});
	}

function generaPeriodo(fecha,plan){
	var p=plan.substring(0,3);
	var period;
	var f=fecha.split('-')
	var m=parseInt(f[1]);
	if(p=='SEM' || p=='sem')
	{
		if(m>=1 && m<=6)
			period='ENE-JUN/' + f[0];
		else
			period='JUL-DIC/' + f[0];
	}
	else
	{
		if(m>=1 && m<=4)
			period='ENE-ABR/' + f[0];
		else
			if(m>=5 && m<=8)
				period='MAY-AGO/' + f[0];
			else
				period='SEP-DIC/' + f[0];
	}
	document.getElementById('sem_aln').value=period;
}

function noReport(){
	var i =document.getElementById('folio_servico').value;
	var x =document.getElementById('tipo_reporte').value;	
	$.ajax({
		url:'countRpots/conteoReporte.php',
		type:'POST',
		data:'v_folio='+i+"&v_tip="+x,
		success: function(e){
			document.getElementById('noReport').value=e;
		}
	});
}
function cargainfor(e){
	//var inf=document.getElementById('formWindow');
	$.ajax({
		url:'menu/devMarke.php?v_b='+e,
		success: function(e){
			displayWindow(700,500);
			$("#window").html(e);
		}
	});
}

function detecta(){
	alertify.alert('utiliza la flecha abajo del recuadro para poner la fecha actual');
	document.getElementById('feIni_soc').value='';
}
function detecta1(){
	alertify.alert('utiliza la flecha abajo del recuadro para poner la fecha actual');
	document.getElementById('feIni_prt').value='';
}
function comprueba(){
	var x=document.getElementById('obg').value;
	var y=document.getElementById('obe').value;
	
	if(x=="" && y==""){
		alertify.error('completa los campos vacios para continuar');
	}
	else{
		displayWindow(1300,1100);
		loadScreen('reprimero/rePrimero.php','window');
	}
}
function compruebaP(){
	var w=document.getElementById('objetivo_servico').value;
	
	if(w==""){
		alertify.error('completa los campos vacios para continuar');
	}
	else{
		displayWindow(1300,1100);
		loadScreen('reprivada/rePrivada.php','window');
	}
}
function compruebaG(){
	var w=document.getElementById('objetivo_servico').value;
	
	if(w==""){
		alertify.error('completa los campos vacios para continuar');
	}
	else{
		displayWindow(1300,1100);
		loadScreen('regobierno/reGobierno.php','window');
	}
}
function carga(){
	$(document).ready(function(){
	// Obtener estados
	$.ajax({
		type: "POST",
		url: "process/procesar-estados.php",
		data: { estados : "Mexico" } 
		}).done(function(data){
		$("#edo_soc").html(data);
	});
	// Obtener municipios
	$("#edo_soc").change(function(){
		var estado = $("#edo_soc option:selected").val();
			$.ajax({
			type: "POST",
			url: "process/procesar-estados.php",
			data: { municipios : estado } 
			}).done(function(data){
			$("#mun_soc").html(data);
			});
	});
	});
}
function carga1(){
	$(document).ready(function(){
	// Obtener estados
	$.ajax({
		type: "POST",
		url: "process/procesar-estados.php",
		data: { estados : "Mexico" } 
		}).done(function(data){
		$("#edo_prt").html(data);
	});
	// Obtener municipios
	$("#edo_prt").change(function(){
		var estado = $("#edo_prt option:selected").val();
			$.ajax({
			type: "POST",
			url: "process/procesar-estados.php",
			data: { municipios : estado } 
			}).done(function(data){
			$("#mun_prt").html(data);
			});
	});
	});
}
function blockButton(btn){
	$('#'+btn).each(function (){
    	this.style.pointerEvents = 'none'; 
	});
}

function activeButton(btn){
	$('#'+btn).each(function (){
    	this.style.pointerEvents = 'auto'; 
	});
}
function getDataForm(frm){
	var datos=$('#'+frm).serialize();
	if($('#mat').val()!="" && $('#res').val()!=""){
		$.ajax({
			type:'POST',
			url:'acceso/recovery.php',
			data: datos,
			success: function(result){
				var res=result.split("|");
				if(res[0]==1){
					closeWindow();
					alertify.alert('Guardala bien, tu contraseña es: '+res[1]);
					$('#txt_pswd').val(res[1]);
					alertify.success('Sea ah colocado tu contaseña en el campo correspondiente continua...');
				}
				else{
					alertify.error("La información proporcionada no es la correcta, verifícala e intenta de nuevo");
				}
			}
		});
	}
	else{
		alertify.error("Campos obligatorios vacios verifícalos y continua...");
	}		
}
