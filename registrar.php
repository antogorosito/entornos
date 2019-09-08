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
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" name="formRegistracion">
				<div id="reg" class="col50">
					<div class="row">
						<div class="form-group col40">
							<label for="n">Nombre:</label>
							<?php 
							if(!isset($_COOKIE['nombrereg']))
							{
								echo '<input type="text" class="form-control" placeholder="Ingrese su nombre" name="nombre" id="nombre">';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Ingrese su nombre' name='nombre' id='nombre' value=".$_COOKIE['nombrereg'].">";
							}
							?>	
							<div class="text-hide error" id="nombreerror">Completar este campo.</div>
						</div>
						<div class="esp"></div>
						<div class="form-group col40">
							<label for="a">Apellido:</label>
							<?php 
							if(!isset($_COOKIE['apellidoreg']))
							{
								echo '<input type="text" class="form-control" placeholder="Ingrese su apellido" name="apellido" id="apellido" >';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Ingrese su apellido' name='apellido' id='apellido' value=".$_COOKIE['apellidoreg'].">";
							}
							?>	
							<div class="text-hide error" id="apellidoerror">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="u">Usuario:</label>
							<?php 
							if(!isset($_COOKIE['usuarioreg']))
							{
								echo '<input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" id="usuario" >';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Ingrese su usuario' name='usuario' id='usuario' value=".$_COOKIE['usuarioreg'].">";
							}
							?>
							<div class="text-hide error" id="usuarioerror">Completar este campo.</div>
						</div>
						<div class="esp"></div>
						<div class="form-group col40">
							<label for="c">Clave:</label>
							<?php 
							if(!isset($_COOKIE['clavereg']))
							{
								echo '<input type="password" class="form-control" placeholder="Ingrese su clave" name="clave" id="clave">';
							}
							else{
								echo "<input type='password' class='form-control' placeholder='Ingrese su clave' name='clave' id='clave' value=".$_COOKIE['clavereg'].">";
							}
							?>
							<div class="text-hide error" id="claveerror">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="e">Email:</label>
							<?php 
							if(!isset($_COOKIE['emailreg']))
							{
								echo '<input type="text" class="form-control" placeholder="Ingrese su email" name="email" id="email" >';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Ingrese su email' name='email' id='email' value=".$_COOKIE['emailreg'].">";
							}
							?>
							<div class="text-hide error" id="emailerror">Completar este campo.</div>
							<div class="text-hide error" id="emailerror2">Debe tener formato xx@xx.com.</div>
						</div>
						<div class="esp"></div>
						<div class="form-group col40">
							<label for="d">Dni:</label>
							<?php 
							if(!isset($_COOKIE['dnireg']))
							{
								echo '<input type="number" class="form-control" placeholder="Ingrese su dni" name="dni" id="dni">';
							}
							else{
								echo "<input type='number' class='form-control' placeholder='Ingrese su dni' name='dni' id='dni' value=".$_COOKIE['dnireg'].">";
							}
							?>
							<div class="text-hide error" id="dnierror">Completar este campo.</div>
							<div class="text-hide error" id="dnierror2">El dni debe tener 8 caracteres.</div>
						</div>	
					</div>
					<div class="row">
						<div class="form-group col36">
							<label for="di">Direccion:</label>
							<?php 
							if(!isset($_COOKIE['callereg']))
							{
								echo '<input type="text" class="form-control" placeholder="Ingrese calle" name="calle" id="calle">';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Ingrese calle' name='calle' id='calle' value=".$_COOKIE['callereg'].">";
							}
							?>
							<div class="text-hide error" id="calleerror">Completar este campo.</div>
						</div>
						<div class="espacio2 es"></div>
						<div class="form-group col15">
							<label class="textoblanco">l</label>
							<?php 
							if(!isset($_COOKIE['numreg']))
							{
								echo '<input type="number" class="form-control" placeholder="Numero" name="num"  id="num">';
							}
							else{
								echo "<input type='number' class='form-control' placeholder='Numero' name='num' id='num' value=".$_COOKIE['numreg'].">";
							}
							?>
							<div class="text-hide error" id="numerror">Completar este campo.</div>
						</div>
						<div class="espacio2"></div>
						<div class="form-group col15"> 
							<label class="textoblanco">l</label>
							<?php 
							if(!isset($_COOKIE['pisoreg']))
							{
								echo '<input type="text" class="form-control" placeholder="Piso" name="piso" id="piso">';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Piso' name='piso' id='piso' value=".$_COOKIE['pisoreg'].">";
							}
							?>
						</div>
						<div class="espacio2"></div>
						<div class="form-group col15"> 
							<label class="textoblanco">l</label> 
							<?php 
							if(!isset($_COOKIE['dptoreg']))
							{
								echo '<input type="text" class="form-control" placeholder="Dpto" name="dpto" id="dpto">';
							}
							else{
								echo "<input type='text' class='form-control' placeholder='Dpto' name='dpto' id='dpto' value=".$_COOKIE['dptoreg'].">";
							}
							?>
						</div>
					</div>
					<div class="row">
						<div class="form-group col15"> 
							<label for="t">Telefono:</label>
							<?php 
							if(!isset($_COOKIE['tel1reg']))
							{
								echo '<input type="number" class="form-control" placeholder="Codigo" name="codigo" id="tel1" >';
							}
							else{
								echo "<input type='number' class='form-control' placeholder='Codigo' name='codigo' id='tel1' value=".$_COOKIE['tel1reg'].">";
							}
							?>
							<div class="text-hide error" id="tel1error">Completar este campo.</div>
						</div>
						<div class="espacio2"></div>
						<div class="form-group col40"> 
						<label class="textoblanco">l </label>
							<?php 
							if(!isset($_COOKIE['tel2reg']))
							{
								echo '<input type="number" class="form-control" placeholder="Ingrese su telefono" name="telefono" id="telefono" >';
							}
							else{
								echo "<input type='number' class='form-control' placeholder='Ingrese su telefono' name='telefono' id='telefono' value=".$_COOKIE['tel2reg'].">";
							}
							?>
							<div class="text-hide error" id="tel2error">Completar este campo.</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col40">
							<label for="fn">Fecha de nacimiento:</label>
							<?php 
							if(!isset($_COOKIE['cumpleaniosreg']))
							{
								echo '<input type="date" class="form-control" placeholder="Ingrese su cumpleaÃ±os" name="cumpleanios" id="cumpleanios" >';
							}
							else{
								echo "<input type='date' class='form-control' placeholder='Ingrese su cumpleaÃ±os' name='cumpleanios' id='cumpleanios' value=".$_COOKIE['cumpleaniosreg'].">";
							}
							?>
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
<?php 
	if(isset($_POST["botonReg"]))
	{
		include("conexion.inc"); 
		$vNombre=$_POST['nombre'];
		$vApellido=$_POST['apellido'];
		$vUsuario=$_POST['usuario'];
		$vClave=$_POST['clave'];
		$vEmail=$_POST['email'];
		$vDni=$_POST['dni'];
		$vDireccion=$_POST['calle'] .' '. $_POST['num'] .' '. $_POST['piso'] .' '. $_POST['dpto']; 
		$vTelefono=$_POST['codigo'] .' '. $_POST['telefono'];
		$vFecha=$_POST['cumpleanios'];
		setcookie("nombrereg","$vNombre",time()+30);
		setcookie("apellidoreg","$vApellido",time()+30);
		setcookie("usuarioreg","$vUsuario",time()+30);
		setcookie("clavereg","$vClave",time()+30);
		setcookie("emailreg","$vEmail",time()+30);			
		setcookie("dnireg","$vDni",time()+30);
		$c=$_POST['calle'];
		setcookie("callereg","$c",time()+30);
		$n=$_POST['num'];
		setcookie("numreg","$n",time()+30);
		$p=$_POST['piso'];
		setcookie("pisoreg","$p",time()+30);
		$d=$_POST['dpto'];
		setcookie("dptoreg","$d",time()+30);
		$co=$_POST['codigo'];
		setcookie("tel1reg","$co",time()+30);
		$t=$_POST['telefono'];
		setcookie("tel2reg","$t",time()+30);
		setcookie("cumpleaniosreg","vFecha",time()+30);
		$vSql="select count(dni) from usuarios where dni='$vDni'";
		$vResultado=mysqli_query($link,$vSql) or die(mysqli_error($link));
		$cantidad = mysqli_fetch_assoc($vResultado);
		if($cantidad['count(dni)'] > 0)
		{
	?>	
		<script> 
			alertify.alert('Error','Ya existe un usuario con el dni ingresado',	function() {
				alertify.success('Ok');
				window.location= 'registrar.php';
			});	
		</script>
	<?php
		}
		else
		{
			setcookie("nombrereg","$vNombre",time()+30);
			setcookie("apellidoreg","$vApellido",time()-1);
			setcookie("usuarioreg","$vUsuario",time()-1);
			setcookie("clavereg","$vClave",time()-1);
			setcookie("emailreg","$vEmail",time()-1);			
			setcookie("dnireg","$vDni",time()-1);
			setcookie("callereg","$c",time()-1);
			setcookie("numreg","$n",time()-1);
			setcookie("pisoreg","$p",time()-1);
			setcookie("dptoreg","$d",time()-1);
			setcookie("tel1reg","$co",time()-1);
			setcookie("tel2reg","$t",time()-1);
			setcookie("cumpleaniosreg","vFecha",time()-1);
			$vSql="insert into personas(dni, nombre, apellido, mail,direccion, telefono, fechaNac) values('$vDni','$vNombre','$vApellido','$vEmail','$vDireccion','$vTelefono','$vFecha')"; 
			mysqli_query($link,$vSql) or die(mysqli_error($link));
			$vSql="insert into usuarios(usuario,clave,dni,tipo_usuario) values('$vUsuario','$vClave','$vDni',1)";
			mysqli_query($link,$vSql) or die(mysqli_error($link));						
	?>
			<script> 
				alertify.alert('Confirmacion','Se ha registrado el usuario con exito',function(){
					alertify.success('Ok');
					window.location= 'login.php'
				});
			</script>
	<?php
		}
		mysqli_free_result($vResultado);
		mysqli_close($link);
	}
?>
