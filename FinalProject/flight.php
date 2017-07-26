<!DOCTYPE html>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Flight Data</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>

<?php

require('db.php');

$seats = 50;

if (isset($_REQUEST['destination'])){

$destination = stripslashes($_REQUEST['destination']);

$price = stripslashes($_REQUEST['price']);

$date = date("Y-m-d H:i:s");

$seats = $seats-1;

$query = "INSERT into `flight` (destination, price, seats_left, book_date) VALUES ('$destination', 500, '$seats', '$date')";

$result = mysqli_query($con,$query);

if($result){
$seats = $seats-1;
echo "<div class='container'>

<div class='header'><h1>Congratulations, </h1></div>

<div class='form'><h3>Your flight has been booked!</h3><br/>Click here to <a href='viewFlightInfo.php'> view flight details </a></div></div>

</div>";

}

}else{

?><div class="container">

<div class="header"><h1>Where would you like to go?</h1></div>

<div class="form">

<h2>Flight Info Below</h2>

<form name="registration" action="" method="post">

<input type="text" name="destination" placeholder="Where are you flying to?" required />

<input type="text" name="price" placeholder="Price Preset to $500 for all flights, enter Y to confirm" required />

<input type="submit" name="submit" value="Submit" />

</form>

<br /><br />

</div>

<?php } ?>

<div class="footer">

<h6>Final Project (Flight Info) </h6>

</div>

</div>

</body>

</html>