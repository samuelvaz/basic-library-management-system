<?php session_start();
	require('includes/config.php');
	include("includes/dbcon.php");



	$id=$_GET['id'];
	//echo $id;
	
	$q="select * from tblbooks where id=$id ";
//s="select CatId from tblbooks where id = CatId";
	
	$res=mysqli_query($con,$q) or die("Can't Execute Query..");
	


	$row=mysqli_fetch_assoc($res);
	//$roww=mysqli_fetch_assoc($ress);
	$CatId=$row['CatId'];
	$AuthorId=$row['AuthorId'];
	$uID=$_GET['id'];
	$rate=$row['rateIndex'];

	$s="select * from tblcategory where id = $CatId";
	$ress=mysqli_query($con,$s) or die("Can't Execute Query..");
	$roww=mysqli_fetch_assoc($ress);

	$t="select * from tblauthors where id = $AuthorId";
	$resss=mysqli_query($con,$t) or die("Can't Execute Query..");
	$rowww=mysqli_fetch_assoc($resss);

	if(isset($_POST['save'])){
	$uID=$con->real_escape_string($_POST['uID']);
	$rate=$con->real_escape_string($_POST['rate']);

	$ratedIndex=$con->real_escape_string($_POST['ratedIndex']);
	$ratedIndex++;
	
	if ($rate===0) {
		$con->query("insert into tblbooks (rateIndex) values ('$ratedIndex')");
		$sql=$con->query("select id from tblbooks order by id desc limit 1") ;
		$uData=$sql->fetch_assoc();
		$uID=$uData['id'];
	} else 
		$con->query("update tblbooks set rateIndex='$ratedIndex' where 'id=$uID'");

	exit(json_encode(array('id' => $uID)));	
	
	}
	


	//echo $roww['CategoryName'];

	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	 <link rel="stylesheet"  href="styles.css">
  
	<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/java.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >
		

<body>
	 <div class="menu-bar">
            	<div class="logo" align="center">
                <h1 align="center"><a href="index.php" >RefLib</a></h1>
            	</div>
			</div>
	<style >
		.checked{
			color:orange;
		}
		.column1 {
			align-self: center;
	width: 60%;
height: 50px;
border-radius: 3px;
margin-right: 5px;
border: 1px solid #D3D3D3;
font-size: 12px;
padding: 5px;

}
		.main_column {
	float:right;
	width: 70%;
	z-index: -1;
	min-height:  160px;   
	}
	.post_form input[type="submit"] {

	width: 10%;

	height: 60px;

	border: none;

	border-radius: 3px;

	background-color: #101010;

	font-family: 'Bellota-BoldItalic', sans-serif;

	color: #fff;

	text-shadow: #73B6E2 0.5px 0.5px 0px;

	font-size: 90%;

	position: absolute;

	outline: 0;

	margin: 0;

}
.post_form input[type="submit"]:active {
	padding:5px 4px 4px 5px;
	color: #fff;

}
.post_form {
	width: 100%;
}

.post_form textarea {
    width: 60%;
    height: 50px;
    border-radius: 3px;
    margin-right: 5px;
    border:1px solid #D3D3D3;
    font-size: 12px;
    padding:5px;

}

	
textarea:focus {

outline: 0;

}


	</style>
			

				<div id="page">
						<!-- start content -->
							<div id="content">
								<div class="post">
									<h1 class="title">  <?php echo $row['BookName'];?></h1> 
										<?php
										
											echo '	<table border="0" width="100%">
												 <tr>
													<td><hr color="#101010"></td>
												</tr>
												 <tr align="center" bgcolor="#fff" >
													 <td > <h3> Book Details </h3></td>
												</tr>
												<tr>
													<td><hr color="#101010"></td>
												</tr>
											 </table>
											
											<table border="0"  width="100%" bgcolor="#ffffff">
												<tr> 
													
													<td width="15%" rowspan="3">
														<img src="'.$row['pic'].'" width="200" height="200">
													
													</td>
												</tr>
											
												<tr> 
													<td width="50%" height="100%">
														<table border="0"  width="100%" height="100%">
															<tr valign="top">
																<td align="right" width="10%">NAME</td>
																<td width="6%">: </td>
																<td  class="name" align="left">'.$row['BookName'].'</td>
															</tr>
															<tr valign="top">
																<td align="right" width="10%">ISBN</td>
																<td width="6%">: </td>
																<td  class="name" align="left">'.$row['ISBNNumber'].'</td>
															</tr>
															<tr valign="top">
																<td align="right" width="10%">CATEGORYNAME</td>
																<td width="6%">: </td>
																<td  class="name" align="left">'.$roww['CategoryName'].'</td>
															</tr>
															
															<tr valign="top">
																<td align="right" width="10%">AUTHORNAME</td>
																<td width="6%">: </td>
																<td  class="name" align="left">'.$rowww['AuthorName'].'</td>
															</tr>
															
															
															
															

															<tr>
																<td align="right"> PRICE</td>
																<td>: </td>
																<td align="left">'.$row['BookPrice'].'</td>
															</tr>
															<tr>
																<td align="right"> DESCRIPTION</td>
																<td>: </td>
																<td align="left">'.$row['description'].'</td>
															</tr>
															'?>
																<td align="right"> RATINGS </td>
																<td>: </td>
																<td align="left">
																<div align="left">
																	<i class="fa fa-star fa-2x" data-index="0"></i>
																	<i class="fa fa-star fa-2x" data-index="1"></i>
																	<i class="fa fa-star fa-2x" data-index="2"></i>
																	<i class="fa fa-star fa-2x" data-index="3"></i>
																	<i class="fa fa-star fa-2x" data-index="4"></i>
																	</div>


																</td>
																<script
																	  src="https://code.jquery.com/jquery-3.6.0.min.js"
																	  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
																	  crossorigin="anonymous">
																	  	
															    </script>

															    <script> 
															    	var ratedIndex=-1,uID=0;

															    	
															    	$(document).ready(function(){
															    		resetStarColour();
															    		if (localStorage.getItem('ratedIndex') != null){
															    			setStars(parseInt(localStorage.getItem('ratedIndex')));
															    			uID=localStorage.getItem('uID');

															    		}

															    		$('.fa-star').on('click',function(){
															    			ratedIndex= parseInt($(this).data('index'));
															    			localStorage.setItem('ratedIndex',ratedIndex);
															    			saveToTheDB();
															    		});
															    		$('.fa-star').mouseover(function(){
															    			resetStarColour();
															    			var currentIndex=parseInt($(this).data('index'));
															    			setStars(currentIndex);
															    		});

															    		$('.fa-star').mouseleave(function(){
															    			resetStarColour();
															    			if (ratedIndex != -1)
															    					setStars(ratedIndex);

															    			
															    		});


															    	});

															    	function resetStarColour(){
															    		$('.fa-star').css('color','#9E9E9E');

															    	}
															    	function setStars(max){
															    		for (var i=0;i<=max;i++)
															    			$('.fa-star:eq('+i+')').css('color','#ff6e00');
															    	}
															    	function saveToTheDB(){
															    		$.ajax({
															    			url:"detail.php",
															    			method:"POST",
															    			dataType:'json',
															    			data: {
															    				save:1,
															    				uID:uID,
															    				ratedIndex:ratedIndex
															    			},success:function(r){
															    				uID=r.id;
															    				localStorage.setItem('uID',uID);

															    			}

															    		});



															    	}
															    </script>


															</td>


																
															</tr>
														<tr>
																<td  align="left">
																
																		<a href="download.php?file=<?php echo $row['pdf']?>"  font-size: 24px;line-height: 
																		0.8;font-weight: 400;> 
																		
																
																	   <i class="fa fa-download fa-2x" aria-hidden="true"></i></a>
																
																 

																  
																</td>
															
																
															</tr>
											
											</td>

															</tr>
														</table>
														
													
												
														</table>


										
														
													
												</tr>
											</table>
											<br>
											<br>
											
											
											<hr color="#101010">
											<br>
											<br>

											<div class="main_column column">
												<form class="post_form" action="feedback.php?feedba=<?php echo $row['id'] ?>" method="POST">
													<textarea name="post_text" id="post_text" placeholder="Please give the feedbacks/Suggestions "></textarea>

													
													<input type="submit" name="post" id="post_button" value="Post">
											
																									</form>




												
										<br>
										<br>

										<h3>FEEDBACKS</h3>
									

										
									<?php
									$con = mysqli_connect("localhost","root","","library");	
									
									$feed="select * from tblfeedbacks where bkid = $id";
									$fed=mysqli_query($con,$feed) or die("Can't Execute Query..");

									$count=1;




									//$count=0;
												while($feedbk=mysqli_fetch_assoc($fed))
												{
													// if($count==0)
													// {
													// 	echo '<tr>';
													// }
													
													// echo '<td valign="top" width="20%" align="center">
													// 	<br>'.$feedbk['feedback'].'
													// </td>';
													echo  '<br>'.$count.'    '.$feedbk['feedback'] ;

													$count++;							
													
													// if($count==4)
													// {
													// 	echo '</tr>';
													// 	$count=0;
													// }
												}




									?>		
								
									</table>	

									



																				

											 
											 
											
											 
									
															
																
													
									
				
								</div>
			
							</div>
						
						
				
				</div> 
			
</body>
</html>
