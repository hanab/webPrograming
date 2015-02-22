<?php
session_start();
session_destroy();
if (isset($_SESSION['username'])){
$msg = "successfully logged out";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logout</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
<?php include_once("template_header.php");?>
<div id="pageContent">
<div style="margin:24px; text-align:left;">

<?php
    echo $msg;
    ?>
</div>
<br />
</div>
<div id="pageFooter">Copyright | <a href="http://users.metropolia.fi/~hanad/Newfolder/admin_login.php">Back to Admin page</a></div>
</div>
</body>
</html>