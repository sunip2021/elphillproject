<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>event</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
Choose color:
		<select  id="s1">
			<option>Select Color</option>
			<option value="red" >Red</option>
			<option value="green">Green</option>
			<option value="blue">Blue</option>
			<option value="orange">Orange</option>
			
		</select>
		<script type="text/javascript">
			
			$("document").ready(function(){
				$("#s1").change(function(){
					var color=$("#s1").val();
					console.log(color);
		$("body").css("background-color",color);
			});
			});
		</script>
</body>
</html>