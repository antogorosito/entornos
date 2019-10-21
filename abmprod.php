<?php 
	session_start();
	if(isset($_SESSION["usuario"]))
	{ 
		if(isset($_SESSION["tipo"]))
		{
			$tipo=$_SESSION["tipo"];
			if($tipo==1)
			{
				 echo "<script> window.location='error.php'; </script>";
			}
		}
	}
	else
	{
		echo "<script> window.location='error.php'; </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
		<title>Supermercado SAV</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
		<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
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
				  <a class="nav-link" href="homeAdmin.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmUsuarios.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<div class='btn-group'>
						<a  class='nav-link dropdown-toggle' data-toggle='dropdown'>Pedidos</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='pedidos.php'>Panel de pedidos</a>
							<a class='dropdown-item' href='informesVenta.php'>Informes de venta</a>
						</div>
					</div>
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
					echo "<div class='btn-group'>
					<button type='button' class='btn btn-outline-success dropdown-toggle' data-toggle='dropdown'>
					".$_SESSION['nombre']."
					</button><div class='dropdown-menu'><a class='dropdown-item' href='cerrarSesion.php'>Cerrar sesion</a></div></div> ";
				}?>
				</li>
			</ul>
		</nav>
		<div id="cuerdo" class="cuerpo">
			<?php
				include("conexion.inc");
				$boton=$_POST['botonAbmProd'];
				$stock=$_POST['stock'];
				$producto=$_POST['nombre_producto'];
				$precio=$_POST['precio'];
				$categoria=$_POST['nombre_categoria'];
				$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); // analizar si va aca o dentro del agregar y en modificar solo si es nueva imagen, y sino tomar la que esta ya cargada
				if($boton=="modificar")
				{
					$id=$_POST['id_producto1'];			
					$vSql="update productos set nombre_producto='$producto', stock='$stock', precio='$precio', foto='$imagen', id_categoria='$categoria' where id_producto='$id'"; 
					mysqli_query($link,$vSql) or die(mysqli_error($link));
				?>
				<script> 
					alertify.alert('Exito','Se ha modificado el producto.',
  					function() {
					alertify.success('Ok');
					window.location= 'abmProductos.php';
  					});
				</script>
				<?php
				}
				elseif($boton=="agregar")
				{ 
					$consulta="insert into productos(nombre_producto,precio, stock,id_categoria,foto) values('$producto','$precio','$stock','$categoria','$imagen')"; 
					mysqli_query($link,$consulta) or die(mysqli_error($link));
				?>
				<script>
					alertify.alert('Exito','Se ha agregado un nuevo producto.',
  					function() {
					alertify.success('Ok');
					window.location= 'abmProductos.php';
  					});
				</script>
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
