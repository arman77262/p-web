<?php 
  include_once 'inc/header.php';
  include_once 'classes/SiteOption.php';
  $sop = new SiteOption();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adContact = $sop->addContact($_POST);
  }
?>

    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1>Contact Me</h1>
          </div>
        </div>

        

        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <span>
            <?php
            if (isset($adContact)) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $adContact ?>
                </div>
            <?php
            }
            ?>
        <span>
            <form action="#" method="post">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control ">
                </div>
                <div class="col-md-12 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control ">
                </div>
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control ">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
              </div>
            </form>
            

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