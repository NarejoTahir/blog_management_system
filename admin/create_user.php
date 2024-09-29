<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
?>
<section class="">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-dark mb-4">Add User</h1>
        <form action="../require/process.php" method="post" enctype="multipart/form-data">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

              <div class="row align-items-center pt-4 pb-3">
                  <div class="col-md-3 ps-5">
                      
                      <img src="../asset/user.jpg" alt="choose Profile" width="30" height="30" class="rounded-circle">
                

              </div>
              <div class="col-md-9 pe-5">

                <input class="form-control form-control-lg" id="formFileLg" type="file" name="profile" required/>
                <span>Choose  Profile</span>


              </div>
            </div>

            <hr class="mx-n3">
            
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">First Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg" value="" name="first_name" required/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Last Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" class="form-control form-control-lg"  value="" name="last_name" required/>

              </div>
            </div>


            <hr class="mx-n3">

           


            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Email</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="email" class="form-control form-control-lg"  value="" name="email" required/>

              </div>
            </div>

            <hr class="mx-n3">

             <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Password</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="password" class="form-control form-control-lg" value="" name="password" required/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Gender</h6>

              </div>
              <div class="col-md-9 pe-5">
                <input class="form-check-input" type="radio" name="gender" value="male" id="" checked> Male
                   
                <input class="form-check-input" type="radio" name="gender" value="female" id=""> Female
    
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Date Of Birth</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="date" class="form-control form-control-lg"  value="" name="date_of_birth" required/>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Address</h6>

              </div>
              <div class="col-md-9 pe-5">

                <textarea name="address" class="form-control form-control-lg" id="" cols="75" rows="2" required></textarea>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="register">Add User</button>
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