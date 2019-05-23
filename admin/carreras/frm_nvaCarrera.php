<?php
require_once("../clases/conexion.php");
$db=new conexion();
$sql="SELECT * FROM planescolar WHERE edo=1";
$result=$db->executeQuery($sql);
?>

<section id="barratitulo">
    <div id="titulo">Nva. Carrera</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();closeVarSes('planxcarr');" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accCarreras(1,0);" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_nvaCarrera">
	<table>
    	<tr>
        	<td><label>Clave:</label></td>
            <td><input type="text" id="idcarreras" name="idcarreras" style="width:100px;" maxlength="4" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    	<tr>
        	<td><label>Nombre:</label></td>
            <td><input type="text" id="nombre" name="nombre" style="width:450px;" maxlength="105" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Director:</label></td>
            <td><input type="text" id="director" name="director" style="width:350px;" maxlength="85" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Coordinador:</label></td>
            <td><input type="text" id="coordinador" name="coordinador" style="width:350px;" maxlength="85" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    </table>
    </form>
    <div style="width:100%; border:#CCC solid 1px; text-align:center; margin-top:10px; margin-bottom:10px; padding-bottom:5px; padding-top:5px; background-color:#E8E8E8; border-radius:10px 10px 0px 0px;">
    	Planes de la carrerra
    </div>
    <section style=" width:100%; height:30px;">
	<div style="float:left;">
                <select id="txt_plan" style="width:240px; height:28px;">
                <?php
                while($row=$db->getRows($result))
                {
                ?>
                <option value="<?php echo $row['idplanescolar'] . '-' . $row['descripcion']; ?>"><?php echo $row['idplanescolar'] . '-' . $row['descripcion']; ?></option>
                <?php
                }
                ?>
                </select>
    </div>
    <div style="float:left;">
    <input type="text" id="rvoe" name="rvoe" placeholder="RVOE" style="width:95px; margin-left:3px;" />
    <input type="text" id="vigencia" name="vigencia" placeholder="Vigencia" style="width:185px; margin-left:3px;" />
    </div>
    <div class="icon_s" id="iconAddList" title="Agregar a la lista" onclick="addToSenPlan();" style="float:left;"></div>
    </section>
    <div class="tblDesglose" id="tabla_planxcarr">
    
    </div>
</section>



