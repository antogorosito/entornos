<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Buscador</title>
</head>
	<body>
	<?php
		include("conexion.inc");
		$palabra=$_POST['lupa'];
		$consulta="select * from productos where nombre_producto like '%".$palabra."%'";
		$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));;
		$c =mysqli_num_rows($resp);
		if( $c == 0) 
		{
			echo "No hay resultados respecto a la palabra que busca.";	
			echo "<a href='index.html'>Volver al inicio</a>";
		}
		else 
		{
			echo "<center><strong>RESULTADOS DE BUSQUEDA</strong></center><br>";
			while($cat = mysqli_fetch_array($resp)) 
			{
     			echo ($cat['nombre_producto']); 
     			echo "<br>";
     			echo "<a href='index.html'>Vover al buscador</a>";
			} 		
		}
	?>
	</body>
</html>
