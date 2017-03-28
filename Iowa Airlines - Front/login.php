<?php
    // turn error reporting on, it makes life easier if you make typo in a variable name etc
    error_reporting(E_ALL);

    session_start();

    //Start Database
    $IP = "127.0.0.1";
    $user = "root";
    $pass = "leonidas";
    $db = "Airline_Users";
    $con = mysqli_connect($IP, $user, $pass, $db);

    // Check connection
    if (!$con) {
        echo "<div>";
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        echo "</div>";
    }

    $loggedIn = false;

    $userName = isset($_POST["user"]) ? $_POST["user"] : null;

    $userPass = isset($_POST["pass"]) ? $_POST["pass"] : null;

    if ($userName && $userPass )
    {
        $query = "SELECT username FROM user WHERE username = '$userName' AND password = '$userPass'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);

        if(!$row){
            echo "<div>";
            echo "No existing user or wrong password.";
            echo "</div>";
        }
        else {
            $loggedIn = true;
        }
    }

    if ( !$loggedIn )
    {
        echo "
                <form action='logmein.php' method='post'>
                    Name: <input type='text' name='name' value='$userName'><br>
                    Password: <input type='password' name='pass' value='$userPass'><br>
                    <input type='submit' value='log in'>
                </form>
            ";
    }
    else{
        echo "<div>";
        echo "You have been logged in as $userName!";
        echo "</div>";
        $_SESSION["name"] = $userName;
    }