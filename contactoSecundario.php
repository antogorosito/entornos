<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contacto</title>
</head>
	<body>
		<?php
			$fecha=date("d-m-Y");
			$destino="entornosGraficos1@gmail.com";
			$asunto="Comentario";
			$comentario= " <html>
			<head>
			<title>Mail de contacto</title>
			</head>
			<body>
				<p>".$_POST['msjmail']."</p>
				</br>
				</br>
				<p>Enviado el dia ".$fecha." por ".$_POST['nombre'].", ".$_POST['emailC']."</p>
			</body>
			</html>";
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			mail($destino,$asunto,$comentario,$cabeceras);
		?>
		<script> 
			alert('Su consulta ha sido enviada, en breve recibira nuestra respuesta.');
			window.location= 'contacto.php'
		</script>

	</body>
</html>
