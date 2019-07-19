function usuarioYclave()
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
function email()
{
	if($("#emailo").val()=="")
	{
		$("#errorolvido").removeClass("text-hide");
	}
	else
	{
		$("#errorolvido").addClass("text-hide");
	}
}
$(function() {
	$("#btnI").on("click",function(){
		usuarioYclave();
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
	$("#btnOlvidar").on("click",function()
	{
		email();
		if($("#errorolvido").hasClass("text-hide"))
		{
			return true;
		}
		else
		{
			return false;
		}
	});
});