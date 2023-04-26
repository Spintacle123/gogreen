<?php
    session_start();
	include 'config.php';

	$update=false;
	$id="";
	$name="";
	$username="";
	$email="";
	$password="";
	$phone="";
	$address="";
	$role="";
	$usertype="1";
	$image="";
	$status="";
	

	if(isset($_POST['add'])){

		$image=$_FILES['images']['name'];
		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $image);
		$imageExtension = strtolower(end($imageExtension));

		if(!in_array($imageExtension, $validImageExtension)){
			header('location:ad_accounts.php');
			$_SESSION['response']="Invalid Image File Extension!!, only accept .jpg, .jpeg, .png";
			$_SESSION['res_type']="success";
		}else{
			$name=$_POST['name'];
			$username=$_POST['username'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$role=$_POST['role'];
			$usertype=$_POST['usertype'];

			$upload="images/".$image;

			$pass = md5($password);

			$query="INSERT INTO users(name,username,email,password,phone,address,role,usertype,image)VALUES(?,?,?,?,?,?,?,?,?)";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("sssssssis",$name,$username,$email,$pass,$phone,$address,$role,$usertype,$upload);
			$stmt->execute();
			move_uploaded_file($_FILES['images']['tmp_name'], $upload);

			header('location:ad_accounts.php');
			$_SESSION['response']="user Added Successfully!";
			$_SESSION['res_type']="success";
		}
	}

	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();;

		$name=$row['name'];
		$username=$row['username'];
		$email=$row['email'];
		$password=$row['password'];
        $phone=$row['phone'];
        $address=$row['address'];
		$role=$row['role'];
		$image=$row['image'];
		$status=$row['status'];
		// $usertype=$_POST['usertype'];

		$update=true;
	}

	if(isset($_POST['update'])){
		if($_POST['password']){

			$image=$_FILES['images']['name'];
			// $validImageExtension = ['jpg', 'jpeg', 'png'];
			// $imageExtension = explode('.', $image);
			// $imageExtension = strtolower(end($imageExtension));
	
			// if(!in_array($imageExtension, $validImageExtension)){
			// 	header('location:users-profile.php');
			// 	$_SESSION['response']="Invalid Image File Extension!!, only accept .jpg, .jpeg, .png";
			// 	$_SESSION['res_type']="success";
			// }else{
				$id=$_POST['id'];
				$name=$_POST['name'];
				$username=$_POST['username'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$phone=$_POST['phone'];
				$address=$_POST['address'];
				$role=$_POST['role'];
				$status=$_POST['status'];
				// $usertype=$_POST['usertype'];

				if(isset($_FILES['images']['name'])&&($_FILES['images']['name']!="")){
					$newimage="images/".$_FILES['images']['name'];
					unlink($oldimage);
					move_uploaded_file($_FILES['images']['tmp_name'], $newimage);
				}
				else{
					$result = $conn->query("SELECT image FROM users WHERE id=$id");
					$row = $result->fetch_assoc();

					$newimage=$row['image'];
				}
				
				$pass = md5($password);


				$query="UPDATE users SET name=?,username=?,email=?,password=?,phone=?,address=?,role=?,image=? WHERE id=?";
				$stmt=$conn->prepare($query);
				$stmt->bind_param("ssssssssi",$name,$username,$email,$pass,$phone,$address,$role,$newimage,$id);
				$stmt->execute();

				$_SESSION['response']="Updated Successfully!";
				$_SESSION['res_type']="primary";
				header('location:ad_accounts.php');
			// }
		}else{
			$image=$_FILES['images']['name'];
			// $validImageExtension = ['jpg', 'jpeg', 'png'];
			// $imageExtension = explode('.', $image);
			// $imageExtension = strtolower(end($imageExtension));
	
			// if(!in_array($imageExtension, $validImageExtension)){
			// 	header('location:ad_accounts.php');
			// 	$_SESSION['response']="Invalid Image File Extension!!, only accept .jpg, .jpeg, .png";
			// 	$_SESSION['res_type']="success";
			// }else{
				$id=$_POST['id'];
				$name=$_POST['name'];
				$username=$_POST['username'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$address=$_POST['address'];
				$role=$_POST['role'];
				// $status=$_POST['status'];
				// $usertype=$_POST['usertype'];
		
				if(isset($_FILES['images']['name'])&&($_FILES['images']['name']!="")){
					$newimage="images/".$_FILES['images']['name'];
					unlink($oldimage);
					move_uploaded_file($_FILES['images']['tmp_name'], $newimage);
				}
				else{
					$result = $conn->query("SELECT image FROM users WHERE id=$id");
					$row = $result->fetch_assoc();

					$newimage=$row['image'];
				}
		
				$query="UPDATE users SET name=?,username=?,email=?,phone=?,address=?,role=?,image=? WHERE id=?";
				$stmt=$conn->prepare($query);
				$stmt->bind_param("sssssssi",$name,$username,$email,$phone,$address,$role,$newimage,$id);
				$stmt->execute();
		
				$_SESSION['response']="Updated Successfully!";
				$_SESSION['res_type']="primary";
				header('location:ad_accounts.php');
			// }
		}
		
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM users WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$cid=$row['id'];
		$cname=$row['name'];
		$cusername=$row['username'];
		$cemail=$row['email'];
		$cpassword=$row['password'];
		$cphone=$row['phone'];
		$caddress=$row['address'];
		$crole=$row['role'];
		$cimage=$row['image'];
		$cstatus=$row['status'];
	}

    // if(isset($_GET['details2'])){
	// 	$id=$_GET['details2'];
	// 	$query="SELECT * FROM users WHERE id=?";
	// 	$stmt=$conn->prepare($query);
	// 	$stmt->bind_param("i",$id);
	// 	$stmt->execute();
	// 	$result=$stmt->get_result();
	// 	$row=$result->fetch_assoc();

	// 	$cid=$row['id'];
	// 	$cname=$row['name'];
	// 	$cusername=$row['username'];
	// 	$cemail=$row['email'];
	// 	$cpassword=$row['password'];
	// 	$cphone=$row['phone'];
	// 	$caddress=$row['address'];
	// 	$crole=$row['role'];
	// 	$cimage=$row['image'];
	// 	$cstatus=$row['status'];
	// }
?>