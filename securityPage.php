<?php
  
       session_start();
       $tempEmail =  $_SESSION['email'];

        if(!isset($tempEmail)){

          header("Location: signin.php"); 

        }

        // echo "<script>alert('This Page is Sensitive. Please handle with care!');</script>";

       $connection = mysqli_connect("localhost:3307", "root", "", "banking_db");
           
    $select_query = "SELECT * FROM bank_details WHERE email = '$tempEmail'";

       $query = mysqli_query($connection, $select_query);
       $data = mysqli_fetch_array($query);

          $fName = $data['Fname'];
          $lName = $data['Lname'];
  
          echo "<p class = 'name-col'>$fName $lName</p>";
          echo "<img class = 'head-img' src='upload_images/".$data['profilePic']."' onclick='window.location = \".php\"'/>";         
     
          
?>

<script>


</script>

<style>
  
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
      
      font-size: 35px;
      font-family: Arial;
      font-weight: bold;
	  position: absolute;
	  top: 160px;
    left: 85px;
}   

</style>



<!DOCTYPE html>
<html>
<head>

	<title>State bank of nandurghat</title>
    
  <link rel="stylesheet" type="text/css" href="securityPage.css">

  </head>
<body>

    <div class = "main-layout">


    <div class="side-col">
             
             <!-- <img class = "head-img" src="aniket_photo.jpg" alt="Avatar"> -->
             <!-- <h6  class="name-col"></h6> -->
             <button class="profilePic-cng-btn">Change Picture</button>
           <div class="list">
             <ul>
                <li onclick = "window.location.href = 'profilePage.php'">PROFILE</li>
                <li onclick = "window.location.href = 'settingPage.php'">STTINGS</li>
                <li onclick = "window.location.href = 'securityPage.php'">SECURITY</li>
                <li onclick = "window.location.href = 'bankHome.php'">HOME</li>
             </ul>
           </div>

         <p onclick="window.location.href = 'logout.php'"class="logout-btn">LOGOUT</p>

      </div>

           <div class = "main-component-container">
           
              <h4 class = "security-compo-1">Change Password :</h4>

              <h4 class = "security-compo-2">Change Username :</h4>   
             
              <h4 class = "security-compo-3">Deactivate Account :</h4>
  
           </div>

           <div class = "main-para-container">
           
                 <p class = "security-para-1">If you get any kind of security issue like hacking, 
                   please change the password, changing password is best way to not to get hacked!</p>

                 <p class = "security-para-2">Username can be changed only thrice since account is Opened. 
                   So please Choose your UNIQUE Username wisely!</p>   

                 <p class = "security-para-3"><span class = "warn-span">WARNING :</span> This field is Very sensitive.
                   Go back If you are not sure. You can <span class="not-span">NOT</span>  Recover an account once it's deleted!</p>
  
           </div>

           <div class = "main-btn-container">

               <button class="security-btn-1" onclick="window.location.href = 'changePass.php'">Change Password</button>
               <button class="security-btn-2" onclick="window.location.href = 'cngUsername.php'">Change Username</button> 
               <button class="security-btn-3" onclick="window.location.href = 'deactivateAcc.php'">Deactivate Account</button>   

           </div>
  </div> 
        
</body>
</html>
