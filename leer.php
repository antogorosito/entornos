<?php
include("conexion.inc"); 

$vv=$_GET['id'];

$consulta="select * from productos where id_producto='$vv'";
$resp = mysqli_query($link,$consulta);
$imagen = mysqli_fetch_assoc($resp);

$contenido=$imagen['foto'];

header("Content-type:image/jpg");
echo $contenido;
	//libero resultados 
	mysqli_free_result($resp);
	//cierro conexion
	mysqli_close($link);
?>