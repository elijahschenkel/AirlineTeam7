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
    
    $loggedIn = false;

    $userName = isset($_POST["user"]) ? $_POST["user"] : null;

    $userPass = isset($_POST["pass"]) ? $_POST["pass"] : null;

    $baggage = isset($_POST["baggage"]) ? $_POST["baggage"] : null;

    $class = isset($_POST["Class"]) ? $_POST["Class"] : null;

    $numberChildren = isset($_POST["num_childs"]) ? $_POST["num_childs"] : null;

    $numberAdults = isset($_POST["num_adults"]) ? $_POST["num_adults"] : null;

    $flightnumber = isset($_POST["flightnumber"]) ? $_POST["flightnumber"] : null;

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
        echo '<script type="text/javascript">
            window.location = "index.html#login_unsuccessful"
        </script>';
    }

    else{
        $query = "SELECT userID FROM user WHERE username = '$userName' AND password = '$userPass'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);
        
        $userID = $row['userID'];
        
        $query = "SELECT email FROM user WHERE username = '$userName' AND password = '$userPass'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);
        
        $email = $row['email'];
        
        if($class == "firstclass")
        {
            $price = 900;
        }
        if($class == "buisness")
        {
            $price = 500;
        }
        if($class == "economy")
        {
            $price = 200;
        }
        $totalTickets = (int)$numberChildren + (int)$numberAdults;
        $totalPrice = $totalTickets*(int)$price;
        for ($x = 0; $x <= $totalTickets; $x++) {

            $query = "INSERT INTO bookings(`flightID`,`class`,`userID`,`baggageweight`,`price`) VALUE ('$flightnumber','$class','$userID','$baggage','$price')";

            $result = mysqli_query( $con, $query);
            
        }
        date_default_timezone_set('Etc/UTC');

        require 'PHPMailerAutoload.php';
            
        $mail = new PHPMailer;
        $mail->isSMTP();
        //$mail->SMTPDebug = 2;
        //$mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
            
        $mail->Username = "IowaAirlinesFSD@gmail.com";
        $mail->Password = "Password7";
        $mail->setFrom('IowaAirlinesFSD@gmail.com', 'Iowa Airlines Team');
        $mail->addAddress($email, $userName);
            
        $mail->Subject = 'Your Tickets Have Been Booked';
        $mail->Body = 'Your Tickets Have Been Booked.
            
        Your booked ' . $numberAdults . ' adult tickets and ' . $numberChildren . ' childrens tickets.
            
        The total payment comes to $' . $totalPrice . '.
            
        The flight you have chosen is flight ' . $flightnumber . '.
            
        You can click the following link for details about that flight.
        http://127.0.0.1:8000/index.html#search
            
        Thank you,
        Iowa Airline Admin
            
        ';
        $mail->addEmbeddedImage('Images/banner.jpeg','banner',
            'banner.jpeg');
            
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
                
        } else {
            echo '<script type="text/javascript">
        window.location = "index.html#user_login"
        </script>';
        }

    }


?>
    