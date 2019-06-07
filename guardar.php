<?php
	include("conexion.inc"); 
   $r=$_FILES['imagen']['tmp_name'];
   $nn=$_FILES['imagen']['name'];
   $ic=addslashes(file_get_contents($r));
   $e=substr(strrchr($nn, '.'), 1);
	$vSql="insert into imagenes(id,foto,extension) values('1','".$ic."','".$e."')";
	mysqli_query($link,$vSql) or die(mysqli_error($link));
	echo"imagen guardada";
	
?>