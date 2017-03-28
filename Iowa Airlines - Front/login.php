<?php 

define('DB_HOST', 'localhost');
define('DB_NAME', 'user');
define('DB_USER','root'); 
define('DB_PASSWORD','12'); 

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 

if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$db=mysqli_select_db($con,DB_NAME); 

function SignIn(mysqli $con) { 
    session_start(); 
    if(!empty($_POST['user'])) { 
        $query = mysqli_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysqli_error()); 
        $row = mysqli_fetch_array($query) or die(mysqli_error()); 
        
        if(!is_null($row['userName']) AND !empty($row['pass'])) { 
            $_SESSION['userName'] = $row['pass']; 
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
        } 
        else {
            echo "SORRY... YOU ENTERED WRONG ID OR PASSWORD... PLEASE RETRY"; 
        } 
    } 
    else {
        echo "PLEASE ENTER A VALID USERNAME";
    }
}

if(isset($_POST['submit'])) { 
        SignIn($con); 
    } 
?>

