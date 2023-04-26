<?php
  include 'config.php';
  // include 'ad_action_accounts.php';

  if(isset($_GET['details2'])){
		$id=$_GET['details2'];
		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$cid=$row['id'];
		$cname=$row['name'];
		$cusername=$row['username'];
		$cemail=$row['email'];
		$cpassword=$row['password'];
		$cphone=$row['phone'];
		$caddress=$row['address'];
		$crole=$row['role'];
		$cimage=$row['image'];
		$cstatus=$row['status'];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>STC-Admin Accounts</title>
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
      <h1>View Account Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="ad_index.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="ad_accounts.php">Accounts<a></li>
          <li class="breadcrumb-item active">/ Account Details</li>
        </ol>
      </nav>
    </div><br>

    <section class="section">
            
        <div class="row">
            <div class="card col-md-8 mx-auto">
                <div class="row">
                    <div class="card-body col-md-7"><br>
                        <a href="ad_accounts.php" type="button" class="btn btn-primary" style="float: right;">
                        <i class="bx bxs-left-arrow-alt"></i></a>
                        <img src="<?= $cimage; ?>" width="120" class="rounded-circle" style="border-radius: 1rem; margin-left:115px; border: 5px solid grey"><br>
                        <h5 class="text-center"><b><?= $cname; ?></b></h5>
                        <br>
                        <h6><b>Username:</b> <?= $cusername; ?></h6>
                        <h6><b>Email:</b> <?= $cemail; ?></h6>
                        <h6><b>Phone:</b> <?= $cphone; ?></h6>
                        <h6><b>Address:</b> <?= $caddress; ?></h6>
                        <h6><b>Role:</b> <?= $crole; ?></h6>
                    </div>

                    <div class="card-body col-md-5" style="background-image: url('images/gg.png'); background-size: 100% 100%;">
                    </div>
                </div>
            </div>
            
        </div>


        </div>
    </section>

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include("ad_footer.php") ?>
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


  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
  
</body>

</html>