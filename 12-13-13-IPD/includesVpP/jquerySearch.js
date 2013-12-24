function lookupVpP(inputString)
{
	if(inputStringVpP.length==0)
	{
	$('#suggestionsVpP').hide();	
	}
	else
	{
	$.post("includesVpP/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsVpP').show();
			$('#autoSuggestionsListVpP').html(data);
		}
	});
	}
}


function fillVpP(thisValue,thisValue1)
{
$('#inputStringVpP').val(thisValue);
$('#amount').val(thisValue1);
setTimeout("$('#suggestionsVpP').hide();",200);

}
