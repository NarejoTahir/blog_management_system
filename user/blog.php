<?php
    include("../library/user/header.php");

    $result=$ob->fetch_blog();
?>

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.pexels.com/photos/1591056/pexels-photo-1591056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tahir's Blogging Website</h5>
        <p>Website without visitors is like a ship lost in the horizon.”</p>
        <p>By: Dr. Christopher Dayagdag</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/265946/pexels-photo-265946.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <p>Websites promote you 24/7: No employee will do that.</p>
        <p>By:  Paul Cookson</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/7263405/pexels-photo-7263405.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
         <p>Let us take you into a deeper experience, make a moment a lasting conveyable memory. Let us help build your tribe..</p>
        <h5> Deep Immersion</h5>
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


<section class="section blog-wrap mt-5">
			    <div class="container">
			        <div class="row">
			        	<?php
			        			if ($result->num_rows > 0) {
			        						while ($row=mysqli_fetch_assoc($result)) {
			        					
			        								// echo "<pre>";
			        								// print_r($row);
			        								// die();
			        							
			        					?>

			        					<div class="col-lg-6 col-md-6 mb-5">
												<div class="blog-item">
												<img src="<?= $row['blog_background_image'];?>" alt="" class="img-fluid rounded" style="height: 430px;">

												<div class="blog-item-content bg-white p-5">
												<div class="blog-item-meta bg-gray py-1 px-2">
												<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>Post By: <?= $row['first_name']." ".$row['last_name'];?></span>
												
												<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>Post date: <?= $row['created_at'];?></span>
										</div> 

											<h3 class="mt-3 mb-3"><a href="blog_post.php?blog_id=<?= $row['blog_id']?>"><?= $row['blog_title'];?></a></h3>
											

											<a href="blog_post.php?blog_id=<?= $row['blog_id']?>" class="btn btn-primary">See More</a>
									</div>
							</div>
					</div>

						<?php
									}}
						?>
								


    </div>
</section>


			<?php

			include("../library/user/footer.php")

		?>