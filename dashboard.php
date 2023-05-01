<?php
  include 'action.php';
	// if(empty($_SESSION['ID'])){
	// 	header("location: index.php");
	// 	exit();
	// }

	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Transactions</title>
	<link rel="stylesheet" type="text/css" href="css/dash16.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,600;0,700;1,500;1,600;1,700&family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="height: 100vh">

	<div class="header">
		<?php include("header.php") ?>
	</div>

	
	<div class="small-container">
		<div class="row">
			<h2 style="font-weight: bold; color:#5bb343; margin-bottom: 40px">Booking History</h2>
			<div class="col-sm-12 text-end">
				<table  class="table table-striped">
					<thead>
						<tr style="font-weight: bold;border-bottom: 1px solid #c6c6c6">
							<td width="5%">Name</td>
							<td width="5%" style="text-align:center">Payment</td>
							<td width="5%">Products</td>
							<td width="5%">Amount Paid</td>
							<td width="5%"  style="text-align:center">Action</td>
							<td width="5%"  style="text-align:center">Status</td>
							<td width="5%"  style="text-align:right">Review</td>
						</tr>
					</thead>
					<tbody>
					<?php if (!empty($_SESSION['ID'])) { ?>
						<?php $ctr = 0; ?>
						<?php
							$query = 'SELECT * FROM orders where user_id = '.$_SESSION['ID'];
							$stmt = $conn->prepare($query);
							$stmt->execute();
							$result = $stmt->get_result();
						?>

						<?php while ($row = $result->fetch_assoc()) { ?>
						<?php $ctr++; ?>
						<tr>
							<td><?= $row['name']; ?></td>
							<td style="text-align: center;"><?= $row['pmode']; ?></td>
							<td><?= $row['products']; ?></td>
							<td><strong style="color:#000; align-text: right">$ </strong><?= number_format($row['amount_paid'],2); ?></td>
							<td style="text-align: center;">
									<?php
                                      if($row["status"] == 0){
										echo '<a class="btn btn-sm" style="background-color:yellow; padding: 3px 20px; border-radius: 2rem; color: black" href="ad_process.order.php?action=ordcancel&transaction_ID='.$row["id"]. '">Cancel</a>';
                                      }
									  else if ($row["status"] == 2){
										echo '<p class="outputmsg">Already Cancelled!</p>';
									  }
                                    ?>
							</td>
							<td style="text-align: center;">
								<?php
									if($row["status"] == 0){
										echo "Pending";
									}
									else if($row["status"] == 1){
										echo "Delivered";
									}
									else{
										echo "Cancelled";
									}
								?>
							</td>
							<td style="text-align: right;">
									<a href="review.php?details=<?= $row['id']; ?>" class="btn btn-sm" style="background-color:yellow; padding: 3px 20px; border-radius: 2rem; color: black">Reviews</a>
								
							</td>
						</tr>
						<tr>
							<td><?= $row['name']; ?></td>
							<td style="text-align: center;"><?= $row['pmode']; ?></td>
							<td><?= $row['products']; ?></td>
							<td><strong style="color:#000; align-text: right">$ </strong><?= number_format($row['amount_paid'],2); ?></td>
							<td style="text-align: center;">
									<?php
                                      if($row["status"] == 0){
										echo '<a class="btn btn-sm" style="background-color:yellow; padding: 3px 20px; border-radius: 2rem; color: black" href="ad_process.order.php?action=ordcancel&transaction_ID='.$row["id"]. '">Cancel</a>';
                                      }
									  else if ($row["status"] == 2){
										echo '<p class="outputmsg">Already Cancelled!</p>';
									  }
                                    ?>
							</td>
							<td style="text-align: center;">
								<?php
									if($row["status"] == 0){
										echo "Pending";
									}
									else if($row["status"] == 1){
										echo "Delivered";
									}
									else{
										echo "Cancelled";
									}
								?>
							</td>
							<td style="text-align: right;">
									<a href="review.php?details=<?= $row['id']; ?>" class="btn btn-sm" style="background-color:yellow; padding: 3px 20px; border-radius: 2rem; color: black">Reviews</a>
								
							</td>
						</tr>
						<?php } ?>
					<?php } ?>
					</tbody>
					<tfoot style="background-color: #fff; color: black; text-align:center">
						
							<tr >
								<td colspan="7" style="padding:20px 30px">Total transactions: 
								<?php if (!empty($_SESSION['ID'])) { ?>
									<?php echo $ctr; ?>
									<?php } ?>
								</td>
							</tr>
						
					</tfoot>
				
				</table>
			</div>
		</div>
	</div>

	<div>
		<!------- footer ------->
		<?php include("footer.php") ?>	
	</div>


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

<!------- js sorting ------->
<script type="text/javascript">
	$(document).ready(function(){
		$("#fetchval").on('change', function(){
			var value = $(this).val();
			//alert(value);

			$.ajax({
				url:"fetch.php",
				type:"POST",
				data:'request=' + value,
				success:function(data){
					$(".sort").html(data);
				}
			});
		});
	});
</script>

<script type="text/javascript">
  $(document).ready(function() {

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
<style>
	*{
		font-family: 'Josefin Sans', sans-serif !important;
	}

	.small-container > .row > div {
		width: 100%;
		display: flex;
		justify-content:center;
	}

	.small-container > .row > div > table {
		width: 80%;
	}

	.table > tbody >  tr > td,
	.table > thead >  tr > td  {
		padding: 20px 0px !important;
		border-bottom: 1px solid #c6c6c6;
	}
</style>

