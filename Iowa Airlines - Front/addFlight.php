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
    $planeID = isset($_POST["planeID"]) ? $_POST["planeID"] : null;

    $flightnumber = isset($_POST["flightnum"]) ? $_POST["flightnum"] : null;
    
    $departlocation = isset($_POST["admin_deploc"]) ? $_POST["admin_deploc"] : null;

    $arrivallocation = isset($_POST["admin_arrloc"]) ? $_POST["admin_arrloc"] : null;

    $departtime = isset($_POST["admin_deptime"]) ? $_POST["admin_deptime"] : null;

    $arrivaltime = isset($_POST["admin_arrtime"]) ? $_POST["admin_arrtime"] : null;

    $departdate = isset($_POST["admin_depdate"]) ? $_POST["admin_depdate"] : null;

    $arrivaldate = isset($_POST["admin_arrdate"]) ? $_POST["admin_arrdate"] : null;

    $recurrence = isset($_POST["rec"]) ? $_POST["rec"] : null;

    $date = explode("/",$departdate);

    $flightnumberavailable = false;

    if ($planeID && $flightnumber && $departlocation){
        for ($x = 0; $x <= $recurrence; $x++) {
            if ($date[1] >= 30){
                $date[1] = 1;
                $date[0] = $date[0] + 1;
            }
            if ($date[0] >= 12){
                $date[0] = 1;
                $date[2] = 1;
            }
            $day = (string) $date[1];
            $month = (string) $date[0];
            $year = (string) $date[2];
            $newdate = $month . "/" . $day . "/" . $year;
            While (!$flightnumberavailable){
                $query = "SELECT flightnumber FROM flights WHERE flightnumber = '$flightnumber'";

                $result = mysqli_query( $con, $query);

                $row = mysqli_fetch_array($result);

                if(!$row){
                    $flightnumberavailable = true;
                }
                else {
                    $flightnumber = $flightnumber + 1;
                }
            }
            $flightnumberavailable = false;
            $query = "INSERT INTO flights(flightnumber,departure_loc,arrival_loc,departure_time,arrival_time,departure_date,arrival_date,planeID) VALUE ('$flightnumber','$departlocation','$arrivallocation','$departtime','$arrivaltime','$newdate','$newdate','$planeID')";

            $result = mysqli_query( $con, $query);
            $date[1] = $date[1] + 1;
            $flightnumber = $flightnumber + 1;
        }
        
        // TODO: check if plane is in DB and add it if it is not
        /*
        $query = "SELECT planeID FROM planes WHERE planeID = '$PlaneID'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);
        
        if(!$row){//plane doesn't exist yet, add plane
            $query = "INSERT INTO planess(planeID,company,moded,capacity) VALUE ('$PlaneID','$make','$model','$max')";
        }
        else {//plane does exist
            
        }*/
        
        

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
    