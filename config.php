<?php
	// session_start();

	$conn = new mysqli("localhost","root","","stc");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>
