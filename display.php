<?php 
	include "connection.php";

	#$sql="SELECT * FROM user_lan INNER JOIN  registration ON user_lan.registration_id=registration.id INNER JOIN language ON user_lan.language_lan_id=language.lan_id";
	$sql = "SELECT * FROM `registration`";
	$data=mysqli_query($conn,$sql);


	// $result=mysqli_fetch_assoc($data);
	
	// print_r($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>display</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<a href="forminsert.php">Add New</a>
Search:<select id="search">
	<option>Select Language</option>
		<?php 
		$sql1="SELECT * FROM language";
		$data1=mysqli_query($conn,$sql1);
		while($result1=mysqli_fetch_assoc($data1))
		{
			
			?>
		<option value="<?php echo $result1['lan_id'] ?>">
		<?php echo $result1['language'] ?>
			
		 </option>
		 <?php
		}
		?>
		
		<option value="all">All Language</option>
	</select>
	<div id="show">
		<table border="1" width="100%">
	<tr> 
		<th>Name</th>
		<th>Address</th>
		<th>Email</th>
		<th>Password</th>
		<th>Dob</th>
		<th>Gender</th>
		<th>Degree</th>
		<th>Language</th>
		<th>Image</th>
		<th>Action</th>
	</tr>
	<?php while($result=mysqli_fetch_assoc($data)){ ?>
	<tr>
		<td><?php echo $result['name']; ?></td>
		<td><?php echo $result['address']; ?></td>
		<td><?php echo $result['email']; ?></td>
		<td><?php echo $result['password']; ?></td>
		<td><?php echo $result['dob']; ?></td>
		<td><?php echo $result['gender']; ?></td>
		<td><?php echo $result['degree']; ?></td>
		<td><?php
		// $sql2="SELECT language FROM `language` WHERE `lan_id` IN ( SELECT `language_lan_id`
        //          FROM `user_lan` WHERE `registration_id`=(SELECT `id` FROM `registration`
        //          WHERE `id`=50) ) ";
		// $data2=mysqli_query($conn,);

		$lid = '';
		$sql_lang = "SELECT * FROM `user_lan` WHERE `registration_id` = ".$result['id'];
		$data_lang=mysqli_query($conn,$sql_lang);
		$lang_id = mysqli_fetch_all($data_lang, MYSQLI_ASSOC);
		foreach($lang_id as $li) {
			$lid .= $li['language_lan_id'].',';
		}
		// trim($lid, ",");

		$langName = "";
		$sql_lang_name = "SELECT * FROM `language` WHERE `lan_id` IN (".trim($lid, ",").")";
		print_r($sql_lang_name);
		$data_lang_name=mysqli_query($conn,$sql_lang_name);
		$lang_name = mysqli_fetch_all($data_lang_name, MYSQLI_ASSOC);
		foreach($lang_name as $ln) {
			$langName .= $ln['language'].',';
		}
		echo trim($langName, ",");

		
			
		 ?> </td>
		<td><img src="<?php echo $result['image']  ?>" height="50px"></td>
		<td> 
			<a href="edit.php?ep=<?php echo $result['id'] ?>">Edit</a>
			<a href="delete.php?del=<?php echo $result['id'] ?>">Delete</a>

		</td>

	</tr>
	<?php } ?>
	</table>
</div>

<script type="text/javascript">
	$("document").ready(function(){
		$("#search").change(function(){
			var lan=$("#search").val();
			formdata=new FormData();
			formdata.append("language",lan);
			$.ajax({
				type:"POST",
				url:"searchaction.php",
				data:formdata,
				contentType:false,
				processData:false
			}).done(function(data){
				$("#show").html(data);
				
			});
		});
	});
</script>
</body>
</html>
<!-- SELECT * FROM `language` WHERE `lan_id` IN (SELECT `language_lan_id` FROM `user_lan` WHERE `registration_id`= 50 ); -->