<?php 
define('DB_HOST', '127.0.0.1'); 
define('DB_NAME', 'userDB'); 
define('DB_USER','root'); 
define('DB_PASSWORD','leonidas'); 

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_connect_error()); 

$db=mysqli_select_db($con, DB_NAME) or die("Failed to connect to MySQL: " . mysqli_connect_error()); 

function NewUser(mysqli $con) {
    session_start();
	$fullname = $_POST['name'];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$query = "INSERT INTO userDB (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')";
    
	$data = mysqli_query($query)or die(mysqli_connect_error());
	if($data) {
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
}

/*function SignUp(mysqli $con){
    session_start();
    if(!empty($_POST['user'])) {
	   $query = mysql_query("SELECT * FROM userName WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysqli_connect_error());

	   if(!$row = mysql_fetch_array($query) or die(mysqli_connect_error())) {
		  newuser();
	   }
	   else {
           echo "This account is already registered";
	   }
    }
}*/

if(isset($_POST['submit'])) {
	SignUp($con);
}

?>
