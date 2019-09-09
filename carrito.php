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
			<div class="row" name="pri">
				<div class="form-group  col33ca">
					<label>Fecha de entrega:</label>
					<input type="date" class="form-control" name="fechae" id="fechae"/>
					<div class="text-hide error" id="fechaerror" >Completar este campo.</div>
					<div class="text-hide error" id="fechaerror2" >La fecha NO puede ser menor a la actual.</div>
				</div>
				<div class="form-group  col33ca">
				<label name="horaec">Hora de entrega:</label>
					<input type="time" class="form-control" name="horae" id="horae"/>
					<div class="text-hide error" id="horaerror" >Completar este campo.</div>
				</div>
				<div class="form-group  col33ca">
					<label name="forma">Forma de pago:</label>
					<select name="formapago" class="form-control" id="formapago" >
						<option value="0" selected>Efectivo</option>
						<option value="1" >Credito</option>
						<option value="2" >Debito</option>
					</select>
					<div class="text-hide error" id="pagoerror" >Completar este campo.</div>
				</div>
			</div>
			<div class="row" name="pri">
				<div class="form-group coll5">
					<label>Direccion:</label>
					<input type="text" class="form-control" name="callec" id="callec" placeholder="Calle"/>
					<div class="text-hide error" id="calleerror">Completar este campo.</div>
				</div>
				<div class="espacio2"></div>
				<div class="form-group col15">
					<input type="text" class="form-control" name="numc" id="numc" placeholder="Numero"/>
					<div class="text-hide error" id="nrocalleerror">Completar este campo.</div>
				</div>
				<div class="espacio2"></div>
				<div class="form-group col15">
					<label class="textoblanco">l</label> 
					<input type="text" class="form-control" name="pisoc" placeholder="Piso"/>								
					<div class="text-hide error">Completar este campo.</div>
				</div>
				<div class="espacio2"></div>
				<div class="form-group col15">
					<label class="textoblanco">l</label>
					<input type="text" class="form-control" name="dptoc" placeholder="Dpto"/>								
					<div class="text-hide error">Completar este campo.</div>
				</div>
			</div>
			</br>
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
		//echo $_SESSION["carro"][$id];
		unset($_SESSION["carro"][$id]);
	}
}*/
?>
