<?php

?>

<?php
date_default_timezone_set('America/New_York');
include "Scripts/connect_to_php.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$id = preg_replace('#[^0-9]#i','', $_GET['id']);
	//check if id exits
	$sql = mysqli_query($conn,"SELECT * FROM products WHERE id='$id' LIMIT 1");
	$productCount = mysqli_num_rows($sql);

	if($productCount > 0){
	while($row = mysqli_fetch_array($sql)){
		$id = $row["id"];
		$price = $row["price"];
		$details = $row['details'];
		$category = $row['category'];
		$subcategory = $row['subcategory'];
		$product_name = $row["product_name"];
		$date_added = date("Y/m/d", strtotime($row["date_added"]));
	}

}else{
	echo "No prodcut in the system with that ID";
	exit();
}

}else{
	echo "Data missing";
	exit();
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>$prduct_name</title>
</head>
<body>
<div align="center" id="mainWrapper">
	<?php include_once("header.php");?>
	<div id="main">
		<table width="100%" border="0" cellspacing="0" cellpadding="15">
			<tr>
				<td width="20%" valign="top"><img src="inventory_images/<?php echo $id;?>.jpg" width="142" height="188" alt="<?php echo $prduct_name;?>"/><br/>
					<a href="">view full image</a>
				</td>
				<td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
      <p><?php echo "$".$price; ?><br />
        <br />
        <?php echo  "$subcategory"; ?> <br />
		<br />
        <?php echo $details; ?>
		<br />
        </p>
         <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
      </form>
        </td>

			</tr>
		</table>
	</div>
</div>

</body>
</html>