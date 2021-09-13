<?php
session_start();

if(isset($_POST["submit"])){		
	if(isset($_POST["password"])&&isset($_POST["rpassword"])&&isset($_POST["fullname"])&&isset($_POST["age"])&&isset($_POST["email"])&&isset($_POST["username"])){
		$password=$_POST["password"];
		$rpassword=$_POST["rpassword"];
		$upparcase=preg_match("@[A-Z]@", $password);
		$lowercase=preg_match("@[a-z]@", $password);
		$digits=preg_match("@[0-9]@", $password);
		$specialchar=preg_match('@[ `!\#\@\$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?~]@', $password);

		if($upparcase&&$lowercase&&$digits&&$specialchar){
			if(($password==$rpassword)&&(strlen($password)>5)&&(strlen($password)<21)){
				$username=strip_tags($_POST["username"]);

				$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
				mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
				
				$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
				$numrows = mysqli_num_rows($query);

				if($numrows==0){
					$fullname=strip_tags($_POST["fullname"]);
					$age=$_POST["age"];
					$email=$_POST["email"];
					$date=date("Y-m-d");			
					$password=md5($password);
					$query=mysqli_query($connect,"INSERT INTO user VALUES('$username','$password','$fullname','$age','$email','$date')");
					$_SESSION["username"]=$username;
					$_SESSION["fullname"]=$fullname;
					header("Location: profile.php");
				}
			}
		} 
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp.css">
</head>
<body>
	<nav class="navbar navbar-default">
	    <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">Indian Railways </a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.php">Home</a></li>
		      </ul>
		      <form class="navbar-form navbar-left">
		        
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li class="active"><a href="register.php">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
		        <li><a href="login.php">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
		          </ul>
		        </li>
		      </ul>
		    </div>
	  	</div>
	</nav>
	
	<div class="body">
		<div class="head">
			<h2>Registration Form</h2>
		</div>
	<form action="register.php" method="POST">
		<table cellspacing="21" >
			<tr>
				<td><input type="text" id="fullname" name="fullname" placeholder="Name" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="text" id="username" name="username" placeholder="Username" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="number" id="age" name="age" min="13" max="100" placeholder="Age" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="email" id="email" name="email"  placeholder="Email-id: abc@def.xyz" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="password" name="password" placeholder="Password" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="rpassword" name="rpassword" placeholder="Confirm Password" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="submit" id="submit" name="submit" autofocus value="submit"><input type="reset" id="reset" name="reset"></td>
			</tr>
			<tr><td><br></td></tr>
		</table>
	</form>
	</div>
	<script type="text/javascript" src="./assets/js/register.js"></script>
</body>
</html> 