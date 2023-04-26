<?php
  include 'action.php';
	require 'config.php';

  error_reporting(0);
  
	$grand_total = 0;
	$allItems = '';
	$items = [];
  $tcapital = 0;

	$sql = "SELECT CONCAT(name, ' (',quantity,') ') AS ItemQty, total, totalc FROM cart where user_id = ".$_SESSION['ID'];
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total'];
	  $tcapital += $row['totalc'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode('<br>', $items);

  $capital = 0;

  $x=$grand_total;  
  $y=$tcapital;  
  $profit=$grand_total-$tcapital; 

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="css/check17.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->

  <style>
    .data {
      display: none;
    }
  </style>
</head>

<body>
  <div class="header">
    <?php include("header.php") ?>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-checkout col-lg-6 px-4 pb-4" id="order">

          <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-12" role="alert" style="padding: 8px; margin-left:auto">
              <b style="color: yellow; text-align: center"><?= $_SESSION['response']; ?></b>
            </div>
          <?php } unset($_SESSION['response']); ?>

        <h2 class="text-center p-2">COMPLETE YOUR ORDER!</h2>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="" style="color: black; text-align:center"><strong>Products :</strong> <?= $allItems;?></h6>
          <!-- <h6 class="lead"><strong>Delivery Charge : </strong>Free</h6> -->
          <h6 style="color: black; text-align:center"><strong>Total Amount : </strong> Php: <?= number_format($grand_total,2) ?></h6>
        </div>
        <br>
        <form action="action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <input type="hidden" name="tcapital" value="<?= $tcapital; ?>">
          <input type="hidden" name="profit" value="<?= $profit; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name'] ?>" required>
          <!-- </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" required>
          </div> -->
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" value="<?php echo $_SESSION['phone'] ?>" required>
          </div>
          <div class="form-group">
            <input type="text" name="address" class="form-control" value="<?php echo $_SESSION['address'] ?>" required>
          </div>
          <!-- <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" value="<?php echo $_SESSION['address'] ?>" required></textarea>
          </div> -->
          
          <!-- <h3 class="text-center lead"><b>Select Payment Mode</b></h3> -->
          <div>
            <!-- <div class="form-group menu">
              <select name="pmode" class="form-control" required>
                <option value="" selected disabled>-Select Payment Mode-</option>
                <option value="GCash">GCash</option>
                <option value="COD">Cash On Delivery</option>
              </select>
            </div> -->

            <div class="form-group menu">
              <select id="pmode" name="pmode" class="form-control" required>
                <option value="" selected disabled>-Select Mode Payment-</option>
                <option value="GCash">GCash</option>
                <option value="COD">Cash On Delivery</option>
              </select>
            </div>

            <div class="form-group">
              <div id="GCash" class="data">
                <h6 style="text-align:center">Scan GCash QR Code</h6>
                <div  style="padding-left: 100px">
                  <img src="images/gcash.png" width="120" style="border-radius: 1rem;">
                  <span><img src="images/gclogo.png" width="140" height="120px" style="border-radius: 1rem;"></span>
                </div>
                <h6 class="text-center lead">Please put your reciept screenshot</h6>
                <input class="form-control" type="file" name="images" >
              </div>
              
              <div id="COD" class="data">
                <h6 style="text-align:center">Please pay after the delivery.</h6>
                <!-- <input type="hidden" name="images" value="images/gclogo.png"> -->
              </div>
            </div>

          </div>

          <br>
          <input type="hidden" name="user_id" class="form-control" value="<?php echo $_SESSION['ID'];?>">
          <?php if(!empty($_SESSION['ID'])) { ?>
            <div class="form-group">
              <input style="background-color: green; color: #fff;" type="submit" name="placeorder" value="Place Order" class="btn btn-block">
            </div>
          <?php } ?>
          <br>
        </form>
      </div>
    </div>
  </div>
  <br>
  <br>

  <!------- footer ------->
  <!-- <?php include("footer.php") ?> -->
 

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  
  <script type="text/javascript">
    $(document).ready(function() {

    //   // Sending Form data to the server
    //   $("#placeOrder").submit(function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //       url: 'action.php',
    //       method: 'post',
    //       data: $('form').serialize() + "&action=order",
    //       success: function(response) {
    //         $("#order").html(response);
    //       }
    //     });
    //   });

      // Load total no.of items added in the cart and display in the navbar
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-item").html(response);
          }
        });
      }
    });
  </script>

  <!------- js for toggle menu ------->
  <script type="text/javascript">
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle(){
      if(MenuItems.style.maxHeight == "0px"){
        MenuItems.style.maxHeight = "200px";
      }
      else{
        MenuItems.style.maxHeight = "0px";
      }
    }
  </script>

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