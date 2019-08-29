function validarFecha()
{
	if($('#fechae').val()=="")
	{
		$("#fechaerror").removeClass("text-hide");
	}
	else
	{
		$("#fechaerror").addClass("text-hide");
		var d=new Date();
		var mes=d.getMonth()+1;
		var dia=d.getDate();
		var dia=d.getDate();
		var anio=d.getFullYear();
		if(dia<10)
		{	
			dia='0'+dia;
		}
		if(mes<10)
		{
			mes='0'+mes;
		}
		var fechaPedido=$('#fechae').val();
		var fechaActual=anio+'-'+mes+'-'+dia;
		if(fechaPedido>fechaActual)
		{
			$("#fechaerror2").addClass("text-hide");
		}
		else if(fechaPedido<fechaActual)
		{
			$("#fechaerror2").removeClass("text-hide");
		}
		else
		{			
			$("#fechaerror2").addClass("text-hide");
		}		
	}
}
function validarHora()
{
	if($('#horae').val()=="")
	{
		$("#horaerror").removeClass("text-hide");
	}
	else
	{
		$("#horaerror").addClass("text-hide");
	}
}
function validarPago()
{
	if($('#formapago').val()=="")
	{
		$("#pagoerror").removeClass("text-hide");
	}
	else
	{
		$("#pagoerror").addClass("text-hide");
	}
}
function validarCalle()
{
	if($('#calle').val()=="")
	{
		$("#calleerror").removeClass("text-hide");
	}
	else
	{
		$("#calleerror").addClass("text-hide");
	}	
}
function validarNro()
{
	if($('#numero').val()=="")
	{
		$("#nrocalleerror").removeClass("text-hide");
	}
	else
	{
		$("#nrocalleerror").addClass("text-hide");
	}
}
$(function() {
	$("#comprar").on("click",function(){
		validarFecha();
		validarHora();
		validarPago();
		validarCalle();
		validarNro();
		if($("#fechaerror").hasClass("text-hide") && $("#fechaerror2").hasClass("text-hide")&& $("#horaerror").hasClass("text-hide") && $("#pagoerror").hasClass("text-hide") && $("#calleerror").hasClass("text-hide") && $("#nrocalleerror").hasClass("text-hide"))
		{
			return true;
		}
		else
		{
			return false;
		}
	});

});