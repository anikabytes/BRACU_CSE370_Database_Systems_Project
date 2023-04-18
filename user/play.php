<?php
include_once 'DBconnect.php';
$sql = "SELECT song_url FROM songs WHERE id='" . $_GET["id"] . "'";

$result=mysqli_query($conn,$sql);



if (mysqli_query($conn, $sql)) {
	while($row = mysqli_fetch_array($result)){
		
		header('Location: '.$row[0]);
		

		
    
	}
	
} else {
    echo "Error playing record: " ;
}

?>