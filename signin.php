
<?php


if(isset($_POST['submit'])){
      
echo '<link rel="shortcut icon" href="faviconBank.png" type="image/x-icon"/>';


   $PORT_DB = "localhost:3307";  
   $USERNAME_DB = "root";
   $PASS_DB= "";
   $NAME_DB = "banking_db"; 

   $connection = mysqli_connect($PORT_DB, $USERNAME_DB, $PASS_DB, $NAME_DB) or die("CONNECTION FAILED!");
         
    $email = $_POST['email'];
    $password = $_POST['pass'];

    

    $insert_query = "SELECT * FROM bank_details WHERE email = '$email' and pass = '$password'";

    $query = mysqli_query($connection, $insert_query);

   if(empty($email) || empty($password)){
    
    echo "<h3>Fields can Not be blank</h3>";

   }else if(mysqli_num_rows($query) == 0){

        echo "<h3>Email Address or Password is wrong!</h3>";

   }else {

        session_start();

       $data = mysqli_fetch_array($query);
          $_SESSION['email'] = $data['email'];


         header("Location: bankProfile.php");
    
    }
 }

?>

<style type="text/css">

.randTest{
  font-size:30px;
  color:white;
  position:absolute;
  top:50%;
  left:50%;

}
  
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

</style>

<!DOCTYPE html>
<html>
<head>
	<title>State Bank of Nandurghat</title>
    
    <link rel="stylesheet" type="text/css" href="signin.css">
   <link rel="shortcut icon" href="faviconBank.png" type="image/x-icon"/>


</head>

<body>
    <marquee class="main-head" behavior="alternate"><h1>STATE BANK OF NANDURGHAT</h1></marquee>


  <div class="main-layout" id="xmain-layout" >

  	     <h2 class="signin-head">SBN Sign In</h2>
    <form action= "signin.php" method="POST">
    	
     <input type="email" name="email" placeholder="Email">
     <br/><br/>
     <input type="password" name="pass" placeholder="Password">
     <br/><br/>
     <input class= "submit-btn" type="submit" name="submit" value="Sign In">
     <br/><br/>
    </form>
     
  <a class="forgotPass" href="forgotPass.php">Forgot Password?</a>
  <a class="newAcc" href="signup.php">Create New Account?</a>

  </div>

</body>

</html>




