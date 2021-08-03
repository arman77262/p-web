<?php

include_once 'inc/header.php';
include_once 'inc/slider.php';
include_once 'helpers/Format.php';
$fr = new Format();
include_once 'classes/Post.php';
$post = new Post();

?>


<section class="site-section py-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="mb-4">Latest Posts</h2>
      </div>
    </div>
    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">
        <div class="row">

          <?php
          
          $limit = 2;
          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          }else {
            $page = 1;
          }
          $offset = ($page - 1) * $limit;
          $getPost = $post->latestPost($offset, $limit);
          if ($getPost) {
            while ($row = mysqli_fetch_assoc($getPost)) {
          ?>
              <div class="col-md-6">
                <a href="blog-single.php?singleId=<?=base64_encode($row['postId'])?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                  <img src="admin/<?=$row['imageOne']?>" alt="Image placeholder">
                  <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="author mr-2"><img src="admin/<?=$row['image']?>" alt="U"> <?=$row['username']?></span>&bullet;
                      <span class="mr-2"><?=$fr->fromatdate($row['create_time'])?> </span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                    </div>
                    <h2><?=$row['title']?></h2>
                  </div>
                </a>
              </div>
          <?php
            }
          }
          ?>




        </div>

        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <nav aria-label="Page navigation" class="text-center">
              <?php 
                $num_page = $post->numPost();
                if ($num_page) {
                  $total_record = mysqli_num_rows($num_page);
                  $total_page = ceil($total_record / $limit);
                  ?>
              <ul class="pagination">
                <?php 
                  if ($page > 1) {
                    ?>
                  <li class="page-item"><a class="page-link" href="index.php?page=<?=$page - 1?>">&lt;</a></li>
                    <?php
                  }
                ?>
                
                <?php 
                  for ($i=1; $i <= $total_page ; $i++) { 
                    if ($i == $page) {
                      $active = 'active';
                    }else {
                      $active = '';
                    }
                    ?>
                  <li class="page-item <?=$active?>"><a class="page-link" href="index.php?page=<?=$i?>"><?=$i?></a></li>
                    <?php
                  }
                ?>
                
                <?php 
                  if ($total_page > $page) {
                    ?>
                  <li class="page-item"><a class="page-link" href="index.php?page=<?=$page + 1?>">&gt;</a></li>
                    <?php
                  }
                ?>
                
              </ul>
                  <?php
                }
              ?>
              
            </nav>
          </div>
        </div>






      </div>

      <!-- END main-content -->


      <!-- START sidebar -->

      <?php
      include_once 'inc/sidebar.php';
      ?>

      <!-- END sidebar -->

    </div>
  </div>
</section>

<?php
include_once 'inc/footer.php';
?>