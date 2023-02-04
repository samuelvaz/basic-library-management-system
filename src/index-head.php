<?php
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
    <link rel="stylesheet"  href="styles.css">
    <link rel="icon" href="favicon.ico">
    <title>Reflib</title>
</head>
<body> 
    
    <header>
        <nav>
            <div class="logo">
                <h1><a href="index.html">RefLib</a></h1>
            </div>
        </nav> 
    </header>
    <h3>CATEGORIES :</h3>
                <a href="includes/handlers/logout.php">
                <i>
                    <div >
                    <?php                                       
            
                                        $query="select * from tblcategory ";
            
                                        $res=mysqli_query($con,$query);
                                            
                                        while($row1=mysqli_fetch_assoc($res))
                                            {
                                                echo '<li><a href="subcat.php?cat='.$row1['id'].'&CategoryName='.$row1["CategoryName"].'">'.$row1["CategoryName"].'</a></li>';
                                                //pass catid not catnm
                                            }
            
                                            
                                ?> </div>
                </i>

                </a></div>
                 <li id="search">
                <h2>Search</h2>
                <form method="GET" action="search_result.php">
                    <fieldset>
                    <input type="text" id="s" name="s" value="" />
                    <input type="submit" id="x" value="Search" />
                    </fieldset>
                </form>
            </li>
            </ul>
    
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

                     
                
               
