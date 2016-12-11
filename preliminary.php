<?php include( "template/portalheader.php"); ?>

<div class="inner cover">
    <h1 class="cover-heading">Inf '16 - Online Challenge</h1>
    
    <div style="display: none">
        <div id="inline">
        <b>Technical Conditions</b><br/>
        Make sure you have a stable internet condition while proceeding the competition rounds.<br/>
        Ensure that JavaScript is enabled in your browser.<br/>
        <br/><br/>
        <b>LEVEL 01: (ICT KNOWLEDGE TEST)</b><br/>
        You will be given 20 minutes to complete 25 questions.<br/>
        All the questions are in multiple choice format (MCQ).<br/>
        You can access the page only once, therefore make sure you have a stable network connection.<br/>
        Changing source codes of the webpage is strictly prohibited.<br/>
        Each correct answer will be awarded +10 points.<br/>
        5 points will be deducted for each wrong answer.<br/>
        Points will not be awarded for unanswered questions.<br/>
        Time bonus points will be awarded.<br/>
        <br/><br/>
        <b>LEVEL 02: (REAL WORLD PROBLEM AND SOLUTION)</b><br/>
        You will be given 08 minutes to complete this round.<br/>
        There are 05 MCQ based questions based on a passage which is given.<br/>
        Each correct answer will be awarded +10 points.<br/>
        5 points will be deducted for each wrong answer.<br/>
        Points will not be awarded for unanswered questions.
        Time bonus points will be awarded.<br/>
        <br/><br/>
        <b>LEVEL 03: (CODING ROUND)</b><br/>
        You will be given a problem statement that you have to provide the solution for by coding the answer.<br/>
        Input and Output formats are clearly described in the description.<br/>
        The following programming languages are allowed to use for coding. C, C++, Java, Python, Perl, PHP, Ruby, C#, Bash, Javascript, Pascal, VB, Java8, Swift, Objective C<br/>
        You have to complete the coding level within 20 minutes.<br/>
        You can submit the solution only once.
        <br/><br/>
        <b>LEVEL 04: (PUZZLE SOLVING)</b><br/>
		You will be given a mysterious puzzle to solve.<br/>
        Time limitations will NOT be applied in this round.<br/>
        Hints will be given in some stages<br/>
        Each stage of this round carries 100 points.<br/>
        Maximun 300 points can be scored in this level.<br/>
        <br/><br/>
        Good Luck! Hope to see you all at Informatique '16<br/> 
        <b>For technical issues and competition clarifications please contact: 0772540020 (Suresh Peiris)</b>     
        </div>
    </div>
    
    <p class="lead">
    	<b>PRELIMINARY SELECTION ROUND</b><br/>
        <p>Dear participants, you should complete the given challenges in order to qualify for Informatique '16 convention which is going to be held on the 14th of October 2016 at Havelock City Clubhouse.</p>
        <a style="background:#E7C900;border:#E7C900;color:#000;" href="#inline" class="btn btn-primary various">RULES AND REGULATIONS</a> <a style="background:#E7C900;border:#E7C900;color:#000;" href="results.php" class="btn btn-primary">MY RESULTS</a>
    </p>
    
    <?php
	include("connection.php");
	$query = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION["login"][ "teamname"]."'");
	$rows = mysqli_num_rows($query);
	if($rows == 1){
		$data = mysqli_fetch_array($query);
		$level1 = $data["level1start"];
		$level2 = $data["level2start"];
		$level3 = $data["level3end"];
		$level4 = $data["level4end"];
		
		?>
        
        <a href="level1.php" style="width:200px;margin-bottom:5px;" class="btn btn-primary">Level 01<?php if($level1!=0){echo " - DONE";} else {echo " - NOT DONE";} ?></a>
        <a href="level2.php" style="width:200px;margin-bottom:5px;" class="btn btn-primary">Level 02<?php if($level2!=0){echo " - DONE";} else {echo " - NOT DONE";} ?></a><br/>
        <a href="level3.php" style="width:200px;margin-bottom:5px;" class="btn btn-primary">Level 03<?php if($level3!=0){echo " - DONE";} else {echo " - NOT DONE";} ?></a>
        <a href="level4.php" style="width:200px;margin-bottom:5px;" class="btn btn-primary">Level 04<?php if($level4!=0){echo " - DONE";} else {echo " - NOT DONE";} ?></a>
        
        <?php
	}
	?>
    
</div>

<script>
$(document).ready(function(e) {
		$(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
});
</script>

<?php include( "template/portalfooter.php"); ?>