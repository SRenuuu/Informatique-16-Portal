<?php session_start(); if(empty($_SESSION[ "login"][ "teamname"]) || empty($_SESSION[ "login"][ "teamemail"])){ header( "Location: ../index.php"); exit(); } 

$hash = $_GET["hash"];

include("../connection.php");

//Generate my own hash
$hashgen = md5($_SERVER['REMOTE_ADDR']."informatique16");

if($hashgen != $hash){
	echo "Security Token Error! Please reload the page and try again.";
	exit();
}

$request = $_GET["request"];
$language = $_GET["lang"];
$code = $_GET["code"];
$time = $_GET["time"];

if($request == "run"){
		
	$inputarray = array("1234","8563","4866");
	$correctarray = array("EDCB","DGFI","GGIE");
	
	$testcases = json_encode($inputarray);
	
	$data = executeprogram($code,$language,$testcases);
	
	$cmessage = $data->compilemessage;
	$status = $data->message;
	$stdout =  $data->stdout;
	
	if($status[0] == "Success"){
		for($i=0;$i<3;$i++){
			
			$correctness = "<font color=\"#43D300\">Correct</font>";
			if(strpos($stdout[$i], $correctarray[$i]) === false){
				$correctness = "<font color=\"#ff0000\">Wrong Answer</font>";
			}
			
			echo "Testcase #".$i.": ".$inputarray[$i]."<br/>Expected Output: ".$correctarray[$i]."<br/>Your output: ".$stdout[$i]." (".$correctness.")<br/><br/>";
		}
	} else {
		echo $cmessage;	
	}

} else if($request == "submit"){
	
	$inputarray = array("1532","1111","9862","4638","7710","2386","7835","5927","3672","8634");
	$correctarray = array("CDFB","BBBB","CGIJ","IDGE","ABHH","GIDC","FDIH","HCJF","CHGD","EDGI");
	
	$testcases = json_encode($inputarray);
	
	$data = executeprogram($code,$language,$testcases);
	
	$status = $data->message;
	$stdout =  $data->stdout;
	$score = 0;
	$wrong = 0;
	
	if($status[0] == "Success"){
		for($i=0;$i<10;$i++){
			
			if(strpos($stdout[$i], $correctarray[$i]) === false){
				$wrong++;
			} else {
				$score += 10;
			}
			
		}
		
		$score += round( ($time/($wrong+1))/10 );
		
		mysqli_query($conn,"UPDATE contestdata SET level3end=NOW(), level3score='$score' WHERE teamname='".$_SESSION["login"]["teamname"]."'");
		echo "success";
		
	} else {
		mysqli_query($conn,"UPDATE contestdata SET level3end=NOW(), level3score='0' WHERE teamname='".$_SESSION["login"]["teamname"]."'");
	}
	
} else {
	echo "Invalid request!";	
}

function executeprogram($source,$lang,$testcases){
	require "../urirest/Unirest.php";
	
	Unirest\Request::verifyPeer(false);
	
	$response = Unirest\Request::post("http://api.hackerrank.com/checker/submission.json",
	  array(),
	  array(
	  	"api_key"	=>	"", //api key
		"source" 	=> 	$source, 
		"lang" 		=> 	$lang,
		"testcases"	=>	$testcases,
		"wait"		=> 	"false",
		"format"	=>	"json"
	  )
	);        
	
	$responsearray = $response->body->result;
	return $responsearray;
}

?>