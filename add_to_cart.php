<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css/Home.css">

  <title>Home</title>

   <style>

   .in{
    margin-top:4%;
    margin-bottom:15% 
}
.m
{
  background-color:gray;
  border: 2px solid white;    
  color:white;
  font-size: 20px;
  text-align: center;
  padding:7px ;
  display: inline-block;
  width: 20%;
  height: 5%;
  text-decoration: none;  
  margin-top:4%;
  
    
 }
 .x{
  margin-top: 10%;
 }
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
        <center>
        <a href="view_user.php" style="color:gray;text-decoration: none;"> <---BACK</a>

       </center>

    </aside>

    </div>
    
    <div class="a3">

    <p class="z">Add Item to your Cart</p>


<!--form for add item to cart-->
    <form method="POST" enctype="multipart/form-data" class="in">
  
 <input type="text" name="tex" value="<?php echo "$errorquntity"; ?>">
 <br><br>
 <input type="submit" name="submit" value="submit">
</form>


    <a class="m" href="Payment.php">Make Payment</a>
    <p class="x">important Note</p>
    <p class="x1"> Fruits & Herbs are per KG : Cost per one item only</p>
    
    </div>

</body>
</html>

<!--insert into table cart-->
<?php

require("dbconnect.php");

if(!empty($_POST['submit']))
  $que=$_POST['tex'];
  $que = trim($_POST['tex']);
  $que = strip_tags($que);
  $que = htmlspecialchars($que);

  if(!isset($_POST['quantity']))
  {
    $errorquntity= "please display a quantity ";
  }
  if($_POST['quantity']!=['0-9'])
  {
    $errorquntity="please display number only";
  }
  if($_POST['quantity']<=0)
  {
    $errorquntity=  "number is not logically";
  }
  
//insert data into table cart
$query="INSERT INTO cart(quantity)VALUES('$que')";
$result=mysql_query($query);
if($result)
  echo "";
else
  echo "no";


?>


<!--insert data into table cart2 from table item-->
<?php
require('dbconnect.php');

$sql="INSERT INTO cart2(id,name,cost,type)SELECT id,name,cost,type from item";
$res=mysql_query($sql);
if($res)
  echo "";
else
  echo "";

?>