 <?php
    include("../library/user/header.php");

     
?>


	 <!-- Login Form -->
<section class="bg-light py-3 py-md-5 mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
                <img src="./asset/logo.png" alt="BootstrapBrain Logo" width="45" height="40"><label for="img" class="fs-20 fw-bold text-secondary p-2">Blog Management System</label>
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Login</h2>
            <form action="../require/process.php" method="POST" onsubmit="return login_submit()">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com" onfocusout="email_check()">
                    <label for="email" class="form-label">Email</label>
                    <span id="email_msg"></span>

                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" >
                    <label for="password" class="form-label" id="pass">Password</label>
                    <span id="password_msg"> </span>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex gap-2 justify-content-between">
                    <a href="#!" class="link-primary text-decoration-none">Forgot password?</a>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-primary btn-lg" type="submit" name="login" id="btn_login">Log in</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Don't have an account? <a href="register.php" class="link-primary text-decoration-none">Sign up</a></p>
                </div>
                    <?php
                        if (isset($_GET['message'])) {
                            ?>
                            <div class="alert alert-danger mt-5" role="alert">
                                     <?php echo $_GET['message']; ?>
                            </div>
                            <?php
                        }

                    ?>
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




      
<?php
    include("../library/user/footer.php");
?>
