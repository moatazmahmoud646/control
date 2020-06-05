<?php
 
  
   // $error= false ;

if(isset($_POST['send'])){


    $to = "email@example.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $message=$_POST['message'];

     if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
      if(empty($message)){
      $error = true;
      $mesError = "Please write your message.";
    }

     $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $from . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $from . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $from . ", we will contact you shortly.";
}
?>


<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css\Home.css">

	<title>Sell Item</title>

 <style>
     
    h3 option
    {
        font-size: 20xpx;
        font-weight: bold;
        font-style: italic;
    }
    a
    {
        position:relative;
    }


 </style>

 </head>
<body>

    <center>
    <div class="a">
        <img src="img\v.png"  alt="image">
     </div>
    </center>

    
       <center>
     <div class="a1">
     <form name="Home" action="post">
         <a class="b" href="view_user.php">View Fruit and Herbs</a>
         <a class="b1" href="#" >Sell Items</a>
         <a class="b2" href="search.php" >Search Medicine</a>
         <a class="b3" href="feedback.php">Make Feedback</a>
         <a class="b5" href="#">Mail</a>
         <a class="b4" href="logout.php">Logout</a>
     </form>    
      </div>
    </center>

    
    <div class="a2">
    <aside>

    </aside>

    </div>
    
    <center>
    <div class="a3">

       <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                 <div class="ticker">
                  <h4>Email</h4>
                    <input type="email" name="email" value="Email" >
                           <span class="text-danger"></span>
                    <div class="clear"> </div>
                  </div>
                  <div>
                  <h4>message</h4>
                <textarea rows="5" name="message" cols="30"></textarea><br>
                 
               
                         
                <div class="submit-button">
                 <br> <input type="submit" name="send" onclick="" value="Send " >
                </div>
                  <div class="clear"> </div>
                </div>
                      
              </form>  
  
    </div>
                  </center>


</body>
</html

