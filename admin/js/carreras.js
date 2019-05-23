function accCarreras(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvaCarrera');
			$.ajax({
				url:'carreras/accCarreras.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('carreras/mnu_carreras.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updCarrera');
			$.ajax({
				url:'carreras/accCarreras.php',
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('carreras/mnu_carreras.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			if(!confirm("Desea eliminar el registro?"))
				exit(0);
			$.ajax({
				url:'carreras/accCarreras.php',
				type:'POST',
				data:"v_acc=3&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('carreras/mnu_carreras.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 4:
			if(!confirm("Desea quitar el plan escolar?"))
				exit(0);
			$.ajax({
				url:'carreras/accCarreras.php',
				type:'POST',
				data:'v_acc=5&v_id='+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						$.ajax({
							url:"carreras/drawTable.php",
							success: function(m){
								document.getElementById('tabla_planxcarr').innerHTML=m;
							}
						})
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}





function accTurnos(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvoTurno');
			$.ajax({
				url:'turnos/accTurnos.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('turnos/mnu_Turnos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updTurno');
			$.ajax({
				url:'turnos/accTurnos.php',	
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('turnos/mnu_Turnos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			if(!confirm("Desea eliminar el registro?"))
				exit(0);
			$.ajax({
				url:'turnos/accTurnos.php',
				type:'POST',
				data:"v_acc=3&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('turnos/mnu_Turnos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}





function accProgramas(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvoPrograma');
			$.ajax({
				url:'programas/accProgramas.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('programas/mnu_programa.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updPrograma');
			$.ajax({
				url:'programas/accProgramas.php',
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('programas/mnu_programa.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			if(!confirm("Desea eliminar el registro?"))
				exit(0);
			$.ajax({
				url:'programas/accProgramas.php',
				type:'POST',
				data:"v_acc=3&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('programas/mnu_programa.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}





function accEmpresas(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvaEmpresa');
			$.ajax({
				url:'empresas/accEmpresas.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('empresas/mnu_empresas.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updEmpresa');
			$.ajax({
				url:'empresas/accEmpresas.php',
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('empresas/mnu_empresas.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			if(!confirm("Desea eliminar el registro?"))
				exit(0);
			$.ajax({
				url:'empresas/accEmpresas.php',
				type:'POST',
				data:"v_acc=3&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('empresas/mnu_empresas.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}



function accPlanEscolar(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvoPlanEscolar');
			$.ajax({
				url:'planescolar/accPlanEscolar.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('planescolar/mnu_planEscolar.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updPlanEscolar');
			$.ajax({
				url:'planescolar/accPlanEscolar.php',
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('planescolar/mnu_planEscolar.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			if(!confirm("Desea eliminar el registro?"))
				exit(0);
			$.ajax({
				url:'planescolar/accPlanEscolar.php',
				type:'POST',
				data:"v_acc=3&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('planescolar/mnu_planEscolar.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}





//ACCIONES PARA GRUPOS
function accGrupos(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvoGrupo');
			$.ajax({
				url:'grupos/accGrupos.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('grupos/mnu_grupos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updGrupo');
			$.ajax({
				url:'grupos/accGrupos.php',
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('grupos/mnu_grupos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			if(!confirm("Desea eliminar el registro?"))
				exit(0);
			$.ajax({
				url:'grupos/accGrupos.php',
				type:'POST',
				data:"v_acc=3&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('grupos/mnu_grupos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}




//ACCIONES PARA AGREGAR ALUMNOS A LOS GRUPOS
function accAlumGrupos(acc,id){
	switch(acc)
	{
		case 1:
			if(document.getElementById('txt_codGrupo').value=="")
			{
				alert("Falta código del grupo");
				document.getElementById('txt_codGrupo').focus();
				exit(0);
			}
			var noGrupo=document.getElementById('noGrupo').value;
			var idCarrera=document.getElementById('idCarrera').value;
			$.ajax({
				url:'alumgrupo/accAlumGrupo.php',
				type:'POST',
				data:'v_acc=1&v_grupo='+noGrupo+'&v_carrera='+idCarrera,
				success: function(e){
					var d=e.split('|');
						loadScreen('alumgrupo/mnu_alumGrupo.php','main');
						alert(d[1]);
				}
			})
		break;
		case 4://eliminar de la lista
			if(!confirm("Desea quitar al alumno del grupo?"))
				exit(0);
			$.ajax({
				url:'alumgrupo/accAlumGrupo.php',
				type:'POST',
				data:'v_acc=3&v_id=' + id,
				success: function(e){
					loadScreen('alumgrupo/drawLista.php','tabla_alumxgrupo');
				}
			})
		break;
		case 5:
			if(document.getElementById('matricula').value=="" || document.getElementById('apaterno').value=="" || document.getElementById('amaterno').value=="" || document.getElementById('nombre').value=="")
			{
				alert(document.getElementById('matricula').value + document.getElementById('apaterno').value + document.getElementById('amaterno').value + document.getElementById('nombre').value);
				alert("Faltan datos del alumno");
				document.getElementById('matricula').focus();
				exit(0);
			}
			var matr=document.getElementById('matricula').value;
			var dato=document.getElementById('apaterno').value + "|" + document.getElementById('amaterno').value + "|" + document.getElementById('nombre').value;
			$.ajax({
				url:'alumgrupo/accAlumGrupo.php',
				type:'POST',
				data:'v_acc=5&v_id=' + matr + "&v_datos=" + dato,
				success: function(e){
					loadScreen('alumgrupo/drawLista.php','tabla_alumxgrupo');
					document.getElementById('matricula').value="";
					document.getElementById('apaterno').value ="";
					document.getElementById('amaterno').value ="";
					document.getElementById('nombre').value = "";
					document.getElementById('matricula').focus();
				}
			})
		break;
		case 6://buscamos el grupo con enter
			$.ajax({
				url:'alumgrupo/accAlumGrupo.php',
				type:'POST',
				data:'v_acc=4&v_id=' + id,
				success: function(e){
					d=e.split('|');
					if(d[0]==1)
					{
						var idcar=d[4].split('-');
						document.getElementById('txt_codGrupo').value=id;
						document.getElementById('noGrupo').value=d[1];
						document.getElementById('idCarrera').value=idcar[0];
						document.getElementById('txt_gradogrupo').value=d[2];
						document.getElementById('txt_carrera').value=d[4];
						document.getElementById('txt_turno').value=d[3];
						document.getElementById('txt_pescolar').value=d[5];
					}
					else
					{
						document.getElementById('txt_gradogrupo').value="";
						document.getElementById('txt_carrera').value="";
						document.getElementById('txt_turno').value="";
						document.getElementById('txt_pescolar').value="";
						alert(d[1]);
					}
				}
			})
		break;
	}
}


//ALUMNOS
function accAlumnos(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_nvoAlumno');
			$.ajax({
				url:'alumnos/accAlumnos.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('alumnos/mnu_Alumnos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_updAlumno');
			$.ajax({
				url:'alumnos/accAlumnos.php',
				type:'POST',
				data:"v_acc=2&v_dat="+datos+"&v_id="+id,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('alumnos/mnu_Alumnos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3:
			var vals=id.split('|');
			var ctrl=vals[0];
			var edo=vals[1];
			var estado;
			switch(edo){
				case '0':
					estado='Baja Definitiva';
				break;
				case '2':
					estado='Egresado';
				break;
				case '3':
					estado='Baja Temporal';
				break;
			}
			if(!confirm("Desea marcar al alumno como " + estado + "?"))
				exit(0);
			$.ajax({
				url:'alumnos/accAlumnos.php',
				type:'POST',
				data:"v_acc=3&v_id="+ctrl+"&v_edo="+edo,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						closeWindow();
						loadScreen('alumnos/mnu_Alumnos.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}


function accConfGrales(acc,id){
	switch(acc)
	{
		case 1:
			var datos=getDataForm('frm_confGenerales');
			$.ajax({
				url:'configuraciones/accConfGrales.php',
				type:'POST',
				data:'v_acc=1&v_dat='+datos,
				success: function(e){
					var d=e.split('|');
					if(d[0]=='1')
					{
						//closeWindow();
						loadScreen('configuraciones/mnu_generales.php','main');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}



/*ACCIONES PARA MOVER LOS ALUMNOS DE GRUPO*/
function accMoveAlumnos(acc,id){
	switch(acc)
	{
		case 1:
			if(document.getElementById('txtCodFrom').value=="")
			{
				alert("No ha escrito codigo del grupo a mover");
				document.getElementById('txtCodFrom').focus();
			}
			if(document.getElementById('txtCodTo').value=="")
			{
				alert("No ha escrito codigo del grupo al que se va a mover");
				document.getElementById('txtCodTo').focus();
			}
			
			var from=document.getElementById('infoDe').value.split('-');
			var para=document.getElementById('infoPara').value.split('-');
			if(from[1]==0){
				alert("El grupo a mover esta vacío");
				document.getElementById('txtCodFrom').focus();
			}
			if(confirm("Desea mover a los alumnos de grupo??"))
			if(para[1]>0){
				if(!confirm("El grupo al que se va mover tiene alumnos\nDesea mover los alumnos?"))
					exit(0);
			}
			$.ajax({
				url:'moveAlumnos/accMoveAlumnos.php',
				type:'POST',
				data:'v_acc=1&v_de='+from[0]+'&v_para='+para[0],
				success: function(e){
					alert(e);
					document.getElementById('lst_from').innerHTML='<div style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#999; text-align:center; width:100%;">-- 0 Alumnos en el grupo --</div><div style="text-align:center; width:100%; margin-top:50px; font-family:Arial, Helvetica, sans-serif;"><font color="#666666" size="+2">Grupo vacío</font></div>';
					//accMoveAlumnos(6,document.getElementById('txtCodFrom').value+'|lst_from|txtCodFrom|infoDe');
					accMoveAlumnos(6,document.getElementById('txtCodTo').value+'|lst_to|txtCodTo|infoPara');
					
				}
			})
		break;
		case 2:
		break;
		case 3:
		break;
		case 4://eliminar de la lista
			
		break;
		case 5:
			if(document.getElementById('matricula').value=="" || document.getElementById('apaterno').value=="" || document.getElementById('amaterno').value=="" || document.getElementById('nombre').value=="")
			{
				alert(document.getElementById('matricula').value + document.getElementById('apaterno').value + document.getElementById('amaterno').value + document.getElementById('nombre').value);
				alert("Faltan datos del alumno");
				document.getElementById('matricula').focus();
				exit(0);
			}
			var matr=document.getElementById('matricula').value;
			var dato=document.getElementById('apaterno').value + "|" + document.getElementById('amaterno').value + "|" + document.getElementById('nombre').value;
			$.ajax({
				url:'alumgrupo/accAlumGrupo.php',
				type:'POST',
				data:'v_acc=5&v_id=' + matr + "&v_datos=" + dato,
				success: function(e){
					loadScreen('alumgrupo/drawLista.php','tabla_alumxgrupo');
					document.getElementById('matricula').value="";
					document.getElementById('apaterno').value ="";
					document.getElementById('amaterno').value ="";
					document.getElementById('nombre').value = "";
					document.getElementById('matricula').focus();
				}
			})
		break;
		case 6://buscamos el grupo con enter
			s=id.split('|');
			$.ajax({
				url:'moveAlumnos/accMoveAlumnos.php',
				type:'POST',
				data:'v_acc=4&v_id=' + s[0],
				success: function(e){
					d=e.split('|');
					if(d[0]==1)
					{
						$.ajax({
							url:'moveAlumnos/accMoveAlumnos.php',
							type:'POST',
							data:'v_acc=5&v_id='+d[1],
							success: function(e){
								var j=e.split('|');
								document.getElementById(s[3]).value=j[0];
								document.getElementById(s[1]).innerHTML=j[1];
								document.getElementById(s[2]).value=s[0];
							}
						})
					}
					else
						alert(d[1]);
				}
			})
		break;
	}
}






//acciones para generar solicitud de servicio social
function accGenServicio(acc,id){
	switch(acc)
	{
		case 1://Guarda la solicitud del servicio social
			var datos=getDataForm('frm_genSolicitud');
			$.ajax({
				url:'genServSocial/accGenServSocial.php',
				type:'POST',
				data:'v_acc=1&v_data='+datos,
				success: function(e){
					d=e.split('|');
					if(d[0]==1)
					{
						if(confirm(d[1]))
						{
							var pagina="reports/rpt_solSocial.php?id=" + d[2];
							document.getElementById('main').innerHTML='<iframe style="width:100%; height:100%;" src="' + pagina + '"></iframe>';
						}
						else
						{
							loadScreen('genServSocial/mnu_tblServicios.php','main');
						}
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 2:
			var datos=getDataForm('frm_genSolicitud');
			$.ajax({
				url:'genServSocial/accGenServSocial.php',
				type:'POST',
				data:'v_acc=2&v_data='+datos+'&v_id='+id,
				success: function(e){
					d=e.split('|');
					if(d[0]==1)
					{
						if(confirm(d[1]))
						{
							var pagina="reports/rpt_solSocial.php?id=" + d[2];
							document.getElementById('main').innerHTML='<iframe style="width:100%; height:100%;" src="' + pagina + '"></iframe>';
						}
						else
						{
							loadScreen('genServSocial/mnu_tblServicios.php','main');
						}
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
		case 3://cancelar servicio
			if(document.getElementById('motivo').value=="")
			{
				alert("Ingrese un motivo de cancelacion");
				return(0);
			}
			var datos=getDataForm('frmCancelaServicio');
			$.ajax({
				url:'genServSocial/accGenServSocial.php',
				type:'POST',
				data:'v_acc=3&v_data='+datos+'&v_id='+id,
				success: function(e){
					var d=e.split("|");
					alert(d[1]);
					closeWindow();
					loadScreen('genServSocial/mnu_tblServicios.php','main');
				}
			})
		break;
		case 4://Genera oficio de asignacion/liberación de la solicitud, cambia el estado de solicitud
			alert(id);
			typ=id.split('|')
			if(typ[1]==2)
				var rpt="Asignación";
			else if(typ[1]==1)
				var rpt="Liberación";
			if(!confirm("Al generar el reporte cambiara el estado de la solicitud\nDesea generar el reporte?"))
				exit(0);
			$.ajax({
				url:'genServSocial/accGenServSocial.php',
				type:'POST',
				data:'v_acc=6&v_id='+id,
				success: function(e){
					if(e=='1')
					{
						verReporte('reports/rpt_asignacion.php?v_id='+id);
					}
					else
						alert("No se pudo generar el reporte");
				}
			});
		break;
		case 5:
			
		break;
		case 6://buscamos el grupo con enter
			$.ajax({
				url:'genServSocial/accGenServSocial.php',
				type:'POST',
				data:'v_acc=4&v_id=' + id,
				success: function(e){
					d=e.split('|');
					if(d[0]==1)
					{
						document.getElementById('txt_nombre').value=d[2];
						document.getElementById('txt_domicilio').value=d[3];
						document.getElementById('txt_telefono').value=d[4];
						document.getElementById('txt_sexo').value=d[5];
						document.getElementById('txt_especialidad').value=d[7];
						document.getElementById('txt_turno').value=d[9];
						document.getElementById('txt_semestre').value=d[10];
						document.getElementById('txt_plan').value=d[6];
						calculaedad(d[11],'edadIni');
					}
					else
					{
						alert(d[1]);
					}
				}
			})
		break;
	}
}

function generaPeriodo(fecha,plan)
{
	/*var nav = navigator.userAgent.toLowerCase();
	if(nav.indexOf("chrome") != -1)
		alert("Chido Chrome");
	else
		alert("Chafa no es Chrome");*/
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
	return(period);
}

function verReporte(pagina)
{
	document.getElementById('main').innerHTML='<iframe style="width:100%; height:100%;" src="' + pagina + '"></iframe>';
}