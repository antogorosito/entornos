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
			<h2 class="titInicio verde">Iniciar sesion </h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="needs-validation formulario"  name="formIniciarSesion" id="formIniciarSesion" method="post" >
				<div class="form-group top">
					<label for="uname">Usuario:</label>
					<?php 
					if(!isset($_COOKIE['usuariologin']))
					{
						echo '<input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" id="usuario" value="anto">';
					}
					else
					{
						echo "<input type='text' class='form-control' placeholder='Ingrese su usuario' name='usuario' id='usuario' value=".$_COOKIE['usuariologin'].">";
					}
					?>	
					<div class="text-hide error" id="usuarioerror">Completar este campo.</div>
				</div>
				<div class="form-group top">
					<label for="pwd">Clave:</label>
					<?php 
					if(!isset($_COOKIE['clavelogin']))
					{
						echo '<input type="password" class="form-control" placeholder="Ingrese su clave" name="clave" id="clave" value="anto123">';
					}
					else{
						echo "<input type='password' class='form-control' placeholder='Ingrese su clave' name='clave' id='clave' value=".$_COOKIE['clavelogin'].">";
					}
					?>			
					<div class="text-hide error" id="claveerror">Completar este campo.</div>
				</div> 
				<div class="form-group ">
					<button id="btnO" class="btn " id="botonInicio" name="botonInicio" value="olvido">Olvide la contraseña</button>	
				</div> 
				<button id="btnI" class="btn btn-success" name="botonInicio" value="inicio">Iniciar sesion</button>
				<button id="btnR" class="btn btn-outline-success" name="botonInicio" value="registro">Registracion</button>
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
	if(isset($_POST["botonInicio"]) )
	{
		include("conexion.inc");
		$boton=$_POST['botonInicio'];
		if($boton=="inicio")
		{
			$vUsuario=$_POST['usuario'];
			$vClave=$_POST['clave'];
			setcookie("usuariologin","$vUsuario",time()+30);
			setcookie("clavelogin","$vClave",time()+30);
			$vSql="select count(usuario) from usuarios where usuario='$vUsuario'";
			$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
			$cantidad = mysqli_fetch_assoc($vResultado);
			if($cantidad['count(usuario)'] > 0)
			{
				$vSql="select count(usuario) from usuarios where usuario='$vUsuario' and clave='$vClave'";
				$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
				$cantClave = mysqli_fetch_assoc($vResultado);
				if($cantClave['count(usuario)'] > 0)
				{
					$vSql="select nombre, apellido, personas.dni,mail,direccion,telefono,fechaNac,tipo_usuario
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
					$tipo=$persona['tipo_usuario'];
					$_SESSION['nombre'] = $nomPersona;
					$_SESSION['mail'] = $mail;
					$_SESSION['usuario'] = $vUsuario;
					$_SESSION['telefono'] = $telefono;
					$_SESSION['direccion'] = $direccion;
					$_SESSION['fecha'] = $fecha;
					$_SESSION['dni'] = $dni;
					$_SESSION['tipo']=$tipo;
					$_SESSION['carro']=array();
					setcookie("usuariologin","$vUsuario",time()-1);
					setcookie("clavelogin","$vClave",time()-1);
					if($tipo==1)
					{
						 echo "<script> window.location='index.php'; </script>";
					}
					else
					{
						 echo "<script> window.location='homeAdmin.php'; </script>";
					}		
				}
				else
				{?>
				<script> 
					alertify.alert('Error','La clave ingresada es incorrecta.',	function(){
					alertify.success('Ok');					
					window.location= 'login.php';
					});
				</script>
				<?php }
			}
			else
			{	?>			
			<script> 
					alertify.alert('Error','El usuario ingresado es incorrecto.',
					function(){
					alertify.success('Ok');					
					window.location= 'login.php';
					});
			</script>
			<?php }
			mysqli_free_result($vResultado);
			mysqli_close($link);
		}
		else if($boton=="registro")
		{
			 echo "<script> window.location='registrar.php'; </script>";
		}
		else
		{ 
			 echo "<script> window.location='olvidoClave.php'; </script>";
		}
	}
?>
