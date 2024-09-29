<?php
	include("../library/user/header.php");
	
?>
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.pexels.com/photos/6610212/pexels-photo-6610212.jpeg?auto=compress&cs=tinysrgb&w=600" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Best Blog</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/265946/pexels-photo-265946.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Blog About Education</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/7263405/pexels-photo-7263405.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Belog About Sports</h5>
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

<section class="contact-form-wrap section mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 card border-1">
                 <form class="contact-form bg-white rounded p-5" id="" action="../require/process.php">
                <h4 class="mb-4">Feed Back</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form">
                            <input class="form-control mt-3 mb-3" type="text" name="name" id="name" placeholder="Name:">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input class="form-control mt-3 mb-3" type="text" name="mail" id="mail" placeholder="Email:">
                        </div>
                    </div>
                </div>


                <textarea class="form-control  mt-3 mb-3" name="feedback" id="feedback" cols="30" rows="5" placeholder="Feed Back"></textarea>

                <input class="btn  btn-primary btn-round-full" type="submit" name="submit_feedback" id="submit_contact" value="Submit">
                </form>

            </div>

    </div>
</section>

<?php
	include("../library/user/footer.php");
	

?>