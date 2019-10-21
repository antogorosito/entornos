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
					<a class="nav-link" href="productos.php">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contacto.php">Contacto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color" href="faq.php">FAQ</a>
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
			<h2 class="titInicio verde">Preguntas frecuentes </h2>
			<ol type="1" class="top">
				<li><h6><b>¿Cual es la forma de pago?</b></h6></li>
				<p>El pago se realiza en el momento de la entrega del pedido, solo se especifica previamente si se paga en efectivo o con tarjeta de modo de que se lleve el posnet al domicilio del cliente. </p>
				<li><h6><b>¿Los pedidos sólo pueden ser realizados por internet?</b></h6></li>			  
				<p>Para entrega a domicilio solo se pueden realizar compras online.</p>
				<li><h6><b>¿Cuáles son los días y horarios de entrega de pedidos?</b></h6></li>
				<p>El cliente especifica el horarios y dia de entrega cuando realiza el pedido,pero solo se entrega de 8 a 13hs.</p>
				<li><h6><b>¿Puedo realizar un pedido fuera del horario de entrega? </b></h6></li>
				<p>Si,el pedido queda guardado y se envia en la fecha y hora especificada.</p>
				<li><h6><b>¿Cual es el costo de envio?</b></h6></li>
				<p>El costo es fijo de 200$, sin importar las distancias ni la cantidad de productos.</p>
				<li><h6><b>¿Necesito tener un usuario registrado para realizar un pedido?</b></h6></li>
				<p>Si, se piden datos basicos para tener un registro de quien realiza el pedido.</p>
			</ol>  
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