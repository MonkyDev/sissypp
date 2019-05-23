function accRegister(acc,id)
	{
	switch(acc)
		{
		case 1://GUARDAR DATO CON PHP
			var dom=document.getElementById('dom').value;
			var gpo=document.getElementById('gpo').value;
			var sex=document.getElementById('sex').value;
			var nac=document.getElementById('nac').value;
			var edd=document.getElementById('edd').value;
			var tel=document.getElementById('tel').value;
			var cor=document.getElementById('cor').value;
			var psw=document.getElementById('psw').value;	
				
var datos="v_acc=1&v_mat=" + mat + "&v_nom=" + nom + "&v_Apa=" + Apa + "&v_Ama=" + Ama + "&v_car=" + car + "&v_nkt=" + nkt + "&v_psw=" + psw;
			$.ajax
				({
				 url:'transfdatos/accRegister.php',
				 type:'POST',
				 data:datos,
				 success:function(e)
				 	{
					closeWindow();
				 	}
				})
		break;
		
		case 2:
			if($('#matricula').val() != ''){
				$.ajax({
					type:'POST',
					url:'acceso/existeAlumno.php',
					data:'mat='+id,
					success: function(e){
						if(e==1){
							$.ajax({
								url:'registro/tbl_register.php?txt_mat=' + id,
								success: function(e){		
									$('#marco').html(e);		
							  	}
							});
						}
						else{
							
							$('#marco').html('<div style="margin-top:30%;padding:2px;text-align:center;height:15px;width:auto;">No estas dado de alta, por favor pasa al departamento Asuntos Estudiantiles</div>');
						}
					}
				})
			}
			else{
				$('#marco').html('');
				alertify.error('Campo vacio ingrese matricula');
			}
		break;
		
		case 3://COMPROBAR DATOS DEL FORMULARIO Y ACTUALIZAR DATO CON PHP
			$(function() { 
				//emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
				var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/ ;	
				$("#sent").click(function(){  
					$(".fail").fadeOut().remove();
					
					if ($("#dom").val() == "") {  
						$("#dom").focus().after('<span class="fail">Ingrese su domicilio</span>');  
						return false;  
					} 
					if ($("#tel").val() == "") {  
						$("#tel").focus().after('<span class="fail">Ingrese un tel&eacute;fono correcto</span>');  
						return false;  
					}
					if ($("#cor").val() == "" || !emailreg.test($("#cor").val())) {
						$("#cor").focus().after('<span class="fail">Ingrese un email correcto</span>');  
						return false;  
					}   
					
				});  
				$("#dom, #tel, #psw, #cor").bind('blur keyup', function(){  
					if ($(this).val() != "") {  			
						$('.fail').fadeOut();
						return false;  
					}  
				});	
				$("#cor").bind('blur keyup', function(){  
					if ($("#cor").val() != "" && emailreg.test($("#cor").val())) {	
						$('.fail').fadeOut();  
						return false;  
					}  
				});
			});
			
			var dom=document.getElementById('dom').value;
			var sex=document.getElementById('sex').value;
			var nac=document.getElementById('nac').value;
			var edd=document.getElementById('edd').value;
			var tel=document.getElementById('tel').value;
			var cor=document.getElementById('cor').value;
			var psw=document.getElementById('psw').value;
			var pre=document.getElementById('question').value;
			var res=document.getElementById('answer').value;
			
		if(dom != "" && tel != "" && cor != "" && psw != "" && res !=""){
var datos="v_acc=2&v_dom="+dom+"&v_sex="+sex+"&v_nac="+nac+"&v_edd="+edd+"&v_tel="+tel+"&v_cor="+cor+"&v_psw="+psw +"&v_id="+id+"&pre="+pre+"&res="+res;
				$.ajax
				({
				 url:'transfdatos/accRegister.php',
				 type:'POST',
				 data:datos,
				 success:function(e)
				 	{
					closeWindow();
				 	}
				})
			}
				else{
				alertify.alert("Tienes campos vacios, por favor complementalos");	 
				}
					break;
		} 
	}

function accFormulario(acc,id)
	{
	switch(acc)
		{
			case 1:
				var num_cnt=document.getElementById('s_soc').value;
				var fec_sol=document.getElementById('fec_soc').value;
				var ini_soc=document.getElementById('feIni_soc').value;
				var fin_soc=document.getElementById('feFin_soc').value;
				var hor_soc="DE: "+document.getElementById('horEn_soc').value + " A: "+document.getElementById('horSa_soc').value;
				var pro_asg=document.getElementById('progr_asg').value;
				var tip_emp=document.getElementById('tipo_emp').value;
				var nmb_emp=document.getElementById('emp_soc').value;
				var gir_emp=document.getElementById('gir_soc').value;
				var dir_emp=document.getElementById('dir_soc').value;
				var tel_emp=document.getElementById('tel_soc').value;
				var prs_emp=document.getElementById('psn_soc').value;
				var crg_prs=document.getElementById('crg_soc').value;
				var edo_emp=document.getElementById('edo_soc').value;
				var mun_emp=document.getElementById('mun_soc').value;
				var mat_aln=document.getElementById('con_aln').value;
				var edd_aln=document.getElementById('age_aln').value;
				var per_aln=document.getElementById('sem_aln').value;
				
if(nmb_emp !="" && gir_emp !="" && tel_emp !="" && dir_emp !="" && prs_emp!="" && crg_prs !="" && edo_emp !="" && mun_emp !="")
		{
		var datos="v_acc=1&v_const=" + num_cnt + "&v_fecha=" + fec_sol + "&v_inici=" + ini_soc + 															"&v_final=" + fin_soc + "&v_horar=" + hor_soc + "&v_pgAsg=" + pro_asg + "&v_tpEmp=" + tip_emp + "&v_nmEmp=" + nmb_emp + "&v_giEmp=" + gir_emp + "&v_diEmp=" + dir_emp + "&v_tlEmp=" + tel_emp + "&v_psEmp=" + prs_emp + "&v_cgEmp=" + crg_prs + "&v_edEmp=" + edo_emp + "&v_muEmp=" + mun_emp + "&v_matAl=" + mat_aln + "&v_eddAl=" + edd_aln + "&v_semAl=" + per_aln;
			$.ajax
				({
				 url:'transfdatos/accAlumno.php',
				 type:'POST',
				 data:datos,
				 success:function(e)
				 	{
					closeScreen();
					$('html, body').animate({scrollTop:300}, 'slow');
					//$("#main").html('<div class="exito"><img src="images/checkmark.gif"/></div>');
					viewReport('reportes/rpt_social.php?id='+e);
				 	}
				})
			}
			else{
				alertify.alert("Tienes campos vacios, por favor complementalos");
				activeButton('sent');	 
			}
			break;
			
			case 2:
				var rpt_uno=document.getElementById('rpt').value;
				var fch_uno=document.getElementById('fch').value;
				var obg_uno=document.getElementById('obg').value;
				var obe_uno=document.getElementById('obe').value;
				var tip_uno=document.getElementById('tip').value;
				var dpt_uno=document.getElementById('dpt').value;
				var per_uno=document.getElementById('per').value;
				var pir_uno=document.getElementById('pir').value;
				var fol_uno=document.getElementById('fol').value;
				var mat=document.getElementById('mat').value;
				
				if(rpt_uno !="" && obg_uno !="" && obe_uno !="")
				{
				var datos="v_acc=2&v_rpt="+ rpt_uno + "&v_fch="+ fch_uno + "&v_obg="+ obg_uno + "&v_obe="+ obe_uno + 
				"&v_tip="+ tip_uno + "&v_dpt="+ dpt_uno + "&v_per="+ per_uno + "&v_pir="+ pir_uno + "&v_fol="+ fol_uno;
					$.ajax
						({
						 url:'transfdatos/accAlumno.php',
						 type:'POST',
						 data:datos,
						 success:function(e)
							{
							closeWindow();
							closeScreen();
							$('html, body').animate({scrollTop:300}, 'slow');
							//$("#main").html('<div class="exito"><img src="images/checkmark.gif"/></div>');
							viewReport('reportes/rpt_reUno.php?id='+e+'&mat='+mat);
							}
						})
				}
				else{
				alertify.alert("Tienes campos vacios, por favor complementalos");
				activeButton('sent');	 
				}
			break;
			
			case 3:
				var num_cnt=document.getElementById('s_prt').value;
				var an_sol=document.getElementById('yer_prt').value;
				var fec_sol=document.getElementById('fec_prt').value;
				var ini_prt=document.getElementById('feIni_prt').value;
				var fin_prt=document.getElementById('feFin_prt').value;
				var hor_prt="DE: "+document.getElementById('horEn').value + " A: " + document.getElementById('horSa').value;
				var pro_asg=document.getElementById('progr_asg').value;
				var tip_emp=document.getElementById('tipo_emp').value;
				var nmb_emp=document.getElementById('emp_prt').value;
				var gir_emp=document.getElementById('gir_prt').value;
				var dir_emp=document.getElementById('dir_prt').value;
				var tel_emp=document.getElementById('tel_prt').value;
				var prs_emp=document.getElementById('psn_prt').value;
				var crg_prs=document.getElementById('crg_prt').value;
				var edo_emp=document.getElementById('edo_prt').value;
				var mun_emp=document.getElementById('mun_prt').value;
				var mat_aln=document.getElementById('con_aln').value;
				var edd_aln=document.getElementById('age_aln').value;
				var per_aln=document.getElementById('sem_aln').value;
				var act_prt=document.getElementById('act_prt').value;
				
if(nmb_emp !="" && gir_emp !="" && tel_emp !="" && dir_emp !="" && prs_emp !="" && crg_prs !="" && edo_emp !="" && mun_emp !="" && act_prt !="")
		{
		var datos="v_acc=3&v_const=" + num_cnt + "&v_anhio=" + an_sol + "&v_fecha=" + fec_sol + "&v_inici=" + ini_prt +
		"&v_final=" + fin_prt + "&v_horar=" + hor_prt + "&v_pgAsg=" + pro_asg + "&v_tpEmp=" + tip_emp + "&v_nmEmp=" + nmb_emp +
		"&v_giEmp=" + gir_emp + "&v_diEmp=" + dir_emp + "&v_tlEmp=" + tel_emp + "&v_psEmp=" + prs_emp + "&v_cgEmp=" + crg_prs + 
		"&v_edEmp=" + edo_emp + "&v_muEmp=" + mun_emp + "&v_matAl=" + mat_aln + "&v_eddAl=" + edd_aln + "&v_semAl=" + per_aln +
		"&v_acPrt=" + act_prt;
		
			$.ajax
				({
				 url:'transfdatos/accAlumno.php',
				 type:'POST',
				 data:datos,
				 success:function(e)
				 	{
					closeScreen();
					$('html, body').animate({scrollTop:300}, 'slow');
					//$("#main").html('<div class="exito"><img src="images/checkmark.gif"/></div>');
					viewReport('reportes/rpt_practicas.php?id='+e);
				 	}
				})
			}
			else{
				alertify.alert("Tienes campos vacios, por favor complementalos");
				activeButton('sent');	 
			}
			break;
			
			case 4:
					var fol_srv=document.getElementById('folio_servico').value;
					var tpo_rpt=document.getElementById('tipo_reporte').value;
					var f_sol=document.getElementById('fecha_solicitud').value;
					var f_ini=document.getElementById('f_inicial').value;
					var f_fin=document.getElementById('f_Uparcial').value;
					var rpt_prv=document.getElementById('reprote_privada').value;
					var obj_srv=document.getElementById('objetivo_servico').value;
					var no_rpt=document.getElementById('noReport').value;
					var mat=document.getElementById('mat').value;
					
					if(obj_srv !="" && rpt_prv !=""){
						
					var datos="v_acc=4&v_foli="+fol_srv + "&v_rept="+tpo_rpt + "&v_fsol="+f_sol + "&v_fini="+f_ini +
					"&v_ffin="+f_fin + "&v_rprv="+rpt_prv + "&v_obsv="+obj_srv +"&v_no="+no_rpt;
					$.ajax
						  ({
						   url:'transfdatos/accAlumno.php',
						   type:'POST',
						   data:datos,
						   success:function(e)
							  {
							  closeWindow();
							  closeScreen();
							  $('html, body').animate({scrollTop:300}, 'slow');
							  //$("#main").html('<div class="exito"><img src="images/checkmark.gif"/></div>');
							  viewReport('reportes/rpt_privada.php?id='+e+'&mat='+mat);
							  }
						  })
					}
					else{
						alertify.alert("Tienes campos vacios, por favor complementalos");	
						activeButton('sent'); 
					}
			break;
			
			case 5:
					var fol_srv=document.getElementById('folio_servico').value;
					var tpo_rpt=document.getElementById('tipo_reporte').value;
					var f_sol=document.getElementById('fecha_solicitud').value;
					var f_ini=document.getElementById('f_inicial').value;
					var f_fin=document.getElementById('f_Uparcial').value;
					var rpt_gob=document.getElementById('reprote_gobierno').value;
					var obj_srv=document.getElementById('objetivo_servico').value;
					var no_rpt=document.getElementById('noReport').value;
					var mat=document.getElementById('mat').value;
					
					if(obj_srv !="" && rpt_gob !=""){
						
					var datos="v_acc=5&v_foli="+fol_srv + "&v_rept="+tpo_rpt + "&v_fsol="+f_sol + "&v_Pini="+f_ini +
					"&v_Pfin="+f_fin + "&v_rgob="+rpt_gob + "&v_obsv="+obj_srv + "&v_no="+no_rpt;
					$.ajax
						  ({
						   url:'transfdatos/accAlumno.php',
						   type:'POST',
						   data:datos,
						   success:function(e)
							  {
							  closeWindow();
							  closeScreen();
							  $('html, body').animate({scrollTop:300}, 'slow');
							  //$("#main").html('<div class="exito"><img src="images/checkmark.gif"/></div>');
							  viewReport('reportes/rpt_gobierno.php?id='+e+'&mat='+mat);
							  }
						  })
					}
					else{
						alertify.alert("Tienes campos vacios, por favor complementalos");
						activeButton('sent');
					}
			break;
			
		}
	}