
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Parking Pay</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.29" />
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
if(isset($_POST["time"])){
	
}
$time = stripslashes($_REQUEST['time']); 
$time = mysqli_real_escape_string($con,$time); 

$space = stripslashes($_REQUEST['space']); 
$space = mysqli_real_escape_string($con,$space);

$price = stripslashes($_REQUEST['price']); 
$price = mysqli_real_escape_string($con,$price); 

$trn_date = date("Y-m-d H:i:s");
$query = "INSERT into `project4`.`parkingSpaces` (Username, SpaceNumber, price, Date) VALUES ('$username', '$space', '$price', '$trn_date')";
$result = mysqli_query($con,$query);
if($result){
echo "<div class='form'><h3>You are staying for $time for $ $price.</h3><br/>Click here to go <a href='index.php'> Home</a></div>";
}
}else{
?>

<form name = "pay" oninput="price.value=parseInt(a.value)*parseInt(b.value)">
0<input name = "time" type="range" id="a" min = 1 max = 30 value="15">30
*<input type = "number" id="b" value="5">
=$<output name = "price" for="a b"></output>
</form>

<form name="parking" action="" method="post">
	
<select name = "space" id = "space">
	<option name = "1" id = "1"> 1</option>
	<option name = "2" id = "2"> 2</option>
	<option name = "3" id = "3"> 3</option>
	<option name = "4" id = "4"> 4</option>
	<option name = "5" id = "5"> 5</option>
	<option name = "6" id = "6"> 6</option>
	<option name = "7" id = "7"> 7</option>
	<option name = "8" id = "8"> 8</option>
	<option name = "9" id = "9"> 9</option>
	<option name = "10" id = "10"> 10</option>
	<option name = "11" id = "11"> 11</option>
	<option name = "12" id = "12"> 12</option>
	<option name = "13" id = "13"> 13</option>
	<option name = "14" id = "14"> 14</option>
	<option name = "15" id = "15"> 15</option>
	<option name = "16" id = "16"> 16</option>
	<option name = "17" id = "17"> 17</option>
	<option name = "18" id = "18"> 18</option>
	<option name = "19" id = "19"> 19</option>
	<option name = "20" id = "20"> 20</option>
</select>
<input type="text" name="username" placeholder="Username" required />
<input type="submit" name="submit" value="Pay" />
</form>

<img src = "park.svg" height = "75%" width = 75%>
<?php } ?>
</body>

</html>
