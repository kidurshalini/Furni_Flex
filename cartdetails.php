<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve all form data
    $PID=$_POST['PID'];
    $image = $_POST['image'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $PID = $_POST['PID'];
    $descript = $_POST['descript'];
    $category = $_POST['category'];
   

    // Create an array to hold the details
    $details = array(
        'PID' => $PID,
        'image' => $image,
        'productName' => $productName,
        'price' => $price,
        'descript' => $descript,
        'category' => $category
        // Add more fields as needed
    );

    // Define the file path
    $file = 'cartdetails.txt';

    // Open the file for writing (append mode)
    $handle = fopen($file, 'a');

    // Check if file opened successfully
    if ($handle) {
        // Write the details to the file
        fwrite($handle, json_encode($details) . PHP_EOL);

        // Close the file
        fclose($handle);

        header("Location:cart.php");
       
    } else {
      
    }



}