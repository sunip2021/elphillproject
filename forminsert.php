<?php 
	include "connection.php";
	$sql="SELECT * FROM language ";
	$data=mysqli_query($conn,$sql);
 ?>
<html>
<head>
	<title>form</title>
</head>
<form method="post" action="forminsertaction.php" enctype="multipart/form-data">
	<h1>Registration Form</h1>
	Name:<input type="text" name="name"><br>
	Address:<input type="text" name="address"><br>
	Email:<input type="email" name="email"><br>
	Password:<input type="password" name="password"><br>
	Dob:<input type="date" name="dob"><br>
	Gender:<input type="radio" name="gender" value="male">Male
		  <input type="radio" name="gender" value="female">Female<br>
	Degree:<select name="degree">
		<option>Select Degree</option>
		<option value="B.Sc.">B.Sc.</option>
		<option value="B.Tech">B.Tech</option>
		<option value="BCA">BCA</option>
	</select>	<br>
	Language Known:	
	<?php $sql="SELECT * FROM language";
		  $data=mysqli_query($conn,$sql);
		  while($result=mysqli_fetch_assoc($data))
		  {
	?>
	<input type="checkbox" name="language[]" value="<?php echo $result['lan_id']  ?>" >
	<?php echo $result['language'];  ?>
	
<?php } ?>
	<br>
	Image:<input type="file" name="uploadimage"><br>
	<input type="submit" name="submit" value="submit">

</form>
</html>
