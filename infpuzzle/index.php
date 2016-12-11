<?php session_start(); if(empty($_SESSION[ "login"][ "teamname"]) || empty($_SESSION[ "login"][ "teamemail"])){ die("Login required!"); } ?>

<?php
include("../connection.php");

$q = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION["login"]["teamname"]."'");
$data = mysqli_fetch_array($q);

$currentlevel = $data["level4level"];

if($currentlevel == 0){
	mysqli_query($conn,"UPDATE contestdata SET level4start=NOW(), level4level='1', level4score = '100' WHERE teamname='".$_SESSION["login"]["teamname"]."'");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INFORMATIQUE '16 -LEVEL 01</title>
</head>
<style>
body {
	background-image:url(blablabla.png);
	color:#fff;
	font-family:'Open Sans';
}
.center {
	margin:auto;
	width:500px;
	position:absolute;
	top:35%;
	left:30%;
	text-align:center;
}
</style>
<body>
<div class="center">
<h1>Congratulations you are now in level 01!</h1>
<p>How applications are being read by the computer??</p>
<p><input style="padding:10px;" type="text" placeholder="Your answer here"/><input onClick="alert('Wrong Answer!');" style="padding:10px;" type="button" value="Submit Answer"/></p>
<small>"Don't believe everything what you see on the internet"<br/>-Abraham Lincon</small>
</div>

<script language="javascript">
	document.onmousedown=disableclick;
	status="Right Click Disabled";
	function disableclick(event)
	{
	  if(event.button==2)
	   {
		 alert(status);
		 return false;    
	   }
	}
</script>

</body>
</html>