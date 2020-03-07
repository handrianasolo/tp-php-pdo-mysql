<?php

  // affichage vue administration
  function affichageTable($rows) {

?>
   
    <nav class="navbar">
        <a href="crud/createpage.php" class="btn btn-success">Create</a>
    </nav>
    <form class="form-horizontal" action="index.php" method="post">
      <table class="table table-striped" style="width:100%" id="accueil">
          <thead>
            <tr>
              <th>Pseudo</th>
              <th>&Agrave;ge</th>
              <th>Genre</th>
              <th>T&eacute;l&eacute;phone</th>
              <th>E-mail</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
               foreach ( $rows as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['pseudo'] . '</td>';
                  echo '<td>'. $row['age'] . ' </td>';
                  echo '<td>'. $row['sexe'] . '</td>';
                  echo '<td>'. $row['mobile'] . '</td>';
                  echo '<td>'. $row['email'] . '</td>';
                  echo '<td><a class="btn btn-default" href="crud/editremovepage.php?id='.$row['id_formulaire'].'">Edit/Remove</a></td>';
                  echo '</tr>';
                }
            ?>
        </tbody>
      </table>
    </form>
    <p align="left"><a href="?q=logout">Logout to exit</a></p>
<?php
}


  // affichage ajouter
  function afficherFormCreate(){

?>
    <div class="span10 offset1">
             
      <form class="form-horizontal" action="createpage.php" method="post">
          <div class="form-actions">
              <h3>Create a Customer</h3>
          </div>
          <div class="control-group">
            <label class="control-label">Pseudo</label>
            <div class="controls">
                <input name="pseudo" type="text" required maxlength="40">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">&Agrave;ge</label>
            <div class="controls">
                <input name="age" type="number" min="0" max="101" required placeholder="Entre 1 et 101" maxlength="40">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Genre</label>
            <div class="controls">
               <input type="radio" name="sexe" value="Homme" required>Homme<br>
            </div>
            <div class="controls">
                <input name="sexe" type="radio" value="Femme" required>Femme
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Num&eacute;ro t&eacute;l&eacute;phone</label>
            <div class="controls">
                <input name="mobile" type="text" placeholder="+33" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" 
                    required maxlength="40">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">E-mail</label>
            <div class="controls">
                <input name="email" type="email" required oncopy="return false" onpaste="return false" oncut="return false" maxlength="40">
            </div>
          </div>
          <div class="form-actions">
              <input type="submit" class="btn btn-success" name="add" value="add">
              <a class="btn" href="../accueil.php">Cancel</a>
            </div>
        </form>
    </div>
  
<?php
}


  // affichage edition ou suppression
  function afficherFormEditRemove(){

    $var = htmlspecialchars($_GET['id']);
    $user = readUser($var);
?>
    <div class="span10 offset1">
           
        <form class="form-horizontal" action="editremovepage.php" method="get">
            <div class="form-actions">
                <h3>Edit or Remove a Customer</h3>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
            <div class="control-group">
              <label class="control-label">Pseudo</label>
              <div class="controls">
                  <input name="pseudo" type="text" required maxlength="40" 
                  id="pseudo" value="<?php echo $user['pseudo']?>" maxlength="40">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">&Agrave;ge</label>
              <div class="controls">
                  <input name="age" type="number" min="0" max="101" required placeholder="Entre 1 et 101" 
                  id="age" value="<?php echo $user['age']?>" maxlength="40">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Genre</label>
              <div class="controls">
                 <input type="radio" name="sexe" value="Homme" id="Homme" 
                 <?php if($user['sexe']=='Homme') { ?> checked <?php } ?> required>Homme<br>
              </div>
              <div class="controls">
                  <input name="sexe" type="radio" value="Femme" id="Femme" 
                  <?php if($user['sexe']=='Femme') {?> checked <?php }?> required>Femme
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Num&eacute;ro t&eacute;l&eacute;phone</label>
              <div class="controls">
                  <input name="mobile" type="text" placeholder="+33" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" 
                      id="mobile" value="<?php echo $user['mobile']?>" required maxlength="40">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">E-mail</label>
              <div class="controls">
                  <input name="email" type="email" id="email" value="<?php echo $user['email']?>" required oncopy="return false" 
                  onpaste="return false" oncut="return false" maxlength="40">
              </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="edit" value="edit">
                <input type="submit" class="btn btn-success" name="remove" value="remove">
                <a class="btn" href="../accueil.php">Cancel</a>
              </div>
          </form>
      </div>

<?php
    }

    // affichage vue public
    function affichagePublic($rows) {

?>
    <!--<nav class="navbar">
        <a href="generatepdf/index-pdf.php" class="btn btn-success">Generate PDF</a>
    </nav> -->
    <div class="row">  
    <form class="form-horizontal" action="index.php" method="post">
      <table class="table table-striped" style="width:100%" id="index">
          <thead>
            <tr>
              <th>Pseudo</th>
              <th>&Agrave;ge</th>
              <th>Genre</th>
              <th>T&eacute;l&eacute;phone</th>
              <th>E-mail</th>
            </tr>
          </thead>
          <tbody>
            <?php
               foreach ( $rows as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['pseudo'] . '</td>';
                  echo '<td>'. $row['age'] . ' </td>';
                  echo '<td>'. $row['sexe'] . '</td>';
                  echo '<td>'. $row['mobile'] . '</td>';
                  echo '<td>'. $row['email'] . '</td>';
                  echo '</tr>';
                }
            ?>
        </tbody>
      </table>
    </form>
  </div>
    <p align="left"><a href="index.php" class="stretched-link" data-toggle="modal" data-target="#login-modal">Login here to modify</a>
    - Not registered yet? -<a align="right" href="index.php" class="stretched-link" data-toggle="modal" data-target="#register-modal"> Register Here</a></p></p>

    <div class="row">  
    <div class="modal" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="registermodal-container">
              <h3>Registration</h3><br>
                <form action="index.php" method="post">
                  <div style="padding:10px 20px;">
                      <label>Pseudo</label>
                      <input type="text" name="user_login" required>
                      <label>Password</label>
                      <input type="password" name="user_pass" pattern="[0-9a-zA-Z-\.]{5,7}" placeholder="5 to 7 characters" required>
                      <input type="submit" name="submit" class="register registermodal-submit" value="Register">
                  </div>
                </form>
                <!--<div class="login-help">
                  <p align="right"><a href="index.php" data-toggle="modal" data-target="#register-modal">Cancel</a></p> 
                </div>-->
            </div>
          </div>
        </div>
      </div>

    <div class="row">     
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="loginmodal-container">
          <h3>Log In</h3><br>
            <form action="index.php" method="post">
              <div style="padding:10px 20px;">
                  <input type="text" name="user_login" placeholder="Username" required>
                  <input type="password" name="user_pass" placeholder="Password" required>
                  <input type="submit" id="dialog-ok" name="submit" class="login loginmodal-submit" value="Login">
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  
<?php
}

  // affichage des articles
  //function affichageArticles($articles) {
?>
    <!--<div class="row">  
    <h3> blog de commentaires:</h3>
    <?php
       foreach ( $articles as $article) {
          echo '<h2>'.$article['title'].'</h2>';
          echo '<a href="article.php?id='.$article['id'].'">Read more...</a>';
        }

    ?>
  </div>
}


<div class="row">
  <h6>Comments</h6>
    <div class="comment-form-container">
        <form id="frm-comment">
            <div class="input-row">
                <input type="hidden" name="comment_id" id="commentId"
                    placeholder="Name" /> <input class="input-field"
                    type="text" name="name" id="name" placeholder="Name" />
            </div>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment"
                    id="comment" placeholder="Add a Comment">  </textarea>
            </div>
            <div>
                <input type="button" class="btn-submit" id="submitButton"
                    value="Publish" /><div id="comment-message">Comments Added Successfully!</div>
            </div>

        </form>
    </div>
    <div id="output"></div>
  </div>

-->



