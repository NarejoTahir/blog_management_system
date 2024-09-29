<?php
	// date_default_timezone_set("Asia/Karachi");
	// $data_of_birth=02-12-2024;
	// echo date("Y:m:d",mktime($data_of_birth));
	// die();


	require_once("database_credentials.php");
	require_once("session_maintain.php");
	require_once("send_email.php");

	class database extends Session{

		private $conn=null;
		public function send_email($sent_to,$subject,$message){
			$email=new Email;

			$email->send_mail($sent_to,$subject,$message);

		}
		

		public function __construct($host,$user,$password,$dbname){

			$this->conn=mysqli_connect($host,$user,$password,$dbname);

		}


		// Method For Login User
			public function login($username,$password){
				$query="select * from user where email='".$username."' and password='".sha1($password)."'" ;
				$result=mysqli_query($this->conn,$query);

				if ($result->num_rows==0) {
					
					header("location:../user/login.php?message=Invalid user Credentials");
				}
				else{
					$record=mysqli_fetch_assoc($result);
					if ($record['is_approved']=="Approved") {
							if ($record['is_active']=="Active") {
									$this->set_session($record);
								if ($this->is_admin()) {
										header("location:../admin/dashboard.php");
										return $record;
									
								}
								elseif($this->is_user()){
									header("location:../user/index.php");
									return $record;
								}
							}
							elseif($record['is_active']=="InActive"){
								header("location:../user/login.php?message=Your Account is Temporary Blocked You can Not Login");

							}
					}
					elseif ($record['is_approved']=="Pending") {
						header("location:../user/login.php?message=Your Account Is Not Approved By Admin You can Not Login");
					}
					elseif ($record['is_approved']=="Rejected") {
						header("location:../user/login.php?message=Your Account is Rejected By Admin");
					}

				}
			}
		

			public function insert($first_name,$last_name,$email,$password,$gender,$date_of_birth,$user_image,$address){
		
					if ($this->is_admin()) {
						$query="insert into user (first_name,last_name,email,password,gender,date_of_birth,user_image,address,is_approved,is_active) values('".$first_name."','".$last_name."','".$email."','".sha1($password)."','".$gender."','".$date_of_birth."','".$user_image."','".$address."','Approved','Active')";
						$result= mysqli_query($this->conn,$query);
						if ($result) {
							$this->send_email($email,"Account Status","Congratulations Your Account Is Activated By Admin");
							header("location:../admin/create_user.php?message=User Registered Successfully");
							
						}
						else{
							header("location:../admin/create_user.php?message=User Registeration Failed");

						}
					}
		
				else{
					$query="insert into user (first_name,last_name,email,password,gender,date_of_birth,user_image,address) values('".$first_name."','".$last_name."','".$email."','".sha1($password)."','".$gender."','".$date_of_birth."','".$user_image."','".$address."')";
					$result= mysqli_query($this->conn,$query);
					if ($result) {
						$this->send_email($email,"Account Status","Congratulations Your Account Has Been Registered Successfully Wait For Admin Approval");

					header("location:../user/index.php?message=Registration SuccessFully");

					}
					else{
					header("location:../user/index.php?message=Registration Failed");

					}
				}

				
			}


			public function user_req($is_approved='Pending'){
				$query="select * from user where is_approved='".$is_approved."'";
				$result=mysqli_query($this->conn,$query);

				return $result;
			}

			public function update_user($column,$id){
					$query="UPDATE USER SET ".$column."WHERE user_id='".$id."'";
					$result=mysqli_query($this->conn,$query);
					return $result;
			}
			
			public function user_role($id){
				$query="select user.user_id,role.role_type from role,user where role.role_id=user.role_id AND user.user_id='".$id."'";
				$result=mysqli_query($this->conn,$query);
				$data=mysqli_fetch_assoc($result);
				return $data;
			}

			public function user($id){
				$query="select * from user where user_id='".$id."'";
				$result=mysqli_query($this->conn,$query);
				$data=mysqli_fetch_assoc($result);
				return $data;
			}



			public function count_data($id,$table,$column,$status)
			{
				$query="select COUNT(".$id.") AS 'record' from ".$table." WHERE ".$column."='".$status."'";
				$result=mysqli_query($this->conn,$query);
				$data=mysqli_fetch_assoc($result);
				return $data;
			}
			public function count($id,$table){
				$query="select COUNT(".$id.") AS 'record' from ".$table."";
				$result=mysqli_query($this->conn,$query);
				$data=mysqli_fetch_assoc($result);
				return $data;
			}

			public function insert_category($category_title,$category_description,$category_status){
				$query="INSERT INTO category (category_title,category_description,category_status) VALUES('".$category_title."','".$category_description."','".$category_status."')";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function insert_blog($user_id,$blog_title,$post_number,$background_image,$status){
				$query="INSERT INTO blog (user_id,blog_title,post_per_page,blog_background_image,blog_status)VALUES(".$user_id.",'".$blog_title."','".$post_number."','".$background_image."','".$status."')";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function select_query($table){
				$query="select * from ".$table."";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function select_category(){
				$query="SELECT * FROM category WHERE category_status='Active' ORDER BY category_id DESC";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}


			// $query="SELECT category.category_title,post.post_id,post.post_title,post.post_summary,post.post_description,post.post_status,blog.blog_title,user.first_name,user.last_name from blog,user,post,category,post_category
			// 	where blog.user_id=user.user_id and post.blog_id=blog.blog_id AND post_category.category_id=category.category_id ORDER BY post.post_id DESC;";
			public function fetch_post(){
				$query="SELECT category.category_title,post.post_id,post.post_title,post.post_summary,post.post_description,post.post_status,blog.blog_title,user.first_name,user.last_name from post
				inner join (blog)
				on(post.blog_id=blog.blog_id)
				inner join (user)
				on(blog.user_id=user.user_id)
				inner join (post_category)
				on(post_category.post_id=post.post_id)
				inner join (category)
				on(post_category.category_id=category.category_id)
				order by post.post_id desc";
				$result=mysqli_query($this->conn,$query);
				return $result;
			} 
			public function select_with_condition($table,$column){
				$query="select * from ".$table." WHERE ".$column."";
				$result=mysqli_query($this->conn,$query);
				if ($result->num_rows > 0) {
						return $result;
				}
				else{
					return false;
				}
			}

			public function fetch_query($table,$column,$status){
				$query="select * from ".$table." WHERE ".$column."= '".$status."'";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function insert_post($blog,$post_title,$post_summary,$post_description,$post_image,$post_show,$allow_comment,$category_id,$att_path,$att_name){
				$query="INSERT INTO post (blog_id,post_title,post_summary,post_description,featured_image,post_status,is_comment_allowed) VALUES (".$blog.",'".$post_title."','".htmlspecialchars($post_summary)."','".htmlspecialchars($post_description)."','".$post_image."','".$post_show."',".$allow_comment.")";
				
				$result=mysqli_query($this->conn,$query);
				$id=mysqli_insert_id($this->conn);
				
				$this->insert_post_category($id,$category_id);
				$this->insert_attachment($id,$att_path,$att_name);
				// return $result;
			}

			public function insert_post_category($post_id,$category_id){
				$query="INSERT INTO post_category(post_id,category_id) VALUES(".$post_id.",".$category_id.")";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function insert_attachment($post_id,$att_path,$att_name){
				$query="INSERT INTO post_atachment(post_id,post_attachment_title,post_attachment_path) VALUES('".$post_id."','".$att_name."','".$att_path."')";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			

			public function update_query($table,$column,$Condition,$id){
					$query="UPDATE ".$table." SET ".$column."WHERE ".$Condition."='".$id."'";
					$result=mysqli_query($this->conn,$query);
					return $result;
			}

			public function fetch_all_post(){
				$query="SELECT blog.blog_title,post.post_id,category.category_title,post.post_title,post.post_summary,post.post_description,post.featured_image,category.category_title FROM post
				INNER JOIN(post_category)
				ON post_category.post_id=post.post_id
				INNER JOIN(category)
				ON (post_category.category_id=category.category_id)
				INNER JOIN (blog)
				ON(post.blog_id=blog.blog_id)
				ORDER BY post.post_id DESC";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function select_category_post($category_id){
				$query="SELECT post.post_id,category.category_title,post.post_title,post.post_summary,post.post_description,post.featured_image,category.category_title FROM post
				INNER JOIN(post_category)
				ON post_category.post_id=post.post_id
				INNER JOIN(category)
				ON post_category.category_id=category.category_id
				WHERE post_category.category_id='".$category_id."' AND post.post_status='Active' ORDER BY post.post_id DESC";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function post_details($id){
				$query="SELECT user.user_id,user.first_name,user.user_image,user.last_name,blog.blog_title,blog.blog_background_image,blog.blog_id,post.post_id,post.post_title,post.post_summary,post.post_description,post.featured_image,post.created_at,post.is_comment_allowed,post_category.category_id FROM post
				INNER JOIN (blog)
				ON (post.blog_id=blog.blog_id)
				INNER JOIN (USER)
				ON(blog.user_id=user.user_id)
				INNER JOIN (post_category)
				ON(post_category.post_id=post.post_id)
				AND post.post_id='".$id."'";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function fetch_blog(){
				$query="SELECT blog.blog_id,blog.blog_background_image,blog.blog_status,blog.blog_title,
				blog.created_at,user.first_name,user.last_name FROM blog
				INNER JOIN (USER)
				ON(blog.user_id=user.user_id) 
				WHERE blog.blog_status='Active'ORDER BY blog.blog_id DESC";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function fetch_blog_information($id){
				$query="SELECT blog.blog_id,blog.blog_background_image,blog.blog_status,
				blog.blog_title,blog.created_at,user.first_name,user.last_name FROM blog
				INNER JOIN (USER)
				ON(blog.user_id=user.user_id) 
				AND blog.blog_id='".$id."'";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function blog_post($id){
				$query="SELECT blog.blog_id,blog.blog_title,blog.blog_background_image,post.post_title,post.post_id,post.post_description,post.post_summary,post.featured_image,post.is_comment_allowed,post.post_status FROM post
					INNER JOIN(blog)
					ON(post.blog_id=blog.blog_id)
					WHERE blog.blog_id='".$id."' AND post.post_status='Active' 
					ORDER BY post.post_id DESC";
					$result=mysqli_query($this->conn,$query);
					return $result;

			} 
			public function follow_blog($user_id,$blog_id){
				$query="INSERT INTO following_blog (follower_id,blog_following_id) VALUES('".$user_id."','".$blog_id."')";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function fetch_followers(){
				$query="SELECT user.first_name,user.last_name,blog.blog_title,following_blog.created_at from following_blog
				inner join(user)
				on(following_blog.follower_id=user.user_id)
				inner join(blog)
				on(following_blog.blog_following_id=blog.blog_id)
				order by following_blog.follow_id DESC";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function blog_followed($id){
				$query="SELECT following_blog.created_at,following_blog.follow_id,user.first_name,user.last_name,blog.blog_title ,following_blog.status FROM following_blog
				INNER JOIN(blog)
				ON(following_blog.blog_following_id=blog.blog_id)
				INNER JOIN(USER)
				ON(following_blog.follower_id=user.user_id)
				WHERE user.user_id='".$id."'";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function add_feedback($user_id=null, $user_name,$user_email,$feedback){
				$query="INSERT INTO user_feedback (user_id,user_name,user_email,feedback) VALUES('".$user_id."','".$user_name."','".$user_email."','".$feedback."')";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function fetch_feedback(){
				$query="SELECT * FROM user_feedback";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function	insert_comment($post_id,$user_id,$comment){
				$query="INSERT INTO post_comment (post_id,user_id,COMMENT,is_active)VALUES('".$post_id."','".$user_id."','".$comment."','Active')";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}
			public function comments(){
				$query="SELECT user.user_id,user.first_name,user.last_name ,user.user_image,
				post.post_title,post_comment.post_comment_id,post_comment.comment,post_comment.is_active FROM post_comment
				INNER JOIN(post)
				ON(post_comment.post_id=post.post_id)
				INNER JOIN (USER)
				ON(post_comment.user_id=user.user_id)";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}

			public function fetch_comment($id){
				$query="SELECT user.user_id,user.first_name,user.last_name ,user.user_image,
				post.post_title,post_comment.comment,post_comment.is_active FROM post_comment
				INNER JOIN(post)
				ON(post_comment.post_id=post.post_id)
				INNER JOIN (USER)
				ON(post_comment.user_id=user.user_id)
				WHERE post_comment.is_active='Active' AND post.post_id='".$id."'";
				$result=mysqli_query($this->conn,$query);
				return $result;
			}


	}




?>