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
						<a  class='nav-link dropdown-toggle' data-toggle='dropdown'>Pedidos</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='pedidos.php'>Panel de pedidos</a>
							<a class='dropdown-item' href='informesVenta.php'>Informes de venta</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="abmProductos.php">Productos</a>
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
		<div id="cuerdo" class="cuerpo">
			<?php
				include("conexion.inc");
				$boton=$_POST['botonAbmUsuario'];
				$botonInicio=substr($boton,0,3);
				$usuarioInicio=substr($boton,3);
				$consulta="select * from usuarios inner join personas on personas.dni=usuarios.dni where usuario = '$usuarioInicio'";
				$resp = mysqli_query($link,$consulta) or die(mysqli_error($link));
				$usuario = mysqli_fetch_assoc($resp);
				$direccion=explode(" ",$usuario['direccion']);
				$telefono=explode(" ",$usuario['telefono']);
				
				if($botonInicio=="ver" || $botonInicio=="edi"){

					if($botonInicio=="ver"){?>
					<h2 class="titInicio verde ">Ver usuario </h2>
					<form action="abmusu.php" class="formulario" name="abmusuario" method="post">
						<div class="row top">
							<div class="form-group col40 ">
								<label>Usuario:</label>
								<input type="text" class="form-control" name="usuario" value="<?php echo $usuario['usuario']; ?>" required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Clave:</label>
								<input type="text" class="form-control" name="clave" value="<?php echo $usuario['clave']; ?>"  required disabled >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col40">
								<label >Tipo de usuario:</label>
								<select name="nombre_categoria" class="form-control" disabled>
									<option value="0" >Administrador</option>
									<option value="1" >Usuario</option>
								</select>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Dni:</label>
								<input type="text" class="form-control" name="dni" value="<?php echo $usuario['dni']; ?>"  required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row ">
							<div class="form-group col40 ">
								<label>Nombre:</label>
								<input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>" required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Apellido:</label>
								<input type="text" class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>"  required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row ">
							<div class="form-group col40 ">
								<label>Email:</label>
								<input type="mail" class="form-control" name="email" value="<?php echo $usuario['mail']; ?>" required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Fecha de nacimiento:</label>
								<input type="date" class="form-control" name="fechaNac" value="<?php echo $usuario['fechaNac']; ?>"  required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
								
						</div>
						<div class="row ">
							<div class="form-group ">
								<label>Direccion:</label>
								<input type="text" class="form-control" name="calle" value="<?php echo $direccion[0]; ?>"  required disabled >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2 es"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<input type="text" class="form-control" name="numero" value="<?php echo $direccion[1]; ?>"  required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label> 
								<?php if(isset($direccion[2])){?>
								<input type="text" class="form-control" name="piso" value="<?php echo $direccion[2]; ?>"  disabled >
								<?php }else {?>
								<input type="text" class="form-control" name="piso" disabled >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<?php if(isset($direccion[3])){?>
								<input type="text" class="form-control" name="dpto" value="<?php echo $direccion[3]; ?>"  disabled >
								<?php }else {?>
								<input type="text" class="form-control" name="dpto" disabled >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col15 ">
								<label>Telefono:</label>
								<input type="text" class="form-control" name="codigo" value="<?php echo $telefono[0]; ?>" required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
							<div class="espacio2"></div>
							<div class="form-group col40 ">
								<label class="textoblanco">l</label>
								<input type="text" class="form-control" name="tel_usuario" value="<?php echo $telefono[1]; ?>" required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
						</div>
					</form>
					<?php
					} 
					elseif($botonInicio=="edi"){?>
					<h2 class="titInicio verde ">Modificar usuario </h2>
					<form action="abmusu.php" class="formulario" name="abmusuario" method="post">
						<div class="row top">
							<div class="form-group col40 ">
								<label>Usuario:</label>
								<input type="text" class="form-control" name="usuario" value="<?php echo $usuario['usuario']; ?>" required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Clave:</label>
								<input type="text" class="form-control" name="clave" value="<?php echo $usuario['clave']; ?>"  required >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col40">
								<label >Tipo de usuario:</label>
								<select name="nombre_categoria" class="form-control">
									<option value="0" >Administrador</option>
									<option value="1" >Usuario</option>
								</select>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Dni:</label>
								<input type="text" class="form-control" name="dni" value="<?php echo $usuario['dni']; ?>"  required disabled>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row ">
							<div class="form-group col40 ">
								<label>Nombre:</label>
								<input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Apellido:</label>
								<input type="text" class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>"  required >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row ">
							<div class="form-group col40 ">
								<label>Email:</label>
								<input type="mail" class="form-control" name="email" value="<?php echo $usuario['mail']; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Fecha de nacimiento:</label>
								<input type="date" class="form-control" name="fechaNac" value="<?php echo $usuario['fechaNac']; ?>"  required >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
								
						</div>
						<div class="row ">
							<div class="form-group ">
								<label>Direccion:</label>
								<input type="text" class="form-control" name="calle" value="<?php echo $direccion[0]; ?>"  required >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2 es"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<input type="text" class="form-control" name="numero" value="<?php echo $direccion[1]; ?>"  required >
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label> 
								<?php if(isset($direccion[2]) && !empty($direccion[2])){?>
								<input type="text" class="form-control" name="piso" value="<?php echo $direccion[2]; ?>"   >
								<?php }else {?>
								<input type="text" class="form-control" name="piso" disabled >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<?php if(isset($direccion[3]) && !empty($direccion[3])){?>
								<input type="text" class="form-control" name="dpto" value="<?php echo $direccion[3]; ?>">
								<?php }else {?>
								<input type="text" class="form-control" name="dpto" disabled>
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col15 ">
								<label>Telefono:</label>
								<input type="text" class="form-control" name="codigo" value="<?php echo $telefono[0]; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
							<div class="espacio2"></div>
							<div class="form-group col40 ">
								<label class="textoblanco">l</label>
								<input type="text" class="form-control" name="tel_usuario" value="<?php echo $telefono[1]; ?>" required>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
						</div>
						<?php }?>
						<?php 
						if($botonInicio=="edi")
						{ ?>
								<button class="btn btn-success" name="botonAbmusuario" value="modificar">Guardar</button>
						<?php
						} ?>
					</form>
				<?php
				}
				elseif($botonInicio=="eli")
				{
					$dni=$usuario['dni'];
					$vSql="delete from usuarios where usuario='$usuarioInicio'"; 
					$vSql2="delete from personas where dni='$dni'"; 
					mysqli_query($link,$vSql) or die(mysqli_error($link));

					mysqli_query($link,$vSql2) or die(mysqli_error($link));
			?>
					<script>
						alertify.alert('Exito','Se ha eliminado con exito el usuario',
  						function() {
						alertify.success('Ok');
						window.location= 'abmUsuarios.php';
  						});
					</script>
			<?php
				}
				if($boton=="agregar"){
					?>
					<h2 class="titInicio verde ">Nuevo usuario </h2>
					<form action="abmusu.php" class="formulario" name="abmusuario" method="post">
							<div class="row top">
								<div class="form-group col40 ">
									<label>Usuario:</label>
									<input type="text" class="form-control" name="usuario"  required>
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="esp"></div>
								<div class="form-group ">
									<label>Clave:</label>
									<input type="text" class="form-control" name="clave"   required >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col40">
									<label >Tipo de usuario:</label>
									<select name="nombre_categoria" class="form-control">
										<option value="0" >Administrador</option>
										<option value="1" >Usuario</option>
									</select>
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="esp"></div>
								<div class="form-group ">
									<label>DNI:</label>
									<input type="text" class="form-control" name="dni"  required >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
							</div>
							<div class="row ">
								<div class="form-group col40 ">
									<label>Nombre:</label>
									<input type="text" class="form-control" name="nombre"  required>
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="esp"></div>
								<div class="form-group ">
									<label>Apellido:</label>
									<input type="text" class="form-control" name="apellido"   required >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
							</div>
							<div class="row ">
								<div class="form-group col40 ">
									<label>Email:</label>
									<input type="mail" class="form-control" name="email" required>
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="esp"></div>
								<div class="form-group ">
									<label>Fecha de nacimiento:</label>
									<input type="date" class="form-control" name="fechaNac"   required >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
									
							</div>
							<div class="row ">
								<div class="form-group ">
									<label>Direccion:</label>
									<input type="text" class="form-control" name="calle" placeholder="calle"  required >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="espacio2 es"></div>
								<div class="form-group col15">
									<label class="textoblanco">l</label>
									<input type="text" class="form-control" name="numero" placeholder="numero"  required >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="espacio2"></div>
								<div class="form-group col15">
									<label class="textoblanco">l</label> 
									<input type="text" class="form-control" name="piso" placeholder="piso"  >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
								<div class="espacio2"></div>
								<div class="form-group col15">
									<label class="textoblanco">l</label>
									<input type="text" class="form-control" name="dpto" placeholder="dpto"   >
									<div class="invalid-feedback">Completar este campo.</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col15 ">
									<label>Telefono:</label>
									<input type="text" class="form-control" name="codigo" placeholder="codigo" required>
									<div class="invalid-feedback">Completar este campo.</div>
								</div>	
								<div class="espacio2"></div>
								<div class="form-group col40 ">
									<label class="textoblanco">l</label>
									<input type="text" class="form-control" name="tel_usuario" placeholder="telefono" required>
									<div class="invalid-feedback">Completar este campo.</div>
								</div>	
							</div>
							<button class="btn btn-success" name="botonAbmusuario" value="agregar">Guardar</button>
						</form>
				<?php
				}			
				mysqli_close($link);
			?>
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
