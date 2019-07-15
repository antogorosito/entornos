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
				  <a class="nav-link" href="usuarios.php">Usuarios</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="pedidos.php">Pedidos</a>
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
				$boton=$_POST['botonAbmProd'];
				$stock=$_POST['stock'];
				$producto=$_POST['nombre_producto'];
				$precio=$_POST['precio'];
				$categoria=$_POST['nombre_categoria'];
				
				//$imagen=$_POST['imagen'];
				if($boton=="modificar")
				{
					$id=$_POST['id_producto'];			
					$vSql="update productos set nombre_producto='$producto', stock='$stock', precio='$precio', id_categoria='$categoria' where id_producto=$id"; 
					mysqli_query($link,$vSql) or die(mysqli_error($link));
				?>
				<script> 
					alert('Se ha modificado el producto.');
					window.location= 'abmProductos.php'
				</script>
				<?php
				}
				elseif($boton=="agregar")
				{ // agregar foto
					$consulta="insert into productos(nombre_producto,precio, stock,id_categoria) values('$producto','$precio','$stock','$categoria')"; 
					mysqli_query($link,$consulta) or die(mysqli_error($link));
				?>
				<script> 
					alert('Se ha agregado un nuevo producto.');
					window.location= 'abmProductos.php'
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