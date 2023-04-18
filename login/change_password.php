 <html lang="en"> 
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="Music Streaming Service"/>
      <meta name="author" content="Anika Islam"/>
      <title> Change Password </title>
    
      <!-- core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css?12345" rel="stylesheet"/> 
  </head>

  <body> 
    <!-- following section is used for creating the menubar in the webpage -->
	<section id="header">
		<div class ="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> PLAY BEATS </div>
		</div>
	</section>
	
	<section id = "section1">
		<div class="title"> CHANGE PASSWORD </div>
		
		<form action=" " class="form_design" method="post">
			Username: <input type="text" name="fname"> <br/>
			Current Password: <input type="password" name="current_pass"> <br/>
			New Password: <input type="password" name="new_pass"> <br/>
			<input type="submit" name="change" value="CHANGE"> <br/> 
		</form>
	</section>


<?php 

@include 'DBconnect.php';
session_start();

if(isset($_POST['change'])){
	$name = mysqli_real_escape_string($conn,$_POST['fname']);
	$old_pass = md5($_POST['current_pass']);
	$new_pass = md5($_POST['new_pass']);
	
	$select = "SELECT * from login WHERE username = '$name' && password = '$old_pass'";
	$result = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($result);
	
	if(mysqli_num_rows($result) > 0){
		if($_POST['new_pass'] != ''){
			if($row['username'] == $name AND $row['password'] == $old_pass AND $new_pass != $old_pass){
				$update = "UPDATE login SET password = '$new_pass' WHERE username = '$name'";
				$_SESSION['user_password'] = $row['password'];
				mysqli_query($conn,$update);
				echo "Password Changed";
				header('location:login.php');
				
			}
			elseif($row['username'] == $name AND $row['password'] == $old_pass AND $new_pass == $old_pass){
				echo "Current password is used again!";
					
			}
		}
		else{
			echo "No new password given";
		}
	}
	else{
		echo "Invalid Password or Username";
	}
		
		
};
  
?>	
	<!----- Footer ----->
	<section id ="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>