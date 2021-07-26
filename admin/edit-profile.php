<?php

include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once '../classes/Category.php';
$ct = new Category();

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update = $ct->updateUser($_POST, $_FILES, $uid);
}

?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">

                    <span>
                        <?php
                        if (isset($update)) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $update ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                        <span>

<div class="card shadow">
    <h4 class="card-header">Category Add Form</h4>
    <div class="card-body">

    <?php 
        $getUser = $ct->userInfo($uid);
        if ($getUser) {
            while ($urow = mysqli_fetch_assoc($getUser)) {
                ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" value="<?=$urow['username']?>" />
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="image">
                <img src="<?=$urow['image']?>" class="img-thumbnail" alt="">
            </div>


            <div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                        Update Profile
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