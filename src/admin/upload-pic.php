<!DOCTYPE html>
	<html>
	<head>
		<title>Upload image</title>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Book</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	</head>
	<body>

	<form action=":manage-books.php" method="post" enctype="multipart/form-data" >
	<div class="form-group">	
	<label for = "file">Image<span style="color:red;">*</span></label>
    <input type='file' name='foto'class="form-control" size='35'>

    <button type="submit" name="submit" class="btn btn-info">Upload </button>
	</div>
    </form>
	</body>
	</html>	
<?php 
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'library');
//include('includes/dbcon.php'); 

if (isset($_POST['submit'])) {


$file_get = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];

$file_to_saved = "upload/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
move_uploaded_file($temp, $file_to_saved);

echo $file_to_saved;

$insert_img = mysqli_query($con,"INSERT INTO tblbooks (pic) values  ('".$file_to_saved."')");
if ($insert_img) {
# code...
echo "Img inserted successfully";
}
else{
 echo "There is something wrong with this code. Eff!";
}
}
 ?>
	<!--$files = $_FILES['file'];
	//print_r($files);

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

		$query = mysqli_query($con,$q);
	}

}
?>-->