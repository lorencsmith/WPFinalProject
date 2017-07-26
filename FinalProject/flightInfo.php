<html>

<head>

<title>View album</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>

<div class="container">

<div class="header"><h1>Flight List</h1></div>

<div class="form">

<?php

require('db.php');

$query = "SELECT * FROM flight";

$result = mysqli_query($con, $query);

if ($result->num_rows > 0) {

// output data of each row

while($row = $result->fetch_assoc()) {

echo "Flight ID: " . $row["id"]. " - Destination: " . $row["destination"]. " - Ticket Price: ".$row["price"]." <br>";

}

} else {

echo "0 results";

}?>


<p> To book more flights <a href="flight.php" target="_blank">Click Here!</a></p>

</div>

<div class="footer">

<h6>Final Project (Flight List) </h6>

</div>

</div>

</body>

</html>