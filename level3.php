<?php include( "template/portalheader.php"); ?>
<div class="cover" style="margin-top: 89px;">
<?php
include("connection.php");

$questionscount = 5;

if(isset($_POST["finishquiz"])){ 
   $timebonus = (int)$_POST["timer"];
}

$query = mysqli_query($conn,"SELECT* FROM contestdata WHERE teamname='".$_SESSION[ "login"][ "teamname"]."'");
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if($rows == 1){
	if($data["level3end"] != "0"){
		echo "<h1>You have completed this level!</h1><br/><a href='results.php'>Click to view results</a>";
	} else {
		mysqli_query($conn,"UPDATE contestdata SET level3start=NOW() WHERE teamname='".$_SESSION["login"]["teamname"]."'");
?>
	
    <div style="display: none">
        <div id="inline">
        	Malith is a software engineer who works in a company in Sri Lanka. He got to know the news that the ATM machines are being hacked by third parties. So he decided to make his own end to end protection algorithm in order to secure the ATMs in Sri Lanka.<br/>
He has an idea to build an algorithm that ensures end to end security between the ATM machine and client server. 
The procedure of the algorithm as follows.<br/>
<i>Character Format: 0=A, 1=B, 2=C, 3=D, 4=E,……….,9=J</i><br/><br/>
<b>INPUT FORMAT</b><br/>
A single line of <b>integer</b>(4 Characters) between, 0000 <= x <= 9999<br/><br/>
<b>OUTPUT FORMAT</b><br/>
A single line of <b>string</b><br/><br/>
<b>SAMPLE INPUT</b><br/>
1234<br/>
8563<br/>
4866<br/><br/>
<b>SAMPLE OUTPUT</b><br/>
EDCB<br/>
DGFI<br/>
GGIE<br/><br/>
<b>INPUT EXPLAINATION:</b> <br/>Input is: 	1234	=>	BCDE	=>	EDCB
<br/><br/>
Write a program that converts pin numbers into the above encryption scheme.
	</div>
    </div>
    
	<h2><b>Solve the given algorithm</b></h2>
    
    Time Remaining <span id="timer">00:00</span>
    <input type="hidden" name="timer" value="" id="hiddentimer"/>
    <p>
    Select your favorite programming language:
    <select name="language" autofocus required class="form-control" id="language" title="Select Programming Language">
      <option value="1">C</option>
      <option value="2">C++</option>
      <option value="3" selected>JAVA</option>
      <option value="5">PYTHON</option>
      <option value="6">PERL</option>
      <option value="7">PHP</option>
      <option value="8">RUBY</option>
      <option value="9">C#</option>
      <option value="14">BASH</option>
      <option value="20">JAVASCRIPT</option>
      <option value="25">PASCAL</option>
      <option value="30">PYTHON 3</option>
      <option value="37">VB</option>
      <option value="43">JAVA 8</option>
      <option value="51">SWIFT</option>
      <option value="32">OBJECTIVE C</option>
    </select>
    </p>
    <div id="editor" style="width:100%;height:100px;">import java.io.*;
import java.util.*;
import java.text.*;
import java.math.*;
import java.util.regex.*;

public class main {
    public static void main(String[] args){
        Scanner scn = new Scanner(System.in);
        
    }
}</div>
    <div id="codeoutput" style="overflow:scroll;height:100px;background:#272822;"></div>
    <br/>
    <p><a href="#inline" style="background-color: #ffb000;color: #000;font-weight: bold;border: #ffb000;" class="btn btn-primary various">Problem Statement</a> <input type="button" value="Submit Solution" name="submitsol" id="submitsol" class="btn btn-primary" onClick="confirmsubmitalgo();" data-confirm="Are you sure to delete this item?"/> <input type="button" value="Run Program" name="runsol" id="runsol" class="btn btn-primary" onClick="runalgo();"/></p>



<script src="ace/src/ace.js" type="text/javascript" charset="utf-8"></script>

<script>
	var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/java");
	
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
	
	var duration = 1200;
	var ct = null;
	
	var dt = new Date();
    var time_stamp = dt.getTime()/1000; 
	var end_time = Math.round(time_stamp)+duration;
	
    function StartTimer() {
        ct = setInterval("calculate_time()",100);
        setTimeOut("submitForm()",duration);
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
                submitalgo();
            }
        }
    }
	
	var url = "php/algosolve.php";
	var hash = "<?php
echo md5($_SERVER['REMOTE_ADDR'] . "informatique16");
?>";
	function confirmsubmitalgo() {
		if (confirm("Are you sure you want to submit?")) {
			submitalgo();
		} else {
			false;
		}       
	}
	function submitalgo(){
		var code = editor.getValue();
		var lang = $('#language').val();
		var time = $('#hiddentimer').val();
		
		$('#codeoutput').html("Submitting...");
		
		$.ajax(url,{data:{request:"submit",hash:hash,code:code,lang:lang,time:time},success: function(data){
			if(data == "success"){
				window.location = "preliminary.php";
			} else {
				$('#codeoutput').html(data);
			}
		}});
	}
	function runalgo(){
		var code = editor.getValue();
		var lang = $('#language').val();
		var time = $('#hiddentimer').val();
		
		$('#codeoutput').html("Compiling...");
		
		$.ajax(url,{data:{request:"run",hash:hash,code:code,lang:lang,time:time},success: function(data){
			$('#codeoutput').html(data);
		}});
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