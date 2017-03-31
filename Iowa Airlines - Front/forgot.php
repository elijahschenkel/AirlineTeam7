<?php
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

    $username = isset($_POST["user"]) ? $_POST["user"] : null;

    $email = isset($_POST["email"]) ? $_POST["email"] : null;

    if ($username && $email )
    {
        $query = "SELECT username FROM user WHERE username = '$username' AND email = '$email'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);

        if(!$row){
            echo "<div>";
            echo "No existing user or email.";
            echo "</div>";
        }
        else {
            $delete = "DELETE FROM password WHERE username= '$username' AND email = '$email'";
            
            $delete_result = mysqli_query( $con, $delete );
            
            if(!delete_result) {
            echo "hmm";
            }

        // Enhancement: redirect to reset password email 
            else {
                echo '<script type="text/javascript">
                    window.location = "index.html#reset_successful"
                </script>';
            }
        }
    }

?>
