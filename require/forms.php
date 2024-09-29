<?php
        
        
        class Forms{
          
          
          public function blog($id=false){
              $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);
              if ($id) {
                  $result=$ob->select_with_condition('blog',"blog_id='".$id."'");
                  $data=mysqli_fetch_assoc($result);

              }

            ?>

            <section class="">
                <div class="container h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">

                      <h1 class="text-dark mb-4"><?= isset($data['blog_id'])?"Update Blog Details":"Blog Details"?></h1>

                      <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                          <form action="../require/process.php" method="POST" enctype="multipart/form-data">
                          <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Blog Title</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                              <input type="text" class="form-control form-control-lg" placeholder="Blog Title" name="blog_title" value="<?= isset($data['blog_title'])?$data['blog_title']:" "?>" required />

                            </div>
                          </div>

                          <hr class="mx-n3">

                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Post Per Page</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                              <input type="number" class="form-control form-control-lg"  min="1" max="5" placeholder="1-5" name="post_number" value="<?= isset($data['post_per_page'])?$data['post_per_page']:" "?>" required/>

                            </div>
                          </div>
                          <hr class="mx-n3">


                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Blog Background Image</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                              <input class="form-control form-control-lg" id="formFileLg" type="file"  name="Blog_image" src="" required/>
                            
                                <input type="hidden" name="image_src" value="<?= $data['blog_background_image']?>">
                            </div>
                          </div>

                          <hr class="mx-n3">

                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Show Blog</h6>

                            </div>
                            <div class="col-md-9 pe-5">
                                
                                  <input class="form-check-input" type="checkbox" value="Active" id="flexCheckDefault" name="status">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Show Blog
                                  </label>
                            </div>
                          </div>

                          <hr class="mx-n3">

                          <div class="px-5 py-4">
                          <input type="hidden" name="blog_id" value="<?= $data['blog_id']?>">

                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="<?= isset($data['blog_id'])?"update_blog":"create_blog"?>"><?= isset($data['blog_id'])?"Update Blog":"Create Blog"?></button>
                          </div>

                        </form>
                        <?php
                                      if (isset($_GET['message'])) {
                                          ?>
                                          <div class="alert alert-success mt-5" role="alert">
                                                  <?php echo $_GET['message']; ?>
                                          </div>
                                          <?php
                                      }

                                  ?>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </section>





                    <?php

                      }


              
        public function category($id=false){
          $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);
               if ($id) {
                  $result=$ob->select_with_condition('category',"category_id='".$id."'");
                  $data=mysqli_fetch_assoc($result);

              }

              ?>
              <section class="">
                <div class="container h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">

                      <h1 class="text-dark mb-4"><?= isset($data['category_id'])?"Update Category Details":"Add Category Details"?></h1>

                          <div class="card" style="border-radius: 15px;">
                            <div class="card-body">
                              <form action="../require/process.php" method="POST">
                              <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                  <h6 class="mb-0">Category Title</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                  <input type="text" class="form-control form-control-lg" placeholder="Category Title" name="category_title" value="<?= isset($data['category_title'])?$data['category_title']:""?>" required />

                                </div>
                              </div>

                              <hr class="mx-n3">

                              
                              <div class="row align-items-center py-3">
                              <div class="col-md-3 ps-5">

                                <h6 class="mb-0">Category Discription</h6>

                              </div>
                              <div class="col-md-9 pe-5">

                                <textarea class="form-control" rows="3" placeholder="Describe Category " name="category_description" required><?= isset($data['category_description'])?trim($data['category_description']):" "?></textarea>
                                  </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                  <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Show Category</h6>
                                  </div>
                                  <div class="col-md-9 pe-5">
                                  <?php 
                                    if (isset($data['category_status']) && $data['category_status']=="Active") {
                                      ?>
                                          <input class="form-check-input" type="checkbox" value="Active" id="flexCheckDefault" name="status" checked>
                                          <label class="form-check-label" for="flexCheckDefault">
                                            Show Category
                                          </label>

                                      <?php
                                    }
                                    else{
                                      ?>
                                       <input class="form-check-input" type="checkbox" value="Active" id="flexCheckDefault" name="status">
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Show Category
                                      </label>
                                      <?php

                                    }
                                  ?>
                                 
                            </div>
                          </div>
            
                          <hr class="mx-n3">

                          <div class="px-5 py-4">
                          <input type="hidden" name="category_id" value="<?= $data['category_id']?>">

                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" name="<?= isset($data['category_id'])?"update_category":"create_category"?>" ><?= isset($data['category_id'])?"Update Category":"Create Category"?></button>
                          </div>
                            <?php
                                      if (isset($_GET['message'])) {
                            ?>
                            <div class="alert alert-success mt-5" role="alert">
                                     <?php echo $_GET['message']; ?>
                            </div>
                            <?php
                        }

                    ?>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </section>




              <?php
        }

        public function post($id=false){
          $ob=new database(HOSTNAME,USERNAME,PASSWORD,DATABASE);
              if ($id) {
                  $result=$ob->select_with_condition('post',"post_id='".$id."'");
                  $data=mysqli_fetch_assoc($result);
                  $res=$ob->fetch_query("post_category","post_id",$data['post_id']);
                  $post_cat=mysqli_fetch_assoc($res);

              }?>
              	<section class="">
                <div class="container h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">

                    <h1 class="text-dark mb-4"><?= isset($data['post_id'])?"Update Post Details":"Add Post Details"?></h1>
                    <div class="card" style="border-radius: 15px;">
                      <div class="card-body">
                        <form action="../require/process.php" method="POST" enctype="multipart/form-data">

                        <div class="row align-items-center pt-4 pb-3">
                          <div class="col-md-3 ps-5">

                            <h6 class="mb-0">Post Title</h6>

                          </div>
                          <div class="col-md-9 pe-5">

                            <input type="text" class="form-control form-control-lg" placeholder="Post Title" name="post_title" value="<?= isset($data['post_title'])?$data['post_title']:""?>" required/>

                          </div>
                          </div>

                          <hr class="mx-n3">

                          
                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Post Discription</h6>

                          </div>
                          <div class="col-md-9 pe-5">

                            <textarea class="form-control" rows="3" placeholder="Describe Post" name="post_description" required><?= isset($data['post_description'])?$data['post_description']:""?></textarea>
                          </div>
                        </div>

                      <hr class="mx-n3">

                      <div class="row align-items-center py-3">
                        <div class="col-md-3 ps-5"> 
                          <h6 class="mb-0">Choose Blog</h6>
                        <?php
                          $result=$ob->select_with_condition("blog","blog_status='Active' AND user_id=".$_SESSION['user']['user_id']);

                          if ($result->num_rows > 0) {
                         ?>

                            </div>
                            <div class="col-md-9 pe-5">

                              <select class="form-select" aria-label="Default select example" name="blog" required>
                              <option selected>Select Blog</option>
                              <?php
                                while ($blog_data=mysqli_fetch_assoc($result)) {
                                ?>
                                    <option value="<?= $blog_data['blog_id']?>"><?= $blog_data['blog_title']?></option>
                                <?php
                                }

                              ?>
                              </select>
                            <?php
                                }
                                else{
                                    ?>
                                      <div class="col-md-9 pe-5">

                                        <h6 class="mb-0">Create Blog </h6>
                                    </div>
                                </div>

                                    <?php
                                }

                              ?>  

                                </div>
                            </div>

                            <hr class="mx-n3">

                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5"> 
                            <?php
                              $result=$ob->fetch_query("category","category_status","Active");
                              
                              if ($result) {
                                
                                ?>
                                <h6 class="mb-0">Choose Category</h6>

                            </div>
                            <div class="col-md-9 pe-5">
                               
                              <select class="form-select" aria-label="Default select example" name="category">
                                <?php
                                  if (!isset($post_cat)){
                                    ?>
                                      <option selected>Select Category</option>

                                    <?php
                                  }
                                ?>
                              <?php
                                while ($category_data=mysqli_fetch_assoc($result)) {
                                  if ($post_cat['category_id']==$category_data['category_id']) {
                                      ?>
                                      <option value="<?= $category_data['category_id']?>" selected><?=$category_data['category_title']?></option>
                                        
                                      <?php
                                  }
                              
                                ?>
                                    <option value="<?= $category_data['category_id']?>"><?= $category_data['category_title']?></option>
                                <?php
                                }

                              ?>
                            </select>

             

                          <?php
                              }
                              else{
                                  ?>
                                    <h6 class="mb-0">Add Category First</h6>

                                  <?php
                              }

                            ?>  

                              </div>
                          </div>

                              

                          <hr class="mx-n3">

                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Post Summary</h6>

                            </div>
                            <div class="col-md-9 pe-5">
                              <input type="text" class="form-control form-control-lg"   placeholder="Post Summary" name="post_summary" value="<?= isset($data['post_summary'])?$data['post_summary']:" "?>" required/>

                            </div>
                          </div>

                          <hr class="mx-n3">


                          <div class="row align-items-center py-3" >
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Post Attachment</h6>

                            </div>
                          
                            <div class="col-md-3">
                              <h6 class="mb-0">Attachment Title</h6>
                              <input type="text" class="form-control form-control-lg"   placeholder="Attachment Title" name="post_attachment" value="" required/>
                              
                            </div>
                            <div class="col-md-6">
                              <h6 class="mb-0">Attachment File</h6>
                              <input type="file" class="form-control form-control-lg"   placeholder="Attachment File" name="attachment_file" value="" required/>
                              
                            </div>
                          
                            
                          </div>
                          

                          <hr class="mx-n3">

                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Featured Image</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                              <input type="file" class="form-control form-control-lg"   placeholder="Image" name="post_images" required/>

                            </div>
                          </div>
                          <hr class="mx-n3">

                          <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                              <h6 class="mb-0">Allow Comments</h6>

                            </div>
                            <div class="col-md-9 pe-5">
                    <!-- <div class="form-check"> -->
                              

                              <?php
                                if (isset($data['is_comment_allowed']) && $data['is_comment_allowed']==1) {
                                  ?>
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="comment_allowed" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Allow Comments
                                  </label>
                                  <?php
                                }
                                else{
                                  ?>

                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="comment_allowed">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Allow Comments
                                    </label>
                                  <?php
                                }
                              ?>
                        </div>
                      </div>
            
                      <hr class="mx-n3">

                      <div class="row align-items-center py-3">
                        <div class="col-md-3 ps-5">

                          <h6 class="mb-0">Show Post</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                    <!-- <div class="form-check"> -->
                              <?php
                                if (isset($data['post_status']) && $data['post_status']=="Active") {
                                  ?>
                                  <input class="form-check-input" type="checkbox" value="Active" id="flexCheckDefault" name="post_show" checked>
                                  <label class="form-check-label" for="flexCheckDefault">
                                   Show Post
                                  </label>
                                  <?php
                                }
                                else{
                                  ?>

                            <input class="form-check-input" type="checkbox" value="Active" id="flexCheckDefault" name="post_show">
                            <label class="form-check-label" for="flexCheckDefault">
                              Show Post
                            </label>
                                  <?php
                                }
                              ?>
                      </div>
                    </div>


                    <hr class="mx-n3">



                        <div class="px-5 py-4">
                          <input type="hidden" name="post_id" value="<?= isset($data['post_id'])?$data['post_id']:""?>">
                          <input type="submit" class="btn btn-primary"value="<?= isset($data['post_id'])?"Update Post":"Create Post"?>" name="<?= isset($data['post_id'])?"update_post":"create_post"?>">
                        </div>
                          </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </section>



              <?php
        }
            
                }

        // $obj=new Forms;

        // $obj->blog(1);

?>

  
