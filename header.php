<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- rating -->
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- addtocart -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

   
         <div class="navbar">
            <div class="logo">
               <a href="home.php"><img src="images/gg.png"></a>
            </div>
            <div class="cafe_name">
               <p>Go Green & Hire System <span>
                  <?php if (!empty($_SESSION['ID'])) { ?>
                     <h5>Hi <?php echo $_SESSION['username'] ?></h5>
                  <?php } ?>
               </span></p>
            </div>
            <div class="shopcart">
					<a href="cart.php">
                  <?php if (!empty($_SESSION['ID'])) { ?>
                     <span id="cart-item" class="w3-badge w3-white"></span>
                  <?php } ?>
                  <img src="images/cartwhite.png" width="30px" height="22px"></a>
				</div>
            <nav>
               <ul id="MenuItems">
                  <li><a href="home.php">Home</a></li>
                  <li><a href="products.php">Tools</a></li>
                  <?php if (!empty($_SESSION['ID'])) { ?>
                     <li><a href="dashboard.php">Bookings</a></li>
                  <?php }else{ ?>
                     <li><a href="inquire.php">Inquire</a></li>
                  <?php } ?>
                  <?php if (!empty($_SESSION['ID'])) { ?>
                     <li><a href="process.logout.php">Logout</a></li>
                  <?php }else{ ?>
                     <li><a href="login.php">Login</a></li>
                  <?php } ?>
               </ul>
            </nav>
            
            <img src="images/menu2.png" class="menu-icon" onclick="menutoggle()">
         </div>
         
      



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

   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
   <script type="text/javascript">
    $(document).ready(function() {

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>



</html>
