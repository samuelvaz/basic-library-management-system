$bookname=$_POST['bookname'];
$category=$_POST['category'];
$author=$_POST['author'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];


//include('includes/dbcon.php'); 




$file_get = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];


move_uploaded_file($temp,"upload/$file_get");

echo $file_to_saved;

$insert_img = mysqli_query($con,"INSERT INTO tblbooks (BookName,CatId,AuthorId,BookPrice,pic) values  ('$bookname','$category','$author','$price','".$file_to_saved."')");
if ($insert_img) {

echo "Img inserted successfully";
}
else{
 echo "There is something wrong with this code. Eff!";
}

 <?php
include("includes/dbcon.php");
include("includes/config.php");
 session_start();
	
	
	
	$search=$_GET['s'];
	$query="select * from tblbooks where BookName like '%$search%'";
	
	$res=mysqli_query($con,$query) or die("Can't Execute Query...");
	$sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.pic,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<body>
			
			
			<!-- start page -->

				<div id="page">
					<!-- start content -->
							<div id="content">
								<div class="post">
									<!--<h1 class="title"><?php //echo @$_GET['cat'];?></h1>-->
									<div class="entry">
										
										<table border="3" width="100%" >
											<?php
												$count=0;
												while($row=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													
													echo '<td valign="top" width="20%" align="center">
														<a href="detail.php?id='.$row['id'].'">


														<img src="'.$row['pic'].'" width="200" height="200">
														<br>'.$row['BookName'].'</a>
													</td>';
													$count++;							
													
													if($count==4)
													{
														echo '</tr>';
														$count=0;
													}
												}
											?>
											
										</table>
									</div>
									
								</div>
								
							</div>
					
					<div style="clear: both;">&nbsp;</div>
				</div>
			
</body>
</html>


		<?php  
														if ($row['ratings']==0)
														{


														?>
															

																
																
																
																<td align="left">
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>

														<?php 
														}

														 ?>	
														<?php  
														if ($row['ratings']==1)
														{


														?>
															

																
																
																
																<td align="left">
																<i class="fa fa-star fa-2x checked " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>

														<?php 
														}

														 ?>		
														 <?php  

//														rate 2
														if ($row['ratings']==2)
														{


														?>
															

																
																
																
																<td align="left">
																<i class="fa fa-star fa-2x checked " ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>

														<?php 
														}

														 ?>	
														 <?php
 //														rate 3
														if ($row['ratings']==3)
														{


														?>
															

																
																
																
																<td align="left">
																<i class="fa fa-star fa-2x checked " ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x " ></i>
																<i class="fa fa-star fa-2x " ></i>

														<?php 
														}

														 ?>	

														 <?php  
														if ($row['ratings']==4)
														{


														?>
															

																
																
																
																<td align="left">
																<i class="fa fa-star fa-2x checked " ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x " ></i>

														<?php 
														}

														 ?>	

														 <?php  
														if ($row['ratings']==5)
														{


														?>
															

																
																
																
																<td align="left">
																<i class="fa fa-star fa-2x checked " ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x checked" ></i>
																<i class="fa fa-star fa-2x checked" ></i>

														<?php 
														}

														 ?>	
