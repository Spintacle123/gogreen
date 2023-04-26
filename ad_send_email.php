<?php
  include 'config.php';
  include 'ad_send_action.php';

  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Email Notification</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <h1>Email Notification</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="ad_index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#"> Email<a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

          <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6 mx-auto" role="alert" style="padding: 8px; margin-left:auto">
              <b><?= $_SESSION['response']; ?></b>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button>
            </div>
          <?php } unset($_SESSION['response']); ?>

        <div class="card col-md-8 mx-auto"><br>
          <div class="card-body ">
            <h3 class="card-title text-center">Sending Email Notification</h3>
            <p id="multi-responce"></p>
            <form action="bulk-email-sender/send.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6 mb-3">
                    <!-- <label for="sender_name" class="form-label">Sender Name:</label> -->
                    <input type="hidden" class="form-control" id="sender_name" name="sender_name" value="Street Taqueria and Cafe" placeholder="John Doe" required>
                    </div>
                    <div class="col-6 mb-3">
                    <!-- <label for="sender" class="form-label">Sender Email:</label> -->
                    <input type="hidden" class="form-control" id="sender" name="sender" value="streettaqueriaandcafe@gmail.com" placeholder="name@example.com" required>
                    </div>
                    <div class="col-6 mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="col-6 mb-3">
                    <label for="attachments" class="form-label">Attachments(Multiple):</label>
                    <input type="file" class="form-control" multiple id="attachments" name="attachments[]" placeholder="Attachments" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="recipient" class="form-label">Recipient Emails:</label>
                      <textarea class="form-control" id="recipient" name="recipient" required><?= $email; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Message:</label>
                    <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                </div>
                <div>
                    <button class="btn btn-danger" type="reset">Reset Form</button>
                    <button onclick="multi_email();" class="btn btn-primary me-2" name="send" type="submit" style="float: right;">Send Email</button>
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

  <script src="load.js" type="text/javascript"></script>

</body>

</html>