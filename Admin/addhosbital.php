<?php

  
   require_once "dbconnect.php";

      $error=false;


 
  if(isset($_post['save']))
  

    $Name_h = $_post['name'];
    $Name_h = trim($_POST['name']);
    $Name_h = strip_tags($Name_h);
    $Name_h = htmlspecialchars($Name_h);
    
    $Address_h = trim($_POST['Address']);
    $Address_h = strip_tags($Address_h);
    $Address_h = htmlspecialchars($Address_h);
    
    $Descrip_h = trim($_POST['Descrip']);
    $Descrip_h = strip_tags($Descrip_h);
    $Descrip_h = htmlspecialchars($Descrip_h);
    
    $Disease_Name = trim($_POST['Disease']);
    $Disease_Name = strip_tags($Disease_Name);
    $Disease_Name = htmlspecialchars($Disease_Name);

    // basic name validation
    if(empty($Name_h))
    {
      $error=true;
      $errorName="display a name";
    }

    if($Name_h==mysql_query("select Name from hospital where Name=$Name_h"))
    {
        $error=true;        
        $errorName="this name is exisit";

    }

    
      if(strlen($Name_h)<8)
    {
  
      $error=true;
      $errorName="name at leaset consist of 8 charactors";
      }
       else if (!preg_match("/^[a-zA-Z ]+$/",$Name_h)) {
      $error = true;
      $errorName = "Name must contain alphabets and space.";
    }

// basic address validation

   if(empty($Address_h))
   {
     $error=true;
     $errorAddress="display an address";
   }

// basic Description validation
   if(empty($Descrip_h))
    {
    $error=true;
     $errorDescrip="display a Description";
    }
   else if(strlen($Descrip_h)<20)
   {  
     $error=true;
      $errorDescrip="Description at leaset include 20 charactors";
    }


if(empty($Disease_Name))
  {
    $error=true;
    $errordegree="display a degree";
  }


    
    $sql="INSERT INTO hospital(name,description,address,disese_Name)VALUES('$Name_h','$Descrip_h','$Address_h','$Disease_Name')";
    $quary=mysql_query($sql);
     if ($quary) {
                   $errTyp = "success";
                   $errMSG = "Successfully added hospital";
                   unset($Name_h);
                   unset($Descrip_h);
                   unset($Address_h);
                   unset($Disease_);
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..."; 
      } 
    
   


?>





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
  <div style="text-align:center">
    <h1 style="text-align:center; color:#000">Add Hospital</h1>

    <form method="post" action="">
    Hospital Name:  <input type="text" name="name" value="<?php echo $name; ?>" required pattern="[a-zA-Z]" title="only letter only"><br><br>
         Address:  <textarea name="Address" cols="27" rows="2" required pattern="[A-Za-z0-9_]{1,15}" title="must contain letter and number"></textarea><br><br>
     Description:  <input type="text" name="Descrip" required pattern="[a-zA-Z]" title="only letter only">  <br><br>
     Disease Name:  <input type="text" name="Disease" pattern="[a-zA-Z]" title="only letter only">   <br><br>
         <input type="submit" name="save" value="submit" onclick="alert('added hospital Successfully')">
       </form>
     </div>
    
    </body>
