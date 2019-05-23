function loadScreen(cont,file,w,h)
{
	$('#'+cont).html("<div style='text-align: center; margin-top:20px;'><img src='image/loading.gif' width='40' height='40'><br><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>Trabajando... Espere por favor</h3><div>");
	$.ajax({
		url:file,
		success: function(msj){
			$('#'+cont).html(msj);
			$('#cont_gral').width(w);
			$('#cont_gral').height(h);
			/*$('#formulario').height(h-60);*/
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			console.log(arguments);
			var error;
			if(XMLHttpRequest.status === 404) error = 'Pagina no existe ' + XMLHttpRequest.status;
			if(XMLHttpRequest.status === 500) error = 'Error de servidor ' + XMLHttpRequest.status;
			$('#'+cont).html("<div style='text-align: center'><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>"+error+"</h3></div>");
		}
	})
}

function loadForm(cont,file,w,h)
{
	$('#'+cont).html("<div style='text-align: center; margin-top:20px;'><img src='image/loading.gif' width='40' height='40'><br><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>Trabajando... Espere por favor</h3><div>");
	$.ajax({
		url:file,
		success: function(msj){
			$('#'+cont).html(msj);
			$('#'+cont).width(w);
			$('#'+cont).height(h);
			$('#formulario').height(h-80);
			$('#formulario').width(w-20); 
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			console.log(arguments);
			var error;
			if(XMLHttpRequest.status === 404) error = 'Pagina no existe ' + XMLHttpRequest.status;
			if(XMLHttpRequest.status === 500) error = 'Error de servidor ' + XMLHttpRequest.status;
			$('#'+cont).html("<div style='text-align: center'><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>"+error+"</h3></div>");
		}
	})
}

function loadScreenUpd(cont,file,id)
{
	$.ajax({
		type:"POST",
		url:file,
		data:"v_id="+id,
		success: function(msj){
			$('#'+cont).html(msj);
		}
	})
}

function closeWindow(){
	document.getElementById('contenido').innerHTML="";
		
}

function cierra(obj){
	document.getElementById(obj).style.display='none';
	document.getElementById('fondo').style.display='none';
}

/*function overlay(objeto){
	el = document.getElementById(objeto);
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}*/

function display(objeto){
	document.getElementById(objeto).style.display='block';
	document.getElementById('fondo').style.display='block';
	$('.box_skitter_large').skitter
	(
			 $(this).stop()
	);			 
}

function validateEnter(e){
	var key=e.keyCode || e.which;
	if (key==13){
		return true;
	}
	else{
		return false;
	}
}

function viewReport(file,title)
{
	window.open(file,title,"width=1000, height=700, scrollbars=yes");
}

function viewReportFechas(file,title)
{
	var fini=document.getElementById('txt_fechaIni').value;
	var ffin=document.getElementById('txt_fechaFin').value;
	file=file+"?fini="+fini+"&ffin="+ffin;
	window.open(file,title,"width=1000, height=700, scrollbars=yes");
}

function executeBackUp()
{
	if(confirm("Desea realizar el respaldo de la base de datos?"))
	{
		$.ajax({
			url:'herramientas/execBackUp.php',
			success:function(msj){
				alert(msj);
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				  console.log(arguments);
				  var error;
			  }
		})
	}
}


function enviaEmail(){
	var nombre=document.getElementById('txt_nombre').value;
	var email=document.getElementById('txt_email').value;
	var telefono=document.getElementById('txt_telefono').value;
	var tema=document.getElementById('txt_tema').value;
	var coment=document.getElementById('txt_coment').value;
	if(nombre=="" || email=="" || telefono=="" || tema=="" || coment=="")
	{
		alertify.error("Todos los campos son requeridos.\n Por favor verifique, gracias.");
		document.getElementById('txt_nombre').focus();
		return(0);
	}
	if(!isValidEmail(email))
	{
		alertify.error("El correo es inv\u00e1lido");
		document.getElementById('txt_email').focus();
		return(0);
	}
	var datos="v_nom="+nombre+"&v_ema="+email+"&v_tel="+telefono+"&v_tem="+tema+"&v_com="+coment;
	$('#contenido').html("<div style='text-align: center; margin-top:20px;'><img src='image/loading.gif' width='40' height='40'><br><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>Enviando correo... por favor espere, gracias.</h3><div>");
	
	$.ajax({
		type:"POST",
		url:"sendEmail.php",
		data:datos,
		success: function(msj){
			loadScreen('contenido','contacta.php','978px','778px');
			alertify.success("Gracias por el mensaje, en breve te responderemos");
		}
	})
}

function getDataForm(frm)
{
	var datos=$("#" + frm).serialize();
	var datos1=datos.replace("&","|");
	return(datos1);
}

function validateTecla(e){
	var key=e.keyCode || e.which;
	switch(key)
	{
		case 13:
			return('enter');
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
	}
}

function enviaCotiza()
{
	var cEmp=document.getElementById('txt_cotEmpresa').value;
	var cRFC=document.getElementById('txt_cotRFC').value;
	var cDir=document.getElementById('txt_cotDireccion').value;
	var cNom=document.getElementById('txt_cotNombre').value;
	var cEma=document.getElementById('txt_cotEmail').value;
	var cTel=document.getElementById('txt_cotTelefono').value;
	var cPro=document.getElementById('txt_coment').value;
	if(cEmp=="" || cRFC=="" || cDir=="" || cNom=="" || cEma=="" || cTel=="" || cPro=="")
	{
		alertify.error("Todos los campos son requeridos.\n Por favor verifique, gracias.");
		document.getElementById('txt_cotEmpresa').focus();
		return(0);
	}
	if(!isValidEmail(cEma))
	{
		alertify.error("El correo es inv\u00e1lido");
		document.getElementById('txt_cotEmail').focus();
		return(0);
	}
	var datos="v_emp="+cEmp+"&v_rfc="+cRFC+"&v_dir="+cDir+"&v_nom="+cNom+"&v_ema="+cEma+"&v_tel="+cTel+"&v_pro="+cPro;
	$('#contenido').html("<div style='text-align: center; margin-top:20px;'><img src='image/loading.gif' width='40' height='40'><br><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>Enviando cotizaciÃ³n... por favor espere, gracias.</h3><div>");
	
	$.ajax({
		type:"POST",
		url:"cotizaciones/send_cotiza.php",
		data:datos,
		success: function(msj){
			loadScreen('contenido','cotizaciones/mnu_cotizacion.php','978px','778px');
			alertify.success("Gracias por solicitar una cotizaciÃ³n, en breve te responderemos");
		}
	})
}

//VISUALIZACION DE FOTO
function cargaFoto(donde,imgName){
	imgName=putOffPath(imgName);
	datos=generaForm();
	$('#contImgLogos').html("<div style='text-align: center; margin-top:10px;'><img src='../image/loading.gif' width='30' height='30'><br><h3 style='font-family:Arial, Helvetica, sans-serif; color:#999;'>Subiendo imagen... Espere por favor</h3><div>");
	setTimeout(function(){
		$.ajax({
			url:'generales/cargaFoto.php',
			type:'POST',
			contentType:false,
			data:datos,
			processData:false,
			cache:false,
		})
		.done(function(msj){
			d = new Date();
			var imagen='../uploadedImg/'+imgName;
			alert(imagen);
			$('#contImgLogos').html('<img src="" id="contImgLogo" width="600" height="90" />');
			$("#"+donde).attr('src',imagen);
			$('#nomLogo').attr('value',imgName);
			//console.log('admContenidos/uploadedImg/'+imgName);
		});
	})
}

function generaForm(){
	var formulario=new FormData();
	var imagenes=document.getElementById('imgLogo');
	var imagen=imagenes.files;
	for(i=0;i<imagen.length;i++){
		formulario.append('foto',imagen[i]);
	}
	return formulario;
}

function putOffPath(src){
	var ph=src.match(/\\([^\\]+)$/)[1];
	return(ph);
}

function moveImg(path,destino){
	$.ajax({
		url:'../moveImg.php',
		type:'POST',
		data:'v_path='+path+'&v_destino='+destino,
		success: function(msj){
			alert(msj)
		}
	})
}

function isValidEmail(mail)
{
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
}

function isValidRFC(rfc)
{
	return /^[a-zA-Z]{3,4}(\d{6})((\D|\d){3})?$/.test(rfc);
}