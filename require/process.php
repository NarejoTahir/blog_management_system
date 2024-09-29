<?php

	require_once("database.php");
	require_once("database_credentials.php");
	include("forms.php");
	date_default_timezone_set("Asia/Karachi");
	// echo date("Y-M-D H:m:s",time());
	// die();

	$ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);
    
    if (isset($_POST['login'])) {
        $ob->login($_POST['email'],$_POST['password']);
    }

    elseif (isset($_POST['register'])) {
        

        $imagetype = strtolower(pathinfo($_FILES['profile']['name'],PATHINFO_EXTENSION));

        if (!($imagetype=="png" || $imagetype=="jpg" ||$imagetype=="jpeg")) {
			header("location:../user/register.php?message=Image Should Be png/jpg");
        	
        }
        else{

            $tmp_name 		= $_FILES['profile']['tmp_name'];
			$orignal_name 	= $_FILES['profile']['name'];
			$file_name 		= time()."_".$_FILES['profile']['name'];
			$path 			= "../profile_images/".$file_name;
            move_uploaded_file($tmp_name, $path);


        extract($_POST);
        $ob->insert($first_name,$last_name,$email,$password,$gender,$date_of_birth,$path,$address);
        }
    }
	elseif (isset($_REQUEST['change_password'])) {
		// echo "<pre>";
		// print_r($_REQUEST);
		// die;
		if ($_REQUEST['new_pass']=="" && $_REQUEST['confrim_pass']=="") {
			header("location:../admin/change_password.php?message=Enter Your New Password First");
		}
		elseif ($_REQUEST['new_pass']!== $_REQUEST['confrim_pass']) {
			header("location:../admin/change_password.php?message=Password Not Matched");
		}
		else{
			$result=$ob->update_user("password='".sha1($_REQUEST['new_pass'])."'",$_SESSION['user']['user_id']);
			if ($result) {
				header("location:../admin/change_password.php?message=Password Changed");
				
			}

		}
	}

	elseif (isset($_REQUEST['change_password_user'])) {
		// echo "<pre>";
		// print_r($_REQUEST);
		// die;
		if ($_REQUEST['new_pass']=="" && $_REQUEST['confrim_pass']=="") {
			header("location:../admin/change_password.php?message=Enter Your New Password First");
		}
		elseif ($_REQUEST['new_pass']!== $_REQUEST['confrim_pass']) {
			header("location:../admin/change_password.php?message=Password Not Matched");
		}
		else{
			$result=$ob->update_user("password='".sha1($_REQUEST['new_pass'])."'",$_SESSION['user']['user_id']);
			if ($result) {
				header("location:../user/change_password.php?message=Password Changed");
				
			}

		}
	}
    elseif(isset($_REQUEST['create_category'])){
		if (isset($_REQUEST['status'])) {
			$status=$_REQUEST['status'];
		}
		else{
			$status="InActive";
		}	
		$result=$ob->insert_category($_REQUEST['category_title'],$_REQUEST['category_description'],$status);
		if ($result) {
			header("location:../admin/create_category.php?message=Category Added Successfully ");
		}else{
			header("location:../admin/create_category.php?message=Category Can Not Be Add ");

		}
	}
	elseif(isset($_REQUEST['create_blog'])){
		$tmp_name 		= $_FILES['Blog_image']['tmp_name'];
		$orignal_name 	= $_FILES['Blog_image']['name'];
		$file_name 		= time()."_".$_FILES['Blog_image']['name'];
		$path 			= "../blog_images/".$file_name;
        move_uploaded_file($tmp_name, $path);

        if (isset($_REQUEST['status'])) {
			$status=$_REQUEST['status'];
		}
		else{
			$status='InActive';
		}	
		$result=$ob->insert_blog($_SESSION['user']['user_id'],$_REQUEST['blog_title'],$_REQUEST['post_number'],$path,$status);
		if ($result) {
			header("location:../admin/create_page.php?message=Blog Added Successfully ");
		}else{
			header("location:../admin/create_page.php?message=Blog Can Not Be Add ");

		}

	}

	elseif (isset($_REQUEST['create_post'])) {
		
		extract($_POST);
		$att_tmp_name 		= $_FILES['attachment_file']['tmp_name'];
		$att_orignal_name 	= $_FILES['attachment_file']['name'];
		$att_file_name 		= time()."_".$_FILES['attachment_file']['name'];
		$att_path 			= "../post_attachment/".$att_file_name;
        move_uploaded_file($att_tmp_name, $att_path);


		$tmp_name 		= $_FILES['post_images']['tmp_name'];
		$orignal_name 	= $_FILES['post_images']['name'];
		$file_name 		= time()."_".$_FILES['post_images']['name'];
		$path 			= "../post_images/".$file_name;
        move_uploaded_file($tmp_name, $path);
         if (isset($_REQUEST['post_show'])) {
			$status=$_REQUEST['post_show'];
		}
		else{
			$status='InActive';
		}
		 if (isset($_REQUEST['comment_allowed'])) {
			$comment_allow=$_REQUEST['comment_allowed'];
		}
		else{
			$comment_allow='0';
		}

		$result=$ob->insert_post($blog,$post_title,$post_summary,$post_description,$path,$status,$comment_allow,$category,$att_path,$post_attachment);
		if ($result) {
			header("location:../admin/create_post.php?message=Blog Added Successfully");
		}else{
			header("location:../admin/create_post.php?message=Blog Can Not Be Add ");

		}
	}

	elseif (isset($_POST['submit_comment'])) {
		extract($_POST);

		$result=$ob->insert_comment($post_id,$user_id,$comment);
		if ($result) {
			header("location:../user/read_more.php?message=Comment Posted Successfully&post_id=".$_REQUEST['post_id']);
		}
		else{
			header("location:../user/read_more.php?message=Comment did not Posted&post_id=".$_REQUEST['post_id']);
		}
	}

	elseif (isset($_POST['action']) && $_POST['action']=="check_email") {

		$result=$ob->select_with_condition("user","email='".$_POST['email']."'");



		if ($_POST['email']=="") {
			echo "Enter Your User Name";
		}

		elseif ($result) {
			$data=mysqli_fetch_assoc($result);
			if ($data['email']==$_POST['email']) {
				echo "Email_Verified";
				die;
			}
		}

		else{
			echo "User Name Not Found";
		}
	}

	elseif (isset($_POST['update_user'])) {
		extract($_POST);
		$tmp_name 		= $_FILES['profile']['tmp_name'];
		$orignal_name 	= $_FILES['profile']['name'];
		$file_name 		= time()."_".$_FILES['profile']['name'];
		$path 			= "../profile_images/".$file_name;
        move_uploaded_file($tmp_name, $path);

		$result=$ob->update_user("first_name='".$first_name."',last_name='".$last_name."',email='".$email."',gender='".$gender."',date_of_birth='".$date_of_birth."',user_image='".$path."',address='".$address."',updated_at='".time()."'",$update_user);
		if ($result) {
			header("location:../admin/profile.php?message=Profile Updated Succesfully");
		}
		else{
			header("location:../admin/profile.php?message=Profile Update Failed");
		}
	}

	elseif (isset($_POST['update_user_data'])) {
		extract($_POST);
		$tmp_name 		= $_FILES['profile']['tmp_name'];
		$orignal_name 	= $_FILES['profile']['name'];
		$file_name 		= time()."_".$_FILES['profile']['name'];
		$path 			= "../profile_images/".$file_name;
        move_uploaded_file($tmp_name, $path);

		$result=$ob->update_user("first_name='".$first_name."',last_name='".$last_name."',email='".$email."',gender='".$gender."',date_of_birth='".$date_of_birth."',user_image='".$path."',address='".$address."',updated_at='".time()."'",$update_user);
		if ($result) {
			header("location:../user/profile.php?message=Profile Updated Succesfully");
		}
		else{
			header("location:../user/profile.php?message=Profile Update Failed");
		}
	}

	elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="follow_blog"){
			
			$result=$ob->follow_blog($_REQUEST['user_id'],$_REQUEST['blog_id']);
			if ($result) {
				header("location:../user/blog.php?message=Blog Followed Succesfully");
			}
	}
	elseif (isset($_REQUEST['submit_feedback'])) {
		// echo "<pre>";
		// 	print_r($_REQUEST);
		// 	die();
			if (isset($_SESSION['user'])) {
				$user_id=$_SESSION['user']['user_id'];
			}
			else{
				$user_id=2;
			}
			$result=$ob->add_feedback($user_id, $_REQUEST['name'],$_REQUEST['mail'],$_REQUEST['feedback']);
			if ($result) {
				header("location:../user/feedback.php?message=Thank You For Feedback ");

			}
	}

	elseif (isset($_POST['update_category'])) {
		if (isset($_REQUEST['status'])) {
			$status=$_REQUEST['status'];
		}
		else{
			$status="InActive";
		}	
		$result=$ob->update_query("category","category_title='".$_REQUEST['category_title']."',category_description='".$_REQUEST['category_description']."',category_status='".$status."',updated_at='".time()."'","category_id",$_REQUEST['category_id']);
		if ($result) {
			header("location:../admin/create_category.php?message=Category Added Successfully ");
		}else{
			header("location:../admin/create_category.php?message=Category Can Not Be Add ");

		}
	}

	elseif (isset($_POST['update_blog'])) {
		$tmp_name 		= $_FILES['Blog_image']['tmp_name'];
		$orignal_name 	= $_FILES['Blog_image']['name'];
		$file_name 		= time()."_".$_FILES['Blog_image']['name'];
		$path 			= "../blog_images/".$file_name;
        move_uploaded_file($tmp_name, $path);

        if (isset($_REQUEST['status'])) {
			$status=$_REQUEST['status'];
		}
		else{
			$status='InActive';
		}	

		$result=$ob->update_query("blog","blog_title='".$_REQUEST['blog_title']."',post_per_page='".$_REQUEST['post_number']."',blog_background_image='".$path."',blog_status='".$status."',updated_at='".time()."'","blog_id",$_REQUEST['blog_id']);
		if ($result) {
			header("location:../admin/create_page.php?message=Blog Updated Successfully ");
		}else{
			header("location:../admin/create_page.php?message=Blog Can Not Be Add ");

		}
	}

	elseif (isset($_POST['update_post'])){ 
		extract($_POST);
		$tmp_name 		= $_FILES['post_images']['tmp_name'];
		$orignal_name 	= $_FILES['post_images']['name'];
		$file_name 		= time()."_".$_FILES['post_images']['name'];
		$path 			= "../post_images/".$file_name;
        move_uploaded_file($tmp_name, $path);
         if (isset($_REQUEST['post_show'])) {
			$status=$_REQUEST['post_show'];
		}
		else{
			$status='InActive';
		}
		 if (isset($_REQUEST['comment_allowed'])) {
			$comment_allow=$_REQUEST['comment_allowed'];
		}
		else{
			$comment_allow=0;
		}

		$result=$ob->update_query("post","post_title='".$post_title."',post_summary='".$post_summary."',post_description='".$post_description."',featured_image='".$path."',post_status='".$status."',is_comment_allowed='".$comment_allow."',updated_at='".time()."'","post_id",$post_id);

		$res=$ob->update_query("post_category","category_id='".$category."'","post_id",$post_id);
		if ($result) {
				header("location:../admin/create_post.php?message=Post Added Successfully");

			}
		else{
			header("location:../admin/create_post.php?message=Post Can Not Be Add ");
		}
	}


	else{
		header("location:../user/login.php?message=Kindly Login First");
	}




?>