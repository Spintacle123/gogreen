<?php 
  include('process.php');
?>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/reglog7.css">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,600;0,700;1,500;1,600;1,700&family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">

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
      <div class="logos">
            <a href="home.php"><img src="./assets/img/logo.png"></a>
        </div>
      </div>
    </div>
  </div>

  <form method="post" action="register.php" id="register_form">
  	<h1>Register</h1>
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
    
    <div class="terms">
        <input type="checkbox" name="conditions" required>
        <h6 style="text-align: center"><a href="dataprivacy.php">Accept Terms & Conditions</a></h6>
    </div><br>
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
<style>
   *{
		font-family: 'Josefin Sans', sans-serif !important;
	}
  .header > div > .navbar {
    background-color: #5bb343;
    border-radius: 0px;
    padding-left: 8rem;
      padding-right: 8rem;
      z-index: 9999;
  }
  .logos > a > img {
      width: 200px;
      height: auto;
   }

   .terms {
    margin-top: 50px;
      display: flex;
      justify-content: start;
      align-items: center;
   }

   .terms > input {
    width: max-content !important;
    margin-right: 10px !important;
   }
</style>
