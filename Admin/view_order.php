<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<title>Fruit && Herbs online shopping</title>
<html>
<head>
  <link rel='stylesheet' href='css/bootstrap.css'/>
  <link rel='stylesheet' href='css/style.css'/>
<style>
body{
  background-color: #fff;
  }
  table{
  	border:3px solid black;
  	width: 90%;
  }
  </style>
</head>
<body>
  <div class="imgback">
  <img src="imges/back.png" alt="background" class="img">
</div>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">

        <a class="navbar-brand" href="interface.php">Add</a>
          <a class="navbar-brand" href="view_admin.php">View</a>
            <a class="navbar-brand" href="Delete.php">Delete</a>
              <a class="navbar-brand" href="mail.php">Mail</a>
              <a class="navbar-brand" href="logout.php">Logout</a>

      </div>
    </div>
  </nav>

  <center>

  <a href="#">View Tracking Orders</a>
  <table >
      
    </div>
    </body>


<?php

  require('dbconnect.php');

   $result = mysqli_query($con,"SELECT * FROM orders");

   echo "<table border='3'>
    <tr>
    <th>Type</th>
    <th>Total_cost</th>
    <th>Discount</th>

</tr>";



while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['total_cost'] . "</td>";
echo "<td>" . $row['discount'] . "</td>";



echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>



<style>

table{
  border: 3px solid #eee;
  text-align:center;
  background-color: white;
  border-radius: 5px;
  width: 90%; 
  background-position: center;
  font-style: italic;
  font-family: sans-serif;
  font-weight: bold;
  position:absolute;
  margin-left:50px; 
  margin-top:10px;


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

}
tr
{
  background-color: #eee;
}
</style>