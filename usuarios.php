<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
		<title>Supermercado SAV</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			  <a class="navbar-brand" href="index.html">
				<img src="titulo.jpg" alt="Logo" style="width:15vw;" />
			  </a>
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link" href="indexAdmin.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="usuarios.php">Usuarios</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="pedidos.php">Pedidos</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmProductos.php">Productos</a>
				</li>
				<li class="nav-item">		
				<?php	
				if(!isset($_SESSION["usuario"]))
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
		<div class="cuerpo">
		ASD		
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