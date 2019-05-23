 <?php
class Email_Fondeo
{
	public $mailer;
	public $email_destinatario;
	public $nombre;
	public $telefono;
	public $subject;
	public $comentario;
	public $extras; 
		
	//funcion de envio de this->mailer para recuperar clave
	public function send_email_destiny()
	{
		$cuerpo=
		'
		<html>
	<style>
    #cabecera{
        width:100%;
        height:50px;
    }
	#mensaje{
		width:100%;
		height:300px;
		overflow:scroll;
		text-align:justify;
	}
    </style>
    <div id="cabecera">
    	<img src="http://generalmedica.com/image/logoheader.png" width="250" height="50">
    </div>
    <div id="mensaje">
    	<p> Hemos recibido su correo, en breve tendr&aacute; respuesta a su comentario.</p>
        <p>Gracias por su preferencia.</p>
    </div>
</html>
		';
		$this->mailer->IsSMTP();
			$this->mailer->SMTPAuth      = true;             // enable SMTP authentication
			$this->mailer->SMTPKeepAlive = false;            // SMTP connection will not close after each email sent
			$this->mailer->SMTPDebug     = 2; 
			$this->mailer->Debugoutput   = 'html';
			$this->mailer->Host          = "mail.generalmedica.com"; // sets the SMTP server
			$this->mailer->Port          = 26;              // set the SMTP port for the GMAIL server
			$this->mailer->Username      = "soporte.administrativo@generalmedica.com";// SMTP account username
			$this->mailer->Password      = "5septiembre13";         // SMTP account password
			$this->mailer->SetFrom("soporte.administrativo@generalmedica.com", 'General Medica');
			$this->mailer->Subject    = utf8_encode($this->subject);
			$this->mailer->AltBody    = "Para poder visualizar este email es necesario que tengas activo HTML!";
			$this->mailer->MsgHTML($cuerpo);
			
			$this->mailer->AddAddress($this->email_destinatario, 'General Medica'); // CORREO DEL CLIENTE
			if(!$this->mailer->Send())
			{
				return( "Error al enviar: " . $this->mailer­>ErrorInfo);
			}
			else
			{
				return("Mensaje enviado!");
			}
		   
			// Clear all addresses and attachments for next loop
			$this->mailer->ClearAddresses();
			$this->mailer->ClearBCCs();
			$this->mailer->ClearCCs();
			$this->mailer->ClearAttachments();
	}
	
	public function send_emailSoporte()
	{
		$cuerpo=
		'
		<html>
	<style>
    #cabecera{
        width:100%;
        height:50px;
    }
	#mensaje{
		width:100%;
		height:300px;
		overflow:scroll;
		text-align:justify;
	}
    </style>
    <div id="cabecera">
    	<img src="http://generalmedica.com/image/logoheader.png" width="250" height="50">
    </div>
    <div>
    	<table>
        	<tr>
            	<td align="right">Nombre:</td>
                <td align="left">' . $this->nombre . '</td>
            </tr>
            <tr>
            	<td align="right">e-mail:</td>
                <td align="left">' . $this->email_destinatario . '</td>
            </tr>
            <tr>
            	<td align="right">Tel&eacute;fono:</td>
                <td align="left">' . $this->telefono . '</td>
            </tr>
            <tr>
            	<td align="right">Tema:</td>
                <td align="left">' . $this->subject . '</td>
            </tr>
        </table>
    </div>
    <div id="mensaje">
    	<p>
			' . $this->comentario . '
        </p>
    </div>
</html>
		';
		$this->mailer->IsSMTP();
			$this->mailer->SMTPAuth      = true;             // enable SMTP authentication
			$this->mailer->SMTPKeepAlive = false;            // SMTP connection will not close after each email sent
			$this->mailer->SMTPDebug     = 2; 
			$this->mailer->Debugoutput   = 'html';
			$this->mailer->Host          = "mail.generalmedica.com"; // sets the SMTP server
			$this->mailer->Port          = 26;              // set the SMTP port for the GMAIL server
			$this->mailer->Username      = "soporte.administrativo@generalmedica.com";// SMTP account username
			$this->mailer->Password      = "5septiembre13";         // SMTP account password
			$this->mailer->SetFrom("soporte.administrativo@generalmedica.com", 'EGM Comentario: ' . $this->nombre);
			$this->mailer->Subject    = utf8_encode($this->subject);
			$this->mailer->AltBody    = "Para poder visualizar este email es necesario que tengas activo HTML!";
			$this->mailer->MsgHTML($cuerpo);
			
			$this->mailer->AddAddress("soporte.administrativo@generalmedica.com", 'DEPTO DE SOPORTE');
			$this->mailer->AddAddress("ventas@generalmedica.com", 'DEPTO DE VENTAS');
			if(!$this->mailer->Send())
			{
				return( "Error al enviar: " . $this->mailer­>ErrorInfo);
			}
			else
			{
				return("Mensaje enviado!");
			}
		   
			// Clear all addresses and attachments for next loop
			$this->mailer->ClearAddresses();
			$this->mailer->ClearBCCs();
			$this->mailer->ClearCCs();
			$this->mailer->ClearAttachments();
	}
	
	public function send_Pedido($cuerpo,$e1,$e2,$e3)
	{
		$tema='
		<html>
	<style>
    #cabecera{
        width:100%;
        height:50px;
    }
	#tabla{
		width:100%;
		height:300px;
		overflow:scroll;
	}
    </style>
    <div id="cabecera">
    	<img src="http://generalmedica.com/image/logoheader.png" width="250" height="50">
    </div>
		'.$cuerpo;
		
		
		$this->mailer->IsSMTP();
		$this->mailer->SMTPAuth      = true;             // enable SMTP authentication
		$this->mailer->SMTPKeepAlive = false;            // SMTP connection will not close after each email sent
		$this->mailer->SMTPDebug     = 2; 
		$this->mailer->Debugoutput   = 'html';
		$this->mailer->Host          = "mail.generalmedica.com"; // sets the SMTP server
		$this->mailer->Port          = 26;              // set the SMTP port for the GMAIL server
		$this->mailer->Username      = "soporte.administrativo@generalmedica.com";// SMTP account username
		$this->mailer->Password      = "5septiembre13";         // SMTP account password
		$this->mailer->SetFrom("soporte.administrativo@generalmedica.com", '');
		$this->mailer->Subject    = utf8_encode('EGM Pedido: ' . $e3);
		$this->mailer->AltBody    = "Para poder visualizar este email es necesario que tengas activo HTML!";
		$this->mailer->MsgHTML($tema);
		
		$this->mailer->AddAddress("soporte.administrativo@generalmedica.com", 'DEPTO DE SOPORTE');
		$this->mailer->AddAddress("ventas@generalmedica.com", 'DEPTO DE VENTAS');
		if($e1!="")
			$this->mailer->AddAddress($e1, 'DEPTO DE VENTAS');
		if($e2!="")
			$this->mailer->AddAddress($e2, 'DEPTO DE VENTAS');
		if(!$this->mailer->Send())
		{
			return( "Error al enviar: " . $this->mailer­>ErrorInfo);
		}
		else
		{
			return("Mensaje enviado!");
		}
	   
		// Clear all addresses and attachments for next loop
		$this->mailer->ClearAddresses();
		$this->mailer->ClearBCCs();
		$this->mailer->ClearCCs();
		$this->mailer->ClearAttachments();
	}
	
	public function send_cotizaDestiny()
	{
		$cuerpo=
		'
		<html>
			<style>
    			#cabecera{
        			width:100%;
        			height:50px;
    			}
				#mensaje{
					width:100%;
					height:300px;
					overflow:scroll;
					text-align:justify;
				}
    		</style>
    		<div id="cabecera">
    			<img src="http://generalmedica.com/image/logoheader.png" width="250" height="50">
    		</div>
    		<div id="mensaje">
    			<p> Hemos recibido la solicitud de cotización, en breve nos cominucaremos con Usted.</p>
        		<p>Gracias por su preferencia.</p>
    		</div>
		</html>
		';
		$this->mailer->IsSMTP();
			$this->mailer->SMTPAuth      = true;             // enable SMTP authentication
			$this->mailer->SMTPKeepAlive = false;            // SMTP connection will not close after each email sent
			$this->mailer->SMTPDebug     = 2; 
			$this->mailer->Debugoutput   = 'html';
			$this->mailer->Host          = "mail.generalmedica.com"; // sets the SMTP server
			$this->mailer->Port          = 26;              // set the SMTP port for the GMAIL server
			$this->mailer->Username      = "soporte.administrativo@generalmedica.com";// SMTP account username
			$this->mailer->Password      = "5septiembre13";         // SMTP account password
			$this->mailer->SetFrom("soporte.administrativo@generalmedica.com", 'General Medica');
			$this->mailer->Subject    = utf8_encode("Cotización");
			$this->mailer->AltBody    = "Para poder visualizar este email es necesario que tengas activo HTML!";
			$this->mailer->MsgHTML($cuerpo);
			
			//EMAIL PARA FACTURACION
			$this->mailer->AddAddress($this->email_destinatario, 'General Medica'); // CORREO DEL CLIENTE
			if(!$this->mailer->Send())
			{
				return( "Error al enviar: " . $this->mailer­>ErrorInfo);
			}
			else
			{
				return("Mensaje enviado!");
			}
		   
			// Clear all addresses and attachments for next loop
			$this->mailer->ClearAddresses();
			$this->mailer->ClearBCCs();
			$this->mailer->ClearCCs();
			$this->mailer->ClearAttachments();
	}
	
	public function send_cotizaSoporte(){
		$a=explode('|',$this->extras);
		$cuerpo=
		'
		<html>
			<style>
				#cabecera{
					width:100%;
					height:50px;
				}
				#mensaje{
					width:100%;
					height:400px;
					overflow:scroll;
					text-align:justify;
				}
			</style>
			<div id="cabecera">
				<img src="http://generalmedica.com/image/logoheader.png" width="250" height="50">
			</div>
			<div id="mensaje">
				<p style="font-size:22px;"> Solicitud de cotizaci&oacute;n.</p>
				<table>
					<tr>
						<td align="right">Empresa:</td>
						<td>' . $a[0] . '</td>
					</tr>
					<tr>
						<td align="right">RFC:</td>
						<td>' . $a[1] . '</td>
					</tr>
					<tr>
						<td align="right">Domicilio:</td>
						<td>' . $a[2] . '</td>
					</tr>
					<tr>
						<td align="right">Nombre del contacto:</td>
						<td>' . $this->nombre . '</td>
					</tr>
					<tr>
						<td align="right">Correo electr&oacute;nico:</td>
						<td>' . $this->email_destinatario . '</td>
					</tr>
					<tr>
						<td align="right">Tel&eacute;fono:</td>
						<td>' . $this->telefono . '</td>
					</tr>
				</table>
				<p>Descripci&oacute;n del producto</p>
				<p>
					' . $this->comentario . '
				</p>
			</div>
		</html>
		';
		$this->mailer->IsSMTP();
			$this->mailer->SMTPAuth      = true;             // enable SMTP authentication
			$this->mailer->SMTPKeepAlive = false;            // SMTP connection will not close after each email sent
			$this->mailer->SMTPDebug     = 2; 
			$this->mailer->Debugoutput   = 'html';
			$this->mailer->Host          = "mail.generalmedica.com"; // sets the SMTP server
			$this->mailer->Port          = 26;              // set the SMTP port for the GMAIL server
			$this->mailer->Username      = "soporte.administrativo@generalmedica.com";// SMTP account username
			$this->mailer->Password      = "5septiembre13";         // SMTP account password
			$this->mailer->SetFrom("soporte.administrativo@generalmedica.com", 'General Medica');
			$this->mailer->Subject    = utf8_encode("Cotización");
			$this->mailer->AltBody    = "Para poder visualizar este email es necesario que tengas activo HTML!";
			$this->mailer->MsgHTML($cuerpo);
			
			//EMAIL PARA FACTURACION
			$this->mailer->AddAddress("soporte.administrativo@generalmedica.com", 'DEPTO DE SOPORTE');
			$this->mailer->AddAddress("ventas@generalmedica.com", 'DEPTO DE VENTAS');
			if(!$this->mailer->Send())
			{
				return( "Error al enviar: " . $this->mailer­>ErrorInfo);
			}
			else
			{
				return("Mensaje enviado!");
			}
		   
			// Clear all addresses and attachments for next loop
			$this->mailer->ClearAddresses();
			$this->mailer->ClearBCCs();
			$this->mailer->ClearCCs();
			$this->mailer->ClearAttachments();
	}
}

?>