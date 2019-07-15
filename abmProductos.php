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
				<?php	
				if(!isset($_SESSION["usuario"]))
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
				<input class="form-control mr-sm-2" type="text" name="lupa"  />
				<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
			  </form>
		 </nav>	
		<div class="cuerpo">
			<h2 class="titInicio verde">Panel de productos </h2>
			<form action="abmProductosSecundario.php"  method="post" id="formAbmProductos">
				<button class="btn btn-success" id="agregarProd" name="botonAbmProducto" type="submit" value="agregar">Agregar nuevo producto</button>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Producto</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>			
					<?php include('conexion.inc');
						$conscat="select count(*) from categorias ";
						$rta=mysqli_query($link,$conscat) or die(mysqli_error($link));
						$cat = mysqli_fetch_assoc($rta);
						$cantidad=$cat['count(*)'];
						for($i=1;$i<=$cantidad;$i++)
						{
							$consulta="select nombre_categoria,nombre_producto,id_producto from categorias inner join productos on categorias.id_categoria=productos.id_categoria where categorias.id_categoria = '$i' ";
							$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));
							$persona = mysqli_fetch_assoc($resp);
							?>
							<tr>
								<td><strong class="centrar"><?php echo $persona['nombre_categoria'];?></strong></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
							while($cat = mysqli_fetch_array($resp)) 
							{?>
							<tr>
								<td><?php echo $cat['nombre_producto'];?></td>
								<td><button class="btn btn-success" name="botonAbmProducto" type="submit" value="ver<?php echo $cat['id_producto'];?>">Ver</button> </td>
								<td><button class="btn btn-success" name="botonAbmProducto" type="submit" value="edi<?php echo $cat['id_producto'];?>">Editar</button></td>
								<td> <button class="btn btn-success" name="botonAbmProducto" type="submit" value="eli<?php echo $cat['id_producto'];?>">Eliminar</button></td>
							</tr>
						<?php 
							}
						
						}
							mysqli_free_result($resp);
							mysqli_close($link);
											
						?>
					</tbody>
				</table>
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