<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Buscador</title>
</head>
	<body>
	<?php
	if(!isset($_SESSION["usuario"]))
	{?>
		<script> 
			alertify.alert('Error','Debe iniciar sesion para realizar una compra',function(){
				alertify.success('Ok');
				window.location= 'login.php'
			});
		</script>
	<?php 
	}
	else
	{	
		include("conexion.inc");
		$producto=$_POST['btnBusqueda'];
		$consulta="select * from productos where id_producto ='$producto'";
		$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));;
		$prod = mysqli_fetch_assoc($resp);
		$cant=1;
		$_SESSION['carro'][$prod["nombre_producto"]]=array("id"=>$prod["id_producto"],"cantidad"=>$cant,"precio"=>$prod["precio"]);
		echo "<script> window.location='carrito.php'; </script>";
	}
	?>
	</body>
</html>