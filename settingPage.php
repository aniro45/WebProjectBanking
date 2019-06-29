<?php

   if(isset($_POST['switch'])){
       
      $checkBoxInput  = $_POST['switch'];
     
        if($checkBoxInput = true){

           echo "Success!";

        }
    }
     

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel = "stylesheet" type = "text/css" href="settingPage.css">
  <title>Document</title>
</head>
<body>
        
     <div class = "all-setting-container">
      <div class=setting-option-container>
         
         <h4 class = "pin-header">1) Add PIN for Balance Section :</h4>  

      </div>


        <label class="switch">
         <input type="checkbox" name="switch">
         
          <span class = "slider"></span> 

        </label>
    </div>
  
       <script>
     
          
       
       </script>

</body>
</html>







<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="settingPage.css">
    <title>State Bank of Nandurghat</title>
</head>
<body>
    
<label class="switch">
  <input type="checkbox">
  <span class="slider"></span>
</label>


<label class="switch">
  <input type="checkbox" checked>
  <span class="slider j"></span>
</label>


</body>

</html> -->