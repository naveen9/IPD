function lookupDi(inputString)
{
	if(inputStringDi.length==0)
	{
	$('#suggestionsDi').hide();	
	}
	else
	{
	$.post("includesDi/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsDi').show();
			$('#autoSuggestionsListDi').html(data);
		}
	});
	}
}


function fillDi(thisValue)
{
$('#inputStringDi').val(thisValue);
setTimeout("$('#suggestionsDi').hide();",200);	
}
