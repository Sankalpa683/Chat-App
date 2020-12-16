<?php 
session_start();
include 'db.php';

if (isset($_POST['action'])) {
	$name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
	$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
	$ip = $_SERVER['REMOTE_ADDR'];
	$info = $_SERVER['HTTP_USER_AGENT'];
	

	$select = "SELECT * FROM `users` WHERE name='$name'";
	$result = mysqli_query($conn, $select);

	$nums = mysqli_num_rows($result);

	if ($nums > 0) {
		echo "Sorry <br> That username already exists<br> Please use another username <a href='../login.php'>Go back</a>";
	}
	else{

		$insert = "INSERT INTO `users`(`name`, `email`, `ip`, `info`) VALUES ('$name','$email','$ip','$info');";
		$query = mysqli_query($conn, $insert);

		if ($query) {
			$_SESSION['name'] = $name;
			header("location: ../index.php");
		}
		else{
			echo "Sorry something went wrong";
		}
	}
}
else{
	header("location: ../login.php");
}
?>