<?php
include("includes/classes/user.php");

require 'config/config.php';

if(isset($_SESSION['username'])){
	$userLoggedIn=$_SESSION['username'];
	$user_details_query = mysqli_query($con , "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else{
	header("Location:register.php");
}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="styles2.css">
    <link rel="icon" href="favicon.ico">
    <title>Reflib</title>
    <!--slide 1 style -->
    <style>
        

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

     

                
    </style>
</head>
<body> 
    
    <header>
        <nav>
            <div class="logo">
                <h1><a href="index.php">RefLib</a></h1>
            </div>
            <ul class="nav-links" type="none">
                <li ><a href="#">Books ??? </a>
                    <ul class="books-sub" style=" width: fit-content;" type="none">
                        <li><a href="books.html">F.E.  </a>
                        </li>
                        <li class="year" ><a href="#">S.E. +</a>
                            <div class="branch-list">
                                <ul style="width: fit-content;" class="branch-se" type=none>
                                    <li><a href="#">Mechanical</a></li>
                                    <li><a href="#">Production</a></li>
                                    <li><a href="#">Computers</a></li>
                                    <li><a href="#">ECS</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="year"><a href="#">T.E. +</a>  
                            <div class="branch-list">
                                <ul style="width: fit-content;" class="branch-se" type=none>
                                    <li><a href="#">Mechanical</a></li>
                                    <li><a href="#">Production</a></li>
                                    <li><a href="#">Computers</a></li>
                                    <li><a href="#">ECS</a></li>
                                </ul>
                            </div>                          
                        </li>
                        <li class="year"><a href="#">B.E. +</a>
                            <div class="branch-list">
                                <ul style="width: fit-content;" class="branch-se" type=none>
                                    <li><a href="#">Mechanical</a></li>
                                    <li><a href="#">Production</a></li>
                                    <li><a href="#">Computers</a></li>
                                    <li><a href="#">ECS</a></li>
                                </ul>
                            </div>                            
                        </li>
                    </ul>
                </li>
                <li><a href="#">About</a>
                </li>
                <li><a href="search.php">Search</a>
                </li>
                <li><a href="register.php">Logout</a>
                </li>-->
            </ul>
            <div class="toggle-sandwich">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            
        </nav> 
    </header>
    <div class="slide1">
        <div class="slideimg">
            <h1>
                <p>New 
                   Arrivals
                 </p>
            </h1>
            <!--
            <input class="button" type="submit" value="Learn More">
            -->
            <a href="#" class="button-learn-more">Learn More</a>
       
        </div>  
    </div>
<!--<div class="slide2">
        <h1>
            <p>Trending
             </p>
        </h1>
            <a href="#" class="button-learn-more">Learn More</a>
             <input class="button" type="submit" value="Learn More">-->
            
    </div> 
    <div class="slide3">
        <h1>
            <p>Write Us Your Feedback And Suggesstions 
             </p>
        </h1>
        <div><input class="email" type="email" autocomplete="off" placeholder="Email"></div>
        <div class="message">
            <textarea placeholder="Message" autocomplete="off" spellcheck="true"></textarea>
        </div>
        <div class="msg"><input class="msgbutton" type="submit" value="Submit"></div>        
    </div> 
    <footer>
        <nav class="nav-footer">
            <div class="logo-footer">
                <h1><a href="#">RefLib<span>    All Rights Reserved</span></a></h1>
            </div>
            <div class="contact-footer">
                <h1>
                    <a href="mailto:support@reflib.com">Contact: support@reflib.com</a>
                </h1>
            </div>
    </footer> 
    <script src="script.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
</body>
</html>