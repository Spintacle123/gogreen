<?php
  include 'config.php';
  include 'ad_action_product.php';

  error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>STC-Orders Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include("ad_header.php") ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("ad_sidebar.php") ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Refund SMS Notification</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="ad_index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="ad_orders.php">SMS Refund<a></li>
            </ol>
        </nav>
    </div><br>
    <section class="section">

          <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6" role="alert" style="padding: 8px; margin-left:auto">
              <b><?= $_SESSION['response']; ?></b>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button>
            </div>
          <?php } unset($_SESSION['response']); ?>
            
        <div class="row">

            
            <div class="card col-md-8 mx-auto"><br>
              <h5 class="text-center"><b>Refund SMS Notification</b></h5><br>

                <?php

                  // session_start();
                
                  require __DIR__ . '/vendor/autoload.php';

                  if(isset($_POST['mobile']) && isset($_POST['msg'])){

                    // use Twilio\Rest\Client;

                    $sid = 'ACe3486d30fe5d7ae60a5882659858cab8';
                    $token = '15da5664e9579ed92c42d066fac7e073';
                    
                    $client = new Twilio\Rest\Client($sid, $token);
                    
                    $message = $client->messages->create(
                        $_POST['mobile'],array(
                            'from' => '+18585446042',
                            'body' => $_POST['msg']
                        )
                    );

                    if($message){
                      echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6 mx-auto" role="alert" style="padding: 8px; text-align: center"> <p class="outputmsg">Message sent Successfully!</p> <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button></div>';
                    }
                    else{
                      echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6 mx-auto" role="alert" style="padding: 8px; text-align: center"> <p class="outputmsg">Message not sent, Something went wrong!</p> <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button></div>';
                    }
                  }
                ?>
                
                <form action="#" method="post">
                    <div class="dorm-group row">
                        <label><b>Receiver: </b> ex. +639916796899</label>
                        <div>
                            <input type="text" value="+63" class="form-control" name="mobile" pattern="[+ 0-9]{13}" required autofocus>
                        </div>
                    </div><br>

                    <div class="dorm-group row">
                        <label><b>Message</b></label>
                        <div>
                          <textarea class="form-control" id="myTextarea" name="msg" rows="3" required></textarea>
                        </div>
                    </div><br>

                    <div class="col-md-12 offset-md-12">
                        <div>
                            <input type="submit" value="Send" class="btn btn-primary" style="float: right"><br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        </div>
    </section>

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    <?php 
				$date = date('Y');
				echo '<p class="copyright">Copyright '.$date.' - All Rights Reserved</p>';
			?>
    </div>
    <div class="credits">
      <a href="https://www.facebook.com/streettaqueriacafe/?ref=page_internal">Street Taqueria and Cafe</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>

<script>
function myFunction() {
  document.getElementById("myTextarea").defaultValue = "From: ST@C: Hello <?= $cname; ?> your orders confirmed and ready to deliver. Thank you for Ordering!!";
}

function myFunction1() {
  document.getElementById("myTextarea").defaultValue = "From: ST@C: Hello <?= $cname; ?> I'm sorry we cannot accomodate your order for some reasons. Thank you for Ordering!!";
}
</script>
  
</body>

</html>