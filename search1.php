

<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css/Searchmedicine.css">

  <title>Search Hospital</title>
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
         <a class="b4" href="logout.php" >Logout</a>
     </form>    
      </div>
    </center>

    
    
          <div class="a2">
           <aside>

             <!--form of Hospital-->
            <p class="z">Enter a Disease name to view all hospitals</p>
            <form method="POST" enctype="multipart/form-data action" name="Hospital">
            <input type="text" name="hos">
            <br>
            <input type="submit" name="submit" value="Search">
            </form>
       

            <p class="z">Hospital List->>></p>
            </aside>



        
        
        <center>
         <div class="a3">


            <!--result of hospital--

             <!--search hospital-->

<?php

   include "config.php";
      if(isset($_POST['submit']))
      {
         $diseases=$_POST['hos'];

           if(empty($diseases))
           {
             $error="please display a diseases";
           }
           else
           {


           $sql="SELECT * from hospital where Disease like'$diseases%'";
           $res=mysql_query($sql);
      

      if($res)
          echo "";
      else
          echo "no";

      while ($rows=mysql_fetch_array($res)) {

             echo "<div>";

             echo "<table border='3'>";

               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Name  :$rows[1]</p>";  
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Description :$rows[2]</p>";
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Address :$rows[3]</p>";
               echo "<p class='z' style='font-size:24px;  margin-right: 40%;'>Disease Name :$rows[4]</p>";
            
          }
        }
      }
        echo"</table>";

      echo "</div>";

          ?>
      </div>
      </center>
   </body>
 </html>




