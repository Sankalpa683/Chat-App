<?php 
session_start();
$user_logged = $_SESSION['name'];

if ($user_logged) {
	// echo "Welcome ". $user_logged;
}
else{
	header("location: login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal. SankuzMessage is nepali chatapp & SankuzMessage is a anonymous Chat app. SankuzMessage is nepali chat app that is developed by Sankalpa Dahal. SankuzMessage is free & SankuzMessage will always remain free.">
    <meta name="keywords" content="SankuzMessage,Sankuz,Message,SankuzMessage, Sankalpa Dahal, SankizMessage, SankuzMessage, Sankk Dahal, Sanku Dahal, Chat App, Chat App SankuzMessage, Chat on SankuzMessage, anonymous chat app, anonymous chat app SankuzMessage">
    <meta name="author" content="Sankalpa Dahal, Sank Dahal, SankiTime, Sanku Dahal, Sankk Dahal, Sankuz Dahal">
    <link rel="icon" href="logo.png">

    <!-- og -->

    <meta property="og:image" content="logo.png" />
    <meta property="og:description" 
      content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal. SankuzMessage is nepali chatapp & SankuzMessage is a anonymous Chat app. SankuzMessage is nepali chat app that is developed by Sankalpa Dahal. SankuzMessage is free & SankuzMessage will always remain free." />
    <meta property="og:determiner" content="the" />
    <meta property="og:locale" content="en_GB" />
    <meta property="og:locale:alternate" content="fr_FR" />
    <meta property="og:locale:alternate" content="es_ES" />
    <meta property="og:site_name" content="SankuzMessage" />
    <meta property="og:image" content="logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:type" content="SankuzMessage website" />
    <meta property="og:url" content="">
    <meta property="og:SankuzMessage" content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal.">

    <!-- twitter -->
    <meta name="twitter:title" content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal.">
    <meta name="twitter:description" content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal. SankuzMessage is nepali chatapp & SankuzMessage is a anonymous Chat app. SankuzMessage is nepali chat app that is developed by Sankalpa Dahal. SankuzMessage is free & SankuzMessage will always remain free">
    <meta name="twitter:image" content="logo.png">
    <meta name="twitter:card" content="logo.png">

    <!-- fb -->
     <meta name="fb:title" content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal.">
    <meta name="fb:description" content="SankuzMessage is free messaging app Designed & Coded by Sankalpa Dahal. SankuzMessage is nepali chatapp & SankuzMessage is a anonymous Chat app. SankuzMessage is nepali chat app that is developed by Sankalpa Dahal. SankuzMessage is free & SankuzMessage will always remain free">
    <meta name="fb:image" content="logo.png">

    <!-- viewport -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SankuzMessage - Official Messenging App | SankuzMessage</title>
    <style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: right;
  color: #999;
}
#chatsmsgs{
	overflow-y: scroll;
	height: 400px;
  border: 4px solid #000;
  padding: 10px;
}
.containers{
  padding: 20px;
}
.log{
  text-align: right;
}
</style>
  </head>
  <body><br>
    <h2> SankuzMessage - Chat Messages</h2>
    <p class="log"><a href="logout.php">Logout</a></p>

    <div id="chatsmsgs">
    	<div class="container">
  		  
		  </div>
    </div>
	<div class="form-group"><br>
		<textarea class="form-control" placeholder="Enter your msgs here" id="msgs" required="" maxlength="600"></textarea><br>
		<button class="btn btn-success text-right" id="send">Send</button>
	</div>
  </body>
  <!-- jquery ajax cdn  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

  <!-- scripting -->
  <script>
  	$(document).ready(function(){
      select();
  		$("#send").click(function(){
  			var msgs = $("#msgs").val();
  			$.ajax({
  				url : 'backend/insert.php',
  				type : 'POST',
  				data : "msgs=" + msgs,
  				success:function(data){
            select();
  					$("#msgs").val('');
  				} 
  			});
  		});

      function select(){
        setInterval(function (){
          $.ajax({
            url : 'backend/select.php',
            type : 'POST',
            success:function(status){
              $('.container').html(status);
            }
          });
        },1000);
      }
  	});
  </script>
</html>

