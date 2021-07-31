<?php

include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once '../classes/SiteOption.php';
$site = new SiteOption();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update_liks = $site->updateLinks($_POST);
}

?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">

                    <span>
                        <?php
                        if (isset($update_liks)) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?=$update_liks?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                    <span>

    <div class="card shadow">
        <h4 class="card-header">Social Liks</h4>
        <div class="card-body">
        
        <?php 
            $allSocial = $site->allSocial();
            if ($allSocial) {
                while ($row = mysqli_fetch_assoc($allSocial)) {
                   ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Twtter</label>
                    <input type="text" name="twtter" class="form-control" value="<?=$row['twtter']?>" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="<?=$row['facebook']?>" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="insta" class="form-control" value="<?=$row['insta']?>" />
                </div>

                 <div class="mb-3">
                    <label class="form-label">Youtube</label>
                    <input type="text" name="youtube" class="form-control" value="<?=$row['youtube']?>" />
                </div>


                <div>
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Update Social Links
                        </button>

                    </div>
                </div>
            </form>
                   <?php
                }
            }
        ?>
            
            

        </div>
    </div>
                </div> <!-- end col -->


            </div> <!-- end row -->

        </div>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>