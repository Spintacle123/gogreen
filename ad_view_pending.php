<?php
  include 'config.php';

  error_reporting(0);

  if(isset($_GET['details2'])){
		$id=$_GET['details2'];
		$query="SELECT * FROM orders WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$cid=$row['id'];
		$cname=$row['name'];
		$cproducts=$row['products'];
		$cprice=$row['amount_paid'];
		$cname=$row['name'];
		$cemail=$row['email'];
		$cphone=$row['phone'];
		$caddress=$row['address'];
		$cpmode=$row['pmode'];
		$cdate_ord=$row['date_ord'];
		$cimage=$row['image'];
	}
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

  <style>
    .data {
      display: none;
    }
  </style>
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
            <li class="breadcrumb-item"><a href="ad_index.php">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="ad_orders.php">Pending Orders<a></li>
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
            <div class="card col-md-6">
                <div class="row">
                    <div class="card-body col-md-6"><br>
                        <a href="ad_orders.php" type="button" class="btn btn-primary" style="float: right;">
                        <i class="bx bxs-left-arrow-alt"></i></a>
                        <h5 class="text-center"><b><?= $cname; ?>'s Order Details</b></h5>
                        <br>
                        <h6><b>Order ID: <?= $cid; ?></b></h6>
                        <h6><b>Products:</b><br><b style="color: green"> <?= $cproducts; ?></b></h6>
                        <h6><b>Total: Php: </b> <?= number_format($cprice,2); ?></h6>
                        <h6><b>Payment Method:</b> <?= $cpmode; ?></h6>
                        <h6><b>Date Ordered:</b> <?= $cdate_ord; ?></h6>
                        <h6><b>Address:</b> <?= $caddress; ?></h6>
                        <h6><b>Phone:</b> <?= $cphone; ?></h6>
                    </div>

                    <div class="card-body col-md-6"><br><br>
                      <img src="<?= $cimage; ?>" width="140" style="border-radius: 1rem;">
                      <div class="form-group menu" style="position: absolute; right: 5px; bottom:10px;">
                          <select id="pmode" name="pmode" required style="background-color: #33ccff; padding: 5px; border-radius: 2rem">
                            <option value="" selected disabled>Select to Confirm/Cancel</option>
                            <option value="Confirm">Confirm</option>
                            <option value="Cancel">Cancel</option>
                          </select>
                        </div>
                    </div>
                </div>
            </div>

            
              <div class="card col-md-6"><br>
                <h5 class="text-center"><b>SMS Confirm Notification</b></h5><br>

                  <?php
                    session_start();
                    include 'config.php';
                  
                    require __DIR__ . '/vendor/autoload.php';

                    if(isset($_POST['mobile']) && isset($_POST['msg'])){

                      // use Twilio\Rest\Client;

                      $sid = 'AC90ff04023400cfd098a0185f153053eb';
                      $token = '9e42306460256848ccb4b6850831d71b';
                      
                      $client = new Twilio\Rest\Client($sid, $token);
                      
                      $message = $client->messages->create(
                          $_POST['mobile'],array(
                              'from' => '+16318889557',
                              'body' => $_POST['msg']
                          )
                      );

                      if($message){

                        if($_POST['con'] == 1){
                          $sql_approve = "UPDATE orders SET status = 1 WHERE id = ?";
                          if($approve_check = mysqli_prepare($conn, $sql_approve)) {
                            mysqli_stmt_bind_param($approve_check, "i", $id);
                            mysqli_stmt_execute($approve_check);

                            $query = "SELECT * FROM orders WHERE id = $id";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                      
                            while ($row = $result->fetch_assoc()) {
                              $str = $row['products'];
                              $newStr = explode("<br>", $str);
                      
                              preg_match_all('!\d+!', $str, $matches);
                              
                              for ($i=0; $i < count($newStr); $i++) {
                                $name = explode(" (", $newStr[$i]);
                                $query = "SELECT * FROM products WHERE name = '".$name[0]."'";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();
                                $result = $stmt->get_result();
                      
                                while ($row = $result->fetch_assoc()) {
                                  $qty=$row['prod_qntty'];
                                  $finalqty= $qty - $matches[0][$i];
                                  $sql_approve = "UPDATE products SET prod_qntty = $finalqty WHERE name = '".$name[0]."'";
                                  $qry_update_qty = mysqli_query($conn, $sql_approve);

                                  $qty1=$row['purchased'];
                                  $finalpur= $qty1 + $matches[0][$i];
                                  $sql_approve = "UPDATE products SET purchased = $finalpur WHERE name = '".$name[0]."'";
                                  $qry_update_pur = mysqli_query($conn, $sql_approve);
                                }

                                // while ($row = $result1->fetch_assoc()) {
                                //   $qty1=$row['purchased'];
                                //   $finalpur= $qty1 + $matches[0][$i];
                                //   $sql_approve = "UPDATE products SET purchased = $finalpur WHERE name = '".$name[0]."'";
                                //   $qry_update_pur = mysqli_query($conn, $sql_approve);
                                // }
                               
                              }
                             
                            }
                        
                            
                            $_SESSION['response']="Message sent and order's confirmed successfully!";
                            $_SESSION['res_type']="success";
                            echo "<script> location.href='ad_orders.php'; </script>";
                            
                            exit();
                          }
                        }else if($_POST['con'] == 2){
                          $sql_approve = "UPDATE orders SET status = 2 WHERE id = ?";
                          if($approve_check = mysqli_prepare($conn, $sql_approve)) {
                            mysqli_stmt_bind_param($approve_check, "i", $id);
                            // $id = $_GET["transaction_ID"];
                            mysqli_stmt_execute($approve_check);
                            $_SESSION['response']="Message sent and Order Cancelled Successfully!";
                            $_SESSION['res_type']="success";
                            echo "<script> location.href='ad_orders.php'; </script>";

                            exit();
                          }
                        }else{
                          exit();
                        }
                      }else{
                        // echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-12" role="alert" style="padding: 8px; text-align: center"> <p class="outputmsg">Message not sent, Something went wrong!</p> <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close" style="padding: 10px"></button></div>';
                        header("Location: ad_errorpage1.php?status=3");
                      }
                    }
                  ?>

                <div id="Confirm" class="data"> 
                  <form action="#" method="post">
                      <div class="dorm-group row">
                          <label><b>Receiver: </b><?= $cname; ?></label>
                          <div>
                              <input type="text" value="+63<?= $cphone; ?>" class="form-control" name="mobile" required autofocus>
                              <input type="hidden" value="1" class="form-control" name="con" required autofocus>
                          </div>
                      </div><br>

                      <div class="dorm-group row">
                          <label><b>Message</b></label>
                          <div>
                              <textarea class="form-control" name="msg" required>From: Go Green: Hello <?= $cname; ?> you're orders confirmed and ready to deliver. Thank you for Ordering!!</textarea>
                          </div>
                      </div><br>

                      <div class="col-md-12 offset-md-12">
                          <button type="submit"  class="btn btn-primary" style="float: right">Send</button>
                      </div>
                  </form>
                </div>

                <div id="Cancel" class="data"> 
                  <form action="#" method="post">
                      <div class="dorm-group row">
                          <label><b>Reciever: </b><?= $cname; ?></label>
                          <div>
                              <input type="text" value="+63<?= $cphone; ?>" class="form-control" name="mobile" required autofocus>
                              <input type="hidden" value="2" class="form-control" name="con" required autofocus>

                          </div>
                      </div><br>

                      <div class="dorm-group row">
                          <label><b>Message</b></label>
                          <div>
                              <textarea class="form-control" name="msg" required>From: Go Green: Hello <?= $cname; ?> I'm sorry we cannot accommodate your order for some reasons. Thank you for Ordering!!</textarea>
                          </div>
                      </div><br>

                      <div class="col-md-12 offset-md-12">
                          <button type="submit"  class="btn btn-primary" style="float: right">Send</button>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#pmode").on('change', function(){
        $(".data").hide();
        $("#" + $(this).val()).fadeIn(700);
      }).change();
    });
  </script>
  
</body>

</html>