<?php
	// session_start();
	include 'config.php';

	$update=false;
	$id="";
	$class="";
	$name="";
	$price="";
	$capital="";
	$image="";
	$code="";
	$ccode="";

	if(isset($_POST['add'])){
		$class=$_POST['class'];
		$code=$_POST['code'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$capital=$_POST['capital'];

		$image=$_FILES['images']['name'];
		$upload="images/".$image;
		// $image1=$upload;

		$query="INSERT INTO products(class,code,name,price,capital,image)VALUES(?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssds",$class,$code,$name,$price,$capital,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['images']['tmp_name'], $upload);

		header('location:ad_addproducts.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}


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

	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();;

		$class=$row['class'];
		$code=$row['code'];
		$name=$row['name'];
		$price=$row['price'];
		$capital=$row['capital'];
		$image=$row['image'];

		$update=true;
	}

	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$class=$_POST['class'];
		$code=$_POST['code'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$capital=$_POST['capital'];

		if(isset($_FILES['images']['name'])&&($_FILES['images']['name']!="")){
			$newimage="images/".$_FILES['images']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['images']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}


		$query="UPDATE products SET name=?,class=?,code=?,price=?,capital=?,image=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssdsi",$name,$class,$code,$price,$capital,$newimage,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:ad_addproducts.php');
	}

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
		$cimage=$row['image'];
	}

	if(isset($_GET['details2'])){
		$id=$_GET['details2'];
		$query="SELECT * FROM orders WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$cid=$row['id'];
		$cname=$row['name'];
		$cproducts=$row['products'];
		$cprice=$row['amount_paid'];
		$cname=$row['name'];
		$cemail=$row['email'];
		$cphone=$row['phone'];
		$caddress=$row['address'];
		$cpmode=$row['pmode'];
		// $cimage=$row['image'];
	}
?>