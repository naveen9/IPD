function selectValid()
{
var select1=document.form2.sel_visit.value;

if(select1=="")
{
alert("plz select visit id");
return false;
}
return true;
}