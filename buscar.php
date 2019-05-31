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
		<form action="invento.php" id="formProductos" name="formProductos" method="post" >
	<?php
		include("conexion.inc");
		$palabra=$_POST['lupa'];
		$consulta="select * from productos where nombre_producto like '".$palabra."%'";
		$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));;
		$c =mysqli_num_rows($resp);
		if( $c == 0) 
		{
			echo "No hay resultados respecto a la palabra que busca.";	
			echo "<a href='index.html'>Volver al inicio</a>";
		}
		else 
		{?>
			<h2>Resultados de la busqueda</h2>
	<?php
			while($cat = mysqli_fetch_array($resp)) 
			{?>
				<div class="card col33" >
					<img src="mostrarImagen.php?id=<?php echo $cat['id_producto'];?>" class="card-img-top imgPr"/> 
					<div class="card-body titInicio">
						<h1><?php echo $cat['nombre_producto'];?></h1>
						<h3 class="precio">$ <?php echo $cat['precio'];?></h3>
						<h6>Stock: <?php echo $cat['stock'];?></h6>
						<button type="submit" name="botonBebida" class="btn btn-primary" value="<?php echo $cat['nombre_producto'];?>">Agregar al carrito</button>
					</div>
				</div>
     		<?php
			} 		
		}
	?>
		</form>
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
