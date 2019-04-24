<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
</head>
	<body>
	<?php
		include("conexion.inc");
		$boton=$_POST['botonInicio'];
		if($boton=="inicio")
		{
			session_start();
			//	datos del formulario
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
			
					echo("inicio de sesion correcto");
						header ("Location: index.html");
				}
				else
				{
					echo("Clave incorrecto<br/>");
				}
			}
			else
			{					
				echo("Usuario incorrecto<br/>");				
			}
			//libero resultados 
			mysqli_free_result($vResultado);
			//cierro conexion
			mysqli_close($link);
		}
		else 
		{
			header ("Location: registrar.html");
		}
	?>
	</body>
</html>
