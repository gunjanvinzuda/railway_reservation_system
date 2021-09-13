<?php
session_start();

if(isset($_POST["submit"])&&isset($_POST["username"])&&isset($_POST["password"])){
	$username = $_POST["username"];
	$password = md5(strip_tags($_POST["password"]));

	if($username&&$password){
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway_site") or die("Couldn't find database");

		$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
		$numrows = mysqli_num_rows($query);

		if($numrows!=0){
			$row = mysqli_fetch_assoc($query);
				$dbusername = $row["username"];
				$dbpassword = $row["password"];
				$dbfullname = $row["name"];

			if(($dbusername==$username)&&($dbpassword==$password)){
				$_SESSION["username"] = $dbusername;
				$_SESSION["fullname"] = $dbfullname;
				header("Location: profile.php");
			} else {
				echo '
				<script>
					alert("You have entered wrong username or password");
				</script>
				';
			}
		}  else {
			echo '
			<script>
				alert("This username does not exsist");
			</script>
			';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp.css">
</head>
<body>
	<nav class="navbar navbar-default">
	    <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Indian Railways </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        
	      </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="register.php">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
				<li class="active"><a href="login.php">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
			</ul>
	    </div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
	
	<div class="body">
		<div class="head">
			<h2>Log In</h2>
		</div>
		<form action="login.php" method="POST">
			<table cellspacing="25">
				<tr>
					<td><input type="text" id="username" name="username" placeholder="Username" autofocus required></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="password" id="password" name="password" placeholder="Password" autofocus required></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="submit" id="submit" name="submit" value="Log In"></td>
				</tr>
				<tr><td><br></td></tr>
			</table>		
		</form>
	</div>
	<script type="text/javascript" src="./assets/js/css"></script>
</body>
</html>