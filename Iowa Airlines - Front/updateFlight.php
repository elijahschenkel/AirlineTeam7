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
    $PlaneID = isset($_POST["planeID"]) ? $_POST["planeID"] : null;

    $company = isset($_POST["make"]) ? $_POST["make"] : null;

    $model = isset($_POST["model"]) ? $_POST["model"] : null;

    $capacity = isset($_POST["max"]) ? $_POST["max"] : null;

    $flightnumber = isset($_POST["flightnum"]) ? $_POST["flightnum"] : null;
    
    $departlocation = isset($_POST["admin_deploc"]) ? $_POST["admin_deploc"] : null;

    $arrivallocation = isset($_POST["admin_arrloc"]) ? $_POST["admin_arrloc"] : null;

    $departtime = isset($_POST["admin_deptime"]) ? $_POST["admin_deptime"] : null;

    $arrivaltime = isset($_POST["admin_arrtime"]) ? $_POST["admin_arrtime"] : null;

    $departdate = isset($_POST["admin_depdate"]) ? $_POST["admin_depdate"] : null;

    $arrivaldate = isset($_POST["admin_arrdate"]) ? $_POST["admin_arrdate"] : null;


    if ($PlaneID && $flightnumber && $departlocation){

        //UPDATE `Airline_Users`.`flights` SET `departure_time`='800' WHERE `flightnumber`='917';
        
        $sql = "UPDATE flights SET'departure_loc'='$departlocation','arrival_loc'='$arrivallocation','departure_time'='$departtime','arrival_time'='$arrivaltime','departure_date'='$departdate','arrival_date'='$arrivaldate' WHERE 'flightnumber' = '$flightnumber'";
        
        $con->query($sql);
        // Prepare statement
        //$stmt = $con->prepare($sql);

        // execute the query
        //$stmt->execute();
        
        //$result = mysqli_query( $con, $sql);

        echo '<script type="text/javascript">
           window.location = "index.html#admin_login"
           </script>';
    }
    else {
        echo '<script type="text/javascript">
            window.location = "index.html#admin_newflight_unsuccessful"
            </script>';
    }


?>
    