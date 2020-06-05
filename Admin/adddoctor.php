<?php
  
   require_once "dbconnect.php";

      $error=false;


 
  if(isset($_POST[ 'submit' ]))
  

    $name =$_POST[ 'name' ];
    $name = trim($_POST[ 'name' ]);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);
    
    $address = trim($_POST[ 'address' ]);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);
    
    $descrip = trim($_POST[ 'descrip' ]);
    $descrip = strip_tags($descrip);
    $descrip = htmlspecialchars($descrip);

    $speciality = trim($_POST[ 'speciality' ]);
    $speciality = strip_tags($speciality);
    $speciality = htmlspecialchars($speciality);
    
    $degree = trim($_POST[ 'degree' ]);
    $degree = strip_tags($degree);
    $degree = htmlspecialchars($degree);

    // basic name validation
    if(empty($name))
    {
      $error=true;
      $errorName="display a name";
    }

    if($name==mysql_query("select name from doctors where name=$name"))
        {
           $error=true;
           $errorName="this name s exist";

        }

   
    
     if(strlen($name)<8)
    {
  
      $error=true;
      $errorName="name at leaset consist of 8 charactors";
      }
       if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $errorName = "Name must contain alphabets and space.";
    }

// basic address validation

   if(empty($address))
   {
     $error=true;
     $errorAddress="display an address";
   }

// basic Description validation
   if(empty($descrip))
    {
    $error=true;
     $errorDescrip="display a Description";
    }
   if(strlen($descrip)<20)
   {  
     $error=true;
      $errorDescrip="Description at leaset include 20 charactors";
    }

// basic speciality validation

   if(empty($speciality))
   {
      $error=true;
      $errorspeciality="display a speciality";
   }

// basic degree validation

if(empty($degree))
  {
    $error=true;
    $errordegree="display a degree";
  }

   

      $sql="INSERT INTO doctors(name,Description,address,speciality,degree)values('$name','$descrip','$address','$speciality','$degree')";
      $quary=mysql_query($sql);
     if ($quary) {
        $errTyp = "success";
        $errMSG = "Successfully added doctor";
        unset($name);
        unset($descrip);
        unset($address);
        unset($speciality);
        unset($degree);
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
    <h1 style="text-align:center; color:#000">Add Doctor</h1>

    <form method="POST" action="adddoctor.php">
    Doctor Name:  <input type="text"   name="name" pattern="[a-zA-Z]" title="only letter only">       <br><br>
    Description: <input type="text"    name="descrip" style="width: 15%;height: 15%;" pattern="[a-zA-Z]" title="only letter only">  <br><br>
         Address: <input type="text"   name="address"  pattern="[A-Za-z0-9_]{1,15}" title="must contain letter and number">    <br><br>
     speciality : <input type="text"   name="speciality" pattern="[a-zA-Z]" title="only letter only"> <br><br>
         degree : <input type="text"   name="degree" pattern="regexp">     <br><br>
                  <input type="submit" name="submit" value="submit" onclick="alert('Added fruit Successfully')">
       </form>
     </div>
    </body>
    </html>

