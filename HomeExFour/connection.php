<?php
session_start();
$host="mysql.metropolia.fi";
$user="hanad";
$pass="iloveprogramming";
$db="hanad";

$con=mysqli_connect($host,$user,$pass,$db);
function loggedin()
{
if(isset($_SESSION['username'])||isset($_COOKIE['username']))
{

$loggedin=TRUE;
}
return $loggedin;
}


?>
