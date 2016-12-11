<?php session_start(); if(empty($_SESSION[ "login"][ "teamname"]) || empty($_SESSION[ "login"][ "teamemail"])){ die("Login required!"); } ?>

<?php
include("../connection.php");

$q = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION["login"]["teamname"]."'");
$data = mysqli_fetch_array($q);

$currentlevel = $data["level4level"];

if($currentlevel == 2){
	mysqli_query($conn,"UPDATE contestdata SET level4end=NOW(), level4level='3', level4score = '300' WHERE teamname='".$_SESSION["login"]["teamname"]."'");
} else if($currentlevel == 0 || $currentlevel == 1) {
	mysqli_query($conn,"UPDATE contestdata SET level4cheated = '1' WHERE teamname='".$_SESSION["login"]["teamname"]."'");
	die("No cheating please!");		
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INFORMATIQUE '16 -LEVEL 02</title>
</head>
<style>
body {
	color:#fff;
	font-family:'Open Sans';
	padding:0;
	margin:10px;;
	background:#000;
	text-align:center;
	background-image:url(../img/background1.jpg);
	background-size:cover;
	background-attachment:fixed;
}
.description {
	position:absolute;
	top:43%;
	left:27%;
}
</style>
<body>

<div class="image"></div>

<div class="description">
	<h2>Congratulations!</h2>
	<p>You have successfully completed the puzzle solving level! Total Rewards: 300 Points</p>
    <p><a style="color:#fff;" href="http://stcicts.org/informatique/portal/">Return Home</a></p>
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