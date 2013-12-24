function lookupCo(inputString)
{
	if(inputStringCo.length==0)
	{
	$('#suggestionsCo').hide();	
	}
	else
	{
	$.post("includesCo/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsCo').show();
			$('#autoSuggestionsListCo').html(data);
		}
	});
	}
}


function fillCo(thisValue)
{
$('#inputStringCo').val(thisValue);
setTimeout("$('#suggestionsCo').hide();",200);	
}
