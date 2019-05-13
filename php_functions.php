
<?php 

function connection(){

   $PORT_DB = "localhost:3307";
   $USERNAME_DB = "root";
   $PASS_DB= "";
   $NAME_DB = "banking_db"; 
    
   $connection = mysqli_connect($PORT_DB, $USERNAME_DB, $PASS_DB, $NAME_DB) or die("CONNECTION FAILED!");
         
}


 ?>