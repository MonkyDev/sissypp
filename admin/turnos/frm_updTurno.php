<?php
//AGREGAR LA CONEXION Y HACER BUSQUEDA DEL REGISTRO
require_once("../clases/conexion.php");
$db=new conexion();
$id=$_GET['id'];
$sql="SELECT * FROM turnos WHERE idturnos='" . $id . "'";
$result=$db->executeQuery($sql);
$row=$db->getRows($result);
?>
<section id="barratitulo">
    <div id="titulo">Edit. Turno</div>
    <div id="ctrlbox">
        <div id="iconCerrar" class="icon" onClick="closeWindow();" title="Cerrar"></div>
        <div id="iconGuardar" class="icon" onClick="accTurnos(2,'<?php echo $id; ?>')" title="Guardar"></div>
    </div>
</section>
<section class="formulario">
	<form id="frm_updTurno">
	<table>
    	<tr>
    	<tr>
        	<td><label>Descripción:</label></td>
            <td><input type="text" id="descripcion" name="descripcion" style="width:350px;" maxlength="105" value="<?php echo $row['descripcion'];?>" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value=trim(this.value,' ');"></td>
        </tr>
    </table>
    </form>
</section>