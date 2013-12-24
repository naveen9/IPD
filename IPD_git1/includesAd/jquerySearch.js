function lookupAd(inputString)
{
	if(inputStringAd.length==0)
	{
	$('#suggestionsAd').hide();	
	}
	else
	{
	$.post("includesAd/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsAd').show();
			$('#autoSuggestionsListAd').html(data);
		}
	});
	}
}


function fillAd(thisValue)
{
$('#inputStringAd').val(thisValue);
setTimeout("$('#suggestionsAd').hide();",200);	
}
