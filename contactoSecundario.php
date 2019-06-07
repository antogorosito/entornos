<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contacto</title>
</head>
	<body>
		<?php
			$fecha=date("d-m-Y");
			$hora= date("H :i:s");
			$destino=$_POST['email'];
			$asunto="Comentario";
			$desde= "entornos@hotmail.com";
			$comentario= $_POST['text'];
			mail($destino,$asunto,$comentario,$desde);
			echo ("Su consulta ha sido enviada, en breve recibira nuestra respuesta.");
			echo ("<a href='index.php'>Volver al inicio</a>");
		?>
	</body>
</html>
