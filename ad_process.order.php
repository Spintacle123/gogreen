<?php 
	if (!file_exists("config.php")){
		echo "Unable to located <strong>config.php</strong>";
		exit();
	}
	session_start();
	include("config.php");

	if(@$_GET["action"] == "approve") {
		$sql_approve = "UPDATE orders SET status = 1 WHERE id = ?";
		if($approve_check = mysqli_prepare($conn, $sql_approve)) {
			mysqli_stmt_bind_param($approve_check, "i", $id);
			$id = $_GET["transaction_ID"];
			mysqli_stmt_execute($approve_check);
			header("location: ad_orders.php");
			$_SESSION['response']="Order Confirmed Successfully!";
			$_SESSION['res_type']="success";

			exit();
		}
	}

	if(@$_GET["action"] == "cancel") {
		$sql_approve = "UPDATE orders SET status = 2 WHERE ID = ?";
		if($approve_check = mysqli_prepare($conn, $sql_approve)) {
			mysqli_stmt_bind_param($approve_check, "i", $id);
			$id = $_GET["transaction_ID"];
			mysqli_stmt_execute($approve_check);
			header("location: ad_orders.php");
			$_SESSION['response']="Order Cancelled Successfully!";
			$_SESSION['res_type']="success";
			exit();
		} 
	}

	if(@$_GET["action"] == "ordcancel") {
		$sql_approve = "UPDATE orders SET status = 2 WHERE ID = ?";
							
		if($approve_check = mysqli_prepare($conn, $sql_approve)) {
			mysqli_stmt_bind_param($approve_check, "i", $id);
			$id = $_GET["transaction_ID"];
			mysqli_stmt_execute($approve_check);
			header("location: dashboard.php");
			$_SESSION['response']="Your Order Cancelled Successfully!";
			$_SESSION['res_type']="success";
			exit();
		} 
	}

?>