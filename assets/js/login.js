var username=document.getElementById('username');
var password=document.getElementById('password');
var sub=document.getElementById('submit');

sub.addEventListener("click",function(){
	if(username.value)
	{
		if(!password.value)
		{
			alert("Enter password")
			password.focus();
		}
	}
	else
	{
		alert("Enter username");
		username.focu();
	}
})