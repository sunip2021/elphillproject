<?php
include 'connection.php';
$language=$_POST['language'];
$sql="SELECT * FROM user_lan INNER JOIN  registration ON user_lan.registration_id=registration.id INNER JOIN language ON user_lan.language_lan_id=language.lan_id WHERE user_lan.language_lan_id='$language'";
$data=mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
if($language=="all")
{
	$sql1="SELECT * FROM user_lan INNER JOIN  registration ON user_lan.registration_id=registration.id INNER JOIN language ON user_lan.language_lan_id=language.lan_id";
	$data1=mysqli_query($conn,$sql1);
	?>
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
	<?php while($result1=mysqli_fetch_assoc($data1)){ ?>
	<tr>
		<td><?php echo $result1['name']; ?></td>
		<td><?php echo $result1['address']; ?></td>
		<td><?php echo $result1['email']; ?></td>
		<td><?php echo $result1['password']; ?></td>
		<td><?php echo $result1['dob']; ?></td>
		<td><?php echo $result1['gender']; ?></td>
		<td><?php echo $result1['degree']; ?></td>
		<td><?php echo $result1['language']; ?></td>
		<td><img src="<?php echo $result1['image']  ?>" height="50px"></td>
		<td> 
			<a href="edit.php?ep=<?php echo $result1['id'] ?>">Edit</a>
			<a href="delete.php?del=<?php echo $result1['id'] ?>">Delete</a>

		</td>

	</tr>
	<?php } ?>
	</table>
<?php	
}
else
{
?>	

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
		<td><?php echo $result['language'];?></td>
		<td><img src="<?php echo $result['image']  ?>" height="50px"></td>
		<td> 
			<a href="edit.php?ep=<?php echo $result['id'] ?>">Edit</a>
			<a href="delete.php?del=<?php echo $result['id'] ?>">Delete</a>

		</td>

	</tr>
	<?php } ?>
	</table>
<?php
}
?>





		
