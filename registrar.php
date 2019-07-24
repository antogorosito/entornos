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
		<script type="text/javascript" src="registrar.js"></script>
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
			<h2 class="titInicio verde">Registracion de usuario </h2>
			<form action="registracion.php" method="post" name="formRegistracion">
				<div id="reg" class="col50">
					<div class="row">
						<div class="form-group col40">
							<label for="n">Nombre:</label>
							<input type="text" class="form-control" placeholder="Ingrese su nombre" name="nombre" id="nombre">
							<div class="text-hide error" id="nombreerror">Completar este campo.</div>
						</div>
						<div class="esp"></div>
						<div class="form-group col40">
							<label for="a">Apellido:</label>
							<input type="text" class="form-control" placeholder="Ingrese su apellido" name="apellido" id="apellido" >
							<div class="text-hide error" id="apellidoerror">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="u">Usuario:</label>
							<input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" id="usuario" >
							<div class="text-hide error" id="usuarioerror">Completar este campo.</div>
						</div>
						<div class="esp"></div>
						<div class="form-group col40">
							<label for="c">Clave:</label>
							<input type="password" class="form-control" placeholder="Ingrese su clave" name="clave" id="clave">
							<div class="text-hide error" id="claveerror">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="e">Email:</label>
							<input type="text" class="form-control" placeholder="Ingrese su email" name="email" id="email" >
							<div class="text-hide error" id="emailerror">Completar este campo.</div>
							<div class="text-hide error" id="emailerror2">Debe tener formato xx@xx.com.</div>
						</div>
						<div class="esp"></div>
						<div class="form-group col40">
							<label for="d">Dni:</label>
							<input type="number" class="form-control" placeholder="Ingrese su dni" name="dni" id="dni">
							<div class="text-hide error" id="dnierror">Completar este campo.</div>
							<div class="text-hide error" id="dnierror2">El dni debe tener 8 caracteres.</div>
						</div>	
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="di">Direccion:</label>
							<input type="text" class="form-control" placeholder="Ingrese calle" name="calle" id="calle">
							<div class="text-hide error" id="calleerror">Completar este campo.</div>
						</div>
						<div class="espacio2"></div>
						<div class="form-group col15">
							<label class="textoblanco">l</label>
							<input type="number" class="form-control" placeholder="Numero" name="num"  id="num">
							<div class="text-hide error" id="numerror">Completar este campo.</div>
						</div>
						<div class="espacio2"></div>
						<div class="form-group col15"> 
							<label class="textoblanco">l</label>
							<input type="text" class="form-control" placeholder="Piso" name="piso" id="piso"> 
						</div>
						<div class="espacio2"></div>
						<div class="form-group col15"> 
							<label class="textoblanco">l</label> 
							<input type="text" class="form-control" placeholder="Dpto" name="dpto" id="dpto">
						</div>
					</div>
					<div class="row">
						<div class="form-group col15"> 
							<label for="t">Telefono:</label>
							<input type="number" class="form-control" placeholder="Codigo" name="codigo" id="tel1" >
							<div class="text-hide error" id="tel1error">Completar este campo.</div>
						</div>
						<div class="espacio2"></div>
						<div class="form-group col40"> 
						<label class="textoblanco">l </label>
							<input type="number" class="form-control" placeholder="Ingrese su telefono" name="telefono" id="tel2" >
							<div class="text-hide error" id="tel2error">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="fn">Fecha de nacimiento:</label>
							<input type="date" class="form-control" placeholder="Ingrese su cumpleaÃ±os" name="cumpleanios" id="cumpleanios">
							<div class="text-hide error" id="cumpleanioserror">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<button  class="btn btn-success" id="botonReg" name="botonReg">Registrar</button>
					</div>
				</div>
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
