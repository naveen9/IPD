function lookupOt(inputString)
{
	if(inputStringOt.length==0)
	{
	$('#suggestionsOt').hide();	
	}
	else
	{
	$.post("includesOt/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsOt').show();
			$('#autoSuggestionsListOt').html(data);
		}
	});
	}
}


function fillOt(thisValue)
{
$('#inputStringOt').val(thisValue);
setTimeout("$('#suggestionsOt').hide();",200);	
}
