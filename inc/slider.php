<?php 
    include_once 'classes/Post.php';
    $post = new Post();
    include_once 'helpers/Format.php';
    $fr = new Format();
?>
<section class="site-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="owl-carousel owl-theme home-slider">
                <?php 
                    $slider_post = $post->sliderPost();
                    if ($slider_post) {
                        while ($row = mysqli_fetch_assoc($slider_post)) {
                            ?>
                    <div>
                        <a href="blog-single.php?singleId=<?=base64_encode($row['postId'])?>" class="a-block d-flex align-items-center height-lg" style="background-image: url(admin/<?=$row['imageOne']?>); ">
                            <div class="text half-to-full">
                                <span class="category mb-5"><?=$row['catName']?></span>
                                <div class="post-meta">

                                    <span class="author mr-2"><img src="admin/<?=$row['image']?>" alt="username"><?=$row['username']?> </span>&bullet;
                                    <span class="mr-2"><?=$fr->fromatdate($row['create_time'])?> </span> &bullet;
                                
                                </div>
                                <h3><?=$row['title']?></h3>
                                <p><?=$fr->textShorten($row['disOne'], 50)?></p>
                            </div>
                        </a>
                    </div>
                            <?php
                        }
                    }
                ?>
                    
                    
                    <!--  <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('images/img_2.jpg'); ">
                            <div class="text half-to-full">
                                <span class="category mb-5">Travel</span>
                                <div class="post-meta">

                                    <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                                </div>
                                <h3>How to Find the Video Games of Your Youth</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('images/img_3.jpg'); ">
                            <div class="text half-to-full">
                                <span class="category mb-5">Sports</span>
                                <div class="post-meta">

                                    <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet;
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>

                                </div>
                                <h3>How to Find the Video Games of Your Youth</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div> -->
                </div>

            </div>
        </div>

    </div>


</section>
<!-- END section -->