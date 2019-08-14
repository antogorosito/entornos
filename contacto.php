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
		<script type="text/javascript" src="contacto.js"></script>
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
			<h2 class="titInicio verde">Formulario de contacto </h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="needs-validation formulario"  name="formContacto" id="formContacto" method="post"> <!-- la validacion la haria con javscript -->
				<div class="form-group top">
					<label>Nombre y apellido:</label>
					<input type="text" class="form-control" placeholder="Ingrese su nombre y apellido" name="nombre" id="nombre">
					<div class="text-hide error" id="userror" >Completar este campo.</div>
				</div>
				<div class="form-group">
					<label for="em">Email:</label>
					<input type="email" class="form-control" placeholder="Ingrese su email" name="emailC" id="emailC" >
					<div class="text-hide error" id="emailerror">Completar este campo.</div>
					<div class="text-hide error" id="emailerror2">Debe tener formato xx@xx.com.</div>
				</div>				
				<div class="form-group">
					<label for="ar">Mensaje</label>
					<textarea class="form-control" name="msjmail" id="msjmail" placeholder="Ingrese su mensaje" ></textarea>
					<div class="text-hide error" id="textoerror" >Completar este campo.</div>
				</div>
			       <button id="btnContacto"  class="btn btn-success" name="btnContacto">Enviar mensaje</button>
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
<?php 
	if(isset($_POST["btnContacto"]))
	{
		$fecha=date("d-m-Y");
		$destino="entornosGraficos1@gmail.com";
		$asunto="Comentario";
		$comentario= " <html>
		<head>
		<title>Mail de contacto</title>
		</head>
		<body>
			".$_POST['msjmail']."
			</br>
			</br>
			<p>Enviado el dia ".$fecha." por ".$_POST['nombre'].", ".$_POST['emailC']."</p>
		</body>
		</html>";
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//mail($destino,$asunto,$comentario,$cabeceras);
?>
		<script> 
			alertify.alert('Confirmacion','Su consulta ha sido enviada, en breve recibira nuestra respuesta.',
			function(){
			alertify.success('Ok');
			window.location= 'contacto.php'
			});
			/*alert('Su consulta ha sido enviada, en breve recibira nuestra respuesta.');
			window.location= 'contacto.php'*/
		</script>

<?php	
	}
?>