
<!DOCTYPE html>

<html>

<head>
	<title>Rental</title>
	<meta charset="utf-8">
	
</head>
	
<body>
	
<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "project4";
	
	$con = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn -> error);
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
$username = stripslashes($_REQUEST['username']); // removes backslashes
$username = mysqli_real_escape_string($con,$username);//escapes special characters in a string
$type = stripslashes($_REQUEST['type']); 
$type = mysqli_real_escape_string($con,$type); 
$price = stripslashes($_REQUEST['price']); 
$price = mysqli_real_escape_string($con,$price); 

$trn_date = date("Y-m-d H:i:s");
$query = "INSERT into `project4`.`Rental` (User, Type, Price, Date) VALUES ('$username', '$type', '$price', '$trn_date')";
$result = mysqli_query($con,$query);
if($result){
echo "<div class='form'><h3>The $type you are renting costs $ $price.</h3><br/>Click here to go <a href='index.php'> Home</a></div>";
}
}else{
?>

<form name="rental" action="" method="post">
	
<input type="text" name="username" placeholder="Username" required />

<select name = "type" id = "carType">
	<option name = "compact" id = "compact"> Compact</option>
	<option name = "midSize" id = "midSize"> MidSize</option>
	<option name = "SUV" id = "SUV"> SUV</option>
	<option name = "luxury" id = "luxury"> Luxury</option>
</select>
<select name = "price" id = "price">
	<option name = "300" id = "300" value = "300"> $300</option>
</select>
<input type="submit" name="submit" value="Rent" />
<br>

<img id = "car" src = "compact.jpg" title = "compact" height = "25%" width = "25%">
<img id = "car" src = "midSize.jpg" title = "midSize" height = "25%" width = "25%">
<img id = "car" src = "SUV.jpg" title = "SUV" height = "20%" width = "20%">
<img id = "car" src = "luxury.png" title = "luxury">





<?php } ?>
</form>

	
</body>

</html>
