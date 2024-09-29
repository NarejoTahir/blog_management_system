<?php 
    require_once("../require/database.php");
    // require_once("../require/pdf.php");
      $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);

    $result=$ob->select_category();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../script/fun.js"> </script>
    <script src="../script/fun.js"></script>
    <style>
        
        .navbar-nav .nav-link:hover {
            background-color: #343a40 !important;
        }
        span{
            color:red;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Blog Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.php">Blog</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            while($data=mysqli_fetch_assoc($result)){
                                ?>
                                    <li><a class="dropdown-item" href="category_post.php?id=<?= $data['category_id']?>"><?= $data['category_title']?></a></li>

                                <?php
                            }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
                
            </ul>
               <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                            <ul class="navbar-nav ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"  href="#" id="navbaruser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <p class=" d-none d-sm-inline mx-1"><?= $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'];?></p>
          	                            <img src="<?= $_SESSION['user']['user_image'] ?? '../asset/user.jpg'?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbaruser">
                                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="change_password.php">change Password</a></li>
                                        <li><a class="dropdown-item" href="../require/pdf.php">Download Pdf</a></li>
                                        <li><a class="dropdown-item" href="follow_blog.php">Follow Blogs</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="logout.php">logout</a></li>
                                    </ul>
                                </li> 
                            </ul>
                        <?php
                    }
                    else{
                       
                            if (isset($_GET['page']) &&$_GET['page']==1) {
                                ?>
                                <button class="btn btn-outline-light" type="button"><a href="login.php?page=1" class="link-info text-decoration-none">Sign Up</a> </button>
                                <?php
                            }
                            else{
                                 ?>
                                <button class="btn btn-outline-light" type="button"><a href="login.php?page=1" class="link-info text-decoration-none">Login</a> </button>
                                <?php
                            }
            ?>

                        <?php
                    }
               ?>     
                   


                    
        
    
        </div>  
    </div>
</nav>
