function validarFecha()
{
	if($('#fechae').val()=="")
	{
		$("#fechaerror").removeClass("text-hide");
	}
	else
	{
		$("#fechaerror").addClass("text-hide");
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
		if($("#fechaerror").hasClass("text-hide") && $("#horaerror").hasClass("text-hide") && $("#pagoerror").hasClass("text-hide") && $("#calleerror").hasClass("text-hide") && $("#nrocalleerror").hasClass("text-hide"))
		{
			return true;
		}
		else
		{
			return false;
		}
	});

});