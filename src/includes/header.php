<?php
require 'config/config.php';

if(isset($_SESSION['username'])){
	$userLoggedIn=$_SESSION['username'];
	$user_details_query = mysqli_query($con , "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else{
	header("Location:register.php");
}

?>
<html>
<head>
	

	<!-- Javascript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>


	<!-- CSS-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >

</head>
<body>


			</nav>

	</div>
   <div class="wrapper">