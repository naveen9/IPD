function lookup(inputString)
{
	if(inputString.length==0)
	{
	$('#suggestions').hide();	
	}
	else
	{
	$.post("includeSettle/searchSettleResults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestions').show();
			$('#autoSuggestionsList').html(data);
		}
	});
	}
}


function fill(thisValue)
{
$('#inputString').val(thisValue);
setTimeout("$('#suggestions').hide();",200);	
}
