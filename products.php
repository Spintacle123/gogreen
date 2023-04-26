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
	<title>	Menu</title>
	<link rel="stylesheet" type="text/css" href="css/prod17.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->

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
				<?php while($row1 = mysqli_fetch_array($result1)):; ?>
				<option> <?php echo $row1[1]; ?> </option>
				<?php endwhile; ?>
			</select>
		</div>

		<div class="sort">
			<div class="row">
				<?php

		  			if(isset($_GET['page'])){
		  				$page = $_GET['page'];
		  			}else{
		  				$page = 1;
		  			}

		  			$prod_per_page = 16;
		  			$start_from = ($page-1)*$prod_per_page;

		  			$item = $conn->prepare("SELECT * FROM products WHERE status = 1 order by rand() limit $start_from,$prod_per_page ");
		  			$item->execute();
		  			$result = $item->get_result();
		  			while ($row = $result->fetch_assoc()):
	  				?>
				<div class="col-4">
					<a href="product-details.php?product-details=<?= $row['id']; ?>">
					<img src="<?= $row['image'] ?>">
					<h4><?= $row['name'] ?></h4>
					<p>£ <?= number_format($row['price'],2) ?></p>
				</a>
				</div>
					<?php endwhile; ?>
			</div>
		</div>
		<br><br>
		<div class="page-btn">
		<!------- Pagination ------->
			<?php 
			$pr_query = "select * from products";
			$pr_result = mysqli_query($conn,$pr_query);
			$total_record = mysqli_num_rows($pr_result);
			
			$total_pages = ceil($total_record/$prod_per_page);


			if($page>1){
				echo "<a href='products.php?page=".($page-1)."'>&#129144</a>";
			}
			
			for($i=1;$i<$total_pages;$i++){
				echo "<a href='products.php?page=".$i."'>$i</a>";
			}

			if($i>$page){
				echo "<a href='products.php?page=".($page+1)."'>&#129146</a>";
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

