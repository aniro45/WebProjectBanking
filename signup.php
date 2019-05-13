<?php 

  // include("php_functions.php");

if(isset($_POST['submit'])){
      
echo '<link rel="shortcut icon" href="faviconBank.png" type="image/x-icon"/>';

   $PORT_DB = "localhost:3307";
   $USERNAME_DB = "root";
   $PASS_DB= "";
   $NAME_DB = "banking_db"; 

   $connection = mysqli_connect($PORT_DB, $USERNAME_DB, $PASS_DB, $NAME_DB) or die("CONNECTION FAILED!");
         
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $Cpassword = $_POST['cpass'];


   $select_query1 = "SELECT * FROM bank_details WHERE email = '$email'";
   $select_query2 = "SELECT * FROM bank_details WHERE username = '$username'";
  
   $query1 = mysqli_query($connection, $select_query1);
   $query2 = mysqli_query($connection, $select_query2);
   

    if(empty($email) && empty($username) && empty($password) && empty($Cpassword)){
   
       echo "<h3>Fields can not be blank!</h3>";
      

    }else if(empty($email) || empty($username)){
      
     echo "<h3>Please fill remaining fields first!</h3>";

    } else if(empty($password) || empty($Cpassword)){

       echo "<h3>Please fill the password fields!</h3>";

    }else if($password !== $Cpassword){

    	   echo "<h3>Password Does not match!</h3>";
  
    }else if(strlen($password) < 3){
         
           echo "<h3>Password Should be greater than 8 Character!</h3>";

    }else if(strlen($username) <= 2){    

           echo "<h3>Username Should be greter than 5 Character!</h3>";
       
    }else if(mysqli_num_rows($query1) == true){

           echo "<h3>Already registred with the this email!</h3>";
  
    }else if(mysqli_num_rows($query2) == true){
      
           echo "<h3>Uername is alredy registered!</h3>";

    }else{

        $insert_query = "INSERT INTO bank_details (id, email, username, pass, date) values('', '$email', '$username', '$password', NOW() )";
     
    
     $query = mysqli_query($connection, $insert_query);
        
        echo '<script>alert("successfully Created an Account!");</script>';
        echo "<h3 class='success'>Succesfully Created an Account!</h3>";
    } 

    
}

 ?>

<style type="text/css">
	
 h3{

  color: red;
  position: absolute;             
   top: 77%;
   left: 48.65%;
   transform: translate(-50%, -50%);
   cursor: default;

 }

 h3:hover{

 	font-size:30px;
 }

 .success{
   
      font-size: 35px;
      color:green;
     font-weight: bolder;
      padding-top: 11px;
     padding-bottom: 11px;
     padding-left: 15;
     padding-right: 15px;
     background-color: #c0c7d3; 
     position: absolute;             
     top: 79%;
     left: 49.2%;
     border-radius:10px;
     

  
   
 }

</style>

<!DOCTYPE html>
<html>
<head>
	<title>State Bank of Nandurghat</title>
    
   <link rel="stylesheet" type="text/css" href="signup.css">
   <link rel="shortcut icon" href="faviconBank.png" type="image/x-icon"/>


</head>

<body>
    <marquee class="main-head" behavior="alternate"><h1>STATE BANK OF NANDURGHAT</h1></marquee>


  <div class="main-layout" id="xmain-layout" >

  	     <h2 class="signup-head">SBN Sign UP</h2>
    <form action= "signup.php" method="POST">
    	
     <input type="email" name="email" placeholder="Email">
     <br/><br/>
     <input type="text" name="username" placeholder="Username ">
     <br/><br/>
     <input type="password" name="pass" placeholder="Password">
     <br/><br/>
     <input type="password" name="cpass" placeholder="Confrim Password">
     <br/><br/>
     <input class= "submit-btn" type="submit" name="submit" value="Register">
     <br/><br/>
    </form>
   
   <a class="alrdAcc" href="signin.php">already have an Account?</a>

   </div>

</body>

</html>

<style type="text/css">
  
 

</style>