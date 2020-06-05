<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';
  
  
  $error = false;
  
  if( isset($_POST['btn-login']) ) {  
    
    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs
    
    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    
    if(empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
    
    // if there's no error, continue to login
    if (!$error) {
      
     // $password = hash('sha256', $pass); // password hashing using SHA256
    
      $res=mysql_query("SELECT id, email, password FROM user WHERE email='$email'");
      $row=mysql_fetch_array($res);
      $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      if( $count == 1 && $row['password']==$pass && $_POST['email']!='admin@yahoo.com' && $_POST['pass']!='123456789') {
        $_SESSION['user'] = $row['id'];
        header("Location: User/view_user.php");
      }
      else if ($_POST['email']=='admin@yahoo.com' || $_POST['pass']=='123456789') {
        header("Location: Admin/interface.php");
      }

       else {
        $errMSG = "Incorrect Credentials, Try again...";
      }
        
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
  <link rel='stylesheet' href='Admin/css/stylee.css'/>

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
<div class="Login">
              <div class="Login-head">
                  <h3>LOGIN</h3>
              </div>
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
                  <h4>Email</h4>
                    <input type="email" name="email" value="Email" >
                           <span class="text-danger"><?php echo $emailError; ?></span>
                    <div class="clear"> </div>
                  </div>
                  <div>
                  <h4>Password</h4>
                <input type="password" name="pass"  placeholder="password">
                  <span class="text-danger"><?php echo $passError; ?></span>
                        <div class="clear"> </div>
                </div>
                <div class="checkbox-grid">
                  <div class="inline-group green">
                  <label class="radio"><input type="radio" name="radio-inline"><i> </i>Remember me</label>
                  <div class="clear"> </div>
                  </div>

                </div>
                         
                <div class="submit-button">
                  <input type="submit" name="btn-login" onclick="" value="LOGIN  " >
                </div>
                  <div class="clear"> </div>
                </div>
                      
              </form>
          </div>
      </div>
        <!--//End-login-form--> 
            <div class ="copy-right">
              <p><a href="#">Fruits and Herbs Online Shopping</a></p>
            </div>
        </div>

  <script src="js/jquery-1.12.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</body>
</html>
<?php ob_end_flush(); ?>