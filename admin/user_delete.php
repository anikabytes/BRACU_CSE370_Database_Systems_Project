<?php
@include 'DBconnect.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM login WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {
		echo "User Deleted successfully";
		header('location:user_info.php');
	} else {
		echo "User Cannot Be Deleted";
	}
};

?>
