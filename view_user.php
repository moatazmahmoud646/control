


<!DOCTYPE html>
<html>
 <head>
    
 <link rel="stylesheet" type="text/css" href="css/Home.css">

<title>Home</title>

 <style>

.ed{
border-style:solid thin #00CCFF;
padding:5px 30px;
margin-bottom: 3%;
margin-top:30%; 

}
.button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-width:thin #00CCFF;
padding:5px;
background-color:#eee;
height: 34px;
margin-top:40%; 
}

p{
margin:0;
padding:0;
text-align: center;
font-style: italic;
font-size: smaller;
text-indent: 0;
}

img{
height: 225px;
}
.a{
    text-decoration-line: none;
    color: black;
    font-weight: bold;
    font-style: italic;
    font-size: 18px;
    display: inline;

}
.img{
    width: 130px;
    height: 130px;
    float:left; 
    padding:5px;
    width: auto;
    margin: 0 5px 0 0;
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
         <a class="b" href="#">View Fruit and Herbs</a>
         <a class="b1" href="sell.php" >Sell Items</a>
         <a class="b2" href="search.php" >Search Medicine</a>
         <a class="b3" href="feedback.php">Make Feedback</a>
         <a class="b5" href="mail.php">Mail</a>
         <a class="b4" href="logout.php">Logout</a>
     </form>    
      </div>
</center>

    
    <div class="a2">
    <aside>
    <br><br><br><br><br><br><br><br><br><br>

     <a class="z" href="search_item.php">Search for any item</a>

     </aside>


      </div>



    <!-- all itema of the product-->
    
<div class="a3"  style="background-color:#eee">
    
<form action="" method="post" enctype="multipart/form-data" name="addroom">
<?php
include('config.php');
$result = mysql_query("SELECT location,description,cure,quantity,feature FROM item");
echo "<table>";
echo "<tr>";

while($row=mysql_fetch_array($result))
{
      echo "<td>"; 
     echo '<a class="a" href="add_to_cart.php"><img class="img" src="photos/'.$row[0].'"></a>';
     echo "<br>"; 
     echo "DESCRIPTION : $row[1]<br> ";
     echo    "CURE : $row[2]<br> ";
     echo  "QUANTITY : $row[3] <br> ";
     echo  "FEATURE : $row[4] <br> ";
   }
?>
<?php echo "</td>";
 
echo "</tr>";
echo "</table>";


?>
 </form>

    
    </div>

</body>
</html>




