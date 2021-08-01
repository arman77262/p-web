<?php

include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once '../classes/User.php';
$user = new User();

if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $update = $user->userUpdate($_POST, $_FILES, $id);
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
            <h4 class="card-header">User Profile Update Form</h4>
            <div class="card-body">

            <?php 
                $getData = $user->userInfo($id);
                if ($getData) {
                    while ($row = mysqli_fetch_assoc($getData)) {
                        ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" name="username" class="form-control" value="<?=$row['username']?>" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">User Photo</label>
                        <input type="file" name="image" class="form-control"/>
                        <img style="width: 200px;" src="<?=$row['image']?>" alt="" class="img-thumbnail">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">User Bio</label>
                        <textarea class="form-control" name="user_bio"></textarea>
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