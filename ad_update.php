<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "stc");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE categories SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
      echo 'Data Updated';
    // header('location:ad_categories.php');
    // $_SESSION['response']="Category Updated Succesfully!";
    // $_SESSION['res_type']="success";
 }
}
?>