<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
?>
		<section class="">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-dark mb-4">Profile</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
              <form action="../require/process.php" method="POST" enctype="multipart/form-data">
              <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                      
                      <img src="<?= $_SESSION['user']['user_image'] ?? '../asset/user.jpg'?>" alt="" width="130" height="130" class="rounded-circle">
                

              </div>
              <div class="col-md-9 pe-5">

                <input class="form-control form-control-lg" id="formFileLg" type="file" name="profile" />
                <span>Change Profile</span>


              </div>
            </div>

            <hr class="mx-n3">
            
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">First Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg" value="<?= $_SESSION['user']['first_name']?>" name="first_name"/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Last Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg"  value="<?= $_SESSION['user']['last_name']?>" name="last_name"/>

              </div>
            </div>


            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Email</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="email" class="form-control form-control-lg"  value="<?= $_SESSION['user']['email']?>" name="email"/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Gender</h6>

              </div>
              <div class="col-md-9 pe-5">
                <?php
                  if ($_SESSION['user']['gender']=="Male") {
                    ?>
                      <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" checked> Male
                       <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault1"> Female
                  <?php
                  }
                  else{
                    ?>
                     <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" > Male
                      <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault1" checked> Female

                    <?php
                  }

                ?>
                   
    
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Date Of Birth</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="date" class="form-control form-control-lg"  value="<?= $_SESSION['user']['date_of_birth']?>" name="date_of_birth"/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Address</h6>

              </div>
              <div class="col-md-9 pe-5">

                <textarea name="address" class="form-control form-control-lg" id="" cols="75" rows="2" value="" ><?= $_SESSION['user']['address']?></textarea>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="update_user" value="<?= $_SESSION['user']['user_id']?>">Update</button>
            </div>

          </div>
        </div>
    </form>


      </div>
    </div>
  </div>
</section>




		</div>
    	</div>
	</div>
<?php
		include("../library/footer.php");
		
?>