<?php
	session_start();
	$boton=$_POST["btnAg"];
	$botonInicio=substr($boton,0,3);
	$id=substr($boton,3);	
	if($botonInicio=="eli")
	{
			if(!isset($_SESSION["carro"]))
			{			
				echo " vacio";
			}
			else 
			{
				unset($_SESSION["carro"][$id]);
				echo "<script> window.location='carrito.php'; </script>";
			}
	}
	elseif($botonInicio=="mas")
	{
		$_SESSION['carro'][$id]['cantidad']= $_SESSION['carro'][$id]['cantidad']+1;
		echo "<script> window.location='carrito.php'; </script>";
	}
	elseif($botonInicio=="men")
	{
		if($_SESSION['carro'][$id]['cantidad']>1)
		{
			$_SESSION['carro'][$id]['cantidad']= $_SESSION['carro'][$id]['cantidad']-1;
			echo "<script> window.location='carrito.php'; </script>";
		}
		else
		{
			echo "<script> window.location='carrito.php'; </script>";
		}
	}
	elseif($botonInicio=="com")
	{
		$_SESSION['total']=substr($boton,3);
		echo "<script> window.location='confirmacionCompra.php'; </script>";
	}
?>
