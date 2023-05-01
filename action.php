<?php
session_start();
include 'config.php';

$id = "";
$class = "";
$user_id = "";
$name = "";
$price = "";
$second_price = "";
$capital = "";
$code = "";
$image = "";
$ss = "";
$qty = "";
$dprod_qntty = "";


//load the selected product into the product-details.php
if (isset($_GET['product-details'])) {
	$id = $_GET['product-details'];
	$query = "SELECT products.*, sum(reviews.rating)/count(reviews.rating) as rating from products left join reviews on reviews.product_id = products.id WHERE products.id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	$did = $row['id'];
	$dclass = $row['class'];
	$dimage = $row['image'];
	$dname = $row['name'];
	$dprice = $row['price'];
	$dcapital = $row['capital'];
	$dcode = $row['code'];
	$dqty = $row['qty'];
	$dprod_qntty = $row['prod_qntty'];
	$drating = $row['rating'];
}

// Add products into the cart table
if (isset($_POST['cid'])) {

	$cqty = $_POST['cqty'];

	if ($cqty <= 0) {
		echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>You cannot order when quantity is 0!</strong>
				</div>';
	} else if ($cqty >= 21) {
		echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Your order is a lot, minimum of 20 pcs only!</strong>
				</div>';
	} else {
		$cid = $_POST['cid'];
		$cuser_id = $_POST['cuser_id'];
		$cimage1 = $_POST['cimage1'];
		$cname = $_POST['cname'];
		$cprice = $_POST['cprice'];
		$ccapital = $_POST['ccapital'];
		$ccode = $_POST['ccode'];
		$total = $cprice * $cqty;
		$totalc = $ccapital * $cqty;

		$item = $conn->prepare('SELECT code FROM cart WHERE code=?');
		$item->bind_param('s', $ccode);
		$item->execute();
		$res = $item->get_result();
		$r = $res->fetch_assoc();
		$acode = $r['code'] ?? '';

		if (!$acode) {
			$query = $conn->prepare('INSERT INTO cart (image,name,price,capital,quantity,total,totalc,code,user_id) VALUES (?,?,?,?,?,?,?,?,?)');
			$query->bind_param('ssssssssi', $cimage1, $cname, $cprice, $ccapital, $cqty, $total, $totalc, $ccode, $cuser_id);
			$query->execute();

			// $new_qty = $qty - $cqty;
			// $sql_update_qty = "UPDATE products SET qty=".$new_qty." WHERE ID =".$_GET['product_id'];
			// $qry_update_qty = mysqli_query($conn, $sql_update_qty);

			echo '<div class="alert alert-success alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Item added to your cart!</strong>
					</div>';
		} else {
			echo '<div class="alert alert-danger alert-dismissible mt-2">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Item already added to your cart!</strong>
					</div>';
		}
	}
}



// Get no.of items available in the cart table
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	$item = $conn->prepare('SELECT * FROM cart WHERE user_id =' . $_SESSION['ID']);
	$item->execute();
	$item->store_result();
	$rows = $item->num_rows;

	echo $rows;
}

// Remove single items from cart
if (isset($_GET['remove'])) {
	$id = $_GET['remove'];

	$item = $conn->prepare('DELETE FROM cart WHERE id=?');
	$item->bind_param('i', $id);
	$item->execute();

	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'Item removed from the cart!';
	header('location:cart.php');
}

// Remove all items at once from cart
if (isset($_GET['clear'])) {
	$item = $conn->prepare('DELETE FROM cart');
	$item->execute();
	$_SESSION['showAlert'] = 'block';
	$_SESSION['message'] = 'All Item removed from the cart!';
	header('location:cart.php');
}

// Set total price of the product in the cart table
if (isset($_POST['quantity'])) {
	$quantity = $_POST['quantity'];
	$cid = $_POST['cid'];
	$cprice = $_POST['cprice'];
	$ccapital = $_POST['ccapital'];

	$tprice = $quantity * $cprice;
	$tcapital = $quantity * $ccapital;

	$item = $conn->prepare('UPDATE cart SET quantity=?, total=?, totalc=? WHERE id=?');
	$item->bind_param('issi', $quantity, $tprice, $tcapital, $cid);
	$item->execute();
}

// Checkout and save customer info in the orders table
if (isset($_POST['placeorder'])) {

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$products = $_POST['products'];
	$grand_total = $_POST['grand_total'];
	$tcapital = $_POST['tcapital'];
	$profit = $_POST['profit'];
	$address = $_POST['address'];
	$pmode = $_POST['pmode'];
	$user_id = $_POST['user_id'];

	if ($pmode == "GCash") {
		$image = $_FILES['images']['name'];
		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $image);
		$imageExtension = strtolower(end($imageExtension));
		$upload = "images/" . $image;

		if (!in_array($imageExtension, $validImageExtension)) {
			header('location:checkout.php');
			$_SESSION['response'] = "Invalid Image File Extension!!, only accept .jpg, .jpeg, .png";
			$_SESSION['res_type'] = "success";
		}
	} else {
		$upload = "images/codimage2.png";
	}


	$data = '';

	$query = "INSERT INTO orders (name,phone,address,pmode,products,amount_paid,tcapital,tprofit,image,user_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$item = $conn->prepare($query);
	$item->bind_param('sssssssssi', $name, $phone, $address, $pmode, $products, $grand_total, $tcapital, $profit, $upload, $user_id);

	$item->execute();
	move_uploaded_file($_FILES['images']['tmp_name'], $upload);

	$item2 = $conn->prepare('DELETE FROM cart where user_id = ' . $_SESSION['ID']);
	$item2->execute();
	$data .= '<!DOCTYPE html>
					<html>
					<head>
						<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>Checkout</title>
						<link rel="stylesheet" type="text/css" href="css/check15.css">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
						<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
						<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->
					</head>
					
					<body>
							<div class="container" style="margin-top: 15px">
								<div class="row justify-content-center">
									<div class="col-checkout col-lg-6 px-4 pb-4">
										<div class="text-center" style="border-radius: 2rem">
											<div class="text-center" style="border-radius: 2rem">
												<h2 class="" style="color: yellowgreen">Thank You! Your Order Placed Successfully!</h2>
												<h4 style="color: #fff" class=" text-light rounded p-2">Items Purchased : ' . $products . '</h4>
												<h4 style="color: #fff">Total Amount Paid : ' . number_format($grand_total, 2) . '</h4>
												<h4 style="color: #fff">Mode Payment: ' . $pmode . '</h4>
												<h4 style="color: #fff">Name : ' . $name . '</h4>
												<h4 style="color: #fff">Phone : ' . $phone . '</h4>
												<h4 style="color: #fff">Address : ' . $address . '</h4>
												<a href="home.php" class="btn">Back to Home</a>
											</div>
										</div>
									</div>
								</div>
							</div>
					</body>
					</html>
				';
	echo $data;
}
