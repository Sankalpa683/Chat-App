<?php 

session_start();

$unset = session_unset();
if ($unset) {
	header("location: login.php");
}
else{
	header("location: logout.php");
}
?>