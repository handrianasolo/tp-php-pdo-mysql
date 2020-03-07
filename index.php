<?php 
  include "session/session.php"; 
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
                <h3 align="center">PHP-PDO-MYSQL</h3>
        </div>
              <?php
     
                    include "dbconnexion/fonctionsql.php";
                    //include "crud/action.php";
                    include "dbconnexion/fonctionaffichage.php";

                    affichagePublic(getAllUsers());
                    //affichageArticles(getAllArticles());
                ?>
    </div> <!-- /container -->
  </body>
      <script src="datatables/jquery-3.4.1.min.js"></script>
      <script src="datatables/dataTables.js"></script>
      <script src="datatables/dataTables.Buttons.min.js"></script>
      <script src="datatables/dataTables.Buttons.flash.min.js"></script>
      <script src="datatables/dataTables.Buttons.html5.min.js"></script>
      <script src="datatables/dataTables.Buttons.jszip.min.js"></script>
      <script src="datatables/dataTables.Buttons.pdfmake.min.js"></script>
      <script src="datatables/dataTables.Buttons.print.min.js"></script>
      <script src="datatables/dataTables.vfpdfmake.min.js"></script>
      <script src="bootstrap/js/bootstrap.js"></script>
      
      <script src="js/script.js"></script>
</html>