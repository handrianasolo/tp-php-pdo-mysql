<?php  
   session_start();  
   include_once 'loginsystem/class.php';
  
   $user = new User();  
   if ($_SERVER["REQUEST_METHOD"] == "POST"){  
      $login = $user->login($_REQUEST['user_login'],$_REQUEST['user_pass']);  
      if($login){  
         header("location:accueil.php");  
      }
      else
      {  
         echo "Login Failed!";  
      }  
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST"){   
      $register = $user->register($_REQUEST['user_login'],$_REQUEST['user_pass']);

      if($register){

         header('Location:accueil.php'); 
      }
      else
      {  
         echo "Entered pseudo already exist!";
      }  
   }    
?>