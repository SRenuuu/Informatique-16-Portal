<?php
error_reporting(0);
$request = $_GET["request"];
$hash = $_GET["hash"];

$conn = mysqli_connect("localhost","root","","infportal");

//Generate my own hash
$hashgen = md5($_SERVER['REMOTE_ADDR']."informatique16");

if($hashgen != $hash){
	echo "Security Token Error! Please reload the page and try again.";
	exit();
}

if($request == "checkteamname"){
	
	$teamname = $_GET["teamname"];
	echo(checkTeamName($teamname));
	
} else if($request == "register"){
	
	//process input values and encoding for security reasons
	$teamname = htmlentities(strtolower($_GET["teamname"]),ENT_QUOTES);
	$teampass = $_GET["teampass"]; 
	$school = 	htmlentities($_GET["school"],ENT_QUOTES);
	$schooladdress = htmlentities($_GET["schooladdress"],ENT_QUOTES);
	
	$teacher = mysqli_real_escape_string($conn,($_GET["teacher"]));
	$ticemail = $_GET["ticemail"];
	$ticphone = $_GET["ticphone"];
	
	//Team member details
	$teamlead = mysqli_real_escape_string($conn,$_GET["teamlead"]);
	$teamleademail = $_GET["teamleademail"];
	$teamleadno = $_GET["teamleadno"];
	
	$mem1 = mysqli_real_escape_string($conn,$_GET["mem1"]);
	$mem1email = $_GET["mem1email"];
	$mem1phone = $_GET["mem1phone"];
	
	$mem2 = mysqli_real_escape_string($conn,$_GET["mem2"]);
	$mem2email = $_GET["mem2email"];
	$mem2phone = $_GET["mem2phone"];
	
	$mem3 = mysqli_real_escape_string($conn,$_GET["mem3"]);
	$mem3email = $_GET["mem3email"];
	$mem3phone = $_GET["mem3phone"];
	
	//Get the user's IP address, forwadded proxy (if available) and client PC name
	$ip = $_SERVER['REMOTE_ADDR'];
	$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
	$compname = php_uname();
	
	//validate up details
	if(!empty($teamname) && !empty($teampass) && !empty($school) && !empty($schooladdress)){
		
		//Check team name is already taken
		if(checkTeamName($teamname) == "1"){
			
			if(strlen($teampass) >= 8){
			
				if(!empty($teacher) && !empty($ticemail) && !empty($ticphone)){
				
					//validate teacher email
					if(isEmailValid($ticemail) == "valid"){
						
						if(isPhoneValid($ticphone) == "valid"){
							
							//validate all the member details
							if(!empty($teamlead) && !empty($teamleademail) && !empty($teamleadno) && !empty($mem1) && !empty($mem1email) && !empty($mem1phone) && !empty($mem2) && !empty($mem2email) && !empty($mem2phone) && !empty($mem3) && !empty($mem3email) && !empty($mem3phone)){
								//validate their emails
								if(isEmailValid($teamleademail) == "valid" && isEmailValid($mem1email) == "valid" && isEmailValid($mem2email) == "valid" && isEmailValid($mem3email) == "valid"){
									
									//validate their phone numbers
									if(isPhoneValid($teamleadno) == "valid" && isPhoneValid($mem1phone) == "valid" && isPhoneValid($mem2phone) == "valid" && isPhoneValid($mem3phone) == "valid"){
										
										//everything is safe
										//adding data to the database
										$teampass = md5($teampass);
										
										//User unique key
										$key = md5($teamname.time()."informatique16");
										
										mysqli_query($conn,"INSERT INTO `teams` (`id`, `teamname`, `teampassword`, `schoolname`, `schooladdress`, `tic`, `contactno`, `contactmail`, `mem1`, `mem1email`, `mem1contact`, `mem2`, `mem2email`, `mem2contact`, `mem3`, `mem3email`, `mem3contact`, `mem4`, `mem4email`, `mem4contact`, `key`, `invited`, `ipaddress`, `proxyaddress`, `computername`, `timestamp`) VALUES (NULL, '$teamname', '$teampass', '$school', '$schooladdress', '$teacher', '$ticphone', '$ticemail', '$teamlead', '$teamleademail', '$teamleadno', '$mem1', '$mem1email', '$mem1phone', '$mem2', '$mem2email', '$mem2phone', '$mem3', '$mem3email', '$mem3phone', '$key', '0', '$ip', '$proxy', '$compname', NOW());");
										
										mysqli_query($conn,"INSERT INTO `contestdata` (`id`, `teamname`, `level1start`, `level1end`, `level1score`, `level1right`, `level1wrong`, `level1unans`, `level2start`, `level2end`, `level2score`, `level2right`, `level2wrong`, `level2unans`, `level3start`, `level3end`, `level3score`, `level4start`, `level4end`, `level4score`, `ip`) VALUES (NULL, '$teamname', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '".$_SERVER['REMOTE_ADDR']."');");
										
										echo "success";
										exit();
											
									} else {
										echo "One or more invalid phone numbers contains in the members section!";
										exit();	
									}
									
								} else {
									echo "One or more invalid email addresses contains in the members section!";
									exit();
								}
								
								
							} else {
								echo "You must fill all the fields in the members section!";
								exit();	
							}
							
						} else {
							echo "You must enter a valid phone number of the teacher!";
							exit();
						}
						
					} else {
						echo "Teacher's email is invalid!";	
					}
					
				} else {
					echo "Teacher Name / Email / Contact No. Cannot be empty!";
					exit();	
				}
				
			} else {
				echo "Strong password MUST contain at least 8 characters!";
				exit();	
			}
			
		} else {
			echo "The team name you requested is not available. Please try a different one!";
			exit();	
		}
		
	} else {
		echo "Team Name / Team Password / School / Address fields cannot be empty!";
		exit();	
	}
	
} else {
	echo "Wrong data!";	
}

function isPhoneValid($phone){
	if(strlen($phone) != 10 || !is_numeric($phone)){
		return "invalid";
	} else {
		return "valid";							
	}
}

function isEmailValid($email){
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		return "valid";
	} else {
		return "invalid";	
	}
}

function checkTeamName($teamname){
	$conn = mysqli_connect("localhost","root","","infportal");
	$teamname = strtolower(mysqli_real_escape_string($conn,$teamname));
	$query = mysqli_query($conn,"SELECT* FROM teams WHERE teamname='$teamname';");
	$rows = mysqli_num_rows($query);
	
	if($rows == 0){
		return 1;
	} else {
		return "Your chosen team name is not available!";
	}
}

?>