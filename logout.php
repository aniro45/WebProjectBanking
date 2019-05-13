<?php 

  //echo '<script>alert("successfully logged In!!");</script>';

session_start();


if(isset($_SESSION['email'])){
 
 session_destroy();
 header("Location: signin.php");

}else{

   header("Location: signin.php");

}
  

  

  

  

 ?>

