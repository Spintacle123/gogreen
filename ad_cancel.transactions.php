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

  <title>STC-Cancelled Orders</title>
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
        <h1>Cancelled Orders</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="ad_cancel_transactions.php">Cancelled Orders<a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card recent-sales overflow-auto">
            <?php
			        $query = 'SELECT * FROM orders WHERE status = 2 ORDER BY id DESC';
			        $stmt = $conn->prepare($query);
			        $stmt->execute();
			        $result = $stmt->get_result();
			      ?>
            <div class="card-body">
                <table  id="data-table" class="table">
                  <thead class="table-primary">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Products</th>
                      <th scope="col">Total</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $ctr = 0; ?>
                    <?php $sql_category = "
                      SELECT
                        ord.id,
                        ord.products,
                        ord.pmode,
                        ord.amount_paid,
                        prod.name,
                        us.username,
                        us.email
                      FROM orders AS ord
                      JOIN
                        users AS us ON ord.members_id = us.id
                      JOIN
                        products AS prod ON ord.capital_ID = prod.capital
                      JOIN 
                        products AS prod ON ord.products_id = prod.id
                      WHERE 
                        ord.status = 0 
                      "
                    ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <?php $ctr++; ?>
                    <tr>
                      <td><?= $row['id']; ?></td>
                      <td><?= $row['name']; ?></td>
                      <td><?= $row['products']; ?></td>
                      <td>Php: <?= number_format($row['amount_paid'],2); ?></td>
                      <td>
                        <p class="btn btn-danger btn-sm"><?php echo (($row["status"] == 1)? "Delivered" : "Canceled"); ?></p>
                      </td>
                      <td>
                        <a href="ad_view_cancelled.php?details2=<?= $row['id']; ?>" type="button" class="btn btn-info" data-bs-target="#verticalycentered">
                        <i class="bi bi-eye"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

            </div>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>2022</span></strong>. All Rights Reserved
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
  

</body>
</html>