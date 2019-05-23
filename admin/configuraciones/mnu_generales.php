<?php
require_once("../clases/conexion.php");
$db = new conexion();
$sql="SELECT * FROM configuraciones";
$res=$db->executeQuery($sql);
$row=$db->getRows($res);
?>

<section id="barratitulo">
    <div id="titulo">Configuraciones generales</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" title="Cerrar" onClick="closeScreen('main');"></div>
        <div id="iconGuardar" class="icon" title="Guardar" onclick="accConfGrales(1,'0')"></div>
    </div>
</section>
<div id="container" style="width:90%;">
	<input id="tab-1" type="radio" name="tab-group" checked="checked" />
	<label for="tab-1">Institución</label>
	<input id="tab-2" type="radio" name="tab-group" />	
    <label for="tab-2">Departamento</label>
	<input id="tab-3" type="radio" name="tab-group" />
    <label for="tab-3">Secretaría</label>
	<!--Contenido a mostrar/ocultar-->
	<div id="content">
    <form id="frm_confGenerales">
		<!--Contenido de la Pestaña 1-->
		<div id="content-1">
			<section class="formulario">
            	
            		<table>
                		<tr>
                            <td align="right" width="60">Nombre:</td>
                            <td><input type="text" id="nomInstit" name="nomInstit" style="width:500px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['nomInstit']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Dirección:</td>
                            <td><input type="text" id="dirInstit" name="dirInstit" style="width:500px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['dirInstit']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Teléfono:</td>
                            <td><input type="text" id="telInstit" name="telInstit" style="width:500px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['telInstit']?>"></td>
                    	</tr>
                		<tr>
                    		<td align="right">Página Web:</td>
                    		<td><input type="text" id="webInstit" name="webInstit" style="width:500px;" maxlength="45" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['webInstit']?>"></td>
                		</tr>
                		<tr>
                    		<td align="right">Clave:</td>
                    		<td><input type="text" id="claveInstit" name="claveInstit" style="width:500px;" maxlength="85" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['claveInstit']?>"></td>
                		</tr>
            		</table>
            	<!--</form>-->
        	</section>
            <br />
            <p align="justify">
            <font face="Arial, Helvetica, sans-serif" size="-1">
            Información de la Institución (Universidad, Colegio, Instituto, etc...), ésta información será usada en los reportes correspondientes así como en las constancias generadas por el sistema.
            </font>
            </p>
		</div>
		<!--Contenido de la Pestaña 2-->
		<div id="content-2">
			<section class="formulario">
            	<!--<form id="frm_confGenerales">-->
            		<table>
                		<tr>
                    		<td align="right" width="60">Nombre:</td>
                            <td><input type="text" id="nomDepto" name="nomDepto" style="width:500px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['nomDepto']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Director:</td>
                            <td><input type="text" id="direcDepto" name="direcDepto" style="width:500px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['direcDepto']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Teléfono:</td>
                            <td><input type="text" id="telDepto" name="telDepto" style="width:500px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['telDepto']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">E-mail:</td>
                            <td><input type="text" id="emailDepto" name="emailDepto" style="width:500px;" maxlength="45" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['emailDepto']?>"></td>
                        </tr>
            		</table>
            	<!--</form>-->
        	</section>
            <br />
            <p align="justify">
            <font face="Arial, Helvetica, sans-serif" size="-1">
            Información del Departamento dentro de la Institución que elaborará las constancias de Servicio Social y Prácticas Profesionales, ésta información será usada en los reportes correspondientes así como en las constancias generadas por el sistema.
            </font>
            </p>
		</div> 
		<div id="content-3">
   			<section class="formulario">
            	<!--<form id="frm_confGenerales">-->
   					<table>
                        <tr>
                            <td align="right" width="60">Secretaría:</td>
                            <td><input type="text" id="nomSecret" name="nomSecret" style="width:500px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['nomSecret']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Subsecretaría:</td>
                            <td><input type="text" id="subSecret" name="subSecret" style="width:500px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['subSecret']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Dirección:</td>
                            <td><input type="text" id="direcSecret" name="direcSecret" style="width:500px;" maxlength="125" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['direcSecret']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Departamento:</td>
                            <td><input type="text" id="deptoSecret" name="deptoSecret" style="width:500px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['deptoSecret']?>"></td>
                        </tr>
                        <tr>
                            <td align="right">Nombre de encargado:</td>
                            <td><input type="text" id="encaSecret" name="encaSecret" style="width:500px;" maxlength="45" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');" value="<?php echo $row['encaSecret']?>"></td>
                        </tr>
                    </table>
            	
			</section>
            <br />
            <p align="justify">
            <font face="Arial, Helvetica, sans-serif" size="-1">
            Información de la Secretaría de Gobierno, Subsecretaría de Gobierno, Dirección dentro de la Subsecretaría, Departamento en la Dirección y nombre de la persona que valida las constancias de Servicio Social y Prácticas Profesionales, ésta información será usada en los reportes correspondientes así como en las constancias generadas por el sistema.
            </font>
            </p>
		</div>
        </form>
	</div> <!--div del content-->
    
</div> <!--div del container-->