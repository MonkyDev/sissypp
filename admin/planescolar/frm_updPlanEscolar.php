<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM planescolar WHERE idplanescolar='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Edit. Plan escolar</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accPlanEscolar(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updPlanEscolar">
	<table>
    	<tr>
    	<tr>
        	<td><label>Descripción:</label></td>
            <td><input type="text" id="descripcion" name="descripcion" style="width:350px;" maxlength="105" value="<?php echo $row['descripcion'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Años:</label></td>
            <td>
            	<select id="danhios" name="danhios" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="1" <?php if($row['danhios']=='1') echo 'selected';?> >1 año</option>
                    <option value="2" <?php if($row['danhios']=='2') echo 'selected';?> >2 años</option>
                    <option value="3" <?php if($row['danhios']=='3') echo 'selected';?> >3 años</option>
                    <option value="4" <?php if($row['danhios']=='4') echo 'selected';?> >4 años</option>
                    <option value="5" <?php if($row['danhios']=='5') echo 'selected';?> >5 años</option>
                    <option value="6" <?php if($row['danhios']=='6') echo 'selected';?> >6 años</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td><label>Meses:</label></td>
            <td>
            	<select id="dmeses" name="dmeses" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="0" <?php if($row['dmeses']=='0') echo 'selected';?> >0 meses</option>
                	<option value="1" <?php if($row['dmeses']=='1') echo 'selected';?> >1 mes</option>
                    <option value="2" <?php if($row['dmeses']=='2') echo 'selected';?> >2 meses</option>
                    <option value="3" <?php if($row['dmeses']=='3') echo 'selected';?> >3 meses</option>
                    <option value="4" <?php if($row['dmeses']=='4') echo 'selected';?> >4 meses</option>
                    <option value="5" <?php if($row['dmeses']=='5') echo 'selected';?> >5 meses</option>
                    <option value="6" <?php if($row['dmeses']=='6') echo 'selected';?> >6 meses</option>
                    <option value="7" <?php if($row['dmeses']=='7') echo 'selected';?> >7 meses</option>
                    <option value="8" <?php if($row['dmeses']=='8') echo 'selected';?> >8 meses</option>
                    <option value="9" <?php if($row['dmeses']=='9') echo 'selected';?> >9 meses</option>
                    <option value="10" <?php if($row['dmeses']=='10') echo 'selected';?> >10 meses</option>
                    <option value="11" <?php if($row['dmeses']=='11') echo 'selected';?> >11 meses</option>
                </select>
            </td>
        </tr>
    </table>
    </form>
</section>