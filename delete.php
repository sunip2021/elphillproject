<?php
include 'connection.php';
$id=$_GET['del'];
$sql="DELETE FROM `user_lan` WHERE registration_id='$id'";
$data=mysqli_query($conn,$sql);
if($data)
{
	$sql1="DELETE FROM `registration` WHERE id='$id'";
	$data1=mysqli_query($conn,$sql1);
	if($data1)
	{
		header("Location:display.php");
	}
}

?>