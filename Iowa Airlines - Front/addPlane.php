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
    
    $company = isset($_POST["make"]) ? $_POST["make"] : null;

    $model = isset($_POST["model"]) ? $_POST["model"] : null;

    $capacity = isset($_POST["max"]) ? $_POST["max"] : null;

    $firstclass = isset($_POST["first"]) ? $_POST["first"] : null;
        
    $buisnessclass = isset($_POST["buis"]) ? $_POST["buis"] : null;
        
    $economyclass = isset($_POST["eco"]) ? $_POST["eco"] : null;


    if ($company && $model && $capacity){

        $query = "INSERT INTO planes(company,model,capacity,firstclass,buisnessclass,economyclass) VALUE ('$company','$model','$capacity','$firstclass','$buisnessclass','$economyclass')";
        
        $result = mysqli_query( $con, $query);

        echo '<script type="text/javascript">
           window.location = "index.html#admin_login"
           </script>';
    }
    else {
       // echo '<script type="text/javascript">
         //   window.location = "index.html#admin_newflight_unsuccessful"
        //</script>';
    }


?>
    