<?php
  ob_start();
  session_start();
  if( isset($_SESSION['user'])!="" ){
    header("Location: ");
  }
  include_once 'dbconnect.php';

  $error = false;

  if ( isset($_POST['btn-signup']) ) {
    
    // clean user inputs to prevent sql injections
    $name = trim($_POST['fname']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $name1 = trim($_POST['lname']);
    $name1 = strip_tags($name1);
    $name1 = htmlspecialchars($name1);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $cpass = trim($_POST['pas']);
    $cpass = strip_tags($cpass);
    $cpass = htmlspecialchars($cpass);
    
    // basic name validation
    if (empty($name)&& empty($name1)) {
      $error = true;
      $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3 && strlen($name1 < 3)) {
      $error = true;
      $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name) && !preg_match("/^[a-zA-Z ]+$/",$name1)) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    }
    
    //basic email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    } else {
      // check email exist or not
      /*$query =  "SELECT `email` FROM `user` WHERE `email`='$email' ";
       // "SELECT email FROM user WHERE email='$email'";
      $result = mysql_query($query);
      $counter = mysql_num_rows($result);
      if($counter!=0){
        $error = true;
        $emailError = "Provided Email is already in use.";
      }*/
    }
    // password validation

   
   if (empty($pass)){
      $error = true;
      $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have atleast 6 characters.";
    }

       // password encrypt using SHA256();
   
    $password = hash('sha256', $pass);
  
  
    
    // if there's no error, continue to signup
    if(strcmp($pass,$cpass)==0){
     if( !$error ) {
      
      $query = "INSERT INTO user(first_name,last_name,email,password,c_password) VALUES('$name','$name1','$email','$pass','$cpass')";
      $res = mysql_query($query);
        
      if ($res) {
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
        unset($name);
        unset($email);
        unset($pass);
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..."; 
      } 
        
    }
  }
   else
   {
    $Confirmerror="Password Dont Match.";
   }
    
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<title>Fruit && Herbs online shopping</title>
<html>
<head>
  <link rel='stylesheet' href='Admin/css/bootstrap.css'/>
  <link rel='stylesheet' href='Admin/css/register.css'/>

</head>
<body>
  <div class="imgback">
  <img src="Admin/imges/back.png" alt="background" class="img">
</div>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a class="navbar-brand" href="Home.php">Home</a>
          <a class="navbar-brand" href="aboutus.php">About us</a>
            <a class="navbar-brand" href="register.php">Register</a>
              <a class="navbar-brand" href="login.php">Login</a>
      </div>
    </div>
  </nav>

      <div class="main">
            <div class="login-head">
              <h1 style="color: #fff;"> Register Here</h1>
                                                                                                                            
          </div>
          <div  class="wrap">
              <div class="Regisration">
                <div class="Regisration-head">
                  <h2 style="color: #fff;"><span></span>Register</h2>
               </div>
                 <?php
      if ( isset($errMSG) ) {
        
        ?>
        <div class="form-group">
              <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
        <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
              </div>
                <?php
      }
      ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                              
                  <input type="text" name="fname" placeholder="First Name">
                  <span class="text-danger"><?php echo $nameError; ?></span>
                  <input type="text" name="lname" placeholder="Last Name"  >
                  <span class="text-danger"><?php echo $nameError; ?></span>
                  <input type="text" name="email" placeholder="Email Address">
                  <span class="text-danger"><?php echo $emailError; ?></span>
                <input type="password" name="pass"  placeholder="Password">
                <span class="text-danger"><?php echo $passError; ?></span>
                <input type="password" name="pas" placeholder=" Confirm Password">
                <span class="text-danger"><?php echo  $Confirmerror; ?></span>

                 <div class="Remember-me">
                <div class="p-container">
                <label class="checkbox"><input type="checkbox" name="checkbox" checked"><i></i>I agree to the Terms and Conditions</label>
                <div class ="clear"></div>
              </div>
                         
                <div class="submit">
                
                <button type="submit" class="btn btn-block btn-default" name="btn-signup" onclick="login.php"><h4>Sign Me Up</h4></button>
                </div>
                  <div class="clear"> </div>
                </div>
                                                                                                                    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                                                                                                    
                                                                                                                    
                      
              </form>
          </div>
          </html>
            <?php ob_end_flush(); ?>
