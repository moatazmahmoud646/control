

<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css/Searchmedicine.css">

  <title>Search Doctor</title>
    <style >
  .z{
  text-decoration:none;
  color: black;
  font-weight: bold;
  font-family: cursive;
  font-style: italic;
  position: relative;
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
         <a class="b4" >Logout</a>
     </form>    
      </div>
    </center>

    
    
          <div class="a2">
           <aside>

           
                 <!--form of doactors-->
        
              <p class="z">Enter a Specify to view all Doctors</p>
            <form method="POST" enctype="multipart/form-data action" name="Doctor">
               <input type="text" name="doctor">
               <br>
               <input type="submit" name="sub" value="Search">
            </form>



            <p class="z">Doctor List->>></p>
            </aside>



        
        
        <center>
         <div class="a3">


            <!--result of hospital--

             <!--search hospital-->

<?php

   include "config.php";
      if(isset($_POST['sub']))
      {
         $speciality=$_POST['doctor'];

           if(empty($speciality))
           {
             $error="please display a speciality";
           }
           else
           {


           $sql="SELECT * from doctors where speciality like'$speciality%'";
           $res=mysql_query($sql);
      

      if($res)
          echo "";
      else
          echo "no";

      while ($rows=mysql_fetch_array($res)) {

               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Name  :$rows[1]</p>";  
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Description :$rows[2]</p>";
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Address :$rows[3]</p>";
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Speciality :$rows[4]</p>";
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Degree :$rows[5]</p>";

            
          }
        }
      }

          ?>
      </div>
      </center>
   </body>
 </html>




