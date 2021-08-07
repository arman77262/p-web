<?php 
    include_once 'inc/header.php';
    include_once 'inc/sidebar.php';
    include_once '../classes/Post.php';
    $post = new Post();
    include_once '../classes/Category.php';
    $ct = new Category();
    include_once '../classes/User.php';
    $us = new User();
?>
          
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Dashboard</h4>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="total-revenue-chart"></div>
                                        </div>
                                        <?php 
                                            $total_post = $post->totalPost();
                                            if ($total_post) {
                                            $allpost = mysqli_num_rows($total_post);
                                                ?>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$allpost?></span></h4>
                                            <p class="text-muted mb-0">Total Post</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i><?=$allpost?></span> since last week
                                        </p>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="orders-chart"> </div>
                                        </div>
                                      <?php 
                                          $total_cat = $ct->totalCategory();
                                            if ($total_cat) {
                                            $allcat = mysqli_num_rows($total_cat);
                                                ?>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$allcat?></span></h4>
                                            <p class="text-muted mb-0">Total Category</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i><?=$allcat?></span> since last week
                                        </p>
                                                <?php

                                            }
                                      ?>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="customers-chart"> </div>
                                        </div>

                                         <?php 
                                          $total_user = $us->totalUser();
                                            if ($total_user) {
                                            $allUs = mysqli_num_rows($total_user);
                                                ?>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$allUs?></span></h4>
                                            <p class="text-muted mb-0">Total User</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i><?=$allUs?></span> since last week
                                        </p>
                                                <?php 

                                            }

                                        ?>

                                        
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <!-- <div class="col-md-6 col-xl-3">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="growth-chart"></div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1">+ <span data-plugin="counterup">12.58</span>%</h4>
                                            <p class="text-muted mb-0">Growth</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>10.51%</span> since last week
                                        </p>
                                    </div>
                                </div>
                            </div> --> <!-- end col-->
                        </div> <!-- end row-->

                     


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


    <?php 
        include_once 'inc/footer.php';
    ?>