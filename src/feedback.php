	<?php 
	session_start();
	$con = mysqli_connect("localhost","root","","library");
	error_reporting(0);
	$fed=$_GET['feedba'];
	
	


	if(isset($_POST['post'])){
		$post=mysqli_real_escape_string($con,$_POST['post_text']);
			
	         $status=0;
	         $Solved="No";
	         $insert = "INSERT INTO tblfeedbacks (feedback,Status,Solved,bkid) values  ('$post','$status','$Solved',$fed)";
			$run_insert = mysqli_query($con,$insert);
			header("Location: detail.php?id=$fed");
			//echo $solved;

	         
	     }

	?>