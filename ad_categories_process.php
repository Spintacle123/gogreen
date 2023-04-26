<?php
	session_start();
	include 'config.php';

	$update=false;
	$id="";
	$cat_name="";

	if(isset($_POST['add'])){

			$cat_name=$_POST['cat_name'];

			$query="INSERT INTO categories(cat_name)VALUES(?)";
			$stmt=$conn->prepare($query);
			$stmt->bind_param("s",$cat_name);
			$stmt->execute();

			header('location:ad_categories.php');
			$_SESSION['response']="Successfully Inserted to the database!";
			$_SESSION['res_type']="success";	
		
	}
?>