<?php
// Start session
session_start();
require_once "dbconnection.php";

// Check if email is set in POST data
if(isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Update user state to "deactivate" in the database
    $state = "deactivate";
    $stmt_update = $conn->prepare("UPDATE signin_details SET state = ? WHERE email = ?");
    $stmt_update->bind_param("ss", $state, $email);
    $stmt_update->execute();
}

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("Location: http://localhost/Finalproject/FurniFlex/home.php");
exit(); // Make sure to exit after redirection

$file='details.txt';
// Delete the file contents after processing
       file_put_contents($file, '');
       

       $file='cartdetailss.txt';
       // Delete the file contents after processing
              file_put_contents($file, '');
              
?>
