<?php
  include 'config.php';
  include 'ad_action_product.php';
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
        <h1>Pending Orders</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="ad_orders.php">Pending Orders<a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- <section class="section">
            
        <div class="col-lg-6">
        <div class="card">
              <!-- Vertically centered Modal -->
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Order Details</h5>

                        <?php include("ad_view.details.php") ?>

                        <!-- <h4><b>Order ID : <?= $cid; ?></b></h4>
                        <h4><b>Products :</b> <?= $cproducts; ?></h4>
                        <h4><b>Total :</b> <?= $cprice; ?></h4>
                        <h4><b>Name :</b> <?= $cname; ?></h4>
                        <h4><b>Email :</b> <?= $cemail; ?></h4>
                        <h4><b>Phone :</b> <?= $cphone; ?></h4>
                        <h4><b>Address :</b> <?= $caddress; ?></h4>
                        <h4><b>Method :</b> <?= $cpmode; ?></h4>
                        <h4><b>Reciept :</b> <?= $cimage; ?></h4> -->
                            
                    </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

            </div>
          </div>
        </div>
    <!-- </section> -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

            <div class="card recent-sales overflow-auto">
                <?php
                        $query = 'SELECT * FROM orders WHERE status = 0 ORDER BY id DESC';
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    ?>
                <div class="card-body">
                    <table  id="data-table" class="table">
                        <thead style="background-color:#595959; color:white">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Products</th>
                                <th scope="col">Method</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['products']; ?></td>
                                    <td><?= $row['pmode']; ?></td>
                                    <td>Php: <?= number_format($row['amount_paid'],2); ?></td>
                                    <td>
                                        <!-- <a href="ad_orders.php?details2=<?= $row['id']; ?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                        <i class="bi bi-folder"></i></a> -->

                                        <a href="ad_view_pending.php?details2=<?= $row['id']; ?>" type="button" class="btn btn-info" data-bs-target="#verticalycentered">
                                        <i class="bi bi-eye"></i></a>

                                        <a class="btn btn-warning" href="ad_process.approve.php?action=approve&transaction_ID=<?php echo $row["id"] ?>">
                                        <i class="bi bi-check-circle"></i></a>

                                        <a class="btn btn-danger" href="ad_process.cancel.php?action=cancel&transaction_ID=<?php echo $row["id"] ?>">
                                        <i class="bi-slash-square"></i></a>
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
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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