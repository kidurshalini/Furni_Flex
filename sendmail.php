<!DOCTYPE html>
<html>
<head>
    <title>See your mail</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
// Connect to your database
require_once "dbconnection.php";

// Start session
session_start();

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['submited'])) {
    $email = $_SESSION['email'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'furniflex20@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'bstnwiyqedzypwdi'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('furniflex20@gmail.com');
        $mail->addAddress($email);

        $mail->Subject = 'Your order is confirmed';
        // Set HTML 
        $mail->isHTML(true);
        $mail->Body = '<html>Hi there, we are happy to <br>confirm your order.
        </br>   Account No: 00 123 647 840</br>
        Account Name: Jhon Doe</br>
        Branch Name: xyz</br>
         Please check the document in the attachment.</br>
         <p style="color: red;">NOTE:- Send your address within 2 days. Without your response we will cancel your order.</p>
        </html>';
        $mail->AltBody = 'Hi there, we are happy to <br>confirm your order.
        </br>   Account No: 00 123 647 840</br>
        Account Name: Jhon Doe</br>
        Branch Name: xyz</br>
         Please check the document in the attachment.</br>
         <p style="color: red;">NOTE:- Send your address within 2 days. Without your response we will cancel your order.</p>';

        // Fetch PDF file name from the database
        $stmt = $conn->prepare("SELECT pdf FROM invoice WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $pdfFileName = $row['pdf'];

      
        // Attach PDF to the email
        if (file_exists($pdfFileName)) {
            $mail->addAttachment($pdfFileName);
          
        }
        // send the message
        if (!$mail->send()) {
           
        } else {
            echo '<script>
          swal("Ordered Successfully!", "Please check your email", "success").then(function() {
              window.location = "http://localhost/Finalproject/FurniFlex/home.php";
          });
        </script>';
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
