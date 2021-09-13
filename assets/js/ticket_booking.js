var source=document.getElementById('source');
var destination=document.getElementById('destination');
var date=document.getElementById('doj');
var sub=document.getElementById('submit');

sub.addEventListener('click',function()
{
	if(source.value=='none')
	{
		alert("Enter the source");
		source.focus();
	}
	else
	{
		if(destination.value=='none')
		{
			alert("Enter the destination")
			destination.focus();
		}
		else
		{
			if(!date.value)
			{
				alert("Enter the date of journey");
				date.focus();
			}
		}
	}
})