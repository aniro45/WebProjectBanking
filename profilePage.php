<?php 

// //echo '<script>alert("successfully logged In!!");</script>';
// echo "You have Successfully Connected to the DATABASE!";
// echo "<br>";
// echo "This Feature is Under Construction!";
// echo "<br>";
// echo '<a href="logout.php">Log out</a>';

?>

<!DOCTYPE html>
<html>
<head>

	<title>State bank of nandurghat</title>
    
  <link rel="stylesheet" type="text/css" href="profilePage.css">

  </head>
<body>

    <div class = "main-layout">
        
            <div class="side-col">
             
             <img class = "head-img" src="aniket_photo.jpg" alt="Avatar">
             <h6  class="name-col">Aniket Jadhav</h6>

           <div class="list">
              <ul>
                <li onclick="window.location.href = 'profilePage.php'">PROFILE</li>
                <li onclick = "window.location.href = 'settingPage.php'">STTINGS</li>
                <li>SECURITY</li>
                <li onclick="window.location.href = 'bankHome.php'">HOME</li>
              </ul>
           </div>

         <p class="logout-btn">LOGOUT</p>

         </div>

             



    </div> 
        




</body>
</html>