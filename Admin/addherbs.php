

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
          <a class="navbar-brand" href="View_admin.php">View</a>
            <a class="navbar-brand" href="Delete.php">Delete</a>
            <a class="navbar-brand" href="mail.php">Mail</a>
              <a class="navbar-brand" href="logout.php">Logout</a>

      </div>
    </div>
  </nav>


     <!-- insert image-->
     <center>
   <h1 style="text-align:center; color:#000">Add Herbs</h1>

  <?php
  require_once "dbconnect.php";
  if(isset($_POST['upload'])){
  $image_name = $_FILES['image']['name'];
  $image_type = $_FILES['image']['type'];
  $image_size = $_FILES['image']['size'];
  $image_tmp_name= $_FILES['image']['tmp_name'];
  $desc = $_POST['desc']; 



    $name = $_POST['name'];
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $descrip = trim($_POST['descrip']);
    $descrip = strip_tags($descrip);
    $descrip = htmlspecialchars($descrip);
    
    $cure = trim($_POST['cure']);
    $cure = strip_tags($cure);
    $cure = htmlspecialchars($cure);

    $cost = trim($_POST['cost']);
    $cost = strip_tags($cost);
    $cost = htmlspecialchars($cost);
    
    $quantity = trim($_POST['quantity']);
    $quantity = strip_tags($quantity);
    $quantity = htmlspecialchars($Quantity);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);


    $feature = trim($_POST['feature']);
    $feature = strip_tags($feature);
    $feature = htmlspecialchars($feature);
    





  move_uploaded_file($image_tmp_name,"photos/$image_name");
  echo "<img src='photos/$image_name' width='200' height='200' style='position:relative;'><br>$desc";

$query="INSERT INTO item(location,caption,name,description,cure,cost,quantity,feature,type)VALUES('$image_name','$desc','$name','$descrip','$cure','$cost','$quantity','$type','$feature')";

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
unset($name);
unset($descrip);
unset($cure);
unset($cost);
unset($quantity);
unset($type);
}
?>

<form action="#" method="post" enctype="multipart/form-data">
    Select Image:<input type="file" name="image" ><br /><br />
    Caption:<input type="text" name="desc"><br /><br />
<!--___________________________________________________________________-->

<!-- form to fill the rest of date-->

 

  Herb Name:       <input type="text"  name="name" required ><br><br>
  Herb Description:<textarea           name="descrip"   cols="30" rows="2" required></textarea><br><br>
  Herb cure:    <input type="text"  name="cure" required ><br><br>
  cost:            <input type="text"  name="cost" required><br><br>
  Quantity:        <input type="text"  name="quantity" required ><br><br>
  Fruit Feature:    <textarea           name="feature"   cols="20" rows="1" required></textarea><br><br>
   Type:        <input type="text"  name="type" required ><br><br>
    <input type="submit" name="upload" value="submit">

  </div>
  </div>
  </form>
    
    </body>
