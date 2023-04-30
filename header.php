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
            <div class="logos">
               <a href="home.php"><img src="./assets/img/logo.png"></a>
               <a class="a-address" href="cart.php">
                  <?php if (!empty($_SESSION['ID'])) { ?>
                     <div class="cart">
                     <span id="cart-item" class="w3-badge w3-white"></span>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M7 22q-.825 0-1.413-.588T5 20q0-.825.588-1.413T7 18q.825 0 1.413.588T9 20q0 .825-.588 1.413T7 22Zm10 0q-.825 0-1.413-.588T15 20q0-.825.588-1.413T17 18q.825 0 1.413.588T19 20q0 .825-.588 1.413T17 22ZM7 17q-1.125 0-1.7-.988t-.05-1.962L6.6 11.6L3 4H1.975q-.425 0-.7-.288T1 3q0-.425.288-.713T2 2h1.625q.275 0 .525.15t.375.425L5.2 4h14.75q.675 0 .925.5t-.025 1.05l-3.55 6.4q-.275.5-.725.775T15.55 13H8.1L7 15h11.025q.425 0 .7.288T19 16q0 .425-.288.713T18 17H7Z"/></svg>
                     </div>
                  <?php } ?>
               </a>
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
                  <li>
                     <?php if (!empty($_SESSION['ID'])) { ?>
                        <h5><?php echo $_SESSION['username'] ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M12 19.2c-2.5 0-4.71-1.28-6-3.2c.03-2 4-3.1 6-3.1s5.97 1.1 6 3.1a7.232 7.232 0 0 1-6 3.2M12 5a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-3A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10c0-5.53-4.5-10-10-10Z"/></svg></h5>
                     <?php } ?>
                  </li>
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

<style>

   h5{
      font-family: 'Josefin Sans', sans-serif;
      color: #abff5f;
      margin-left: 30px;
      border-left: 2px solid;
      padding-left: 20px;
      display: flex;
      justify-content: center;
      align-content: center;
      gap: 5px;
   }

   .logos {
      display: flex;
   }

   nav ul li:hover{
      background-color: none;
   }

   .logos > a > img {
      width: 200px;
      height: auto;
   }

   .a-address{
      margin-top: 7px;
      margin-left: 20px;
   }

   .navbar {
      border-radius: 0px;
      padding-left: 8rem;
      padding-right: 8rem;
      z-index: 9999;
   }

   .cart {
      display: flex;
      justify-content: center;
      align-items: 'center';
      position: relative;
      margin-bottom: -20px;
   }

   .cart > span,
   .cart > svg {
      margin-bottom: -10px !important;
   }

   .cart > #cart-item {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 20px;
      width: 20px;
      position: absolute;
      background-color: red !important;
      color: white !important;
      font-size: 10px;
      margin-right: -25px;
      margin-top: -5px;
   }
</style>


</html>
