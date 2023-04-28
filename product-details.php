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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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

				<div class="col-sm-10 text-center">
                                    <h1 class="text-warning mt-4 mb-4">
                                        <b><span id="average_rating">0.0</span> / 5</b>
                                    </h1>
                                    <div class="mb-3">
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                        <i class="fas fa-star star-light mr-1 main_star"></i>
                                    </div>
                                    <h3><span id="total_review">0</span> Review</h3>
                                </div>
                                <div class="col-sm-4">
                                    <p>
                                    <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                    </div>
                                    </p>
                                    <p>
                                    <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                                    <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                    </div>
                                    </p>
                                </div>
				

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

<!------- Reviews ------->

<div class="mt-5" id="review_content"></div>


<!------- More products ------->

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

<script>
	$(document).ready(function() {
		load_rating_data();

		function load_rating_data() {

			var cid = <?= $did ?>;
			$.ajax({
				url: "submit_rating.php",
				method: "POST",
				data: {
					cid: cid,
					action: 'load_data'
				},
				dataType: "JSON",
				success: function(data) {
					$('#average_rating').text(data.average_rating);
					$('#total_review').text(data.total_review);

					var count_star = 0;
					console.log(data);
					$('.main_star').each(function() {
						count_star++;
						if (Math.ceil(data.average_rating) >= count_star) {
							$(this).addClass('text-warning');
							$(this).addClass('star-light');
						}
					});
					$('#total_five_star_review').text(data.five_star_review);

$('#total_four_star_review').text(data.four_star_review);

$('#total_three_star_review').text(data.three_star_review);

$('#total_two_star_review').text(data.two_star_review);

$('#total_one_star_review').text(data.one_star_review);

$('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

$('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

$('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

$('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

$('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

if (data.review_data.length > 0) {
	var html = '';

	for (var count = 0; count < data.review_data.length; count++) {
		html += '<div class="row mb-3">';

		html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].name.charAt(0) + '</h3></div></div>';

		html += '<div class="col-sm-11">';

		html += '<div class="card">';

		html += '<div class="card-header"><b>' + data.review_data[count].name + '</b></div>';
		html += '<div class="card-body">';

for (var star = 1; star <= 5; star++) {
	var class_name = '';

	if (data.review_data[count].rating >= star) {
		class_name = 'text-warning';
	} else {
		class_name = 'star-light';
	}

	html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
}

html += '<br />';

html += data.review_data[count].review;

html += '</div>';

html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

html += '</div>';

html += '</div>';

html += '</div>';
}

$('#review_content').html(html);
}
}
})
}
});
</script>