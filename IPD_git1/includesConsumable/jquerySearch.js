function lookupC(inputString)
{
	if(inputString.length==0)
	{
	$('#suggestionsC').hide();	
	}
	else
	{
	$.post("includesConsumable/searchresults.php",{queryString:""+inputString+""},function(data)	{
		if(data.length>0)
		{
			$('#suggestionsC').show();
			$('#autoSuggestionsListC').html(data);
		}
	});
	}
}


function fillC(thisValue,thisValue1,thisValue2,thisValue5,thisValue6)
{
$('#inputStringC').val(thisValue);
$('#batch_no').val(thisValue1);
$('#mrp').val(thisValue2);
$('#exp_date').val(thisValue5);
$('#packs').val(thisValue6);



setTimeout("$('#suggestionsC').hide();",200);

}
