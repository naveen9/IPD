function lookupCoP(inputString)
{
	if(inputStringCoP.length==0)
	{
	$('#suggestionsCoP').hide();	
	}
	else
	{
	$.post("includesCoP/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsCoP').show();
			$('#autoSuggestionsListCoP').html(data);
		}
	});
	}
}


function fillCoP(thisValue,thisValue1)
{
$('#inputStringCoP').val(thisValue);
$('#amount').val(thisValue1);
setTimeout("$('#suggestionsCoP').hide();",200);

}
