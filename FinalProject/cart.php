<?php
session_start();

error_reporting(E_ALL);
ini_Set('display_errors','1');
date_default_timezone_set('America/New_York');
include "Scripts/connect_to_php.php";
?>
<?php
if(isset($_POST['pid'])){
	$pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	//if cart is not set
	if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])<1){
		$_SESSION["cart_array"]=array(0 => array("item_id" => $pid, "quantity" => 1));

	} else {
		//add an existing item in cart and increament quantity
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so increament quantity
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php");
	exit();
}
?>
<?php
//clear cart
	if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart"){
		unset($_SESSION["cart_array"]);
	}
?>


<?php
if(isset($_POST['index_to_remove']) && $_POST['index_to_remove']!=""){
	$key_to_remove = $_POST['index_to_remove'];

	if(count($_SESSION["cart_array"])<=1){
		unset($_SESSION["cart_array"]);
	}else{
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>

<?php 
//render the cart for viewing
$cartOutput ="";
$cartTotal = '';
if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])<1){
	$cartOutput = "<h2 align='center'> Your shopping cart is empty</h2>";
}else{
	$i = 0;
	foreach($_SESSION["cart_array"] as $each_item){
		
		$item_id = $each_item['item_id'];
		$sql = mysqli_query($conn, "SELECT * FROM products WHERE id='$item_id' LIMIT 1");
		while ($row = mysqli_fetch_array($sql)) {
			$product_name = $row["product_name"];
			$price = $row["price"];
			$details = $row['details'];
		}
		$priceTot = $price * $each_item['quantity'];
		$cartTotal = $priceTot + $cartTotal;

		// $cartOutput .= "<tr>";
		// $cartOutput .= "<td>". $product_name."<td/>";
		// $cartOutput .= "<td>". $details."<td/>";
		// $cartOutput .= "<td>". $price."<td/>";
		// $cartOutput .= "<td>". $each_item['quantity']."</td>";
		// $cartOutput .= "<td>". $priceTot ."</td>";
		// $cartOutput .= "<td>X</td>";
		// $cartOutput .= "</tr>";

		$cartOutput .="<td><a href=\"product.php?id=$item_id\">$product_name</a><br/><img src='inventory_images/".$item_id.".jpg 'alt='".$product_name."' width='40' hieght='52' border='1'></td>
        <td>".$details."</td>
        <td>$". $price."</td>
        <td>". $each_item['quantity']."</td>
        <td>". $priceTot ."</td>
        <td><form action='cart.php' method='post'><input name='deleteBn".$item_id."'type='submit' value='X'/><input name='index_to_remove' type='hidden' value='".$i."'></form></td>
      </tr>";
		
		$i++;
	}
	$cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : ".$cartTotal." USD</div>";
}


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
	<title></title>
</head>
<body>
<p id="name">HAJ Clothing Store</p>
<p>Free shipping on order over $50</p>
<div align="center" id="Wrapper">
	<?php include_once("header.php");?>
	<div id="main">
	<div style="margin: 24px; text-align: left;">
	    <table width="100%" border="1" cellspacing="0" cellpadding="6">
      <tr>
        <td width="18%" bgcolor="#C5DFFA"><strong>Product</strong></td>
        <td width="45%" bgcolor="#C5DFFA"><strong>Product Description</strong></td>
        <td width="10%" bgcolor="#C5DFFA"><strong>Unit Price</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Total</strong></td>
        <td width="9%" bgcolor="#C5DFFA"><strong>Remove</strong></td>
      </tr>
<!--         <td>hat</td>
        <td>its a hat</td>
        <td>4.99</td>
        <td>1</td>
        <td>4.99</td>
        <td>X</td>
      </tr> -->
      <?php echo $cartOutput; ?>
     
     

    </table>
		<br/><br/>
		<a href="cart.php?cmd=emptycart">Clear Cart</a>
	</div>
	<?php 
		echo $cartTotal; 
	?>
	<br/>
</div>
<?php include_once("footer.php");?>
</div>
</body>
</html>