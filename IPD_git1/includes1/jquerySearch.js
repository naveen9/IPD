function lookup1(inputString)
{
	if(inputString.length==0)
	{
	$('#suggestions').hide();	
	}
	else
	{
	$.post("includes1/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestions').show();
			$('#autoSuggestionsList').html(data);
		}
	});
	}
}


function fill1(thisValue,thisValue1)
{
$('#inputString1').val(thisValue);
$('#amount').val(thisValue1);
setTimeout("$('#suggestions').hide();",200);

}
