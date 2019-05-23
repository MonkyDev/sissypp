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
    <div id="titulo">Información de la empresa</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_infoEmpresa">
	<table>
    	<tr>
        	<td><label>Nombre:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['nombre'];?>" readonly></td>
        </tr>
    	<tr>
        	<td><label>Correo:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['correo'];?>" readonly></td>
        </tr>
        <tr>
        	<td><label>Página Web:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['web'];?>" readonly></td>
        </tr>
        <tr>
        	<td><label>Latitud:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['ubx'];?>" readonly></td>
        </tr>
        <tr>
        	<td><label>Longitud:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['uby'];?>" readonly></td>
        </tr>
        <tr>
        	<td><label>Fecha Aut.:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['faut'];?>" readonly></td>
        </tr>
        <tr>
        	<td><label>Vigencia:</label></td>
            <td><input type="text" style="width:450px;" value="<?php echo $row['vigencia'];?>" readonly></td>
        </tr>
    </table>
    </form>
</section>