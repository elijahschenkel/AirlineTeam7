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

    $flightnumber = isset($_POST["fn"]) ? $_POST["fn"] : null;

    if ($flightnumber){
        
        // check if flight is in DB and add it if it is not
        
        $query = "SELECT flightnumber FROM flights WHERE flightnumber = '$flightnumber'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);
        
        if(!$row){//flight doesn't exist
            echo '<script type="text/javascript">
           window.location = "index.html#admin_login"
           </script>';
        }
        else {//plane does exist
            echo '<script type="text/javascript">
           window.location = "index.html#manager_update_second_screen"
           </script>';
        }
        
        

        echo '<script type="text/javascript">
           window.location = "index.html#admin_login"
           </script>';
    }
    else {
        echo '<script type="text/javascript">
           window.location = "index.html#admin_login"
           </script>';
    }


?>
    