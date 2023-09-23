<?php  

error_reporting(E_ALL);
ini_set('display_errors', '1');


$servername="localhost";
$user="elpdev";
$password="elphill123";
$db="my_db";
$conn=mysqli_connect($servername,$user,$password,$db);
if($conn)
{
	// echo "connected successfully";
}
?>