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
<html lang="en">
<meta charset="utf-8">
<title>Fruit && Herbs online shopping</title>
<html>
<head>
  <link rel='stylesheet' href='css/bootstrap.css'/>
  <link rel='stylesheet' href='css/style.css'/>
<style>
body{
  background-color: #fff;
  }
  </style>
</head>
<body>
  <div class="imgback">
  <img src="imges/back.png" alt="background" class="img">
</div>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a class="navbar-brand" href="interface.php">Add</a>
          <a class="navbar-brand" href="View_admin.php">View</a>
            <a class="navbar-brand" href="mail.php">Delete</a>
          <a class="navbar-brand" href="mail.php">Mail</a>
          <a class="navbar-brand" href="logout.php">Logout</a>       
            
       </div>
     </div>
     </nav>
        
    <div>
        <center>

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
               
          </center>
    </div>
    </body>









