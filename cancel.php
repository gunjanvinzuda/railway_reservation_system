<?php
session_start();
$fullname=$_SESSION["fullname"];
$username=$_SESSION["username"];
$button=$_SESSION["cancel_tkt_no"];

$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");

$query = mysqli_query($connect,"SELECT * FROM ticket WHERE username='$username'");
$numrows = mysqli_num_rows($query);

$pnr="";
$train_no="";
$doj="";
$seatno="";
$class_type="";
$source="";
$destination="";
$distance="";
$fare="";
$arrival="";
$departure="";

if($numrows!=0){
	while(($row = mysqli_fetch_assoc($query))){
		if($numrows==$button){
			$pnr=$row["pnr"];
			$train_no=$row["train_no"];
			$doj=$row["doj"];
			$seatno=$row["seatno"];
			$class_type=$row["class_type"];
			$source=$row["source"];
			$destination=$row["destination"];
			$distance=$row["distance"];
			$fare=$row["fare"];
			$arrival=$row["arrival"];
			$departure=$row["departure"];
			break;
		}
		else {
			$numrows = $numrows-1;
		}
	}
}

if(isset($_POST["yes"])){
	mysqli_query($connect,"DELETE FROM ticket WHERE pnr='$pnr'" );
	header("Location: profile.php");
} 
else if (isset($_POST["no"])) {
	header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Cancel</title>
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
	      </ul>
	      <form class="navbar-form navbar-left">
	        
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="profileupdate.php"><?php echo"$fullname"?></i></a></li>
	        <li><a href="logout.php">Logout <i class="fa fa-user" aria-hidden="true"></i></a></li>
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
	<form action='cancel.php' method='POST'>
		<table>
			<tr>
				<td id="col">Passenger Name:</td>
				<td><input type="text" disabled value="<?php echo $fullname;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>PNR</td>
				<td><input type="text" disabled value="<?php echo $pnr;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Train no.</td>
				<td><input type="text" disabled value="<?php echo $train_no;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Date Of Journey</td>
				<td><input type="text" disabled value="<?php echo $doj;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Seat no.</td>
				<td><input type="text" disabled value="<?php echo $seatno;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Class</td>
				<td><input type="text" disabled value="<?php echo $class_type;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>				
				<td>Source</td>
				<td><input type="text" disabled value="<?php echo $source;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Destination</td>
				<td><input type="text" disabled value="<?php echo $destination;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Distance</td>
				<td><input type="text" disabled value="<?php echo $distance?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Fare</td>
				<td><input type="text" disabled value="<?php echo $fare;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Arrival Time</td> 
				<td><input type="text" disabled value="<?php echo $arrival;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Departure:</td>
				<td><input type="text" disabled value="<?php echo$departure?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr><td><br></td></tr>
			<tr>
				<td colspan="2"><p>Are you sure you want to cancel the booking?</p></td>
			</tr>
			<tr>
				<td><input type="submit" class="delete" name="yes" value="Yes"></td>
				<td><input type="submit" class="delete" name="no" value="No"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>