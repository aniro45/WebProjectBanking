<?php 

  session_start();
   $tempEmail = $_SESSION['email'];

   if(!isset($tempEmail)){
     header("Location: signin.php");
     
   }

   $connection = mysqli_connect("localhost:3307", "root", "", "banking_db") or die("Connection FAILED!");
   $myQuery = mysqli_query($connection, "SELECT * FROM bank_details WHERE email = '$tempEmail'");
       $fetch_myQuery = mysqli_fetch_array($myQuery);
       $activation_key = $fetch_myQuery['isInfoSubmit'];


  

       $myFname = $fetch_myQuery['Fname'];
       $myMname = $fetch_myQuery['Mname'];
       $myLname = $fetch_myQuery['Lname'];
       $myMobile = $fetch_myQuery['mobile'];
       $myGender= $fetch_myQuery['gender'];
       $myCity= $fetch_myQuery['city'];
       $myAge = $fetch_myQuery['age'];
       $myPincode = $fetch_myQuery['pincode'];
        
      
 if(isset($_POST['submit'])) {
    $fName = $_POST['Fname'];
    $mName = $_POST['Mname'];
    $lName = $_POST['Lname'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $pincode = $_POST['pinCode'];
    $gender = $_POST['gender'];

 
    $isPageActive = 0;

   $fName = trim($fName);
   $mName = trim($mName);
   $lName = trim($lName);
   $city = trim($city);
  


   $mobile_string = strlen((string) $mobile);
   $pincode_string = strlen((string) $pincode); 

     $mobile_check_query = "SELECT * FROM bank_deatils";

     $query_mobile = mysqli_query($connection, $mobile_check_query);
      
          
   if(empty($fName)||empty($mName)||empty($lName)||empty($mobile)||empty($city)||empty($age)||empty($pincode)|| empty($gender)){

     echo "<h3 class = 'warning-msg'>Fileds can Not be Empty!</h3>";

     
   }else if($mobile_string != 10){
          
     echo "<h3 class = 'warning-msg'>Recheck your phone number!</h3>";
             
   }else if(strlen($pincode_string != 6)){
    
     echo "<h3 class = 'warning-m
     sg'>pincode has to be of 6 characters only!</h3>";       
             
   }else if($age > 99){

     echo "<h3 class = 'warning-msg'>Are you the Captain America?</h3>";
   }else if($age < 0){

    echo "<h3 class = 'warning-msg'>Age can not be negative!</h3>";

   }
  //   }else if($query_mobile || mysqli_num_rows($query_mobile) == false){
   
  //    echo "<h3 class = 'warning-msg'>This phone number is already used in the database!</h3>";
      
     else{ 


       $isInfoSubmit = 1;
       $insert_query = " UPDATE `bank_details` SET Fname = '$fName', Mname='$mName', Lname= '$lName', mobile='$mobile', 
          gender = '$gender', city= '$city', age='$age', pincode='$pincode', isInfoSubmit = $isInfoSubmit WHERE email ='$tempEmail' ";
    
       $query = mysqli_query($connection, $insert_query);
      //  header("Location: fullProfileView.php");
       echo "<h3 class = 'success-msg'>Information submitted Successfully!</h3>";
      //  echo "<p class = 'warn-msg'>Please refresh page to see changes</p>";    
          
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

<script>

     var x = document.querySelector('.success-msg');

    //  x.delay(3200).fadeOut(300);

</script>

<style>

   .warn-msg{

    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    color:red;
    font-size:18px;

   }
  
  .warning-msg{
  text-align:center;  
  color:white;  
 position:absolute;
  bottom:25px;
  left:50%;
  transform:translateX(-50%);
  transform: transition(2s);
  padding:20px;
  background-color: red;
  box-sizing:border-box;
  border-radius:10px;
  letter-spacing:1px;
  }

  .success-msg{
  text-align:center;  
  color:white;  
 position:absolute;
  bottom:10%;
  left:50%;
  transform:translateX(-50%);
  padding:20px;
  background-color: green;
  box-sizing:border-box;
  border-radius:10px;
  display:block;
  font-family:arial;
  }

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>state bank of Nandurghat</title>
    <link rel="stylesheet" type="text/css" href="fullProfileView.css">
    

</head>
<body>

    
     <div class="main-layout">
         
         <div class="Form-Element">
        
             <form action="fullProfileView.php" method = "POST" enctype="multipart/form-data">
            
                 <div class= "testDiv">First Name: &nbsp; <input type="text" name="Fname" value="<?php echo $myFname; ?>"></div> 
                 <br>
                 <div class= "testDiv">Father Name:<input type="text" name="Mname" value="<?php echo $myMname; ?>"></div> 
                 <br>
                 <div class= "testDiv">Last Name: &nbsp; <input type="text" name="Lname" value="<?php echo $myLname; ?>"></div>
                 <br>
                 <div class= "mobileField">Mobile: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;<input type="number" name="mobile" value="<?php echo $myMobile; ?>"></div> 
                 <br>
                 <div class= "testDiv">Gender: </div>
                 
                  <div class= "radioOption" >
                     <input class = "radioM" type="radio" name="gender" value="male" <?php if($myGender == "male"){echo "checked";} ?>>Male
                 
                     <input class = "radioF" type="radio" name="gender" value="female" <?php if($myGender == "female"){echo "checked";} ?>>Female
                 
                     <input class = "radioO" type="radio" name="gender" value="other" <?php if($myGender == "other"){echo "checked";} ?>>Other
                  </div>
                     <br>
                     <div class= "testDiv">City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="city" value="<?php echo $myCity; ?>"></div>
                     <br>
                    <div class= "ageField">Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="age" value="<?php echo $myAge; ?>"></div>
                     <br>
                      <div class= "pinField">PIN code:&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;<input type="number" name="pinCode" value="<?php echo $myPincode; ?>"></div>
                  
                     <!-- <div><p class="profile-name">Profle Picture: </p><input type="file" name="image" id="fileToUpload"></div> -->

                    <input class = "save-btn" type="submit" name="submit" value="Save">

             </form>
              
             <button class="edit-btn" id="edit-btnx">Edit</button>
             <button class = "backToProfile-btn" onclick = "window.location.href='profilePage.php'"> << Back To Profile</button>

          </div>
     </div>

     <script>     
               
       
              // var z = document.getElementsByTagName("INPUT")[10];
              // z.style.pointerEvents = "none";                  

           document.querySelector('.edit-btn').addEventListener('click', function(){
              
              
              // if(documnet.querySlector('.edit-btn').innerHTML = "Edit"){

                 

                       
              // }
            var x = document.querySelector('.edit-btn');
             x.style.color = "red";

            
            var z = document.getElementsByTagName("INPUT")[0];
            var za = document.getElementsByTagName("INPUT")[1];
            var zb= document.getElementsByTagName("INPUT")[2];
            var zc = document.getElementsByTagName("INPUT")[3];
            var zd = document.getElementsByTagName("INPUT")[4];
            var ze = document.getElementsByTagName("INPUT")[5];
            var zf = document.getElementsByTagName("INPUT")[6];
            var zg = document.getElementsByTagName("INPUT")[7];
            var zh = document.getElementsByTagName("INPUT")[8];
            var zi = document.getElementsByTagName("INPUT")[9];
            var zj = document.getElementsByTagName("INPUT")[10];

            z.style.pointerEvents = "auto";
            za.style.pointerEvents = "auto";
            zb.style.pointerEvents = "auto";
            zc.style.pointerEvents = "auto";
            zd.style.pointerEvents = "auto";
            ze.style.pointerEvents = "auto";
            zf.style.pointerEvents = "auto";
            zg.style.pointerEvents = "auto";
            zh.style.pointerEvents = "auto";
            zi.style.pointerEvents = "auto";
            zj.style.pointerEvents = "auto";
            
            x.style.display = "none";
             
            var y = document.querySelector('.save-btn');
            y.style.display = "block";  
            });

     </script>

     <!-- <script src="fullProfileView.js"></script> -->

</body>
</html>