function lookupM(inputString)
{
	if(inputString.length==0)
	{
	$('#suggestionsM').hide();	
	}
	else
	{
	$.post("includesMedicine/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsM').show();
			$('#autoSuggestionsListM').html(data);
		}
	});
	}
}


function fillM(thisValue,thisValue1,thisValue2,thisValue5,thisValue6)
{
$('#inputStringM').val(thisValue);
$('#batch_no').val(thisValue1);
$('#mrp').val(thisValue2);

$('#exp_date').val(thisValue5);
$('#packs').val(thisValue6);


setTimeout("$('#suggestionsM').hide();",200);

}
