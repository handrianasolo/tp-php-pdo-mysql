<?php  
   include_once 'loginsystem/class.php';  

   $user = new User();  
   if (isset($_REQUEST['q'])){  
      $user->logout();  
      header("Location:index.php");  
   }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="datatables/dataTables.css" rel="stylesheet">
    <link   href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link   href="bootstrap/css/style.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
        <div class="row">
                <h3 align="center">PHP-POO-MYSQL</h3>
        </div>
          <div class="row">
              <?php
     
                    include "dbconnexion/fonctionsql.php";
                    include "dbconnexion/fonctionaffichage.php";
                    affichageTable(getAllUsers());
                ?>
            </div>
    </div> <!-- /container -->
  </body>
      <script src="datatables/jquery-3.4.1.min.js"></script>
      <script src="js/script.js"></script>
      <script src="datatables/dataTables.js"></script>
      <script src="bootstrap/js/bootstrap.js"></script>
      <script src="datatables/dataTables.Buttons.min.js"></script>
      <script src="datatables/dataTables.Buttons.flash.min.js"></script>
      <script src="datatables/dataTables.Buttons.html5.min.js"></script>
      <script src="datatables/dataTables.Buttons.jszip.min.js"></script>
      <script src="datatables/dataTables.Buttons.pdfmake.min.js"></script>
      <script src="datatables/dataTables.Buttons.print.min.js"></script>
      <script src="datatables/dataTables.vfpdfmake.min.js"></script>


</html>