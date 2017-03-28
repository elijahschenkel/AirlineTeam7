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

    $username = $_POST['user'];
    $password = $_POST['pass'];

    $query = "INSERT INTO user(username,password) VALUE ('$username','$password')";

    $result = mysqli_query( $con, $query);

    //$row = mysqli_fetch_array($result);

    if(!$result) {
        echo "rurow";
    }

    else {
        echo "YOUR REGISTRATION IS COMPLETED...";
    }

?>
