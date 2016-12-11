<?php
   include "template/loginheader.php";
   include "connection.php";
   
   if (isset($_POST["submit"])) {
       $teamname = $_POST["teamname"];
       $password = $_POST["password"];
       
       if (!empty($teamname) && !empty($password)) {
           
           //secure values
           $teamname = htmlentities(strtolower($teamname), ENT_QUOTES);
           $password = md5($password);
           
           $query = mysqli_query($conn, "SELECT * FROM teams WHERE teamname='$teamname' AND teampassword='$password'");
           $data  = mysqli_fetch_array($query);
           $rows  = mysqli_num_rows($query);
           
           if ($rows > 0) {
               
               $error = "Login successful!";
               
               $_SESSION["login"] = array(
                   "teamid" => $data["id"],
                   "teamname" => $data["teamname"],
                   "teamemail" => $data["contactmail"]
               );
               
               header("Location: home.php");
               exit();
               
           } else {
               $error = "Incorrect Username / Password!";
           }
           
       } else {
           $error = "Team Name / Password cannot be empty!";
       }
   }
   
   ?>
<form action="#" method="post">
   <h1 class="cover-heading">Portal Login</h1>
   <div id="loginform" class="detailbox">
      <p>
         <label for="teamname" class="sr-only">Team Name</label>
         <input type="text" name="teamname" class="form-control" placeholder="Team Name" required="" autofocus/>
      </p>
      <p>
         <label for="password" class="sr-only">Password</label>
         <input type="password" name="password" class="form-control" placeholder="Password" required="" autofocus/>
      </p>
      <?php if (!empty($error)) {?>
      <div class="alert alert-danger" role="alert">
         <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
         <span class="sr-only">Error:</span>
         <?php echo $error;?>
      </div>
      <?php }?>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
   </div>
</form>
<script>
   $('#loginform').fadeIn(400);
</script>
<?php include "template/loginfooter.php";?>