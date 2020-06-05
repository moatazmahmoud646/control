<?php
ob_start();
  session_start();
  require_once 'dbconnect.php';
  
  
  $error = false;
  
  if( isset($_POST['pay']) ) {


     $num = trim($_POST['num']);
    $num = strip_tags($num);
    $num = htmlspecialchars($num);
    
    $pin = trim($_POST['pin']);
    $pin = strip_tags($pin);
    $pin = htmlspecialchars($pin);


    $post = trim($_POST['post']);
    $post = strip_tags($post);
    $post = htmlspecialchars($post);


 if(empty($num)){
      $error = true;
      $numError = "Please enter your Card Num.";
    } else if ( !filter_var($num,FILTER_VALIDATE_INT) ) {
      $error = true;
      $numError = "Please enter valid Card Num.";
    }


if(empty($pin)){
      $error = true;
      $pinError = "Please enter your Card PIN.";
    } else if ( !filter_var($pin,FILTER_VALIDATE_INT) ) {
      $error = true;
      $pinError = "Please enter valid Card PIN.";
    }
    

 if(empty($post)){
      $error = true;
      $postError = "Please enter your Item Num.";
    } else if ( !filter_var($post,FILTER_VALIDATE_INT) ) {
      $error = true;
      $postError = "Please enter valid Item Num.";
    }
    
    //if(!error){
 
    
        $result=mysql_query("select *from bank_account where card_num=$num");
        $bal = mysql_num_rows($result);
      $row = mysql_fetch_assoc ($result) ;
      $x = $row['balance'];
 
        $prize=mysql_query("select *from post where id=$post");   
       $pri = mysql_num_rows($prize);
      $ro = mysql_fetch_assoc ($prize) ;
      $y = $ro['prize'];

 if($x>=$y)
        {
        	$up=$x-$y;
           $res = mysql_query( "UPDATE `bank_account` SET `balance`=$up WHERE card_num=$num" );
         

         //$result = mysqli_query($connect, $query);
   
   if($res)
   {
       $errTyp = "success";
        $errMSG = "Successfully pay";
        unset($num);
        unset($pin);
        unset($post);
   }else{
       $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..."; 
    }
  }
   else{
        
        $errTyp = "failed";
        $errMSG = "your balance is less than the prize.";
        
   }
   


  
  

}

?>
<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css/payment.css">
  <title>Payment</title>
    <style>
       table
       {
         margin-top: 15px;
         border:1px solid black;

       }

      th{
  background-color: black;
  color: white;
  padding: 10px;
  text-align: center;
}
td
{
    padding:5px;
      border: 3px solid black;


}
tr
{
  background-color: #eee;
  border: 3px solid black;

}
      


    </style>

 </head>
<body>

    <center>
    <div class="a">
        <img src=img\v.png  alt="image">
     </div>
    </center>

    
      <center>
     <div class="a1">
     <form name="Home" action="post">
         <a class="b" href="view_user.php">View Fruit and Herbs</a>
         <a class="b1" href="sell.php" >Sell Items</a>
         <a class="b2" href="search.php" >Search Medicine</a>
         <a class="b3" href="feedback.php">Make Feedback</a>
         <a class="b5" href="mail.php">Mail</a>
         <a class="b4" href="logout.php">Logout</a>
     </form>    
      </div>

    </center>

<body>

<aside>
        <center>
       <p>Your Cart----></p>

       </center>
    </aside>
        
        
        <center>
         <div class="a3">        

 
  <?php
      if ( isset($errMSG) ) {
        
        ?>
        <div class="form-group">
              <div class="alert alert-danger">
        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
              </div>
                <?php
      }
      ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <div class="ticker">
                  <h4>Card Num:-</h4>
                    <input type="number" name="num" >
                           <span class="text-danger"><?php echo $numError; ?></span>
                    <div class="clear"> </div>
                  </div>
                  <div>
                  <h4>Card PIN:-</h4>
                <input type="password" name="pin">
                  <span class="text-danger"><?php echo $pinError; ?></span>
                        <div class="clear"> </div>
                </div>
                <div class="ticker">
                  <h4>Item Num:-</h4>
                    <input type="number" name="post" >
                           <span class="text-danger"><?php echo $postError; ?></span>
                    <div class="clear"> </div>
                

                
                         
                <div class="submit-button">
                 <br> <input type="submit" name="pay" onclick="" value="Pay" >
                </div>
                  <div class="clear"> </div>
                </div>
                      
              </form>
          </div>
      </div>

   </center>
 


</body>
</html>
<?php ob_end_flush(); ?>