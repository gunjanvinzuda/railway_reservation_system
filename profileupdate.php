<?php
session_start();

$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");

$username= $_SESSION["username"];

$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
$numrows = mysqli_num_rows($query);

if($numrows!=0){
	while($row = mysqli_fetch_assoc($query)){
		$fullname=$row["name"];
		$age=$row["age"];
		$email=$row["email"];
	}
}

if(isset($_POST["change"])){
	$name = $_POST["name"];
	$age = $_POST["age"];
	$email = $_POST["email"];	
	$query1 = mysqli_query($connect,"UPDATE user SET name='$name', age='$age', email='$email'  WHERE username='$username'");
	header("Location: profile.php");
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp2.css">
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
	      <a class="navbar-brand" href="profile.php">Indian Railways </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="profile.php">Home</a></li>
	        <li class="active"><a href="updateprofile.php">Profile</a></li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="updateprofile.php"><?php echo"$fullname"?></i></a></li>
	        <li><a href="logout.php">Logout</i></a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  	</div>
	</nav>

	<div class="body">
		<div class="head">
			<h2>E-Ticket</h2>
		</div>
	<form action='profileupdate.php' method='POST'>
		<table>
			<tr>
				<td id="col"><span class="tag" >Username</span></td>
				<td><input type="text" name="username" disabled value="<?php echo $username;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><span class="tag" >Name</span></td>
				<td><input type="text" name="name" value="<?php echo $fullname;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><span class="tag" >Email</span></td>
				<td><input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><span class="tag" >Age</span></td>
				<td><input type="number" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr><td><br></td></tr>
		</table>
		<input type="submit" id="change" name="change" value="Save">
	</form>
	</div>
</body>
</html>