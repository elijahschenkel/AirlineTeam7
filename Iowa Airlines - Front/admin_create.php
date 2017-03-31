<?php
    // turn error reporting on, it makes life easier if you make typo in a variable name etc
    error_reporting(E_ALL);

    session_start();

    //Start Database
    $IP = "127.0.0.1";
    $user = "FSE";
    $pass = "airline";
    $db = "Airline_Users";
    $con = mysqli_connect($IP, $user, $pass, $db);

    // Check connection
    if (!$con) {
        echo "<div>";
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        echo "</div>";
    }
    
    // Enhancements: check for existing username, existing email

    $username = isset($_POST["user"]) ? $_POST["user"] : null;

    $password = isset($_POST["pass"]) ? $_POST["pass"] : null;

    $firstname = isset($_POST["fn"]) ? $_POST["fn"] : null;

    $lastname = isset($_POST["ln"]) ? $_POST["ln"] : null;

    $email = isset($_POST["email"]) ? $_POST["email"] : null;

    $account = isset($_POST["at"]) ? $_POST["at"] : null;

    if ($username && $password && $firstname && $lastname && $email && $account){

        $query = "INSERT INTO user(username,password,firstname,lastname,email,accounttype) VALUE ('$username','$password','$firstname','$lastname','$email','$account')";

        $result = mysqli_query( $con, $query);

        if(!$result) {
            echo "hmm";
        }

        else {
            echo '<script type="text/javascript">
            window.location = "index.html#admin_login"
        </script>';
        }
    }
    
    else {
        echo "Please complete form";
         echo '<script type="text/javascript">
            window.location = "index.html#create_unsuccessful"
        </script>';
    }

?>
