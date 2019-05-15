<?php 

   session_start();

if(!isset($_SESSION['email'])){

 header("Location: signin.php");
 

}else{

  
  echo "<h3>welcome". " " . $_SESSION['email'] . " " . "to the SBN Bank!</h3>";

}

 ?>

 <style>

  h3{
    
    color: red;
  	position: absolute;
  	top:1%;
  	left:36%;
  } 	
   

 </style>




<!DOCTYPE html>
<html>
<head>
	<title>State bank of Nandurghat</title>
    
    <link rel="stylesheet" type="text/css" href="bankProfile.css">

</head>
<body>
 <div class="main">

    <div class="header">

        <div class="header-logo">
        	<img class="logo-img1" src="bank_logo1.png" width="120" height="125">
        </div>

        <div class="list-container">
           <ul class="ulist">
        	  <li class="header-list-item">HOME</li>
              <li class="header-list-item" onclick="window.location.href='profilePage.php'">PROFILE</li>
              <li class="header-list-item">ABOUT US</li>
              <li onclick="window.location.href = 'signin.php'"class="header-list-item">CONTACT</li>
           </ul>
        </div>

        <button class ="logout-btn" onclick="window.location.href = 'logout.php'">LOGOUT</button>
    </div>

    <div class="middle">
       <img class="banking_banner2" src="banking_banner2.png">	

        <h1 class = "welcome-heading">WELCOME TO SBN BANK</h1>	
         <!-- <h4 class="tesing" id="xtesting">Testing Testing</h4> -->
       <img class = "banner-img" src="bank_info_banner.png" width="1516.5" height="500">
       
       <img class="banking_banner3" src="banking_banner3.jpg">

    </div>

   <div class = "footer">
    
      <div class = "footer-logo">
       	 <img class="footer_logo-img" src="bank_logo2.svg" width="128" height="130">
      </div>

      <div class="footer-list">
           <ul class="footer-ulist">
              <li class="footer-list-item">ABOUT US</li>
              <li class="footer-list-item">CONTACT</li> 
              <li class="footer-list-item">FEEDBACK</li>
           </ul>
      </div>

       <p class="copyright-warn">Copyright 2019 - SBN Innovation Technologies Private Limited</p>

   </div>

</div>


</body>
</html>
