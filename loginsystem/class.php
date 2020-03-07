<?php  

define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('DB', 'db_formulaire');  

class DB  {  

    function __construct() {  
       /* $con = mysql_connect(HOST, USER, PASS) or die('Connection Error! '.mysql_error());  
        $this->con = mysql_select_db(DB, $con) or die('DB Connection Error: '.mysql_error()); */ 
    }  
}  
  
class User  {  

    private $host = 'localhost';  
    private $user = 'root';  
    private $pass = ''; 
    private $db ='db_formulaire'; 

    public  function __construct() {  
        $con = mysql_connect(HOST, USER, PASS) or die('Connection Error! '.mysql_error());
        $this->db = mysql_select_db(DB, $con) or die('DB Connection Error: '.mysql_error());

    }  
  
    public  function register($user_login, $user_pass) {  
        $user_pass = md5($user_pass);  
        $checkuser = mysql_query("Select id_login from tb_login where user_login ='$user_login'"); 
        $result = mysql_num_rows($checkuser);  
        if ($result == 0) {  
            $register = mysql_query("Insert into tb_login (user_login, user_pass) values ('$user_login','$user_pass')") or die(mysql_error());  
            return $register;  
        } else {  
            return false;  
        }  
    }  
  
    public  function login($user_login, $user_pass) {  
        $user_pass = md5($user_pass);                
        $check = mysql_query("Select * from tb_login where user_login='$user_login' and user_pass='$user_pass'"); 
        $data = mysql_fetch_array($check);  
        $result = mysql_num_rows($check);  
        if ($result == 1) {  
            $_SESSION['login'] = true;  
            $_SESSION['id'] = $data['id_login'];  
            return true;  
        } else {  
            return false;  
        }  
    }  
  
    public  function session() {  
        if (isset($_SESSION['login'])) {  
            return $_SESSION['login'];  
        }  
    }  
  
    public  function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    }  
}  
  
?> 