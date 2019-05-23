<div id="winHeadIconBox" style="margin-top:10px;">
          <div class="icon" id="cerrar" title="Cerrar" onclick="closeWindow();"></div>
          <!--<div class="icon" id="guardar" title="Guardar" onclick="accProductos(1,0);"></div>-->
</div>
<section id="tree" style="margin:auto;">
<center>
      <font face="Arial, Helvetica, sans-serif">
      <div class="TC" style="position:relative; margin-top:40px;text-align:center;">
	  Por favor ingresa tu m&aacute;tricula para generar tu contrase&ntilde;a y poder 
      acceder al sistema es obligatorio llenar todos los campos              
      </div> 
      
      <div class="TC" style="position:relative; margin-top:10px;">
      No.M&aacute;tricula:
      <input type="text" maxlength="12" id="matricula" class="bg" style="width:400px;" placeholder="Ingresa matr&iacute;cula y presiona enter" onkeyup="if(validateTecla(event)=='enter'){accRegister(2,$('#matricula').val());}" autofocus />
      </div>
</section>

<section style="margin:auto;height:450px;margin-top:10px;">
    <div id="marco" style="height:450px;"></div>
</section> 
<style>
input{
	padding:5px;
}
#sas{
	position:absolute;
	margin-top:420px;
	margin-left:250px;
}
#sas:hover{
	cursor:pointer;
}
</style>
