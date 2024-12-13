<?php
// Include database connection and PHPMailer
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/PHPMailer/src/PHPMailer.php";
require __DIR__ . "/PHPMailer/src/SMTP.php";
require __DIR__ . "/PHPMailer/src/Exception.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $str = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $str);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Sorry, this email is already registered');</script>";
        header("Refresh:0; url=index.php");
    } else {
        // Insert user into the database
        $server_date = date("Y-m-d H:i:s"); // Ensure $server_date is set
        $str1 = "INSERT INTO user (username, email, password, date) VALUES ('$username', '$email', '$password', '$server_date')";
        $result = mysqli_query($conn, $str1);

        if ($result) {
            // Send email using PHPMailer
            $mail = new PHPMailer(true);

            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'localhost'; 
                $mail->SMTPAuth = false;
                $mail->Username = 'your-email@example.com'; // Replace with your email
                $mail->Password = 'your-password'; // Replace with your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS
                $mail->Port = 587; // Adjust based on your SMTP server

                // Email settings
                $mail->setFrom('admin@quiz.com', 'Quiz-System'); // Sender info
                $mail->addAddress($email); // Recipient's email

                $mail->isHTML(true);
                $mail->Subject = "Sign-Up Successfully For OQS";

                $body = "<b style='color:green;font-size:25px;'>Dear $username,</b><br/><br/>
                        <b style='color:green;font-size:25px;'>You have registered yourself for Online Quiz System</b><br/><br/>
                        Your login details are as under: <br/><hr/><br/>
                        <b style='color:red;font-size:25px;'>Email: </b>$email<br/>
                        <b style='color:red;font-size:25px;'>Password: </b>$password<br/><br/>
                        Kindly login with the above credentials. <br/>
                        Please keep the above details for future records. <br/>
                        Regards, <br/>PHPGuru<br/><hr/>";

                $mail->Body = $body;

                // Send email
                if ($mail->send()) {
                    echo "<script>alert('Congrats! You have successfully registered.');</script>";
                    echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 00);</script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script>alert('Error registering user. Please try again.');</script>";
        }
    }
}
?>
