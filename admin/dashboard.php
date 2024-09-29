<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
        $active_user=$ob->count_data("user_id","user","is_active","Active");
        $rejected_user=$ob->count_data("user_id","user","is_approved","Rejected");
        $pending_user=$ob->count_data("user_id","user","is_approved","Pending");
        $post=$ob->count_data("post_id","post","post_status","Active");
        $blog=$ob->count_data("blog_id","blog","blog_status","Active");
        $feedback=$ob->count("feedback_id","user_feedback");
        // $data=$ob->count_data("user_id","user","Active");
        // echo $data['record'];
        // die();
?>
	
		<div class="row ">
                 <div class="conatiner  col-sm-4 mb-5 mt-5">
                    <div class="card shadow w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Total User</h5>
                            <p class="card-text text-center h4"><?= $active_user['record'];?> Active User</p>
                            <a href="manage_user.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <div class="conatiner  col-sm-4 mb-5 mt-5">
                    <div class="card shadow w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Pending User</h5>
                            <p class="card-text text-center h4"><?= $pending_user['record'];?> Pending User</p>
                            <a href="user_request.php" class="btn btn-primary ">View</a>
                        </div>
                    </div>
                </div>

                <div class="conatiner  col-sm-4 mb-5 mt-5">
                    <div class="card shadow w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Rejected User</h5>
                            <p class="card-text text-center h4"><?= $rejected_user['record']?> Rejected User</p>
                            <a href="rejected_user.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
		</div>

		<div class="row ">
                 <div class="conatiner   col-sm-4 mb-5">
                    <div class="card shadow w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Total Post</h5>
                            <p class="card-text text-center h4"><?= $post['record']?> Active Post</p>
                            <a href="view_post.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <div class="conatiner  col-sm-4 mb-5">
                    <div class="card shadow w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Total Blog</h5>
                            <p class="card-text text-center h4"><?= $blog['record']?> Active Blog</p>
                            <a href="view_page.php" class="btn btn-primary ">View</a>
                        </div>
                    </div>
                </div>

                <div class="conatiner  col-sm-4 mb-5">
                    <div class="card shadow w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold">Feed Back</h5>
                            <p class="card-text text-center h4"><?= $feedback['record']?> feedback</p>
                            <a href="feedback.php" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>


            </div>



	
		

			</div>
    	</div>
	</div>

<?php
		include("../library/footer.php");
		
?>