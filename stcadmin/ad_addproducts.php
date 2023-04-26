<?php
  include 'ad_action_product.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Products Management</title>
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
  * Author: BootstrapMade.comh
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
      <h1>Product Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="ad_approved.transactions.php">Products<a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="float: right">
              <i class="bi-plus-square"></i> New Products
            </button><br>

        <?php if(isset($_SESSION['response'])) { ?>
          <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show">
            <b><?= $_SESSION['response']; ?></b>
            <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button> -->
          </div>
        <?php } unset($_SESSION['response']); ?>

        <div class="col-lg-6">
          <div class="card">
              <!--Add Products Modal -->
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="card">
                        <div class="card-body ">

                        <a href="ad_addproducts.php" type="button" class="btn btn-secondary" style="float: right;">
                        <i class="bx bx-x"></i></a>

                        <?php if ($update == true) { ?>
                          <h5 class="card-title">Update Product Details</h5>
                        <?php } else { ?>
                          <h5 class="card-title">Add New Product</h5>
                        <?php } ?>

                        <!-- General Form Elements -->
                        <form action="ad_action_product.php" method="post"  enctype="multipart/form-data">
                            <div class="row mb-3">
                            <div class="row mb-3">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                
                                <label>Select Category: </label>
                                <div class="col-sm-12">
                                    <select name="class" value="<?= $class; ?>" class="form-select" aria-label="Default select example" required>
                                      <!-- <option selected>Select Category</option> -->
                                      <option value="STARTERS">STARTERS</option>
                                      <option value="LIGHT MEALS">LIGHT MEALS</option>
                                      <option value="RICE MEALS">RICE MEALS</option>
                                      <option value="CRAFT COFFEE">CRAFT COFFEE</option>
                                      <option value="NON COFFEE">NON COFFEE</option>
                                      <option value="MILKSHAKE">MILKSHAKE</option>
                                      <option value="AGUA PRESCA">AGUA PRESCA</option>
                                      <option value="CRAFT COCKTAILS">CRAFT COCKTAILS</option>
                                      <option value="DESSERT">DESSERT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="code" value="<?= $code; ?>" class="form-control" placeholder="Product Code" required>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Product Name" required>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="price" value="<?= $price; ?>" class="form-control" placeholder="Price" required>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-12">
                                <input type="text" name="capital" value="<?= $capital; ?>" class="form-control" placeholder="Capital" required>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="file" name="images" required>
                            </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-4">
                              <?php if ($update == true) { ?>
                                <input type="submit" name="update" class="btn btn-primary" value="Update Product">
                              <?php } else { ?>
                                <input type="submit" name="add" class="btn btn-primary" value="Add Product">
                              <?php } ?>
                            </div>
                            </div>
                            
                        </form><!-- End General Form Elements -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- EndAdd Products Modal-->     
            </div>
          </div>
        </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card recent-sales overflow-auto">
            <?php
			        $query = 'SELECT * FROM products ORDER BY id DESC';
			        $stmt = $conn->prepare($query);
			        $stmt->execute();
			        $result = $stmt->get_result();
			      ?>
            <div class="card-body">
                    <table id="data-table" class="table">
                        <thead style="background-color:#595959; color:white">
                            <tr>
                              <th scope="col">Product ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Price</th>
                              <th scope="col">Capital</th>
                              <!-- <th scope="col">Image</th> -->
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                  <td><?= $row['id']; ?></td>
                                  <td><?= $row['name']; ?></td>
                                  <td><?= $row['class']; ?></td>
                                  <td>Php: <?= number_format($row['price'],2); ?></td>
                                  <td>Php: <?= number_format($row['capital'],2); ?></td>
                                  <!-- <td><img src="<?= $row['image']; ?>" width="50"></td> -->
                                  <td> 
                                    <a href="ad_view_products.php?details=<?= $row['id']; ?>" type="button" class="btn btn-info" data-bs-target="#verticalycentered">
                                    <i class="bi bi-eye"></i></a>
                                    <a href="ad_edit_products.php?edit=<?= $row['id']; ?>" type="button" class="btn btn-success" data-bs-toggle="modal1" data-bs-target="#verticalycentered1"><i class="bx bxs-edit"></i></a>
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

  <!-- Template Main JS File
  <script src="assets/js/main.js"></script> -->

  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>

</body>

</html>