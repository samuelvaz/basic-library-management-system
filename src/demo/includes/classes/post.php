<?php 
class post {
	private $user_obj;
	private $con;

	public function __construct($con,$user){
		$this->con = $con;
		
		$this->user_obj = new user($con, $user);

	}

	public function submitPost($body,$user_to) {
		$body = strip_tags($body); // removes html tags
		$body = mysqli_real_escape_string($this->con,$body);

		$body = str_replace('\r\n','\n', $body);
		$body = nl2br($body);
		$check_empty = preg_replace('/\s+/', '', $body); // Deletes all spaces

		if($check_empty != ""){

			// current date and time
			$date_added = date("Y-m-d H:i:s");
			//get username 
			$added_by = $this->user_obj->getUsername();

			// if user is on own profile , user_to is 'none'
			if($user_to == $added_by) {
				$user_to == "none";

			}
			// insert post
			$query = mysqli_query($this->con,"INSERT INTO post VALUES('','$body','$added_by','$user_to','$date_added','no','no','0')");
			$returned_id = mysqli_insert_id($this->con);

			//insert notification
			//update post count for users
			$num_posts = $this->user_obj->getNumPosts();
			$num_posts ++ ;
			$update_query =mysqli_query($this->con,"UPDATE user SET num_posts='$num_posts' WHERE username='$added_by' ");

		}


	}

	public function loadPostsFriends() {
		$str=""; // string to return
		$body= mysqli_query($this->con,"SELECT * FROM post WHERE deleted='no' ORDER BY id DESC");

		while ($row=mysqli_fetch_array($data)) {
			$id=$row['id'];
			$body=$row['body'];
			$added_by=$row['added_by'];
			$date_time=$row['date_added'];

			// prepare user to string so it can be included even if not posted to a user 
			if($row['user_to'] == "none"){
				$user_to="";
			}
			else {
				$user_to_obj = new user($con,$row['user_to']);
				$user_to_name = $user_to_obj->getFirstAndLastName();
				$user_to = "<a href='" . $row['user_to'] ."'>" . $user_to_name . "</a>";
			}
			// check if user who posted , has their account closed
			$added_by_obj = new user($con,$added_by);
			if($added_by_obj->isClosed()){
				continue;
			}

			$user_details_query = mysqli_query($this->con,"SELECT first_name,lastna_me,profile_pic FROM users WHERE username='$added_by'");
			$user_row = mysqli_fetch_array($user_details_query);
		}
		
	}

}



 ?>