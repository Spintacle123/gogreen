<?php 
  include('process.php');
?>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquire</title>
  <link rel="stylesheet" href="css/reglog2.css">

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
					<a href="home.php"><img src="images/logo.jpg"></a>
				</div>
				<div class="cafe_name">
				  <a href="home.php"><p>Street Taqueria and Cafe </p></a>
				</div>
			</div>
		</div>
	</div>

  <form method="post" action="inquire.php" id="register_form">
  	<h1>Inquire</h1>
    
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input type="email" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" required>
      <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
    <div>
      <textarea type="text" name="message" placeholder="Enter your message" value="<?php echo $message; ?>" required></textarea>
    </div>
    
  	<div>
  		<button type="submit" name="inquire" id="reg_btn">Inquire</button>
  	</div>
    
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