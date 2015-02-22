<?php 

// error reporting helps when there are to many phpm files
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
	$dynamicList = "We have no products listed in our store yet";
include "connection.php";
$dynamicList = "";
$sql = mysqli_query($con,"SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
$productCount = mysqli_num_rows($sql); // count the output amount
 if($productCount > 0) {
	while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .='<table width="100%" border="0" cellspacing="0" cellpadding="6"> <tr>
        <tr>
        <td width="17%" valign="top"></td>
        <td width="83%" valign="top">' . $product_name . '<br />
        $' . $price . '<br />
        <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {

    mysqli_close($con);}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="32%" valign="top"><h3>Looking for latest Ethiopian Traditional cloths?</h3>
      
    <td width="35%" valign="top"><h3>Latest Designer Fashions</h3>
      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br />
      </p></td>
    <td width="33%" valign="top"><h3>What we offer</h3>
      <p>We have cloths for both sex and all ages.Our products are designed by the best designers in the country.We have variety of cloths from almost all of the tribs.Our custumers always give us positive feedbacks.You definatly should try one!!</p></td>
  </tr>
</table>

  </div>
 <div id="pageFooter">Copyright | <a href="http://users.metropolia.fi/~hanad/Newfolder/admin_login.php">Admin</a></div>
</div>
</body>
</html>