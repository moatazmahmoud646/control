<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css\Sell2.css">
    <style >
        


.im{
    position: relative;
    width: 22%;
    height:20%;
    margin-left:50%;
    margin-top:1%;
}

}
.cap{
    margin-top:3%;
    position: absolute;
    background-position: center;
    margin-right:24%; 


}
.fil{
    margin-top:35%;
    position: relative;
    margin-left:10%;

}


    </style>

    <title>Sell Item</title>
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

    </aside>

    </div>
    <div class="a3">

    <!--image-->
    <form action="#" method="post" enctype="multipart/form-data">
    Select Image:<input class="fil" type="file" name="image" ><br /><br />
    Caption:<input class="cap" type="text" name="desc"><br /><br />
    Type:   <input type="text"  name="type" required ><br><br>
    <input type="submit" name="upload" value="submit">

  



<!--*************************************************************************-->


      <?php
 
    //select data from user

    require("dbconnect.php");

    $sql="SELECT first_name,last_name,email from user";
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

       
   </div>
</body>
</html>


<!--insert image and type into table order_for_sale-->

 <?php
  require_once "dbconnect.php";
  if(isset($_POST['upload'])){
  $image_name = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_tmp_name= $_FILES['image']['tmp_name'];
  $desc = $_POST['desc']; 

  $type = trim($_POST['type']);
  $type = strip_tags($type);
  $type = htmlspecialchars($type);

  move_uploaded_file($image_tmp_name,"photos/$image_name");
  echo "<img class='im' src='photos/$image_name' width='100' height='100' style='position:relative;'><br>$desc";

$query="INSERT INTO order_for_sale(location,caption,type)VALUES('$image_name','$desc','$type')";

 if(mysql_query($query))
{
  echo "";
}

else
{
  echo "no";

}
unset($image_name);
unset($desc);
unset($type);
}
?>