<?php
	include 'config.php';
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'stc');

	$update=false;
	$id="";
	$class="";
	$name="";
	$price="";
	$prod_qntty="";
	$capital="";
	$image="";
	$code="";
	$ccode="";

	// add products
	if(isset($_POST['add'])){
		$image=$_FILES['images']['name'];
		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $image);
		$imageExtension = strtolower(end($imageExtension));

		

		if(!in_array($imageExtension, $validImageExtension)){
			header('location:ad_addproducts.php');
			$_SESSION['response']="Invalid Image File Extension!!, only accept .jpg, .jpeg, .png";
			$_SESSION['res_type']="success";
		}else{
			$class=$_POST['class'];
			$name=$_POST['name'];
			$code=$_POST['code'];
			$prod_qntty=$_POST['prod_qntty'];
			$price=$_POST['price'];
			$capital=$_POST['capital'];

			$upload="images/".$image;

			
			$sql_code = "SELECT * FROM products WHERE code='$code'";
			$res_code = mysqli_query($db, $sql_code);
			
			if (mysqli_num_rows($res_code) > 0) {
				header('location:ad_addproducts.php');
				$_SESSION['response']="Sorry, product code is already taken! Please try again";
				$_SESSION['res_type']="success";
			}else{
				$query="INSERT INTO products(class,name,code,prod_qntty,price,capital,image)VALUES(?,?,?,?,?,?,?)";
				$stmt=$conn->prepare($query);
				$stmt->bind_param("sssisds",$class,$name,$code,$prod_qntty,$price,$capital,$upload);
				$stmt->execute();
				move_uploaded_file($_FILES['images']['tmp_name'], $upload);

				header('location:ad_addproducts.php');
				$_SESSION['response']="New Products Added Succesfully to Menu!";
				$_SESSION['res_type']="success";
			}
		}
	}

	//edit products
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();;

		$class=$row['class'];
		$name=$row['name'];
		$code=$row['code'];
		$prod_qntty=$row['prod_qntty'];
		$price=$row['price'];
		$capital=$row['capital'];
		$image=$row['image'];

		$update=true;
	}

	//update products
	if(isset($_POST['update'])){

		$image=$_FILES['images']['name'];
		// $validImageExtension = ['jpg', 'jpeg', 'png'];
		// $imageExtension = explode('.', $image);
		// $imageExtension = strtolower(end($imageExtension));

		// if(!in_array($imageExtension, $validImageExtension)){
		// 	header('location:ad_addproducts.php');
		// 	$_SESSION['response']="Invalid Image File Extension!!, only accept .jpg, .jpeg, .png";
		// 	$_SESSION['res_type']="success";
		// }else{
			$id=$_POST['id'];
			$class=$_POST['class'];
			$name=$_POST['name'];
			$code=$_POST['code'];
			$prod_qntty=$_POST['prod_qntty'];
			$price=$_POST['price'];
			$capital=$_POST['capital'];

			if(isset($_FILES['images']['name'])&&($_FILES['images']['name']!="")){
				$newimage="images/".$_FILES['images']['name'];
				unlink($oldimage);
				move_uploaded_file($_FILES['images']['tmp_name'], $newimage);
			}
			else{
				$result = $conn->query("SELECT image FROM products WHERE id=$id");
				$row = $result->fetch_assoc();

				$newimage=$row['image'];
			}


			$query="UPDATE products SET name=?,class=?,code=?,prod_qntty=?,price=?,capital=?,image=? WHERE id=?";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("sssisdsi",$name,$class,$code,$prod_qntty,$price,$capital,$newimage,$id);
			$stmt->execute();

			$_SESSION['response']="Product Details Updated Successfully!";
			$_SESSION['res_type']="primary";
			header('location:ad_addproducts.php');
		// }
	}

	//get details
	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$cid=$row['id'];
		$cclass=$row['class'];
		$cname=$row['name'];
		$cprice=$row['price'];
		$ccapital=$row['capital'];
		$ccode=$row['code'];
		$cprod_qntty=$row['prod_qntty'];
		$cimage=$row['image'];
	}

	//delete deatails
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT image FROM products WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['image'];
		unlink($imagepath);

		$query="DELETE FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:ad_addproducts.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}

	// if(isset($_GET['details2'])){
	// 	$id=$_GET['details2'];
	// 	$query="SELECT * FROM orders WHERE id=?";
	// 	$stmt=$conn->prepare($query);
	// 	$stmt->bind_param("i",$id);
	// 	$stmt->execute();
	// 	$result=$stmt->get_result();
	// 	$row=$result->fetch_assoc();

	// 	$cid=$row['id'];
	// 	$cname=$row['name'];
	// 	$cproducts=$row['products'];
	// 	$cprice=$row['amount_paid'];
	// 	$cname=$row['name'];
	// 	$cemail=$row['email'];
	// 	$cphone=$row['phone'];
	// 	$caddress=$row['address'];
	// 	$cpmode=$row['pmode'];
	// 	$cdate_ord=$row['date_ord'];
	// 	$cimage=$row['image'];
	// }
?>