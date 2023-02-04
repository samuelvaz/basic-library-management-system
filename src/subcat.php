<?php

include("includes/dbcon.php");

 session_start();


	
	$cat=$_GET['CategoryName'];
	echo $cat;
	$q = "select * from tblcategory where id =".$_GET['cat'];
	$res = mysqli_query($con,$q) or die("Can't Execute Query..");

	
	$row1 = mysqli_fetch_assoc($res);
	header("location:booklist.php?subcatid=".$row1['id']."&CategoryName=".$row1["CategoryName"]);
		
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>REFLIB</title>
</head>

<body>


				<div id="page">
					<div id="content">
						<div class="post">
							
							<div class="entry">
						
								<?php
									Do
									{
										
										
										echo '<li><a href="booklist.php?subcatid='.$row1['id'].'&CategoryName='.$row1["CategoryName"].'">'.$row1["CategoryName"].'</a></li>';
												//pass catid not catnm
										//&subcatnm='.$row1["subcat_nm"].'
									}while($row1 = mysqli_fetch_assoc($res))
								?>
							
							</div>
							
						</div>
						
					</div>
					
					
</body>
</html>