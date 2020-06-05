
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/Feedback.css">
        <title>Feedback</title>
    </head>
    <body>
        <center>
            <div class="a">
                <img src=img\v.png  alt="image">
            </div>
        </center>
        <center>
            <div class="a1">
                <form  method="POST" action="">
                    <a class="b" href="view_user.php">View Fruit and Herbs</a>
                    <a class="b1" href="sell.php" >Sell Items</a>
                    <a class="b2" href="search.php" >Search Medicine</a>
                    <a class="b3" href="#">Make Feedback</a>
                     <a class="b5" href="mail.php">Mail</a>
                    <a class="b4" >Logout</a>
                </form>    
            </div>
        </center>

        <div class="a2">
            <aside>
                <h3>Feedback---></h3>
                <center>
                    <img class="x" src="img/f.jpg">
                </center>
            </aside>
        </div>

               <center>

                <div class="a3">  
                    <h1 class="h1">your feedback</h1>

                      <form method="POST" action="#" enctype="multipart/form-data">

                        <label class="label">-Describe Your Feedback:</label><br>
                        <textarea id="FedBK" name="message" placeholder="write your feedback" required></textarea><br>
                        <span class="error"></span><br><br>
                     
                         <!--select data from user-->

                        <?php

                            require("dbconnect.php");

                            $sql="SELECT first_name,last_name,email from user where role_id=2";
                            $result=mysql_query($sql);
                          if(mysql_num_rows($result)>0)
                              {
                                  while($row=mysql_fetch_array($result))
                                {
                                         echo "<p>First_Name :$row[0]</p>";
                                         echo "<p>Last_Name :$row[1]</p>";
                                         echo "<p>Email :$row[2]</p>";
                                }
                           }
                       ?>

                        <div class="bottom">
                       <input class="feedck" type="submit" name="save" value="submit" onclick=" alert('your feedback saved successfully')">
                       </div> 
                     </form>                                
  
                </div>

        </center>
    </body>
</html>





<?php

//insert meesage into table feed;

include ("dbconnect.php");

if(isset($_POST['save']))

    $message = trim($_POST[ 'message' ]);
    $message = strip_tags($message);
    $message = htmlspecialchars($message);
    $message =mysql_real_escape_string($message);
  

   $query="INSERT INTO feed(message)values('$message')";
   $result=mysql_query($query);

   if($result)
   {
      echo "";
      unset($message);
   }
   else
   {
     echo "Error in sql statement";
   }



?>

           