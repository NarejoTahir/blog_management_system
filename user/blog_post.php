
<?php
    include("../library/user/header.php");
        if (isset($_REQUEST['blog_id'])) {
            $id=$_REQUEST['blog_id'];
        }
        else {
            $id=1;
        }
        $result=$ob->blog_post($id);
        if ($result->num_rows > 0) {
        $data=mysqli_fetch_assoc($result);

?>
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.pexels.com/photos/580151/pexels-photo-580151.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/265946/pexels-photo-265946.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/7263405/pexels-photo-7263405.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4"><?=$data['blog_title']?></h2>
                 <!-- Start Row Of A Single Column -->
                <?php
                    $result=$ob->blog_post($id);
                    
				
                    $counter=1;
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                
                        <div class="row">
                            <div class="col-md-12 mb-3 h-75" >
                                <div class="card shadow-lg">
                                    <img src="<?= $row['featured_image']?>" class="card-img-top" style="height:408px" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['post_title']?></h5>
                                        <p class="card-text"><?= substr($row['post_summary'],0,50)?></p>
                                        <a href="read_more.php?post_id=<?= $row['post_id']?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                <?php
                        if ($counter==2) {
                            break;
                        }
                        $counter++;
                    }
?>
                 <!-- End Row Of A Single Column  -->
                
            </div> <!--End Of Colum 8  -->
            
            
            
            <!--Start  Of Side Posts  -->
            <div class="col-md-4">
                <div class="sidebar">
                    <h3 class="mb-4">Latest Posts</h3>
                    
                     <?php
                    $counter=1;
                    while ($row=mysqli_fetch_assoc($result)) {
                        ?>
                    <div class="card mt-4 shadow-lg" style="width: 285px;">
                            <img src="<?= $row['featured_image']?>" class="card-img-top" alt="..." style="height:190px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['post_title']?></h5>
                                <p class="card-text"><?= substr($row['post_summary'],0,50)?>.</p>
                                <a href="read_more.php?post_id=<?= $row['post_id']?>" class="btn btn-primary">Read More</a>
                            </div>
                            </div>
                 <?php
                    if ($counter==3) {
                        break;
                    }
                    $counter++;
                }?>
                <!-- End of A Card of Side Posts -->
                </div>
            </div>
       
            <!-- End Of Side Posts -->
            
        </div>
    </div>

    <!-- End Of First Five Post Section  -->
    
    <!-- Start Of Cards -->
    <div class="container">
        <h2 class="mb-4">Posts</h2>
            <div class="row">
                <!-- this code is oF Loop -->
                <?php
                 while ($row=mysqli_fetch_assoc($result)) {
        
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?= $row['featured_image']?>" class="card-img-top" alt="..." style="height:190px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['post_title']?></h5>
                                <p class="card-text"><?= substr($row['post_summary'],0,50)?>.</p>
                                <a href="read_more.php?post_id=<?= $row['post_id']?>" class="btn btn-primary">Read More</a>
                            </div>
                    </div>
                </div>
                <?php
                }
                ?>

                <!-- loop End  -->
        </div>
    </div>
           
    


    <!-- End Of Cards -->

<?php

}
else {
    ?>
                        <div class="container">
                            
                            <div class="alert alert-danger mt-5" role="alert">
                                <h4 class="h6">No Post Avaible For This Blog</h4>
                                
                            </div>
                        </div>
                    <?php
				}

?>


<?php
    include("../library/user/footer.php");
?>