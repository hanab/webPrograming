<?php
session_start();//start the current seesion
if($_POST['username']){
require "connection.php";
//get user name and password from form fields
$u = $_POST["username"];
$p = $_POST["password"];
 
$query = "SELECT * FROM admin WHERE username='".$u."' AND password='".$p."'";
$result=mysqli_query($con, $query);//fetch fromthe database
$row=mysqli_fetch_array($result,MYSQLI_NUM);
$dbuser = $row[1];
$dbpass = $row[2];

if($u == $dbuser && $p == $dbpass){
	$_SESSION["username"] = $u;//compare the entered user name and the database user name
	echo success;
	header("location: inventory_list.php");//upon sucess direct to this page
}
else{
	$msg= "user or password not right; please try again";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Log In </title>
<link rel="stylesheet" href= "style.css"type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Login Manager</h2>
      <form id="form1" name="form1" method="post" action="admin_login.php">
        User Name:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>
  <div id="pageFooter">Copyright | <a href="#">Admin</a></div>
</div>
</body>
</html>