<?php 

include('includes/config.php');

if (isset($_POST['add'])) {


	$files = $_FILES['file'];
	print_r($files);

	$filename = $files['name'];
	$fileerror = $files['error'];
	$filetmp = $files['tmp_name'];
	$fileext = explode('.',$filename);
	$filecheck = strtolower(end($fileext));

	$fileextstored = array('png','jpg','jpeg');

	if (in_array($filecheck, $fileextstored)) {

		$destinationfile = 'upload/'.$filename;
		move_uploaded_file($filetmp,$destinationfile );

		$q = "INSERT INTO 'tblbooks'( 'pic') VALUES ('$destinationfile')";

		$query = mysqli_query($dbh,$q);
	}

}
?>