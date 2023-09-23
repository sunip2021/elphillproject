<?php



// print_r($_POST);

// print_r($_FILES);




$name=$_POST['name'];
// $address=$_POST['address'];
// $email=$_POST['email'];
// $password=$_POST['password'];
// $dob=$_POST['dob'];
// $gender=$_POST['gender'];
// $degree=$_POST['degree'];
// $language=implode(",", $_POST['language']);
// $filename=$_FILES['uploadimage']['name'];
// $tempname=$_FILES['uploadimage']['tmp_name'];
// $folder='image/'.$filename;
// // move_uploaded_file($tempname, $folder);
// // echo $name,$address,$email,$password,$dob,$gender,$degree,$language,$folder;
$sql="INSERT INTO `registration`(`id`, `name`, `address`, `email`, `password`, `dob`, `gender`, `degree`, `language`, `image`) VALUES ('','$name','$address','$email','$password','$dob','$gender','$degree','$language','$folder')";

echo $sql;