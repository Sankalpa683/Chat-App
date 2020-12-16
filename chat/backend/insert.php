<?php 
session_start();
$user_logged = $_SESSION['name'];

if ($user_logged) {
	// echo "Welcome ". $user_logged;
}
else{
	header("location: login.php");
}
include 'db.php';

$msgs = mysqli_real_escape_string($conn, htmlspecialchars($_POST['msgs']));
$ip = $_SERVER['REMOTE_ADDR'];
$info = $_SERVER['HTTP_USER_AGENT'];

$insert = "INSERT INTO `messages`(`name`, `messages`, `ip`, `info`) VALUES ('$user_logged','$msgs','$ip','$info')";
$query = mysqli_query($conn, $insert);
if ($query) {
	echo $msgs;
}
else{
	echo "Noice";
}
?>