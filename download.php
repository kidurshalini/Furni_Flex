<?php
// download.php

// Check if PDF file is provided in the URL
if (isset($_GET['pdf'])) {
    // File path
    $file = 'C:\xampp\htdocs\Finalproject\FurniFlex\\' . $_GET['pdf']; // Corrected the path by adding '\\' before the filename

    // Check if file exists
    if (file_exists($file)) {
        // Set headers for download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file); // Read the file and output to the browser
        exit;
    } else {
        echo "File not found: " . $file; // Output file path for debugging
    }
} else {
    echo "Invalid request.";
}
?>
