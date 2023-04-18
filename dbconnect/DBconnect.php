<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'play_beats';

$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($conn == True){
	//echo "Succesful Connection" ;
	//echo "<br/";
}else{
	//echo "Unsuccesful Connection" ;
	//echo "<br/";
}

?>
