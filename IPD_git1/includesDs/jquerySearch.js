function lookupDs(inputString)
{
	if(inputStringDs.length==0)
	{
	$('#suggestionsDs').hide();	
	}
	else
	{
	$.post("includesDs/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsDs').show();
			$('#autoSuggestionsListDs').html(data);
		}
	});
	}
}


function fillDs(thisValue)
{
$('#inputStringDs').val(thisValue);
setTimeout("$('#suggestionsDs').hide();",200);	
}
