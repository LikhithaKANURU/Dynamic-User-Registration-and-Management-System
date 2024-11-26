
<?php include("connection.php"); 

session_start();

$id= $_GET['id'];

$userprofile =  $_SESSION['user_name'];

if($userprofile ==true)
{

}
else
{
	 header('location:login.php');
}

$query = "SELECT * FROM form where id= '$id'";
$data=mysqli_query($conn,$query);

$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>

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
		<form action="#" method="POST">
		<div class="title">
				UPDATE EMPLOYEE DETAILS
		</div>
		<div class="form">
			<div class="input_field">
				<label>First name</label>
				<input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required> 
			</div>
			<div class="input_field">
				<label>Last name</label>
				<input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
			</div>
			<div class="input_field">
				<label>Password</label>
				<input type="password" value="<?php echo $result['password']; ?>" class="input" name="password" required>
			</div>
			<div class="input_field">
				<label>Confirm Password</label>
				<input type="password" value="<?php echo $result['conpassword']; ?>" class="input" name="conpassword" >
			</div>
			<div class="input_field">
				<label>Gender</label>
				<div class="custom_select">

				<select name="gender" >
					<option value="">Select</option>

					<option value="male"
						<?php
							if($result['gender']=='male')
							{
								echo "selected";
							}
						?>
					>
					Male</option>

					<option value="female"
						<?php
							if($result['gender']=='female')
							{
								echo "selected";
							}
						?>
					>
					Female</option>
					<option value="others"
						<?php
							if($result['gender']=='others')
							{
								echo "selected";
							}
						?>
					>
					others</option>
				</select>

			</div>
			</div>
			<div class="input_field">
				<label>Email Adress</label>
				<input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
			</div>
			<div class="input_field">
				<label>Phone Number</label>
				<input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" required>
			</div>
			<div class="input_field">
				<label>Address</label>
				<textarea class="textarea" name="address" required><?php echo $result['address'];?></textarea>
			</div>
			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" >
					<span class="checkmark"></span>
				</label>
				<p>Agree to terms and conditions</p>
			</div>

			<div class="input_field">
				<input type="submit" value="Update Details" class="btn" name="update" required>
			</div>
		</div>
	</form>
	</div>
</body>
</html>


<?php
	if($_POST['update'])
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$pwd=$_POST['password'];
		$cpwd=$_POST['conpassword'];
		$gender=$_POST['gender'];
		$mail=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];

		$query = "UPDATE form set fname='$fname',lname='$lname',password='$pwd',conpassword='$cpwd',gender='$gender',email='$mail',phone='$phone',address='$address' WHERE id='$id'";

		$data =mysqli_query($conn,$query);

		if($data)
		{
			echo "<script>alert('Record Updated')</script>";
			?>

			<meta http-equiv= "refresh" content ="0; url = http://localhost/crud/display.php" />

			<?php
			}
		else
		{
			echo "Failed";
		}
	}
?>