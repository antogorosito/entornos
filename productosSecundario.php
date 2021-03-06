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
			<a class="navbar-brand" href="index.php">
				<img src="titulo.jpg" alt="Logo" style="width:15vw;" />
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color" href="productos.php">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contacto.php">Contacto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="faq.php">FAQ</a>
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
				<input class="form-control mr-sm-2" type="text" name="lupa" />
				<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
			</form>
		</nav>	
		<div class="cuerpo">
			<form action="busqueda.php" id="formProductos" name="formProductos" method="post" >
			<?php
				include("conexion.inc");
				$boton=$_POST['botonProducto'];
				$consulta="select id_producto ,precio,stock,nombre_producto from categorias inner join productos on categorias.id_categoria=productos.id_categoria where categorias.nombre_categoria = '$boton'";
				$resp = mysqli_query($link,$consulta);
				?>
				<h3 class="titPro verde"> Resultados de <?php echo $boton?></h3>
				<?php
				while($cat = mysqli_fetch_array($resp)) 
				{?>
					<div class="card cardProducto col33" >
						<img src="mostrarImagen.php?id=<?php echo $cat['id_producto'];?>" alt="<?php echo $cat['nombre_producto'];?>" class="card-img-top imgPr"/> 
						<div class="card-body">
							<div class="primeroCard">
								<h4 class="titInicio"><?php echo $cat['nombre_producto'];?></h4>
							</div>
							<div class="primeroCard">
							<h5 class="verde">$ <?php echo $cat['precio'];?></h5>
							<h6>Stock: <?php echo $cat['stock'];?></h6>
							</div>
							<div class="terceroCard">
								<button  id="btnBusqueda" name="btnBusqueda" class="btn btn-success" value="<?php echo $cat['id_producto'];?>">Agregar al carrito</button>
							</div>
						</div>
					</div>
				<?php 
				}
				mysqli_free_result($resp);
				mysqli_close($link);?>
			</form> 
		</div>	
		<footer>
			<div class="footer-container">
				<div class="footer-main">
					<div class="footer-columna">Supermercado SAV </div>
					<div class="footer-columna">San Martin 1234. Rosario,Santa Fe.</div> 
					<div class="footer-columna">Tel: (0341)-4322245</div>
					<div class="footer-columna">
						<p>
							<a href="http://jigsaw.w3.org/css-validator/check/referer">
								<img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="¡CSS Válido!" />
							</a>
						</p>	
					</div>
				</div>
			  </div>
		</footer>
	</body>
</html>
