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
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="index.html">
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
					<a class="nav-link" href="carrito.html">Carrito</a>			
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
	<?php
		include("conexion.inc");
		$boton=$_POST['botonInicio'];
		if($boton=="inicio")
		{
			$vUsuario=$_POST['usuario'];
			$vClave=$_POST['clave'];
			// armo sql y ejecuto
			$vSql="select count(usuario) from usuarios where usuario='$vUsuario'";
			$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
			$cantidad = mysqli_fetch_assoc($vResultado);
			if($cantidad['count(usuario)'] > 0)
			{
				// que aca te aparezca que iniciaste sesion pero onda popup si se puede
				//asi no se abre otra pagina diciendo solamente "inicio de sesion exitoso"
				// deberia llevarte devuelta al index, pero arriba en vez de decir login, que diga el nombre del usuario
				$vSql="select count(usuario) from usuarios where usuario='$vUsuario' and clave='$vClave'";
				$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
				$cantClave = mysqli_fetch_assoc($vResultado);
				if($cantClave['count(usuario)'] > 0)
				{
					$vSql="select nombre, apellido, personas.dni,mail,direccion,telefono,fechaNac
						  from personas inner join usuarios on usuarios.dni=personas.dni
						  where usuario='$vUsuario' and clave='$vClave'";
					$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
					$persona = mysqli_fetch_assoc($vResultado);
					$nombre=$persona['nombre'];
					$apellido=$persona['apellido'];
					$dni=$persona['dni'];
					$mail=$persona['mail'];
					$direccion=$persona['direccion'];
					$telefono=$persona['telefono'];
					$fecha=$persona['fechaNac'];
					$nomPersona=$nombre.' '.$apellido;
					$_SESSION['nombre'] = $nomPersona;
					$_SESSION['mail'] = $mail;
					$_SESSION['usuario'] = $vUsuario;
					$_SESSION['telefono'] = $telefono;
					$_SESSION['direccion'] = $direccion;
					$_SESSION['fecha'] = $fecha;
					$_SESSION['dni'] = $dni;
					if($persona['tipo_usuario']==1)
					{
						header ("Location: index.php");
					}
					else
					{
						header ("Location: homeAdmin.php");
					}
					
				}
				else
				{
					echo("La clave ingresada es incorrecta<br/>");
					echo("<a href='login.php' class='btn btn-success'>Volver al login</a>");
				}
			}
			else
			{				
				echo("El usuario ingresado es incorrecto<br/>");	
				echo("<a href='login.php' class='btn btn-success'>Volver al login</a>");
			}
			//libero resultados 
			mysqli_free_result($vResultado);
			//cierro conexion
			mysqli_close($link);
		}
		else if($boton=="registro")
		{
			header ("Location: registrar.php");
		}
		else
		{ //olvido contraseña.
	$vUsuario=$_POST['usuario'];
			$consulta="select * from usuarios inner join personas on personas.dni=usuarios.dni where usuario='$vUsuario'";
			$resp = mysqli_query($link,$consulta);
			$user = mysqli_fetch_assoc($resp);
			$fecha=date("d-m-Y");
			$hora= date("H :i:s");
			$destino="antonellabj21@gmail.com";
			$asunto="Comentario";
			$desde=$user['mail'];
			$comentario= $_POST['text'];
			mail($destino,$asunto,$comentario,$desde);
			echo ("Su consulta ha sido enviada, en breve recibira nuestra respuesta.");
			echo ("<a href='index.php'>Volver al inicio</a>");
			
			header ("Location: index.php");
		}
	?>
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

