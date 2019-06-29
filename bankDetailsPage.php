<?php
       session_start();
       $tempEmail = $_SESSION['email'];   

         $connection = mysqli_connect("localhost:3307", "root", "", "banking_db")
          or
          DIE("Connection Failed!");
        
          $SelectMainQuery = "SELECT * FROM bank_details WHERE email = '$tempEmail'";
          $sendMainQuery = mysqli_query($connection, $SelectMainQuery);
          $fetch_array_data = mysqli_fetch_array($sendMainQuery);
          $balanceData = $fetch_array_data['balance']; 
          
          $selectTransQuery = "SELECT * FROM transaction_db WHERE email = '$tempEmail'";
          $sendTranseQuery = mysqli_query($connection, $selectTransQuery);
          $fetch_trans_array_data = mysqli_fetch_array($sendTranseQuery);
          
          
        //  $amount = 25312;
        //  $action = false;

        //   $query = "INSERT INTO `transaction_db`(`id`, `email`, `amount`, `action`, `date`) VALUES ('','$tempEmail','$amount','$action', NOW())";
        //   mysqli_query($connection, $query);
                    
            //    for($n= 0; $n< 5 ; $n++){
            //   echo "
            //   <table>
            //   <caption>LAST 5 TRANSACTION</caption>
            //   <tr>
                
            //       <th>Sr.No</th>
            //       <th>Amount</th>
            //       <th>Date</th>

            //   </tr>  
              
            //   <tr>

            //       <td>1</td>
            //       <td>&#8377; 25054</td>
            //       <td>25-06-2019</td>

            //   </tr>

            //   <tr>

            //          <td>2</td>
            //          <td>&#8377; 26351</td>
            //          <td>28-07-2019</td>

            //      </tr> 
                
            //   </table>
                
            //   ";
            

?>

<!DOCTYPE html>
<html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>Balance Information</title>
         <link rel="stylesheet" type="text/css" href="bankDetailsPage.css">
     </head>
 <body>
     
     <div class= "main-container">
        
         <div class = "balance-container">
         
            <h4 class= "check-bal-heading">VIEW BALANCE</h4>
            <h4 class = "balance-amount-header"><span class = "rupeeSymbolSpan">&#8377;</span>XXXXXX</h4>  
            <!-- <h4 class = "balance-amount-header"><span class = "rupeeSymbolSpan">&#8377;</span><?php echo $balanceData;?></h4>  -->

         </div>

           
         
         <div class = "table-container">
             <table class = "main-table">
                 <caption>LAST 5 TRANSACTION</caption>
                 <tr>

                     <th>Sr.No</th>
                     <th>Amount</th>
                     <th>Date</th>

                 </tr>  
                 
                 <tr>

                     <td>1</td>
                     <td>&#8377; 25054</td>
                     <td>25-06-2019</td>

                 </tr> 

                 <tr>

                     <td>2</td>
                     <td>&#8377; 15520</td>
                     <td>28-07-2019</td>

                 </tr> 

                  <tr>

                     <td>3</td>
                     <td>&#8377; 13526</td>
                     <td>24-08-2019</td>

                 </tr>

                  <tr>

                     <td>4</td>
                     <td>&#8377; 26351</td>
                     <td>18-09-2019</td>

                 </tr>

                  <tr>

                     <td>5</td>
                     <td>&#8377; 48526</td>
                     <td>29-10-2019</td>

                 </tr>

             </table>

         </div>

     </div>

      <script>
    
    document.querySelector('.check-bal-heading').addEventListener('click', function(){
         
        var x = document.querySelector('.balance-amount-header');
        var y = document.querySelector('.check-bal-heading');

         if(y.innerHTML == "VIEW BALANCE"){         
        
        x.innerHTML = "<span class = 'rupeeSymbolSpan'>&#8377;</span><?php echo $balanceData; ?>";
        x.style.letterSpacing = "4";
                 y.innerHTML = "HIDE BALANCE";
        }else{

            x.innerHTML = "<span class = 'rupeeSymbolSpan'>&#8377;</span><?php echo 'XXXXXX'; ?>";
        
             y.innerHTML = "VIEW BALANCE";
                
        } 

    });
     
      </script>

 </body>
</html>