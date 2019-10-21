<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="estilos.css" type="text/css" media="screen"/>
		<title>Supermercado SAV</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="index.php">
				<img src="titulo.jpg" alt="Logo" style="width:15vw;" />
			</a>	
		</nav>	
		<div class="cuerpo">
			<h2 class="titInicio verde">Error, no posee acceso a esta pagina</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="needs-validation formulario" method="post">
				<button id="btnError"  class="btn btn-success " name="btnError">Redireccionar</button>
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
	if(isset($_POST["btnError"]) )
	{
		include("conexion.inc");
		$boton=$_POST['btnError'];
		if(!isset($_SESSION["usuario"]))
		{ 
			 echo "<script> window.location='index.php'; </script>";
		}
		else
		{
			if(isset($_SESSION["tipo"]))
			{
				$tipo=$_SESSION["tipo"];
				if($tipo==1)
				{
					 echo "<script> window.location='index.php'; </script>";
				}
				else
				{				
					echo "<script> window.location='homeAdmin.php'; </script>";
				}		
			}
		}
	}
?>