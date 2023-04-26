<?php
  include 'action.php';
  
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product-Details</title>
	<link rel="stylesheet" type="text/css" href="css/pdet10.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->

	<script type="text/javascript">
		function sizesselect() {
			var s=document.getElementById("sizeselect");
			var selectedValue = s.options[s.selectedIndex].text;
			document.getElementById("sizevalue").value=selectedValue;
		}
	</script>
</head>
<body>

	<div class="header">
		<?php include("header.php") ?>
	</div>

<!------- single product details ------->
	<div class="small-container single-product">
		<div class="row">
			<div class="col-2 info1">
				<div class="message" id="message"></div>
				<br>
				<img src="<?= $dimage; ?>" id="ProductImg">
			</div>
			
			<div class="col-2 info2">		
				<h2><?= $dname; ?></h2>
				<h4>Php: <?= number_format($dprice,2); ?></h4>

				
				

				<h5>Product Quantity: <?= number_format($dprod_qntty,2); ?></h4>
				<form  class="form-submit">
					<span>Orders Quantity: <input type="number" value="1" class="cqty"></span>
						<?php if (!empty($_SESSION['ID'])) { ?>
							<input type="hidden" class="cuser_id" value="<?php echo $_SESSION['ID'];?>">
						<?php } ?>
				  	<input type="hidden" class="cid" value="<?= $did ?>">
					<input type="hidden" class="cimage1" value="<?= $dimage; ?>">
					<input type="hidden" class="cname" value="<?= $dname; ?>">
					<input type="hidden" class="cprice" value="<?= $dprice; ?>">
					<input type="hidden" class="ccapital" value="<?= $dcapital; ?>">
					<input type="hidden" class="ccode" value="<?= $dcode; ?>">
					<br>
					<?php if (empty($_SESSION['ID'])) { ?>
						<a href="login.php" class="btn">Book Tools </a>
					<?php }else{ ?>
						<button class="btn addItemBtn" >Book Tools</button>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>

<!------- More products ------->

	<div>
		
	</div>


<!------- products ------->
	<div class="small-container1">
		<div class="row row-2">
			<h2><b>More Products</b></h2>
			<a href="products.php"><b class="btn">View More</b></a>
		</div>
		<div class="row">
			<?php
	  			$item = $conn->prepare('SELECT * FROM products order by rand() limit 4');
	  			$item->execute();
	  			$result = $item->get_result();
	  			while ($row = $result->fetch_assoc()):
  			?>
			<div class="col-4">
				<a href="product-details.php?product-details=<?= $row['id']; ?>">
				<img src="<?= $row['image'] ?>">
				<h4><?= $row['name'] ?></h4>
				<p><strong>Php:</strong> <?= $row['price'] ?></p>
			</a>
			</div>
			<?php endwhile; ?>
		</div>	
	</div>

	<br>
		<a href="#top" style="background: #cc0000; color: #fff; padding: 10px; margin-left: 50px; text-decoration: none; border-radius: 2rem;">Back to top</a>
	<br><br>


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

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var cid = $form.find(".cid").val();
	  var cuser_id = $form.find(".cuser_id").val();
      var cimage1 = $form.find(".cimage1").val();
      var cname = $form.find(".cname").val();
      var cprice = $form.find(".cprice").val();
      var ccapital = $form.find(".ccapital").val();
      var ccode = $form.find(".ccode").val();
      var cqty = $form.find(".cqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          cid: cid,
		  cuser_id: cuser_id,
          cimage1: cimage1,
          cname: cname,
          cprice: cprice,
          ccapital: ccapital,
          ccode: ccode,
          cqty: cqty,
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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
