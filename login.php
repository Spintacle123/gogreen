<?php include('process.php') ?>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/reglog7.css">
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

  <form method="post" action="login.php" id="register_form">
    <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show alert-dismissible fade show col-sm-6 mx-auto" role="alert" style="padding: 8px; margin-left:auto">
              <b class="mx-auto" style="background-color: green; padding:5px"><?= $_SESSION['response']; ?></b>
            </div>
          <?php } unset($_SESSION['response']); ?>
  	<h1>Login</h1><br>
    </div>
    <div>
      <input type="text" name="username" placeholder="Enter your Username" value="<?php echo $username; ?>" required>
    </div>
    <div>
      <input type="password" name="password" placeholder="Enter your Password" value="<?php echo $password; ?>" required>
    </div>
    <div <?php if (isset($login_error)): ?> class="form_error" <?php endif ?> >
      <?php if (isset($login_error)): ?>
        <span><?php echo $login_error; ?></span>
      <?php endif ?>
    </div>
  	<div>
  		<button type="submit" name="login" id="reg_btn">Login</button>
  	</div>
    
    <h5 style="text-align: center"><a href="register.php">Don't have an account?</a></h5>
  </form>
</html>
