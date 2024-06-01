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
require_once "dbconnection.php";

// Retrieve form data
$email = $_POST['email'];
$username = $_POST['username'];
$password1 = $_POST['password1'];

// Password validation criteria
$uppercase = preg_match('@[A-Z]@', $password1);
$lowercase = preg_match('@[a-z]@', $password1);
$number    = preg_match('@[0-9]@', $password1);
$specialChars = preg_match('@[^\w]@', $password1);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password1) < 8) {
    echo '<script>
    swal("Password Validation Failed!", "Password must contain at least 8 characters, including uppercase, lowercase, number, and special character", "error").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/SignPage.html";
    });
  </script>';
  exit();
}

// Define the default type for new users
$type = "buyer";

function generateUserID($conn) {
    // Query the database for the highest existing ID
    $query = "SELECT MAX(id) AS max_id FROM signin_details";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result) {
        $row = $result->fetch_assoc();
        // Extract the highest existing ID and increment it
        $max_id = $row['max_id'];
        $max_id = (int) substr($max_id, 3); // Remove the "CID" prefix and convert to integer
        $new_id = $max_id + 1;
    } else {
        // If the query fails, fallback to a default ID
        $new_id = 1;
    }

    // Format the new ID with the prefix "CID" and leading zeros
    $formatted_id = sprintf("CID%02d", $new_id);
    return $formatted_id;
}

// Generate a new user ID
$user_id = generateUserID($conn);

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO signin_details(id, email, username, password1, type) VALUES (?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("sssss", $user_id, $email, $username, $password1, $type);
$state = "activate";

// Prepare and execute statement to update status
$stmt_update = $conn->prepare("UPDATE signin_details SET state = ? WHERE email = ?");
$stmt_update->bind_param("ss", $state, $email);
$stmt_update->execute();

// Execute the statement
try {
    if ($stmt->execute()) {
        $_SESSION['state'] = $state;
        $_SESSION['email'] = $email;
        echo '<script>
        swal("Registered Successfully!", "", "success").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/home.php";
        });
      </script>';
    } else {
        echo '<script>
        swal("Email already exists!", "Change the email", "error").then(function(){
            window.location = "http://localhost/Finalproject/FurniFlex/SignPage.html";
        });
      </script>';
    }
} catch (mysqli_sql_exception $exception) {
    // Check if the error is due to duplicate entry
    if ($exception->getCode() === "23000") {
        echo '<script>
        swal("Email already exists!", "Change the email", "error").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/SignPage.html";
        });
      </script>';
    } else {
        echo '<script>
        swal("Error occurred!", "Please try again later", "error").then(function(){
            window.location = "http://localhost/Finalproject/FurniFlex/SignPage.html";
        });
      </script>';
    }
}

// Close statement and database connection
$stmt->close();
$conn->close();
exit();
?>
</body>
</html>
