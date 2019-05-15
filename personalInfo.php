

<?php 







?>






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
        
             <form action="personalForm.php" method = "POST">
            
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
                 
                     <input class = "radioF" type="radio" name="gender" value="female">female
                 
                     <input class = "radioO" type="radio" name="gender" value="other">Other
                  </div>
                     <br>
                     <div class= "testDiv">City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="city"></div>
                     <br>
                    <div class= "ageField">Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="Age"></div>
                     <br>
                      <div class= "pinField">PIN code:&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;<input type="number" name="pinCode"></div>
                  
                     <div><p class="profile-name">Profle Picture: </p><input type="file" name="fileToUpload" id="fileToUpload"></div>

                    <input type="submit" name="pincode" value="save">


                 
             </form>

          </div>
         <div class="Notice-Board">
             <h4 class = "note">NOTICE</h4>
             <p class = "warning-para"><span>*</span>All the fields are mandatory. Please fill out all the fields to proceed further.</p>
         </div>   
     </div>


</body>
</html>