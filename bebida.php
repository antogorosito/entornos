<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen">
		<title>Supermercado SAV</title>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <!-- Brand/logo -->
		  <a class="navbar-brand" href="index.html">
		    <img src="titulo.jpg" alt="Logo" style="width:15vw;" />
		  </a>
 		
  <!-- Links -->
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link" href="index.html">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="productos.html">Productos</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="contacto.html">Contacto</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="carrito.html">Carrito</a>
			</li>
			<li class="nav-item">
			  <a class="btn btn-outline-success" href="login.html">Iniciar sesion</a>
			</li>
		  </ul>
		  <form class="form-inline" action="buscar.php" method="post" name="FormBuscador">
			<input class="form-control mr-sm-2" type="text" name="lupa" placeholder="buscar" />
			<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
		  </form>
		</nav>
		<div class="cuerpo">
		<?php
		include("conexion.inc");
		$consulta="select * from categorias inner join productos on categorias.id_categoria=productos.id_categoria where categorias.id_categoria =2";
		$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));;
		$c =mysqli_num_rows($resp);
		while($cat = mysqli_fetch_array($resp)) 
		{
     	?><label><?php	$cat['nombre_producto'] ?></label>
		<?php
		} 		

		?>
		</div>
		<div class="footer"> 
			<div class="col33">Supermercado SAV </div>
			<div class="col33">San Martin 1234. Rosario,Santa Fe.</div> 
			<div class="col33">Tel: (0341)-4322245</div>
		</div>
	</body>
</html>