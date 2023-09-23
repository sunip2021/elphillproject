<?php
include 'connection.php';
for ($i=50; $i <=53; $i++) { 

	$language1 = array();
	
 	$sql2="SELECT * FROM user_lan INNER JOIN  registration ON user_lan.registration_id=registration.id INNER JOIN language ON user_lan.language_lan_id=language.lan_id WHERE registration.id=$i";
	$data2=mysqli_query($conn,$sql2);
	while($result2=mysqli_fetch_assoc($data2))
	{
		$lan[]=$result2['language'];
		$language=implode(",", $lan);
	}
	$language1[]=$language;
	
 } 
 print_r($language1);

	// print_r($sql2);
	
	
		

 ?>