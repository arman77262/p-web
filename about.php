<?php
include_once 'inc/header.php';
include_once 'classes/SiteOption.php';
$sop = new SiteOption();
include_once 'helpers/Format.php';
$fr = new Format();
?>

<section class="site-section pt-5">
  <div class="container">

    <div class="row blog-entries">
      <div class="col-md-12 col-lg-8 main-content">

        <div class="row">
          <?php
          $allABout = $sop->aboutInfo();
          if ($allABout) {
            while ($arow = mysqli_fetch_assoc($allABout)) {
          ?>
              <div class="col-md-12">
                <h2 class="mb-4">Hi There! I'm <?= $arow['username'] ?></h2>
                <p class="mb-5"><img src="admin/<?= $arow['image'] ?>" alt="Image placeholder" class="img-fluid"></p>
                <p><?= $arow['userDetails'] ?></p>

              </div>
          <?php
            }
          }
          ?>

        </div>

        <div class="row mb-5 mt-5">
          <div class="col-md-12 mb-5">
            <h2>My Latest Posts</h2>
          </div>
          <div class="col-md-12">

            <?php
            $lestestPost = $sop->latestPost();
            if ($lestestPost) {
              while ($row = mysqli_fetch_assoc($lestestPost)) {
            ?>
              <div class="post-entry-horzontal">
                <a href="blog-single.html">
                  <div class="image" style="background-image: url(admin/<?=$row['imageOne']?>);"></div>
                  <span class="text">
                    <div class="post-meta">
                      <span class="author mr-2"><img src="admin/<?=$row['image']?>" alt="Colorlib"> <?=$row['username']?></span>&bullet;
                      <span class="mr-2"><?=$fr->fromatdate($row['create_time'])?> </span> &bullet;
                      
                    </div>
                    <h2><?=$row['title']?></h2>
                  </span>
                </a>
              </div>
              <!-- END post -->
            <?php
              }
            }
            ?>




          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center">
            <nav aria-label="Page navigation" class="text-center">
              <ul class="pagination">
                <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
              </ul>
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