<?php
session_start();
$username="";
$email="";
$errors=array();
$con=mysqli_connect('localhost','root','','registration');
if(isset($_POST['register']))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password_1=mysqli_real_escape_string($con,$_POST['password_1']);
	$password_2=mysqli_real_escape_string($con,$_POST['password_2']);
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
		if (empty($email)) 
	{
		array_push($errors, "Email is required");
	}
		if (empty($password_1)) 
	{
		array_push($errors, "Password is required");
	}
	if ($password_1 !=$password_2)
	{
	array_push($errors,"The two password does not match");
	}
	if (count($errors)==0)
	 {
		$password=md5($password_1);
		$sql="INSERT INTO user (username,email,password)
		VALUES('$username','$email','$password')";
		mysqli_query($con,$sql);
		$_SESSION['username']=$username;
		$_SESSION['success']="You are now logged in";
		header('location:dashboard.php');
	}
	}
	if (isset($_POST['login'])) 
	{
			$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
			if (empty($password)) {
			array_push($errors, "password is required");
		}
		if (count($errors)==0) 
		{

			$password=md5($password);
			$query="SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result=mysqli_query($con,$query);
			if (mysqli_num_rows($result)==1)
			{
				$_SESSION['username']=$username;
				$_SESSION['success']="You are now logged in";
				header('location:dashboard.php');
			}else{
				array_push($errors, "Wrong username and password");
			}

		}
	}

	if (isset($_GET['logout']))
	{
		session_destroy();

		unset($_SESSION['username']);
		header('location:login.php');  
	}
?>