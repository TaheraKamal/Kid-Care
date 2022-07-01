<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="signin.css">
<body style="background-image: url(uploads/home.jpg);">
	<div class="registrationbox">
		<h1>Edit Profile</h1>
		<form action="editprofile.php" method="post">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Enter 6 digit password" minlength="6" required="">
			<p>First Name</p>
			<input type="text" name="firstName" placeholder="First Name" required="">
			<p>Last Name</p>
			<input type="text" name="lastName" placeholder="Last Name" required="">
			<p>Phone</p>
			<!-- <input type="number" name="phone" placeholder="Phone" required=""> -->
			<input type="tel" name="phone" placeholder="Enter 11 digit phone number. Eg:01XXXXXXXXX" pattern="[01]{2}[0-9]{9}" required="">
			<p>Region</p>
            <br>
            <select name="region">
                <!-- <option value="">Select</option> -->
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="Gulshan">Gulshan</option>
                <option value="Farmgate">Banani</option>
                <option value="Lalmatia">Uttara</option>
                <option value="Mohammadpur">Motijheel</option>
                <option value="Moghbazar">Moghbazar</option>
            </select>
            <br>
            <p>Address</p>
			<input type="text" name="address" placeholder="Address" required="">
			<br>
			<input type="submit" name="submit" value="Save Changes"><br>
			
			<center><a href="profile.php">Back</a></center>
			

		</form>
	</div>

</body>
</html>

<?php
if(isset($_POST["submit"])){
	include 'dbh.php';
	include 'session.php';

	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
	$lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
	$region=mysqli_real_escape_string($conn,$_POST['region']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);


	// echo $username.$firstName.$address;

	// $sql="UPDATE student SET password='$password', firstame='$firstName' ,lastname='$lastName',phone='$phone',region='$region',address='$address',curriculum='$curriculum',class='$class' WHERE username='$username'";

	// $sql=" UPDATE student SET password='$password' , firstame='$firstName' , lastname='$lastName' , phone='$phone' , region='$region' , address='$address' , curriculum='$curriculum' , class='$class' WHERE username='$username'";

	$sql = "UPDATE `daycare` SET `password` = '$password', `firstname` = '$firstName',`lastname` = '$lastName',`phone` = '$phone',`region` = '$region',`address` = '$address' WHERE `daycare`.`username` = '$username'";

	$result=$conn->query($sql);

	$sql1 = "UPDATE `currentclient` SET `daycare_phone` = '$phone' WHERE `currentclient`.`daycare` = '$username'";
	$result1=$conn->query($sql1);

	header("Location:profile.php");

}


 ?>