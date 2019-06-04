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
  
      
      if(empty($crnt_pass)){
 
            echo "<h3 class = 'warning-msg'>Field Can Not be Empty!</h3>";

      }else if($pass != $crnt_pass){

        echo "<h3 class = 'warning-msg'>Current password does not match with database!</h3>";

      } else{
          
        echo "<script>alert('Accounnt Deleted Successfully!');</script>";
        $delete_query = "DELETE FROM `bank_details` WHERE email = '$tempEmail'";

        $send_query = mysqli_query($connection, $delete_query);

        echo "<h3 class = 'success-msg'>Account deleted Successfully!</h3>";

        
            
            sleep(3);
            
            header("Location: signin.php");
            session_destroy();

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
    
  <link rel="stylesheet" type="text/css" href="deactivateAcc.css">

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
          
             <form action="deactivateAcc.php" method = "POST">
         
             <span>Current Password:</span> <input class = "crnt-pass-field" type="password" name="crntPass">
             <br>
             <input class="submit-btn" type="submit" name="submit" value ="Delete">
  
             </form>
                  
       </div>

       <div class="warning-para-cont">
            
            <p class = "warning-para">This Section is very sensitive and can do a Potential Damage to an account. 
               
             It is <span class = "para-span">Impossible</span> to recover an account once it is deleted! Please Go back If you are not Sure about this!</p>
    
            </div>

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
