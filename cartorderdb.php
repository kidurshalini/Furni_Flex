<?php
// Start the session
session_start();

// Include the database connection file
require_once "dbconnection.php";

// Function to sanitize and extract PID
function extractPID($line) {
    // Extract PID enclosed within double quotes
    if (preg_match('/"PID":"(.*?)"/', $line, $matches)) {
        return $matches[1];
    }
    // If no valid PID found, return empty string
    return "";
}

// Check if the POST request has been made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email is set in the session
    if (isset($_SESSION['email'])) {
        // Retrieve user ID from session
        $email = $_SESSION['email'];

        // Insert email into orderdetails table and retrieve the OID
        $query = "INSERT INTO orderdetails (email) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $update_query = "SELECT OID FROM orderdetails WHERE email = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("s", $email);
        $update_stmt->execute();
        $update_stmt->store_result();
        $update_stmt->bind_result($OID);
        $update_stmt->fetch();
        $update_stmt->free_result(); // Free the result set

        // Remove invalid characters from email to form a valid table name
        $database_name = "furni_flex";
        $email_table_name = preg_replace('/[^a-zA-Z0-9_]/', '', $email);
        $table_name = $database_name . ".`order_" . $email_table_name . "`";

        $create_table_query = "CREATE TABLE IF NOT EXISTS $table_name (
            pid VARCHAR(255),
            quantity INT,
            OID INT,
            FOREIGN KEY (pid) REFERENCES product(PID)
        )";

        if ($conn->query($create_table_query) === TRUE) {
            $_SESSION['table_name'] = $table_name;

            // Read the cartdetails.txt file
            $file = 'cartdetails.txt';
            if (file_exists($file)) {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                foreach ($lines as $line) {
                    // Extract PID from line
                    $PID = extractPID($line);
                    $quantity = 0; // Initialize quantity, you may adjust this if quantity is present in your file

                    // Check if PID is valid
                    if (!empty($PID)) {
                        // Check if PID exists in the product table
                        $product_check_query = "SELECT COUNT(*) FROM product WHERE PID = ?";
                        $product_check_stmt = $conn->prepare($product_check_query);
                        $product_check_stmt->bind_param("s", $PID);
                        $product_check_stmt->execute();
                        $product_check_stmt->bind_result($product_exists);
                        $product_check_stmt->fetch();
                        $product_check_stmt->free_result(); // Free the result set

                        if ($product_exists) {
                            // PID exists, proceed with insert
                            $query = "INSERT INTO $table_name (pid, quantity, OID) VALUES (?, ?, ?)";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("sii", $PID, $quantity, $OID);

                            if (!$stmt->execute()) {
                                echo "Error inserting order details for PID $PID: " . $stmt->error . "<br>";
                            }
                        } else {
                            echo "Product with PID $PID does not exist.<br>";
                        }
                    } else {
                        echo "Invalid format in line: $line<br>";
                    }
                }

                // Clear the file contents after processing
                file_put_contents($file, '');
            } else {
                echo "Cart details file not found.";
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Email not set in the session.";
    }
}

// Retrieving product details based on PID
if (isset($PID)) {
    $product_query = "SELECT * FROM product WHERE PID = ?";
    $product_stmt = $conn->prepare($product_query);
    $product_stmt->bind_param("s", $PID);
    $product_stmt->execute();
    $product_result = $product_stmt->get_result();
    $product_row = $product_result->fetch_assoc();
}
?>
