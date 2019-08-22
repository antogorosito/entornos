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
	{//guardar linea, compra, entrega
		include("conexion.inc"); 
		$direccion=$_POST['calle'] .' '. $_POST['numero'] .' '. $_POST['piso'] .' '. $_POST['dpto']; 
		$fecha_pedido=$_POST['fechae'];
		$hora=$_POST['horae'];
		$pago=$_POST['formapago'];
		$costo=200;
		$estado="pendiente";
		foreach($_SESSION["carro"] as $k =>$v)
		{
			$consulta1="insert into entregas(direccion_entrega,dia_entrega,hora_entrega,costo_envio,estado_entrega) values('$direccion','$fecha','$hora','$costo',$estado)";
			mysqli_query($link,$consulta1) or die(mysqli_error($link));
			$consulta2="insert into pedidos(fecha_pedido,hora_pedido,importe_total,forma_pago,usuario,id_entrega) values()";
			mysqli_query($link,$consulta2) or die(mysqli_error($link));
			$consulta3="insert into ";
			mysqli_query($link,$consulta3) or die(mysqli_error($link));
			echo "producto ".$k;
			echo "cantidad ".$v['cantidad'];
			echo "precio ".$v['precio'];
		}
		
	}
?>