  

<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css/Home.css">

  <title>Home</title>


 </head>
 <style>
 .img{
    width: 230px;
    height: 200px;
    position: relative;
    margin-top:0%;
    margin-left:35%;
    margin-right: 50%;
    display: inline;
  color:green;

}
.p
{

  margin-top:0%;  

}


.p1
{
 
  margin-top:5%;


  
}
.p2
{

 margin-top:10%; 

}



 .p3
{

  margin-top:15%; 
  margin-bottom: 2%; 
 

  
}

.p4
{

  margin-top:20%; 


}
.p5
{
 
  margin-top:25%; 


}
.p,.p1,.p2,.p3,.p4,.p5
{
  position: absolute;
  margin-left: 43%;
  color: black;
  font-weight: bold;
  font-family: cursive;
  font-style: italic;

}
.x{
  text-decoration:none;
  color: black;
  font-weight: bold;
  font-family: cursive;
  font-style: italic;

}
     
 </style>
 
 




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

     <center>
      <div class="a2">
        <aside>
           <h3>Select your Cures</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                 <input type="text" name="search" placeholder="please display a cure">
                 <br><br>
                 <input type="submit" name="sub" value="Search">
             </form>   
                 <br><br>
                 <br><br>
                 <br><br>

             <a class="x" href="add_to_cart.php">Add to Cart</a>     
         </aside>
      </div>


        <div class="a3"  style="background-color:white">

           <!--the result of search item by cure-->

           <!-- search by cure-select cure from table item--> 
           <!-- search fruit and herbs-->

<?php

   include "config.php";
      if(isset($_POST['sub']))
      {
         $search=$_POST['search'];

           if(empty($search))
           {
             $error="please display a cure";
           }
           else
           {


           $sql="SELECT * from item where cure like'$search%'";
           $res=mysql_query($sql);
      

      if($res)
          echo "";
      else
          echo "no";

      while ($rows=mysql_fetch_array($res)) {

               echo '<p><img class="img" src="photos/'.$rows['location'].'"></p>'; 
               echo "<p class='p'>Name  :$rows[3]</p>";  
               echo "<p class='p1'>Description :$rows[4]</p>";
               echo "<p class='p2'>Cure :$rows[5]</p>";
               echo "<p class='p3'>Cost :$rows[6]</p>";
               echo "<p class='p4'>Quantity :$rows[7]</p>";
               echo "<p class='p5'>Feature  :$rows[8]</p>";
          }
        }
      }

          ?>
      </div>
      </center>
   </body>
 </html>

          


  


