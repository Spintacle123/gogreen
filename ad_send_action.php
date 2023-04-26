<?php
    session_start();
	include 'config.php';

	
	$email="";
	$message="";
	

	if(isset($_GET['send'])){
		$id=$_GET['send'];

		$query="SELECT * FROM inquiries WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();;

		
		$email=$row['email'];
        $message=$row['message'];
	}
?>