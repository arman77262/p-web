<?php

include_once 'inc/header.php';
include_once 'inc/sidebar.php';
include_once '../classes/SiteOption.php';
$sop = new SiteOption();

include_once '../helpers/Format.php';
$fr = new Format();


if (isset($_GET['delCnt'])) {
    $id = $_GET['delCnt'];
    $deletePost = $sop->deleteContact($id);
} 


?>

<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=ahr'/>";
}
?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <span>
                        <?php
                        if (isset($deletePost)) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $deletePost ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                    <span>

                    

    <div class="card">
        <h5 class="card-header">All Post</h5>
        <div class="card-body">

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>

                    <?php
                    $allContact = $sop->allContact();
                    if ($allContact) {
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($allContact)) {
                            $i++;
                    ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $fr->textShorten($row['message'], 50) ?></td>
                                <td>
                                 
                                   <a href="?delCnt=<?=$row['contactId']?>" onclick="return confirm('Are You Sure To Delete')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                                   <a href="" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#myModal-<?=$row['contactId']?>"><i class="fas fa-eye"></i></a>

                             
                                   
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>



                </tbody>
            </table>

        </div>
    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
</div>


<?php 

$modelData = $sop->allContact();
if ($modelData) {
    while ($mrow = mysqli_fetch_assoc($modelData)) {
        ?>
<div id="myModal-<?=$mrow['contactId']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
    </div>
    <div class="modal-body">
        
        <table class="table table-bordered">
            <tr>
                <td><label for="">Name</label></td>
                <td><?=$mrow['name']?></td>
            </tr>
             <tr>
                <td><label for="">Email</label></td>
                <td><?=$mrow['email']?></td>
            </tr>
            <tr>
                <td><label for="">phone</label></td>
                <td><?=$mrow['phone']?></td>
            </tr>
           
            <tr>
                <td><label for="">Message</label></td>
                <td><?=$mrow['message']?></td>
            </tr>
            
        </table>
            
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
            <?php
        }
    }

?>

 



<?php include_once 'inc/footer.php'; ?>