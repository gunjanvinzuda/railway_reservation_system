var cardno=document.getElementById('cardno');
var pin=document.getElementById('pin');
var bank=document.getElementById('bank');
var cardtype=document.getElementById('card_type');
var sub=document.getElementById('submit');

sub.addEventListener('click',function(){
	if(cardno.value)
	{
		if(pin.value)
		{
			if(bank.value)
			{
				if(cardtype.value=='none')
				{
					alert("Select card type");
					cardtype.focus();
				}
			}
			else
			{
				alert("Enter bank name");
				bank.focus();
			}
		}
		else
		{
			alert("Enter pin");
			pin.focus();
		}
	}
	else
	{
		alert("Enter card number");
		cardno.focus();
	}
})