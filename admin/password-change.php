<?php


include_once '../classes/ChangePassword.php';
$cng = new ChangePassword();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ChangeP = $cng->changePass($_POST);
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Password Change</title>
</head>

<body>


    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">

                <span>

                    <?php
                    if (isset($ChangeP)) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $ChangeP ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>

                </span>

                <div class="card">
                    <h5 class="card-header">Password Change</h5>
                    <div class="card-body">
                        <form method="POST">

                            <input type="hidden" name="token" required class="form-control" value="<?php 
                                if(isset($_GET['token'])){
                                    echo $_GET['token'];
                                }
                            ?>">

                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" required class="form-control" value="<?php 
                                    if (isset($_GET['email'])) {
                                        echo $_GET['email'];
                                    }
                                ?>">
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="newpassword" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="c_password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-info w-100">Change Password</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>