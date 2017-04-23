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

    if ($from && $departdate && $num_adults) {
        $query = "SELECT flight_number AND departure_loc AND departure_date AND departure_time AND arrival_loc AND arrival_date AND arrival_time FROM flights WHERE departure_loc = '$from' AND arrival_loc = '$to' AND departure_date = '$departdate'";

       $result = mysqli_query( $con, $query);
        
       while($tableName = mysqli_fetch_row($result)) {
           $table = $tableName[0];
           
           echo '<h3>',$table,'</h3>';
           
           $query2 = "SELECT flight_number AND departure_loc AND departure_date AND departure_time AND arrival_loc AND arrival_date AND arrival_time FROM flights";
           
           $res2 = mysqli_query( $con, $query2); //or die('cannot show columns from '.$table);
           
           if(mysqli_num_rows($res2)) {
               echo '<table cellpadding="4" cellspacing="4">';
               
               echo '<tr><th>Flight Number  |</th><th> Departure Location | </th><th> Departure Date | </th><th> Departure Time | </th><th> Arrival Location | </th><th> Arrival Date | </th><th>  Arrival Time | </th></tr>';
               
               while($row2=mysqli_fetch_row($res2)) {
                   echo '<tr>';
                   foreach($row2 as $key=>$value){
                       echo '<td>',$value,'</td>';
                   }
                   echo '</tr>';
               }
               echo '</table><br />';
           }
       }
    }

//        if(!$result){
//            echo "<div>";
//            echo "Sorry, no flights";
//            echo "</div>";
//        }
//        else {
//            echo "yay";
//        }       

    else {
        echo "boo";
    }
?>