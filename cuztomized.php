<?php
require_once 'cuztomizeddb.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cuztomize your furniture</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['send'])) {
  $name = $_POST['name'] ?? ''; // Set default value to empty string if not set
  $email = $_POST['email'] ?? ''; // Set default value to empty string if not set
  $phonenumber = $_POST['phonenumber'] ?? ''; // Set default value to empty string if not set
  $description = $_POST['description'] ?? ''; // Set default value to empty string if not set
  $quantity = $_POST['quantity'] ?? ''; // Set default value to empty string if not set

  $hasImage = isset($_FILES['Furniimage']) && $_FILES['Furniimage']['error'] === UPLOAD_ERR_OK; // Check for valid image upload
  $Furniimage = $hasImage ? $_FILES['Furniimage']['name'] : ''; // Assign image name if uploaded

  if ($hasImage) {
    $uploadPath = __DIR__ . '/' . $Furniimage; // Construct path relative to script location
    move_uploaded_file($_FILES['Furniimage']['tmp_name'], $uploadPath); // Move uploaded file
  }

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'furniflex20@gmail.com'; // Gmail address used as SMTP server
    $mail->Password = 'bstnwiyqedzypwdi'; // Password for the Gmail address
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('furniflex20@gmail.com'); // Gmail address used as SMTP server
    $mail->addAddress('youranyemail@gmail.com'); // Email address where you want to receive emails

    $mail->isHTML(true);
    $mail->Subject =  $name;

    $mail->Body = "<h3>Name: $name <br>Email: $email <br>Phonenumber: $phonenumber <br>Description: $description <br>Quantity: $quantity <br>";

    if ($hasImage) {
      $mail->addAttachment($uploadPath, $Furniimage); // Attach image using correct path
    }

    $mail->send();
    echo '<script>
    swal("Successfully sended!", "Please wait we conform your order", "success").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/cuztomizednav.php";
    });
  </script>';
  } catch (Exception $e) {
    echo '<script>
    swal("Not sended!", "", "error").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/cuztomizednav.php";
    });
  </script>';
  }
}
?>
