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
		<script type="text/javascript" src="carrito.js"></script>
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
			<h2 class="titInicio verde">Datos de envio </h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="needs-validation formAbmProductos"  method="post" >
				<div class="row conf">
					<div class="form-group  col33ca">
						<label><b>Fecha de entrega:</b></label>
						<input type='date' class='form-control' name='fechae' id='fechae'/>		
						<div class="text-hide error" id="fechaerror" >Completar este campo.</div>
						<div class="text-hide error" id="fechaerror2" >La fecha NO puede ser menor a la actual.</div>
					</div>
					<div class="form-group  col33ca">
					<label><b>Hora de entrega:</b></label>
						<input type='time' class='form-control' name='horae' id='horae' min='08:00' max='13:00' />	
						<div class="text-hide error" id="horaerror" >Completar este campo.</div>
					</div>
					<div class="form-group  col33ca">
						<label><b>Forma de pago:</b></label>
						<select name="formapago" class="form-control" id="formapago" >
							<option value='0' selected>Efectivo</option>
							<option value='1' >Credito</option>	
							<option value='2' >Debito</option>
						</select>
					</div>
				</div>
				<div class="row conf">
					<div class="form-group coll5">
						<label><b>Direccion:</b></label>
						<input type="text" class="form-control" name="calleC" id="calleC" placeholder="Calle"/>
						<div class="text-hide error" id="calleerror">Completar este campo.</div>
					</div>
					<div class="espacio2"></div>
					<div class="form-group coll5">
						<label><b>Numero:</b></label>
						<input type="text" class="form-control" name="numC" id="numC" placeholder="Nro" />
					</div>
					<div class="espacio2"></div>
					<div class="form-group coll5">
						<label><b>Piso:</b></label>
						<input type="text" class="form-control" name="pisoC" id="pisoC" placeholder="Piso"/>
					</div>
					<div class="espacio2"></div>
					<div class="form-group coll5">
						<label><b>Dpto:</b></label>
						<input type="text" class="form-control" name="dptoC" id="dptoC" placeholder="Dpto"/>
					</div>
				</div>
				<table class="table table-hover top">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>	
					<?php
					if(isset($_SESSION["carro"]))
					{	
						$total=0;
						foreach($_SESSION["carro"] as $k =>$v)
						{ 
							$total=$total+$v['precio']*$v['cantidad']; ?>	
						<tr>
							<td><?php echo $k;?></td>
							<td><span name="cantidad<?php echo $v['id'];?>" id="cantidad<?php echo $v['id'];?>"><?php echo $v['cantidad'];?></span></td>
							<td><?php echo $v['precio'];?></td>
							<td><?php echo $v['precio']*$v['cantidad'];?></td>	
						</tr>					
				<?php }	?>
						<tr>
							<td></td>
							<td></td>
							<td><b>Total</b></td>
							<td><?php echo $total;?></td>
						</tr>
			<?php		}?>						
					</tbody>
				</table>
					<button class="btn btn-success botonConfirmacion" name="btnCf" id="confirmar">Confirmar</button>		
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
<?php
if(isset($_POST["btnCf"]) )
{
	include("conexion.inc"); 
	$direccion=$_POST['calleC'] .' '. $_POST['numC'] .' '. $_POST['pisoC'] .' '. $_POST['dptoC']; 
	$fecha_entrega=$_POST['fechae'];
	$hora_entrega=$_POST['horae'];
	if($_POST['formapago']==0)
	{
		$pago="Efectivo";
	}
	else if($_POST['formapago']==1)
	{
		$pago="Credito";
	}
	else
	{
		$pago="Debito";
	}
	$fecha_actual=date('Y-m-d'); 
	$hora_actual=date("H:i:s");
	$costo=200;
	$estado="pendiente";
	$total=$_SESSION['total'];	
	$usuario=$_SESSION['usuario'] ;
	$consulta1="insert into entregas(costo_envio,dia_entrega,direccion_entrega,estado_entrega,hora_entrega) values('$costo','$fecha_entrega','$direccion','$estado','$hora_entrega')";
	mysqli_query($link,$consulta1) or die(mysqli_error($link));
	$id_entrega = mysqli_insert_id($link);
	$consulta2="insert into pedidos(fecha_pedido,forma_pago,hora_pedido,id_entrega,importe_total,usuario) values('$fecha_actual','$pago','$hora_actual','$id_entrega','$total','$usuario')";
	mysqli_query($link,$consulta2) or die(mysqli_error($link));
	$id_pedido = mysqli_insert_id($link);
	foreach($_SESSION["carro"] as $k =>$v)
	{
		$cantidad=$v['cantidad'];	
		$subtotal=$v['precio']*$v['cantidad'];
		$nombre=$k;
		$consulta4="select id_producto from productos where nombre_producto='$nombre'";
		$rta=mysqli_query($link,$consulta4) or die(mysqli_error($link));
		$producto = mysqli_fetch_assoc($rta);
		$idp=$producto['id_producto'];
		$consulta3="insert into lineadepedido(cantidad,id_pedido,id_producto,subtotal) values('$cantidad','$id_pedido','$idp','$subtotal')";
		mysqli_query($link,$consulta3) or die(mysqli_error($link));
	}
	unset($_SESSION["carro"] );
?>
	<script> 
		alertify.alert('Confirmacion','Se ha creado un pedido.',	function(){
			alertify.success('Ok');					
			window.location= 'index.php';
		});
	</script>
<?php 
}
?>
