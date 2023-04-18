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
      <meta name="description" content="Music Streaming Service"/>
      <meta name="author" content="Anika Islam"/>
      <title> Edit song </title>
    
      <!-- core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css?12134" rel="stylesheet"/> 
  </head>

  <body> 
    <!-- following section is used for creating the menubar in the webpage -->
	<section id="header">
		<div class ="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> PLAY BEATS </div>
			<div class="col-md-10" style="text-align: right"> 
				<!---- <a href="user_view.php" style="margin-left: 20px;"> Admin View </a> 
				<a href=" " name = "logout" style="margin-left: 20px;"> Log Out  </a> ----->
			</div>
		</div>
	</section>
	
	<section id = "section1">
		<div class="title"> UPDATE SONG INFORMATION HERE </div> 
		
		<form action=" " class="form_design" method="post">
			Album Name : <input type="text" name="album"> <br/>
			Song Name : <input type="text" name="song"> <br/>
			
			Song URL : <input type="link" name="url"> <br/>
			
			Artist Name(s): <input type="text" name="art"> <br/>
			Channel Name : <input type="text" name="channel"> <br/>
			Channel URL : <input type="link" name="ur"> <br/>
			<input type="submit" name="update" value="UPDATE SONGS" class="form-btn">
		</form>
	</section>

	
	<!----- Footer ----->
	<section id ="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>

<?php
require_once('DBconnect.php');

if(isset($_GET["id"])){
	$id=$_GET["id"];
}

if (isset($_POST['update'])){
	
	$album=$_POST['album'];
	
	$song=$_POST['song'];
	
	$song_url=$_POST['url'];
	
	$artist = $_POST['art'];
	
	$channel=$_POST['channel'];
	
	$channel_url=$_POST['ur'];
	
	$sql="UPDATE songs SET song_name='".$_POST['song']."', artist_name='".$_POST['art']."', album='".$_POST['album']."', song_url='".$_POST['url']."', channel_name='".$_POST['channel']."',channel_url='".$_POST['ur']."' WHERE id='$id'";
	
	$result=mysqli_query($conn,$sql);
	

	if(mysqli_affected_rows($conn)){
			echo "Updated Successfully";
			header('location:all_songs.php');
		
	}
    else{
			echo "Failed to update";
	}		
	
};
?>
<?php
    }
}
  
?>

