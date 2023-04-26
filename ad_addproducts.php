<?php
  // include 'config.php';
  include 'ad_action_product.php';

  // error_reporting(0);
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
          <li class="breadcrumb-item"><a href="ad_index.php">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="ad_approved.transactions.php">Products<a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
          <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6" role="alert" style="padding: 8px; margin-left:auto">
              <b><?= $_SESSION['response']; ?></b>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button>
            </div>
          <?php } unset($_SESSION['response']); ?>

        <div class="card recent-sales overflow-auto">
            <?php
			        $query = 'SELECT * FROM products ORDER BY id DESC';
			        $stmt = $conn->prepare($query);
			        $stmt->execute();
			        $result = $stmt->get_result();
			      ?>
            <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="float: right">
              <i class="bi-plus-square"></i> New Products
            </button><br>
                    <table id="data-table" class="table">
                        <thead class="table-primary">
                            <tr>
                              <th scope="col">Product ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Price</th>
                              <th scope="col">Status</th>
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
                                  <td>
                                    <?php
                                      if($row["status"] == 1){
                                        echo '<a class="btn btn-sm btn-warning" href="ad_activeproduct_process.php?action=inactive&transaction_ID='.$row["id"]. '">Available</a>'; 
                                      }
                                      else{
                                        echo '<a class="btn btn-sm btn-danger" href="ad_activeproduct_process.php?action=active&transaction_ID='.$row["id"]. '">Not-available</a>';
                                      }
                                    ?>
                                  </td>
                                  <td> 
                                    <a href="ad_view_products.php?details=<?= $row['id']; ?>" type="button" class="btn btn-info" ><i class="bi bi-eye"></i></a>
                                    <a href="ad_edit_products.php?edit=<?= $row['id']; ?>" type="button" class="btn btn-success"><i class="bx bxs-edit"></i></a>
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

    <section class="section">
        <div class="col-lg-6">
          <div class="card">
              <!--Add Products Modal -->
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="card">
                        <div class="card-body ">

                        <a href="ad_addproducts.php" type="button" class="btn btn-danger" style="float: right;">
                        <i class="bx bx-x"></i></a>
                        
                          <h5 class="card-title">Add New Product</h5>

                        <!-- General Form Elements -->
                        <form action="ad_action_product.php" method="post"  enctype="multipart/form-data">
                            <div class="row mb-3">
                            <div class="row mb-3">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                
                                <label>Select Category: </label>
                                <div class="col-sm-12">
                                    <select name="class" value="<?= $class; ?>" class="form-select" aria-label="Default select example" required>
                                    <!-- <select id="class" class="form-select" aria-label="Default select example" required> -->
                                    <?php $sql_category = "SELECT * FROM categories"; ?>
                                    <?php $qry_category = mysqli_query($conn, $sql_category); ?>
                                    <?php while($get_category = mysqli_fetch_array($qry_category)) { ?>
                                      <option value="<?php echo $get_category["cat_name"] ?>"><?php echo $get_category["cat_name"] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-12">
                                <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Product Name" required>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-6 form_error" <?php if (isset($code_error)): ?> <?php endif ?> >
                                <input type="text" name="code" value="<?= $code; ?>" class="form-control" placeholder="Product Code" required>
                                <?php if (isset($code_error)): ?>
                                  <div><?php echo $code_error; ?></div>
                                <?php endif ?>
                              </div>
                              <div class="col-sm-6">
                                <input type="text" name="prod_qntty" value="<?= $prod_qntty; ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g,'')" placeholder="Quantity" required>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="col-sm-6">
                                <input type="text" name="price" value="<?= $price; ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g,'')" placeholder="Price" required>
                              </div>
                              <div class="col-sm-6">
                                <input type="text" name="capital" value="<?= $capital; ?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g,'')" placeholder="Capital" required>
                              </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="file" name="images">
                            </div>
                            </div>

                            <div class="row mb-3">
                            <div class="col-sm-4">
                              <input type="submit" name="add" class="btn btn-primary" value="Add Product">
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