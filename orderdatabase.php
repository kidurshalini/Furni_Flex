<?php
// Start the session
session_start();

// Include the database connection file
require_once "dbconnection.php";

// Check if the POST request has been made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email is set in the session
    if (isset($_SESSION['email'])) {
        // Retrieve user ID from session
        $email = $_SESSION['email'];
        $date =  date('Y-m-d H:i:s');
        // Insert email into orderdetails table and retrieve the OID
        $query = "INSERT INTO orderdetails (email,date) VALUES (?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email,$date);
        $stmt->execute();
        $update_query = "SELECT OID FROM orderdetails WHERE email = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("s", $email);
        $update_stmt->execute();
        $update_stmt->store_result();
        $update_stmt->bind_result($OID);
        $update_stmt->fetch();
        
        // Remove invalid characters from email to form a valid table name
        $database_name = "furni_flex";
        $email_table_name = preg_replace('/[^a-zA-Z0-9_]/', '', $email);
        $table_name = $database_name . ".`order_" . $email_table_name . "`";

        $create_table_query = "CREATE TABLE IF NOT EXISTS $table_name (
            pid VARCHAR(255),  -- Adjust the length according to your primary key length
            quantity INT,
            OID INT,  -- Adding OID column
            FOREIGN KEY (pid) REFERENCES product(PID)
        )";

        if ($conn->query($create_table_query) === TRUE) {
            $_SESSION['table_name'] = $table_name;

            // Check if quantity is set in the $_POST array
            if (isset($_POST['quantity']) && isset($_POST['PID'])) {
                $quantity = $_POST['quantity'];
                $PID = $_POST['PID'];

               
$query = "INSERT INTO $table_name (pid, quantity, OID) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sii", $PID, $quantity, $OID); // Assuming OID is an integer

                if ($stmt->execute()) {

                    // Your execution logic here
                } else {
                    echo "Error inserting order details: " . $conn->error;
                }
            } else {
                echo "Quantity or PID is not set.";
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Email not set in the session.";
    }
}

// Retrieving product details based on PID
$product_query = "SELECT * FROM product WHERE PID = ?";
$product_stmt = $conn->prepare($product_query);
$product_stmt->bind_param("s", $PID); // Assuming PID is a string
$product_stmt->execute();
$product_result = $product_stmt->get_result();
$product_row = $product_result->fetch_assoc();

// Clearing the file contents after processing
$file = 'details.txt';
file_put_contents($file, '');
?>
