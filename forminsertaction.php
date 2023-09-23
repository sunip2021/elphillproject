
<?php 
include "connection.php";
// print_r($_POST);
// print_r($_FILES);
$name=$_POST['name'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$degree=$_POST['degree'];
$language=$_POST['language'];
// $filename=$_FILES['uploadimage']
// print_r($filename);
// die;
// $filename=$_FILES['uploadimage'];
// print_r($filename);
// die;
$filename=$_FILES['uploadimage']['name'];

$tempname=$_FILES['uploadimage']['tmp_name'];
$folder='image/'.$filename;
move_uploaded_file($tempname, $folder);
// echo $name,$address,$email,$password,$dob,$gender,$degree,$folder;
$sql="INSERT INTO `registration`(`name`, `address`, `email`, `password`, `dob`, `gender`, `degree`, `image`) VALUES ('$name','$address','$email','$password','$dob','$gender','$degree','$folder')";
$data=mysqli_query($conn,$sql);
// print_r($data);
if($data)
{
	
	for($i=0;$i<count($language);$i++){
	$sql1="INSERT INTO `user_lan`(`registration_id`, `language_lan_id`) VALUES (LAST_INSERT_ID(),'".$_POST["language"][$i]."')";
		
    $data1=mysqli_query($conn,$sql1);
	}
     if($data1)
 	{
  		header("Location:display.php");
  	}
  }else
  {
 	 echo "not inserted";
  }
?>

