
<!DOCTYPE html>
<html>
 <head>
    
    <link rel="stylesheet" type="text/css" href="css/payment.css">
  <title>Payment</title>
    <style>
       table
       {
         margin-top: 15px;
         border:1px solid black;

       }

      th{
  background-color: black;
  color: white;
  padding: 10px;
  text-align: center;
}
td
{
    padding:5px;
      border: 3px solid black;


}
tr
{
  background-color: #eee;
  border: 3px solid black;

}
   
    </style>

 </head>

<body>

<!-- style-->

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
         <a class="b4" href="logout.php">Logout</a>
     </form>    
      </div>
    </center>

    
    <aside>
        <center>
       <p>Your Cart----></p>

       </center>
    </aside>
        

        <center>
         <div class="a3">        
         <table border="1" align="center" width="80%">
          <tr>
            <th>Item id</th>
            <th>Name</th>
            <th>Cost</th>
            <th>Type</th>
            <th>Quantity</th>


          </tr>

    <!--Select date from your table cart and display to payment-->    
    <!--ajax code-->  

<?php

 require_once "dbconnect.php";

  $query="SELECT * FROM cart2";
  $result=mysql_query($query);

  if(mysql_num_rows($result)>0)
  {
    while($row=mysql_fetch_array($result))
    {
      ?>
            <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['cost']; ?></td>
            <td><?php echo $row['type']; ?></td>


           <?php
    }
     $sql="SELECT * FROM cart";
     $res=mysql_query($sql);
     while($rows=mysql_fetch_array($res))
    {
      ?>
            <td><?php echo $rows['quantity']; ?></td>
            </tr>
            <?php
    }
  }
 
  ?>
</table>



<!--select data from user-->

<?php 

echo "<p style='float:left;margin-left:5px;' />Customer id";

$sql="SELECT id from user";
$result=mysql_query($query);

  if(mysql_num_rows($result)>0)
  {
    while($row=mysql_fetch_row($result))
    {
      echo "<p/>$row[0]";

    }
  }
      
?>



<br><br>
<br><br>
<br><br>

<p>payment by credit card only</p>
<p>Note: Cost by per one Item</p>
<a href="payment1.php" style="text-decoration:none;font-weight: bold;font-style: italic;color: black "> Make Payment</a>

       </div>
     </center>

</body>
</html>



