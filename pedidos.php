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
				  <a class="nav-link" href="homeAdmin.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmUsuarios.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<div class='btn-group'>
						<a  class='nav-link dropdown-toggle color' data-toggle='dropdown'>Pedidos</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item color' href='pedidos.php'>Panel de pedidos</a>
							<a class='dropdown-item' href='informesVenta.php'>Informes de venta</a>
						</div>
					</div>
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
		 </nav>	
		<div class="cuerpo">
			<h2 class="titInicio verde">Panel de pedidos </h2>
			<form action="abmProductosSecundario.php"  method="post" class="formAbmProductos">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Fecha y hora pedido</th>
							<th>Importe</th>
							<th>Usuario</th>
							<th>Direccion entrega</th>
							<th>Fecha y hora entrega</th>
						</tr>
					</thead>
					<tbody>			
					<?php include('conexion.inc');
						$hoy=date('Y-m-d'); 
						$conscat="select * from pedidos inner join entregas on entregas.id_entrega=pedidos.id_entrega where dia_entrega>='$hoy'";
						$rta=mysqli_query($link,$conscat) or die(mysqli_error($link));
						while($ped = mysqli_fetch_array($rta)) 
							{?>
							<tr>
								<td><?php echo $ped['id_pedido'];?></td>
								<td><?php echo $ped['fecha_pedido'].' '.$ped['hora_pedido'];?></td>
								<td><?php echo $ped['importe_total'];?></td>						
								<td><?php echo $ped['usuario'];?></td>
								<td><?php echo $ped['direccion_entrega'];?></td>
								<td><?php echo $ped['dia_entrega'].' '.$ped['hora_entrega'];?></td>
							</tr>
						<?php 
							}
						mysqli_free_result($rta);
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
