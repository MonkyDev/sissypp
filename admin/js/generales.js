// JavaScript Document

//Funciones de pantalla
function launchFullScreen(element)
{
	if(element.requestFullScreen){
		element.requestFullScreen();
	}else if(element.mozRequestFullScreen){
		element.mozRequestFullScreen();
	}else if(element.webkitRequestFullScreen){
		element.webkitRequestFullScreen();
	}
	document.getElementById('cuerpo').style.height='630px';
	document.getElementById('contMenu').style.height='100%';
	document.getElementById('main').style.height='100%';
	alertify.success("Por favor presiona el icono de 'Pantalla normal' si deseas regresar al tamaño anterior");
}

function cancelFullscreen()
{
	if(document.cancelFullScreen){
		document.cancelFullScreen();
	}else if(document.mozCancelFullScreen){
		document.mozCancelFullScreen();
	}else if(document.webkitCancelFullScreen){
		document.webkitCancelFullScreen();
	}
	document.getElementById('cuerpo').style.height='540px';
	document.getElementById('contMenu').style.height='100%';
	document.getElementById('main').style.height='100%';
}

function loadScreen(file,content)
{
	$('#'+content).html("<div style='text-align: center'><br><h1 style='color:#999; font-family:Arial, Helvetica, sans-serif; font-size:16px;'>Trabajando... Espere por favor</h1><img src='images/loading.gif' width='200' height='30'><div>");
	
	$.ajax({
		url:file,
		success: function(e){
			$('#'+content).html(e);
		}
	});
}

function closeScreen(content)
{
	$('#'+content).html("");
}

function loadWindow(w,h)
{
	var altura=h/2;
	var ancho=w/2;
	document.getElementById('fondo').style.display="block";
	document.getElementById("window").style.display="block";
	document.getElementById("window").style.width=w+"px";
	document.getElementById("window").style.height=h+"px";
	document.getElementById("window").style.marginTop="-"+altura+"px";
	document.getElementById("window").style.marginLeft="-"+ancho+"px";
}

function closeWindow()
{
	document.getElementById('fondo').style.display="none";
	document.getElementById("window").style.display="none";
}

function loadTable(table)
{
	 $('#'+table).dataTable({
        "sPaginationType": "full_numbers"
    });
}

function getDataForm(frm)
{
	var datos=$("#" + frm).serialize();
	var cadena = datos.replace(/&/g,"|");
	return(cadena);
}

function ltrim(str, filter){
  filter || ( filter = '\\s|\\&nbsp;' );
  var pattern = new RegExp('^(' + filter + ')*', 'g');
  return str.replace(pattern, "");
}
function rtrim(str, filter){
  filter || ( filter = '\\s|\\&nbsp;' );
  var pattern = new RegExp('(' + filter + ')*$', 'g');
  return str.replace(pattern, "");
}
function trim(str, filter){
  filter || ( filter = '\\s|\\&nbsp;' );
  return ltrim(rtrim(str, filter), filter);
}

function addToSenPlan()
{
	var carr=document.getElementById('idcarreras').value;
	var plan=document.getElementById('txt_plan').value;
	var rvoe=document.getElementById('rvoe').value;
	var vige=document.getElementById('vigencia').value;
	$.ajax({
		url:"carreras/accCarreras.php",
		type:"POST",
		data:"v_acc=4&v_carr=" + carr+ "&v_plan=" + plan + "&v_rvoe=" + rvoe + "&v_vige=" + vige,
		success: function(e){
			if(e=='1')
			{
				document.getElementById('rvoe').value="";
				document.getElementById('vigencia').value="";
				addTablePlanxCarr();
			}
		}
	})
}

function closeVarSes(vs)
{
	$.ajax({
		url:'generales/unsetses.php',
		type:'POST',
		data:'v_ses=' + vs,
	})
}

function addTablePlanxCarr(){
	$.ajax({
		url:"carreras/drawTable.php",
		success: function(m){
			document.getElementById('tabla_planxcarr').innerHTML=m;
		}
	})
}

function loadSelect(tbl,idSearch,content,fieldcomp)
{
	
}

function loadPlanes(){
	var idcarr=document.getElementById('carr').value;
	$.ajax({
		url:'grupos/accGrupos.php',
		type:'POST',
		data:'v_acc=4&v_id=' + idcarr,
		success: function(e){
			document.getElementById('pEscolar').innerHTML=e;
		}
	})
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

function cargaPlanes(){
	//alert(document.getElementById('carrera').value);
	$.ajax({
		url:'alumnos/accAlumnos.php',
		type:'POST',
		data:'v_acc=7&v_id=' + document.getElementById('carrera').value,
		success: function(e){
			document.getElementById('grupo').innerHTML=e;
		}
	})
}

function calculaedad(fecha,content){
	var f = new Date();
	var d=fecha.split('-');
	var edad=f.getFullYear()-d[0];
	var mactual=f.getMonth()+1;
	if(mactual<d[1])
		edad--;
	if(mactual==d[1])
		if(f.getDate()<d[2])
			edad--;
	document.getElementById(content).value=edad;
}