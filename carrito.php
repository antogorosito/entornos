<?php 
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
		<title>Supermercado SAV</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
		<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
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
					<a class="nav-link " href="faq.php">FAQ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color" href="carrito.php">Carrito</a>
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
		<?php 
		if(!isset($_SESSION['usuario']))
		{ ?>
			<script> 
			alertify.alert('Error','Debe iniciar sesion para ver el carrito',function(){
				alertify.success('Ok');
				window.location= 'login.php'
			});
		</script>
		<?php }
		else
		{ ?>
		<h2 class="titInicio verde">Carrito de compras </h2>
		<form action="botonesCarrito.php" class="needs-validation formAbmProductos" method="post">		
			<table class="table table-hover">
					<thead>
						<tr>
							<th>Producto</th>
							<th></th>
							<th>Cantidad</th>
							<th></th>
							<th>Precio</th>
							<th>Subtotal</th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
					<?php
					if(isset($_SESSION["carro"]))
					{	
						$total=0;
						foreach($_SESSION["carro"] as $k =>$v)
						{ 
							$total=$total+$v['precio']*$v['cantidad'];
				// $k es el id	, $v es las variables	
					 ?>	
						<tr>
							<td><?php echo $k;?></td>
							<td><button class="btn btn-success" name="btnAg"  value="men<?php echo $k;?>">-</button></td>
							<td><span name="cantidad<?php echo $v['id'];?>" id="cantidad<?php echo $v['id'];?>"><?php echo $v['cantidad'];?></span></td>
							<td><button class="btn btn-success" name="btnAg" id="mas" value="mas<?php echo $k;?>" >+</button></td>
							<td><?php echo $v['precio'];?></td>
							<td><?php echo $v['precio']*$v['cantidad'];?></td>
							<td><button class="btn btn-success" name="btnAg" value="eli<?php echo $k;?>">Eliminar</button></td>
							
						</tr>
						
				<?php }	?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><b>Total</b></td>
							<td><?php echo $total;?></td>
						</tr>
			<?php		}?>						
						</tbody>
				</table>
				<button class="btn btn-success aa" name="btnAg" value="com<?php echo $total;?>" id="comprar">Comprar</button>		
			</form>
		<?php } ?>
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
