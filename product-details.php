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
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,600;0,700;1,500;1,600;1,700&family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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


	<div class="container">
		<div class="product-details">
			<div class="p-img">
				<img src="<?= $dimage; ?>" alt="">
			</div>
			<div class="p-details">
				<h2><?= $dname; ?></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>

				<div class="ratings" style="border-bottom: 1px solid #c6c6c6;margin-bottom:2em">
					<span>Rating</span>
					<div class="flex">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#bdcd23" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"/></svg>
					</div>
				</div>

				<h2>$ <span id="price"> <?= number_format($dprice,2); ?></span> <span style="font-weight: 400; color: #c6c6c6; font-size: 1.5rem">/day</span></h2>


				<span class="want-to mb-2 mt-2">Want to Rent?</span>
				<div class="d-flex gap-lg-3 mb-4" style="gap:30px">
					<div class="d-flex flex-column" style="width:calc(100% / 6)">
						<span class="days">No. of days</span>
						<input type="number" id="noOfDays">
					</div>
					<div class="d-flex flex-column">
						<span class="days">Starting Date</span>
						<input type="text" id="datepicker" data-datepicker>
					</div>
					<div class="d-flex flex-column">
						<span class="days">Date End</span>
						<p style="color: #b0aeae" id="dateTo">yyyy/mm/dd</p>
					</div>
				</div>
				<?php if (empty($_SESSION['ID'])) { ?>
					<a href="login.php" class="btn addItemBtn"><span id="total"></span> 
						<span class="totals"></span>
						Book Tools 
					</a>
				<?php }else{ ?>
					<button class="btn addItemBtn" style="padding-top: 10px; padding-bottom: 10px" >
						<span class="totals"></span>
						Book Tools
					</button>
				<?php } ?>
			</div>
		</div>	
	</div>




	<br>
	<br>


<!------- single product details ------->
	<!-- <div class="small-container single-product">
		<div class="row">
			<div class="col-2 info1">
				<div class="message" id="message"></div>
				<br>
				<img src="<?= $dimage; ?>" id="ProductImg">
			</div>
			
			
			<div class="col-2 info2">		
				<h2><?= $dname; ?></h2>
				<h4>Php: <?= number_format($dprice,2); ?></h4>
				<label for="date">Select a date:</label>
				<input type="date" id="date" value="<%= new Date().toISOString().substr(0,10) %>">

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
	</div> -->

<!------- Reviews ------->

<div class="mt-5" id="review_content"></div>


<!------- More products ------->
<div class="container" style="margin-bottom: 10rem; background-color:#f1f1f1; padding: 20px; border-radius: 10px">
		<div class="category">
			<div>
				<h3>MORE TOOLS</h3>
			</div>
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


		var datepicker = document.getElementById('datepicker');
		var picker = flatpickr(datepicker, {
			dateFormat: 'Y-m-d',
			locale: 'en',
			disable: [
				{
					from: '2023-04-10',
					to: '2023-04-12'
				}
			],
			onChange: function(selectedDates, dateStr, instance) {
				const noOfDays = $('#noOfDays').val();
				const price = $('#price').text();
				const dateFrom = dateStr;

				$('#dateTo').text(analyzeDate(noOfDays, dateFrom ));
				$('#totals').text(computeTotal(noOfDays, price ));
				
				console.log(selectedDates[0]); // logs the selected date object
				console.log(dateStr); // logs the selected date string in the format 'YYYY-MM-DD'
			}
		});

		


		function computeTotal (days, price){
			return parseInt(days) * parseInt(price);
		}

		function disableDate () {
				var datePicker = document.getElementById("date");

				// Disable dates from April 10 to April 12, 2023
				var minDate = new Date("2023-04-01");
				var maxDate = new Date("2023-04-30");
				var disabledDates = ["2023-04-10", "2023-04-11", "2023-04-12"];

				datePicker.setAttribute("min", formatDate(minDate));
				datePicker.setAttribute("max", formatDate(maxDate));

				datePicker.addEventListener("input", function() {
					var selectedDate = new Date(this.value);
					
					if (disabledDates.includes(formatDate(selectedDate))) {
						this.setCustomValidity("This date is not allowed.");
					} else {
						this.setCustomValidity("");
					}
				});

				function formatDate(date) {
				var year = date.getFullYear();
				var month = String(date.getMonth() + 1).padStart(2, "0");
				var day = String(date.getDate()).padStart(2, "0");
				
				return year + "-" + month + "-" + day;
			}
		}


		function analyzeDate(days, dateFrom) {

			// Parse the input date string into a Date object
			const date = new Date(dateFrom);
			
			// Calculate the new date by subtracting the specified number of days
			const newDate = new Date(date.getTime() + (days  * 24 * 60 * 60 * 1000));

			// Format the new date as a string in YYYY-MM-DD format
			const formattedDate = newDate.toISOString().slice(0, 10);

			// Return the formatted date string
			return formattedDate
		}

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

<style>

	*{
		font-family: 'Josefin Sans', sans-serif !important;
		color: #000;
	}

	a{
		 text-decoration: none;
	}

	.container {
		max-width: 1300px;
	}
	.container > .product-details {
		display: flex;
		width: 100%;
		margin-top: 9rem;
	}
	.container > .product-details > .p-img  {
		width: calc(100%/2);
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.container > .product-details > .p-img > img {
		width: 80%;
	}
	.container > .product-details > .p-details > p {
		color: #b0aeae;
	}
	.container > .product-details > .p-details {
		width: calc(100% / 2);
		display: flex;
		flex-direction: column;
		background-color: #f1f1f1;
		border-left: 5px solid #5bb343;
		padding: 2rem;
	}
	
	.container > .product-details > .p-details > h2 {
		font-weight: bold;
	}

	.want-to {
		font-weight: bold;
	}

	.days {
		color: #5bb343; 
	}

	input {
		display: flex;
		align-items: center;
		padding-left: 10px;
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


	.items {
		display: flex;
		gap: 20px;
	}

	.addItemBtn {
		padding: 10px !important;
		font-size: 19px;
		text-transform: uppercase;
		color: white;
	}

.items {
	display: flex;
	gap: 20px;
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
	border: 2px solid  #5bb343;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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