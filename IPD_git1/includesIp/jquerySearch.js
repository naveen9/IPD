function lookupIp(inputString)
{
	if(inputStringIp.length==0)
	{
	$('#suggestionsIp').hide();	
	}
	else
	{
	$.post("includesIp/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsIp').show();
			$('#autoSuggestionsListIp').html(data);
		}
	});
	}
}


function fillIp(thisValue)
{
$('#inputStringIp').val(thisValue);
setTimeout("$('#suggestionsIp').hide();",200);	
}
