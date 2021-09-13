<?php
session_start();

$fullname = $_SESSION["fullname"];

if(isset($_POST["submit"])&&isset($_POST["doj"])){
	if(($_POST["source"]!="none")&&($_POST["destination"]!="none")){
		$_SESSION["source"]=$_POST["source"];
		$_SESSION["destination"]=$_POST["destination"];
		$_SESSION["class_type"]=$_POST["class_type"];
		$_SESSION["doj"]=$_POST["doj"];
		
		header("Location: showtrain.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation | Ticket Booking</title>
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
			<li class="active"><a href="ticket_booking.php">Ticket Booking</a></li>
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
	
	<div class="body">
	<div class="head">
		<h2>Ticket Booking</h2>
	</div>
		<form action="ticket_booking.php" method="POST">
			<table>
				<tr>
					<td>
						<select autofocus id="source" name="source">
							<option value="none" id="selectcity" name="selectcity">From</option>
							<option>Abohar, Punjab</option><option>Adilabad, Telangana</option><option>Agartala, Tripura</option><option>Agra, Uttar Pradesh</option><option>Ahmadnagar, Maharashtra</option><option>Ahmedabad, Gujarat</option><option>Aizawl  , Mizoram</option><option>Ajmer, Rajasthan</option><option>Akola, Maharashtra</option><option>Alappuzha, Kerala</option><option>Aligarh, Uttar Pradesh</option><option>Alipurduar, West Bengal</option><option>Allahabad, Uttar Pradesh</option><option>Alwar, Rajasthan</option><option>Ambala, Haryana</option><option>Amaravati, Maharashtra</option><option>Amritsar, Punjab</option><option>Asansol, West Bengal</option><option>Aurangabad, Maharashtra</option><option>Aurangabad, Bihar</option><option>Bakshpur, Uttar Pradesh</option><option>Bamanpuri, Uttar Pradesh</option><option>Baramula, Jammu and Kashmir</option><option>Barddhaman, West Bengal</option><option>Bareilly, Uttar Pradesh</option><option>Belgaum, Karnataka</option><option>Bellary, Karnataka</option><option>Bengaluru, Karnataka</option><option>Bhagalpur, Bihar</option><option>Bharatpur, Rajasthan</option><option>Bharauri, Uttar Pradesh</option><option>Bhatpara, West Bengal</option><option>Bhavnagar, Gujarat</option><option>Bhilai, Chhattisgarh</option><option>Bhilwara, Rajasthan</option><option>Bhiwandi, Maharashtra</option><option>Bhiwani, Haryana</option><option>Bhopal , Madhya Pradesh</option><option>Bhubaneshwar, Odisha</option><option>Bhuj, Gujarat</option><option>Bhusaval, Maharashtra</option><option>Bidar, Karnataka</option><option>Bijapur, Karnataka</option><option>Bikaner, Rajasthan</option><option>Bilaspur, Chhattisgarh</option><option>Brahmapur, Odisha</option><option>Budaun, Uttar Pradesh</option><option>Bulandshahr, Uttar Pradesh</option><option>Calicut, Kerala</option><option>Chanda, Maharashtra</option><option>Chandigarh , Chandigarh</option><option>Chennai, Tamil Nadu </option><option>Chikka Mandya, Karnataka</option><option>Chirala, Andhra Pradesh</option><option>Coimbatore, Tamil Nadu </option><option>Cuddalore, Tamil Nadu </option><option>Cuttack, Odisha</option><option>Daman, Daman and Diu</option><option>Davangere, Karnataka</option><option>DehraDun, Uttarakhand</option><option>Delhi, Delhi</option><option>Dhanbad, Jharkhand</option><option>Dibrugarh, Assam</option><option>Dindigul, Tamil Nadu </option><option>Dispur, Assam</option><option>Diu, Daman and Diu</option><option>Faridabad, Haryana</option><option>Firozabad, Uttar Pradesh</option><option>Fyzabad, Uttar Pradesh</option><option>Gangtok, Sikkim</option><option>Gaya, Bihar</option><option>Ghandinagar, Gujarat</option><option>Ghaziabad, Uttar Pradesh</option><option>Gopalpur, Uttar Pradesh</option><option>Gulbarga, Karnataka</option><option>Guntur, Andhra Pradesh</option><option>Gurugram, Haryana</option><option>Guwahati, Assam</option><option>Gwalior, Madhya Pradesh</option><option>Haldia, West Bengal</option><option>Haora, West Bengal</option><option>Hapur, Uttar Pradesh</option><option>Haripur, Punjab</option><option>Hata, Uttar Pradesh</option><option>Hindupur, Andhra Pradesh</option><option>Hisar, Haryana</option><option>Hospet, Karnataka</option><option>Hubli, Karnataka</option><option>Hyderabad, Telangana</option><option>Imphal, Manipur</option><option>Indore, Madhya Pradesh</option><option>Itanagar, Arunachal Pradesh</option><option>Jabalpur, Madhya Pradesh</option><option>Jaipur, Rajasthan</option><option>Jammu, Jammu and Kashmir</option><option>Jamshedpur, Jharkhand</option><option>Jhansi, Uttar Pradesh</option><option>Jodhpur, Rajasthan</option><option>Jorhat, Assam</option><option>Kagaznagar, Andhra Pradesh</option><option>Kakinada, Andhra Pradesh</option><option>Kalyan, Maharashtra</option><option>Karimnagar, Telangana</option><option>Karnal, Haryana</option><option>Karur, Tamil Nadu </option><option>Kavaratti, Lakshadweep</option><option>Khammam, Telangana</option><option>Khanapur, Maharashtra</option><option>Kochi, Kerala</option><option>Kohima, Nagaland</option><option>Kolar, Karnataka</option><option>Kolhapur, Maharashtra</option><option>Kolkata , West Bengal</option><option>Kollam, Kerala</option><option>Kota, Rajasthan</option><option>Krishnanagar, West Bengal</option><option>Krishnapuram, Tamil Nadu </option><option>Kumbakonam, Tamil Nadu </option><option>Kurnool, Andhra Pradesh</option><option>Latur, Maharashtra</option><option>Lucknow, Uttar Pradesh</option><option>Ludhiana, Punjab</option><option>Machilipatnam, Andhra Pradesh</option><option>Madurai, Tamil Nadu </option><option>Mahabubnagar, Telangana</option><option>Malegaon Camp, Maharashtra</option><option>Mangalore, Karnataka</option><option>Mathura, Uttar Pradesh</option><option>Meerut, Uttar Pradesh</option><option>Mirzapur, Uttar Pradesh</option><option>Moradabad, Uttar Pradesh</option><option>Mumbai, Maharashtra</option><option>Muzaffarnagar, Uttar Pradesh</option><option>Muzaffarpur, Bihar</option><option>Mysore, Karnataka</option><option>Nagercoil, Tamil Nadu </option><option>Nalgonda, Telangana</option><option>Nanded, Maharashtra</option><option>Nandyal, Andhra Pradesh</option><option>Nasik, Maharashtra</option><option>Navsari, Gujarat</option><option>Nellore, Andhra Pradesh</option><option>New Delhi, Delhi</option><option>Nizamabad, Telangana</option><option>Ongole, Andhra Pradesh</option><option>Pali, Rajasthan</option><option>Panaji, Goa</option><option>Panchkula, Haryana</option><option>Panipat, Haryana</option><option>Parbhani, Maharashtra</option><option>Pathankot, Punjab</option><option>Patiala, Punjab</option><option>Patna, Bihar</option><option>Pilibhit, Uttar Pradesh</option><option>Porbandar, Gujarat</option><option>Port Blair, Andaman and Nicobar Islands</option><option>Proddatur, Andhra Pradesh</option><option>Puducherry, Puducherry</option><option>Pune, Maharashtra</option><option>Puri, Odisha</option><option>Purnea, Bihar</option><option>Raichur, Karnataka</option><option>Raipur, Chhattisgarh</option><option>Rajahmundry, Andhra Pradesh</option><option>Rajapalaiyam, Tamil Nadu </option><option>Rajkot, Gujarat</option><option>Ramagundam, Telangana</option><option>Rampura, Rajasthan</option><option>Ranchi, Jharkhand</option><option>Ratlam, Madhya Pradesh</option><option>Raurkela, Odisha</option><option>Rohtak, Haryana</option><option>Saharanpur, Uttar Pradesh</option><option>Saidapur, Uttar Pradesh</option><option>Saidpur, Jammu and Kashmir</option><option>Salem, Tamil Nadu </option><option>Samlaipadar, Odisha</option><option>Sangli, Maharashtra</option><option>Saugor, Madhya Pradesh</option><option>Shahbazpur, Uttar Pradesh</option><option>Shiliguri, West Bengal</option><option>Shillong , Meghalaya</option><option>Shimla, Himachal Pradesh</option><option>Shimoga, Karnataka</option><option>Sikar, Rajasthan</option><option>Silchar, Assam</option><option>Silvassa, Dadra and Nagar Haveli</option><option>Sirsa, Haryana</option><option>Sonipat, Haryana</option><option>Srinagar, Jammu and Kashmir</option><option>Surat, Gujarat</option><option>Tezpur, Assam</option><option>Thanjavur, Tamil Nadu </option><option>Tharati Etawah, Uttar Pradesh</option><option>Thiruvananthapuram, Kerala</option><option>Tiruchchirappalli, Tamil Nadu </option><option>Tirunelveli, Tamil Nadu </option><option>Tirupati, Andhra Pradesh</option><option>Tiruvannamalai, Tamil Nadu </option><option>Tonk, Rajasthan</option><option>Tuticorin, Tamil Nadu </option><option>Udaipur, Rajasthan</option><option>Ujjain, Madhya Pradesh</option><option>Vadodara, Gujarat</option><option>Valparai, Tamil Nadu </option><option>Varanasi, Uttar Pradesh</option><option>Vellore, Tamil Nadu </option><option>Vishakhapatnam, Andhra Pradesh</option><option>Vizianagaram, Andhra Pradesh</option><option>Warangal, Telangana</option><option>Jorapokhar, Jharkhand</option><option>Brajrajnagar, Odisha</option><option>Talcher, Odisha</option>
						</select>
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>
						<select autofocus id="destination" name="destination">
							<option value="none" id="selectcity" name="selectcity">To</option>
							<option>Abohar, Punjab</option><option>Adilabad, Telangana</option><option>Agartala, Tripura</option><option>Agra, Uttar Pradesh</option><option>Ahmadnagar, Maharashtra</option><option>Ahmedabad, Gujarat</option><option>Aizawl  , Mizoram</option><option>Ajmer, Rajasthan</option><option>Akola, Maharashtra</option><option>Alappuzha, Kerala</option><option>Aligarh, Uttar Pradesh</option><option>Alipurduar, West Bengal</option><option>Allahabad, Uttar Pradesh</option><option>Alwar, Rajasthan</option><option>Ambala, Haryana</option><option>Amaravati, Maharashtra</option><option>Amritsar, Punjab</option><option>Asansol, West Bengal</option><option>Aurangabad, Maharashtra</option><option>Aurangabad, Bihar</option><option>Bakshpur, Uttar Pradesh</option><option>Bamanpuri, Uttar Pradesh</option><option>Baramula, Jammu and Kashmir</option><option>Barddhaman, West Bengal</option><option>Bareilly, Uttar Pradesh</option><option>Belgaum, Karnataka</option><option>Bellary, Karnataka</option><option>Bengaluru, Karnataka</option><option>Bhagalpur, Bihar</option><option>Bharatpur, Rajasthan</option><option>Bharauri, Uttar Pradesh</option><option>Bhatpara, West Bengal</option><option>Bhavnagar, Gujarat</option><option>Bhilai, Chhattisgarh</option><option>Bhilwara, Rajasthan</option><option>Bhiwandi, Maharashtra</option><option>Bhiwani, Haryana</option><option>Bhopal , Madhya Pradesh</option><option>Bhubaneshwar, Odisha</option><option>Bhuj, Gujarat</option><option>Bhusaval, Maharashtra</option><option>Bidar, Karnataka</option><option>Bijapur, Karnataka</option><option>Bikaner, Rajasthan</option><option>Bilaspur, Chhattisgarh</option><option>Brahmapur, Odisha</option><option>Budaun, Uttar Pradesh</option><option>Bulandshahr, Uttar Pradesh</option><option>Calicut, Kerala</option><option>Chanda, Maharashtra</option><option>Chandigarh , Chandigarh</option><option>Chennai, Tamil Nadu </option><option>Chikka Mandya, Karnataka</option><option>Chirala, Andhra Pradesh</option><option>Coimbatore, Tamil Nadu </option><option>Cuddalore, Tamil Nadu </option><option>Cuttack, Odisha</option><option>Daman, Daman and Diu</option><option>Davangere, Karnataka</option><option>DehraDun, Uttarakhand</option><option>Delhi, Delhi</option><option>Dhanbad, Jharkhand</option><option>Dibrugarh, Assam</option><option>Dindigul, Tamil Nadu </option><option>Dispur, Assam</option><option>Diu, Daman and Diu</option><option>Faridabad, Haryana</option><option>Firozabad, Uttar Pradesh</option><option>Fyzabad, Uttar Pradesh</option><option>Gangtok, Sikkim</option><option>Gaya, Bihar</option><option>Ghandinagar, Gujarat</option><option>Ghaziabad, Uttar Pradesh</option><option>Gopalpur, Uttar Pradesh</option><option>Gulbarga, Karnataka</option><option>Guntur, Andhra Pradesh</option><option>Gurugram, Haryana</option><option>Guwahati, Assam</option><option>Gwalior, Madhya Pradesh</option><option>Haldia, West Bengal</option><option>Haora, West Bengal</option><option>Hapur, Uttar Pradesh</option><option>Haripur, Punjab</option><option>Hata, Uttar Pradesh</option><option>Hindupur, Andhra Pradesh</option><option>Hisar, Haryana</option><option>Hospet, Karnataka</option><option>Hubli, Karnataka</option><option>Hyderabad, Telangana</option><option>Imphal, Manipur</option><option>Indore, Madhya Pradesh</option><option>Itanagar, Arunachal Pradesh</option><option>Jabalpur, Madhya Pradesh</option><option>Jaipur, Rajasthan</option><option>Jammu, Jammu and Kashmir</option><option>Jamshedpur, Jharkhand</option><option>Jhansi, Uttar Pradesh</option><option>Jodhpur, Rajasthan</option><option>Jorhat, Assam</option><option>Kagaznagar, Andhra Pradesh</option><option>Kakinada, Andhra Pradesh</option><option>Kalyan, Maharashtra</option><option>Karimnagar, Telangana</option><option>Karnal, Haryana</option><option>Karur, Tamil Nadu </option><option>Kavaratti, Lakshadweep</option><option>Khammam, Telangana</option><option>Khanapur, Maharashtra</option><option>Kochi, Kerala</option><option>Kohima, Nagaland</option><option>Kolar, Karnataka</option><option>Kolhapur, Maharashtra</option><option>Kolkata , West Bengal</option><option>Kollam, Kerala</option><option>Kota, Rajasthan</option><option>Krishnanagar, West Bengal</option><option>Krishnapuram, Tamil Nadu </option><option>Kumbakonam, Tamil Nadu </option><option>Kurnool, Andhra Pradesh</option><option>Latur, Maharashtra</option><option>Lucknow, Uttar Pradesh</option><option>Ludhiana, Punjab</option><option>Machilipatnam, Andhra Pradesh</option><option>Madurai, Tamil Nadu </option><option>Mahabubnagar, Telangana</option><option>Malegaon Camp, Maharashtra</option><option>Mangalore, Karnataka</option><option>Mathura, Uttar Pradesh</option><option>Meerut, Uttar Pradesh</option><option>Mirzapur, Uttar Pradesh</option><option>Moradabad, Uttar Pradesh</option><option>Mumbai, Maharashtra</option><option>Muzaffarnagar, Uttar Pradesh</option><option>Muzaffarpur, Bihar</option><option>Mysore, Karnataka</option><option>Nagercoil, Tamil Nadu </option><option>Nalgonda, Telangana</option><option>Nanded, Maharashtra</option><option>Nandyal, Andhra Pradesh</option><option>Nasik, Maharashtra</option><option>Navsari, Gujarat</option><option>Nellore, Andhra Pradesh</option><option>New Delhi, Delhi</option><option>Nizamabad, Telangana</option><option>Ongole, Andhra Pradesh</option><option>Pali, Rajasthan</option><option>Panaji, Goa</option><option>Panchkula, Haryana</option><option>Panipat, Haryana</option><option>Parbhani, Maharashtra</option><option>Pathankot, Punjab</option><option>Patiala, Punjab</option><option>Patna, Bihar</option><option>Pilibhit, Uttar Pradesh</option><option>Porbandar, Gujarat</option><option>Port Blair, Andaman and Nicobar Islands</option><option>Proddatur, Andhra Pradesh</option><option>Puducherry, Puducherry</option><option>Pune, Maharashtra</option><option>Puri, Odisha</option><option>Purnea, Bihar</option><option>Raichur, Karnataka</option><option>Raipur, Chhattisgarh</option><option>Rajahmundry, Andhra Pradesh</option><option>Rajapalaiyam, Tamil Nadu </option><option>Rajkot, Gujarat</option><option>Ramagundam, Telangana</option><option>Rampura, Rajasthan</option><option>Ranchi, Jharkhand</option><option>Ratlam, Madhya Pradesh</option><option>Raurkela, Odisha</option><option>Rohtak, Haryana</option><option>Saharanpur, Uttar Pradesh</option><option>Saidapur, Uttar Pradesh</option><option>Saidpur, Jammu and Kashmir</option><option>Salem, Tamil Nadu </option><option>Samlaipadar, Odisha</option><option>Sangli, Maharashtra</option><option>Saugor, Madhya Pradesh</option><option>Shahbazpur, Uttar Pradesh</option><option>Shiliguri, West Bengal</option><option>Shillong , Meghalaya</option><option>Shimla, Himachal Pradesh</option><option>Shimoga, Karnataka</option><option>Sikar, Rajasthan</option><option>Silchar, Assam</option><option>Silvassa, Dadra and Nagar Haveli</option><option>Sirsa, Haryana</option><option>Sonipat, Haryana</option><option>Srinagar, Jammu and Kashmir</option><option>Surat, Gujarat</option><option>Tezpur, Assam</option><option>Thanjavur, Tamil Nadu </option><option>Tharati Etawah, Uttar Pradesh</option><option>Thiruvananthapuram, Kerala</option><option>Tiruchchirappalli, Tamil Nadu </option><option>Tirunelveli, Tamil Nadu </option><option>Tirupati, Andhra Pradesh</option><option>Tiruvannamalai, Tamil Nadu </option><option>Tonk, Rajasthan</option><option>Tuticorin, Tamil Nadu </option><option>Udaipur, Rajasthan</option><option>Ujjain, Madhya Pradesh</option><option>Vadodara, Gujarat</option><option>Valparai, Tamil Nadu </option><option>Varanasi, Uttar Pradesh</option><option>Vellore, Tamil Nadu </option><option>Vishakhapatnam, Andhra Pradesh</option><option>Vizianagaram, Andhra Pradesh</option><option>Warangal, Telangana</option><option>Jorapokhar, Jharkhand</option><option>Brajrajnagar, Odisha</option><option>Talcher, Odisha</option>
						</select>
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>
						<select autofocus id="class_type" name="class_type">
							<option value="none">Type</option>
							<option value="EC">Air-Conditioned Executive Chair Class (EC)<option>
							<option value="1AC">Air-Conditioned First Class (1AC)<option>
							<option value="2AC">Air-Conditioned Two-Tier Class (2AC)<option>
							<option value="3AC">Air-Conditioned Three-Tier Class (3AC)<option>
							<option value="FC">First Class (FC)<option>
							<option value="CC">AC Chair Class (CC)<option>
							<option value="SL">Sleeper Class (SL)<option>
							<option value="2S">Second Class (2S)<option>
						</select>
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="text" name="doj" id="doj" placeholder="Date Of Journey"onfocus="(this.type='date')"onblur="(this.type='text')"></td>
				</tr>
				<tr><td><br></td></tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="submit" name="submit" id="submit" value="Choose Train"></td>
				</tr>
				<tr><td><br></td></tr>
			</table>
		</form>
	</div>
		
<script type="text/javascript" src='./assets/js/ticket_booking.js'></script>
</body>
</html>