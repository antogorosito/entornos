function validarnombre()
{
	if($("#nombre").val() =="")
	{
		$("#userror").removeClass("text-hide");
	}
	else
	{
		$("#userror").addClass("text-hide");
	}
}
function validarmail()
{
	if($("#emailC").val()=="")
	{
		$("#emailerror").removeClass("text-hide");
	}
	else
	{
		$("#emailerror").addClass("text-hide");
		var em=$("#emailC").val();
		validarEmail(em);
	}
}
function validartexto()
{
	if($("#msjmail").val()=="")
	{
		$("#textoerror").removeClass("text-hide");
	}
	else
	{
		$("#textoerror").addClass("text-hide");
	}
}
function validarEmail(valor) {
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
	$("#btnContacto").on("click",function(){
		validarnombre();
		validarmail();
		validartexto();
		if($("#userror").hasClass("text-hide") && $("#emailerror").hasClass("text-hide") && $("#textoerror").hasClass("text-hide") && $("#emailerror2").hasClass("text-hide"))
		{
			return true;
		}
		else
		{
			return false;
		}
	});

});