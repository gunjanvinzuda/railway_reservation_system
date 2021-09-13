var fname=document.getElementById("fullname");
var uname=document.getElementById("username");
var submit=document.getElementById("submit");
var password=document.getElementById("password");
var rpassword=document.getElementById("rpassword");
var letters=/^[a-zA-Z ]+$/;
var pass=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).+$/;
var specialchar = /^[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

submit.addEventListener("click",function()
{
	console.log(fname.value);
	console.log(uname.value);
	if(fname.value.match(letters))
	{
		if(password.value===rpassword.value)	
		{
			console.log(password.value);
			console.log(rpassword.value);
			var str=password.value;
			if(str.length<21&&str.length>5)
			{
				if(!str.match(pass))
				{
					alert("Your password must have atleast one lowercase letter,one uppercase letter, one digit and one special character");
					password.focus();
				}
			}
			else
			{
				alert("Password lenght must be between 6 to 20 charecters.");
				password.focus();
			}
		}
		else
		{
			alert("Passwords aren't matching");
			password.focus();
		}
	}
	else
	{
		alert("Name must have only letters");
		fname.focus();
	}
})