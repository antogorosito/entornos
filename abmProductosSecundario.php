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
				$boton=$_POST['botonAbmProducto'];
				$botonInicio=substr($boton,0,3);
				$id=substr($boton,3);
				if($botonInicio=="ver" || $botonInicio=="edi"){
					$consulta="select id_producto,nombre_categoria ,precio,stock,nombre_producto from categorias inner join productos on categorias.id_categoria=productos.id_categoria where id_producto = '$id'";
					$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));
					$prod = mysqli_fetch_assoc($resp);
					if($botonInicio=="ver"){?>
					<h2 class="titInicio verde ">Ver producto </h2>
					<?php
					} 
					elseif($botonInicio=="edi"){?>
					<h2 class="titInicio verde ">Modificar producto </h2>
					<?php }?>
					<form action="abmprod.php" class="formulario" name="abmprod" method="post">
						<div class="row top">
							<div class="form-group col40 ">
								<label>Producto:</label>
								<input type="text" class="form-control" name="nombre_producto" value="<?php echo $prod['nombre_producto']; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label >Id:</label>
								<input type="number" class="form-control" name="id_producto" value="<?php echo $prod['id_producto']; ?>"  required >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Stock:</label>
								<input type="number" class="form-control" name="stock" value="<?php echo $prod['stock']; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Precio:</label>
								<input type="text" class="form-control" name="precio" value="<?php echo $prod['precio']; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Foto:</label>
								<img src="mostrarImagen.php?id=<?php echo $prod['id_producto'];?>" class="imgPr"/> 
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Categoria:</label>
								<select name="nombre_categoria">
								
								<?php 
									$consulta="select * from categorias";
									$respuesta = mysqli_query($link,$consulta) or die(mysqli_error($link));
									while($cat = mysqli_fetch_array($respuesta)) 
									{
										if( $cat['nombre_categoria']==$prod['nombre_categoria'])
										{?>
											<option value="<?php echo $cat['id_categoria'];?>" selected><?php echo $cat['nombre_categoria'];?></option>
										<?php
										}
										else{ ?>
											<option value="<?php echo $cat['id_categoria'];?>" ><?php echo $cat['nombre_categoria'];?></option>
										<?php
										}					
									}
								?>
								</select>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<?php 
						if($botonInicio=="edi")
						{ ?>
								<button class="btn btn-success" name="botonAbmProd" value="modificar">Guardar</button>
						<?php
						} ?>
					</form>
				<?php
				}
				elseif($botonInicio=="eli")
				{
					$vSql="delete from productos where id_producto=$id"; 
					mysqli_query($link,$vSql) or die(mysqli_error($link));
			?>
					<script> 
						alert('Se ha eliminado con exito el producto');
						window.location= 'abmProductos.php';
					</script>
			<?php
				}
				if($boton=="agregar"){
					?>
					<h2 class="titInicio verde ">Nuevo producto </h2>
					<form action="abmprod.php" class="formulario" name="abmprod" method="post">
						<div class="row top">
							<div class="form-group col40 ">
								<label>Producto:</label>
								<input type="text" class="form-control" name="nombre_producto" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>

						</div>
						<div class="row">
							<div class="form-group ">
								<label >Stock:</label>
								<input type="number" class="form-control" name="stock" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Precio:</label>
								<input type="text" class="form-control" name="precio" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Foto:</label>
								<input type='file' name='imagen' id="imagen">
							</div>
						</div>
						<div class="row">
							<div class="form-group ">
								<label >Categoria:</label>
								<select name="nombre_categoria">
								
								<?php 
									$consulta="select * from categorias";
									$respuesta = mysqli_query($link,$consulta) or die(mysqli_error($link));
									while($cat = mysqli_fetch_array($respuesta)) 
									{?>
										<option value="<?php echo $cat['id_categoria'];?>" ><?php echo $cat['nombre_categoria'];?></option>
									<?php }?>
								</select>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<button class="btn btn-success" name="botonAbmProd" value="agregar">Guardar</button>
						
					</form>
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