

<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> Sign Up  </title>
    
      <!-- core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css?12345" rel="stylesheet"/> 
  </head>

  <body> 
    <!-- following section is used for creating the menubar in the webpage -->
	<section id="header">
		<div class="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> PLAY BEATS </div>
		</div>
	</section>
	
	<section id = "section1">
		<div class="title"> CREATE NEW ACCOUNT </div>
		<form action=" " class="form_design" method="post">
			EMAIL : <input type="email" name="email"  > <br/><br/>
			USERNAME: <input type="text" name="fname" > <br/>
			PASSWORD : <input type="password" name="pass" > <br/> 
			<input type="submit" name="signup" value="SIGN UP" class="form-btn">
			<p> Already have an account? <a href="login.php"> Log In </a></p>
		
		</form>
	</section>

	



<?php

@include 'DBconnect.php';
//session_start();

if(isset($_POST['signup'])){

   $name = mysqli_real_escape_string($conn, $_POST['fname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['pass']);

   $select = " SELECT * FROM login WHERE  username = '$name' and email = '$email'";

   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);
   
	try{
	   if(mysqli_num_rows($result) > 0){
		  if($name == $row['username'] OR $email == $row['email']){
			throw new Exception();
			
		  }
		
	   }else{
		   if($_POST['fname'] != '' or $_POST['pass'] != '' or $_POST['email'] != ''){
				$insert = "INSERT into login (email,username,password) VALUES('$email','$name','$pass')";
				//$_SESSION['user_name'] = $row['username'];
				mysqli_query($conn,$insert);
				header('location:login.php');
			}
	   }
	}
	
	
   catch(Exception){

	   //echo "ERROR!".$e -> getMessage();
	   echo "User Already Exists!";
	   
   }

};



	
	


?>






	<!----- Footer ----->
	<section id="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>
