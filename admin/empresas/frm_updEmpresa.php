<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM empresas WHERE idempresas='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Edit. Empresa</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accEmpresas(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updEmpresa">
	<table>
    	<tr>
        	<td><label>Nombre:</label></td>
            <td><input type="text" id="nombre" name="nombre" style="width:450px;" maxlength="125" value="<?php echo $row['nombre'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    	<tr>
        	<td><label>Giro:</label></td>
            <td><input type="text" id="giro" name="giro" style="width:350px;" maxlength="45" value="<?php echo $row['giro'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Direccion:</label></td>
            <td><input type="text" id="direccion" name="direccion" style="width:450px;" maxlength="125" value="<?php echo $row['direccion'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Telefono:</label></td>
            <td><input type="text" id="telefono" name="telefono" style="width:350px;" maxlength="45" value="<?php echo $row['telefono'];?>" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>E-mail:</label></td>
            <td><input type="text" id="correo" name="correo" style="width:350px;" maxlength="85" value="<?php echo $row['correo'];?>" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Pág. web:</label></td>
            <td><input type="text" id="web" name="web" style="width:350px;" maxlength="95" value="<?php echo $row['web'];?>" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
        <tr>
        	<td><label>Latitud:</label></td>
            <td><input type="text" id="ubx" name="ubx" style="width:350px;" maxlength="45" value="<?php echo $row['ubx'];?>"></td>
        </tr>
        <tr>
        	<td><label>Longitud:</label></td>
            <td><input type="text" id="uby" name="uby" style="width:350px;" maxlength="45" value="<?php echo $row['uby'];?>"></td>
        </tr>
        <tr>
        	<td><label>Tipo:</label></td>
            <td>
            	<select id="tipo" name="tipo" style="box-shadow:none; border:#CCC 1px solid;">
                	<option value="GOBIERNO" <?php if($row['tipo']=='GOBIERNO') echo 'selected'?>>Gobierno</option>
                    <option value="PRIVADO" <?php if($row['tipo']=='PRIVADO') echo 'selected'?>>Privado</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td><label>Fecha Aut.:</label></td>
            <td><input type="date" id="faut" name="faut" style="width:170px;" maxlength="45" value="<?php echo $row['faut'];?>"></td>
        </tr>
        <tr>
        	<td><label>Vigencia:</label></td>
            <td><input type="text" id="vigencia" name="vigencia" style="width:170px;" maxlength="45" placeholder="dd/mm/aaaa ó INDEFINIDO" value="<?php echo $row['vigencia'];?>"></td>
        </tr>
    </table>
    </form>
</section>