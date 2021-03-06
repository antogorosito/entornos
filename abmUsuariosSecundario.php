<?php 
	session_start();
	if(isset($_SESSION["usuario"]))
	{ 
		if(isset($_SESSION["tipo"]))
		{
			$tipo=$_SESSION["tipo"];
			if($tipo==1)
			{
				 echo "<script> window.location='error.php'; </script>";
			}
		}
	}
	else
	{
		echo "<script> window.location='error.php'; </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
		<title>Supermercado SAV</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
		<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
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
				  <a class="nav-link color" href="abmUsuarios.php">Usuarios</a>
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
					echo "<div class='btn-group'>
					<button type='button' class='btn btn-outline-success dropdown-toggle' data-toggle='dropdown'>
					".$_SESSION['nombre']."
					</button><div class='dropdown-menu'><a class='dropdown-item' href='cerrarSesion.php'>Cerrar sesion</a></div></div> ";
				}?>
				</li>
			</ul>
		</nav>
		<div class="cuerpo">
			<?php
				include("conexion.inc");
				$boton=$_POST['botonAbmUsuarios'];
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
					<?php
					} 
					elseif($botonInicio=="edi"){?>
					<h2 class="titInicio verde ">Modificar usuario </h2>
					<?php }?>
					<form action="abmusu.php" class="formulario" name="abmusuario" method="post">
						<div class="row top">
							<div class="form-group col40 ">
								<label>Usuario:</label>
								<input type="text" class="form-control" name="usuario" value="<?php echo $usuario['usuario']; ?>" required disabled>
								<input type="text"  name="usuario1" value="<?php echo $usuario['usuario']; ?>" required hidden>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Clave:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="clave" value="<?php echo $usuario['clave']; ?>"  required disabled >
								<?php }else {?>
								<input type="text" class="form-control" name="clave" value="<?php echo $usuario['clave']; ?>"  required  >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col40">
								<label >Tipo de usuario:</label>
								<?php if($botonInicio=="ver"){?>
								<select name="nombre_categoria" class="form-control" disabled>
								<?php }else {?>
								<select name="nombre_categoria" class="form-control" >
								<?php } 
								if($usuario['tipo_usuario']==1)
								{ ?>
									<option value="0" >Administrador</option>
									<option value="1" selected>Usuario</option>
								<?php }else { ?>
									<option value="0" selected >Administrador</option>
									<option value="1" >Usuario</option>
								<?php }?>
								</select>
								<div class="invalid-feedback">Completar este campo.</div>

										
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Dni:</label>
								<input type="text" class="form-control" name="dni" value="<?php echo $usuario['dni']; ?>"  required disabled>
								<input type="text" name="dni1" value="<?php echo $usuario['dni']; ?>"  required hidden>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row ">
							<div class="form-group col40 ">
								<label>Nombre:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>" required disabled>
								<?php }else {?>
								<input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>" required >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Apellido:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>"  required disabled>
								<?php }else {?>
								<input type="text" class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>"  required >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row ">
							<div class="form-group col40 ">
								<label>Email:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="mail" class="form-control" name="email" value="<?php echo $usuario['mail']; ?>" required disabled>
								<?php }else {?>
								<input type="mail" class="form-control" name="email" value="<?php echo $usuario['mail']; ?>" required >
								<?php }?>								
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="esp"></div>
							<div class="form-group ">
								<label>Fecha de nacimiento:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="date" class="form-control" name="fechaNac" value="<?php echo $usuario['fechaNac']; ?>"  required disabled>
								<?php }else {?>
								<input type="date" class="form-control" name="fechaNac" value="<?php echo $usuario['fechaNac']; ?>"  required >
								<?php }?>	
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
								
						</div>
						<div class="row ">
							<div class="form-group ">
								<label>Direccion:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="calle" value="<?php echo $direccion[0]; ?>"  required disabled >
								<?php }else {?>
								<input type="text" class="form-control" name="calle" value="<?php echo $direccion[0]; ?>"  required  >
								<?php }?>	
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2 es"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="numero" value="<?php echo $direccion[1]; ?>"  required disabled>
								<?php }else {?>
								<input type="text" class="form-control" name="numero" value="<?php echo $direccion[1]; ?>"  required >
								<?php }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label> 
								<?php 
								if(isset($direccion[2])){
									if($botonInicio=="ver"){?>
									<input type="text" class="form-control" name="piso" value="<?php echo $direccion[2]; ?>"  disabled >
								<?php }else {?>
									<input type="text" class="form-control" name="piso" value="<?php echo $direccion[2]; ?>">
								<?php }} else{
									if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="piso" disabled >
								<?php }else {?>		
								<input type="text" class="form-control" name="piso">								
								<?php } }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
							<div class="espacio2"></div>
							<div class="form-group col15">
								<label class="textoblanco">l</label>
								<?php 
								if(isset($direccion[3])){
									if($botonInicio=="ver"){?>
									<input type="text" class="form-control" name="dpto" value="<?php echo $direccion[3]; ?>"  disabled >
								<?php }else {?>
									<input type="text" class="form-control" name="dpto" value="<?php echo $direccion[3]; ?>">
								<?php }} else{
									if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="dpto" disabled >
								<?php }else {?>		
								<input type="text" class="form-control" name="dpto">								
								<?php } }?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col15 ">
								<label>Telefono:</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="codigo" value="<?php echo $telefono[0]; ?>" required disabled>
								<?php }else {?>
								<input type="text" class="form-control" name="codigo" value="<?php echo $telefono[0]; ?>" required >
								<?php } ?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
							<div class="espacio2"></div>
							<div class="form-group col40 ">
								<label class="textoblanco">l</label>
								<?php if($botonInicio=="ver"){?>
								<input type="text" class="form-control" name="tel_usuario" value="<?php echo $telefono[1]; ?>" required disabled>
								<?php }else {?>
								<input type="text" class="form-control" name="tel_usuario" value="<?php echo $telefono[1]; ?>" required >
								<?php } ?>
								<div class="invalid-feedback">Completar este campo.</div>
							</div>	
						</div>
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
					$sql="select count(*) from pedidos inner join usuarios on usuarios.usuario=pedidos.usuario where usuarios.usuario='$usuarioInicio'";
					$resp1 = mysqli_query($link,$sql) or die(mysqli_error($link));
					$cantidad = mysqli_fetch_assoc($resp1);
					if($cantidad['count(*)'] > 0)
					{	?>
					<script> 
						alertify.alert('Error','No se puede eliminar el usuario porque realizo un pedido',function() {
							alertify.success('Ok');
							window.location= 'abmUsuarios.php';
  						});
					</script>
					<?php
					}
					else
					{
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
