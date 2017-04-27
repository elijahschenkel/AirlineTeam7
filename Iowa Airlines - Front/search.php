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

        $query = "SELECT * from flights WHERE departure_loc = '$from' AND arrival_loc = '$to' AND departure_date = '$departdate'";

        $result = mysqli_query( $con, $query);

        $arr = array();
        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $arr[] = $row;
          }
        }

        echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";  
        echo "<tr style='font-weight: bold;'>";  
        echo "<td width='150' align='center'>Flight Number</td>";  
        echo "<td width='150' align='center'>Departure Location</td>"; 
        echo "<td width='150' align='center'>Departure Date</td>"; 
        echo "<td width='150' align='center'>Departure Time</td>"; 
        echo "<td width='150' align='center'>Arrival Location</td>"; 
        echo "<td width='150' align='center'>Arrival Date</td>"; 
        echo "<td width='150' align='center'>Arrival Time</td>"; 
        echo "</tr>";

        foreach ($arr as $row) { 
          echo '<td width="150" align=center>' . $row['flight_number'] . '</td>'.
               '<td width="150" align=center>' . $row['departure_loc'] . '</td>'.
               '<td width="150" align=center>' . $row['departure_date'] . '</td>'.
               '<td width="150" align=center>' . $row['departure_time'] . '</td>'.
               '<td width="150" align=center>' . $row['arrival_loc'] . '</td>'.
               '<td width="150" align=center>' . $row['arrival_date'] . '</td>'.
               '<td width="150" align=center>' . $row['arrival_time'] . '</td>';
          echo '</tr>';
        }

        echo "<button type='button' onclick='myFunction()'>New Search</button>";
        echo '<script>
            function myFunction(){
                window.location = "index.html#search"
            }
            </script>';

    }

    else {
        echo "boo";
    }
?>