<?php
session_start();

$fullname=$_SESSION["fullname"];
$source=$_SESSION["source"];
$destination=$_SESSION["destination"];
$class_type=$_SESSION["class_type"];

$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");

$query = mysqli_query($connect,"SELECT * FROM train WHERE source='$source' AND destination='$destination'");
$numrows = mysqli_num_rows($query);

$pnrhead=rand(100,999);
$pnrtail=rand(1000000,9999999);
$seatno=rand(1,30);
$seatch='ABCDEFG'[rand(0,6)];

if(isset($_POST["button"])){
	$_SESSION["seatno"]=$seatno.'-'.$seatch;
	$_SESSION["pnr"]=strval($pnrhead).'-'.strval($pnrtail);
	$_SESSION["button"]=$_POST["button"];

	header("Location: showticket.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Railway Reservation | Trains </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp4.css">
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
				<li class="active"><a href="showtrain.php">Ticket Booking</a></li>
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
		<div class="block">
			
			<form action="showtrain.php" method="post">
				<table cellspacing="29">					
						<?php
						if($numrows!=0){
							echo'
							<h2 class="heading">
								Available Trains
							</h2>
							<tr>
								<td><input type="text" name="" class="head train" value="Train"></td>
								<td><input type="text" name="" class="head arrival" value="Arrival Time"></td>
								<td><input type="text" name="" class="head departure" value="Departure Time"></td>
								<td><input type="text" name="" class="head classType" value="Class"></td>
								<td><input type="text" name="" class="head fare" value="Fare(Rs.)"></td>
								<td><input type="text" name="" class="head select" value="Choose train"></td>
								<tr><td><br></td></tr>
							</tr>
							';
							while($row = mysqli_fetch_assoc($query)){
								$src=$row["source"];
								$dstn=$row["destination"];
								$arrival=$row["arrival"];
								$departure=$row["departure"];
								$train_no=$row["train_no"];
								$query2="";
								
								if($class_type=="none"){
									$query2 = mysqli_query($connect,"SELECT * FROM train WHERE train_no='$train_no'");
								} else {
									$query2 = mysqli_query($connect,"SELECT * FROM train WHERE train_no='$train_no' AND class_type='$class_type'");
								}

								while($row2 = mysqli_fetch_assoc($query2)){
									$fare=$row2["fare"];
									$class_type=$row2["class_type"];

									echo "
									<tr>
										<td><input type='text' name='' class='train' value='$src to $dstn'></td>
										<td><input type='text' name='' class='arrival' value='$arrival'></td>
										<td><input type='text' name='' class='departure' value='$departure'></td>
										<td><input type='text' name='' class='classType' value='$class_type'></td>
										<td><input type='text' name='' class='fare' value='$fare'></td>
										<td><button name='button' class='select' id='$numrows' value='$numrows'>Select</button></td>
									</tr>";

									$numrows=$numrows-1;
								}
							}
						} else {
							echo'
							<h2 class="heading">
								Sorry, no trains are available!! Try sometime later.
							</h2>
							';
						}
						?>
				</table>
			</form>
			</div>
			<script
    		src="https://code.jquery.com/jquery-3.4.1.min.js"
    		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    		crossorigin="anonymous"></script>
  			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>