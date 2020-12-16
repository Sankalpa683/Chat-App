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

	$select = "SELECT * FROM `messages` ORDER BY 1 DESC";
	$query = mysqli_query($conn, $select);

	$nums = mysqli_num_rows($query);
	if ($nums > 0) {
		while ($rows = mysqli_fetch_assoc($query)) {
			$name = $rows['name'];
			$msgs = $rows['messages'];
			$date = $rows['date'];

			if ($name == $user_logged) {
				echo '
					<div class="containers" style="background-color: #cb4154; border-radius: 20px;">
						<b style="text-align:right; color:white;">'.$name.' (You):</b>
						<p style="color:white;">'.$msgs.'</p>
		  		 		<span class="time-right" style="color:white;">'.$date.'</span>
					</div><hr>
	  			';
			}
			else{
			echo '
				<div class="containers">
						<b>'.$name.':</b>
						<p>'.$msgs.'</p>
		  		 		<span class="time-right">'.$date.'</span>
					</div><hr>
		  		';
	  		}
		}
	}
	else{
		echo "Sorry! There were no Messages<br> You can write first Message to start the conversations";
	}

?>