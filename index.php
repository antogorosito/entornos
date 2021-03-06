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
				<!-- para que funcione dropdown-->
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
					<a class="nav-link color" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="productos.php">Productos</a>
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
		<div id="contador">
			<?php 
			// Archivo para acumular el numero de visitas
			$archivo = "contador.dat";
			// Abrir el archivo para lectura
			$abrir = fopen($archivo, "r");
			// Leer el contenido del archivo
			$cont = fread($abrir, filesize($archivo));
			// Cerrar el archivo
			fclose($abrir);
			// Abrir nuevamente el archivo para escritura
			$abrir = fopen($archivo, "w");
			// Agregar 1 visita
			$cont = $cont + 1;
			// Guardar la modificaciÃƒÂ³n
			$guardar = fwrite($abrir, $cont);
			// Cerrar el archivo
			fclose($abrir);
			// Mostrar el total de visitas
			echo "<font face='arial' size='3'>Eres nuestro visitante Nro: ".$cont."</font>";
			?>
		</div>
		<div class="cuerpo">
			<div id="cartas" class="row">
				<div class="card col50in" >
					<img class="img-circle imgI" src="promodesc.png" alt="Promociones" />
					<div class="card-body titInicio">
						<h4 class="verde">Promociones</h4>
					</div>
					<a class="leerMas btn btn-success btn-sm" href="promociones.php" >Leer mas</a>					
				</div>
				<div class="card col50in" id="col50d">
					<img class="img-circle imgI" src="destacado.jpg" alt="Productos destacados" />
					<div class="card-body titInicio">
						<h4 class="verde">Productos Destacados</h4>
					</div>
					<a class="leerMas btn btn-success btn-sm" href="productosDestacados.php" >Leer mas</a>				
				</div>		
			</div>
			<div id="somos"> 
				<h2 id="titulo2" class="verde"> Quienes somos?</h2> 
				<p id="textoIndex"> Somos un supermercado de trayectoria, proporcionando productos y servicios para satisfacer
				las necesidades de nuestros clientes, procurando que los mismos se sientan beneficiados con un
				ambiente de confianza y familiaridad mediante un excelente servicio y precio justos, pues su
				satisfaccion es la nuestra. De igual forma, contribuimos a una mejor calidad de vida, a traves
				de un compromiso con los intereses de nuestros empleados y con la comunidad en general.</p>
			</div>
			<div id="gps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.8272418577344!2d-60.682677002010855!3d-32.92916232837447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b653540f2c8441%3A0x7e3321f885266ca7!2sDon+Bosco%2C+Rosario%2C+Santa+Fe!5e0!3m2!1ses-419!2sar!4v1561072918075!5m2!1ses-419!2sar" alt="Mapa" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>		
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

