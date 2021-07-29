<?php

include_once 'inc/header.php';
include_once 'inc/sidebar.php';

include_once '../classes/Category.php';
$ct = new Category();

include_once '../classes/Post.php';
$post = new Post();

if (isset($_GET['editPost'])) {
    $id = base64_decode($_GET['editPost']);
}

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_add = $post->EditPost($_POST, $_FILES, $id);
} 




?>


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-10">

                    <span>
                        <?php
                        if (isset($post_add)) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $post_add ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                    <span>

<div class="card shadow">
    <h4 class="card-header">Post Edit Form</h4>
    <div class="card-body">

    <?php
        $getPost = $post->getPostForEdit($id);
        if ($getPost) {
            while ($prow = mysqli_fetch_assoc($getPost)) {
                ?>
<form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Post Title</label>
                <input type="text" name="title" class="form-control" value="<?=$prow['title']?>" />
            </div>

            <div class="mb-3">
                <label class="form-label">Select Category</label>
                <div class="form-group">
                    <select class="form-select" name="catId" id="">
                        <option>Select</option>

                        <?php

                        $allCat = $ct->AllCategory();
                        if ($allCat) {
                            while ($row = mysqli_fetch_assoc($allCat)) {
                        ?>
                                <option <?=$prow['catId'] == $row['catId']? 'selected': ''?> value="<?= $row['catId'] ?>"><?= $row['catName'] ?></option>
                        <?php
                            }
                        }

                        ?>

                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Image One</label>
                <input type="file" name="imageOne" class="form-control" />
                <img src="<?=$prow['imageOne']?>" class="img-thumbnail" style="width: 200px;" alt="">
            </div>

            <div class="mb-3">
                <label class="form-label">Description One</label>
                <textarea name="disOne" id="classic-editor"><?=$prow['disOne']?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Image Two</label>
                <input type="file" name="imageTwo" class="form-control"/>
                <img src="<?=$prow['imageTwo']?>" class="img-thumbnail" style="width: 200px;" alt="">
            </div>

            <div class="mb-3">
                <label class="form-label">Description Two</label>
                <textarea name="disTwo" id="classic-editor_two"><?=$prow['disTwo']?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Post Type</label>
                <div>
                    <select class="form-select" name="postType">
                        <option>Select</option>
                        <?php 
                            if ($prow['postType'] == 1) {
                                ?>
                                <option selected value="1">Post</option>
                                <option value="2">Slider</option>
                                <?php
                            }else {
                                ?>
                                <option value="1">Post</option>
                                <option selected value="2">Slider</option>
                                <?php 
                            }
                        ?>

                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Tags</label>
                <input type="text" name="tags" class="form-control" value="<?=$prow['tags']?>" />
            </div>

            <div>
                <div>
                    <button type="submit" class="btn btn-danger waves-effect waves-light me-1">
                        Edit Post
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