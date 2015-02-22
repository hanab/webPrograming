<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
<?php include_once("template_header.php");?>
<div id="pageContent">
<div style="margin:24px; text-align:left;">

<br />


<br />
<br />
<h3>Checkout</h3>
<form>
<table class="checkout">
<tr>
<td></td>
</tr>
<tr>
<td><label>name</label></td>
<td><input  type="text" name="name" size="20px"></input><br></td>
</tr>
<tr>
<td><label>email</label></td>
<td><input  type="text" name="email" size="20px"></input><br></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="checkout" formmethod="post" formaction="checkout.php"></input></td>
</tr>

</table>
</form>


</div>
<br />
</div>
<div id="pageFooter">Copyright | <a href="http://users.metropolia.fi/~hanad/Newfolder/index.php">Back to Home</a></div>
</div>
</body>
</html>

<?php
    require("connection.php");
    session_start();
    
    if (isset($_POST["name"])) {
        // find from formfields
        $uname = $_POST["name"];
        $uemail = $_POST["email"];
            foreach ($_SESSION["cart_array"] as $each_item) {
            // get the item id and corresponding quantity from session
            while (list($key, $value) = each($each_item)) {
                $id=$each_item['item_id'];
                $quantity=$each_item['quantity'];
                
                
            }
//insert the above four colums into the database
              $sql = mysqli_query($con,"INSERT INTO orders (product_id,custumer_name,custumer_email,product_quantity) VALUES ('$id', '$uname', '$uemail','$quantity')")or die (mysqli_error($con));  
       
            }
        
    }
    
    ?>
	



