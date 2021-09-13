<?php
session_start();
$fullname=$_SESSION["fullname"];

if(isset($_POST["submit"])){
	$username=$_SESSION["username"];
	$source=$_SESSION["source"];
	$destination=$_SESSION["destination"];
	$class_type=$_SESSION["class_type"];
	$doj=$_SESSION["doj"];
	$distance=$_SESSION["distance"];
	$arrival=$_SESSION["arrival"];
	$departure=$_SESSION["departure"];
	$seatno=$_SESSION["seatno"];
	$pnr=$_SESSION["pnr"];
	$fare=$_SESSION["fare"];
	$train_no=$_SESSION["train_no"];

	$recieptno=$_SESSION["recieptno"];
	$card_type=$_SESSION["card_type"];
	$bank=$_SESSION["bank"];

	$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
	mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
	
	mysqli_query($connect,
	"INSERT INTO ticket 
	VALUES('$pnr','$username','$fullname','$train_no','$class_type','$seatno','$doj','$source','$destination','$distance','$fare','$arrival','$departure')");
	mysqli_query($connect,"INSERT INTO payment VALUES('$recieptno','$username','$pnr','$bank', '$card_type')") or die("cant insert value");
	
	header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/app.css">
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
			<li class="active"><a href="final.php">Ticket Booking</a></li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="profileupdate.php"><?php echo"$fullname"?></i></a></li>
	        <li><a href="logout.php">Logout <i class="fa fa-user" aria-hidden="true"></i></a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
	<form action="final.php" method="POST">
        <div id="content">
        	<h1>Congratulation</h1>
          <h2>You Have Successfully Booked Your Ticket</h2>
          <hr>
        </div>
  </div>
		<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>