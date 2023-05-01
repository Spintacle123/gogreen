<?php
include 'action.php';
include 'config.php';

error_reporting(0);

$query = "SELECT * FROM categories";
$result1 = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Menu</title>
	<link rel="stylesheet" type="text/css" href="css/prod17.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,600;0,700;1,500;1,600;1,700&family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="header">
		<?php include("header.php") ?>
	</div>

	<div class="small-container">
		<div class="row row-2">
			<h2 class="title">All Products</h2>

			<select name="fetchval" id="fetchval">
				<option value="" selected disabled>Categories</option>
				<?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
					<option> <?php echo $row1[1]; ?> </option>
				<?php endwhile; ?>
			</select>
		</div>

		<div class="sort">
			<div class="items">
				<?php

				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}

				$prod_per_page = 16;
				$start_from = ($page - 1) * $prod_per_page;

				// $item = $conn->prepare("SELECT * FROM products WHERE status = 1 order by rand() limit $start_from,$prod_per_page ");
				$item = $conn->prepare("SELECT products.*, sum(reviews.rating)/count(reviews.rating) as rating from products left join reviews on reviews.product_id = products.id group by products.id order by rand() limit $start_from,$prod_per_page ");
				$item->execute();
				$result = $item->get_result();
				while ($row = $result->fetch_assoc()) :
				?>
					<div class="card animate__animated animate__bounceInUp animate__delay-2s">
						<a href="product-details.php?product-details=<?= $row['id']; ?>">
							<?php if ($row['purchased'] == 0) { ?>
								<span class="label-new">New</span>
							<?php } ?>
							<img class="" src="<?= $row['image'] ?>">
							<p><?= $row['name'] ?></p>
							<span><strong>$ </strong> <?= $row['price'] ?> <span class="color: #c6c6c6; font-size: 11px">/day</span></span>

							<div class="ratings">
								<span>Rating</span>
								<div class="flex">
									<?php
									if ($row['rating']) {
										for ($i = 0; $i < round($row['rating']); $i++) {
											echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="main_star">
											<path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z" />
										</svg>';
										}
									} else {
										echo 'No Rating Found';
									}
									?>
								</div>
							</div>
						</a>
					</div>
				<?php endwhile; ?>

			</div>
		</div>
	</div>
	<br><br>
	<div class="page-btn">
		<!------- Pagination ------->
		<?php
		$pr_query = "select * from products";
		$pr_result = mysqli_query($conn, $pr_query);
		$total_record = mysqli_num_rows($pr_result);

		$total_pages = ceil($total_record / $prod_per_page);


		if ($page > 1) {
			echo "<a href='products.php?page=" . ($page - 1) . "'>&#129144</a>";
		}

		for ($i = 1; $i < $total_pages; $i++) {
			echo "<a href='products.php?page=" . $i . "'>$i</a>";
		}

		if ($i > $page) {
			echo "<a href='products.php?page=" . ($page + 1) . "'>&#129146</a>";
		}
		?>
	</div>
	</div>



	<!------- footer ------->
	<?php include("footer.php") ?>

	<!------- js for toggle menu ------->
	<script type="text/javascript">
		var MenuItems = document.getElementById("MenuItems");

		MenuItems.style.maxHeight = "0px";

		function menutoggle() {
			if (MenuItems.style.maxHeight == "0px") {
				MenuItems.style.maxHeight = "200px";
			} else {
				MenuItems.style.maxHeight = "0px";
			}
		}
	</script>

	<!------- js sorting ------->
	<script type="text/javascript">
		$(document).ready(function() {
			$("#fetchval").on('change', function() {
				var value = $(this).val();
				//alert(value);

				$.ajax({
					url: "fetch.php",
					type: "POST",
					data: 'request=' + value,
					success: function(data) {
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
	* {
		font-family: 'Josefin Sans', sans-serif !important;
	}

	.items {
		display: flex;
		gap: 10px;
		margin-top: 40px;
		flex-wrap: wrap;
		justify-content: space-evenly;
	}


	.items>div:nth-child(1)>div {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.items>div {
		width: calc(100% / 5);
	}

	.garden-items {
		display: flex;
		gap: 30px;
	}

	.items p {
		color: #a6a6a6 !important;
		font-size: 1.3rem;
	}

	.card>a>h4 {
		color: #000;
	}

	.card>a>span {
		font-size: 1.4rem;
		margin-top: 25px;
	}


	.card>a>p {
		font-size: 1rem;
		margin-top: 25px;
	}

	.card>a>img {
		max-width: 150px;
		height: 150px;
		align-self: center;
	}

	.card {
		transition: all 0.6s ease-in-out 0s;
		display: flex;
		justify-content: center;
		background-color: #fff;
		border-radius: 10px;
		padding: 20px 30px 10px 30px;
		border: 1px solid #f1f1f1;
	}

	.card:hover {
		transition: all;
		border: 2px solid #5bb343;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	.category {
		display: flex;
		justify-content: space-between;
		align-items: end;
	}

	.category>a {
		font-size: 1.3em;
		color: #009688;
	}

	.category>div>h3 {
		font-weight: bold;
		color: #5bb343;
	}

	.category>div>p {
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
</style>