<?php
    include("../library/user/header.php");

    if (isset($_REQUEST['post_id'])) {
        $result=$ob->post_details($_REQUEST['post_id']);
        if ($result->num_rows > 0) {
        $data=mysqli_fetch_assoc($result);

        // echo "<pre>";
        // print_r($data);
        // die();
    
?>

    <div class="container mt-5 mb-4">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= $data['blog_background_image']?>" class="d-block w-100" style="height:500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/61135/pexels-photo-61135.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" style="height:500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/592753/pexels-photo-592753.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100"  style="height:500px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <?php
        if (isset($_SESSION['user'])) {
            if($ob->is_user()){
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 mt-2 mb-4 ">
                                <a href="../require/process.php?action=follow_blog&blog_id=<?= $data['blog_id']?>&user_id=<?= $_SESSION['user']['user_id']?>" class="btn btn-primary">FOllOW</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                      <div class="item">
                           <img src="<?=$data['featured_image']?>" alt="" class="img-fluid rounded" style="height:408px">

                            <div class="content bg-white p-5">
                            <span class="text-info">Author: <?=$data['first_name']." ".$data['last_name']?></span> 
                            <span class="text-info">Post Date: <?= $data['created_at']?></span> 

                            <h2 class="mt-3 mb-4 text-dark"><?= $data['post_title']?></h2>
                            <p class=" mb-4"><?= substr($data['post_description'],0,1000);?></p>

                            
                            <h3 class="quote"><?= $data['post_summary']?></h3>
                            
                            <p class=" mb-4 text-black"><?= substr($data['post_description'],1000);?></p>

                            
                            <div class="mt-5">
                                <ul class="float-left list-inline"> 
                                    <li>Attachments:</li> 
                                    <?php
                                        $res=$ob->select_with_condition('post_atachment',"post_id='".$_REQUEST['post_id']."'");
                                        if ($res) {
                                            
                                            $att=mysqli_fetch_assoc($res);
                                            ?>
                                            <li class="list-inline-item"><a href="<?= $att['post_attachment_path']?>" ><?= $att['post_attachment_title']?></a></li>
                                            
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <li class="list-inline-item">No Attachment For This Post</li>
                                            <?php
                                        }
                                    ?>
                                    
                                </ul>        
 
                            </div>
                        </div>
                    </div>
    </div>

    <?php
        if ($data['is_comment_allowed']==1) {
            ?>

    
    <div class="col-lg-12 mb-5">
        <div class="card border-1 p-5">
            <h4 class="mb-4">Comments</h4>
            <ul class="list-unstyled">
            <?php
                $result=$ob->fetch_comment($data['post_id']);
                
                
                if ($result->num_rows > 0) {
                    while($comments=mysqli_fetch_assoc($result)){
                            if (isset($_SESSION['user']) && ($comments['user_id']==$_SESSION['user']['user_id'])) {
                             ?>
                                <li class="mb-5" style="text-align:right;">
                                <?php
                                        }
                                    else{
                                        ?>
                                        <li class="mb-5" >
                                    <?php
                                    }
                                ?>

                                    <div class="user-box">
                                     <img alt="" src="<?= $comments['user_image']?>" class="img-thumbnail float-left mr-3 mt-2 rounded" style="width: 70px;">
                                    <h5 class="mb-1"><?= $comments['first_name']." ".$comments['last_name']?></h5>

                        

                                <div class="comment-content mt-3">
                                    <p><?= $comments['comment']?> </p>
                                </div>
                                </div>
                                </li>
                          <hr class="mx-n3">




                        <?php


                    }
                }

            ?>
            </ul>
        </div>
    </div>

    <?php
        if (isset($_SESSION['user'])) {
            ?>

    <div class="col-lg-12 ">
        <form class="contact-form bg-white rounded p-5" action="../require/process.php" method="POST">
                <h4 class="mb-4">Write a comment</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form">
                            <input type="hidden" name="post_id" value="<?= $data['post_id']?>">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id']?>">
                            <input class="form-control mt-3 mb-3" type="text" name="name" id="name" placeholder="Name:" value="<?= isset($_SESSION['user'])?$_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']:" "?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input class="form-control mt-3 mb-3" type="text" name="mail" id="mail" placeholder="Email:">
                        </div>
                    </div>
                </div>


                <textarea class="form-control  mt-3 mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
                <input type="hidden" name="post_id" value="<?= $_REQUEST['post_id']?>">
                <input class="btn  btn-primary btn-round-full" type="submit" name="submit_comment" id="submit_contact" value="Submit Message">
                <?php
                if (isset($_REQUEST['message'])) {
                    ?>
                        <span><?= $_REQUEST['message'];?></span>

                    <?php
                }
                ?>
                </form>
        </div>
        </div>
        </div>
        <?php
        }
          else {
            ?>
                     <div class="container">
                            
                            <div class="alert alert-danger mt-5" role="alert">
                                <h4 class="h6">Before Comment You Must Login To Your Account</h4>
                                
                            </div>
                        </div>

                        <!-- </div> -->
        </div>
        </div>
            <?php
          }
        }
        else {
            ?>
            
            </div>
        </div>

        <?php 
        }
        ?>

             <div class="col-lg-4">
                <div class="author_detail">
                    <div class="card border-0 mb-3">
                        <img src="<?= $data['user_image']?>" alt="" class="img-fluid" style="height:300px">
                        <div class="card-body p-4 text-center">
                            <h5 class="mb-0 mt-4"><?=$data['first_name']." ".$data['last_name']?></h5>
                            <p>Blogger</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>

            <ul class="list-inline">
                <li class="list-inline-item mr-3">
                    <a href="#"><i class="bi bi-facebook text-muted"></i></a>
                </li>
                <li class="list-inline-item mr-3">
                    <a href="#"><i class="bi bi-twitter-x text-muted"></i></a>
                </li>
                <li class="list-inline-item mr-3">
                    <a href="#"><i class="bi bi-linkedin text-muted"></i></a>
                </li>
                <li class="list-inline-item mr-3">
                    <a href="#"><i class="bi bi-whatsapp text-muted"></i></a>
                </li>
                <li class="list-inline-item mr-3">
                    <a href="#"><i class="bi bi-envelope text-muted"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Of Author Card  -->
          
    <!-- Start Of Latest Post -->
        <div class="card border-0 p-4 mb-3">
            <h5>Latest Posts</h5>
            <?php
                $result=$ob->select_category_post($data['category_id']);
                if ($result->num_rows > 0) {
                    
                $count=1;
                while ($row=mysqli_fetch_assoc($result)) {
                    ?>

                        <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $row['featured_image']?>" class="img-fluid rounded-start" alt="No Image" style="height:215px">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['post_title']?></h5>
                                    <p class="card-text"><?= substr($row['post_summary'],0,50)?></p>
                                    <a href="read_more.php?post_id=<?= $row['post_id']?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>


                    <?php
                    if ($count==3) {
                        break;
                    }
                    else {
                        $count++;
                    }
                }
            }
            else {
                echo "No Latest Post Yet";
            }
            ?>
            <!--  -->

           
    </div>
    <!-- End Of Latest Post -->



    </div>
    <!-- End Of Main Row -->
</div>


</div>
</div>

    <?php   
    }
}
else {
    ?>
                        <div class="container">
                            
                            <div class="alert alert-danger mt-5" role="alert">
                                <h4 class="h6">Data Not Found</h4>
                                
                            </div>
                        </div>
                    <?php
				}


    ?>

<?php
    include("../library/user/footer.php");
?>