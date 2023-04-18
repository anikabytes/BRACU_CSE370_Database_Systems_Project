<?php
@include 'DBconnect.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM favorites WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {
		echo "Song Deleted successfully";
		header('location:playlist.php');
	} else {
		echo "Song Cannot Be Deleted";
	}
};

?>
