<?php
     
       session_start();
       $tempEmail =  $_SESSION['email'];
       $connection = mysqli_connect("localhost:3307", "root", "", "banking_db");
       $activation_query = mysqli_query($connection, "SELECT * FROM bank_details WHERE email = '$tempEmail'");
       $activation_fetch_query = mysqli_fetch_array($activation_query);
       $activation_key = $activation_fetch_query['isInfoSubmit'];

     if($activation_key == 0){

         header("Location: personalInfo.php");
          
     }else{
         
  
    $select_query = "SELECT * FROM bank_details WHERE email = '$tempEmail'";
    $select_query2 = "SELECT * FROM const_bank_fields WHERE IFSC = 'SBNA0015734'";


    $query = mysqli_query($connection, $select_query);
    $query2 = mysqli_query($connection, $select_query2);

     $data = mysqli_fetch_array($query);
     $const_data = mysqli_fetch_array($query2); 

          $emailData = $data['email'];
          $usernameData = $data['username'];
          $accountNumber = $data['accountNo']; 
          $ifscCode = $const_data['IFSC'];
          $mobile = $data['mobile'];
          $fName = $data['Fname'];
          $lName = $data['Lname'];
  
          echo "<p class = 'test1'>$emailData</p>";
          echo "<p class = 'test2'>$usernameData</p>";
          echo "<p class = 'test3'>$accountNumber</p>";
          echo "<p class = 'test4'>$ifscCode</p>";
          echo "<p class = 'test5'>$mobile</p>";
          echo "<p class = 'name-col'>$fName $lName</p>";
          echo "<img class = 'head-img' src='upload_images/".$data['profilePic']."' onclick='window.location = \".php\"'/>";         

     }
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
  
.test1{

  color:red;
  position:absolute;
  top: 22.4%;
  left: 44%;

}

.test2{

  color:red;
  position:absolute;
  top: 7.4%;
  left: 45%;

}

.test3{

  color:red;
  position:absolute;
  top: 508.5px;
  left: 48.3%; 

}

.test4{

  color:red;
  position:absolute;
  top: 52.6%;
  left: 46%;

}

.test5{

  color:red;
  position:absolute;
  top: 37.5%;
  left: 44%;


}


</style>



<!DOCTYPE html>
<html>
<head>

	<title>State bank of nandurghat</title>
    
  <link rel="stylesheet" type="text/css" href="profilePage.css">

  </head>
<body>

    <div class = "main-layout">
        

    <div class="side-col">
             
             <!-- <img class = "head-img" src="aniket_photo.jpg" alt="Avatar"> -->
             <!-- <h6  class="name-col"></h6> -->

           <div class="list">
              <ul>
                <li onclick="window.location.href = 'profilePage.php'">PROFILE</li>
                <li onclick = "window.location.href = 'settingPage.php'">STTINGS</li>
                <li onclick = "window.location.href = 'securityPage.php'">SECURITY</li>
                <li onclick="window.location.href = 'bankHome.php'">HOME</li>
              </ul>
           </div>

         <p onclick="window.location.href = 'logout.php'"class="logout-btn">LOGOUT</p>

      </div>
    
    <div class=info-field-attribute> 
      <h6 class="info-field-1">Username:</h6>
      <h6 class="info-field-2">Email:</h6>
      <h6 class="info-field-3">Mobile:</h6>
      <h6 class="info-field-4">IFSC Code:</h6>
      <h6 class="info-field-5">Account Number:</h6>
    </div> 


      <button class = "acc-details-btn">CHECK BALANCE DETAILS HERE</button>

  </div> 
        
</body>
</html>
