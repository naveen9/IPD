function lookup2(inputString)
{
	if(inputString.length==0)
	{
	$('#suggestions').hide();	
	}
	else
	{
	$.post("includes2/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestions').show();
			$('#autoSuggestionsList').html(data);
		}
	});
	}
}


function fill2(thisValue)
{
$('#inputString2').val(thisValue);
setTimeout("$('#suggestions').hide();",200);	
}
