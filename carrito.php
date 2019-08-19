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
			<script type="text/javascript" src="busqueda.js"></script>
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
		
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Producto</th>
							<th></th>
							<th>Cantidad</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>	
					<?php
					if(!isset($_SESSION["carro"]))
					{			
						echo " vacio";
					}
					else
					{					
						foreach($_SESSION["carro"] as $value =>$d)
						{
				//echo "asd" .$value. "asd " .$d;		?>
						<tr>
							<td><?php echo $value;?></td>
							<td><button class="btn btn-success" name="btnAg" onClick="menos()" value="men">-</button></td>
							<td><b id="cantidad"><?php echo $d;?></b></td>
							<td><button class="btn btn-success" name="btnAg" onClick="mas()"value="mas">+</button></td>
							<td><button class="btn btn-success" name="btnAg" value="eli<?php echo $value;?>">Eliminar</button></td>
						</tr>		
				  <?php }	
					}?>						
					</tbody>
				</table>		
			
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
<?php /*
if(isset($_POST["btnAg"]) )
{
	$boton=$_POST["btnAg"];
	$botonInicio=substr($boton,0,3);
	$id=substr($boton,3);
	if($botonInicio=="eli")
	{
		session_unset($_SESSION["carro"][]);
	}
}*/
?>