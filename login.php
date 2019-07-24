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
		<script type="text/javascript" src="login.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="index.php">
				<img src="titulo.jpg" alt="Logo" style="width:15vw;" />		  
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>			
				</li>
				<li class="nav-item">
					<a class="nav-link" href="productos.php">Productos</a>			
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contacto.php">Contacto</a>			
				</li>
				<li class="nav-item">
					<a class="nav-link" href="carrito.php">Carrito</a>			
				</li>
				<li class="nav-item">
				<?php	if(!isset($_SESSION["usuario"]))
				{ 
					echo "<a class='btn btn-outline-success' href='login.php'>Iniciar sesion</a> ";
				}
				else
				{
					echo "<div class='btn-group'>
					<button type='button' class='btn btn-outline-success dropdown-toggle' data-toggle='dropdown'>
					".$_SESSION['nombre']."
					</button><div class='dropdown-menu'><a class='dropdown-item' href='cerrarSesion.php'>Cerrar sesion</a></div></div> ";
				}?>
				</li>
			</ul>
			<form class="form-inline" action="buscar.php" method="post" name="FormBuscador">
				<input class="form-control mr-sm-2" type="text" name="lupa"  />
				<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
			</form>
		</nav>
		<div class="cuerpo">
			<h2 class="titInicio verde">Iniciar sesion </h2>
			<form action="iniciarSesion.php" class="needs-validation formulario"  name="formIniciarSesion" id="formIniciarSesion" method="post" >
				<div class="form-group top">
					<label for="uname">Usuario:</label>
					<input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" id="usuario" >
					<div class="text-hide error" id="usuarioerror">Completar este campo.</div>
				</div>
				<div class="form-group top">
					<label for="pwd">Clave:</label>
					<input type="password" class="form-control" placeholder="Ingrese su clave" name="clave" id="clave" >
					<div class="text-hide error" id="claveerror">Completar este campo.</div>
				</div> 
				<div class="form-group ">
					<button id="btnO" class="btn " id="botonInicio" name="botonInicio" value="olvido">Olvide la contraseña</button>	
				</div> 
				<button id="btnI" class="btn btn-success" name="botonInicio" value="inicio">Iniciar sesion</button>
				<button id="btnR" class="btn btn-outline-success" name="botonInicio" value="registro">Registracion</button>
			</form>
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

