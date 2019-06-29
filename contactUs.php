<?php

    if(isset($_POST['submit'])){

       $name = $_POST['feedback-name'];
       $email = $_POST['feedback-email'];
       $subject = $_POST['feedback-subject'];
       $msg = $_POST['feedback-msg'];
       $isGetSuccess;
       
       $name = trim($name);
       $subject = trim($subject);
       $msg = trim($msg);
    
         $connection = mysqli_connect("localhost:3307", "root", "", "banking_db");
        
         if(empty($name) || empty($email) || empty($msg)){
         
               $isGetSuccess = false;   

         }
            else{

               $query = "INSERT INTO feedback_table (`id`, `name`, `email`, `subject`, `message`, date) 
                         VALUES('', '$name', '$email', '$subject', '$msg', NOW())";

               $send_query = mysqli_query($connection, $query);

                 $isGetSuccess = true;

         }
           
    }

?>

<style>

    .warning-msg{
      
      color:red;
      position:absolute;
      left:50%;
      transform:translateX(-50%);

    }

    .success-msg{
       
      color:green;  
      position:absolute;
      left:50%;
      transform:translateX(-50%);


    }


</style>




<!-- ...................................................HTML............................................................................... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type = "text/css" href="contactUs.css">
    <title>Contact Us</title>
</head>
<body>

            <div class="header">

                        <div class="header-logo">
                              <img class="logo-img1" src="bank_logo1.png" width="120" height="125">
                        </div>
                
                        <div class="list-container">
                           <ul class="ulist">
                                   <li class="header-list-item" onclick="window.location.href='bankProfile.php'">HOME</li>
                              <li class="header-list-item" onclick="window.location.href='profilePage.php'">PROFILE</li>
                              <li class="header-list-item">ABOUT US</li>
                              <li class="header-list-item" onclick="window.location.href='contactUs.html'">CONTACT</li>
                           </ul>
                        </div>
                    </div>
    
   
      <div class="main-container">

            <ul class = "contact-list-container">

                 <li class= "top-name">ADDRESS: <span class= "address-span">Wadeshwar Nagar, Wadgaon sheri pune 411014</span></li>
                 <br>
                 <li>Website : <span>statebanknandurghat.com</span></li>
                 <br>
                 <li>CONTACT : <span>9860797374</span></li>
                 <br>
                 <li>EMAIL : <span>aniket.jadhav.8151@gmail.com</span></li>
                 

            </ul>

      </div>

          <div class = "feedback-form">
                  <label class="feedback-head">FEEDBACK</label>                
              <form action = "contactUS.php" method="POST">
                        <label>Name *</label>
                        <br>
                        <input type="text" name = "feedback-name">.
                        <br>
                        <label>Your Email *</label>
                        <br>
                        <input type="email" name = "feedback-email">
                        <br>
                        <label>Subject</label>
                        <br>
                        <input type="text" name = "feedback-subject">
                        <br>
                        <label>Your Message *</label>
                        <br>
                        <textarea rows="4" coloum="5" name="feedback-msg"></textarea>
                        <br>
                       <input type = "submit" name="submit" value="submit"> 

                       <label><?php 
                        if(isset($isGetSuccess)){
                              
                              if($isGetSuccess == true){
                                  echo "<h3 class = 'success-msg'>Query Sent Successfully!</h3>";     
                              }else{

                                  echo "<h3 class = 'warning-msg'>Fields can not be Emptey!</h3>";

                             }
                        } 
                         ?>
                      </label>
                       

              </form>

          </div>
      
   
      <div class = "footer">
    
                  <div class = "footer-logo">
                          <img class="footer_logo-img" src="bank_logo2.svg" width="128" height="130">
                  </div>
            
                  <div class="footer-list">
                       <ul class="footer-ulist">
                          <li class="footer-list-item">ABOUT US</li>
                          <li class="footer-list-item" onclick="window.location.href='contactUs.php'">CONTACT</li> 
                          <li class="footer-list-item" onclick="window.location.href='contactUs.php'">FEEDBACK</li>
                       </ul>
                  </div>
            
                   <p class="copyright-warn">Copyright 2019 - SBN Innovation Technologies Private Limited</p>
            
               </div>

               

  </body>
</html>