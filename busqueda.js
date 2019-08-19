function menos()
{
	var a=parseInt($('#cantidad').html());
	if(a>1)
	{
		a=a-1;
		$('#cantidad').html(a);
	}
	

	
}
function mas()
{
	var a=parseInt($('#cantidad').html());
	a=a+1;
	$('#cantidad').html(a);

}