<?php
   
session_start();

if(!isset($_SESSION['user_name']) or !isset($_SESSION['admin_name'])) {
	header('location:login.php');
	echo "Want to login again!";
}
else {
	$now = time();
	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Session has been destroyed!!";
		header("Location: login.php");  
	}
	else { 
?>
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> User Control </title>
    
      <!-- core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css?12353784620" rel="stylesheet"/> 
  </head>

  <body> 
    <!-- following section is used for creating the menubar in the webpage -->
	<section id="header">
		<div class="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> Play Beats </div>
			<div class="col-md-10" style="text-align: right"> 
				<!----- <a href="user_playlist" style="margin-left: 20px;"> My Playlist </a> --->
				<!----<a href="logout.php" style="margin-left: 20px;"> Logout  </a> ---->
			</div>
		</div>
	</section>
	
	<section id = "section1">

		<div class="title"> User Control </div>
		<a href="signup.php">
			<button style="padding: 10px 32px; margin-left: 11%; background-color:#cc66ff; border: none; border-radius: 5px;color: white;"> Add New User </button> 
		</a>
		<div style="margin-left:10%; margin-right:10%; margin-top:50px; margin-bottom:50px;text-align:center;background:#cc99ff;">
			<div class="row" style="padding:5px;"> 
				
				<div class="col-md-3">  Username </div>
				<div class="col-md-3">  Email </div>
		
			</div>
			
			<!-- here we will write php codes to fetch data from database and will show in the rows of this table -->
			
			<?php 
			require_once("DBconnect.php");
			$sql = "SELECT id,username,email from login WHERE user_type = 'user'";
			
			$result = mysqli_query($conn, $sql);
			
			if(mysqli_num_rows($result) > 0){
				//here we will print every row that is returned by our query $sql
				while($row = mysqli_fetch_array($result)){
				//here we have to write some HTML code, so we will close php tag
			?>
			<div class="row" style="padding:5px;"> 
				<div class="col-md-3">  <?php echo $row["username"]; ?> </div>
				<div class="col-md-3">  <?php echo $row["email"]; ?> </div>
				<div class="col-md-3"> 
				
				<!---<button style="background-color:#0000ff;border: none; border-radius: 5px;color: white;"><a href="user_update.php?id=<?php echo $row["id"]; ?>">  Update User Email </a></button> --->
				<button  style="background-color:#ff0000;border: none; border-radius: 5px;color: white;"><a href="user_delete.php?id=<?php echo $row["id"]; ?>" name = "delete"> Deactivate User Account </a></button> 
				
				
				</div>
		
				
			</div>
			
			<?php 
				}					
			}
			?>
			
		</div>
		<?php 
	}
}	
			?>

		
			
		
	</section>

	
	<!----- Footer ----->
	<section id="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>