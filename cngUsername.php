<?php
  
       session_start();
       $tempEmail =  $_SESSION['email'];

        if(!isset($tempEmail)){

          header("Location: signin.php"); 

        }
        
        $connection = mysqli_connect("localhost:3307", "root", "", "banking_db");
               
        $select_query = "SELECT * FROM bank_details WHERE email = '$tempEmail'";
        
        $query = mysqli_query($connection, $select_query);
        $data = mysqli_fetch_array($query);

        

          $fName = $data['Fname'];
          $lName = $data['Lname'];
          $pass =  $data['pass'];

        echo "<p class = 'name-col'>$fName $lName</p>";
        echo "<img class = 'head-img' src='upload_images/"
        .$data['profilePic']."' onclick='window.location = \".php\"'/>";  
         
/*.....................................................Page Content........................................................................*/          
           
          $select_query1 = "SELECT * FROM row_bank_data WHERE email = '$tempEmail'";
        
          $query1 = mysqli_query($connection, $select_query1);
           $data1 = mysqli_fetch_array($query1);
           
           $uNameAttempts = $data1['uNameAttempts'];

           

           if(isset($_POST['submit'])){

       $crnt_pass = $_POST['crntPass'];
       $new_username = $_POST['new-username'];
       
       $check_query = "SELECT * FROM bank_details WHERE username = '$new_username' and email = '$tempEmail'";
       $send_check_query = mysqli_query($connection, $check_query);

      if(empty($crnt_pass) || empty($new_username)){
 
         echo "<h3 class = 'warning-msg'>Fields Can Not be Empty!</h3>";

      }else if($pass != $crnt_pass){
          
        echo "<h3 class = 'warning-msg'>Current password does not match with database!</h3>";
        
      }else if($uNameAttempts > 3){

        echo "<h3 class = 'warning-msg'>Your Attempts of changing username are Over!</h3>";

      }else if(!$send_check_query || mysqli_num_rows($send_check_query) == true){

        echo "<h3 class = 'warning-msg'>Username is already in the use!</h3>";

      }else{
        $uNameAttempts = $uNameAttempts  + 1;
        
        echo "<script>alert('Username Changed successfully!');</script>";
        $update_query = "UPDATE row_bank_data SET uNameAttempts = '$uNameAttempts' where email = '$tempEmail'";  

        $update_username_query = "UPDATE bank_details SET username = '$new_username' where email  = '$tempEmail'";

        $send_query = mysqli_query($connection, $update_query);
        $send_query1 = mysqli_query($connection, $update_username_query);
        echo "<h3 class = 'success-msg'>Username Changed successfully!</h3>";
            
      }  

   } 
          
        
?>

<script>




</script>



<style>
  
  .warning-msg{

    position:absolute;
    top:80%;
    left:65%;
    transform:translate(-65%, -65%);
    padding:15px;
    background-color:red;
    border-radius:10px;
    color:white;
    text-align:center;
  }

  .success-msg{

    position:absolute;
    top:80%;
    left:65%;
    transform:translate(-65%, -80%);
    padding:15px;
    background-color:green;
    border-radius:10px;
    color:white;
    text-align:center;

  }
  
    .head-img{
    height: 127px;
    width: 127px;
    border-radius: 50%;
    position: absolute;
    top: 52px;
    left: 9.5%;
    cursor:pointer;
 }

   .head-img:hover{

         

   }

.name-col{
      
      font-size: 40px;
      font-family: Arial;
      font-weight: bold;
	  position: absolute;
	  top: 160px;
    left: 85px;
    color:BLACK;
} 



</style>



<!DOCTYPE html>
<html>
<head>

	<title>State bank of nandurghat</title>
    
  <link rel="stylesheet" type="text/css" href="cngUsername.css">

  </head>
  <body>

      <div class = "main-layout">


         <div class="side-col">
             
             <!-- <img class = "head-img" src="aniket_photo.jpg" alt="Avatar"> -->
             <!-- <h6  class="name-col"></h6> -->
             <button class="profilePic-cng-btn">Change Picture</button>
             <div class="list">
               <ul>
                <li onclick="window.location.href = 'profilePage.php'">PROFILE</li>
                <li onclick = "window.location.href = 'settingPage.php'">STTINGS</li>
                <li onclick = "window.location.href = 'securityPage.php'">SECURITY</li>
                <li onclick="window.location.href = 'bankHome.php'">HOME</li>
              </ul>
             </div>

         <p onclick="window.location.href = 'logout.php'"class="logout-btn">LOGOUT</p>


       <div class="uName-pass-container">
          
             <form action="cngUsername.php" method = "POST">
               
             <span>Current Password:</span> <input class = "pass-field" type="password" name="crntPass">
             <br>
             <span>New Username:</span> <input class = "username-field" type="text" name="new-username">
             <br>
             <input class="submit-btn" type="submit" name="submit" value ="Change">
  
             </form>
                  
       </div>

       <div class="warning-para-cont">
            
            <p class = "warning-para">Username can be changed Only <span class = "para-span">Thrice</span> since your account is  Opened. So please choose your Username wisely!</div>

      </div>

     <script>
          
//           document.querySelector('.submit-btn').addEventListener('click', function(){
           
//            if(<?php  $pass ?> == <?php  $crnt_pass ?>){
          
//              alert('Account Deleted Successfully!');
//           }   
//    });

     </script>

   </body>
</html>
