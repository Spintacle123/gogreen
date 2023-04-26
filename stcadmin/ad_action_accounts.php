
<?php
    // session_start();
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
	

	if(isset($_POST['add'])){
		$name=$_POST['name'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=md5($password);
        $phone=$_POST['phone'];
        $address=$_POST['address'];
		$role=$_POST['role'];
		$usertype=$_POST['usertype'];

		

		$query="INSERT INTO users(name,username,email,password,phone,address,role,usertype)VALUES(?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssi",$name,$username,$email,$password,$phone,$address,$role,$usertype);
		$stmt->execute();

		header('location:ad_accounts.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}


	// if(isset($_GET['delete'])){
	// 	$id=$_GET['delete'];

	// 	$sql="SELECT image FROM admin WHERE id=?";


	// 	$query="DELETE FROM admin WHERE id=?";
	// 	$stmt=$conn->prepare($query);
	// 	$stmt->bind_param("i",$id);
	// 	$stmt->execute();

	// 	header('location:ad_accounts.php');
	// 	$_SESSION['response']="Successfully Deleted!";
	// 	$_SESSION['res_type']="danger";
	// }

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
		$password=md5($password);
        $phone=$row['phone'];
        $address=$row['address'];
		$role=$row['role'];
		// $usertype=$_POST['usertype'];

		$update=true;
	}

	if(isset($_POST['update'])){
		$name=$_POST['name'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=md5($password);
        $phone=$_POST['phone'];
        $address=$_POST['address'];
		$role=$_POST['role'];
		// $usertype=$_POST['usertype'];


		$query="UPDATE users SET name=?,username=?,email=?,password=?,phone=?,address=?,role=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssssi",$name,$username,$email,$password,$phone,$address,$role,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:ad_accounts.php');
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
	}

    if(isset($_GET['details2'])){
		$id=$_GET['details2'];
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
	}
?>