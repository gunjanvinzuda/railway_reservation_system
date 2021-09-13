<?php
session_start();

$username = $_SESSION["username"];
$fullname=$_SESSION["fullname"];

$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");

$query = mysqli_query($connect,"SELECT * FROM ticket WHERE username = '$username'");
$numrows = mysqli_num_rows($query);

$date =  date("Y-m-d");

if(isset($_POST["button"])){
	$_SESSION["cancel_tkt_no"] = $_POST["button"];
	header("Location: cancel.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Railway Reservation | Profile</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="./assets/css/temp3.css">
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
						<li><a href="ticket_booking.php">Book Tickets</a></li>
						<li><a href="profileupdate.php">Profile</a></li>
						<li><a href="passwordupdate.php">Change Password</a></li>
					</ul>
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
			
		<form action="profile.php" method="post">
				<table cellspacing="10">					
					<?php
						if($numrows!=0){
							echo'
							<div class="heading">
								<h2>
									Your Booked Tickets
								</h2>
							</div>
							<tr>
								<td><input type="text" name="" class="head pnr" value="Pnr"></td>
								<td><input type="text" name="" class="head trainNo" value="Train no."></td>
								<td><input type="text" name="" class="head classType" value="Class"></td>
								<td><input type="text" name="" class="head doj" value="Date of journy"></td>
								<td><input type="text" name="" class="head" value="Source"></td>
								<td><input type="text" name="" class="head" value="Desination"></td>
								<td><input type="text" name="" class="head fare" value="Fare(Rs.)"></td>						
								<td><input type="text" name="" class="head cancel" value="Cancel booking"></td>	
								<tr><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td></tr>
							</tr>';

							while($row = mysqli_fetch_assoc($query)){
								$pnr=$row["pnr"];
								$train_no=$row["train_no"];
								$doj=$row["doj"];
								$fare=$row["fare"];
								$class_type=$row["class_type"];
								$source=$row["source"];
								$destination=$row["destination"];
								$format = "Y-m-d";
								$date1  = \DateTime::createFromFormat($format, $doj);
								// $date2  = \DateTime::createFromFormat($format, $date);

								echo "
									<tr>
										<td><input type='text' class='pnr' name='' value='$pnr'></td>
										<td><input type='text' class='trainNo' name='' value='$train_no'></td>
										<td><input type='text' class='classType' name='' value='$class_type'></td>
										<td><input type='text' class='doj' name='' value='$doj'></td>
										<td><input type='text' name='' value='$source'></td>
										<td><input type='text' name='' value='$destination'></td>
										<td><input type='text' class='fare' name='' value='$fare'></td>										
									";
									if($doj>$date){
										echo"
										<td><button name='button' class='cancel' id='$numrows' value='$numrows'>Cancel</button></td>
										<tr>";
									} else {
										echo"<td><button name='button' class='cancel' id='$numrows' value='$numrows' disabled>Time has expired!</button></td>
										<tr>";
									}

								$numrows=$numrows-1;
							}
							echo'</div>';
						} else {
							echo'
							<div class="heading">
								<h2>
									Your booked tickets will appear here.
								</h2>
							</div>
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