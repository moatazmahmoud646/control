<?php
mysql_connect("localhost","root");
mysql_select_db("myproject");
if(isset($_GET['edit_id']))
{
  $sql_query="SELECT * FROM item WHERE type='fruit' and id=".$_GET['edit_id'];
  $result_set=mysql_query($sql_query);
  $fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
  // variables for input data
  $name = $_POST['name'];
  $description = $_POST['description'];
  $cure = $_POST['cure'];
  $cost = $_POST['cost'];
  $quantity = $_POST['quantity'];
  $feature = $_POST['feature'];
  // variables for it data
  
  // sql query for update data into database
  $sql_query = "UPDATE item SET name='$name',description='$description',cure='$cure',cost='$cost',quantity='$quantity',feature='$feature' WHERE type='fruit' and id=".$_GET['edit_id'];
  // sql query for update data into database
  
  // sql query execution function
  if(mysql_query($sql_query))
  {
    ?>
    <script type="text/javascript">
    alert('Data Are Updated Successfully');
    window.location.href='update_fruit.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script type="text/javascript">
    alert('error occured while updating data');
    </script>
    <?php
  }
  // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
  header("Location: update_fruit.php");
}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Update</title>

 <link rel='stylesheet' href='css/bootstrap.css'/>
<link rel="stylesheet" href="css/style.css" type="css/style.css" />

<style>
body{
  background-color: white;
}
.navbar-brand{
  background:#eee;
  color: black;
  font-size: 20px;
  text-align: center;
  padding: 30px;
  display: inline-block;
  border-radius: 50px;
  margin: 30px;
}

input
{
  width: 300%;
  height: 50px;
  position:relative;
  margin:5%;
}
label
{
  font-weight: bold;
  font-size: 30px;
    font-style:italic;
}
table{
  position:relative;
  margin-right:700px; 
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




<div id="header">
  <div id="content">
    <label>Update data Fruit</label>
    </div>
</div>
<div id="body">
  <div id="content">
    <form method="post">
    <table align="center">
     <td><input type="text" name="name" placeholder="Name" value="<?php echo $fetched_row['name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="description" placeholder="Description" value="<?php echo $fetched_row['description']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="cure" placeholder="Cure" value="<?php echo $fetched_row['cure']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="cost" placeholder="Cost" value="<?php echo $fetched_row['cost']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="quantity" placeholder="Quantity" value="<?php echo $fetched_row['quantity']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="feature" placeholder="Feature" value="<?php echo $fetched_row['feature']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>


</center>
</body>
</html>