<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login/Register</title>
	<link rel="stylesheet" type="text/css" href="css/index3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<a href="home.php"><img src="images/logo.jpg"></a>
				</div>
				<div class="cafe_name">
					<p>Street Taqueria and Cafe </p>
				</div>
			</div>
		</div>
	</div>

<!------- login/register page ------->
<div class="account-page">
	<div class="container">
		<div class="row">
			<div class="col-2">
			<div class="form-container">
					<?php 
					session_start();

					//Database connection 
					$db = mysqli_connect("localhost","root","","stc");


					//REGISTER
					if(isset($_POST['register'])){
						$name = mysqli_real_escape_string($db,$_POST['name']);
					  $username = mysqli_real_escape_string($db,$_POST['username']);
					  $email = mysqli_real_escape_string($db,$_POST['email']);
					  $password = mysqli_real_escape_string($db,$_POST['password']);
					  $username = mysqli_real_escape_string($db,$_POST['username']);
					  $password = md5($password); //password encrypted
					  $phone = mysqli_real_escape_string($db,$_POST['phone']);
					  $address = mysqli_real_escape_string($db,$_POST['address']);

					//now run the query to save to data in tha table(login)
					  $sql = "INSERT INTO users(name,username,email,password,phone,address) VALUES ('$name','$username','$email','$password','$phone','$address')";

					  if($db->query($sql) == TRUE){
						$link = "<script>window.open('index.php','_self')</script>";
						echo $link;
						echo '<p class="outputmsg">Registered Successfully!</p>';
					  }
					}


					//LOGIN
					if(isset($_POST['login'])){
						$username = mysqli_real_escape_string($db,$_POST['username']);
					  $email = mysqli_real_escape_string($db,$_POST['email']);
					  $password = mysqli_real_escape_string($db,$_POST['password']);
					  $password = md5($password); //password encrypted
					  	

						//now run the query to save to retrieved the data from database
						$sql = "SELECT * FROM users WHERE username='$username' AND email='$email' AND password='$password'";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_array($result);
						
						if(isset($row[0])){
							if($row["usertype"]=="0"){
							$_SESSION['username'] = $row[1];
							$_SESSION['username'] = $username;
							$_SESSION['ID'] = $row[0];
							header("location:home.php");
							}elseif($row["usertype"]=="1"){
							$_SESSION['username'] = $row[1];
							$_SESSION['username'] = $username;
							$_SESSION['name'] = $name;
							$_SESSION['role'] = $row[1];
							$_SESSION['role'] = $role;
							$_SESSION['usertype'] = $row['usertype'];
							header("location:index.php");
							}
						}else{
						 	echo '<p class="outputmsg">Invalid Email or Password!</p>';
						}
					    
					}
					?>

					<div class="form-btn">
						<span onclick="login()">LOGIN</span>
						<span onclick="register()">REGISTER</span>
						<hr id="Indicator">
					</div>

					<form id="login" action="#" method="POST">
						<input type="text" placeholder="Username" name="username" required>
						<input type="text" placeholder="Email Address" name="email" required>
						<input type="password" placeholder="Password" name="password" required>
						<button type="submit" name="login" class="btn">Login</button>
						<a href=""> Forgot Password</a>
					</form>

					<form id="register" action="#" method="POST">
						<input type="text" placeholder="Fullname" name="name" required>
						<input type="text" placeholder="Username" name="username" required>
						<input type="email" placeholder="Email" name="email" required>
						<input type="password" placeholder="Password" name="password" required>
						<input type="text" placeholder="Cellphone No." name="phone" required>
						<input type="text" placeholder="Address" name="address" required>
						<button type="submit" name="register" class="btn">Register</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>



<!-- ----- footer -----
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-3">
					<h3>Contact Us</h3>
					<ul>
						<li><b style="color:greenyellow;">ADDRESS</b></li>
						<li>Osmenia St. San Ramon, Baao, <br>Camarines Sur</li><br>
						<li><b style="color:greenyellow;">PHONE</b></li>
						<li>(123) 456-7890</li><br>
						<li><b style="color:greenyellow;">EMAIL</b></li>
						<li>Steettaqueriacafe@gmail.com</li>
					</ul>
				</div>
				<div class="footer-col-2">
					<img src="images/logo.jpg">
					<p><b>A hole in the wall taco shop in Baao <br/>Mexican comfort food and crafted drinks</b></p>
				</div>
				<div class="footer-col-4">
					<h3>Follow Us</h3>
						<a href="https://www.facebook.com/streettaqueriacafe/?ref=page_internal"><img src="images/fb2.jpg" width="70px">Facebook</a>
						<br>
						<a href="https://www.instagram.com/streettaqueria/?fbclid=IwAR1GIELjCCNFhzMmDPVVdCd88665ikGKz0td4ulhIJraIsryjXTGUaQMZLY"><img src="images/ig.png" width="70px">Instagram</a>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2022 - Street Taqueria and Cafe</p>
		</div>
	</div> -->

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

<!------- js for toggle form ------->
	<script type="text/javascript">
		
		var LoginForm = document.getElementById("login");
		var RegForm = document.getElementById("register");
		var Indicator = document.getElementById("Indicator");

		function register(){

			LoginForm.style.transform = "translateX(0px)"
			RegForm.style.transform = "translateX(0px)"
			Indicator.style.transform = "translateX(100px)"
		}

		function login(){
			
			LoginForm.style.transform = "translateX(300px)"
			RegForm.style.transform = "translateX(300px)"
			Indicator.style.transform = "translateX(0px)"
		}






	</script>





</body>
</html>
