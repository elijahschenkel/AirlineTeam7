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
    
    // Enhancements: check for existing username, existing email

    $username = isset($_POST["user"]) ? $_POST["user"] : null;

    $password = isset($_POST["pass"]) ? $_POST["pass"] : null;

    $firstname = isset($_POST["fn"]) ? $_POST["fn"] : null;

    $lastname = isset($_POST["ln"]) ? $_POST["ln"] : null;

    $email = isset($_POST["email"]) ? $_POST["email"] : null;

    if($username == "admin" || "Admin" || "ADMIN"){
        echo '<script type="text/javascript">
            window.location = "index.html#create_no"
        </script>';
    }

    if ($username && $password && $firstname && $lastname && $email){

        $query = "INSERT INTO user(username,password,firstname,lastname,email,accounttype) VALUE ('$username','$password','$firstname','$lastname','$email','user')";

        $result = mysqli_query( $con, $query);

        if(!$result) {
            echo "hmm";
        }

        // Enhancement: redirect to homepage with "Welcome, [user]" header
        else {
            date_default_timezone_set('Etc/UTC');

            require 'PHPMailerAutoload.php';
            
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            
            $mail->Username = "IowaAirlinesFSD@gmail.com";
            $mail->Password = "Password7";
            $mail->setFrom('IowaAirlinesFSD@gmail.com', 'Iowa Airlines Team');
            $mail->addAddress($email, $username);
            
            $mail->Subject = 'Email Verification';
            $mail->Body = 'Thank you for registering with Iowa Airlines!

            Please click the following link to verify your registration:
            http://localhost:8000/index.html#create_successful

            You will be redirected to a confirmation page.';
            $mail->addEmbeddedImage('Images/banner.jpeg','banner',
                'banner.jpeg');
            
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        }
    }
    
    else {
        echo '<script type="text/javascript">
            window.location = "index.html#create_unsuccessful"
        </script>';
    }

?>
