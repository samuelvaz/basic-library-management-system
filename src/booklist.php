 <?php
include("includes/dbcon.php");
 session_start();

	
	
	
	$cat=$_GET['subcatid'];
	
	$totalq="select count(*) \"total\" from tblbooks where CatId ='$cat'";
	
	$totalres=mysqli_query($con,$totalq) or die("Can't Execute Query...");
	$totalrow=mysqli_fetch_assoc($totalres);
	
	
	$page_per_page=6;
	
	$page_total_rec=$totalrow['total'];
	
	$page_total_page=ceil($page_total_rec/$page_per_page);
		if(!isset($_GET['page']))
	{
		$page_current_page=1;
	}
	else
	{
		$page_current_page=$_GET['page'];
	}
	
	
	
	

?>
<!DOCTYPE html >

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="styles.css">
    <link rel="stylesheet"  href="assets/css/styles.css">
    <link rel="stylesheet"  href="css/bootstrap.css">
    <link rel="icon" href="favicon.ico">

	<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/java.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >
	<title>REFLIB</title>
</head>

<body>

	<style>
		
        

     

                
    </style>
</head>
<body> 

            <div class="menu-bar">
            	<div class="logo" align="center">
                <h1 align="center"><a href="index.php" >RefLib</a></h1>
            	</div>
			</div>			

				<div id="page">
							<div id="content">
								<div class="post">
									<h1 class="title" align="center"><?php echo $_GET['CategoryName'];?></h1>
									<div class="entry">
										
										<table border="4" width="100%" >
											<br><br><br><br><br>
											<?php
												
												$k=($page_current_page-1)*$page_per_page;
											
												$query="select * from tblbooks where CatId ='$cat' LIMIT ".$k .",".$page_per_page;
	
												$res=mysqli_query($con,$query) or die("Can't Execute Query...");
	
												$count=0;
												while($row=mysqli_fetch_assoc($res))
												{
													if($count==0)
													{
														echo '<tr>';
													}
													echo '<td valign="top" width="20%" align="center">
														<a href="detail.php?id='.$row['id'].'&cat='.$_GET['CategoryName'].'">
														<img src="'.$row['pic'].'" width="150" height="250">
														<br>'.$row['BookName'].'</a>
													</td>';
													$count++;							
													
													if($count==2)
													{
														echo '</tr>';
														$count=0;
													}
												}
											?>
											
										</table>
										
										
										<br><br><br>
										<center>
										<?php
											
											if($page_total_page>$page_current_page)
											{
												echo '<a href="booklist.php?subcatid='.$_GET['subcatid'].'&CategoryName='.$_GET["CategoryName"].'&page='.($page_current_page+1).'">Next</a>';
											}
											
											for($i=1;$i<=$page_total_page;$i++)
											{
												echo '&nbsp;&nbsp;<a href="booklist.php?subcatid='.$_GET['subcatid'].'&CategoryName='.$_GET["CategoryName"].'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
											}
											
											if($page_current_page>1)
											{	
												echo '<a href="booklist.php?subcatid='.$_GET['subcatid'].'&CategoryName='.$_GET["CategoryName"].'&page='.($page_current_page-1).'">Previous</a>';
											}
											
										?> 
										</center>
									</div>
									
								</div>
								
							</div>
					
				
</html>
