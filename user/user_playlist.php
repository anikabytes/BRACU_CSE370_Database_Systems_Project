<?php 

@include 'DBconnect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$select = "SELECT song_name,artist_name,album,song_url from songs WHERE id = '$id'";
	$result = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($result);
	$song = $row['song_name'];
	$artists = $row['artist_name'];
	$album = $row['album'];
	$url = $row['song_url'];
	
	try{
		if(mysqli_num_rows($result) < 0){	
			throw new Exception();
		}
		else{
			$insert = "INSERT INTO favorites (artist_name,album,song_name,song_url) VALUES('$artists','$album','$song','$url')";
			mysqli_query($conn,$insert);
			echo "SUCCESSFUL INSERTION";
			header('location:playlist.php');
		}
	}
	catch (Exception){
		echo "Song Already Added!";
		//header("location:user_view.php") ;
	}
};

?>