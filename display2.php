<?php
 include 'connection.php';
$sql = "SELECT * FROM `registration`";
	$data=mysqli_query($conn,$sql);
	while($result=mysqli_fetch_assoc($data))
	{
		$lid = '';
		$sql_lang = "SELECT * FROM `user_lan` WHERE `registration_id` = ".$result['id'];
		$data_lang=mysqli_query($conn,$sql_lang);
		$lang_id = mysqli_fetch_all($data_lang, MYSQLI_ASSOC);
		foreach($lang_id as $li) {
			$lid .= $li['language_lan_id'].',';
		}
		// trim($lid, ",");

		
		// echo $langName."<br>";
		$lanid=trim($lid, ",");
		$lan=explode(",",$lanid);
		print_r($lan);
// 		if(strpos("$language11","Bengali"))
// {
// echo "checked";
// }
// else
// {
// echo "";
// }

	}
	

	?>