<?php
include("includes/classes/user.php");
include("includes/dbcon.php");
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
    <title>Search-Reflib</title>
    <style>
        .body{
            height: 100px;
            width: 100%;
            display: block;
        
        }
        h2{
            text-align: center;
            font-size: 15px;
            margin-top:  1rem;

        }
        .input li{
            padding-top: 10px;
        }
        .search{
            display:inline;
            padding-left: 35%;
            margin-top: 30%;            
        }
        .search input{
            border:2px solid #101010;
            margin-top:30;
            height: 30px;
            width: 500px; 
        }
         .search-button{
            padding-left: 47%;
            height: 10px;
            width: 20px;
        }
        .search-button input{
	        background-color:transparent;
	        border-radius:5px;
	        border:2px solid #101010;
	        display:inline-block;
	        cursor:pointer;
	        color:#101010;
	        font-family:Arial;
	        font-size:14px;
	        padding:10px 25px;
	        text-decoration:none;
        }
        #search, fieldset{
            height: 100px;
        }
        .all-books a{
            text-decoration: none;
            color: #101010;
        }
        .all-books a:hover{
            border: 2px solid #101010;
            font-size:16px;
            padding:10px 25px;
        }
        footer{
            position:absolute;
            bottom:0;
            width: 100%;
        }
    </style>
</head>
<body> 
    
    <header>
        <nav>
            <div class="logo">
                <h1><a href="index.php">RefLib</a></h1>
            </div>
        </nav> 
    </header>
    
   <!--<div class="body">
    <form action="">
        <label for="Search">Search:</label>
        <input type="text" id="Search" name="Search"><br><br>
        <input type="submit" value="Submit">
      </form>
      
   </div>-->
  
   
    <ul id="search" type="none">
        <h2>SEARCH</h2>
        <form method="GET" action="search_result.php">
            <fieldset>
                <ul class="input" type="none">
                <li class="search">
                <input type="text" id="s" name="s" value="" align="middle">
                </li>
                <li class="search-button">
                <input type="submit" id="x" value="Search" align="middle" >
                </li>
                </ul>
    
            </fieldset>
        </form>
    </ul>
    <br>
    <h2 class="all-books"><a href="view-books.php" > VIEW ALL BOOKS </a></h2>

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
</body>
</html>