<?php

  // create user
  if(isset($_POST['add']) ){
          $pseudo = htmlspecialchars($_POST['pseudo']); // supprime le code html et php de la variable pour plus de securite
          $age = htmlspecialchars($_POST['age']);
          $sexe = htmlspecialchars($_POST['sexe']);
          $mobile = htmlspecialchars($_POST['mobile']);
          $email = htmlspecialchars($_POST['email']);
              try{
                  createUser($pseudo, $age, $sexe, $mobile, $email);
                  header('Location: ../accueil.php');
              } catch(PDOException $error){
                     echo 'insert error :'.$error->getMessage();
          }
  }

  // edit user
  if(isset($_GET['edit'])){
      $id = strip_tags($_GET['id']); // supprime le code html et php de la variable pour plus de securite
      $pseudo = strip_tags($_GET['pseudo']);
      $age = strip_tags($_GET['age']);
      $sexe = strip_tags($_GET['sexe']);
      $mobile = strip_tags($_GET['mobile']);
      $email = strip_tags($_GET['email']);
          try{
              updateUser($id, $pseudo, $age, $sexe, $mobile, $email);
              header('Location: ../accueil.php');
              exit;
          } catch(PDOException $error){
                 echo 'update error :'.$error->getMessage();
      }
    }

    // remove user
    if(isset($_GET['remove'])){
      $id = strip_tags($_GET['id']);
          try{
              deleteUser($id);
              header('Location: ../accueil.php');
              exit;
          } catch(PDOException $error){
                 echo 'delete error :'.$error->getMessage();
      }
    }

    // get id article
    //if(isset($_GET['id'])){
    //  $id = strip_tags($_GET['id']);
    //      try{
    //          getArticle($id);
    //          header('Location: ../index.php');
    //          exit;
    //      } catch(PDOException $error){
    //             echo 'get article error :'.$error->getMessage();
    //  }
   // }

?>