<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);



if(isset($_POST['send'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $message = $_POST['message'];


  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'furniflex20@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'bstnwiyqedzypwdi'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('furniflex20@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('youranyemail@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject =  $name ;
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Phonenumber :$phonenumber <br>Message :$message</h3>";

    $mail->send();
    echo '<script>
    swal("Successfully sended!", "Please wait we response as soon as", "success").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/contactnav.php";
    });
  </script>';
  } catch (Exception $e){
    echo '<script>
    swal("Not sended!", "", "error").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/contactnav.php";
    });
  </script>';
  }
}
?>
