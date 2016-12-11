<?php
include "template/loginheader.php";
?>
            <h1 class="cover-heading">Team Registration</h1>

            <div id="school" class="detailbox">

                <form action="javascript:registerteam();">

                    <p>
                        <label for="inputTeam" class="sr-only">Team Name</label>
                        <input type="text" id="inputTeam" class="form-control" placeholder="Team Name" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputPassword" class="sr-only">Team Login Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Team Login Password" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputSchool" class="sr-only">School Name</label>
                        <input type="text" id="inputSchool" class="form-control" placeholder="School Name" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputSchoolAdd" class="sr-only">School Address</label>
                        <input type="text" id="inputSchoolAdd" class="form-control" placeholder="School Address" required="" autofocus/>
                    </p>

                    <button id="btnSchool" class="btn btn-lg btn-primary btn-block" type="submit" data-loading-text="<i class='icon-spinner icon-spin icon-large'></i> Processing">Continue</button>

                </form>
            </div>

            <div id="tic" class="detailbox">

                <form action="javascript:registertic();">

                    <p>
                        <label for="inputTIC" class="sr-only">Teacher/Master In-Charge</label>
                        <input type="text" id="inputTIC" class="form-control" placeholder="Teacher/Master In-Charge" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputTICemail" class="sr-only">Contact email</label>
                        <input type="email" id="inputTICemail" class="form-control" placeholder="Contact email" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputTICphone" class="sr-only">Contact number</label>
                        <input type="text" id="inputTICphone" class="form-control" placeholder="Contact number" required="" autofocus/>
                    </p>

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Continue</button>
                    <a href="#" id="backtoTeam" class="backbtn"></a>
                    
                </form>

            </div>

            <div id="members" class="detailbox">

                <form action="javascript:submitdata();">

                    <p>
                        <label for="inputTeamLead" class="">Team Leader's Name</label><br/>
                        <input type="text" id="inputTeamLead" class="form-control" placeholder="Team Leader's Name" required="" autofocus/>

                        <label for="inputTeamLeadEmail" class="sr-only">Contact email</label>
                        <input type="email" id="inputTeamLeadEmail" class="form-control" placeholder="Contact email" required="" autofocus/>

                        <label for="inputTeamLeadNo" class="sr-only">Contact number</label>
                        <input type="text" id="inputTeamLeadNo" class="form-control" placeholder="Contact number (Dialog/Hutch Prefferred)" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputMem1" class="">Member 01</label><br/>
                        <input type="text" id="inputMem1" class="form-control" placeholder="Member Name" required="" autofocus/>

                        <label for="inputMem1Email" class="sr-only">Contact email</label>
                        <input type="email" id="inputMem1Email" class="form-control" placeholder="Contact email" required="" autofocus/>

                        <label for="inputMem1No" class="sr-only">Contact number</label>
                        <input type="text" id="inputMem1No" class="form-control" placeholder="Contact number (Dialog/Hutch Prefferred)" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputMem2" class="">Member 02</label><br/>
                        <input type="text" id="inputMem2" class="form-control" placeholder="Member Name" required="" autofocus/>

                        <label for="inputMem2Email" class="sr-only">Contact email</label>
                        <input type="email" id="inputMem2Email" class="form-control" placeholder="Contact email" required="" autofocus/>

                        <label for="inputMem2No" class="sr-only">Contact number</label>
                        <input type="text" id="inputMem2No" class="form-control" placeholder="Contact number (Dialog/Hutch Prefferred)" required="" autofocus/>
                    </p>

                    <p>
                        <label for="inputMem3" class="">Member 03</label><br/>
                        <input type="text" id="inputMem3" class="form-control" placeholder="Member Name" required="" autofocus/>

                        <label for="inputMem3Email" class="sr-only">Contact email</label>
                        <input type="email" id="inputMem3Email" class="form-control" placeholder="Contact email" required="" autofocus/>

                        <label for="inputMem3No" class="sr-only">Contact number</label>
                        <input type="text" id="inputMem3No" class="form-control" placeholder="Contact number (Dialog/Hutch Prefferred)" required="" autofocus/>
                    </p>

                    <button id="btnSubmit" class="btn btn-lg btn-primary btn-block" type="submit" data-loading-text="<i class='icon-spinner icon-spin icon-large'></i> Processing">Continue</button>
                    <a href="#" id="backtoTIC" class="backbtn"></a>

                </form>

            </div>

<script>
        $(document).ready(function(e) {

            $('#school').fadeIn(400);

        });
		
		$('#backtoTeam').on('click',function(e){
			$('#tic').hide();
			$('#school').fadeIn(200);
		});
		
		$('#backtoTIC').on('click',function(e){
			$('#members').hide();
			$('#tic').fadeIn(200);
		});

		var url = "http://localhost/infportal/php/functions.php";
		var hash = "<?php
echo md5($_SERVER['REMOTE_ADDR'] . "informatique16");
?>";

		var school = "";
		var schooladdress = "";
       	var teamname = "";
       	var teampass = "";	

        function registerteam() {

			$('#btnSchool').button('loading');
			
            school = $('#inputSchool').val();
			schooladdress = $('#inputSchoolAdd').val();
            teamname = $('#inputTeam').val();
            teampass = $('#inputPassword').val();
			var request = "checkteamname";
			
			if(teampass.length < 8){
				
				alert("Your password needs to be contain atleast 8 characteras!");
				$('#btnSchool').button('reset');
				
			} else {
				
				//check team name
				$.ajax({ url:url, data:{hash:hash,request:request,teamname:teamname}, success:function(data){
					
					$('#btnSchool').button('reset');
					
					if(data == "1"){
						$('#school').hide();
						$('#tic').fadeIn(200);
					} else {
						alert(data);
					}
					
				} });
				
			}

        }
		
		var teacher = "";
		var ticemail = "";
		var ticphone = "";

        function registertic() {

			teacher = $('#inputTIC').val();
			ticemail = $('#inputTICemail').val();
			ticphone = $('#inputTICphone').val();
			
			$('#tic').hide();
			$('#members').fadeIn(200);

        }

        function submitdata() {

			$('#btnSubmit').button('loading');

			var teamlead = $('#inputTeamLead').val();
			var teamleademail = $('#inputTeamLeadEmail').val();
			var teamleadno = $('#inputTeamLeadNo').val();
			
			var mem1 = $('#inputMem1').val();
			var mem1email = $('#inputMem1Email').val();
			var mem1phone = $('#inputMem1No').val();
			
			var mem2 = $('#inputMem2').val();
			var mem2email = $('#inputMem2Email').val();
			var mem2phone = $('#inputMem2No').val();
			
			var mem3 = $('#inputMem3').val();
			var mem3email = $('#inputMem3Email').val();
			var mem3phone = $('#inputMem3No').val();
			
			var request = "register";
			
			//proceeding for registration
			$.ajax({ url:url, data:{hash:hash,request:request,school:school,schooladdress:schooladdress,teamname:teamname,teampass:teampass,teacher:teacher,ticemail:ticemail,ticphone:ticphone,teamlead:teamlead,teamleademail:teamleademail,teamleadno:teamleadno,mem1:mem1,mem1email:mem1email,mem1phone:mem1phone,mem2:mem2,mem2email:mem2email,mem2phone:mem2phone,mem3:mem3,mem3email:mem3email,mem3phone:mem3phone}, success:function(data){
				
				$('#btnSubmit').button('reset');
				
				if(data == "success"){
					alert("You have successfully signed up for INFORMATIQUE '16 ICT Convention. Please login to continue.");
					window.location = "index.php";
				} else {
					alert(data);
				}
				
			} });
        }
    </script>
	
<?php
include "template/loginfooter.php";
?>