<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen">
		<title>Supermercado SAV</title>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
			<input class="form-control mr-sm-2" type="text" name="lupa" />
			<button class="btn btn-success" type="submit" name="buscar">Buscar</button>
		  </form>
		</nav>
		<div class="cuerpo">
			<h2 class="titInicio">Registracion de usuario </h2>
			<h3 class="titInicio"> Datos personales</h3>
			<div id="formulario">
				<form action="registracion.php" method="post" name="formRegistracion">
					<div id="reg" class="col50">
						<div class="row">
							<div class="form-group col40">
								<label for="n">Nombre:</label>
								<input type="text" class="form-control" placeholder="Ingrese su nombre" name="nombre" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group col40">
								<label for="a">Apellido:</label>
								<input type="text" class="form-control" placeholder="Ingrese su apellido" name="apellido" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col40">
								<label for="u">Usuario:</label>
								<input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group col40">
								<label for="c">Clave:</label>
								<input type="password" class="form-control" placeholder="Ingrese su clave" name="clave" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col40">
								<label for="e">Email:</label>
								<input type="email" class="form-control" placeholder="Ingrese su email" name="email" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group col40">
								<label for="d">Dni:</label>
								<input type="text" class="form-control" placeholder="Ingrese su dni" name="dni" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
						</div>
						<div class="row">
							<div class="form-group col40">
								<label for="di">Direccion:</label>
								<input type="text" class="form-control" placeholder="Ingrese calle" name="calle" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<input type="number" class="form-control" placeholder="Numero" name="num" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15"> 
								<label class="textoblanco">l</label>
								<input type="text" class="form-control" placeholder="Piso" name="piso"> 
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15"> 
								<label class="textoblanco">l</label> 
								<input type="text" class="form-control" placeholder="Dpto" name="dpto" >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col15"> 
								<label for="t">Telefono:</label>
								<input type="number" class="form-control" placeholder="Codigo" name="codigo" id="tel1" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col40"> 
							<label class="textoblanco">l </label>
								<input type="number" class="form-control" placeholder="Ingrese su telefono" name="telefono" id="tel2" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col40">
								<label for="fn">Fecha de nacimiento:</label>
								<input type="date" class="form-control" placeholder="Ingrese su cumpleaÃ±os" name="cumpleanios" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<button type="submit" class="btn btn-success" name="botonReg">Registrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		</br>
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
