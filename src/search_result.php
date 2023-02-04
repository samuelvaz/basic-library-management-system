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
<head>
	<style>
		*{
   			margin:0px;
    		padding: 0px;
    		box-sizing: border-box;
    		font-family: 'Poppins' , sans-serif;
		}
		header{
    		display: flex;
    		justify-content: space-around;
    		align-items: center;
    		min-height: 10vh;
    		background-color:#141414;
    		font-family: 'Poppins', sans-serif;   
		}
		.table{
			border: none;
			padding-left: 9%;
		
		}
		.book{
			display: flex;
    		justify-content: space-around;
    		align-items: center;
		}

	</style>
</head>


<body>
	<header>
	<div class="logo">
        <h1><a href="index.php">RefLib</a></h1>
    </div>
	</header>	
			

				<div id="page">
							<div id="content">
								<div class="post">
									<!--<h1 class="title"><?php //echo @$_GET['cat'];?></h1>-->
									<div class="entry">
										
										<table class="table" width="100%" >
											<?php
												$count=0;
												while($row=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													
													echo '<td  class="book" valign="top" width="20%" align="left">
														<a href="detail.php?id='.$row['id'].'">


														<img src="'.$row['pic'].'" width="200" height="200">
														<br>'.$row['BookName'].'</a>
													</td>';
													$count++;							
													
													if($count==1)
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
