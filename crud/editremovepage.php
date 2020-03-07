<?php
     
     include "../dbconnexion/fonctionsql.php";
     include "../dbconnexion/fonctionaffichage.php";
     include "../crud/action.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">       
        <?php afficherFormEditRemove(); ?>
    </div> <!-- /container -->
  </body>
  <script src="../bootstrap/js/bootstrap.js"></script>
</html>