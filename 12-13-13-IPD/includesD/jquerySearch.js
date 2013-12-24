function lookupD(inputString)
{
	if(inputStringD.length==0)
	{
	$('#suggestionsD').hide();	
	}
	else
	{
	$.post("includesD/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsD').show();
			$('#autoSuggestionsListD').html(data);
		}
	});
	}
}


function fillD(thisValue,thisValue1)
{
$('#inputStringD').val(thisValue);
$('#amount').val(thisValue1);
setTimeout("$('#suggestionsD').hide();",200);

}
