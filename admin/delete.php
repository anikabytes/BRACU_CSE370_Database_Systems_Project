<?php
include_once 'DBconnect.php';
$sql = "DELETE FROM songs WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	header('location:all_songs.php');
} else {
    echo "Error deleting record: " ;
}

?>
