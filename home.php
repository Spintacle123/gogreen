<?php
// session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/homestyle18.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- rating -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="header">
		<?php include("header.php") ?>
	</div>
	
	<div class="header">
		<div class="container">
			<div class="row">	
				<div class="col-2">
					<br>
					<h1 class="btn1">Welcome to <br> Go Green </h1>
					<p>Get all the benefits of electric at the price of gas.   For a limited time, save $500 on our CrossoverT while supplies last
            		<br>
					Premium power at a value price. From 4/24-4/30, save up to 30% on 60V tools..</p>
					
					<?php if (!empty($_SESSION['ID'])) { ?>
						<a href="products.php" class="btn">Explore now &#8594;</a>
					<?php }else{ ?>
                    	<a href="login.php" class="btn">Login</a>
                  	<?php } ?>
				</div>
				<div class="col-2">
					<img src="images/gg.png">
				</div>
			</div>
		</div>
	</div>

<!------- featured categories ------->
	<div class="categories">
		<div class="small-container">
			<h2 class="title">About Us</h2>
					<p style="color: black">Get all the benefits of electric at the price of gas.   For a limited time, save $500 on our CrossoverT while supplies last.
					<br>
            		<br>
					Premium power at a value price. From 4/24-4/30, save up to 30% on 60V tools.
					</p>
					<br>
					<br>
			<div class="row">
				<div class="col-3">
					<img src="images/tools4.jpg">
				</div>
				<div class="col-3">
					<img src="images/tools2.png">
				</div>
				<div class="col-3">
					<img src="images/tools3.jpg">
				</div>
			</div>
		</div>
	</div>


<!------- new arrivals product ------->
	<div class="small-container1">
		<br>
		<h2 class="title" style="color:#fff;">New Products to Serve</h2>
		<div class="row">
			<?php
		  			include 'config.php';
		  			$item = $conn->prepare('SELECT * FROM products order by ID DESC limit 4');
		  			$item->execute();
		  			$result = $item->get_result();
		  			while ($row = $result->fetch_assoc()):
  				?>
			<div class="col-4">
				<a href="product-details.php?product-details=<?= $row['id']; ?>">
				<img src="<?= $row['image'] ?>">
				<h4><?= $row['name'] ?></h4>
				<p><strong>Php: </strong> <?= $row['price'] ?></p>
			</a>
			</div>
			<?php endwhile; ?>
		</div>
	</div>


<!------- brands ------->
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
