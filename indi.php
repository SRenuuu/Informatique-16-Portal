<?php include( "template/portalheader.php"); include("connection.php"); ?>

<?php

$errors = "";

if(isset($_POST["upload"])){
	$category = $_POST["category"];
	$allowedcats = array("web","software","graphic");
	
	$studentname = $_POST["studentname"];
	
	$size = $_FILES["project"]["size"];
	$file = $_FILES["project"]["tmp_name"];
	$type = end((explode(".", $_FILES["project"]["name"])));
	
	$target_dir = "files/".$category."/";
	$target_file = $target_dir.$studentname." - ".$_SESSION["login"]["teamname"]." - ".rand(100,1000).".".$type;
	
	//Check if any field is missing
	if(!empty($file) && !empty($category) && !empty($studentname)){
		 if(in_array($category,$allowedcats)){
			 if ($size < 104857600) {
				if($type == "zip" || $type == "rar"){
					if (move_uploaded_file($_FILES["project"]["tmp_name"], $target_file)) {
						
						//encrypt the input values
						$studentname = mysqli_real_escape_string($conn,$studentname);
						$category = mysqli_real_escape_string($conn,$category);
						$file = mysqli_real_escape_string($conn,$target_file);
						$teamid = (int)$_SESSION["login"]["teamid"];
						
						mysqli_query($conn,"INSERT INTO `individual` (`id`, `teamid`, `filename`, `student`, `category`, `time`) VALUES (NULL, '$teamid', '$file', '$studentname', '$category', now());");
						$errors = "The file ".basename( $_FILES["project"]["name"])." has been successfully submitted!";
						
					} else {
						$errors = "Sorry, there was an error uploading your file.";
					}
				} else {
					$errors = "Invalid file format! ALLOWED: zip,rar";	
				}
			} else {
				$errors = "Sorry, your file cannot exceed the size 100mb.";
			}
		 } else {
			$errors = "The category you selected is invalid!"; 
		 }
	} else {
		$errors = "You must give inputs to all three fields!";	
	}
}
?>

<div class="inner cover">
  <h1 class="cover-heading">Individual Project Submission</h1>

		<?php
		$query = mysqli_query($conn,"SELECT * FROM teams WHERE id='".(int)$_SESSION["login"]["teamid"]."'");
		
		$data = mysqli_fetch_array($query);
			$member1 = $data["mem1"];
			$member2 = $data["mem2"];
			$member3 = $data["mem3"];
			$member4 = $data["mem4"];
		?>

  <form action="#" method="post" enctype="multipart/form-data">
      <p class="lead">Project submission has to be archived in either ZIP or RAR format. Other formats will be rejected.</p>
      	<p>
        <select class="form-control" name="category" autofocus required id="category" title="Project Category">
          <option value="web">Web Designing</option>
          <option value="software">Software Development</option>
          <option value="graphic">Graphic Designing</option>
        </select>
    	</p>
        
        <p>
        <select class="form-control" name="studentname" autofocus required id="studentname" title="Student Name">
          <option value="<?php echo $member1 ?>"><?php echo $member1 ?></option>
          <option value="<?php echo $member2 ?>"><?php echo $member2 ?></option>
          <option value="<?php echo $member3 ?>"><?php echo $member3 ?></option>
          <option value="<?php echo $member4 ?>"><?php echo $member4 ?></option>
        </select>
    	</p>
        
        <p><input name="project" type="file" required="required" class="form-control"/></p>
        <p><input class="btn btn-primary" name="upload" type="submit" value="Submit Project"/></p>
    <p><?php echo $errors; ?></p>
  </form>
    
</div>

<?php include( "template/portalfooter.php"); ?>