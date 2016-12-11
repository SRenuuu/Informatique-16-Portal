<?php session_start(); if(empty($_SESSION[ "login"][ "teamname"]) || empty($_SESSION[ "login"][ "teamemail"])){ die("Login required!"); } ?>

<?php
include("../connection.php");

$q = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION["login"]["teamname"]."'");
$data = mysqli_fetch_array($q);

$currentlevel = $data["level4level"];

if($currentlevel == 1){
	mysqli_query($conn,"UPDATE contestdata SET level4level='2', level4score = '200' WHERE teamname='".$_SESSION["login"]["teamname"]."'");
} else if($currentlevel == 0) {
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
.image {
	display:inline-block;
	width:800px;
	height:400px;
	background-image:url(stcmountwallpaper.jpg);
	background-size:cover;
	background-position:center;
}
.description {
	display:inline-block;
	width:800px;
}
</style>
<body>

<div class="image"></div>

<div class="description">
	<h2>History of S. Thomas' College Mount Lavinia</h2>
    <p>S. Thomas' College, Mount Lavinia (STC) is a selective entry boys' private Anglican school providing primary and secondary education in Sri Lanka. It is considered to be one of the most prestigious schools in the country and its former pupils include four former Prime Ministers of Sri Lanka.<br/><br/>

S. Thomas’ College was founded by the first Bishop of Colombo, the Rt. Rev. James Chapman, D. D. It was his foremost vision to build a College & Cathedral for the new Diocese of Colombo of the Church of Ceylon. Thus on the 3rd of February 1851 the College of St .Thomas the Apostle, Colombo was opened with the objective of training a Christian Clergy and to make Children good citizens under the discipline & supervision of Christianity.</p>
<p><b>Content Source: Wikipedia</b></p>

	<p><small>HINT: All the elements of a webpage are having different types of source files that can be viewed.</small></p>
</div>

<div class="clearfix"></div>

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