<?php
session_start();
if (isset($_SESSION['username'])){
$user = $_SESSION['username'];
$msg = "Logged in as ".$user ;
 include "connection.php";
if (isset($_POST['product_name'])) {
	
     $product_name = mysqli_real_escape_string($con,$_POST['product_name']);

	$price = mysqli_real_escape_string($con,$_POST['price']);
		$man_year = mysqli_real_escape_string($con,$_POST['man_year']);
	$description = mysqli_real_escape_string($con,$_POST['description']);
	// See if that product name is an identical match to another product in the system
        
	$sql = mysqli_query($con,"SELECT id FROM products WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysqli_num_rows($sql); // count the output amount
   if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysqli_query($con,"INSERT INTO products (product_name, price, description,man_year, date_added) 
        VALUES('$product_name','$price','$description','$man_year',now())") or die (mysqli_error($con));
    }

}

else{
$msg = "not logged in";
header("location: admin_login.php");
}
?>

<?php 
$product_list = "";
$sql = mysqli_query($con,"SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysqli_num_rows($sql); 
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $product_list .= "Product ID: $id - <strong>$product_name</strong> - $price - <em>Added $date_added</em><br/> ";
    }
} else {
	$product_list = "You have no products listed in your store yet";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory List</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">


  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
<div align="right" style="margin-right:32px;"><form action="logout.php">
<input type="submit" value="logout">
</form><br/><a href="inventory_list.php#inventoryForm">+ Add New Store Item</a>
</div>
<div align="left" style="margin-left:24px;">
      <h2>The List of Products We Have</h2>
      <?php echo $product_list; ?>
    </div>

    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
     Add New Inventory Item
    </h3>
    <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="product_name" type="text" id="product_name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          £
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
            
      <tr>
        <td align="right">Product Description</td>
        <td><label>
          <textarea name="description" id="description" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
<tr>
        <td align="right">Manufactured Year</td>
        <td><label>
          <textarea name="man_year" id="man_year" size="12" ></textarea>
        </label></td>
      </tr>


      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Add This Item Now" />
        </label></td>
      </tr>
<tr>
<td>&nbsp;</td>
<td>
<a href="orders.php">View Orders</a>
</td>
</tr>

    </table>

    </form>

    <br />
  <br />

  </div>
   <div id="pageFooter">Copyright | <a href="admin_login.php">Admin</a></div>
</div>

</body>
</html>