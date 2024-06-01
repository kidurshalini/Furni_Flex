<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['invoice_pdf'])) {
    $file = $_FILES['invoice_pdf'];

    // Move the uploaded file to a directory on the server
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }
    $uploadFile = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        require_once "dbconnection.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $email = $_SESSION['email']; // Retrieve email from session
        $filePath = $conn->real_escape_string($uploadFile);
        $date=date("Y-m-d H:i:s");
        // Insert email and file path into the database
        $sql = "INSERT INTO invoice (email, pdf,date) VALUES ('$email', '$filePath','$date')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'PDF and email saved successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database insert failed']);
        }

        $conn->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No file uploaded']);
}
?>
