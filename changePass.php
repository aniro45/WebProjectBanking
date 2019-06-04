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
        echo "<img class = 'head-img' src='upload_images/".$data['profilePic']."' onclick='window.location = \".php\"'/>";   
          
        
          if(isset($_POST['submit'])){

       $crnt_pass = $_POST['crntPass'];
       $new_pass = $_POST['newPass'];
       $conf_new_pass = $_POST['confNewPass'];
  
      
      if(empty($crnt_pass) || empty($new_pass) || empty($conf_new_pass) ){
 
            echo "<h3 class = 'warning-msg'>Fields Can Not be Empty!</h3>";

      } else if(strlen($new_pass) < 3){

        echo "<h3 class = 'warning-msg'>Password should be at least of 8 charachters!</h3>";

      } else if($new_pass != $conf_new_pass){

        echo "<h3 class = 'warning-msg'>Password does not match!</h3>";

      }else if($pass != $crnt_pass){

        echo "<h3 class = 'warning-msg'>Current password does not match with database!</h3>";

      } else{

        $update_query = "UPDATE `bank_details` SET pass = '$new_pass' where email = '$tempEmail'";

        $send_query = mysqli_query($connection, $update_query);

        echo "<h3 class = 'success-msg'>Password Changed Successfully!</h3>";

      }  

    //   if($new_pass == $conf_new_pass){
        
    //       if($pass == $crntf_pass){
           
    //            
          
    //    } 
           
    // }  

   } 
          
        
?>

<script>


</script>



<style>
  
  .warning-msg{

    position:absolute;
    top:80%;
    left:66%;
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
    left:67%;
    transform:translate(-67%, -80%);
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
    
  <link rel="stylesheet" type="text/css" href="changePass.css">

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

       <div class="change-pass-container">
          
             <form action="changePass.php" method = "POST">
         
             <span>Current Password:</span> <input class = "crnt-pass-field" type="password" name="crntPass">
             <br>
             <span>New Password:</span> <input class = "new-pass-field" type="password" name="newPass">
             <br>
             <span>Confirm New Password:</span> <input class = "conf-new-pass-field" type="password" name="confNewPass">
             <br>
             <input class="submit-btn" type="submit" name="submit" value ="confirm">
  
             </form>
                  
       </div>

      </div>

     <script>
      
  //         document.querySelector('.submit-btn').addEventListener('click', function(){
          
  //          var z = document.querySelector('.');
  //            z.style.color = "red";
           
  //  });

     </script>

   </body>
</html>
