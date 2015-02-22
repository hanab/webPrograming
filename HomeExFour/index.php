<?php
include'connection.php';

if($_POST['login'])
{
$username=$_POST['username'];
$password=$_POST['password'];
$rememberme=$_POST['rememberme'];
if($username && $password)
{
$login=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
while($row=mysqli_fetch_assoc($login))
{
$db_password=$row['password'];
if($db_password==$password)
   $loginok=TRUE;
else
  $loginok=FALSE;
if($loginok==TRUE)
{
if($rememberme=="on")
   setcookie("username",$username,time()+3600);
else if($rememberme=="")
    $_SESSION['username']=$username;
header("Location:page.php");
exit();
}
else{
die("incorrect username/password combination!");
}

}

}
else
{
die("please enter username and password");
}



}




?>
<!DOCTYPE HTML PUBLIC "-//W 3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Personalize</title>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="personalize.js"></script>
<script type="text/javascript" src="cookie.js"></script>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div align="center" id="mainWrapper">
    
    
    <div id="pageHeader"><table width="100%" border="0" cellspacing="0" cellpadding="12">
        <tr>
            <td colspan="2"><a href="http://users.metropolia.fi/~hanad/HomeExFour/index.php">Home</a>&nbsp; &middot; &nbsp; <a href="#">More</a>
                </tr>
    </table>
    </div>
<div id="pageContent">

<br/>
<br/>

<form action="index.php" method="post">
Username:
<input type="text" name="username"><P/>
Password:
<input type="password" name="password"><p/>
<input type="checkbox" name="rememberme">Remember me<br/>
<input type="submit" name="login" value="Log In">



</form>
<br/>
<br/>

<div id="pageFooter">Copyright | <a href="http://users.metropolia.fi/~hanad/HomeExFour/index.php">Login</a></div>


</div>
</body>
</html>