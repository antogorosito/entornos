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
		$_SESSION['calleC']=$_POST['calle'];
		$_SESSION['numeroC']=$_POST['numero'];
		$_SESSION['pisoC']=$_POST['piso'];
		$_SESSION['dptoC']= $_POST['dpto'];	
		$_SESSION['fechaC']=$_POST['fechae'];
		$_SESSION['horaC']=$_POST['horae'];
		if($_POST['formapago']==0)
		{
			$_SESSION['pago']="Efectivo";
		}
		else if($_POST['formapago']==1)
		{
			$_SESSION['pago']="Credito";
		}
		else
		{
			$_SESSION['pago']="Debito";
		}
		
		$_SESSION['carro'][$id]['cantidad']= $_SESSION['carro'][$id]['cantidad']+1;
		echo "<script> window.location='carrito.php'; </script>";
	}
	elseif($botonInicio=="men")
	{
		$_SESSION['calle']=$_POST['calle'];
		$_SESSION['numero']=$_POST['numero'];
		$_SESSION['piso']=$_POST['piso'];
		$_SESSION['dpto']= $_POST['dpto'];
		$_SESSION['fechaC']=$_POST['fechae'];
		$_SESSION['horaC']=$_POST['horae'];
		if($_POST['formapago']==0)
		{
			$_SESSION['pago']="Efectivo";
		}
		else if($_POST['formapago']==1)
		{
			$_SESSION['pago']="Credito";
		}
		else
		{
			$_SESSION['pago']="Debito";
		}
		
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
		$fecha_entrega=$_POST['fechae'];
		$hora_entrega=$_POST['horae'];
		if($_POST['formapago']==0)
		{
			$pago="Efectivo";
		}
		else if($_POST['formapago']==1)
		{
			$pago="Credito";
		}
		else
		{
			$pago="Debito";
		}
		$fecha_actual=date('Y-m-d'); 
		$hora_actual=date("H:i:s");
		$costo=200;
		$estado="pendiente";
		$total=substr($boton,3);	
		$usuario=$_SESSION['usuario'] ;
		$consulta1="insert into entregas(costo_envio,dia_entrega,direccion_entrega,estado_entrega,hora_entrega) values('$costo','$fecha_entrega','$direccion','$estado','$hora_entrega')";
		mysqli_query($link,$consulta1) or die(mysqli_error($link));
		$id_entrega = mysqli_insert_id($link);
		$consulta2="insert into pedidos(fecha_pedido,forma_pago,hora_pedido,id_entrega,importe_total,usuario) values('$fecha_actual','$pago','$hora_actual','$id_entrega','$total','$usuario')";
		mysqli_query($link,$consulta2) or die(mysqli_error($link));
		$id_pedido = mysqli_insert_id($link);
		foreach($_SESSION["carro"] as $k =>$v)
		{
			$cantidad=$v['cantidad'];
			
			$subtotal=$v['precio']*$v['cantidad'];
			$nombre=$k;
			$consulta4="select id_producto from productos where nombre_producto='$nombre'";
			$rta=mysqli_query($link,$consulta4) or die(mysqli_error($link));
			$producto = mysqli_fetch_assoc($rta);
			$idp=$producto['id_producto'];
			$consulta3="insert into lineadepedido(cantidad,id_pedido,id_producto,subtotal) values('$cantidad','$id_pedido','$idp','$subtotal')";
			mysqli_query($link,$consulta3) or die(mysqli_error($link));
		}
		unset($_SESSION["carro"] );
		echo "<script> window.location='index.php'; </script>";
	}
?>