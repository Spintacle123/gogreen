<?php
  include 'action.php';

  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="css/cart11.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->
</head>
<body>

	<div class="header">
		<?php include("header.php") ?>
	</div>

<!------- cart items details ------->
	<div class="small-container cart-page">
		<table>
			<thead>
				<tr>
					<th>Product</th>
					<th>Name</th>
					<th><a href="action.php?clear=all" class="w3-badge w3-red" onclick="return confirm('Are you sure want to clear your cart?');">Action</a></th>
					<th>Quantity</th>
					<th>Total Price</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($_SESSION['ID'])) { ?>
					<?php
						require 'config.php';
						$query = 'SELECT * FROM cart where user_id = '.$_SESSION['ID'];
						$stmt = $conn->prepare($query);
						$stmt->execute();
						$result = $stmt->get_result();
						$grand_total = 0;
						while ($row = $result->fetch_assoc()):
					?>
					<tr>
						<td>
							<input type="hidden" class="cid" value="<?= $row['id'] ?>">
							<div class="cart-info">
								<img src="<?= $row['image'] ?>">
								<div>
									<!-- <p><?= $row['name'] ?></p> -->
									<small>Php: <?= number_format($row['price'],2); ?></small>
									<input type="hidden" class="cprice" value="<?= $row['price'] ?>">
								</div>
							</div>
						</td>
						<td>
							<p><?= $row['name'] ?></p>
						</td>
						<td><a href="action.php?remove=<?= $row['id'] ?>" onclick="return confirm('Are you sure want to remove this item?');"  style="background-color: white; color:black; padding: 10px; border-radius: .5rem;">Remove</a></td>
						<td><input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" ></td>
						<td><strong style="color:#fff">Php: </strong> <?= number_format($row['total'],2); ?></td>
					</tr>
					<?php $grand_total += $row['total']; ?>
					<?php endwhile; ?> 
				<?php } ?>
			</tbody>
		</table>

		<div class="total-price">
			<table>
				<?php if (!empty($_SESSION['ID'])) { ?>
					<tr>
						<td>Grand Total</td>
						<td><strong style="color:#fff">Php: </strong> <?= number_format($grand_total,2); ?></td>
					</tr>
					<!-- <tr>
						<td>Tax</td>
						<td>100.00</td>
					</tr>
					<tr>
						<td>Total</td>
						<td>100.00</td>
					</tr> -->
					<tr>
						<td><a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout &#8594;</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>


<!------- footer ------->
	<?php include("footer.php") ?>	

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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

<script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var cid = $el.find(".cid").val();
      var cprice = $el.find(".cprice").val();
      var quantity = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          quantity: quantity,
          cid: cid,
          cprice: cprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

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
</body>
</html>