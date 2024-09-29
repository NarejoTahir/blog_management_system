<?php
		include("../library/header.php");
		include("../library/sidebar.php");
		
?>
		<section class="">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <h1 class="text-dark mb-4">Change Password</h1>
        <form action="../require/process.php" method="post">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            
            
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Old Password</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="password" class="form-control form-control-lg" value="" name="" onfocusout="pass_check()" id="password"/>
                <span id="pass_msg" style="color:red; font-weight:bold;"></span>
              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">New Password</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="password" class="form-control form-control-lg"  name="new_pass" value="" />
                <span></span>


              </div>
            </div>
            <hr class="mx-n3">


             <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Confrim Password</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="password" class="form-control form-control-lg"  name="confrim_pass" value="" />
                <?php
                  if (isset($_GET['message'])) {
                    ?>
                      <span style="color:red; font-weight:bold;"><?= $_GET['message'];?></span>

                    <?php
                  }
                ?>


              </div>
            </div>




            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="change_password" id="btn_change">Change Password</button>
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