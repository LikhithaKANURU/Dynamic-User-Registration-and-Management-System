<?php include("connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>PHP CRUD Operations</title>

</head>
<body>
	<div class="container"> 
		<form action="#" method="POST" enctype="multipart/form-data">
					

		<div class="title">
				Registration Form
		</div>
		<div class="form">

			<div class="input_field" >
				<label>Upload Image</label>
				<input type="file" name="uploadfile" style="width: 100%;">
			</div>



			<div class="input_field">
				<label>First name</label>
				<input type="text" class="input" name="fname"> 
			</div>
			<div class="input_field">
				<label>Last name</label>
				<input type="text" class="input" name="lname">
			</div>
			<div class="input_field">
				<label>Password</label>
				<input type="password" class="input" name="password">
			</div>
			<div class="input_field">
				<label>Confirm Password</label>
				<input type="password" class="input" name="conpassword">
			</div>
			<div class="input_field">
				<label>Gender</label>
				<div class="custom_select">
				<select name="gender">
					<option value="">Select</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="others">others</option>
				</select>
			</div>
			</div>
			<div class="input_field">
				<label>Email Address</label>
				<input type="text" class="input" name="email">
			</div>
			<div class="input_field">
				<label>Phone Number</label>
				<input type="text" class="input" name="phone">
			</div>
			<div class="input_field">
				<label>Address</label>
				<textarea class="textarea" name="address"></textarea>
			</div>
			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" >
					<span class="checkmark"></span>
				</label>
				<p>Agree to terms and conditions</p>
			</div>

			<div class="input_field">
				<input type="submit" value="Register" class="btn" name="register">
			</div>
		</div>
	</form>
	</div>
</body>
</html>


<?php
	if($_POST['register'])
	{

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "images/".$filename;
	move_uploaded_file($tempname, $folder);



		$_fname=$_POST['fname'];
		$_lname=$_POST['lname'];
		$_pwd=$_POST['password'];
		$_cpwd=$_POST['conpassword'];
		$_gender=$_POST['gender'];
		$_email=$_POST['email'];
		$_phone=$_POST['phone'];
		$_address=$_POST['address'];

		$query = "INSERT INTO form (std_image, fname, lname, password, conpassword, gender, email, phone, address) VALUES ('$folder', '$_fname', '$_lname', '$_pwd', '$_cpwd', '$_gender', '$_email', '$_phone', '$_address')";

		$data =mysqli_query($conn,$query);

		if ($data)
		{
			echo "Data Inserted Into DataBase";
		}
		else
		{
			echo "Failed";
		}
	}
?>