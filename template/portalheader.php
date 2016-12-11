<?php session_start(); if(empty($_SESSION[ "login"][ "teamname"]) || empty($_SESSION[ "login"][ "teamemail"])){ header( "Location: index.php"); exit(); } ?>

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
    <link rel="stylesheet" href="fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
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
                                <li><a href="home.php">Home</a></li>
								<?php
								if (new DateTime() >= new DateTime("2016-09-28 00:00:00")) {
									echo '<li><a href="preliminary.php">Selection Phase</a></li>';
								}
								?>
                                <li><a href="indi.php">Individual Project Submission</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                    </div>
                </div>