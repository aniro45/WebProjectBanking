<?php
  
       session_start();
       $tempEmail =  $_SESSION['email'];

        if(!isset($tempEmail)){

          header("Location: signin.php"); 

        }

           $conf_pass = $_POST['confirmPass'];

       $connection = mysqli_connect("localhost:3307", "root", "", "banking_db");
           
    $select_query = "SELECT * FROM bank_details WHERE email = '$tempEmail'";

       $query = mysqli_query($connection, $select_query);
       $data = mysqli_fetch_array($query);

          $fName = $data['Fname'];
          $lName = $data['Lname'];
          $pass =  $data['pass'];

          echo "<p class = 'name-col'>$fName $lName</p>";
          echo "<img class = 'head-img' src='upload_images/".$data['profilePic']."' onclick='window.location = \".php\"'/>";         

          if($pass == $conf_pass){
            //   echo "Hello World!";
               echo "<script> var x = document.querySelector('.change-pass-container');
               x.style.display = 'none';</script>";

            echo "<script>alert('Hello World!');</script>";
          }
?>

<script>

        // function fieldChange(){
  
        //     document.querySelector('.submit-btn').addEventListener('click', function(){
         
        //     var x = document.querySelector('.change-pass-container');
        //         x.style.display = "block";
            
        //     )};
    } 

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
         
             <span>Confirm Password:</span> <input type="password" name="confirmPass">
             <br>
             <input class="submit-btn" type="submit" name="submit" value ="confirm" >

                
             </form>
      
       
       </div>

      </div>

   </body>
</html>
