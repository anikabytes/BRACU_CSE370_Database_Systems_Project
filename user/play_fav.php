<?php
include_once 'DBconnect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "SELECT song_url FROM favorites WHERE id='$id'";

	$result=mysqli_query($conn,$sql);



	if (mysqli_query($conn, $sql)) {
		while($row = mysqli_fetch_array($result)){
			
			header('Location: '.$row[0]);
			

			
		
		}
		
	} else {
		echo "Error playing record: " ;
	}
};
?>