<?php
/* Se conecta con la base de datos elegida. */
	include("conexion.inc"); 
	$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

		$consulta = "INSERT INTO productos (nombre_producto,precio,stock,foto,id_categoria) values ('lal',45,21,'$imagen',1)";

		
	$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));
 
	echo "Imagen almacenada.";
?>