<?php include( "template/portalheader.php"); ?>

<div class="inner cover">
    <h1 class="cover-heading">Inf '16 - RESULTS</h1>
    <?php
	include("connection.php");
	$query = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION["login"]["teamname"]."'");
	$data = mysqli_fetch_array($query);
	?>
    <div style="overflow:scroll;height: 299px;">
    <p class="lead">
    <h1><b>Total Points: <?php echo($data["level1score"]+$data["level2score"]+$data["level3score"]+$data["level4score"]); ?></b></h1>
    </p>
    <hr/>
    <p class="lead">
    	<b>LEVEL 01</b>
        <table width="100%" style="font-size: 18px;text-align: left;width: 450px;" align="center">
        	<tr>
            	<td width="50%">Attemped:-</td>
                <td width="50%"><?php if($data["level1start"] != 0){echo $data["level1start"];}else{echo "NOT ATTEMPED";} ?></td>
            </tr>
            <tr>
            	<td width="50%">Correct Answers:-</td>
                <td width="50%"><?php echo $data["level1right"] ?></td>
            </tr>
            <tr>
            	<td width="50%">Wrong Answers:-</td>
                <td width="50%"><?php echo $data["level1wrong"] ?></td>
            </tr>
            <tr>
            	<td width="50%">Not done:-</td>
                <td width="50%"><?php echo $data["level1unans"] ?></td>
            </tr>
            <tr>
            	<td width="50%"><b>Total Score:-</b></td>
                <td width="50%"><b><?php echo $data["level1score"] ?></b></td>
            </tr>
        </table>
    </p>
    <hr/>
    <p class="lead">
    	<b>LEVEL 02</b>
    	<table width="100%" style="font-size: 18px;text-align: left;width: 450px;" align="center">
        	<tr>
            	<td width="50%">Attemped:-</td>
                <td width="50%"><?php if($data["level2start"] != 0){echo $data["level2start"];}else{echo "NOT ATTEMPED";} ?></td>
            </tr>
            <tr>
            	<td width="50%">Correct Answers:-</td>
                <td width="50%"><?php echo $data["level2right"] ?></td>
            </tr>
            <tr>
            	<td width="50%">Wrong Answers:-</td>
                <td width="50%"><?php echo $data["level2wrong"] ?></td>
            </tr>
            <tr>
            	<td width="50%">Not done:-</td>
                <td width="50%"><?php echo $data["level2unans"] ?></td>
            </tr>
            <tr>
            	<td width="50%"><b>Total Score:-</b></td>
                <td width="50%"><b><?php echo $data["level2score"] ?></b></td>
            </tr>
        </table>
    </p>
    <hr/>
    <p class="lead">
    	<b>LEVEL 03</b>
        <table width="100%" style="font-size: 18px;text-align: left;width: 450px;" align="center">
        	<tr>
            	<td width="50%">Attemped:-</td>
                <td width="50%"><?php if($data["level3start"] != 0){echo $data["level3start"];}else{echo "NOT ATTEMPED";} ?></td>
            </tr>
            <tr>
            	<td width="50%"><b>Total Score:-</b></td>
                <td width="50%"><b><?php echo $data["level3score"] ?></b></td>
            </tr>
        </table>
    </p>
    <hr/>
    <p class="lead">
    	<b>LEVEL 04</b>
        <table width="100%" style="font-size: 18px;text-align: left;width: 450px;" align="center">
        	<tr>
            	<td width="50%">Contest Started:-</td>
                <td width="50%"><?php if($data["level4start"] != 0){echo $data["level4start"];}else{echo "NOT ATTEMPED";} ?></td>
            </tr>
            <tr>
            	<td width="50%">Contest Finished:-</td>
                <td width="50%"><?php if($data["level4end"] != 0){echo $data["level4end"];}else{echo "NOT FINISHED";} ?></td>
            </tr>
            <tr>
            	<td width="50%"><b>Total Score:-</b></td>
                <td width="50%"><b><?php echo $data["level4score"] ?></b></td>
            </tr>
        </table>
    </p>
   </div>
   <div class="alert alert-warning" role="alert">INVITATION STATUS: <?php if($data["invited"] == "0"){echo "PENDING";} else {echo "YOU HAVE BEEN QUALIFIED!";} ?></div>
    
</div>

<?php include( "template/portalfooter.php"); ?>