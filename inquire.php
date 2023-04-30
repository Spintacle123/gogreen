<?php 
  include('process.php');
?>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquire</title>
  <link rel="stylesheet" href="css/reglog2.css">
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

  <form method="post" action="inquire.php" id="register_form">
    <div class="inquire">
        <div class="img-i"></div>
        <div>
          <h1>For Inquiries</h1>
          <span class="desc">"If you have any inquiries about our tools, our knowledgeable and friendly team is always here to assist you and provide expert guidance."</span>
          <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
            <input style="padding: 20px" type="email" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" required>
            <?php if (isset($email_error)): ?>
              <span><?php echo $email_error; ?></span>
            <?php endif ?>
          </div>
          <div>
            <textarea style="width: 100%;padding: 20px" rows="10" type="text" name="message" placeholder="Enter your message" value="<?php echo $message; ?>" required></textarea>
          </div>
        
          <div>
            <button type="submit" name="inquire" id="reg_btn">Inquire</button>
          </div>
        </div>
    </div>
  </form>



  <!-- <form method="post" action="inquire.php" id="register_form">
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
    
  </form> -->

  

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

   #register_form{
      width: 45%;
      height: 70%;
      margin-bottom: 0px !important;
   }

   .inquire {
      display: flex;
      height: 100%;
   }

   .inquire > div {
     width: calc(100% / 2);
     padding: 30px;
     display: flex;
     justify-content: center;
     align-items: start;
     flex-direction: column;
     gap: 20px;
   }

   .inquire > div:nth-child(2),
   .inquire > div:nth-child(2) > div,
   .inquire > div:nth-child(2) > div > text-area{
    width: 100%;
   }

   .img-i {
     background-image: url('../gogreen/assets/img/tools.jpg');
     width: 500px;
     background-position:  center;
     background-size: cover;
   }
</style>