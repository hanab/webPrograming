<?php

include'connection.php';
if(!loggedin())
{header("Location:index.php");
exit();
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
            <td colspan="2"><a href="http://users.metropolia.fi/~hanad/HomeExFour/index.php">Home</a>&nbsp; &middot; &nbsp; <a href="logout.php">logout</a>
                </tr>
    </table>

    </div>
<div id="pageContent">

<br/>
<br/>
<table>
<tr>
<td>Change background color:</td>
<td>
<select name="" id="list">
<option value="#848484">Gray</option>
<option value="#FFFFEF">White</option>
<option value="#FF0040">Red</option>
<option value="#DF01D7">Pink</option>
<option value="#8000FF">Purpl</option>
<option value="#0101DF">blue</option>
<option value="#00FFFF">Sky Blue</option>
<option value="#FFFF00">Yello</option>
<select/>
</td><//tr>
<tr>
<td>
Change font color:</td>
<td>
<select name="" id="fontcolor">
<option value="#000000">black</option>
<option value="#181818 ">black2</option>
<option value="#404040 ">black3</option>
<option value="#B8B8B8">Gray2</option>

<option value="#848484">Gray</option>
<option value="#FFFFEF">White</option>
<option value="#FF0040">Red</option>
<option value="#DF01D7">Pink</option>
<option value="#8000FF">Purpl</option>
<option value="#0101DF">blue</option>
<option value="#00FFFF">Sky Blue</option>
<option value="#FFFF00">Yellow</option>
<select/>
<td/>
</tr>
<tr>
<td>
change font size:</td>
<td>
<select id="size">
         <option value="5">5</option>
         <option value="7">7</option>
         <option value="10">10</option>
         <option value="12">12</option>
         <option value="14">14</option>
         <option value="20">20</option>
         <option value="30">30</option>
         <option value="24">24</option>
         <option value="32">32</option>
         <option value="42">42</option>
         </select>
</td>
</tr>
</table>
<div name="sometext" id="demo">
<br/>
jquery is fun.<br/>
find some tutorials from w3schools to learn more <br/>
logged in!<p/>
<br/>
<br/>

</div>

<div id="pageFooter">Copyright | <a href="http://users.metropolia.fi/~hanad/HomeExFour/index.php">Login</a></div>

	</div>
	</body>
</html>