<?php include( "template/portalheader.php"); ?>
<div class="cover" style="margin-top: 89px;">
<?php
include("connection.php");

$questionscount = 5;

if(isset($_POST["finishquiz"])){ 
   
   $correct = 0;
   $wrong = 0;
   $notdone = 0;
   
   $timebonus = (int)$_POST["timer"];
   
   	for($i=1;$i<=$questionscount;$i++){
		//evaluate question by question
		$qno = (int)$_POST["qno_".$i];
		$answer = (int)$_POST["rad_".$i];
		
		$query = mysqli_query($conn,"SELECT correct FROM questions WHERE id='$qno'");
		$data = mysqli_fetch_array($query);
		
		$dbanswer = $data["correct"];
		
		if($dbanswer == $answer){
			$correct++;
		} else if($answer == "5"){
			$notdone++;
		} else {
			$wrong++;	
		}
	}
	
	$totalscore = 0;
	$totalscore += $correct * 10;
	$totalscore += round($timebonus/(($wrong+$notdone)+1));
	$totalscore -= $wrong * 5;
   
  	mysqli_query($conn,"UPDATE `contestdata` SET `level2right` = '$correct', `level2wrong` = '$wrong', `level2unans` = '$notdone', `level2end` = NOW(), `level2score` = '$totalscore' WHERE `teamname` = '".$_SESSION["login"]["teamname"]."'");
	header("Location: preliminary.php");
	
}
////////////// END OF THE SUBMISSION PART //////////////

////////////////////////////////
$query = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION[ "login"][ "teamname"]."'");
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if($rows == 1){
	if($data["level2start"] != "0"){
		echo "<h1>You have completed this level!</h1><br/><a href='results.php'>Click to view results</a>";
	} else {
		mysqli_query($conn,"UPDATE contestdata SET level2start=NOW() WHERE teamname='".$_SESSION[ "login"][ "teamname"]."'");
?>

<div class="quizdiv">
<form action="" method="post" id="quizform">
	
    <div class="col-md-8">Current Question: <span id="currentqs">00</span>/<?php echo $questionscount ?></div>
    <div class="col-md-4">Time Remaining <span id="timer">00:00</span></div>
    <input type="hidden" name="timer" value="" id="hiddentimer"/>
    
    <div style="margin-top:5px;margin-bottom:5px;"><b><a class="various btn btn-primary" href="#inline" style="background-color: #ffb000;color: #000;font-weight: bold;border: #ffb000;">PROBLEM DEFINITION</a></b></div>
    
    <div style="display: none">
        <div id="inline"><p>Man fraudulently withdraws money from ATM card

Police seek public assistance to trace a suspect who withdrew money using ATM cards belonging to others.<br/><br/>

The suspect had deceived several people in Borella and Mirihana by opting to help them to withdraw money from ATMs.<br/><br/>

Teams of Borella and Mirihana Police commenced investigations following complaints regarding the suspect.<br/><br/>

CCTV footage obtained from cameras installed at ATMs showed how the suspect withdrew money from others’ teller cards.<br/><br/>

The suspect who used to wait near the machines, would offer to help persons finding it difficult to operate the ATM. Since the latest ATM cards need not be kept inserted until the transactions are over, the suspect does not end the transaction. Once the owner of the card left, the suspect withdrew money.
(extracted from www.dailynews.lk)</p></div>
    </div>
    
	<div class="col-md-12">
   		
    	<?php
		$res = mysqli_query($conn,"SELECT * FROM questions where level='2' ORDER BY id LIMIT $questionscount");
        $qrows = mysqli_num_rows($res);
		$i=1;
        while($result=mysqli_fetch_array($res)){
			if($i == 1){
		?>
        	<div class="question" id="q_<?php echo $i; ?>" style="overflow:scroll;height: 299px;">
              <p class="lead"><b><?php echo $result["question"]; ?></b></p> 
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="1" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans1"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="2" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans2"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="3" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans3"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="4" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans4"]; ?></label>
              <br>
              <input type="radio" style="display:none;" checked="checked" name="rad_<?php echo $i; ?>" value="5" id="ans_<?php echo $i; ?>"/>
              <input type="hidden" name="qno_<?php echo $i; ?>" value="<?php echo $result["id"]; ?>"/>
              
             	<div style="text-align:right;">
                	<input id="pre<?php echo $i;?>" type="button" value="Previous" class="btn btn-primary" disabled/>
                    <input id="next<?php echo $i;?>" type="button" value="Next" class="btn btn-primary next"/>
                </div>
             </div>
        <?php
			} else if($i<1 || $i<$qrows){
		?>
        	<div class="question" id="q_<?php echo $i; ?>" style="overflow:scroll;height: 299px;">
              <p class="lead"><b><?php echo $result["question"]; ?></b></p> 
              
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="1" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans1"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="2" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans2"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="3" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans3"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="4" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans4"]; ?></label>
              <br>
              <input type="radio" style="display:none;" checked="checked" name="rad_<?php echo $i; ?>" value="5" id="ans_<?php echo $i; ?>"/>
              <input type="hidden" name="qno_<?php echo $i; ?>" value="<?php echo $result["id"]; ?>"/>
              
             	  <div style="text-align:right;">
                    <input id="pre<?php echo $i;?>" type="button" value="Previous" class="btn btn-primary prev"/> 
                    <input id="next<?php echo $i;?>" type="button" value="Next" class="btn btn-primary next"/> 
                 </div>
             </div>
        <?php
			} else if($i == $qrows){
		?>
        	<div class="question" id="q_<?php echo $i; ?>" style="overflow:scroll;height: 299px;">
              <p class="lead"><b><?php echo $result["question"]; ?></b></p> 
              
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="1" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans1"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="2" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans2"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="3" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans3"]; ?></label>
              <br>
              <label>
                <input type="radio" name="rad_<?php echo $i; ?>" value="4" id="ans_<?php echo $i; ?>">
                <?php echo $result["ans4"]; ?></label>
              <br>
              <input type="radio" style="display:none;" checked="checked" name="rad_<?php echo $i; ?>" value="5" id="ans_<?php echo $i; ?>"/>
              <input type="hidden" name="qno_<?php echo $i; ?>" value="<?php echo $result["id"]; ?>"/>
              
              	 <div style="text-align:right;">
                    <input id="pre<?php echo $i;?>" type="button" value="Previous" class="btn btn-primary prev"/>
                    <input id="finishquiz" name="finishquiz" type="submit" value="Finish Exam" class="btn btn-primary"/>
                 </div>
             </div>
        <?php
			}
			$i++;
		}
	 	?>
        
        
        
      </div>  
     <div class="clearfix"></div>
</form>
</div>

<script>
var currentqs = 1;
$('#q_1').fadeIn(200);
document.getElementById('currentqs').innerHTML=currentqs;

$(document).on('click','.next',function(){
	element=$(this).attr('id');
	last = parseInt(element.substr(element.length - 1));
	nex=last+1;
	$('#q_'+last).hide();
	$('#q_'+nex).fadeIn(200);
	currentqs++;
	document.getElementById('currentqs').innerHTML=currentqs;
});

$(document).on('click','.prev',function(){
    element=$(this).attr('id');
    last = parseInt(element.substr(element.length - 1));
    pre=last-1;
    $('#q_'+last).hide();
	$('#q_'+pre).fadeIn(200);
	currentqs--;
	document.getElementById('currentqs').innerHTML=currentqs;
});
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
    StartTimer();
});
	
	var duration = 300;
	var ct = null;
	
	var dt = new Date();
    var time_stamp = dt.getTime()/1000; 
	var end_time = Math.round(time_stamp)+duration;
	
    function StartTimer() {
        ct = setInterval("calculate_time()",100);
        setTimeOut("submitForm()",duration);
    }
    function submitForm() {
       $('#finishquiz').click();
    }
    function calculate_time() {
		dt = new Date();
   		time_stamp = dt.getTime()/1000; 
       	var total_time = end_time - Math.round(time_stamp);
		
		$('#hiddentimer').val(total_time);
		
        var mins = Math.floor(total_time / 60); 
        var secs = total_time - (mins * 60); 
        if(secs < 10){secs = "0" + secs;} 
        document.getElementById("timer").innerHTML = mins + ":" + secs; 
        if(mins <= 0) {
            if(secs <= 0 || mins < 0) {
				alert("TIME UP!");
                clearInterval(ct);
                document.getElementById("timer").innerHTML = "0:00";
                submitForm();
            }
        }
    }
</script>

<?php	
		
	}
} else {
	header("Location: index.php");	
}
?>

</div>
<?php include( "template/portalfooter.php"); ?>