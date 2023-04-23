<?php
   
session_start();

if(!isset($_SESSION['admin_name'])) {
	header('location:login.php');
	echo "Want to login again!";
}
else {
	$now = time();
	if($now > $_SESSION['expire']) {
		session_destroy();
		echo "Session has been destroyed!";
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
      <title> Admin_view </title>
    
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
				<a href="user_info.php" style="margin-left: 20px;"> User Control </a> 
				<a href="logout.php" name = "logout" style="margin-left: 20px;"> Log Out  </a>		
			</div>
		</div>
	</section>
	
	<section id = "section1">
		<div class="title"> UPLOAD SONGS HERE </div> 
		
		<form action=" " class="form_design" method="post">
			Album Name : <input type="text" name="album"> <br/>
			Song Name : <input type="text" name="song"> <br/>
			
			Song URL : <input type="link" name="url"> <br/>
			
			Artist Name(s): <input type="text" name="art"> <br/>
			Channel Name : <input type="text" name="channel"> <br/>
			Channel URL : <input type="link" name="ur"> <br/>
			<input type="submit" name="insert" value="UPLOAD SONGS" class="form-btn">

		</form>
		
		<a href="all_songs.php">
			<button style="background-color:#cc66ff;  border: none;border-radius: 10px;color: white;padding: 12px 32px;text-decoration: none;margin: 4px 2px;cursor: pointer;margin-left: 45%;">GO TO SONG LIST</button>
		</a>
	</section>


<?php
require_once('DBconnect.php');


//if(isset($_POST['album']) && isset($_POST['song']) && isset($_POST['url']) && isset($_POST['channel']) && isset($_POST['ur']) ){
if (isset($_POST['insert'])){
	
	$album=$_POST['album'];
	
	$song=$_POST['song'];
	
	$song_url=$_POST['url'];
	
	$artist = $_POST['art'];
	
	$channel=$_POST['channel'];
	
	$channel_url=$_POST['ur'];
	
	$sql="INSERT IGNORE INTO songs (artist_name,album,song_name,song_url,channel_name,channel_url) VALUES('$artist','$album', '$song', '$song_url', '$channel', '$channel_url')";
	
	$result=mysqli_query($conn,$sql);
	

	if(mysqli_affected_rows($conn)){
			echo "Inserted Successfully";
			header('location:all_songs.php');
	}
};
?>

<?php
    }
}
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