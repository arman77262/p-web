<?php
include_once 'inc/header.php';
include_once 'helpers/Format.php';
$fr = new Format();
include_once 'classes/Post.php';
$post = new Post();
include_once 'classes/Comment.php';
$cmt = new Comment();

include_once 'lib/Database.php';
$db = new Database;

if (isset($_GET['singleId'])) {
  $postId = base64_decode($_GET['singleId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment = $cmt->addComment($_POST);
}
?>

<section class="site-section py-lg">
  <div class="container">

    <div class="row blog-entries element-animate">

      <?php
      $getPost = $post->singlePost($postId);
      if ($getPost) {
        while ($row = mysqli_fetch_assoc($getPost)) {
      ?>
          <div class="col-md-12 col-lg-8 main-content">
            <img src="admin/<?= $row['imageOne'] ?>" alt="Image" class="img-fluid mb-5">
            <div class="post-meta">
              <span class="author mr-2"><img src="admin/<?= $row['image'] ?>" alt="Colorlib" class="mr-2"> <?= $row['username'] ?></span>&bullet;
              <span class="mr-2"><?= $fr->fromatdate($row['create_time']) ?> </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h1 class="mb-4"><?= $row['title'] ?></h1>
            <a class="category mb-5" href="#"><?= $row['catName'] ?></a>


            <div class="post-content-body">
              <p><?= $row['disOne'] ?></p>

              <div class="row mb-5">
                <div class="col-md-12 mb-4">
                  <img src="admin/<?= $row['imageTwo'] ?>" alt="Image placeholder" class="img-fluid">
                </div>
              </div>
              <p><?= $row['disTwo'] ?></p>

            </div>




            <div class="pt-5">
              <p>Categories: <a href="#"><?= $row['catName'] ?></a> Tags: <a href="#"><?= $row['tags'] ?></a></p>
            </div>


            <div class="pt-5">
              <h3 class="mb-5">Comments</h3>
            <?php 
              $pid = $row['postId'];
              $allcomment = $cmt->allComment($pid);
              if ($allcomment) {
                while ($crow = mysqli_fetch_assoc($allcomment)) {
                  ?>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?=$crow['name']?></h3>
                    <div class="meta"><?=$fr->fromatdate($row['create_time'])?></div>
                    <p><?=$crow['message']?></p>
                  </div>

                  <?php 
                    if ($crow['admin_reply']) {
                      ?>
                  <ul class="children">
                    <li class="comment">
                      <div class="vcard">
                        <img src="admin/<?=$crow['image']?>" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3><?=$crow['username']?></h3>
                        <div class="meta"><?=$crow['update_date']?></div>
                        <p><?=$crow['admin_reply']?></p>
                      </div>



                    </li>
                  </ul>
                      <?php
                    }
                  ?>

                  
                </li>


              </ul>
                  <?php
                }
              }
            ?>
              
              <!-- END comment-list -->

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>

                <span>
                  <?php
                  if (isset($comment)) {
                  ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?= $comment ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php
                  }
                  ?>
                  <span>

                    <form action="" method="POST" class="p-5 bg-light">

                      <input type="hidden" name="userId" class="form-control" id="name" value="<?=$row['userId']?>">

                      <input type="hidden" name="postId" class="form-control" id="name" value="<?=$row['postId']?>">
                      <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" class="form-control" id="name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" name="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" class="form-control" id="website">
                      </div>

                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Post Comment" class="btn btn-primary">
                      </div>

                    </form>
              </div>
            </div>

          </div>

      <?php
        }
      }
      ?>


      <!-- END main-content -->

      <?php

      include_once 'inc/sidebar.php';

      ?>
      <!-- END sidebar -->

    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-3 ">Related Post</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('images/img_2.jpg'); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">Lifestyle</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('images/img_3.jpg'); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">Travel</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('images/img_4.jpg'); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">Food</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
          </div>
        </a>
      </div>
    </div>
  </div>


</section>
<!-- END section -->

<?php
include_once 'inc/footer.php';
?>