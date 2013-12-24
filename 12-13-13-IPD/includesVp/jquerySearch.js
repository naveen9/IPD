function lookupVp(inputString)
{
	if(inputStringVp.length==0)
	{
	$('#suggestionsVp').hide();	
	}
	else
	{
	$.post("includesVp/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsVp').show();
			$('#autoSuggestionsListVp').html(data);
		}
	});
	}
}


function fillVp(thisValue)
{
$('#inputStringVp').val(thisValue);
setTimeout("$('#suggestionsVp').hide();",200);	
}
