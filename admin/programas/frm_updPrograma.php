<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM programas WHERE idprogramas='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Edit. Programa</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accProgramas(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updPrograma">
	<table>
    	<tr>
    	<tr>
        	<td><label>Descripción:</label></td>
            <td><input type="text" id="descripcion" name="descripcion" style="width:350px;" maxlength="105" value="<?php echo $row['descripcion'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Tipo:</label></td>
            <td>
            	<select id="tipo" name="tipo" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="GOBIERNO" <?php if($row['tipo']=='GOBIERNO') echo 'selected';?> >Gobierno</option>
                    <option value="PRIVADO" <?php if($row['tipo']=='PRIVADO') echo 'selected';?> >Privado</option>
                </select>
            </td>
        </tr>
    </table>
    </form>
</section>