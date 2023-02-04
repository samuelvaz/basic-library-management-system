<?php
session_start();
$con = mysqli_connect("localhost","root","","library");
error_reporting(0);
include('includes/config.php');
include('includes/dbcon.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{

$bookname = mysqli_real_escape_string($con,$_POST['bookname']);
$category = mysqli_real_escape_string($con,$_POST['category']);

$author = mysqli_real_escape_string($con,$_POST['author']);
$description = mysqli_real_escape_string($con,$_POST['description']);
$isbn=$_POST['isbn'];
$price=$_POST['price'];
$foto = mysqli_real_escape_string($con,$_FILES['foto']['name']);
$filee = mysqli_real_escape_string($con,$_FILES['filee']['name']);
$temp_name =  $_FILES['filee']['tmp_namee']; 
$temp_name = $_FILES['foto']['tmp_name'];
if($bookname=="" OR $category==""){
    echo "<script>alert('Sorry Fields Cannot be Empty')</script>";
}else{
             
            
            move_uploaded_file($_FILES['filee']['tmp_name'],"uploadpdf/".$_FILES['filee']['name']);
            $upf = "uploadpdf/".$_FILES['filee']['name'];  
        
   $up='upload/'.$foto;
    
move_uploaded_file($temp_name,$up);

$insert = "INSERT INTO tblbooks (BookName,  ISBNNumber,  CatId,AuthorId,description,BookPrice,pic,pdf) values  ('$bookname','$isbn','$category','$author','$description','$price','".$up."','".$upf."')";
$run_insert = mysqli_query($con,$insert);
if($run_insert){
    echo "<script>alert('Uploaded')</script>";
}else{
    echo "<script>alert('Sorry')</script>";
}
}



 header('location:manage-books.php');
/*$files = $_FILES['file'];
$filename = $files['name'];
$fileerror = $files['error'];
$filetmp = $files['tmp_name'];
$fileext = explode('.',$filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png','jpg','jpeg');
    if (in_array($filecheck, $fileextstored)) {

        $destinationfile = 'upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile );

         $q = "INSERT INTO tblbooks(pic) VALUES ('$destinationfile')";
         $query = mysqli_query($con,$q);
        //     $query = $dbh->prepare($q);
        //     $query->bindParam(':destinationfile',$destinationfile,PDO::PARAM_STR);
        
        }
*/
/*$sql="INSERT INTO  tblbooks(BookName,CatId,AuthorId,ISBNNumber,BookPrice) VALUES(:bookname,:category,:author,:isbn,:price)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
//$query->bindParam(':destinationfile',$destinationfile,PDO::PARAM_STR);
$query->execute(); 
 $lastInsertId = $dbh->lastInsertId();
 if($lastInsertId)
 {
 $_SESSION['msg']="Book Listed successfully";
 header('location:manage-books.php');
 }
 else 
 {
$_SESSION['error']="Something went wrong. Please try again";
 header('location:manage-books.php');
 }*/

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Book</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php include('includes/header.php');?>
 

    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
               
                <h1 class="header-line">Add Book</h1>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" autocomplete="off"   />
</div>
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>ISBN<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn" autocomplete="off"   />
</div>

<div class="form-group">
<label> Category<span style="color:red;">*</span></label>
<select class="form-control" name="category">
<option value=""> Select Category</option>
<?php 
$status=1;
$sql = "SELECT * from  tblcategory where Status=:status";
$query = $dbh -> prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>

<!--<option value="<?php echo htmlentities($result->CategoryName);?> "><?php echo htmlentities($result->CategoryName);?></option>-->
 <?php }} ?> 
</select>
</div>


<div class="form-group">
<label> Author<span style="color:red;">*</span></label>
<select class="form-control" name="author" required="required">
<option value=""> Select Author</option>
<?php 

$sql = "SELECT * from  tblauthors ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->AuthorName);?></option>
 <?php }} ?> 
</select>
</div>

<!-- <div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn"  required="required" autocomplete="off"  />
<p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
</div> -->

  <!--                    **************************** Image ****************************           -->  

    <div class="form-group">    
    <label for = "file">Image<span style="color:red;">*</span></label>
    <input type='file' name='foto'class="form-control" size='35'>

   <div class="form-group">    
    <label for = "file">Select Book<span style="color:red;">*</span></label>
    <input type='file' name='filee'class="form-control" size='35'>



    <!--                     ********************************************************           -->                


<div class="form-group">
<label>Description<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="description" autocomplete="off"   />
</div>





 <div class="form-group">
 <label>Price<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" autocomplete="off"   required="required" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
