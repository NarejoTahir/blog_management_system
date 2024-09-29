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
      <img src="https://images.pexels.com/photos/821754/pexels-photo-821754.jpeg?auto=compress&cs=tinysrgb&w=600" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
       <p>Let us take you into a deeper experience, make a moment a lasting conveyable memory. Let us help build your tribe..</p>
        <h5> Deep Immersion</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/265946/pexels-photo-265946.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <p>Website without visitors is like a ship lost in the horizon.”</p>
        <p>By: Dr. Christopher Dayagdag</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pexels.com/photos/7263405/pexels-photo-7263405.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="..." style="height: 400px;">
      <div class="carousel-caption d-none d-md-block">
        <p>Websites promote you 24/7: No employee will do that.</p>
                <p>By:  Paul Cookson</p>
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
                 <form class="contact-form bg-white rounded p-5" action="../require/process.php" method="POST" id="">
                <h4 class="mb-4">Send Message</h4>
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


                <textarea class="form-control  mt-3 mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Message"></textarea>

                <input class="btn  btn-primary btn-round-full" type="submit" name="submit_contact" id="submit_contact" value="Submit Message">
                </form>

            </div>

    </div>
</section>

<?php
	include("../library/user/footer.php");
	

?>