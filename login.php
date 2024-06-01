<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Furni Flex</title>
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php
session_start();
// Include the database connection file
require_once "dbconnection.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password1 = $_POST['password1'];

    // Prepare a statement
    $stmt = $conn->prepare("SELECT * FROM signin_details WHERE email=? AND password1=?");
    
    // Bind parameters
    $stmt->bind_param("ss", $email, $password1);
    
    // Execute the statement
    $stmt->execute();
    
    // Store the result
    $result = $stmt->get_result();
    
    // Check the number of rows returned
    if ($result->num_rows == 1) {
        // Fetch user data
        $user = $result->fetch_assoc();
    
        // Set activate status
        $state = "activate";

        // Prepare and execute statement to update status
        $stmt_update = $conn->prepare("UPDATE signin_details SET state = ? WHERE email = ?");
        $stmt_update->bind_param("ss", $state, $email);
        $stmt_update->execute();

        if ($user['type'] == 'buyer') {
            $_SESSION['state'] = $state;
            $_SESSION['email'] = $email;
            header("Location: http://localhost/Finalproject/FurniFlex/Home.php");
            exit(); // Make sure to exit after redirection
        } elseif ($user['type'] == 'admin') {
            // Redirect to admin home page for other types
            header("Location: http://localhost/Finalproject/FurniFlex/AdminHome.php");
            exit(); // Make sure to exit after redirection
        }elseif ($user['type'] == 'ordermaintainer') {
            // Redirect to admin home page for other types
            header("Location: http://localhost/Finalproject/FurniFlex/Omdashboard.php");
            exit(); // Make sure to exit after redirection
    } }else{
        echo '<script>
        swal("Account not found", "Please enter correct email or password", "error")
            .then(function() {
                window.location = "http://localhost/Finalproject/FurniFlex/login.html";
            });
        </script>';
    }

    // Close the statements
    $stmt->close();
    $conn->close();
}
?>

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>   
      
      <script>
         document.addEventListener("DOMContentLoaded", function() {
            // Get the Cuztomize link element
            var cuztomizeLink = document.querySelector(".cuztomize-link");
            
            // Add a click event listener to the Cuztomize link
            cuztomizeLink.addEventListener("click", function(event) {
               // Prevent the default action of the link
               event.preventDefault();
               
               // Show the error message
               document.getElementById("error-message").style.display = "block";
            });
         });
      </script>
   </body>
</html>
