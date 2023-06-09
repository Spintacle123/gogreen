<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Street Taqueria and Cafe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <br>
      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- End Blank Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="ad_orders.php">
          <i class="bi-clock-fill"></i>
          <span>Pending Orders</span>
        </a>
      </li>

      <!-- End Blank Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="ad_cancel.transactions.php">
          <i class="bi bi-slash-square-fill"></i>
          <span>Cancelled Orders</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="ad_approved.transactions.php">
          <i class="bi bi-collection-fill"></i>
          <span>Transactions</span>
        </a>
      </li>

      <?php if ($_SESSION['role' ] == "Admin") { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="ad_addproducts.php">
            <i class="bx bx-coffee-togo"></i>
            <span>Products</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="ad_inventory.php">
            <i class="bx bxs-archive"></i>
            <span>Inventory</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="ad_accounts.php">
            <i class="ri-user-settings-fill"></i>
            <span>Accounts</span>
          </a>
        </li>
      <?php } ?>

    </ul>

  </aside>
  <!-- End Sidebar-->
 

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

</body>

</html>