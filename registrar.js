function validarnombre()
{
	if($("#nombre").val()== "")
	{
		$("#nombreerror").removeClass("text-hide");
	}
	else
	{
		$("#nombreerror").addClass("text-hide");
	}
}
function validarapellido()
{
	if($("#apellido").val()== "")
	{
		$("#apellidoerror").removeClass("text-hide");
	}
	else
	{
		$("#apellidoerror").addClass("text-hide");
	}
}
function validarusuario()
{
	if($("#usuario").val()== "")
	{
		$("#usuarioerror").removeClass("text-hide");
	}
	else
	{ 
		$("#usuarioerror").addClass("text-hide");
	}
}
function validarclave()
{
	if($("#clave").val()=="")
	{
		$("#claveerror").removeClass("text-hide");
	}
	else
	{
		$("#claveerror").addClass("text-hide");
	}
}
function validaremail()
{
	if($("#email").val()=="")
	{
		$("#emailerror").removeClass("text-hide");
	}
	else
	{
		$("#emailerror").addClass("text-hide");
	}
}
function validaremail()
{
	if($("#email").val()=="")
	{
		$("#emailerror").removeClass("text-hide");
	}
	else
	{
		$("#emailerror").addClass("text-hide");
		var em=$("#email").val();
		emailvalidar(em);
	}
}
function validardni()
{
	if($("#dni").val()=="")
	{
		$("#dnierror").removeClass("text-hide");
	}
	else
	{
		$("#dnierror").addClass("text-hide");
		var dni=$("#dni").val();
		if(dni.length!=8)
		{
			$("#dnierror2").removeClass("text-hide");
		}
		else
		{
			$("#dnierror2").addClass("text-hide");
		}
	}
}
function validardireccion()
{
	if($("#calle").val()=="")
	{
		$("#calleerror").removeClass("text-hide");
		if($("#num").val()=="")
		{
			$("numerror").removeClass("text-hide");
		}
		else
		{
			$("#numerror").addClass("text-hide");
		}
	}
	else
	{
		$("#calleerror").addClass("text-hide");
		if($("#num").val()=="")
		{
			$("#numerror").removeClass("text-hide");
		}
		else
		{
			$("#numerror").addClass("text-hide");
		}
	}
}
function validartel()
{
	if($("#tel1").val()=="")
	{
		$("#tel1error").removeClass("text-hide");
		if($("#tel2").val()=="")
		{
			$("tel2error").removeClass("text-hide");
		}
		else
		{
			$("#tel2error").addClass("text-hide");
		}
	}
	else
	{
		$("#tel1error").addClass("text-hide");
		if($("#tel2").val()=="")
		{
			$("#tel2error").removeClass("text-hide");
		}
		else
		{
			$("#tel2error").addClass("text-hide");
		}
	}
}
function validarcumple()
{
	if($("#cumpleanios").val()=="")
	{
		$("#cumpleanioserror").removeClass("text-hide");
	}
	else
	{
		$("#cumpleanioserror").addClass("text-hide");
	}
}
function emailvalidar(valor) {
	if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor))
	{
		$("#emailerror2").addClass("text-hide");
	}
	else 
	{
		$("#emailerror2").removeClass("text-hide");
	}
}
$(function() {
	$("#botonReg").on("click",function(){
		validarnombre();
		validarapellido();
		validarusuario();
		validarclave();
		validaremail();

		validardni();
		validardireccion();
		validartel();
		validarcumple();
		if ($("#nombreerror").hasClass("text-hide") && $("#apellidoerror").hasClass("text-hide") && $("#usuarioerror").hasClass("text-hide") && $("#claveerror").hasClass("text-hide") && $("#emailerror").hasClass("text-hide") && $("#dnierror").hasClass("text-hide") && $("#calleerror").hasClass("text-hide") && $("#numerror").hasClass("text-hide") && $("#tel1error").hasClass("text-hide") && $("#tel2error").hasClass("text-hide") && $("#cumpleanioserror").hasClass("text-hide"))
		{
			return true;
		}
		else
		{
			return false;
		}
	});
	
});