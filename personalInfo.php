<?php 

  session_start();
   $tempEmail = $_SESSION['email'];

   $connection = mysqli_connect("localhost:3307", "root", "", "banking_db") or die("Connection FAILED!");
   $activation_query = mysqli_query($connection, "SELECT * FROM bank_details WHERE email = '$tempEmail'");
       $activation_fetch_query = mysqli_fetch_array($activation_query);
       $activation_key = $activation_fetch_query['isInfoSubmit'];

   if(!isset($tempEmail)){

       header("Location: signin.php");

   }else if($activation_key == 1){

             header("Location: bankProfile.php");
       
   }else{

 if(isset($_POST['submit'])) {
    $fName = $_POST['Fname'];
    $mName = $_POST['Mname'];
    $lName = $_POST['Lname'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $pincode = $_POST['pinCode'];
    $gender = $_POST['gender'];
    $profilePic = $_FILES['image']['tmp_name'];
 
    $isPageActive = 0;

   $fName = trim($fName);
   $mName = trim($mName);
   $lName = trim($lName);
   $city = trim($city);

 
  $connection = mysqli_connect("localhost:3307", "root", "", "banking_db") or die("Connection FAILED!");
    
  $fileName = $_FILES['image']['name'];  
  $fileTmpName = $_FILES['image']['tmp_name']; 
  $folder = 'upload_images/';

  


   $mobile_string = strlen((string) $mobile);
   $pincode_string = strlen((string) $pincode); 

     $mobile_check_query = "SELECT * FROM bank_deatils";

     $query_mobile = mysqli_query($connection, $mobile_check_query);
      
          
            
   if(empty($fName)||empty($mName)||empty($lName)||empty($mobile)||empty($city)||empty($age)||empty($pincode)|| empty($gender)){

     echo "<h3 class = 'warning-msg'>Fileds can Not be Empty!</h3>";
    

   }else if($mobile_string != 10){
          
     echo "<h3 class = 'warning-msg'>Recheck your phone number!</h3>";
             
   }else if(strlen($pincode_string != 6)){
    
     echo "<h3 class = 'warning-msg'>pincode has to be of 6 characters only!</h3>";       
             
   }else if($age > 99 || $age<10){

     echo "<h3 class = 'warning-msg'>Are you the Captain America?</h3>";
   }        
  //   }else if($query_mobile || mysqli_num_rows($query_mobile) == false){
   
  //    echo "<h3 class = 'warning-msg'>This phone number is already used in the database!</h3>";
      
    else{

        $isInfoSubmit = 1;
     $insert_query = " UPDATE `bank_details` SET Fname = '$fName', Mname='$mName', Lname= '$lName', mobile='$mobile', 
     gender = '$gender', city= 'city', age='$age', pincode='$pincode', isInfoSubmit = $isInfoSubmit WHERE email ='$tempEmail' ";
       
       move_uploaded_file($fileTmpName, $folder.$fileName);
     $insert_profile_pic = "UPDATE bank_details SET profilePic = '$fileName' WHERE email = '$tempEmail'";
         mysqli_query($connection, $insert_profile_pic);


         $query = mysqli_query($connection, $insert_query);
         echo "<h3 class = 'success-msg'>Information submitted Successfully!</h3>";
          header("Location: profilePage.php");
    }

  } 

}    


//   $profilePic = $_FILES['image']['tmp_name'];

// $connection = mysqli_connect("localhost:3307", "root", "", "banking_db");

//   $filename = $_FILES['image']['name'];  
//   $fileTmpName = $_FILES['image']['tmp_name']; 
//   $folder = 'upload_images/';

// move_uploaded_file($fileTmpName, $folder.$filename);

// $insert_query = "INSERT INTO `photos_bank_db`(`image`, date) VALUES ('$filename', NOW())";
// //   $sql = "INSERT INTO photos_bank_db(image) VALUES ('$filename')";
//   mysqli_query($connection, $insert_query);

// $select_query = "SELECT * FROM photos_bank_db WHERE id = 26";
//   $query2 = mysqli_query($connection, $select_query);

//       $data = mysqli_fetch_array($query2);

//          echo "<img src='upload_images/".$data['image']."'>";
    
?>

<style>
  
  .warning-msg{
  text-align:center;  
  color:red;  
 position:absolute;
  bottom:25px;
  left:50%;
  transform:translateX(-50%);
  
  }

  .success-msg{
  text-align:center;  
  color:green;  
 position:absolute;
  bottom:25px;
  left:50%;
  transform:translateX(-50%);

  }

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>state bank of Nandurghat</title>
    <link rel="stylesheet" type="text/css" href="personalInfo.css">

</head>
<body>
    
     <div class="main-layout">
         
         <div class="Form-Element">
        
             <form action="personalInfo.php" method = "POST" enctype="multipart/form-data">
            
                 <div class= "testDiv">First Name: &nbsp; <input type="text" name="Fname" ?></div> 
                 <br>
                 <div class= "testDiv">Father Name:<input type="text" name="Mname"></div> 
                 <br>
                 <div class= "testDiv">Last Name: &nbsp; <input type="text" name="Lname"></div>
                 <br>
                 <div class= "mobileField">Mobile: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;<input type="number" name="mobile"></div> 
                 <br>
                 <div class= "testDiv">Gender: </div>
                 
                  <div class= "radioOption">
                     <input class = "radioM" type="radio" name="gender" value="male">Male
                 
                     <input class = "radioF" type="radio" name="gender" value="female">Female
                 
                     <input class = "radioO" type="radio" name="gender" value="other">Other
                  </div>
                     <br>
                     <div class= "testDiv">City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="city"></div>
                     <br>
                    <div class= "ageField">Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="age"></div>
                     <br>
                      <div class= "pinField">PIN code:&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;<input type="number" name="pinCode"></div>
                  
                     <div><p class="profile-name">Profle Picture: </p><input type="file" name="image" id="fileToUpload"></div>

                    <input type="submit" name="submit" value="save">


                 
             </form>

          </div>
         <div class="Notice-Board">
             <h4 class = "note">NOTICE</h4>
             <p class = "warning-para"><span>*</span>All the fields except 
             'profile picture' are mandatory. Please fill out all the fields to proceed further.</p>
           
         </div> 

     </div>


</body>
</html>