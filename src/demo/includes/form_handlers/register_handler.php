<?php
$fname= "";    // First Name
$lname= "";    // Last Name
$em= "";       // Email id 
$em2= "";      // Email id 2
$password= ""; // password 
$password2= "";// password 2
$date="";      // sign up date
$error_array=array();  // holds error messages

if (isset($_POST['register_button'])) {
		// Registeration forn values 

		// First Name
		$fname = strip_tags($_POST['reg_fname']); // removes the tags
		$fname = str_replace(' ', '', $fname);    // removes the space
		$fname = ucfirst(strtolower($fname));     // lowercases the uppercase letters
		$_SESSION['reg_fname'] = $fname;          // stores first name into session variable

		// Last Nmae 	
		$lname = strip_tags($_POST['reg_lname']); // removes the tags 
		$lname = str_replace(' ', '', $lname);    // removes the space
		$lname = ucfirst(strtolower($lname));     // lowercases the uppercase letters
		$_SESSION['reg_lname'] = $lname;          // stores first name into session variable

		// Email
		$em = strip_tags($_POST['reg_email']); // removes the tags 
		$em = str_replace(' ', '', $em);       // removes the space
		$em = ucfirst(strtolower($em));        // lowercases the uppercase letters
		$_SESSION['reg_email'] = $em;          // stores first name into session variable

		// Email 2
		$em2 = strip_tags($_POST['reg_lemail']); // removes the tags 
		$em2 = str_replace(' ', '', $em2);    // removes the space
		$em2 = ucfirst(strtolower($em2));     // lowercases the uppercase letters
		$_SESSION['reg_lemail'] = $em2;  // stores first name into session

		// Password
		$password = strip_tags($_POST['reg_password']); // removes the tags 
		$_SESSION['reg_password'] = $password;  // stores first name into session
		// Password 2
		$password2 = strip_tags($_POST['reg_password2']); // removes the tags 
		$_SESSION['reg_password2'] = $password2;  // stores first name into session

		$date = date("Y-m-d"); // current date 

		if($em==$em2){
			// checks if emails is on valid format
			if(filter_var($em, FILTER_VALIDATE_EMAIL )){
				$em = filter_var($em,FILTER_VALIDATE_EMAIL ); // checks if email format is correct	
				// checks if email exists
				$e_checks = mysqli_query($con,"SELECT email FROM users WHERE email='$em'");

				// count the number of rows returned 
				$num_rows= mysqli_num_rows($e_checks);
				if ($num_rows>0) {
					array_push($error_array,"Email already in use<br>");
				}
			}	
			else{
				array_push($error_array,"Invalid email format<br>");
				
			}

			

		}else{
			array_push($error_array," Emails don't match<br>");
		}

		if (strlen($fname)>25 || strlen($fname)<2) {
			array_push($error_array,"Your first name must be between 2 and 25<br>");
			
		}


		if (strlen($lname)>25 || strlen($lname)<2) {
			array_push($error_array,"Your last name must be between 2 and 25<br>");
		}

		if($password != $password2){
			array_push($error_array, "Password does not match<br>");
		}else{
			if (preg_match('/[^A-Za-z0-9]/', $password)) {
				array_push($error_array,"Your password must contains Alphabets and Numbers only<br>");
			}
		}

		if (strlen($password) >30 || strlen($password)<5) {
			array_push($error_array,"Your password must be between 5 and 30<br>");
		}

		if(empty($error_array)){
			$password = md5($password); // Encypts password before sending to database
			// Generates username by concatenating first name and last name 

			$username = strtolower($fname . "_" . $lname);
			$check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");	
			$i=0;
			// If username existsadd number to username
			while (mysqli_num_rows($check_username_query) != 0) {
				$i++;
				$username =$username . "_" .$i;
				$check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");	
			}

			// profile picture assignment
			$rand= rand(1,2); 
			if($rand==1)
				$profile_pic ="assets/images/profile_pics/defaults/head_deep_blue.png";
			else if($rand==2) 
				$profile_pic="assets/images/profile_pics/defaults/head_emerald.png";

			$query=mysqli_query($con,"INSERT INTO users VALUES ('', '$fname' ,'$lname' , '$username','$em','$password','$date', '$profile_pic' ,'0','0','no',',' )");
			array_push($error_array,"<span style = 'color: #14C800;'> You are all set !!! Goahead and login!! :)</span><br>");

			// clear session variables
			$_SESSION['reg_fname'] = "";
			$_SESSION['reg_lname'] = "";
			$_SESSION['reg_email'] = "";
			$_SESSION['reg_lemail'] = "";
		}





	}	
?>
