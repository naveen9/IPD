function lookupR(inputString)
{
	if(inputStringR.length==0)
	{
	$('#suggestionsR').hide();	
	}
	else
	{
	$.post("includesR/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsR').show();
			$('#autoSuggestionsListR').html(data);
		}
	});
	}
}


function fillR(thisValue)
{
$('#inputStringR').val(thisValue);
setTimeout("$('#suggestionsR').hide();",200);	
}
