<?php 

  session_start();
   $tempEmail = $_SESSION['email'];

 if(isset($_POST['submit'])) {
    $fName = $_POST['Fname'];
    $mName = $_POST['Mname'];
    $lName = $_POST['Lname'];
    $mobile = $_POST['mobile'];
    
    $city = $_POST['city'];
    $age = $_POST['age'];
    $pincode = $_POST['pinCode'];

    if(!isset($_POST['submit'])){
      $gender = $_POST['gender'];

}
 
  $connection = mysqli_connect("localhost:3307", "root", "", "banking_db") or die("Connection FAILED!");

       $mobile_check_query = "SELECT * FROM bank_deatils";

       $query_mobile = mysqli_query($connection, $mobile_check_query);

      if(empty($fName)||empty($mName)||empty($lName)||empty($mobile)||empty($city)||empty($age)||empty($pincode)||empty($gender)){

        echo "<h3 class = 'warning-msg'>Fileds can Not be Empty!</h3>";

    }else if(strlen($mobile != 10)){
          
        "<h3 class = 'warning-msg'>Recheck your phone number!</h3>";
      
    }else if(mysqli_num_rows($query_mobile) == true){
   
        echo "<h3 class = 'warning-msg'>This phone number is already used in the database!</h3>";
      
      }else if($age > 99){

        echo "<h3 class = 'warning-msg'>Are you Captain America?</h3>";

      }else if(strlen($pincode != 6)){
    
        "<h3 class = 'warning-msg'>pincode has to be of 6 characters only!</h3>";       
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
    }
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
            
                 <div class= "testDiv">First Name: &nbsp; <input type="text" name="Fname"></div> 
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
             <p class = "warning-para"><span>*</span>All the fields except 'profile picture' are mandatory. Please fill out all the fields to proceed further.</p>
           
         </div> 

     </div>


</body>
</html>