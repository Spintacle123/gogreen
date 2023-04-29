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
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,600;0,700;1,500;1,600;1,700&family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>

	<div class="header">
		<?php include("header.php") ?>
	</div>
	
	<div class="header image-ad">
		<div class="row h-100">	
			<div class="col-lg-6 d-flex justify-content-between align-items-center">
				<h1>Quality tools <br> for quality work</h1>
				<p>Unlock the Full Potential of Your Renovation Project <br>
					with the Best-Quality Tools: Elevate Your Craftsmanship, Streamline Your Workflow, <br>
					and Achieve Unmatched Results that Stand the Test of Time!</p>
				
				<?php if (!empty($_SESSION['ID'])) { ?>
					<a href="products.php" class="btn">Explore now &#8594;</a>
				<?php }else{ ?>
					<a href="login.php" class="btn">Login</a>
				<?php } ?>
			</div>
			<div class="col-lg-6">
				<!-- <img src="images/gg.png"> -->
			</div>
		</div>
	</div>

	<div class="container">
		<div class="category">
			<div>
				<h3>GARDEN TOOLS</h3>
				<p>Our garden tools for hire are top-quality, built to last, and  meticulously maintained to ensure <br> optimal performance for every gardening task.</p>
			</div>
			<a href="products.php">SHOW MORE</a>
		</div>
		<div class="items">
			<?php
					include 'config.php';
					$item = $conn->prepare('SELECT * FROM products WHERE class = "Garden Tools" order by ID DESC limit 5');
					$item->execute();
					$result = $item->get_result();
					while ($row = $result->fetch_assoc()):
				?>
				<div class="card animate__animated animate__bounceInUp">
					<a href="product-details.php?product-details=<?= $row['id']; ?>">
						<?php if ($row['purchased'] == 0 ) { ?>
							<span class="label-new">New</span>
						<?php } ?>
						<img class="" src="<?= $row['image'] ?>">
						<p><?= $row['name'] ?></p>
						<span><strong>$ </strong> <?= $row['price'] ?></span>

						<div class="ratings">
							<span>Rating</span>
							<div class="flex">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>


	<div class="container animate__animated animate__bounceIn animate__delay-1s">
		<div class="ads-1"></div>
	</div>

	<div class="container">
	<div class="category">
			<div>
				<h3>CARPENTER TOOLS</h3>
				<p>Our garden tools for hire are top-quality, built to last, and  meticulously maintained to ensure <br> optimal performance for every gardening task.</p>
			</div>
			<a href="products.php">SHOW MORE</a>
		</div>
		<div class="items">
				<?php
						$i = 1;
						include 'config.php';
						$item = $conn->prepare('SELECT * FROM products WHERE class = "Carpentry Tools" order by ID DESC limit 5');
						$item->execute();
						$result = $item->get_result();
						while ($row = $result->fetch_assoc()): $i++
					?>
					<div class="card animate__animated animate__bounceInUp animate__delay-2s">
						<a href="product-details.php?product-details=<?= $row['id']; ?>">
							<?php if ($row['purchased'] == 0 ) { ?>
								<span class="label-new">New</span>
							<?php } ?>
							<img class="" src="<?= $row['image'] ?>">
							<p><?= $row['name'] ?></p>
							<span><strong>$ </strong> <?= $row['price'] ?></span>

							<div class="ratings">
								<span>Rating</span>
								<div class="flex">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
								</div>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
	</div>



<!------- new arrivals product ------->
	<!-- <div class="small-container1">
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
	</div> -->


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
<style>

body{
	background-color: #f5f5f5;
}
	
*, h3{
	font-family: 'Josefin Sans', sans-serif;
	color: #000;
}	

.image-ad{
	height: 75vh;
	background-image: url('./assets/img/main-ad.jpg') !important;
	background-position: center;
	background-size: cover;
}

.image-ad > div {
	height: 100%;
}

.image-ad > div > div > h1 {
	font-weight: bold;
	margin-top: 10rem;
	color: white;
	font-size: 5rem;
	line-height: 1em;
	font-family: 'Josefin Sans', sans-serif;
}

.image-ad > div > div > p{
	font-family: 'Josefin Sans', sans-serif;
	font-size: 1em;
	margin-top: 30px;
}

.image-ad > div > div > a {
	border-radius: 5px;
	font-size: 1.4rem;
	margin-left: 0px;
}

.container{
	padding-top: 100px;
	padding-bottom: 10px;
	/* padding: 70px 40px; */
}

.items {
	display: flex;
	gap: 20px;
	margin-top: 40px;
}


.items > div:nth-child(1) > div {
	display: flex;
	justify-content:center;
	align-items: center;
}

.items > div {
	width: calc(100% / 5);
}

.garden-items {
	display: flex;
	gap: 30px;
}

.items p{
	color: #a6a6a6 !important;
	font-size: 1.3rem;
}

.card > a > h4 {
	color: #000;
}

.card > a > span {
	font-size: 1.4rem;
	margin-top: 25px;
}


.card > a > p {
	font-size: 1rem;
	margin-top: 25px;
}

.card > a > img {
	max-width: 150px;
	height: 150px;
	align-self: center;
}

.card {
	display: flex;
	justify-content: center;
	background-color: #fff;
	border-radius: 10px;
	padding: 20px 30px 10px 30px;
	border: 1px solid #f1f1f1;
}

.category {
	display: flex;
	justify-content: space-between;
	align-items: end;
}

.category > a {
	 font-size: 1.3em;
	 color: #009688;
}

.category > div > h3{
	font-weight: bold;
	color: #5bb343;
}

.category > div > p{
	color: #998e8e;
}

.label-new {
	background-color: #5bb343;
	padding: 5px 15px;
	border-radius: 5px;
	color: #fff;
	font-size: 0.9em !important;
}

.ratings {
	padding-top: 7px;
	border-top: 1px solid #f1f1f1;
	margin-top: 20px;
}

.ads-1 {
	content: url('../img/ad.jpg');
	width: 100%;
	border-radius: 10px;
}


</style>
