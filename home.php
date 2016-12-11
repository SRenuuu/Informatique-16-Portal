<?php include( "template/portalheader.php"); ?>

<div class="inner cover">
    <h1 class="cover-heading">Hello, <?php echo $_SESSION["login"]["teamname"] ?></h1>
	
    <p class="lead">Welcome to the official submission portal of Informatique '16
	<?php
		if (new DateTime() >= new DateTime("2016-09-28 00:00:00")) {
			?>
			<br/><b>IMPORTANT: </b>Online Contest round has begun. You may complete the contest by visiting the 'Selection Phase' link on the navigation bar. Competition will last on the <b>3rd of October 2016</b>.
			<?php
		} else {
			?>
			<br/>All submissions will be accepted between 28th of September to 3rd of October. Stay tuned to STCICTS for more details.
			<?php
		}
	?>
	</p>
	
</div>

<?php include( "template/portalfooter.php"); ?>