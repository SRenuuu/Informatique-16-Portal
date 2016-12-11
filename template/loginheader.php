<?php

session_start();

if(!empty($_SESSION["login"]["teamname"]) && !empty($_SESSION["login"]["teamemail"])){
	
	header("Location: home.php");
	exit();
}

?>

<!--
DEVELOPED BY, SURESH MICHAEL PEIRIS
-->

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Informatique '16 - PORTAL</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/portalhome.css" />
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

	<div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">
            	
                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand"><img width="100px" src="img/logo.png"/></h3>
                        <nav>
                        	<?php if(basename(__FILE__)){echo $_SERVER['QUERY_STRING']; }?>
                            <ul class="nav masthead-nav">
                                <li><a href="http://stcicts.org/informatique">Visit Home</a></li>
                                <li><a href="index.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                    </div>
                </div>
                
                <div class="inner cover">