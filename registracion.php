<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registracion</title>
</head>
	<body>
	<?php
	include("conexion.inc"); 
	$vNombre=$_POST['nombre'];
	$vApellido=$_POST['apellido'];
	$vUsuario=$_POST['usuario'];
	$vClave=$_POST['clave'];
	$vEmail=$_POST['email'];
	$vDni=$_POST['dni'];
	$vDireccion=$_POST['calle'] .' '. $_POST['num'] .' '. $_POST['piso'] .' '. $_POST['dpto']; 
	$vTelefono=$_POST['codigo'] .' '. $_POST['telefono'];
	$vFecha=$_POST['cumpleanios'];
	$vSql="select count(dni) from usuarios where dni='$vDni'";
	$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
	$cantidad = mysqli_fetch_assoc($vResultado);
	if($cantidad['count(dni)'] > 0)
	{
		?>	
		<script> 
			alert('El usuario que desea usar ya existe en nuestra base de datos!!');
			window.location= 'registrar.php'
		</script>
		<?php
	}
	else
	{
		$vSql="insert into personas(dni, nombre, apellido, mail,direccion, telefono, fechaNac) values('$vDni','$vNombre','$vApellido','$vEmail','$vDireccion','$vTelefono','$vFecha')"; 
		mysqli_query($link,$vSql) or die(mysqli_error($link));
		$vSql="insert into usuarios(usuario,clave,dni) values('$vUsuario','$vClave','$vDni')";
		mysqli_query($link,$vSql) or die(mysqli_error($link));						
		echo "<script> window.location='index.php'; </script>";
	}
	mysqli_free_result($vResultado);
	mysqli_close($link);
	?>
	</body>
</html>
