<?php
if (isset($_POST["submit"]) ){
	session_start();
	include 'dbh.php';
	include 'session.php';

	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="SELECT * FROM admin WHERE username='$username' AND password ='$password'";
	$result=$conn->query($sql);

	if(!$row=$result->fetch_assoc()){
		header("Location:error.php");
	}
	else{
		$_SESSION['username']=$_POST['username'];
		header("Location:adminhome.php");
	}
}
?>
