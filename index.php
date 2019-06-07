<?php 
	session_start();
	
?>
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
			  <a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="productos.php">Productos</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="contacto.php">Contacto</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="carrito.html">Carrito</a>
			</li>
			<li class="nav-item">		
		<?php	if(!isset($_SESSION["usuario"]))
	{ 
		echo "<a class='btn btn-outline-success' href='login.php'>Iniciar sesion</a> ";
	}
	else
	{
		echo " <a class='btn btn-outline-success' href='#'>Cerrar sesion</a>";
	}?>
			</li>
		  </ul>
		  <form class="form-inline" action="buscar.php" method="post" name="FormBuscador">
			<input class="form-control mr-sm-2" type="text" name="lupa" placeholder="buscar" />
			<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
		  </form>
		</nav>		
		<div class="cuerpo">
			<div id="somos"> 
				<h2 id="titulo2"> Quienes somos?</h2> 
				<p> Somos un supermercado de trayectoria, proporcionando productos y servicios para satisfacer
				las necesidades de nuestros clientes, procurando que los mismos se sientan beneficiados con un
				ambiente de confianza y familiaridad mediante un excelente servicio y precio justos, pues su
				satisfaccion es la nuestra. De igual forma, contribuimos a una mejor calidad de vida, a traves
				de un compromiso con los intereses de nuestros empleados y con la comunidad en general.</p>
			</div>
			<div class="row">
				<div class="card col50in" >
					<img class="img-circle imgI" src="promodesc.png" alt="Promociones" />
					<div class="card-body titInicio">
						<h4>Promociones</h4>
						<p class="titP">Aqui se encontraran las promociones y descuentos vigentes con las distintas tarjetas.</p>
					</div>
					<a class="btn btn-default" href="promo.html" role="button">Leer mas»</a>				
				</div>
				<div class="card col50in" id="col50d">
					<img class="img-circle imgI" src="destacado.jpg" alt="Productos destacados" />
					<div class="card-body titInicio">
						<h4>Productos Destacados</h4>
						<p class="titP">Aqui se encontrara el listado de los productos nuevos y los que tengan descuentos.</p>
					</div>
					<a class="btn btn-default" href="productosDesc.html" role="button">Leer mas»</a>				
				</div>		
			</div>

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