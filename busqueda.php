<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
	<title>Buscador</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
	<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
	<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
