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

    $email = isset($_POST["email"]) ? $_POST["email"] : null;

    if ($username && $email )
    {
        $query = "SELECT username FROM user WHERE username = '$username' AND email = '$email'";

        $result = mysqli_query( $con, $query);

        $row = mysqli_fetch_array($result);

        if(!$row){
            echo "<div>";
            echo "No existing user or email.";
            echo "</div>";
        }
        else {
            $delete = "DELETE FROM password WHERE username= '$username' AND email = '$email'";
            
            $delete_result = mysqli_query( $con, $delete );
            
            if(!delete_result) {
            echo "hmm";
            }

        // Enhancement: redirect to reset password email 
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
            
            $mail->Subject = 'Password Reset';
            $mail->Body = 'Thank you for verifying your email.

            Please click the following link to reset your password for your account:
            http://localhost:8000/index.html#reset

            You will be redirected to a reset page.';
            $mail->addEmbeddedImage('Images/banner.jpeg','banner',
                'banner.jpeg');
            
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }

            else {
                echo '<script type="text/javascript">
                    window.location = "index.html#reset_successful"
                </script>';
            }
        }
    }

?>
