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

    $password = isset($_POST["pass"]) ? $_POST["pass"] : null;

    $firstname = isset($_POST["fn"]) ? $_POST["fn"] : null;

    $lastname = isset($_POST["ln"]) ? $_POST["ln"] : null;

    $email = isset($_POST["email"]) ? $_POST["email"] : null;
?>