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
				  <a class="nav-link" href="homeAdmin.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmUsuarios.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<div class='btn-group'>
						<a  class='nav-link dropdown-toggle color' data-toggle='dropdown'>Pedidos</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='pedidos.php'>Panel de pedidos</a>
							<a class='dropdown-item color' href='informesVenta.php'>Informes de venta</a>
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
			<h2 class="titInicio verde">Ventas </h2>
			<form action="abmProductosSecundario.php"  method="post" class="formAbmProductos">
				<table class="table table-hover">
					<thead>
					<?php include('conexion.inc');
						$semana=date('W'); 
						$cantSemanal=0;
						$pedidos="select * from pedidos ";
						/*ventas semanales*/
						$rta=mysqli_query($link,$pedidos) or die(mysqli_error($link));
						while($ped = mysqli_fetch_array($rta)) 
						{
							if(date('W', strtotime($ped['fecha_pedido']))==$semana)
							{
								$cantSemanal=$cantSemanal+1;
							}
						}
					?>
						<tr>
							<th>Cantidad total de ventas semanales</th>
							<th><?php echo $cantSemanal;?></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Id pedido</th>
							<th>Subtotal</th>
							<th>Producto</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>			

					<?php	
						$mesactual=date("m"); 
						$anioactual=date("Y"); 
						$consulta="select * from pedidos where month(fecha_pedido)='$mesactual' and year(fecha_pedido)='$anioactual' group by fecha_pedido order by fecha_pedido";
						$rta2=mysqli_query($link,$consulta) or die(mysqli_error($link));
						while($pedidos = mysqli_fetch_array($rta2)) 
						{
							if(date('W', strtotime($pedidos['fecha_pedido']))==$semana)
							{ 
								$fecha=$pedidos['fecha_pedido'];
							
						?>
								<tr>
									<td><strong class="centrar"><?php echo $pedidos['fecha_pedido'];?></strong></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<?php
								$consulta2="select * from pedidos inner join lineadepedido on lineadepedido.id_pedido=pedidos.id_pedido inner join productos on productos.id_producto=lineadepedido.id_producto where fecha_pedido='$fecha' ";
								$rta3=mysqli_query($link,$consulta2) or die(mysqli_error($link));
								while($pedidos2 = mysqli_fetch_array($rta3)) 
								{ 
									$id=$pedidos2['id_pedido'];
								?>
								<tr>
									<td><?php echo $pedidos2['id_pedido'];?></td>
									<td><?php echo $pedidos2['subtotal'];?></td>						
									<td><?php echo $pedidos2['nombre_producto'];?></td>
									<td><?php echo $pedidos2['cantidad'];?></td>				
								</tr>
						<?php
								}
								$con="select * from pedidos inner join entregas on entregas.id_entrega=pedidos.id_entrega where pedidos.id_pedido='$id'";
								$rta4=mysqli_query($link,$con) or die(mysqli_error($link));
								$pedi = mysqli_fetch_assoc($rta4);
								?>
								<tr>
									<td>Costo de entrega</td>
									<td><?php echo $pedi['costo_envio'];?></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td><strong>Total</strong></td>
									<td><?php echo $pedi['importe_total'];?></td>
									<td></td>
									<td></td>
								</tr>
							<?php
							}
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
			</div>
		  </div>
		</footer>
	</body>
</html>
