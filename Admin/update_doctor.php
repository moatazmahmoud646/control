<?php
mysql_connect("localhost","root");
mysql_select_db("myproject");
$sql_query="SELECT * FROM doctors";
$result_set=mysql_query($sql_query);
?>



<!DOCTYPE html html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<title>Fruit && Herbs online shopping</title>
<html>
<head>
  <link rel='stylesheet' href='css/bootstrap.css'/>
  <link rel='stylesheet' href='css/style.css'/>
<style>
body{
  background-color:white;
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

  <a href="#">View Doctors</a>
 
      

<div id="body">
  <div id="content">
    <table align="center" width="100%">
    <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Address</th>
    <th>Speciality</th>
    <th>Degree</th>
    <th>Edit</th>


    </tr>
    <?php
  if(mysql_num_rows($result_set)>0)
  {
    while($row=mysql_fetch_row($result_set))
    {
      ?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td align="center"><a href="update_doctor1.php?edit_id=<?php echo $row[0]; ?>"><img src="" alt="Edit" /></a></td>
            </tr>
            <?php
    }
  }
  else
  {
    ?>
        <tr>
        <th colspan="3">There's No data found !!!</th>
        </tr>
        <?php
  }
  ?>
    </table>
    </div>
</div>

</center>
</body>
</html>



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
      border: 3px solid black;


}
tr
{
  background-color: #eee;
  border: 3px solid black;

}
</style>