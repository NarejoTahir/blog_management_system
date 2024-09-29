
<?php
		include("../library/user/header.php");
    
		
?>


<section class="vh-100 gradient-custom mb-5">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form action="../require/process.php" method="POST" enctype="multipart/form-data" onsubmit="return _submit()">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="firstName">First Name</label>
                    <input type="text" id="firstName" class="form-control form-control-lg" name="first_name" />
                    <span id="firstname_field"></span>

                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="lastName">Last Name</label>
                    <input type="text" id="lastName" class="form-control form-control-lg" name="last_Name" />
                    <span id="last_field"></span>

                  </div>

                </div>
              </div>

               <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control form-control-lg" name="email"/>
                    <span id="email_field"></span>

                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control form-control-lg" name="password"/>
                    <span id="password_field"></span>

                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div data-mdb-input-init class="form-outline datepicker w-100">
                    <label for="birthdayDate" class="form-label">Birthday</label>
                    <input type="date" class="form-control form-control-lg" id="birthday" name="dob"/>
                    <span id="birthday_field"></span>

                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male"
                      value="Male" checked />
                    <label class="form-check-label" for="male">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female"
                      value="Female" />
                    <label class="form-check-label" for="female">Female</label>
                  </div>

                    <span id="gender_field"></span>

                </div>
              </div>

              <div class="row">
                <div class="col-md-12 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="Profile">Profile Image</label>
                    <input type="file" id="profile_image" class="form-control form-control-lg" name="profile"/>
                    <span id="profile_pic"></span>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="address">Address</label>
                  	<textarea name="address" id="add" class="form-control form-control-lg" name="address"></textarea>
                    <span id="address_field"></span>
                  </div>

                </div>
              </div>
        

              <div class="mt-4 pt-2">
                <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Register" name="register"/>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

