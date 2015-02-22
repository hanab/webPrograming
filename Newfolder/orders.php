<?php
    $cartOutput = "";
    $dynamicList = "There are no ordered products";
    include "connection.php";
    $dynamicList = "";
    $sql = mysqli_query($con,"SELECT * FROM orders LIMIT 10");
    $productCount = mysqli_num_rows($sql); // count the output amount
    if($productCount > 0) {
        while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
            $id = $row["id"];
            $product_id = $row["product_id"];
            $Custumer_name = $row["custumer_name"];
            $Emaill=$row["custumer_email"];
            $quantity=$row["product_quantity"];
            $cartOutput .= "<tr>";
            $cartOutput .= '<td> <a href="product.php?id=' . $product_id . '">' . $product_id . '<br/>View Product Detail</a> </td>';
            $cartOutput .= '<td>' . $Custumer_name. '</td>';
            $cartOutput .= '<td>' . $Emaill . '</td>';
            $cartOutput .= '<td>' .$quantity .'</td>';
            $cartOutput .= '</tr>';
            
        }
        } else {
            
            mysqli_close($con);

}

    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Cart</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
<?php include_once("template_header.php");?>
<div id="pageContent">
<div style="margin:24px; text-align:left;">

<br />
<table width="100%" border="1" cellspacing="0" cellpadding="6">
<tr>
<td width="18%" bgcolor="#C5DFFA"><strong>Product ID</strong></td>
<td width="45%" bgcolor="#C5DFFA"><strong>Custumer Name</strong></td>
<td width="10%" bgcolor="#C5DFFA"><strong>Email</strong></td>
<td width="9%" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
</tr>
<?php echo $cartOutput; ?>
</table>

<br />
<br />


</div>
<br />
</div>
<div id="pageFooter">Copyright | <a href="http://users.metropolia.fi/~hanad/Newfolder/inventory_list.php">Back to Admin page</a></div>
</div>
</body>
</html>

