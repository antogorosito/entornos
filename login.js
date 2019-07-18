function validar()
{
	if($("#usuario").val()== "")
	{ 
		$("#usuarioerror").removeClass("text-hide");
		if($("#clave").val() == "")
		{
			$("#claveerror").removeClass("text-hide");		
		}
		else
		{
			$("#claveerror").addClass("text-hide");
		}
	}
	else
	{
		$("#usuarioerror").addClass("text-hide");
		if($("#clave").val() == "")
		{
			$("#claveerror").removeClass("text-hide");
		}
		else
		{
			$("#claveerror").addClass("text-hide");		
		}
	}
}

$(function() {
	$("#btnI").on("click",function(){
		validar();
		if ($("#usuarioerror").hasClass("text-hide") && $("#claveerror").hasClass("text-hide")){
			return true;
		}
		else
		{
			return false;
		}
	});
	$("#btnR").on("click",function(){
		return true;
		});
});