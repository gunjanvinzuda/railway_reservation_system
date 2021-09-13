<?php
session_start();

$username= $_SESSION["username"];
$fullname= $_SESSION["fullname"];

if(isset($_POST["change"])){
    if(isset($_POST["currentPass"])&&isset($_POST["newPass"])&&isset($_POST["confPass"])){
        $currentPass = md5(strip_tags($_POST["currentPass"]));
        $newPass = strip_tags($_POST["newPass"]);
        $confPass = strip_tags($_POST["confPass"]);

        $connect = mysqli_connect("localhost","root") or die("Couldn't connect");
        mysqli_select_db($connect,"railway_site") or die("Couldn't find database");

        $query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'") or die("Coudl not fetch data");
        $row = mysqli_fetch_assoc($query);

        if($currentPass == $row["password"]){
            if($newPass==$confPass){
                $newPass = md5($confPass);
                mysqli_query($connect,"UPDATE user SET password='$newPass' WHERE username='$username'");
                header("Location: profile.php");
            } else {
                echo'
                <script>
                    alert("Password and confirm password are not matching")
                </script>
                ';
            }
        } else {
            echo'
            <script>
                alert("You have entered wrong current password")
            </script>
            ';
        }
    } 
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Change Password</title>
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
                <li class="active"><a href="passwordupdate.php">Change Password</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="profileupdate.php"><?php echo"$fullname"?></i></a></li>
                <li><a href="logout.php">Logout</i></a></li>
            </ul>
            </div>
	  	</div>
	</nav>

	<div class="body">
		<div class="head">
			<h2>Change Password</h2>
		</div>
	<form action='passwordupdate.php' method="POST">
		<table>
			<tr>
				<td><input type="text"  id="username"  name="username" disabled value="<?php echo $username;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="currentPass" name="currentPass" placeholder="Current password" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="newPass" name="newPass" placeholder="New password"  autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="confPass" name="confPass" placeholder="Confirm password" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
            <tr>
                <td><input type="submit" id="change" name="change" value="Change"></td>
            </tr>
            <tr><td><br></td></tr>
		</table>
	</form>
	</div>
</body>
</html>