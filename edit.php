<?php 
	session_start();

	include "connection.php";
	$id=$_GET['ep'];
	#$sql="SELECT * FROM user_lan INNER JOIN  registration ON user_lan.registration_id=registration.id INNER JOIN language ON user_lan.language_lan_id=language.lan_id WHERE user_lan.registration_id=$id";
	$sql = "SELECT * FROM `registration` WHERE id='$id'";
	$data=mysqli_query($conn,$sql);
	$result=mysqli_fetch_assoc($data);
	$sql1="SELECT `language_lan_id` FROM `user_lan` WHERE `registration_id`='".$result['id']."'";
	// echo $sql1;
	// die;
	$data1=mysqli_query($conn,$sql1);
	$result1=mysqli_fetch_all($data1,MYSQLI_ASSOC);
    $finallanid=array_column($result1,'language_lan_id');
	// for($j=0;$j<count($finallanid);$j++)
	// {
	// 	echo $finallanid[$j];
	// 	// if (in_array($finallanid[$j],$result2[$i]['lan_id']))
	// 	// {
	// 	// 	echo "checked";
	// 	// }
	// }
	// $result['language_lan_id']=mysqli_fetch_all($data,MYSQLI_ASSOC);

	// echo '<pre>';
	// print_r();
	// die;
	$_SESSION['id']=$result['id'];
	$_SESSION['image']=$result['image'];
	
	
?>
<html>
<head>
	<title>form</title>
</head>
<form method="post" action="update.php" enctype="multipart/form-data">
	<h1>Registration Form</h1>
	Name:<input type="text" name="name" value="<?php echo $result['name'] ?>"><br>
	Address:<input type="text" name="address" value="<?php echo $result['address'] ?>"><br>
	Email:<input type="email" name="email" value="<?php echo $result['email'] ?>"><br>
	Password:<input type="password" name="password" value="<?php echo $result['password'] ?>"><br>
	Dob:<input type="date" name="dob" value="<?php echo $result['dob'] ?>"><br>
	Gender:<input type="radio" name="gender" value="male"
	<?php
	if($result['gender']=="male"){
		echo "checked";
	}
	?>
	>Male
		  <input type="radio" name="gender" value="female"
		  <?php
	if($result['gender']=="female"){
		echo "checked";
	}
	?>
		  >Female<br>
	Degree:<select name="degree">
		<option>Select Degree</option>
		<option value="B.Sc."
		<?php
		if($result['degree']=="B.Sc.")
		{
			echo "selected";
		}
			?>
		
		>B.Sc.</option>
		<option value="B.Tech"
		<?php
		if($result['degree']=="B.Tech")
		{
			echo "selected";
		}
			?>
		>B.Tech</option>
		<option value="BCA"
		<?php
		if($result['degree']=="BCA")
		{
			echo "selected";
		}
			?>
		>BCA</option>
	</select>	<br>
	Language Known:	
	<?php 
		  $sql2="SELECT * FROM language";
		  $data2=mysqli_query($conn,$sql2);
		  $result2=mysqli_fetch_all($data2,MYSQLI_ASSOC);
		  $finallanid1=array_column($result2,'lan_id');
		//     echo "<pre>";
		//    print_r($finallanid1);
		  for($i=0;$i<count($result2);$i++)
		  {
		// foreach($result['language_lan_id'] as $lang){
	?>
	<input type="checkbox" name="language[]" value="
	<?php
	//  echo $lang['language_lan_id'];
	 ?>"  
	<?php
	//  if($lang['language_lan_id'] == 1){ echo "checked";}
	#$lid = '';
		#$sql_lang = "SELECT * FROM `user_lan` WHERE `registration_id` = ".$result['id'];
		#$data_lang=mysqli_query($conn,$sql_lang);
		#$lang_id = mysqli_fetch_all($data_lang, MYSQLI_ASSOC);
		#foreach($lang_id as $li) {
			#$lid .= $li['language_lan_id'].',';
		#}
		// trim($lid, ",");

		#$langName = "";
		#$sql_lang_name = "SELECT * FROM `language` WHERE `lan_id` IN (".trim($lid, ",").")";
		#$data_lang_name=mysqli_query($conn,$sql_lang_name);
		#$lang_name = mysqli_fetch_all($data_lang_name, MYSQLI_ASSOC);
		#foreach($lang_name as $ln) {
			#$langName .= $ln['language'].',';
		#}
		#$language11=trim($langName, ",");
		// $lan11=explode(",",$language11);

		// if(in_array("Bengali", $lan11))
		// {
		// 	echo "checked";
		// }
		

	#
	
	
		// echo $finallanid[$j];
		if (in_array("$finallanid1[$i]",$finallanid))
		{
			echo "checked";
		}
	
?>
	>
	<?php 
	echo $result2[$i]['language'];  
	?>
	
	<?php
 } 
 ?>
	
	<br> <br>
	Image:<input type="file" name="uploadimage" >
	<img src="<?php echo $result['image']  ?>" height="50px"><br>
	
	<input type="submit" name="submit" value="Submit">

</form>
</html>

