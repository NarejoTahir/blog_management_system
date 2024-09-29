<div class="container-fluid ">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="../admin/Dashboard.php" class="nav-link align-middle px-0">
                            <i class="bi bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#submenu" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Blog</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="../admin/view_page.php" class="nav-link px-0"><i class="bi bi-view-list"></i> <span class="d-none d-sm-inline">View Blog</span> </a>
                            </li>
                            <li>
                                <a href="../admin/create_page.php" class="nav-link px-0"><i class="bi bi-plus"></i> <span class="d-none d-sm-inline">Add Blog</span></a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                       <a href="#" data-bs-toggle="collapse" data-bs-target="#categorymenu" class="nav-link align-middle px-0">
                            <i class="bi bi-bookmark"></i> <span class="ms-1 d-none d-sm-inline">Category</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="categorymenu" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="../admin/view_category.php" class="nav-link px-0"><i class="bi bi-view-list"></i> <span class="d-none d-sm-inline">View Category</span></a>
                            </li>
                            <li>
                                <a href="../admin/create_category.php" class="nav-link px-0"><i class="bi bi-plus"></i> <span class="d-none d-sm-inline">Add Category</span></a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item">
                       <a href="#" data-bs-toggle="collapse" data-bs-target="#blogmenu" class="nav-link align-middle px-0">
                            <i class="bi bi-stickies"></i> <span class="ms-1 d-none d-sm-inline">Post</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="blogmenu" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="../admin/view_post.php" class="nav-link px-0"><i class="bi bi-view-list"></i> <span class="d-none d-sm-inline">View Post</span></a>
                            </li>
                            <li>
                                <a href="../admin/create_post.php" class="nav-link px-0"><i class="bi bi-plus"></i> <span class="d-none d-sm-inline">Add Post</span></a>
                            </li>
                        </ul>
                     <li class="nav-item">
                        <a href="../admin/comment.php" class="nav-link align-middle px-0">
                            <i class="bi bi-chat-left-text"></i> <span class="ms-1 d-none d-sm-inline">Comments</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#usermenu" class="nav-link align-middle px-0">
                            <i class="bi bi-person-lines-fill"></i> <span class="ms-1 d-none d-sm-inline">Users</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1" id="usermenu" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="../admin/user_request.php" class="nav-link px-0"> <span class="d-none d-sm-inline">User Request</span></a>
                            </li>
                            <li class="w-100">
                                <a href="../admin/rejected_user.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Rejected User</span></a>
                            </li>
                           
                            <li>
                                <a href="../admin/manage_user.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Manage User</span></a>
                            </li>
                            <li>
                                <a href="../admin/create_user.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Add User</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="../admin/followers.php" class="nav-link align-middle px-0">
                            <i class="bi bi-chat-left-dots"></i> <span class="ms-1 d-none d-sm-inline">Followers</span>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="../admin/feedback.php" class="nav-link align-middle px-0">
                            <i class="bi bi-chat-left-dots"></i> <span class="ms-1 d-none d-sm-inline">FeedBack</span>
                        </a>
                    </li>
                </ul>
                <hr>


               
            </div>
        </div>
        <div class="col py-3">