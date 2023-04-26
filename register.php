<?php 
  include('process.php');
?>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/reglog7.css">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <style>
    .data {
      display: none;
    }
  </style>

</head>
<body>
  <div class="header">
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<a href="home.php"><img src="images/gg.png"></a>
				</div>
				<div class="cafe_name">
				  <a href="home.php"><p>Go Green & Hire System </p></a>
				</div>
			</div>
		</div>
	</div>

  <form method="post" action="register.php" id="register_form">
  	<h1>Register</h1>
    <div>
        <input type="checkbox" name="conditions" required>
        <h6 style="text-align: center"><a href="dataprivacy.php">Accept Terms & Conditions</a></h6>
    </div><br>
    <div>
      <input type="text" name="name" placeholder="Enter your Full Name" value="<?php echo $name; ?>" required>
    </div>
  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
      <input type="text" name="username" placeholder="Enter unique Username" value="<?php echo $username; ?>" required>
      <?php if (isset($name_error)): ?>
        <span><?php echo $name_error; ?></span>
      <?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input type="email" name="email" placeholder="Enter unique Email" value="<?php echo $email; ?>" required>
      <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
  	<div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
  		<input type="password"  placeholder="Enter unique Password" name="password" value="<?php echo $password; ?>" required>
        <?php if (isset($password_error)): ?>
      	    <span><?php echo $password_error; ?></span>
        <?php endif ?>
  	</div>
    <div <?php if (isset($phone_error)): ?> class="form_error" <?php endif ?> >
  		<input type="text"  placeholder="Enter Mobile No." name="phone" value="<?php echo $phone; ?>" required>
        <?php if (isset($phone_error)): ?>
      	    <span><?php echo $phone_error; ?></span>
        <?php endif ?>
  	</div>
    <div>
      <input type="text" name="address" placeholder="Enter your Address" value="<?php echo $address; ?>" required>
    </div>
    
  	<div>
  		<button type="submit" name="register" id="reg_btn">Register</button>
  	</div>
    
    <h5 style="text-align: center"><a href="login.php">Already have an account?</a></h5>
  </form>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#pmode").on('change', function(){
        $(".data").hide();
        $("#" + $(this).val()).fadeIn(700);
      }).change();
    });
  </script>

</body>
</html>
