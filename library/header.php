 <?php
    include("../require/database.php");
		include("../require/forms.php");

      $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);

      if ($ob->is_admin()) {
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog Management System</title>
    <!-- <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script> -->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../script/fun.js"> </script>



  

</head>
<body>

	<div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
    <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Blog Management System
  </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <div class="me-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0 ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1"><?= $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'];?></span>
          	<img src="<?= $_SESSION['user']['user_image'] ?? '../asset/user.jpg'?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
        </a>
         <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="../admin/profile.php">Profile...</a></li>
                        <li><a class="dropdown-item" href="../admin/change_password.php">Change Password...</a></li>
                        <li><a class="dropdown-item" href="#">Feed Back</a></li>
                       
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../user/logout.php">Sign out</a></li>
                    </ul>
         
        </li>

      </ul>

      </div>
  </nav>
 </div>

  <?php
    }
     else{
          header("location:../user/login.php?message=Kindly Login To your Account ");

      }
?>