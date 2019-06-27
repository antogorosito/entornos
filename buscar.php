<?php 
	session_start();
?>
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
		
		<form action="invento.php" id="formProductos" name="formProductos" method="post" >
		<?php
		include("conexion.inc");
		$palabra=$_POST['lupa'];
		$consulta="select * from productos where nombre_producto like '".$palabra."%' order by nombre_producto";
		$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));;
		$c =mysqli_num_rows($resp);
		if( $c == 0) 
		{
			?>
			<h3>No se encontraron coincidencias con <?php echo $palabra?></h3>
			<?php
		}
		else 
		{?>
			<h2 class="titPro verde" >Resultados de la busqueda</h2>
		<?php
			while($cat = mysqli_fetch_array($resp)) 
			{?>
				<div class=" card cardProducto col33" >
						<img src="mostrarImagen.php?id=<?php echo $cat['id_producto'];?>" class="card-img-top imgPr"/> 
						<div class="card-body ">
							<div class="primeroCard">
								<h4 class="titInicio"><?php echo $cat['nombre_producto'];?></h4>
								<h5 class="verde">$ <?php echo $cat['precio'];?></h5>
								<h6>Stock: <?php echo $cat['stock'];?></h6>
							</div>
							<div class="segundoCard">
								<button type="submit" name="botonBebida" class="btn btn-success" value="<?php echo $cat['nombre_producto'];?>">Agregar al carrito</button>
							</div>
						</div>
					</div>
				
     		<?php
			} 		
		}
			//libero resultados 
	mysqli_free_result($resp);
	//cierro conexion
	mysqli_close($link);
	?>
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

