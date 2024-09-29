

<?php
	require("../require/database.php");
	require_once("../require/database_credentials.php");
	require_once("../require/send_email.php");

	$ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);

        $email=new Email;

	if (isset($_POST["action"]) && $_POST["action"]=="show_data") {
            $result=$ob->user_req($is_approved='Pending');
                if ($result->num_rows) {
                      
            ?>				
    <?php
        if ($result=$ob->user_req()) {
            ?>
        <?php
            while ($row=mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['first_name']." ".$row['last_name']?></td>
                        <td><?= $row['email']?></td>
                        <td><?= $row['password']?></td>
                        <td><?= $row['gender']?></td>
                        <td><?= $row['date_of_birth']?></td>
                        <td><?= $row['address']?></td>
                        <td><?= $row['is_approved']?></td>
                        <td><button class="btn btn-success" onclick="approve_user(this)" value="<?= $row["user_id"];?>" >Approve</button><button class="btn btn-danger" onclick="reject_user(this)" value="<?= $row["user_id"];?>" >Reject</button></td>
                    </tr>

                <?php
            }


        ?>
       
            <?php
        }

    ?>
	</table>
									
    <?php
        }
    }
	else if(isset($_REQUEST['action']) && $_REQUEST['action']=="approve") {
        $data=$ob->user($_REQUEST['id']);
		$result=$ob->update_user("is_approved='Approved'",$_REQUEST['id']);
        if ($result) {
			$email->send_mail($data['email'],"Account Status CHanged","<p>Your Account Has Been Approved</p>");
            
        }
		
	}
	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="reject") {
        $data=$ob->user($_REQUEST['id']);
        $result=$ob->update_user("is_approved='Rejected'",$_REQUEST['id']);	
        if ($result) {
            $email->send_mail($data['email'],"Account Status CHanged","<p>Your Account Is Rejected</p>");
            
        }

	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="manage_user") {
		 if ($result=$ob->user_req("Approved")) {
            	while ($row=mysqli_fetch_assoc($result)) {
                	$role=$ob->user_role($row['user_id'])
                ?>
                    <tr>
                        <td><?= $row['first_name']." ".$row['last_name']?></td>
                        <td><?= $row['email']?></td>
                        <td><?= $row['gender']?></td>
                        <td><?= $row['date_of_birth']?></td>
                        <td><?= $row['address']?></td>
                        <td><?= $row['is_active']??"InActive"?></td>
                        <td><?= $role['role_type']?></td>
                        <?php
                            if ($role['role_type']=="user") {
                                ?>  
                                    <td><button class="btn btn-success" onclick="admin(this)" value="<?= $row["user_id"];?>">Admin</button></td>
                                <?php
                            }
                            else{
                                ?>  
                                <td><button class="btn btn-success" onclick="user(this)" value="<?= $row["user_id"];?>">User</button></td>
                                <?php
                            }
                            if ($row['is_active']=="Active") {
                                ?>
                                <td><button class="btn btn-danger" onclick="block(this)" value="<?= $row["user_id"];?>">In-Active</button></td>
                                <?php
                            }
                            else{
                                ?>
                                <td><button class="btn btn-success" onclick="us_block(this)" value="<?= $row["user_id"];?>">Active</button></td>
                                <?php
                            }
                        ?>

                        
                    </tr>

                <?php
            }

		}
        
	}


	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="admin") {
		$result=$ob->update_user("role_id='1'",$_REQUEST['id']);
			
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="user") {
		$result=$ob->update_user("role_id='2'",$_REQUEST['id']);
			
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="block") {
        $data=$ob->user($_REQUEST['id']);
		$result=$ob->update_user("is_active='InActive'",$_REQUEST['id']);	
        if($result){
            $email->send_mail($data['email'],"Account Status CHanged","<p>Your Account Is Temporary Blocked</p>");
        }
	}
	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="unblock") {
        $data=$ob->user($_REQUEST['id']);
        $result=$ob->update_user("is_active='Active'",$_REQUEST['id']);
         if($result){
            $email->send_mail($data['email'],"Account Status CHanged","<p>Your Account Is Un-Blocked</p>");
        }
	}
	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="show_blog") {
		
		 if ($result=$ob->select_query("blog")) {

			 while ($row=mysqli_fetch_assoc($result)) {
                $data=$ob->user($row['user_id'])
                ?>
                    <tr>
                        
                        <td><?= $row['blog_title']?></td>
                        <td><?= $row['post_per_page']?></td>
                        <td><?= $data['first_name']." ".$data['last_name']?></td>
                        <td><?= $row['blog_status']?></td>
                        
                        <?php
                        if ($row['blog_status']=="Active") {
                                ?>  
                                <td><button class="btn btn-danger" onclick="block_blog(this)" value="<?= $row["blog_id"];?>">In-Active</button></td>
                                <?php
                            }
                            else{
                                ?>
                                <td><button class="btn btn-success" onclick="unblock_blog(this)" value="<?= $row["blog_id"];?>">Active</button></td>
                                <?php
                            }
                            ?>
                        <td><a href="create_page.php?blog_id=<?= $row['blog_id']?>" class="btn btn-success">Edit</a></td>
                    </tr>

                <?php
            }

		 }

	}
    elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="check_password") {
        $data=$ob->user($_SESSION['user']['user_id']);
            if ($data['password']===sha1($_REQUEST['pass'])) {
                echo "Password Match";
            }
            else{
                echo "Invalid Password";
        }
    }
	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="block_blog") {
		$result=$ob->update_query("blog","blog_status='InActive'","blog_id",$_REQUEST['id']);	
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="unblock_blog") {
		$result=$ob->update_query("blog","blog_status='Active'","blog_id",$_REQUEST['id']);	
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="show_category") {
        if ($result=$ob->select_query("category")) {
            while ($row=mysqli_fetch_assoc($result)) {
                
                ?>
                    <tr>
                        
                        <td><?= $row['category_title']?></td>
                        <td><?= $row['created_at']?></td>
                        <td><?= $row['category_status']?></td>
                        
                        <?php
                        if ($row['category_status']=="Active") {
                                ?>  
                                <td><button class="btn btn-danger" onclick="block_category(this)" value="<?= $row["category_id"];?>">In-Active</button></td>
                                <?php
                            }
                            else{
                                ?>
                                <td><button class="btn btn-success" onclick="unblock_category(this)" value="<?= $row["category_id"];?>">Active</button></td>
                                <?php
                            }
                            ?>
                        <td><a href="create_category.php?category_id=<?= $row['category_id']?>" class="btn btn-success">Edit</a></td>
                    </tr>

                <?php
            }


        }	
	
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="show") {
		$result=$ob->update_query("category","category_status='Active'","category_id",$_REQUEST['id']);
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="hide_category") {
		$result=$ob->update_query("category","category_status='InActive'","category_id",$_REQUEST['id']);

	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="view_post") {
		if ($result=$ob->fetch_post()) {
                    while ($data=mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $data['first_name']." ".$data['last_name']?></td>
                            <td><?= $data['post_title']?></td>
                            <td><?= $data['post_summary']?></td>
                            <td><?= $data['post_description']?></td>
							<td><?= $data['blog_title']?></td>
							<td><?= $data['category_title']?></td>
							<td><?= $data['post_status']?></td>
							 <?php
                       		 if ($data['post_status']=="Active") {
                                ?>  
                                <td><button class="btn btn-danger" onclick="block_post(this)" value="<?= $data["post_id"];?>">In-Active</button></td>
                                <?php
                            }
                            else{
                                ?>
                                <td><button class="btn btn-success" onclick="unblock_post(this)" value="<?= $data["post_id"];?>">Active</button></td>
                                <?php
                            }
                            ?>
                            <td><a href="create_post.php?post_id=<?= $data['post_id']?>" class="btn btn-success">Edit</a></td>
                            <!-- <td><a href="#" class="btn btn-danger p-1 m-2">Hide</a></td> -->
                            
                        </tr>
						<?php
                    }
                }
            
            
	}
	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="show_post") {
		$result=$ob->update_query("post","post_status='Active'","post_id",$_REQUEST['id']);
	}

	elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="hide_post") {
		$result=$ob->update_query("post","post_status='InActive'","post_id",$_REQUEST['id']);
		

	}
    elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="add_attachment") {
            $counter=$_REQUEST['count'];

            for ($i=0; $i<$counter ; $i++) { 
                
            
        ?>
                 <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                              
                            </div>
                            <div class="col-md-3">
                              <h6 class="mb-0">Attachment Title</h6>
                              <input type="text" class="form-control form-control-lg"   placeholder="Post Summary" name="post_attachment[]" value="" required/>
                              
                            </div>
                            <div class="col-md-6">
                              <h6 class="mb-0">Attachment File</h6>
                              <input type="file" class="form-control form-control-lg"   placeholder="Post Summary" name="attachment_file[]" value="" required/>
                              
                            </div>
                            </div>
                    
        <?php
            }
            $counter++;

    }

    elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="show_comment"){
        $result=$ob->comments();
        while ($row=mysqli_fetch_assoc($result)) {
            
            ?>
                <tr>
                    <td><?= $row['comment']?></td>
                    <td><?= $row['first_name']." ".$row['last_name']?></td>
                    <td><?= $row['post_title']?></td>
                    <td><?= $row['is_active']?></td>
                    
                    <?php
                        if($row['is_active']=="Active"){
                            ?>
                                <td><button class="btn btn-danger" value="<?= $row['post_comment_id']?>" onclick="comment_hide(this)">In-Active</button></td>
                            <?php
                        }
                        else{
                            ?>
                                <td><button class="btn btn-success" value="<?= $row['post_comment_id']?>" onclick="comment_show(this)">Active</button></td>
                            <?php
                        }
                    ?>
                </tr>

            <?php
        }
    }
    elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="comment_hide") {
        $ob->update_query("post_comment","is_active='InActive'","post_comment_id",$_REQUEST['id']);
    }
     elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="comment_show") {
        $ob->update_query("post_comment","is_active='Active'","post_comment_id",$_REQUEST['id']);
    }
	 elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="follow_data") {
        $result=$ob->blog_followed($_SESSION['user']['user_id']);
        
         while ($row=mysqli_fetch_assoc($result)) {
            
            ?>
                <tr>
                    <td><?= $row['first_name']." ". $row['last_name']?></td>
                    <td><?= $row['blog_title']?></td>
                    <td><?= $row['created_at']?></td>
                    <td><?= $row['status']?></td>
                    
                    
                    <?php
                        if($row['status']=="Followed"){
                            ?>
                                <td><button class="btn btn-danger" value="<?= $row['follow_id']?>" onclick="unfollow(this)">Un-Follow</button></td>
                            <?php
                        }
                        else{
                            ?>
                                <td><button class="btn btn-success" value="<?= $row['follow_id']?>" onclick="follow(this)">Follow</button></td>
                            <?php
                        }
                    ?>
                </tr>

            <?php
        }
    }
    elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="un_follow") {
        $ob->update_query("following_blog","status='Unfollowed'","follow_id",$_REQUEST['id']);
    }
    elseif (isset($_REQUEST['action']) && $_REQUEST['action']=="follow") {
        $ob->update_query("following_blog","status='followed'","follow_id",$_REQUEST['id']);
    }
    

	else{
		header("location:../user/login.php?message=kindly Login To Your Account");
	}


?>
