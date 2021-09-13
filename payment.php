<?php
session_start();

$recieptno=$_SESSION["recieptno"];
$fullname=$_SESSION["fullname"];

if(isset($_POST["submit"])){
	if(isset($_POST["cardno"])&&($_POST["bank"]!="none")&&($_POST["card_type"]!="none")){

		$_SESSION["card_type"]=$_POST["card_type"];
		$_SESSION["bank"]=$_POST["bank"];
		$_SESSION["recieptno"]=$recieptno;

		header("Location: final.php");
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Payment </title>
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
	      <a class="navbar-brand" href="profile.php">Indian Railways </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="profile.php">Home</a></li>
			<li class="active"><a href="payment.php">Ticket Booking</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="profileupdate.php"><?php echo"$fullname"?></i></a></li>
	        <li><a href="logout.php">Logout <i class="fa fa-user" aria-hidden="true"></i></a></li>
	      </ul>
	    </div>
	  	</div>
	</nav>
	
	<div class="body">
	<div class="head">
		<h2>Online Payment</h2>
	</div>
	<form action="payment.php" method='POST'>
		<table>
			<tr>
				<td>
					<input type="text" name="recieptno" value="<?php echo 'Reciept No : '.$recieptno;?>" disabled>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>
					<input type="text" name="username" value="<?php echo $fullname;?>" disabled>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>
					<input type="text" minlength="16" maxlength="16" id="cardno" name="cardno" placeholder='Card no.'>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>
					<select name='bank' id="bank">
					<option value='none'>Bank</option>
					<option>Bank of Baroda</option><option>Bank of India</option><option>Bank of Maharashtra</option><option>Canara Bank</option><option>Central Bank of India</option><option>Indian Bank</option><option>Indian Overseas Bank</option><option>Jammu & Kashmir Bank</option><option>Punjab and Sind Bank</option><option>Punjab National Bank</option><option>State Bank of India</option><option>UCO Bank</option><option>Union Bank of India</option>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>
					<select name='card_type' id="card_type">
						<option value='none'>Card type</option>
						<option>Credit card</option>
						<option>Debit card</option>
						<option>Chrage card</option>
						<option>ATM card</option>
					</select>
				</td>
			</tr>
			<tr><td><br></td></tr>
		</table>
		<input type="submit" name="submit" id="submit" value='Done'>
	</form>
	</div>
	<script type="text/javascript" src="./assets/js/payment.js"></script>
</body>
</html>