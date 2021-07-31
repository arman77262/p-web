<?php

include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once '../classes/Comment.php';
$cmt = new Comment();
if (isset($_GET['replyCmt'])) {
    $cmtId = base64_decode($_GET['replyCmt']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $relpy = $_POST['relpy'];

    $cmtReply = $cmt->Addreply($relpy, $cmtId);
}

?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">

    <span>
        <?php
        if (isset($cmtReply)) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $cmtReply ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <span>

            <div class="card shadow">
                <h4 class="card-header">Reply Post Comment</h4>
                <div class="card-body">

                <?php 
                    $select_cmt = $cmt->commentSelect($cmtId);
                    if ($select_cmt) {
                        while ($row = mysqli_fetch_assoc($select_cmt)) {
                            ?>
                        <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Reply Message</label>
                            <textarea name="relpy" class="form-control"><?=$row['admin_reply']?></textarea>
                        </div>


                        <div>
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light me-1">
                                    Send Reply
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