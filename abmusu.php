<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
		<title>Supermercado SAV</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="index.html">
				<img src="titulo.jpg" alt="Logo" style="width:15vw;" />		  
			</a>
			<ul class="navbar-nav">
			<li class="nav-item">
				  <a class="nav-link" href="homeAdmin.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmUsuarios.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<div class='btn-group'>
						<a  class='nav-link dropdown-toggle' data-toggle='dropdown'>Pedidos</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='pedidos.php'>Panel de pedidos</a>
							<a class='dropdown-item' href='informesVenta.php'>Informes de venta</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmProductos.php">Productos</a>
				</li>
				<li class="nav-item">		
				<?php	if(!isset($_SESSION["usuario"]))
				{ 
					echo "<a class='btn btn-outline-success' href='login.php'>Iniciar sesion</a> ";
				}
				else
				{
					echo " <a class='btn btn-outline-success' href='cerrarSesion.php'>Cerrar sesion</a>";
				}?>
				</li>
			</ul>
			<form class="form-inline" action="buscar.php" method="post" name="FormBuscador">
				<input class="form-control mr-sm-2" type="text" name="lupa"  />
				<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
			</form>
		</nav>
		<div id="cuerdo">
			<?php
				include("conexion.inc");
				$boton=$_POST['botonAbmusuario'];
				$usuario=$_POST['usuario'];
				$clave=$_POST['clave'];
				$tipo=$_POST['nombre_categoria'];
				$dni=$_POST['dni'];
				$nombre=$_POST['nombre'];
				$apellido=$_POST['apellido'];
				$email=$_POST['email'];
				$fecha=$_POST['fechaNac'];
				$direccion=$_POST['calle'].' '.$_POST['numero'].' '.$_POST['piso'].' '.$_POST['dpto'];
				$tel=$_POST['codigo'].' '.$_POST['tel_usuario'];
				if($boton=="modificar")
				{
					$consultaU="update usuarios set clave='$clave', tipo_usuario='$tipo' where usuario='$usuario'"; 
					$consultaP="update personas set nombre='$nombre',apellido='$apellido', mail='$email',direccion='$direccion', telefono='$tel', fechaNac='$fecha' where dni='$dni'";
					mysqli_query($link,$consultaU) or die(mysqli_error($link));
					mysqli_query($link,$consultaP) or die(mysqli_error($link));
				?>
				<script> 
					alert('Se ha modificado el usuario.');
					window.location= 'abmUsuarios.php'
				</script>
				<?php
				}
				elseif($boton=="agregar")
				{ 
					$consultaa="insert into personas(nombre,apellido,mail,direccion,telefono,fechaNac,dni) values('$nombre','$apellido','$email','$direccion','$tel','$fecha','$dni')";
					$consulta="insert into usuarios(usuario,clave, tipo_usuario,dni) values('$usuario','$clave','$tipo','$dni')"; 
					mysqli_query($link,$consultaa) or die(mysqli_error($link));
					mysqli_query($link,$consulta) or die(mysqli_error($link));
				?>
				<script> 
					alert('Se ha agregado un nuevo usuario.');
					window.location= 'abmUsuarios.php'
				</script>
				<?php
				}
				mysqli_close($link);
			?>
		</div>
		<footer>
			<div class="footer-container">
			<div class="footer-main">
				<div class="footer-columna">Supermercado SAV </div>
				<div class="footer-columna">San Martin 1234. Rosario,Santa Fe.</div> 
				<div class="footer-columna">Tel: (0341)-4322245</div>
				</div>
			</div>
		</footer>
	</body>
</html>