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
            <a class="navbar-brand" href="Delete.php"">Delete</a>
             <a class="navbar-brand" href="mail.php">Mail</a>
          <a class="navbar-brand" href="logout.php">Logout</a>       
            
       </div>
     </div>
     </nav>
        
    
    <div>
         <?php
         if(isset($_POST['delete'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
        
            $id = $_POST['id'];
            
            $sql = "DELETE FROM hospital WHERE id = $id" ;
            mysql_select_db('myproject');
            $deleteitem = mysql_query( $sql, $conn );
            
            if(! $deleteitem ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
            <center>

               <form method = "post" action = "#">
                         <br><br><br><br>
                         <br><br>

                        <p>enter id to deleet your item</p>
                        <br><br>
                        <input name = "id" type = "text"  id = "id">
                        <br><br>
                       <input name = "delete" type = "submit" id = "delete" value = "Delete">
                     
               </form>
               </center>
            <?php
         }
      ?>
      
   </body>
</html>
    </div>
    </body>