<?php
  include 'action.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exclusive Product | YAME T-SHIRT COLLECTION</title>
	<link rel="stylesheet" type="text/css" href="css/pdetails.css">
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
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<a href="home.php"><img src="images/logo.png" width="150px"></a>
				</div>
				<nav>
					<ul id="MenuItems">
						<li><a href="home.php">Home</a></li>
						<li><a href="products.php">Product</a></li>
						<li><a href="aboutus.php">About Us</a></li>
						<li><a href="index.php">Logout</a></li>
						<li><a href="cart.php"><img src="images/cartwhite.png" width="30px" height="22px"><span id="cart-item" class="w3-badge w3-red"></span></a></li>
					</ul>
				</nav>
				<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
			</div>
		</div>
	</div>

<!------- exclusive product details ------->
	<div class="small-container single-product">
		<div id="message"></div>
		<div class="row">
			<div class="col-2">
				<img src="<?= $dimage; ?>" width="100%" id="ProductImg">

				<div class="small-img-row">
					<div class="small-img-col">
						<img src="<?= $dimage1; ?>" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="<?= $dimage2; ?>" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="<?= $dimage3; ?>" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="<?= $dimage4; ?>" width="100%" class="small-img">
					</div>
				</div>
			</div>

			<div class="col-2">		
				<h2><?= $dname; ?></h2>
				<h4><strong>₽</strong> <?= $dprice; ?></h4>
				<select id="sizeselect" onchange="sizesselect()">
					<option value="" disabled="" selected="">Select Size</option>
					<option value="small">Small</option>
					<option value="medium">Meduim</option>
					<option value="large">Large</option>
					<option value="xl">XL</option>
					<option value="xxl">XXL</option>
				</select>
				<form  class="form-submit">
				<input type="number" value="1" class="cqty">
				  <input type="hidden" class="cid" value="<?= $did ?>">
          <input type="hidden" class="cimage1" value="<?= $dimage1; ?>">
          <input type="hidden" class="cname" value="<?= $dname; ?>">
          <input type="hidden" class="cprice" value="<?= $dprice; ?>">
				<button class="btn addItemBtn" >Add to Cart</button>
				</form>
				<h2>Product Details <i class="fa fa-indent"></i></h2>
				<br>
				<p>Full Sublimation Print (Full print on front and plain black on sleeve and back). Regular Size (Filipino Size). Free Shipping</p>
			</div>
		</div>
	</div>

<!------- More products ------->

	<div class="small-container">
		<div class="row row-2">
			<h2><b>More Products</b></h2>
			<a href="products.php"><b>View More</b></a>
		</div>
	</div>


<!------- products ------->
	<div class="small-container">
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
				<div class="rating">
					<i class="<?= $row['rate1'] ?>"></i>
					<i class="<?= $row['rate1'] ?>"></i>
					<i class="<?= $row['rate1'] ?>"></i>
					<i class="<?= $row['rate1'] ?>"></i>
					<i class="<?= $row['rate1'] ?>"></i>
				</div>
				<p><strong>₽</strong> <?= $row['price'] ?></p>
			</a>
			</div>
			<?php endwhile; ?>
		</div>	
	</div>

<!------- footer ------->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download Our App</h3>
					<p>Download Yame T-shirt Collection on your mobile device</p>
					<div class="app-logo">
						<a href="#"><img src="images/play-store.png"></a>
						<a href="#"><img src="images/app-store.png"></a>
					</div>
				</div>
				<div class="footer-col-2">
					<img src="images/logo.png">
					<p><b>The Best Anime Themed Limited Edition <br/>T-SHIRT Store Near You!</b></p>
				</div>
				<div class="footer-col-3">
					<h3>Contact Us</h3>
					<ul>
						<li><b>ADDRESS</b></li>
						<li>123 STREET NAME, CITY, PH</li><br>
						<li><b>PHONE</b></li>
						<li>(123) 456-7890</li><br>
						<li><b>EMAIL</b></li>
						<li>MAIL@EXAMPLE.COM</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><img src="images/fb2.jpg" width="50px"></a> <a href="#"><img src="images/tw.png" width="50px"></a></li>
						<li><a href="#"><img src="images/ig.png" width="50px"></a> <a href="#"><img src="images/pin.png" width="50px"></a></li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2020 - Yame T-shirt Collection</p>
		</div>
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

<!------- js for product gallery ------->

	<script type="text/javascript">
		var ProductImg = document.getElementById("ProductImg");
		var SmallImg = document.getElementsByClassName("small-img");

		SmallImg[0].onclick = function()
		{
			ProductImg.src = SmallImg[0].src;
		}
		SmallImg[1].onclick = function()
		{
			ProductImg.src = SmallImg[1].src;
		}
		SmallImg[2].onclick = function()
		{
			ProductImg.src = SmallImg[2].src;
		}
		SmallImg[3].onclick = function()
		{
			ProductImg.src = SmallImg[3].src;
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
      var cimage1 = $form.find(".cimage1").val();
      var cname = $form.find(".cname").val();
      var cprice = $form.find(".cprice").val();
      var csize = $form.find(".csize").val();
      var ccode = $form.find(".ccode").val();
      var cqty = $form.find(".cqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          cid: cid,
          cimage1: cimage1,
          cname: cname,
          cprice: cprice,
          csize: csize,
          cqty: cqty,
          ccode: ccode,
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
