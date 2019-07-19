$(function() {
	$("#btnBusqueda").on("click",function(){
		alert("A");
		if(!isset($_SESSION["usuario"]))
		{ 
			alert("sin sesion");
		}
		else
		{
			alert("sesion");
		}
	});
});