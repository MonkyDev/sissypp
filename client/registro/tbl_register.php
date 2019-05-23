<?php
require_once("../clases/conexion.php");
$db=new conexion();
	$sql="SELECT alumnos.matricula AS alnMatricula,alumnos.nombre AS alnNombre,alumnos.paterno,alumnos.materno,alumnos.domicilio,alumnos.grupo,alumnos.sexo,alumnos.fnacimiento,alumnos.edad,alumnos.telefono,alumnos.edo,alumnos.pswd,alumnos.email,alumnos.carrera,carreras.idcarreras,carreras.nombre FROM alumnos INNER JOIN carreras ON carreras.idcarreras=alumnos.carrera WHERE matricula = '".$_GET['txt_mat']."'";
	$result=$db->executeQuery($sql);
	$row=$db->getRows($result);

?>
<section>  
  <table height="442" cellpadding="2" style="margin-left:50px;margin-top:10px;">
    <tr>
   		<td>Nombre</td>
		<td><input type="text" class="bg" style="width:400px;" value="<?php echo $row['alnNombre']; ?>" readonly/></td>
    </tr>
    <tr>
    	<td>A.Paterno</td>
    	<td><input type="text" class="bg" style="width:400px;" value="<?php echo $row['paterno']; ?>" readonly/></td>
    </tr>
    <tr>
    	<td>A.Materno</td>
    	<td>
        <input type="text" class="bg" style="width:400px;" value="<?php echo $row['materno']; ?>" readonly/></td>
    </tr>
    <tr>
    	<td>Carrera</td>
    	<td>
        <input type="text" class="bg" style="width:400px;" value="<?php echo $row['nombre']; ?>" readonly/></td>
       	</td>
    </tr>
    <tr>
    	<td>Domicilio</td>
    	<td ><input type="text" id="dom" class="bg"  style="width:400px;" required
         onkeyup="this.value=this.value.toUpperCase();"/></td>
    </tr>
	<tr>	
    	<td>Sexo</td>
    	<td>
        <select class="bg" id="sex" style="width:400px;">
        <option value="M" >M&aacute;sculino</option>
        <option value="F" >Femenino</option>
        </select>
        </td>
	</tr>    
	<tr>
    	<td>F.Nacimiento</td>
    	<td><input type="date" id="nac" class="bg" style="width:400px;"/></td>
    </tr>
    <tr>
    	<td>Edad</td>
    	<td>
        <input type="text" id="edd" class="bg" style="width:400px;" 
        onfocus="calcula_edad('edd');"
        readonly/>			
        </td>
    </tr>
    <tr>
    	<td>Tel&eacute;fono</td>
    	<td><input type="text" id="tel" class="bg" style="width:400px;"/></td>
    </tr> 
    <tr>
    	<td>Correo</td>
    	<td><input type="email" id="cor" class="bg" style="width:400px;" required/></td>
    </tr> 
    <tr>
    	<td>Contrase&ntilde;a</td>
      	<td>
        <input type="text" id="psw" class="bg" style="width:325px;"
        placeholder="Ingresa una contrase&ntilde;a propia o"/>
        <ins><a href="#" onclick="ver();">generar</a></ins>

        </td>
    </tr>
    <tr>
    	<td>Recuperaci&oacute;n</td>
    	<td>
            <select class="bg" id="question" style="width:400px;">
            	<option value="0">Elige una opción, servirá por si olvidas tu contrase&ntilde;a</option>
                <option value="1">¿Cu&aacute;l era tu apodo de ni&ntilde;o?</option>
                <option value="2">¿Cu&aacute;l es el nombre de tu mascota?</option>
                <option value="3">¿C&oacute;mo se llama tu mejor amigo?</option>
                <option value="4">¿Cu&aacute;l es tu canci&oacute;n favorita?</option>
                <option value="5">¿Comida favorita que no compartes?</option>
            </select>
        </td>
    </tr>
   	<tr>
    	<td>Respuesta</td>
        <td>
        	<input type="text" id="answer" class="bg" style="width:400px;" placeholder="servirá para recuperar tu contraseña"/>
        </td>
    </tr>
    <tr>
		<td colspan="2">
        <input type="button" id="sent" value="Enviar" 
        style="margin-top:10px;"
        onclick="accRegister(3,<?php echo $_GET['txt_mat']; ?>)"/>
        </td>
		
    </tr>
  </table>

</section>
<style>

input{
	padding:5px;
}
select{
	padding:5px;
	font-size:17px;
	padding-left:5px;
	border:1px solid #ccc;
	border-radius:4px;
	font-size:1em;
	outline:none;
	transition: all 0.15s ease-in-out;
}
select:focus {
	box-shadow: 0 0 5px rgba(255,0,0,1);
	border:1px solid rgba(255,0,0,0.8);
}
</style>