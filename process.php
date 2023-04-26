<?php 
    session_start();
  $db = mysqli_connect('localhost', 'root', '', 'stc');

  $name = "";
  $username = "";
  $email = "";
  $password = "";
  $phone = "";
  $address = "";
  

  if (isset($_POST['register'])) {
  	$name = $_POST['name'];
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
  	$phone = $_POST['phone'];
  	$address = $_POST['address'];

  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry this username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry this email already taken"; 
    }else if(strlen($_POST['password'])<6 || strlen($_POST['password'])>15){
  	  $password_error = "Password must be 6 to 15 characters!"; 	
    }else if(strlen($_POST['phone'])<11 || strlen($_POST['phone'])>11){
  	  $phone_error = "Phone no. required 11 digits!";
  	}else{
           $query = "INSERT INTO users (name, username, email, password, phone, address) 
      	    	  VALUES ('$name', '$username', '$email', '".md5($password)."', '$phone', '$address')";
           $results = mysqli_query($db, $query);
           $link = "<script>window.open('login.php','_self')</script>";
           echo $link;
           $_SESSION['response']="Registered Succesfully!";
           $_SESSION['res_type']="success";
           exit();
  	}
  }

  if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $pass = md5($password); //password encrypted
      

    //now run the query to save to retrieved the data from database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    
    if(isset($row[0])){
        if($row["usertype"]=="0"){
        $_SESSION['username'] = $row[1];
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['ID'] = $row[0];
        header("location:home.php");
        }elseif($row["usertype"]=="1" && $row["status"]=="1"){
        $_SESSION['username'] = $row[1];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['usertype'] = $row['usertype'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['ID'] = $row[0];
        header("location:ad_index.php");
        }elseif($row["usertype"]=="1" && $row["status"]=="2"){
            $login_error = "Sorry.. your account is Inactive!";
        }
    }else{
        $login_error = "Invalid Email or Password!";
    }
  }
  if (isset($_POST['inquire'])) {
    $email = $_POST['email'];
    $message = $_POST['message'];

 
   $query = "INSERT INTO inquiries (email, message) VALUES ('$email','$message')";
   $results = mysqli_query($db, $query);
   $link = "<script>window.open('inquire.php','_self')</script>";
   echo $link;
   $_SESSION['response']="Send Succesfully!";
   $_SESSION['res_type']="success";
   exit();
  }
?>