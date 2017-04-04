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

    $tickettype = isset($_POST["tt"]) ? $_POST["tt"] : null;

    $flightpref = isset($_POST["flightpref"]) ? $_POST["flightpref"] : null;

    $from = isset($_POST["from"]) ? $_POST["from"] : null;

    $to = isset($_POST["to"]) ? $_POST["to"] : null;

    $departdate = isset($_POST["dep_date"]) ? $_POST["dep_date"] : null;

    $returndate = isset($_POST["ret_date"]) ? $_POST["ret_date"] : null;

    $num_adults = isset($_POST["num_adults"]) ? $_POST["num_adults"] : null;

    $num_childs = isset($_POST["num_childs"]) ? $_POST["num_childs"] : null;

    if ($from && $departdate)
    {
        $query = "SELECT departure_loc FROM flights WHERE departure_loc = '$from' AND departure_date = '$departdate'";

        $result = mysqli_query( $con, $query);
        
        $row = mysqli_fetch_array($result);

        if(!$row){
            echo "<div>";
            echo "Sorry, no flights";
            echo "</div>";
        }
        else {
            echo "<table>"; // start a table tag in the HTML

            while($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
                echo "<tr><td>" . $row['flight_number'] . "</td><td>" . $row['departure_loc'] . "</td></tr>" . "<tr><td>" . $row['arrival_loc'] . "<tr><td>" . "<tr><td>" . $row['departure_time'] . "</td><td>" . "<tr><td>" . $row['arrival_time'] . "</td><td>"  . "<tr><td>" . $row['departure_date'] . "</td><td>" . "<tr><td>" . $row['arrival_date'] . "</td><td>" ;  //$row['index'] the index here is a field name
        }       

       echo "</table>"; 
        }
    }

    echo "boo";
?>