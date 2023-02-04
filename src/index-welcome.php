<?php
include("includes/header.php");
include("includes/classes/user.php");

include("includes/dbcon.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet"  href="styles.css">
    <link rel="stylesheet"  href="assets/css/styles.css">-->
    <!--<link rel="stylesheet"  href="css/bootstrap.css">-->
    <link rel="icon" href="favicon.ico">
    <title>REFLIB</title>
    <!--slide 1 style -->
    <!--<style>
        

        .button-learn-more {
	        background-color:transparent;
	        border-radius:5px;
	        border:1px solid #ffffff;
	        display:inline-block;
	        cursor:pointer;
	        color:#ffffff;
	        font-family:Arial;
	        font-size:17px;
	        padding:16px 31px;
	        text-decoration:none;
        }

        .button-learn-more{
            margin: 0px auto;
        }
        .button-learn-more:hover {
	        background-color:transparent;
        }
        .button-learn-more:active {
	        position:relative;
	        top:1px;
        }

        .slideimg{
            width: 100%;
            height: 595px;
            background-image: url(typewriter-801921.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: inset 0px 0px 15px 1px ;
            padding: 0px;
            padding-top: 15%;
            padding-left: 5%;
        }


        .slideimg h1{
            color: #f1f1f1;
            display: flex;
            font-size: 120px;
            font-weight: 200;
            font-family: 'Poppins', sans-serif;
        }
        
        .slideimg input{
            background-color: transparent;
            border-color: #f1f1f1;
            border-style: solid;
            color:#f1f1f1;
            font-size: 20px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            height: 15%;
            width:  18%;
            outline: none;
            padding: 0px 5px;
        }
        .slideimg input:hover{
            color:#141414;
            background-color: #f1f1f1;
            box-shadow: 0px 0px 10px 1px whitesmoke;
        }

        @media screen and (max-width:800px){
            
            .slideimg{
                padding-top: 0.1rem;
                height: 500px;
            }
            .slideimg h1{
                font-size: 60px;
                padding-top:50%;
                line-height: 1;

            }
            .slideimg input{
                width:36%;
                height: 10%;
            }
            
        }
    
        
        .slide2{
            width: 100%;
            height: 595px;
            background-image: url(book-5077895.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: inset 0px 0px 15px 1px ;
            padding: 0px;
            padding-top: 15%;
            padding-left: 5%;  
            margin-left: auto;
        }
        .slide2 h1{
            color: #ffffff;
            display: flex;
            font-size: 120px;
            font-weight: 200;
            font-family: 'Poppins', sans-serif;           
        }
        .slide2 p{
            margin: auto;
        }
        .slide2 input{
            background-color: transparent;
            border-color: #ffffff;
            border-style: solid;
            color:#ffffff;
            font-size: 20px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            height: 15%;
            width:  18%;
           
            outline: none;
            padding: 0px 5px;
            text-align:center;
        }
        

        .slide2 input:hover{
            border-color: #f1f1f1;
            background-color: #f1f1f1;
            box-shadow:0px 0px 15px 2px white;
            color:#101010;
        }

        @media screen and (max-width:800px){
            .slide2{
                padding-top: 0%;
                height:450px;
            }
            .slide2 h1{
                padding-top: 35%;
                font-size: 60px;
            }
            .slide2 input{
                 width:36%;
                 height:10%;
            }
        }
        
        .slide3{
            width: 100%;
            height: 300px;
            background-image: url(book-731199.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: inset 0px 0px 15px 1px ;
            padding: 0px;
            padding-left: 35%;
            padding-top: 10px;
           
        }
        .slide3 h1{
            color: #ffffff;
            font-size: 20px;
            font-weight: 200;
            font-family: 'poppins',sans-serif;
            padding-left: 4%;
        }
        .slide3 .email{
            width: 50%;
            height: 30px;
            background-color: transparent;
            border-color: #f1f1f1;
            border-radius: 10px;
            border-style: solid;
            font-size: 16px;
            font-weight: 200;
            font-family: 'poppins',sans-serif;
            outline: none;
            padding: 0px;
            padding-left: 5px;
            
        }
        .slide3 div{
            padding: 5px 5px 5px 5px;
        }

        .slide3 textarea{
            width: 50%;
            height: 100px;
            background-color: transparent;
            border-color: #f1f1f1;
            border-radius: 10px;
            border-style: solid;
            border-width:2px;
            display: block;
            font-size: 16px;
            font-weight: 200;
            font-family: 'poppins',sans-serif;
            outline: none;
            padding: 0px;
            padding-left: 5px;            
        }
        
        .slide3 .msgbutton{
            background-color: transparent;
            border-color: #ffffff;
            border-style: solid;
            color:#ffffff;
            font-size: 20px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            height: 10%;
            width:  20%;
            margin: auto;
            outline: none;
            padding: 0px 5px;
            
        }
        .slide3 .msg{
            padding-left: 17%;
        }
        .slide3 .msgbutton:hover{
            background-color:#f1f1f1;
            color:#101010;
            box-shadow: 0px 0px 15px 2px white;
        }
        
     
         @media screen and (max-width: 800px){
            .slide3{
                height: 250px;
                padding-left: 30%;
            }
            .slide3 h1{
                font-size: 12px;
                font-weight: 600;
                
                
                
            }
            .slide3 .email{
               font-size: 18px;
               width: 60%;

            }
            .slide3 .msgbutton{
                width: 40%;
            }
            .slide3 textarea{
                width: 60%;
            }
            .slide3 .msg{
                padding-left: 15%;
            }

        }
        @media screen  and (max-width: 400px){
            .slide3 h1{
                font-size: 10px;
                padding-left: 0;
            }
            .slide3 .email{
               font-size: 12px;
               width: 70%;

            }
            .slide3 .msgbutton{
                width: 40%;
                padding: 0px 5px;
            }
            .slide3 textarea{
                font-size: 12px;
                width: 60%;
                width: 70%;
            }

            
        }

     

                
    </style> -->
    <style>
        *{
   			margin:0px;
    		padding: 0px;
    		box-sizing: border-box;
    		font-family: 'Poppins' , sans-serif;
		}
        body{
            background: #ffffff;
            overflow-x: hidden;
        }
        .menu-bar{
            height:0px;
            background: #101010;
            width: 100%;
            padding: 0px;
        }
        .logo{
            width: 100%;
        }
        .logo h1{
            margin: 0px;
        }
        .logo a{
            color:#ffffff;
            margin: 0px;
        }
        ul{
            display: flex;
        }
        .nav-links{
            margin:0px;
            width: 100%;
        }
        .about{
            text-decoration: none;
            color: #ffffff;
        }
        .about a{
            color: #ffffff;
            text-decoration: none;
        }
        .cate{
            color: #ffffff;
        }
        .cat-menu li a{
            text-decoration: none;
            color: #ffffff;
        }
        .main_column{
            min-height: 100px;
        }
        .user{
            display: block;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
                <div class="menu-bar">
                    <ul type="none">
                        <li>
            	                <div class="logo">
                                    <h1><a href="index.php">REFLIB</a></h1>
            	                </div>
                        </li> 
                        <li>           	
                            <ul class="nav-links" type="none">    
                                <li class="about"><a href="#">About</a></li>
            	                <li>
            		                <div class="cate">Categories</div>
                        
            			                <ul type="none">
				      	                    <div class="cat-menu">


        								        <?php					
		            							    	$query="select * from tblcategory ";

		    	            							$res=mysqli_query($con,$query);
        
		    		            						while($row1=mysqli_fetch_assoc($res))
			    		    	        					{
				    		    		        				echo '<li><a href="subcat.php?cat='.$row1['id'].'&CategoryName='.$row1["CategoryName"].'">'.$row1["CategoryName"].'</a></li>';
					    		    			        		//pass catid not catnm
						            		    			}		
    							            	    ?>
	    						            </ul>
		    				        </div>  
                	            </li>
                        </li>
                    </ul>
                </div> 
            
    </header>
     <div class="main_column column">
		<h1 class="user"> 
		<br>
		<?php 
		$user_obj = new User($con,$userLoggedIn);
		echo $user_obj->getFirstAndLastName();


		 ?> Welocome to Reflib 
		</h1>
</div>


 
<ul id="search" type="none">
                <h2>Search</h2>
                <form method="GET" action="search_result.php">
                    <fieldset>
                        
                    <input type="text" id="s" name="s" value="" />
                    <input type="submit" id="x" value="Search" />
                
                    </fieldset>
                </form>
            </ul>
           
           
            <br>
            <a href="view-books.php" > click here to view all the books </a>

<script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
 </body>
 </html>
