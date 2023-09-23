<?php 
session_start();
include "connection.php";

// print_r($_POST);

// print_r($_FILES);



$id=$_SESSION['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$degree=$_POST['degree'];
$language=$_POST['language'];
$filename=$_FILES['uploadimage']['name'];
$tempname=$_FILES['uploadimage']['tmp_name'];
$folder='image/'.$filename;
$oldimage=$_SESSION['image'];
move_uploaded_file($tempname, $folder);
// echo $name,$address,$email,$password,$dob,$gender,$degree,$language,$folder;
if($folder=='image/')
{
	for($i=0;$i<count($language);$i++){
	$sql1="UPDATE `user_lan` SET `language_lan_id`='".$_POST["language"][$i]."' WHERE registration_id='$id' ";
	
    $data1=mysqli_query($conn,$sql1);
	}
	
// print_r($data);
if($data1)
{
	$sql="UPDATE `registration` SET `name`='$name',`address`='$address',`email`='$email',`password`='$password',`dob`='$dob',`gender`='$gender',`degree`='$degree',`image`='$oldimage' WHERE id='$id'";
	$data=mysqli_query($conn,$sql);
	
     if($data)
 	{
  		header("Location:display.php");
  	}
  }else
  {
 	 echo "not inserted";
  }
}
else
{
	for($i=0;$i<count($language);$i++){
	$sql1="UPDATE `user_lan` SET `language_lan_id`='".$_POST["language"][$i]."' WHERE registration_id='$id' ";
	
    $data1=mysqli_query($conn,$sql1);
	}
	
// print_r($data);
if($data1)
{
	$sql="UPDATE `registration` SET `name`='$name',`address`='$address',`email`='$email',`password`='$password',`dob`='$dob',`gender`='$gender',`degree`='$degree',`image`='$folder' WHERE id='$id'";
	$data=mysqli_query($conn,$sql);
	
     if($data)
 	{
  		header("Location:display.php");
  	}
  }else
  {
 	 echo "not inserted";
  }
}



?>