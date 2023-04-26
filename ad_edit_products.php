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

  <title>STC-Update Products</title>
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
      <h1>Update Product Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="ad_index.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="ad_approved.transactions.php">Products<a></li>
          <li class="breadcrumb-item active">/ Update Product Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div>
                    <div class="card-body">
                        <a href="ad_addproducts.php" type="button" class="btn btn-info" style="float: right;">
                        <i class="bx bxs-left-arrow-alt"></i></a>
                        <br><br>
                        <form action="ad_action_product.php" method="post"  enctype="multipart/form-data">
                          <div class="row mb-3">
                            
                            <div class="row mb-3">
                              
                              <input type="hidden" name="id" value="<?= $id; ?>">

                                <div class="col-sm-4">
                                  <img src="<?= $image; ?>" width="130" height="135">
                                </div>
                                
                                <!-- <label>Select Category: </label> -->
                                <div class="col-sm-8">
                                  <label>Select Category: </label>
                                  <select name="class" value="<?= $class; ?>" class="form-select" aria-label="Default select example" required>
                                    <!-- <select id="class" class="form-select" aria-label="Default select example" required> -->
                                    <?php $sql_category = "SELECT * FROM categories"; ?>
                                    <?php $qry_category = mysqli_query($conn, $sql_category); ?>
                                    <?php while($get_category = mysqli_fetch_array($qry_category)) { ?>
                                      <option value="<?php echo $get_category["cat_name"] ?>"><?php echo $get_category["cat_name"] ?></option>
                                    <?php } ?>
                                    </select>

                                    <label>Product Name: </label>
                                    <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Product Name">
                                </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-6">
                                <label>Product Code: </label>
                                <input type="text" name="code" value="<?= $code; ?>" class="form-control" placeholder="Product Code">
                              </div>
                              
                              <div class="col-sm-6">
                                <label>Quantity: </label>
                                <input type="text" name="prod_qntty" value="<?= $prod_qntty; ?>" class="form-control" placeholder="Quantity">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-6">
                                <label>Product Price: </label>
                                <input type="text" name="price" value="<?= $price; ?>" class="form-control" placeholder="Price">
                              </div>
                              
                              <div class="col-sm-6">
                                <label>Product Capital: </label>
                                <input type="text" name="capital" value="<?= $capital; ?>" class="form-control" placeholder="Capital">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-12">
                                  <input class="form-control" type="file" name="images">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-4">
                                <input type="submit" name="update" class="btn btn-primary" value="Update Product">
                              </div>
                            </div>
                            
                        </form>
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