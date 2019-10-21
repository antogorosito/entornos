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
		<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
		<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
		<script type="text/javascript" src="login.js"></script>
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
			<h2 class="titInicio verde">Olvido de contraseña</h2>
			<div class="formulario">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" id="formOlvidoClave" name="formOlvidoClave" method="post">
					<div class="form-group">
						<label >Email:</label>
						<?php 
					if(!isset($_COOKIE['emailolvido']))
					{
						echo '<input type="mail" class="form-control" placeholder="Ingrese su email" name="emailo" id="emailo" >';
					}
					else{
						echo "<input type='mail' class='form-control' placeholder='Ingrese su email' name='emailo' id='emailo' value=".$_COOKIE['emailolvido'].">";
					}
					?>	
						<div class="text-hide error" id="errorolvido">Completar este campo.</div>
					</div>	
					<button id="btnOlvidar" type="submit" class="btn btn-success" name="btnOlvidar">Enviar</button>					
				</form>
			</div>
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
	if(isset($_POST["btnOlvidar"]))
	{
		include("conexion.inc");
		$mail=$_POST['emailo'];
		$consulta="select * from usuarios inner join personas on personas.dni=usuarios.dni where mail='$mail'";
		$resp = mysqli_query($link,$consulta);
		$user = mysqli_fetch_assoc($resp);
		if(isset($user))
		{
			$asunto="Recuperacion de contraseña";
			$destino=$mail;
			$comentario= "
			<html>
			<head>
			<title>Mail de recuperacion de clave</title>
			</head>
			<body>
				<p>Este es un mail automatico de recuperacion de la contraseña.</p>
				<p>Usuario:".$user['usuario']."</p>
				<p>Contraseña:".$user['clave']."</p>
				<p>Saludos, atentamente Supermercado SAV.</p>
			</body>
			</html>";
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($destino,$asunto,$comentario,$cabeceras);
		?>
		<script> 
			alertify.alert('Confirmacion','Su consulta ha sido enviada, en breve recibira nuestra respuesta.',function(){
				alertify.success('Ok');
				window.location= 'index.php';
			});
		</script>
		<?php
		}
		else
		{
			setcookie("emailolvido","$mail",time()+15);
		?>
		<script> 
			alertify.alert('Error','El email ingresado no esta vinculado con ninguna cuenta existente.',function(){
				alertify.success('Ok');					
				window.location= 'olvidoClave.php';
			});
		</script>
		<?php
		}
		mysqli_free_result($resp);
		mysqli_close($link);
	} 
?>