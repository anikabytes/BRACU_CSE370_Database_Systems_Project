
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="Music Streaming Service"/>
      <meta name="author" content="Anika Islam"/>
      <title> Login </title>
    
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
		<div class="title"> LOG IN </div>
		
		<form action=" " class="form_design" method="post">
			Username: <input type="text" name="fname"> <br/>
			Password: <input type="password" name="pass"> <br/>
			<input type="submit" name="login" value="LOG IN"> <br/> 
			
			<p> Don't have an account? <a href="signup.php" > Sign Up Now </a></p>
			<p> <a href="change_password.php" > Change Password? </a></p>
		</form>
	</section>

	
	<!----- Footer ----->
	<section id ="footer"> 
	<div class="row">  
			<div class="" style="font-size: 15px;color:#F2674A;"> Page Creators: Anika Islam & Nusrat Jahan Nuha </div>
			</div>
		</div>
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>

<?php

@include 'DBconnect.php';
//@include 'session.php';

session_start();



if(isset($_POST['login'])){

   $name = mysqli_real_escape_string($conn, $_POST['fname']);
   $pass = md5($_POST['pass']);
   
   $_SESSION['user_name'] = "";
   $_SESSION['user_password'] = "";
   $_SESSION['admin_name'] = "";
   $_SESSION['admin_password'] = "";
   $_SESSION['start'] = 0 ;
   $_SESSION['expire'] = 0;

   $user_select = " SELECT * FROM login WHERE username = '$name' && password = '$pass' && user_type = 'user' ";

   $user_result = mysqli_query($conn, $user_select);
   $user_row = mysqli_fetch_array($user_result);
   
   $admin_check = "SELECT username,password from login where user_type = 'admin'";
   $admin_result = mysqli_query($conn,$admin_check);
   $admin_row = mysqli_fetch_array($admin_result);
   
   if (mysqli_num_rows($user_result) > 0){
	   if($pass == $user_row['password'] AND $name == $user_row['username']){
		   $_SESSSION['user_name'] = $user_row['username'];
		   $_SESSION['user_pass'] = $user_row['password'];
		   $_SESSION['start'] = time();
		   $_SESSION['expire'] = $_SESSION['start'] + (60 * 10) ; 
		   header('location:user_view.php');
	   }
   }
   else{
	   if($admin_row['username'] == $_POST['fname'] AND $admin_row['password']== $_POST['pass'] ){
			$_SESSION['admin_name'] = $admin_row['username'];
			$_SESSION['admin_pass'] = $admin_row['password'];
		   $_SESSION['start'] = time();
		   $_SESSION['expire'] = $_SESSION['start'] + (60 * 10) ; 
			header('location:admin_view.php');
		}
		
	   else{
			echo "Incorrect Username or Password";   
		    header('location:login.php');
	   }
    }
	   
	   
};
?>