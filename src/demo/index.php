
<?php
include("includes/header.php");
include("includes/classes/user.php");
include("includes/classes/post.php");
//ob_start(); // turns on output buffering
//session_start();
//$timezone = date_default_timezone_set("Asia/Kolkata");
//$con = mysqli_connect("localhost","root","","demo" ); // conection variable
//if(mysqli_connect_errno()){
//	echo "Failed to connect" .mysqli_connect_errno();
//}

if(isset($_POST['post'])){
	$post=new post($con,$userLoggedIn);
	$post->submitPost($_POST['post_text'],'none');
	header("Location: index.php");
}




?>
	<div class="user_details column">
		<a href="#"><img src="<?php echo $user['profile_pic']; ?>"></a>
		
		<div class="user_details_left_right" >
			<a href="#">
				<?php
				echo $user['first_name'] . " " . $user['last_name'];  

				?>

			</a>
			<br>
			<?php 
			echo "Posts: " . $user['num_post']. "<br>"; 
            echo "Likes: " . $user['num_likes']; 

			 ?>

		</div>


	</div>

	<div class="main_column column">
		<form class="post_form" action="index.php" method="POST">
			<textarea name="post_text" id="post_text" placeholder="Got Something To Say??"></textarea>
			
			<input type="submit" name="post" id="post_button" value="Post">
			<hr>
		</form>
		<?php 
		$user_obj = new User($con,$userLoggedIn);
		echo $user_obj->getFirstAndLastName();


		 ?>

	</div>
</div>

 </body>
 </html>




